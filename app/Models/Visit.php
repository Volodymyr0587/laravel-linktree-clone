<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Visit extends Model
{
    use HasFactory;

    protected $fillable = [
        'link_id',
        'user_agent',
    ];

    public function link(): BelongsTo
    {
        return $this->belongsTo(Link::class);
    }
}
