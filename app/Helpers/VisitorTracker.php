<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class VisitorTracker
{
    public static function trackVisitor()
    {
        $ip = request()->ip();
        $region = self::getRegionFromIP($ip);
        $userAgent = request()->userAgent();
        $port = request()->server('SERVER_PORT');

        DB::table('visitors')->insert([
            'ip_address' => $ip,
            'region' => $region,
            'destination_port' => $port,
            'user_agent' => $userAgent,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    private static function getRegionFromIP($ip)
    {
        $url = "http://ip-api.com/json/{$ip}";
        $response = file_get_contents($url);
        $data = json_decode($response, true);

        return $data['regionName'] ?? 'Unknown';
    }
}
