<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'     => 'Admin',
            'email'    => 'admin@gmail.com',
            'password' => Hash::make('admin1234'),
            'role'     => 'admin',
            'status'   => 1
        ]);

        User::create([
            'name'     => 'Guru',
            'email'    => 'guru@gmail.com',
            'password' => Hash::make('guru1234'),
            'role'     => 'guru',
            'status'   => 1
        ]);

        User::create([
            'name'     => 'Murid',
            'email'    => 'murid@gmail.com',
            'password' => Hash::make('murid1234'),
            'role'     => 'murid',
            'status'   => 1
        ]);
    }
}
