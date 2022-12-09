<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreIpRequest;
use App\Services\IpService;

class IpController extends Controller
{
    public function store(StoreIpRequest $request, IpService $service)
    {
        $service->store($request->input('ip'), $request->input('wan'));
    }
}
