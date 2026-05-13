<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeployController extends Controller
{
    public function __invoke(Request $request)
    {
        $secret = 'tvo_dep_2026_x7Pq9mNw';
        if ($request->query('token') !== $secret) {
            abort(403, 'Invalid token');
        }

        // ── ?check=findupload — probe common folder names for the original
        //    tripdesigner.xyz upload folder so we know what to symlink.
        if ($request->query('check') === 'findupload') {
            $home = getenv('HOME') ?: ('/home/' . get_current_user());
            $needle = '1765093072.jpg';
            $candidates = ['public_html', 'tripdesigner.xyz', 'tripdesigner.net', 'tam', 'tripify.xyz'];
            $results = [];
            foreach ($candidates as $folder) {
                $base = $home . '/' . $folder;
                $path = $base . '/public/images/upload/company/' . $needle;
                $results[] = [
                    'folder'      => $folder,
                    'base_exists' => is_dir($base),
                    'image_found' => file_exists($path),
                    'full_path'   => $path,
                ];
            }
            $listing = @scandir($home) ?: [];
            return response()->json([
                'home'       => $home,
                'home_dirs'  => array_values(array_filter($listing, fn($f) => $f !== '.' && $f !== '..' && !str_starts_with($f, '.'))),
                'candidates' => $results,
            ], 200, [], JSON_PRETTY_PRINT);
        }

        // ── ?check=symlink_uploads&from=public_html — drop our local
        //    public/images/upload and replace with a symlink to the source
        //    site's upload folder so both sites share user-uploaded media.
        if ($request->query('check') === 'symlink_uploads') {
            $home   = getenv('HOME') ?: ('/home/' . get_current_user());
            $from   = (string) $request->query('from', 'public_html');
            $from   = preg_replace('/[^A-Za-z0-9_.-]/', '', $from);
            $source = $home . '/' . $from . '/public/images/upload';
            $dest   = base_path('public/images/upload');

            if (!is_dir($source)) {
                return response()->json(['error' => "source missing: $source"], 400);
            }

            $backup = null;
            if (is_link($dest)) {
                @unlink($dest);
            } elseif (is_dir($dest)) {
                $backup = $dest . '_local_backup_' . date('Ymd_His');
                rename($dest, $backup);
            }
            $ok = @symlink($source, $dest);

            return response()->json([
                'status'        => $ok ? 'symlinked' : 'failed',
                'source'        => $source,
                'destination'   => $dest,
                'is_link'       => is_link($dest),
                'symlink_target'=> is_link($dest) ? readlink($dest) : null,
                'backup'        => $backup,
            ], 200, [], JSON_PRETTY_PRINT);
        }

        @set_time_limit(180);
        @ignore_user_abort(true);

        $path   = base_path();
        $output = [];

        // Composer needs HOME/COMPOSER_HOME because PHP-FPM's exec() doesn't
        // inherit the shell env. Without this, "install" aborts on shared hosts.
        $home = getenv('HOME') ?: ('/home/' . get_current_user());
        $composerEnv = "HOME={$home} COMPOSER_HOME={$home}/.config/composer";
        $composerCmd = trim(shell_exec('command -v composer 2>/dev/null')) ?: '';
        if (!$composerCmd && is_file($path . '/composer.phar')) {
            $composerCmd = 'php ' . escapeshellarg($path . '/composer.phar');
        }
        $composerStep = $composerCmd
            ? "cd {$path} && {$composerEnv} timeout 180 {$composerCmd} install --no-dev --no-interaction --no-progress --optimize-autoloader 2>&1"
            : "echo 'composer not found — skip'";

        $commands = [
            "cd {$path} && git config --global --add safe.directory {$path}",
            "cd {$path} && timeout 45 git fetch --all 2>&1",
            "cd {$path} && timeout 30 git reset --hard origin/main 2>&1",
            $composerStep,
            "cd {$path} && php artisan view:clear 2>&1",
            "cd {$path} && php artisan cache:clear 2>&1",
            "cd {$path} && php artisan config:clear 2>&1",
            "cd {$path} && php artisan route:clear 2>&1",
        ];

        foreach ($commands as $cmd) {
            $out = [];
            exec($cmd, $out, $code);
            $output[] = [
                'cmd'  => $cmd,
                'code' => $code,
                'out'  => implode("\n", $out),
            ];
        }

        return response()->json([
            'status' => 'deployed',
            'time'   => now()->toDateTimeString(),
            'commit' => trim(shell_exec("cd {$path} && git log -1 --oneline 2>&1")),
            'steps'  => $output,
        ], 200, [], JSON_PRETTY_PRINT);
    }
}
