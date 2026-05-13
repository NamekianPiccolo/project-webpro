<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nim'        => '12345',
                'username'   => 'admin_lab',
                'password'   => password_hash('admin123', PASSWORD_DEFAULT),
                'role'       => 'admin',
                'created_at' => date('Y-m-d H:i:s'),
            ],
            [
                'nim'        => '67890',
                'username'   => 'mahasiswa_user',
                'password'   => password_hash('user123', PASSWORD_DEFAULT),
                'role'       => 'customer',
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ];

        // Pastikan nama tabel adalah 'users' sesuai dengan migration kamu
        $this->db->table('users')->insertBatch($data);
    }
}