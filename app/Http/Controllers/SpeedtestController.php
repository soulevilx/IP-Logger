<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSpeedtestRequest;
use App\Services\SpeedtestService;

class SpeedtestController extends Controller
{
    public function store(StoreSpeedtestRequest $request, SpeedtestService $service)
    {
        $service->store($request->toArray());
    }
}
