<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'package',
        'isp',
        'contract_speed',
        'download',
        'upload',
    ];

    protected $casts = [
        'name' => 'string',
        'package' => 'string',
        'isp' => 'string',
        'contract_speed' => 'integer',
        'download' => 'integer',
        'upload' => 'integer',
    ];
}
