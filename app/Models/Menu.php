<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Menu extends Model
{
    use HasFactory;
    function children(): HasMany
    {
        return $this->hasMany(Menu::class, 'padre_id');
    }
    public function padre()
    {
        return $this->belongsTo(Menu::class);
    }
    public function menus()
    {
        return $this->hasMany(Menu::class,'padre_id');
    }
    public static function obtenerPadres()
    {
        return Menu::select('id','nombre')->whereNull('padre_id')
                    ->orderby('orden','asc')->get();
    }

    public static function maximoPadreId()
    {
        $maxOrden = Menu::whereNull('padre_id')->max('orden');

        return ($maxOrden == null && $maxOrden == '') ? 0 : ($maxOrden + 1);
    }

    public static function maximoHijoId($padre_id)
    {
        $maxOrden = Menu::where('padre_id',$padre_id)->max('orden');

        return ($maxOrden === null || $maxOrden == '') ? 0 : ($maxOrden + 1);
    }
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
