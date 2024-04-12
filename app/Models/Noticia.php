<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Noticia extends Model
{
    use HasFactory;
    protected $fillable=['titulo', 'subtitulo', 'slug', 'contenido', 'user_id', 'fecha_publicacion'];
    /**
     * Get the imagen associated with the Noticia
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function imagen(): HasOne
    {
        return $this->hasOne(ImagenNoticia::class, 'noticia_id');
    }
    public function imagenes(): HasMany
    {
        return $this->hasMany(ImagenNoticia::class, 'noticia_id');
    }


}
