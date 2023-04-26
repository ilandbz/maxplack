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
        Nav::firstOrCreate(['nombre' => 'Home','slug' => '','icono' => '','padre_id' => null,'orden' => 1]);
        Nav::firstOrCreate([
            'nombre' => 'Home 01',
            'slug' => '/',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Home')->value('id'),
            'orden' => 1
        ]);
        Nav::firstOrCreate([
            'nombre' => 'Home 02',
            'slug' => 'index-2.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Home')->value('id'),
            'orden' => 2
        ]);
        Nav::firstOrCreate([
            'nombre' => 'Home 03',
            'slug' => 'index-3.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Home')->value('id'),
            'orden' => 3
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses',
            'slug' => '#',
            'icono' => '',
            'padre_id' => null,
            'orden' => 2,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses Grid',
            'slug' => '#',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 1,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses 01',
            'slug' => 'our-courses.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses Grid')->value('id'),
            'orden' => 1,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses 02',
            'slug' => 'our-courses-2.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses Grid')->value('id'),
            'orden' => 2,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses 03',
            'slug' => 'our-courses-3.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses Grid')->value('id'),
            'orden' => 3,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses Left Sidebar',
            'slug' => 'our-courses-left-sidebar.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses Grid')->value('id'),
            'orden' => 4,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses Right Sidebar',
            'slug' => 'our-courses-right-sidebar.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses Grid')->value('id'),
            'orden' => 5,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses',
            'slug' => '#',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 2,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses List',
            'slug' => 'our-courses-list.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 1,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses List Left Sidebar',
            'slug' => 'our-courses-list-left-sidebar.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 2,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses List Right Sidebar',
            'slug' => 'our-courses-list-right-sidebar.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 3,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Courses Details',
            'slug' => 'courses-details.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Courses')->value('id'),
            'orden' => 3,
        ]);

        //events
        Nav::firstOrCreate([
            'nombre' => 'Events',
            'slug' => '',
            'icono' => '',
            'padre_id' => null,
            'orden' => 3,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Event 01',
            'slug' => 'event.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Events')->value('id'),
            'orden' => 1,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Event 02',
            'slug' => 'event-2.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Events')->value('id'),
            'orden' => 2,
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Event Details',
            'slug' => 'event-details.html',
            'icono' => '',
            'padre_id' => Nav::where('nombre', 'Events')->value('id'),
            'orden' => 3,
        ]);
        //Pages
        Nav::firstOrCreate([
            'nombre' => 'Pages',
            'slug' => '#',
            'icono' => '',
            'padre_id' => null,
            'orden' => 4,
        ]);
        $parentMenu = Nav::where('nombre', 'Pages')->first();

        // Creamos los submenús
        Nav::firstOrCreate([
            'nombre' => 'About',
            'slug' => 'about-us.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 1
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Teachers',
            'slug' => 'teachers.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 2
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Teachers Details',
            'slug' => 'teacher-details.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 3
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Gallery',
            'slug' => 'gallery.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 4
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Gallery Masonry',
            'slug' => 'gallery-masonry.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 5
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Testimonial',
            'slug' => 'testimonial.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 6
        ]);

        Nav::firstOrCreate([
            'nombre' => 'FAQ\'S',
            'slug' => 'faq.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 7
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Notice',
            'slug' => 'notice.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 8
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Login',
            'slug' => 'login.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 9
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Register',
            'slug' => 'register.html',
            'icono' => '',
            'padre_id' => $parentMenu->id,
            'orden' => 10
        ]);
        //shop
        Nav::firstOrCreate([
            'nombre' => 'Shop',
            'slug' => 'shop',
            'icono' => null,
            'padre_id' => null,
            'orden' => 1
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Shop',
            'slug' => 'shop',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Shop')->value('id'),
            'orden' => 2
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Shop Left Sidebar',
            'slug' => 'shop-left-sidebar',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Shop')->value('id'),
            'orden' => 3
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Shop Right Sidebar',
            'slug' => 'shop-right-sidebar',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Shop')->value('id'),
            'orden' => 4
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Shop Details',
            'slug' => 'shop-details',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Shop')->value('id'),
            'orden' => 5
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Blog',
            'slug' => 'blog',
            'icono' => null,
            'padre_id' => null,
            'orden' => 6
        ]);
        //blog
        Nav::firstOrCreate([
            'nombre' => 'Blog',
            'slug' => 'blog',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Blog')->value('id'),
            'orden' => 7
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Blog Left Sidebar',
            'slug' => 'blog-left-sidebar',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Blog')->value('id'),
            'orden' => 8
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Blog Right Sidebar',
            'slug' => 'blog-right-sidebar',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Blog')->value('id'),
            'orden' => 9
        ]);

        Nav::firstOrCreate([
            'nombre' => 'Blog Details',
            'slug' => 'blog-details',
            'icono' => null,
            'padre_id' => Nav::where('nombre', 'Blog')->value('id'),
            'orden' => 10
        ]);
        Nav::firstOrCreate([
            'nombre' => 'Contact',
            'slug' => 'contact',
            'icono' => 'far fa-envelope',
            'padre_id' => null,
            'orden' => 11
        ]);
    }
}
