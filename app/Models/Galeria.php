<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Galeria extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'descripcion'];

    /**
     * Get all of the imagenes for the Galeria
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagenes(): HasMany
    {
        return $this->hasMany(ImagenGaleria::class, 'galeria_id');
    }


    public function primeraImagen(): HasOne
    {
        return $this->hasOne(ImagenGaleria::class, 'galeria_id')->orderBy('id', 'asc');
    }



}
