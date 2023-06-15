<?php

namespace Database\Seeders;

use App\Models\Nav;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nav::firstOrCreate(['nombre' => 'Home', 'url' => '/', 'ruta' => 'home','slug' => '/','icono' => '','padre_id' => null,'orden' => 1]);

        Nav::firstOrCreate(['nombre' => 'Nosotros', 'url' => '/nosotros', 'ruta' => 'nosotros','slug' => 'nosotros','icono' => '','padre_id' => null,'orden' => 2 ]);

            Nav::firstOrCreate([
                'nombre' => 'Quienes Somos',
                'url'   => '/quienessomos',
                'ruta'   => 'nosotros.quienessomos',
                'slug' => 'quienes-somos',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),
                'orden' => 1,
            ]);

            Nav::firstOrCreate(['nombre' => 'Unete', 'url' => '/unete', 'ruta' => 'unete','slug' => 'unete','icono' => '','padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),'orden' => 2]);

                Nav::firstOrCreate([
                    'nombre' => 'CAS',
                    'url'   => '/unete/cas',
                    'ruta'   => 'cas',
                    'slug' => 'nosotros-unete-cas',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Unete')->value('id'),
                    'orden' => 1,
                ]);

                Nav::firstOrCreate([
                    'nombre' => '276',
                    'url'   => '/nosotros/unete/276',
                    'ruta'   => 'nosotros.unete.276',
                    'slug' => 'nosotros-unete-276',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Unete')->value('id'),
                    'orden' => 2,
                ]);

                Nav::firstOrCreate([
                    'nombre' => 'Practicantes',
                    'url'   => '/nosotros/unete/Practicantes',
                    'ruta'   => 'nosotros.unete.practicantes',
                    'slug' => 'nosotros-unete-practicantes',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Unete')->value('id'),
                    'orden' => 3,
                ]);

            Nav::firstOrCreate([
                'nombre' => 'Mision y Vision',
                'url'   => '/nosotros/misionvision',
                'ruta'   => 'nosotros.misionvision',
                'slug' => 'nosotros-mision-vision',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),
                'orden' => 3,
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Valores',
                'url'   => '/nosotros/valores',
                'ruta'   => 'nosotros.valores',
                'slug' => 'nosotros-valores',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),
                'orden' => 4,
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Directorio',
                'url'   => '/nosotros/directorio',
                'ruta'   => 'nosotros.directorio',
                'slug' => 'nosotros-directorio',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),
                'orden' => 5,
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Organigrama',
                'url'   => '/nosotros/organigrama',
                'ruta'   => 'nosotros.organigrama',
                'slug' => 'nosotros-organigrama',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Nosotros')->value('id'),
                'orden' => 6,
            ]);

        Nav::firstOrCreate(['nombre' => 'Municipalidad', 'url' => '/municipalidad', 'ruta' => 'municipalidad','slug' => 'municipalidad','icono' => '','padre_id' => null,'orden' => 4]);

            Nav::firstOrCreate([
                'nombre' => 'Alcalde',
                'url'   => '/municipalidad/alcalde',
                'ruta'   => 'municipalidad.alcalde',
                'slug' => 'municipalidad-alcalde',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Municipalidad')->value('id'),
                'orden' => 1
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Consejo Munipal',
                'url'   => '/municipalidad/consejomunicipal',
                'ruta'   => 'municipalidad.consejomunicipal',
                'slug' => 'municipalidad-consejomunicipal',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Municipalidad')->value('id'),
                'orden' => 2
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Areas',
                'url'   => '/municipalidad/areas',
                'ruta'   => 'municipalidad.areas',
                'slug' => 'municipalidad-areas',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Municipalidad')->value('id'),
                'orden' => 3
            ]);


            Nav::firstOrCreate([
                'nombre' => 'Servicios',
                'url'   => '/municipalidad/servicios',
                'ruta'   => 'municipalidad.servicios',
                'slug' => 'municipalidad-servicios',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Municipalidad')->value('id'),
                'orden' => 3,
            ]);
    
                Nav::firstOrCreate([
                    'nombre' => 'Tramite Administrativo',
                    'url'   => '/municipalidad/servicios/tramiteadministrativo',
                    'ruta'   => 'municipalidad.servicios.tramiteadministrativo',
                    'slug' => 'municipalidad-servicios-tramiteadministrativo',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Servicios')->value('id'),
                    'orden' => 1,
                ]);
    
                Nav::firstOrCreate([
                    'nombre' => 'Licencias',
                    'url'   => '/municipalidad/servicios/licencias',
                    'ruta'   => 'municipalidad.servicios.licencias',
                    'slug' => 'municipalidad-servicios-licencias',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Servicios')->value('id'),
                    'orden' => 2,
                ]);
    
                Nav::firstOrCreate([
                    'nombre' => 'Servicio de Transporte',
                    'url'   => '/municipalidad/servicios/transporte',
                    'ruta'   => 'municipalidad.servicios.transporte',
                    'slug' => 'municipalidad-servicios-transporte',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Servicios')->value('id'),
                    'orden' => 3,
                ]);
            
                Nav::firstOrCreate([
                    'nombre' => 'Servicio Social',
                    'url'   => '/municipalidad/servicios/social',
                    'ruta'   => 'municipalidad.servicios.social',
                    'slug' => 'municipalidad-servicios-social',
                    'icono' => '',
                    'padre_id' => Nav::where('nombre', 'Servicios')->value('id'),
                    'orden' => 4,
                ]);

        Nav::firstOrCreate(['nombre' => 'Participación Ciudadana', 'url' => '/participacion/ciudadana', 'ruta' => 'participacion.ciudadana','slug' => 'participacion-ciudadana','icono' => '','padre_id' => null,'orden' => 5]);

            Nav::firstOrCreate([
                'nombre' => 'Audiencias Públicas',
                'url'   => '/participacionciudadana/audienciapublica',
                'ruta'   => 'participacionciudadana.audienciapublica',
                'slug' => 'participacionciudadana-audienciapublica',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Participación Ciudadana')->value('id'),
                'orden' => 1
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Consultas Ciudadanas',
                'url'   => '/participacionciudadana/consultaciudadana',
                'ruta'   => 'participacionciudadana.consultaciudadana',
                'slug' => 'participacionciudadana-consultaciudadana',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Participación Ciudadana')->value('id'),
                'orden' => 2
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Voluntariado',
                'url'   => '/participacionciudadana/voluntariado',
                'ruta'   => 'participacionciudadana.voluntariado',
                'slug' => 'participacionciudadana-voluntariado',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Participación Ciudadana')->value('id'),
                'orden' => 3
            ]);

        Nav::firstOrCreate([
            'nombre' => 'Noticias y Eventos',
            'url'   => 'noticiaseventos',
            'ruta'   => 'noticiaseventos',
            'slug' => 'noticias-eventos',
            'icono' => '',
            'padre_id' => null,
            'orden' => 6
        ]);

            Nav::firstOrCreate([
                'nombre' => 'Noticias',
                'url'   => '/noticiaseventos/noticias',
                'ruta'   => 'noticiaseventos.noticias',
                'slug' => 'noticiaseventos-noticias',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Noticias y Eventos')->value('id'),
                'orden' => 1
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Comunicados',
                'url'   => '/noticiaseventos/comunicados',
                'ruta'   => 'noticiaseventos.comunicados',
                'slug' => 'noticiaseventos-comunicados',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Noticias y Eventos')->value('id'),
                'orden' => 2
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Galeria',
                'url'   => '/noticiaseventos/galeria',
                'ruta'   => 'noticiaseventos.galeria',
                'slug' => 'noticiaseventos-galeria',
                'icono' => '',
                'padre_id' => Nav::where('nombre', 'Noticias y Eventos')->value('id'),
                'orden' => 3
            ]);

        Nav::firstOrCreate([
            'nombre' => 'Documentos Oficiales',
            'url'   => 'documentosoficiales',
            'ruta'   => 'documentosoficiales',
            'slug' => 'documentos-oficiales',
            'icono' => null,
            'padre_id' => null,
            'orden' => 7
        ]);

            Nav::firstOrCreate([
                'nombre' => 'Resolucion',
                'url'   => '/documentosoficiales/resolucion',
                'ruta'   => 'documentosoficiales.resolucion',
                'slug' => 'documentosoficiales-resolucion',
                'icono' => null,
                'padre_id' => Nav::where('nombre', 'Documentos Oficiales')->value('id'),
                'orden' => 1
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Directiva',
                'url'   => '/documentosoficiales/directiva',
                'ruta'   => 'documentosoficiales.directiva',
                'slug' => 'documentosoficiales-directiva',
                'icono' => null,
                'padre_id' => Nav::where('nombre', 'Documentos Oficiales')->value('id'),
                'orden' => 2
            ]);

            Nav::firstOrCreate([
                'nombre' => 'Oficio',
                'url'   => '/documentosoficiales/oficio',
                'ruta'   => 'documentosoficiales.oficio',
                'slug' => 'documentosoficiales-oficio',
                'icono' => null,
                'padre_id' => Nav::where('nombre', 'Documentos Oficiales')->value('id'),
                'orden' => 3
            ]);


        Nav::firstOrCreate([
            'nombre' => 'Contactenos',
            'url'   => '/Contactenos',
            'ruta'   => 'contactenos',
            'slug' => 'contactenos',
            'icono' => null,
            'padre_id' => null,
            'orden' => 8
        ]);

    }
}
