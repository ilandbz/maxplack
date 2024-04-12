<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenGaleria extends Model
{
    use HasFactory;
    protected $fillable=['galeria_id', 'descripcion', 'nombreimagen'];
    public static function  generarNombreImagen(int $galeria_id,$imagen): string
    {
        $contar_imagen = ImagenGaleria::where('galeria_id',$galeria_id)->max('id');

        $index = ($contar_imagen == 0) ? 1 : $contar_imagen +1;

        return $galeria_id."-IMAGEN-".$index.".".mb_strtolower($imagen->extension());
    }
}
