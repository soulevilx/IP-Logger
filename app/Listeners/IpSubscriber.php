<?php

namespace App\Listeners;

use App\Events\IpChanged;
use GuzzleHttp\Client;

class IpSubscriber
{
    public function updateCloudflare(IpChanged $event)
    {

        $endpoint = 'https://api.cloudflare.com/client/v4/zones';
        $client = new Client();

        foreach ($event->ip->wan->cloudflares as $cloudflare) {
            $endpoint = $endpoint.'/'.$cloudflare->zone_id.'/dns_records/'.$cloudflare->record_id;
            dd($client->put(
                $endpoint,
                [
                    'headers' => [
                        'Authorization' => 'Bearer '.$cloudflare->token
                    ],
                    'json' => [
                        'type' => $cloudflare->type,
                        'name' => $cloudflare->name,
                        'content' => $event->ip->ip
                    ]
                ]
            )->getBody()->getContents());
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
