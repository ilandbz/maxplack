<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            NavSeeder::class,
            OrganizacionSeeder::class,
            RedesSocialesSeeder::class,
            SliderSeeder::class,
            EntradaSeeder::class,
            SeccionesPrincipalSeeder::class,
            EnlaceSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,
            MenuSeeder::class,
            EtapaConvocatoriaSeeder::class,
            TipoConvocatoriaSeeder::class,
            CargoSeeder::class,
            AreaSeeder::class,
            DirectorioSeeder::class,
            PopupSeeder::class,
            ComunicadoSeeder::class,
            NoticiaSeeder::class,
            ImagenNoticiaSeeder::class
        ]);

    }
}
