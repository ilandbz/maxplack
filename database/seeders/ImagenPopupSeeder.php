<?php

namespace Database\Seeders;

use App\Models\ImagenPopup;
use App\Models\Popup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenPopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $imagenes = ['popup1.jpg','popup2.jpg','popup3.jpg'];

        foreach($imagenes as $item){
            ImagenPopup::firstOrCreate([
                'nombreImagen' => $item,
                'popup_id'     => Popup::where('titulo', 'Popup Inicial')->value('id')
            ]);            
        }

    }
}
