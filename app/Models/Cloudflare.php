<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $wan_id
 * @property string $token
 * @property string $zone_id
 * @property string $record_id
 * @property string $type
 * @property string $name
 * App\Models\Cloudflare
 */
class Cloudflare extends Model
{
    use HasFactory;

    protected $fillable = [
        'wan_id',
        'token',
        'zone_id',
        'record_id',
        'type',
        'name',
    ];

    protected $casts =[
        'wan_id' => 'integer',
        'token' => 'string',
        'zone_id'=> 'integer',
        'record_id'=> 'integer',
        'type'=> 'string',
        'name'=> 'string',
    ];
}
