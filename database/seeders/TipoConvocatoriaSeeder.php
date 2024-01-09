<?php

namespace Database\Seeders;

use App\Models\TipoConvocatoria;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TipoConvocatoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TipoConvocatoria::firstOrCreate([
            'nombre' => 'CAS'
        ]);
        TipoConvocatoria::firstOrCreate([
            'nombre' => '728'
        ]);
        TipoConvocatoria::firstOrCreate([
            'nombre' => 'CONTRATACION DOCENTE'
        ]);        
    }
}
