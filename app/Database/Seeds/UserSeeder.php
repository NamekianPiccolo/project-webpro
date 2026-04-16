<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nim'          => '220101',
                'username' => 'Administrator Lab',
                'password'     => password_hash('12345', PASSWORD_DEFAULT),
                'created_at'   => date('Y-m-d H:i:s'),
            ],
            [
                'nim'          => '220102',
                'username' => 'Teknisi Elektro',
                'password'     => password_hash('12345', PASSWORD_DEFAULT),
                'created_at'   => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel 'users'
        $this->db->table('users')->insertBatch($data);
    }
}