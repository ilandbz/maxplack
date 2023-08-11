<?php

namespace Database\Seeders;

use App\Models\Enlace;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EnlaceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Enlace::firstOrCreate([
            'title'         => 'Indeci',
            'link'          => "http://www.indeci.gob.pe/",
            'nombreImagen'  => "indeci.jpg"
        ]);
        Enlace::firstOrCreate([
            'title'         => 'Gobierno Regional de Huanuco',
            'link'          => "https://www.regionhuanuco.gob.pe/",
            'nombreImagen'  => "gorehco.png"
        ]);   
        Enlace::firstOrCreate([
            'title'         => 'Municipalidad de Huanuco',
            'link'          => "https://www.munihuanuco.gob.pe/",
            'nombreImagen'  => "munihco.png"
        ]);   
        Enlace::firstOrCreate([
            'title'         => 'OSCE',
            'link'          => "https://www.gob.pe/osce",
            'nombreImagen'  => "osce.jpg"
        ]);   
        Enlace::firstOrCreate([
            'title'         => 'Fondep',
            'link'          => "https://www.fondep.gob.pe/",
            'nombreImagen'  => "fondep.jpg"
        ]);   
        Enlace::firstOrCreate([
            'title'         => 'INEI',
            'link'          => "http://www.inei.gob.pe/",
            'nombreImagen'  => "inei.jpg"
        ]);   

    }
}
