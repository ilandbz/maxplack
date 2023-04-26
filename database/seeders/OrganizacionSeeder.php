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
            'ruc' => '123456789',
            'razon_social' => 'Mi Empresa S.A.C.',
            'titulo' => 'Mi Empresa S.A.C.',
            'slogan' => 'Haz realidad tus sueños',
            'descripcion' => 'Somos una empresa dedicada a brindar soluciones integrales a nuestros clientes.',
            'director' => 'Juan Pérez',
            'direccion' => 'Av. Primavera 123',
            'email' => 'info@miempresa.com',
            'telefono' => '123456789',
            'telefono2' => '123456789',
            'url_web'   => 'www.web.com',
            'quienes_somos' => 'En Mi Empresa, nos dedicamos a brindar soluciones personalizadas para nuestros clientes...',
            'vision' => 'Ser líderes en el mercado de soluciones empresariales en el Perú...',
            'mision' => 'Brindar soluciones integrales y personalizadas a nuestros clientes, con un equipo altamente capacitado...',
        ]);
    }
}
