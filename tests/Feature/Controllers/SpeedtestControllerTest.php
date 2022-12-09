<?php

namespace Tests\Feature\Controllers;

use Tests\TestCase;

class SpeedtestControllerTest extends TestCase
{
    public function testStore()
    {
        $this->postJson(route('speedtest.store'), [
            'interface' => [
                'externalIp' => '192.168.1.1',
            ],
            'ping' => [

            ],
            'download' => [
                'bandwidth' => 100,
            ],
            'upload' => [
                'bandwidth' => 100,
            ],
            'server' => [

            ],
        ]);
    }
}
