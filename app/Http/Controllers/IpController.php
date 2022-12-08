<?php

namespace App\Http\Controllers;

use App\Events\IpChanged;
use App\Http\Requests\StoreIpRequest;
use App\Models\Ip;
use App\Models\Wan;
use Illuminate\Support\Facades\Event;

class IpController extends Controller
{
    public function store(StoreIpRequest $request)
    {
        $ip = Ip::firstOrCreate([
            'wan_id' => Wan::where('name', $request->input('wan'))->first()->id,
            'ip' => $request->input('ip'),
        ]);

        if ($ip->wan->current_ip !== $ip->ip) {
            $ip->wan->update([
                'current_ip' => $ip->ip
            ]);

            //Event::dispatch(new IpChanged($ip));
            dd($ip->wan);
        }
    }
}
