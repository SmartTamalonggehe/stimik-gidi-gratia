<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $admin->assignRole('Admin');

        $diaken = User::create([
            'name' => 'Diaken',
            'email' => 'diaken@mail.com',
            'password' => bcrypt('12345678'),
        ]);
        $diaken->assignRole('Diaken');
    }
}
