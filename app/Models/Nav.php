<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Nav extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'url', 'ruta', 'slug', 'icono', 'padre_id', 'orden'];
    public function padre()
    {
        return $this->belongsTo(Nav::class);
    }
    public function navs()
    {
        return $this->hasMany(Nav::class,'padre_id');
    }
    function children(): HasMany
    {
        return $this->hasMany(Nav::class, 'padre_id');
    }
    public static function maximoPadreId()
    {
        $maxOrden = Nav::whereNull('padre_id')->max('orden');

        return ($maxOrden == null && $maxOrden == '') ? 0 : ($maxOrden + 1);
    }

    public static function maximoHijoId($padre_id)
    {
        $maxOrden = Nav::where('padre_id',$padre_id)->max('orden');

        return ($maxOrden === null || $maxOrden == '') ? 0 : ($maxOrden + 1);
    }



}