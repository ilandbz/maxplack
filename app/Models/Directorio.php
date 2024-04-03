<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    use HasFactory;
    protected $fillable = ['titulo', 'dni', 'area_id', 'cargo_id', 'email', 'celular', 'foto', 'link', 'es_activo'];
}
