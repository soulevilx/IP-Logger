<?php

namespace App\Services;

use App\Models\Speedtest;
use App\Models\Wan;

class SpeedtestService
{
    public function store(array $attributes)
    {
        $speedtest = Speedtest::create([
            'ip' => $attributes['interface']['externalIp'],
            'interface' => $attributes['interface'],
            'ping' => $attributes['ping'],
            'download' => $attributes['download']['bandwidth'],
            'download_data' => $attributes['download'],
            'upload' => $attributes['upload']['bandwidth'],
            'upload_data' => $attributes['upload'],
            'server' => $attributes['server'],
        ]);

        /**
         * Update current speed
         */
        Wan::where('current_ip', $speedtest->ip)
            ->update([
                'download' => $speedtest->download,
                'upload' => $speedtest->upload
            ]);
    }
}
