<?php

namespace Database\Seeders;

use App\Models\Slider;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Slider::firstOrCreate([
            'titulo' => 'Education is the most powerful Weapon',
            'subtitulo' =>  'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia eum minima ipsam tenetur co',
            'nombrebutton1' => 'View Courses',
            'nombrebutton2' => 'Learn more',
            'link1' => 'our-courses-left-sidebar.html',
            'link2' => '#',
            'nombreImagen' => 'slider-1.webp'
        ]);
        Slider::firstOrCreate([
            'titulo' => 'Education is the most powerful Weapon',
            'subtitulo' =>  null,
            'nombrebutton1' => 'View Courses',
            'nombrebutton2' => null,
            'link1' => 'our-courses-left-sidebar.html',
            'link2' => null,
            'nombreImagen' => 'slider-2.webp'
        ]);
        Slider::firstOrCreate([
            'titulo' => 'Education is the most powerful Weapon 33',
            'subtitulo' =>  null,
            'nombrebutton1' => 'View Courses',
            'nombrebutton2' => null,
            'link1' => 'our-courses-left-sidebar.html',
            'link2' => null,
            'nombreImagen' => 'slider-2-1.webp'
        ]);
    }
}
