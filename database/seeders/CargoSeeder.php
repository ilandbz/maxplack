<?php

namespace Database\Seeders;

use App\Models\Cargo;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CargoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cargo::firstOrCreate([
            'nombre'    => 'Director'
        ]);
        Cargo::firstOrCreate([
            'nombre'    => 'Administradora'
        ]);         
        Cargo::firstOrCreate([
            'nombre'    => 'Coordinador Acedemica'
        ]); 
        Cargo::firstOrCreate([
            'nombre'    => 'Docente'
        ]); 
    }
}
