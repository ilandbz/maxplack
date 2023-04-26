<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nav extends Model
{
    use HasFactory;
    function children(): HasMany
    {
        return $this->hasMany(Nav::class, 'padre_id');
    }
}
