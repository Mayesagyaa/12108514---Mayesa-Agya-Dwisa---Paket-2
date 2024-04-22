<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DummyUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = [
            [
                'name'=> 'Admin',
                'email' => 'admin@gmail.com',
                'role' => 'admin',
                'password' => '12345', // Tidak perlu di-hash dengan bcrypt()
            ], 
            [
                'name'=> 'Petugas',
                'email' => 'petugas@gmail.com',
                'role' => 'petugas',
                'password' => '12345', // Tidak perlu di-hash dengan bcrypt()
            ], 
        ];

        foreach($userData as $val ){
            User::create($val);
        }
    }
}
