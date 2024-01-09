<?php

namespace Database\Seeders;

use App\Models\Area;
use App\Models\Cargo;
use App\Models\Directorio;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DirectorioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Directorio::firstorCreate([
            'titulo'       => 'CAYO LEONIDAS SANTIAGO CAMPOS',
            'dni'          => '22672701',
            'area_id'      => Area::where('nombre', 'Direccion')->value('id'),
            'cargo_id'     => Cargo::where('nombre', 'Director')->value('id'),
            'email'        => '',
            'link'         => '',
            'celular'      => '',
            'foto'         => '22672701.jpg',
            'funciones'    => 'Gobernamos, conducimos y lideramos el desarrollo de la Provincia de Ambo, Gestionando y promoviendo el desarrollo sostenible e integral, asi como el bienestar humano, mediante la concertación institucional y la participación de la sociedad civil organizada.'
        ]);        

    }
}
