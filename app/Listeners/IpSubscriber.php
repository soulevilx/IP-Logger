<?php

namespace App\Listeners;

use App\Events\IpChanged;
use App\Services\CloudflareService;

class IpSubscriber
{
    public function updateCloudflare(IpChanged $event)
    {
        $service = app(CloudflareService::class);
        foreach ($event->ip->wan->cloudflares as $cloudflare) {
            $service->updateDns($cloudflare, $event->ip->ip);
        }
    }

    public function subscribe($events)
    {
        $events->listen(
            IpChanged::class,
            [
                self::class, 'updateCloudflare'
            ]
        );
    }
}
