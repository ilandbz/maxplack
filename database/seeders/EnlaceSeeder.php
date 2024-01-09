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
        Enlace::firstOrCreate([
            'title'         => 'RENIEC',
            'link'          => "https://www.reniec.gob.pe/portal/masServiciosLinea.htm",
            'nombreImagen'  => "reniec.png"
        ]); 
        Enlace::firstOrCreate([
            'title'         => 'SUNAT',
            'link'          => "https://www.sunat.gob.pe/",
            'nombreImagen'  => "sunat.jpg"
        ]); 
        Enlace::firstOrCreate([
            'title'         => 'SENCICO',
            'link'          => "https://cursos.sencico.gob.pe/",
            'nombreImagen'  => "sencico.png"
        ]);
        Enlace::firstOrCreate([
            'title'         => 'INVIERTE PE',
            'link'          => "https://ofi5.mef.gob.pe/ssi/ssi/Index",
            'nombreImagen'  => "inviertepe.png"
        ]);
        Enlace::firstOrCreate([
            'title'         => 'SUNARP',
            'link'          => "https://www.sunarp.gob.pe/serviciosenlinea/portal/index.html",
            'nombreImagen'  => "sunarp.png"
        ]);   

    }
}
