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
            'nik' => '1',
            'username' => 'admin',
            'password' => bcrypt('admin1234')
        ]);

        $admin->assignRole('admin');

        $admin = User::create([
            'nik' => '2',
            'username' => 'kades',
            'password' => bcrypt('kades1234')
        ]);

        $admin->assignRole('kades');
        
    }
}
