<?php

namespace Database\Seeders;

use App\Models\ImagenPopup;
use App\Models\Popup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $popup = Popup::firstorCreate([
            'titulo'    => 'Comunicado',
            'link'      => 'https://www.youtube.com/watch?v=dXtMMuu8aeo&t=1s',
            'es_activo' => 0
        ]);
        $imagenes = [
            [
                'nombreImagen'  => 'popup1.jpg',
                'popup_id'      => $popup->id,
            ],
            [
                'nombreImagen'  => 'popup2.jpg',
                'popup_id'      => $popup->id,
            ],
            [
                'nombreImagen'  => 'popup3.jpg',
                'popup_id'      => $popup->id,
            ],
        ];
        foreach($imagenes as $fila){
            ImagenPopup::firstorCreate($fila);
        }

    }
}
