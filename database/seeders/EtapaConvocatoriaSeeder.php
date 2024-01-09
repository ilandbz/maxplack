<?php

namespace Database\Seeders;

use App\Models\EtapaConvocatoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EtapaConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        EtapaConvocatoria::firstOrCreate([
            'nombre' => 'REGISTRADO'
        ]);
        EtapaConvocatoria::firstOrCreate([
            'nombre' => 'PUBLICADO'
        ]);
        EtapaConvocatoria::firstOrCreate([
            'nombre' => 'EN PROCESO'
        ]);
        EtapaConvocatoria::firstOrCreate([
            'nombre' => 'FINALIZADO'
        ]);
    }
}
