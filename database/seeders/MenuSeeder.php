<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\Role;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::select('id')->where('nombre','Super Usuario')->first();


        $menuspadres = [
            [
                'nombre' => 'Dashboard',
                'slug' => 'principal',
                'icono' => 'fas fa-gauge fa-fw',
                'padre_id' => null,
                'orden' => 0
            ],
            [
                'nombre' => 'Sistema',
                'slug' => 'sistema',
                'icono' => 'fab fa-windows fa-fw',
                'padre_id' => null,
                'orden' => 1,
            ],
            [
                'nombre' => 'Configuraciones',
                'slug' => 'configuracion',
                'icono' => 'fas fa-cogs',
                'padre_id' => null,
                'orden' => 2,
            ],
            [
                'nombre' => 'Portal',
                'slug' => '/',
                'icono' => 'fab fa-windows fa-fw',
                'padre_id' => null,
                'orden' => 4
            ],
            [
                'nombre' => 'Entradas',
                'slug' => 'e',
                'icono' => 'fas fa-id-badge',
                'padre_id' => null,
                'orden' => 3,
            ],
        ];

        foreach($menuspadres as $item){
            $menu = Menu::firstorCreate($item);
            //$role1->menus()->sync($menu->id);
            $role1->menus()->attach($menu->id);
        }


        $menushijos = [
            [
                'nombre' => 'Menus',
                'slug'  => 'menus',
                'icono' => 'fas fa-bars',
                'padre_id' => Menu::where('nombre', 'Sistema')->value('id'),
                'orden' => Menu::where('nombre', 'Sistema')->max('orden')+1,
            ],
            [
                'nombre' => 'Roles',
                'slug' => 'roles',
                'icono' => 'fas fa-user-lock',
                'padre_id' => Menu::where('nombre', 'Sistema')->value('id'),
                'orden' => Menu::where('nombre', 'Sistema')->max('orden')+1,
            ],
            [
                'nombre' => 'Usuarios',
                'slug' => 'usuarios',
                'icono' => 'fa-solid fa-users',
                'padre_id' => Menu::where('nombre', 'Sistema')->value('id'),
                'orden' => Menu::where('nombre', 'Sistema')->max('orden')+1,
            ],
            [
                'nombre' => 'Menu Roles',
                'slug' => 'menu-roles',
                'icono' => 'fas fa-user-minus fa-fw',
                'padre_id' => Menu::where('nombre', 'Sistema')->value('id'),
                'orden' => Menu::where('nombre', 'Sistema')->max('orden')+1,
            ],
            [
                'nombre' => 'Archivos',
                'slug' => 'archivos',
                'icono' => 'fas fa-file',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Slider',
                'slug' => 'slider',
                'icono' => 'fas fa-sliders-h',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Convocatorias',
                'slug' => 'convocatoria',
                'icono' => 'fas fa-bullhorn',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Directorio',
                'slug' => 'directorio',
                'icono' => 'fas fa-address-book',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Noticias',
                'slug' => 'noticia',
                'icono' => 'fas fa-newspaper',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Popup',
                'slug' => 'popup',
                'icono' => 'fas fa-window-maximize',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],

            [
                'nombre' => 'Galeria',
                'slug' => 'galeria',
                'icono' => 'fas fa-images',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Galeria',
                'slug' => 'galeria',
                'icono' => 'fas fa-images',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Galeria',
                'slug' => 'galeria',
                'icono' => 'fas fa-images',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Galeria',
                'slug' => 'galeria',
                'icono' => 'fas fa-images',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Comunicado',
                'slug' => 'comunicado',
                'icono' => 'fas fa-bullhorn',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Enlaces Externos',
                'slug' => 'enlaces',
                'icono' => 'fas fa-external-link-alt',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Redes Sociales',
                'slug' => 'redes',
                'icono' => 'fab fa-facebook',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Datos Generales',
                'slug' => 'dato-general',
                'icono' => 'fas fa-cogs',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Cargos',
                'slug' => 'cargos',
                'icono' => 'fas fa-briefcase',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Areas',
                'slug' => 'areas',
                'icono' => 'fas fa-user-friends',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Tipo Convocatoria',
                'slug' => 'tipo-convocatoria',
                'icono' => 'fas fa-tasks',
                'padre_id' => Menu::where('nombre', 'Configuraciones')->value('id'),
                'orden' => Menu::where('nombre', 'Configuraciones')->max('orden')+1,
            ],
            [
                'nombre' => 'Entradas',
                'slug' => 'entrada',
                'icono' => 'fas fa-globe',
                'padre_id' => Menu::where('nombre', 'Entradas')->value('id'),
                'orden' => Menu::where('nombre', 'Entradas')->max('orden')+1,
            ],
            [
                'nombre' => 'Secciones',
                'slug' => 'secciones',
                'icono' => 'fas fa-globe',
                'padre_id' => Menu::where('nombre', 'Entradas')->value('id'),
                'orden' => Menu::where('nombre', 'Entradas')->max('orden')+1,
            ],            
        ];

        foreach($menushijos as $item){
            $menu = Menu::firstorCreate($item);
            $role1->menus()->attach($menu->id);
        }       

        // $role1->menus()->sync([
        //     $menu1->id, 
        //     $menu2->id,
        //     $menu3->id,
        //     $menu4->id, 
        //     $menu5->id,
        //     $menu6->id,
        //     $menu7->id,
        //     $menu8->id,
        //     $menu9->id,
        //     $menu10->id,
        //     $menu11->id,
        //     $menu12->id,
        //     $menu13->id,
        //     $menu14->id,
        //     $menu15->id,
        //     $menu16->id,
        //     $menu17->id,
        //     $menu18->id,
        //     $menu19->id,
        //     $menu20->id,
        //     $menu21->id,

        // ]);
    }
}