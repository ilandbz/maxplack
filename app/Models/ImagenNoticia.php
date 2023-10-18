<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagenNoticia extends Model
{
    use HasFactory;
    protected $fillable = ['nombreimagen', 'noticia_id'];
    // public static function  activarImagen(int $producto_id,string $imagen): void
    // {
    //     ImagenNoticia::where('producto_id',$producto_id)
    //         ->where('imagen','<>',$imagen)
    //         ->where('es_activo',1)
    //         ->update(array("es_activo" => 0));
    // }
    public static function  generarNombreImagen(int $noticia_id,$imagen): string
    {
        $contar_imagen = ImagenNoticia::where('noticia_id',$noticia_id)->max('id');

        $index = ($contar_imagen == 0) ? 1 : $contar_imagen +1;

        return $noticia_id."-IMAGEN-".$index.".".mb_strtolower($imagen->extension());
    }
}
