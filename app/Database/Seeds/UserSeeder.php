<?php

namespace App\Database\Seeds;

use App\Models\User;
use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $user = new User();

        $user->insert([
            'name' => 'Admin',
            'password' => password_hash('rahasia', PASSWORD_DEFAULT),
            'email' => 'admin@mail.com',
            'role' => 'admin'
        ]);
    }
}
