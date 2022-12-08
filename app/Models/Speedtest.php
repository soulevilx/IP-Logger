<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Speedtest extends Model
{
    use HasFactory;

    protected $fillable = [
        'ip',
        'interface',
        'ping',
        'download',
        'download_data',
        'upload',
        'upload_data',
        'server'
    ];

    protected $casts = [
        'ip' => 'string',
        'interface' => 'array',
        'ping' => 'array',
        'download' => 'integer',
        'download_data' => 'array',
        'upload' => 'integer',
        'upload_data' => 'array',
        'server' => 'array',
    ];
}
