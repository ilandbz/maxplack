<?php

namespace Database\Seeders;

use App\Models\Comunicado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComunicadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'comunicado.jpg'
        ]);
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'camion.jpg'
        ]);
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'policia.jpg'
        ]);
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'reciclaton.jpg'
        ]);
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'actuemosya.jpg'
        ]);
        Comunicado::firstorCreate([
            'titulo'        => '',
            'nombreImagen'  => 'comunicado1.jpg'
        ]);
    }
}
