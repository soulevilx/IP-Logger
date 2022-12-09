<?php

namespace App\Services;

use App\Events\IpChanged;
use App\Models\Ip;
use App\Models\Wan;
use Illuminate\Support\Facades\Event;

class IpService
{
    public function store(string $ip, string $wan)
    {
        $ip = Ip::firstOrCreate([
            'wan_id' => Wan::where('name', $wan)->first()->id,
            'ip' => $ip,
        ]);

        if ($ip->wan->current_ip !== $ip->ip) {
            $ip->wan->update([
                'current_ip' => $ip->ip
            ]);

            Event::dispatch(new IpChanged($ip));
        }
    }
}
