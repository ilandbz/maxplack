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
        Entrada::firstOrCreate([
            'slug' => 'nosotros-valores',
            'ruta' => 'nosotros.valores',
            'titulo'   => 'Valores',
            'contenido'   => '<section class="notice-area mb-4">
            <div class="container">
            <div class="row">
                <div class="col-lg-12">
                <div class="section-title-2">
                    <h2 class="title">VALORES</h2><p>COMPROMISO</p><p>TRANSPARENCIA</p><p>DEMOCRACIA PARTICIPATIVA</p><p>HONRADEZ</p><p>RESPETO</p><p>EMPATIA</p><p><br></p></div></div></div><div class="notice-content">
            </div>
            </div>
        </section>'
        ]);


    }
}
