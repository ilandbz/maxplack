<?php

namespace Database\Seeders;

use App\Models\Popup;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PopupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Popup::firstOrCreate([
            'titulo'    => 'Popup Inicial',
        ]);

    }
}
