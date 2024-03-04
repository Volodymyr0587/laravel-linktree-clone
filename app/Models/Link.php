<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Link extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'link',
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }


    public function visits(): HasMany
    {
        return $this->hasMany(Visit::class);
    }
}
