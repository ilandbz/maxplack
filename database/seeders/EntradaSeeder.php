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
            'slug' => 'quienes-somos',
            'ruta' => 'nosotros.quienessomos',
            'titulo'   => 'Quienes Somos',
            'contenido'   => '<!--====== About Start ======-->
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="about-content mt-40">
                                <h2 class="about-title">Quienes <span>Somos</span> </h2>
                                <span class="line"></span>
                                <p>Even slightly believable. If you are going use passage of Lorem Ipsum need desire to obtain pain of itself, because it is pain de sires many pain of itself occur for your study <br> <br> Even slightly believable. If you are going use passage of Lorem Ipsum need desir</p>
                                <a href="#" class="main-btn">Explore</a>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="about-image mt-50">
                                <div class="single-image image-1">
                                    <img src="edumate/assets/images/about/about-1.webp" width="290" height="290" alt="about">
                                </div>
                                <div class="single-image image-2">
                                    <img src="edumate/assets/images/about/about-2.webp" width="225" height="225" alt="about">
                                </div>
                                <div class="single-image image-3">
                                    <img src="edumate/assets/images/about/about-3.webp" width="190" height="190" alt="about">
                                </div>
                                <div class="single-image image-4">
                                    <img src="edumate/assets/images/about/about-4.webp" width="140" height="140" alt="about">
                                </div>
        
                                <div class="about-icon icon-1">
                                    <img src="edumate/assets/images/about/icon/icon-1.webp" width="46" height="46" alt="icon">
                                </div>
                                <div class="about-icon icon-2">
                                    <img src="edumate/assets/images/about/icon/icon-2.webp" width="46" height="46" alt="icon">
                                </div>
                                <div class="about-icon icon-3">
                                    <img src="edumate/assets/images/about/icon/icon-3.webp" width="46" height="46" alt="icon">
                                </div>
                                <div class="about-icon icon-4">
                                    <img src="edumate/assets/images/about/icon/icon-4.webp" width="46" height="46" alt="icon">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!--====== About Ends ======-->'
        ]);


    }
}
