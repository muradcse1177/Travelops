<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LogVisitorActivity
{
    public function handle(Request $request, Closure $next)
    {
        /* =====================================================
        | 0a. SESSION HEALER — restore role-specific keys if missing
        ===================================================== */
        if (session()->has('user_id')
            && !session()->has('agent_id')
            && !session()->has('customer')
            && !session()->has('superAdmin')
        ) {
            $userId   = session('user_id');
            $userRole = session('user_role');
            if ($userRole == 1) {
                session()->put('superAdmin', $userId);
            } elseif ($userRole == 2) {
                session()->put('admin', $userId);
                session()->put('agent_id', $userId);
            } elseif ($userRole == 3) {
                session()->put('customer', $userId);
            } elseif ($userRole == 5) {
                $userInfo = session('user_info');
                $email = is_object($userInfo) && method_exists($userInfo, 'get')
                    ? $userInfo->get('company_email')
                    : (is_array($userInfo) ? ($userInfo['company_email'] ?? null) : null);
                if ($email) {
                    $emp = DB::table('employees')->where('email', $email)->first();
                    if ($emp) {
                        session()->put('agent_id', $emp->agent_id);
                        session()->put('employee', $userId);
                    }
                }
            }
        }

        /* =====================================================
        | 0. REAL IP
        ===================================================== */
        $ip = $this->getRealIp($request);

        /* =====================================================
        | 1. LOGGED-IN USER (SESSION user_id) → NEVER BLOCK
        ===================================================== */
        if (session()->has('user_id')) {
            return $this->logAndContinue($request, $ip, $next);
        }

        /* =====================================================
        | 2. USER TABLE IP WHITELIST → NEVER BLOCK
        ===================================================== */
        $isWhitelistedIp = DB::table('users')
            ->where('last_login_ip', $ip)
            ->exists();

        if ($isWhitelistedIp) {
            return $this->logAndContinue($request, $ip, $next);
        }

        /* =====================================================
        | 4. USER AGENT BOT FILTER
        ===================================================== */
        $allowedBots = [
            'googlebot','bingbot','facebookexternalhit',
            'meta-externalagent','twitterbot','linkedinbot',
        ];

        $blockedKeywords = [
            'curl','wget','python','scrapy','httpclient','scanner',
            'crawler','spider','ahrefs','semrush','mj12bot',
            'dotbot','bytespider','yandex','baidu','sogou',
            'java/','okhttp','go-http-client','libwww','barkrowler',
        ];

        $ua = strtolower($request->userAgent() ?? '');

        foreach ($allowedBots as $bot) {
            if (str_contains($ua, $bot)) {
                return $next($request);
            }
        }

        if (!$ua) abort(403);

        foreach ($blockedKeywords as $keyword) {
            if (str_contains($ua, $keyword)) {
                abort(403);
            }
        }

        if (
            str_contains($ua, 'headless') ||
            str_contains($ua, 'phantom') ||
            str_contains($ua, 'selenium')
        ) {
            abort(403);
        }

        /* =====================================================
        | 5. GEOIP (LOG ONLY)
        ===================================================== */
        try {
            $location = geoip($ip);
            $country = strtolower($location->country ?? null);
            $city = $location->city ?? null;
        } catch (\Exception $e) {
            $country = null;
            $city = null;
        }

        /* =====================================================
        | 6. REFERRER
        ===================================================== */
        $referrer = $request->header('referer') ?: 'Direct';

        /* =====================================================
        | 7. VISITOR LOG
        ===================================================== */
        $time = now()->setTimezone('Asia/Dhaka');

        DB::table('visitor_logs')->insert([
            'ip'         => $ip,
            'country'    => $country,
            'city'       => $city,
            'method'     => $request->method(),
            'url'        => $request->fullUrl(),
            'referrer'   => $referrer,
            'user_agent' => $request->userAgent(),
            'visited_at' => $time,
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        return $next($request);
    }

    /* =====================================================
    | COMMON LOGGER FOR SAFE USERS
    ===================================================== */
    private function logAndContinue(Request $request, string $ip, Closure $next)
    {
        try {
            $location = geoip($ip);
            $country = strtolower($location->country ?? null);
            $city = $location->city ?? null;
        } catch (\Exception $e) {
            $country = null;
            $city = null;
        }

        $time = now()->setTimezone('Asia/Dhaka');

        DB::table('visitor_logs')->insert([
            'ip'         => $ip,
            'country'    => $country,
            'city'       => $city,
            'method'     => $request->method(),
            'url'        => $request->fullUrl(),
            'referrer'   => $request->header('referer') ?: 'Direct',
            'user_agent' => $request->userAgent(),
            'visited_at' => $time,
            'created_at' => $time,
            'updated_at' => $time,
        ]);

        return $next($request);
    }

    /* =====================================================
    | REAL IP DETECTOR
    ===================================================== */
    private function getRealIp(Request $request)
    {
        foreach (['X-Forwarded-For','X-Real-IP','Client-IP'] as $header) {
            if ($request->header($header)) {
                return trim(explode(',', $request->header($header))[0]);
            }
        }
        return $request->ip();
    }
}
