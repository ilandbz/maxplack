<?php

namespace Database\Seeders;

use App\Models\ImagenNoticia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ImagenNoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        ImagenNoticia::firstorCreate([
            'nombreimagen'        => '1/1-IMAGEN-1.jpg',
            'noticia_id'      => 1,
        ]);
    }
}
