<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpeedtestRequest;
use App\Models\Speedtest;
use App\Models\Wan;

class SpeedtestController extends Controller
{
    public function store(StoreSpeedtestRequest $request)
    {
        $speedtest = Speedtest::create([
            'ip' => $request->input('interface')['externalIp'],
            'interface' => $request->input('interface'),
            'ping' => $request->input('ping'),
            'download' => $request->input('download')['bandwidth'],
            'download_data' => $request->input('download'),
            'upload' => $request->input('upload')['bandwidth'],
            'upload_data' => $request->input('upload'),
            'server' => $request->input('server'),
        ]);

        /**
         * Update current speed
         */
        Wan::where('current_ip', $speedtest->ip)
            //->where('download', '<', $speedtest->download)
            ->update([
                'download' => $speedtest->download
            ]);

        Wan::where('current_ip', $speedtest->ip)
            //->where('upload', '<', $speedtest->upload)
            ->update([
                'upload' => $speedtest->upload
            ]);
    }
}
