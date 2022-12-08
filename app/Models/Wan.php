<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wan extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'package',
        'isp',
        'current_ip',
        'contract_speed',
        'download',
        'upload',
    ];

    protected $casts = [
        'name' => 'string',
        'package' => 'string',
        'isp' => 'string',
        'current_ip' => 'string',
        'contract_speed' => 'integer',
        'download' => 'integer',
        'upload' => 'integer',
    ];

    public function cloudflares(): HasMany
    {
        return $this->hasMany(Cloudflare::class);
    }
}
