<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * @property int $id
 * @property int $wan_id
 * @property string $ip
 */
class Ip extends Model
{
    use HasFactory;

    protected $fillable = [
        'wan_id',
        'ip',
    ];

    protected $casts =[
        'wan_id' => 'integer',
        'ip' => 'string',
    ];

    public function wan(): BelongsTo
    {
        return $this->belongsTo(Wan::class);
    }
}
