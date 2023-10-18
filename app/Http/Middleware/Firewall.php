<?php declare(strict_types=1);

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\IpUtils;

final class Firewall
{
    private const ALLOWED_IPS = [
        '127.0.0.1', // 例) ローカルからのアクセスは許可
       
        '103.72.179.127', // Anish.R IP
        '103.166.244.1', // Nikhil IP
        '103.121.27.178', // Experion office
        '103.79.223.18', // Experion office
        '101.188.67.134', // Indocosmo japan
        '103.135.95.18' , // Indocosmo japan
        '115.65.6.254', // Indocosmo japan
        '60.120.128.22', //lithin
        '2400:2410:85e0:1300:7ca4:7d02:6589:6d55', //lithin
        '2400:2410:85e0:1300:a033:4715:e4cd:678c', // deepthy
        '101.188.67.134', //Ajay
        '3.7.243.85', //Experion VPN
        '103.203.73.157', //Arya

        '58.191.6.1',
        '58.191.6.2',
        '58.191.6.3',
        '58.191.6.4',
        '58.191.6.5',
        '58.191.6.6',
        '58.191.6.33',
        '58.191.6.34',
        '58.191.6.35',
        '58.191.6.36',
        '58.191.6.37',
        '58.191.6.38'
    ];

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     * @throws AuthorizationException
     */
    public function handle(Request $request, Closure $next)
    {       
        // Bypass local env and check for allowed IP Address
        if (config('app.env') === 'local' || $this->isAllowedIp($request->ip())) {            
            return $next($request);
        }
        throw new AuthorizationException(__('ip_restriction_message'));
    }

    /**
     * @param string $ip
     * @return bool
     */
    private function isAllowedIp(string $ip): bool
    {
        return IpUtils::checkIp($ip, self::ALLOWED_IPS);
    }

    
}