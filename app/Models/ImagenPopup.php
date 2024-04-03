<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenPopup extends Model
{
    use HasFactory;
    protected $fillable=['nombreImagen', 'popup_id'];
    public static function  generarNombreImagen(int $popup_id,$imagen): string
    {
        $contar_imagen = ImagenPopup::where('popup_id',$popup_id)->max('id');

        $index = ($contar_imagen == 0) ? 1 : $contar_imagen +1;

        return $popup_id."-IMAGEN-".$index.".".mb_strtolower($imagen->extension());
    }

}
