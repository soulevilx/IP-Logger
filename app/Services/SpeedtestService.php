<?php

namespace App\Services;

use App\Models\Speedtest;
use App\Models\Wan;

class SpeedtestService
{
    public function store(array $attributes)
    {
        Speedtest::create([
            'ip' => $attributes['interface']['externalIp'],
            'interface' => $attributes['interface'],
            'ping' => $attributes['ping'],
            'download' => $attributes['download']['bandwidth'],
            'download_data' => $attributes['download'],
            'upload' => $attributes['upload']['bandwidth'],
            'upload_data' => $attributes['upload'],
            'server' => $attributes['server'],
        ]);
    }
}
