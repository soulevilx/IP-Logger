<?php

namespace App\Services;

use App\Models\Cloudflare;
use GuzzleHttp\Client;

class CloudflareService
{
    public const ENDPOINT_BASE = 'https://api.cloudflare.com/client/v4/zones';

    public function updateDns(Cloudflare $cloudflare, string $ip)
    {
        $endpoint = self::ENDPOINT_BASE.'/'.$cloudflare->zone_id.'/dns_records/'.$cloudflare->record_id;
        $client = new Client();
        $client->put(
            $endpoint,
            [
                'headers' => [
                    'Authorization' => 'Bearer '.$cloudflare->token
                ],
                'json' => [
                    'type' => $cloudflare->type,
                    'name' => $cloudflare->name,
                    'content' => $ip,
                    'proxied' => $cloudflare->proxied
                ]
            ]
        );
    }
}
