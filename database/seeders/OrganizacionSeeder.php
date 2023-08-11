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
            'ruc' => '20146008926',
            'razon_social' => 'Municipalidad Provincial de Ambo',
            'titulo' => 'Municipalidad Provincial de Ambo',
            'slogan' => 'Tierra de Historia y Tradicion',
            'descripcion' => 'Municipalidad Provincial de Ambo de Huánuco',
            'director' => 'Santiago Campos Cayo Leonidas',
            'direccion' => ' Jr. Constitución N° 353,',
            'email' => 'mesadepartesvirtual@muniambo.gob.pe',
            'telefono' => '062-504455',
            'telefono2' => '',
            'url_web'   => 'www.muniambo.gob.pe',
            'quienes_somos' => 'Gobernamos, conducimos y lideramos el desarrollo de la provincia de Ambo, gestionando y promoviendo el desarrollo sostenible e integral, así como el bienestar humano, mediante la concertación institucional y la participación de la sociedad civil organizada.',
            'vision' => 'Ambo, territorio sostenible, referente en la calidad de vida de su población, con desarrollo competitivo y bajo nivel de riesgo de desastre, cimentado en la atención efectiva al ciudadano.',
            'mision' => 'Promover el desarrollo local y prestar servicios públicos, en la Provincia de Ambo con eficiencia, eficacia y adecuado control.',
        ]);
    }
}
