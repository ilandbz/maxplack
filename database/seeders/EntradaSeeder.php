<?php

namespace Database\Seeders;

use App\Models\Entrada;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EntradaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Entrada::firstOrCreate([
            'slug' => 'nosotros-organigrama',
            'ruta' => 'nosotros.organigrama',
            'titulo'   => 'Organigrama',
            'contenido'   => '<!--====== About Start ======-->
            <section class="about-area">
                <div class="container-fluid">
<img src="imagenes/ORGANIGRAMA-AMBO.jpg">
                </div>
            </section>
            <!--====== About Ends ======-->'
        ]);


    }
}
