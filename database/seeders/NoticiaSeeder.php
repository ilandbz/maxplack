<?php

namespace Database\Seeders;

use App\Models\Noticia;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoticiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Noticia::firstorCreate([
            'titulo'        => 'TRABAJANDO JUNTOS POR UN AMBO LIMPIO Y ORDENADO',
            'subtitulo'      => 'La Municipalidad Provincial de Ambo a través de la Sub Gerencia de Gestión Integral De Residuos Sólidos el día sábado 02 de diciembre, realizó el perifoneo por las calles principales de la Provincia De Ambo y los puntos críticos con la finalidad de dar a conocer a la población ambina los días de recojo de los residuos sólidos que son de lunes a sábado a las mañanas y de esa manera informar que en las noches ni los feriados se recogen los residuos sólidos, ya que el personal de limpieza pública también tiene derecho de descansar.',
            'slug'          => 'trabajando-juntos-por-un-ambo-limpio-y-ordenado',
            'contenido'     => 'La Municipalidad Provincial de Ambo a través de la Sub Gerencia de Gestión Integral De Residuos Sólidos el día sábado 02 de diciembre, realizó el perifoneo por las calles principales de la Provincia De Ambo y los puntos críticos con la finalidad de dar a conocer a la población ambina los días de recojo de los residuos sólidos que son de lunes a sábado a las mañanas y de esa manera informar que en las noches ni los feriados se recogen los residuos sólidos, ya que el personal de limpieza pública también tiene derecho de descansar.',
            'fecha_publicacion' => '2023-12-14',
            'user_id'       => 1
        ]);
    }
}
