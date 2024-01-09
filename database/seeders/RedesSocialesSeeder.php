<?php

namespace Database\Seeders;

use App\Models\RedSocial;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RedesSocialesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        RedSocial::firstOrCreate([
            'titulo' => 'Facebook',
            'url' => 'https://www.facebook.com/maxplanckambo',
            'icono' => 'fab fa-facebook',
            'colorfondo' => '#3b5998'
        ]);
    }
}
