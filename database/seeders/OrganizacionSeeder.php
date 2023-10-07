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
            'telefono2' => '',
            'url_web'   => '',
            'quienes_somos' => '',
            'vision' => '',
            'mision' => '',
            'icono' => 'favicon.ico'
        ]);
    }
}
