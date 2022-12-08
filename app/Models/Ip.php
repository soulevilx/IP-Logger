<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip extends Model
{
    use HasFactory;

    protected $fillable = [
        'wan_id',
        'ip',
    ];

    public function wan()
    {
        return $this->belongsTo(Wan::class);
    }
}
