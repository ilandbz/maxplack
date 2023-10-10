<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::firstOrCreate([
            'name'          => 'ilandbz',
            'password'      => Hash::make('818949'),
            'role_id'       => Role::where('nombre', 'Super Usuario')->value('id')
        ]);
    }
}
