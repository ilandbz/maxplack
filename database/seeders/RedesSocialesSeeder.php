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
            'url' => '#',
            'icono' => 'fab fa-facebook',
            'colorfondo' => '#3b5998'
        ]);
        RedSocial::firstOrCreate([
            'titulo' => 'Youtube',
            'url' => '#',
            'icono' => 'fab fa-youtube',
            'colorfondo' => '#ff0000'
        ]);
        RedSocial::firstOrCreate([
            'titulo' => 'Twitter',
            'url' => '#',
            'icono' => 'fab fa-twitter',
            'colorfondo' => '#1da1f2'
        ]);
        RedSocial::firstOrCreate([
            'titulo' => 'Correo',
            'url' => '#',
            'icono' => 'fa fa-envelope',
            'colorfondo' => '#db4437'
        ]);
        RedSocial::firstOrCreate([
            'titulo' => 'Instagram',
            'url' => '#',
            'icono' => 'fab fa-instagram',
            'colorfondo' => '#c13584'
        ]);
        RedSocial::firstOrCreate([
            'titulo' => 'Google Plus',
            'url' => '#',
            'icono' => 'fab fa-google-plus-g',
            'colorfondo' => '#dd4b39'
        ]);        
    }
}
