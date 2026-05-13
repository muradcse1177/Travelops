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

        @set_time_limit(180);
        @ignore_user_abort(true);

        $path   = base_path();
        $output = [];

        $composerCmd = trim(shell_exec('command -v composer 2>/dev/null')) ?: '';
        if (!$composerCmd && is_file($path . '/composer.phar')) {
            $composerCmd = 'php ' . escapeshellarg($path . '/composer.phar');
        }
        $composerStep = $composerCmd
            ? "cd {$path} && timeout 180 {$composerCmd} install --no-dev --no-interaction --no-progress --optimize-autoloader 2>&1"
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
