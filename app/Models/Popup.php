<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Popup extends Model
{
    use HasFactory;

/**
 * Get all of the imagenesPopup for the Popup
 *
 * @return \Illuminate\Database\Eloquent\Relations\HasMany
 */
    public function imagenesPopup(): HasMany
    {
        return $this->hasMany(ImagenPopup::class, 'popup_id');
    }

}
