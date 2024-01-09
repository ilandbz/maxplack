<?php

namespace Database\Seeders;

use App\Models\Area;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Area::firstOrCreate([
            'nombre'    => 'Direccion'
        ]);
        Area::firstOrCreate([
            'nombre'    => 'Administracion'
        ]);
        Area::firstOrCreate([
            'nombre'    => 'Coordinacion Academica'
        ]);

    }
}
