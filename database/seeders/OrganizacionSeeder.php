<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Organizacion;

class OrganizacionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Organizacion::firstorCreate([
            'ruc' => '20321370242',
            'razon_social' => 'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PUBLICO MAX PLANCK DE AMBO',
            'titulo' => 'INSTITUTO DE EDUCACION SUPERIOR TECNOLOGICO PUBLICO MAX PLANCK DE AMBO',
            'slogan' => 'Somos una Institución de nivel Superior Revalidada en continua expansión de nuevas carreras profes',
            'descripcion' => 'Somos una Institución de nivel Superior Revalidada en continua expansión de nuevas carreras profes',
            'director' => '',
            'direccion' => 'AV. JAVIER PRADO NRO. S/N HUANCAPATA (COSTADO DEL VIVERO DE LA MUNICIPALIDAD) HUANUCO - AMBO - AMBO',
            'email' => '',
            'telefono' => '',
            'url_web'   => '',
            'quienes_somos' => 'El Instituto de Educación Superior Tecnológico Público “Max Planck”, es una institución de Nivel Superior Tecnológico, creado con R. M. N° 0258-87-ED, el 20 de mayo de 1987; desde su creación nuestra propuesta ha sido, es, y será hacer de la educación un derecho fundamental e imprescindible del ser humano con la finalidad de formar profesionales de excelencia capaces de afrontar los retos del mundo competitivo en el que vivimos, y sobre todo, jóvenes dispuestos a incorporarse al campo laboral en base a una formación de calidad humanista, científica y tecnológica.',
            'vision' => '',
            'mision' => '',
            'icono' => 'favicon.ico'
        ]);
    }
}
