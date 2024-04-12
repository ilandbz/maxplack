<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Directorio extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'dni', 'area_id', 'cargo_id', 'email', 'funciones', 'celular', 'foto', 'link', 'es_activo'];

    /**
     * Get the cargo that owns the Directorio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function cargo(): BelongsTo
    {
        return $this->belongsTo(Cargo::class, 'cargo_id');
    }
    
    /**
     * Get the area that owns the Directorio
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(): BelongsTo
    {
        return $this->belongsTo(Area::class, 'area_id');
    }
}
