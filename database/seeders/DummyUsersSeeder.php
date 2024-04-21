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
                'email' => 'adminn@gmail.com',
                'role' => 'admin',
                'password' => '12345', // Tidak perlu di-hash dengan bcrypt()
            ], 
            [
                'name'=> 'Petugas',
                'email' => 'petugass@gmail.com',
                'role' => 'petugas',
                'password' => '12345', // Tidak perlu di-hash dengan bcrypt()
            ], 
        ];

        foreach($userData as $key => $val ){
            User::create($val);
        }
    }
}
