<?php

namespace Database\Seeders;

use App\Models\Nav;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NavSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Nav::firstOrCreate(['nombre' => 'Inicio', 'url' => '/', 'ruta' => 'home','slug' => '/','icono' => '','padre_id' => null,'orden' => 1]);

        $padreNosotros= Nav::firstOrCreate(['nombre' => 'Nosotros', 'url' => '#', 'ruta' => 'nosotros','slug' => 'nosotros','icono' => '','padre_id' => null,'orden' => 2]);

        $submenus = [
            [
                'nombre' => 'Reseña Historia',
                'url'   => 'historia/',
                'ruta'   => 'nosotros.historia',
                'slug' => 'nosotros-historia',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 1,
            ],
            [
                'nombre' => 'Misión y Visión',
                'url'   => 'mision-y-vision/',
                'ruta'   => 'misionvision',
                'slug' => 'mision-vision',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 2,
            ],
            [
                'nombre' => 'Reglamento Interno',
                'url'   => 'reglamento-interno/',
                'ruta'   => 'nosotros.reglamento-interno',
                'slug' => 'nosotros-reglamento-interno',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 3,
            ],
            [
                'nombre' => 'Valores Institucionales',
                'url'   => 'directorio-institucional-2/',
                'ruta'   => 'nosotros.directorio-institucional-2',
                'slug' => 'nosotros-directorio-institucional-2',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 4,
            ],
            [
                'nombre' => 'Directorio Institucional',
                'url'   => 'directorio-institucional/',
                'ruta'   => 'nosotros.directorio-institucional',
                'slug' => 'nosotros-directorio-institucional',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 5,
            ],
            [
                'nombre' => 'Organigrama',
                'url'   => 'organigrama-institucional/',
                'ruta'   => 'nosotros.organigrama-institucional',
                'slug' => 'nosotros-organigrama-institucional',
                'icono' => '',
                'padre_id' => $padreNosotros->id,
                'orden' => 6,
            ],
        ];

        foreach ($submenus as $submenu) {//MENU 1
            Nav::firstOrCreate($submenu);
        }

        $padreProgramas= Nav::firstOrCreate(['nombre' => 'Programas', 'url' => '#', 'ruta' => 'programa','slug' => 'programa','icono' => '','padre_id' => null,'orden' => 3]);

        $submenus = [
            [
                'nombre' => 'Produccion Agropecuaria',
                'url'   => 'produccion-agropecuaria',
                'ruta'   => 'produccion.agropecuaria',
                'slug' => 'produccion-agropecuaria',
                'icono' => '',
                'padre_id' => $padreProgramas->id,
                'orden' => 1,
            ],
            [
                'nombre' => 'Enfermeria Tecnica',
                'url'   => 'enfermeria-tecnica',
                'ruta'   => 'enfermeria.tecnica',
                'slug' => 'enfermeria-tecnica',
                'icono' => '',
                'padre_id' => $padreProgramas->id,
                'orden' => 2,
            ],
        ];

        foreach ($submenus as $submenu) {//MENU 2
            Nav::firstOrCreate($submenu);
        }
        $padreServicios= Nav::firstOrCreate(['nombre' => 'Servicios', 'url' => '#', 'ruta' => 'servicios-academicos','slug' => 'servicios-academicos','icono' => '','padre_id' => null,'orden' => 4]);

        $submenusServicios = [
            'Admisión',
            'Matrícula',
            'Aula Virtual',
            'Biblioteca Virtual',
            'Titulación',
            'Centro de Aplicación',
            'Proyecto Productivo',
            'Programa de Especialización',
            'Programa de Formación',
            'Nivelación Académica',
            'Continua'
        ];

        foreach ($submenusServicios as $orden => $nombre) {
            Nav::firstOrCreate([
                'nombre' => $nombre,
                'url'   => '/' . Str::slug($nombre, '-'),
                'ruta'   => 'servicios.' . Str::slug($nombre, '_'), //
                'slug' => 'servicios-' . Str::slug($nombre, '-'),
                'icono' => '',
                'padre_id' => $padreServicios->id,
                'orden' => $orden + 1,
            ]);
        }

 
        // $padreTransparencia= Nav::firstOrCreate(['nombre' => 'Transparencia', 'url' => '#', 'ruta' => 'transparencia','slug' => 'transparencia','icono' => '','padre_id' => null,'orden' => 5]);

        // $submenusNombres = [
        //     'Resolución de Validación',
        //     'Convenios',
        //     'Comunicados',
        //     'Documentos de Gestión',
        //     'Publicaciones',
        //     'Calendario de actividades'
        // ];

        
        // foreach ($submenusNombres as $orden => $nombre) {
        //     Nav::firstOrCreate([
        //         'nombre' => $nombre,
        //         'url'   => '/' . Str::slug($nombre, '-'), 
        //         'ruta'   => 'recursos.' . Str::slug($nombre, '-'), 
        //         'slug' => 'recursos-' . Str::slug($nombre, '-'), 
        //         'icono' => '',
        //         'padre_id' => $padreTransparencia->id, 
        //         'orden' => $orden + 1, 
        //     ]);
        // }
        // $padreInformacion= Nav::firstOrCreate(['nombre' => 'Información', 'url' => '#', 'ruta' => 'informacion','slug' => 'informacion','icono' => '','padre_id' => null,'orden' => 6]);
        
        // $submenusNombres = [
        //     'Trámites',
        //     'Convocatoria de Docentes',
        //     'Bolsa de Trabajo',
        //     'Servicios'
        // ];

        
        // foreach ($submenusNombres as $orden => $nombre) {
        //     Nav::firstOrCreate([
        //         'nombre' => $nombre,
        //         'url'   => '/' . Str::slug($nombre, '-'), 
        //         'ruta'   => 'recursos.' . Str::slug($nombre, '-'), 
        //         'slug' => 'recursos-' . Str::slug($nombre, '-'), 
        //         'icono' => '',
        //         'padre_id' => $padreInformacion->id, 
        //         'orden' => $orden + 1, 
        //     ]);
        // }
       

        // $padreInformacion= Nav::firstOrCreate(['nombre' => 'Galeria', 'url' => '#', 'ruta' => 'galeria','slug' => 'galeria','icono' => '','padre_id' => null,'orden' => 7]);

        // $padreInformacion= Nav::firstOrCreate(['nombre' => 'Noticias', 'url' => '#', 'ruta' => 'noticias','slug' => 'noticias','icono' => '','padre_id' => null,'orden' => 8]);

        $padreInformacion= Nav::firstOrCreate(['nombre' => 'Contactenos', 'url' => '#', 'ruta' => 'contactenos','slug' => 'contactenos','icono' => '','padre_id' => null,'orden' => 9]);




    }
}
