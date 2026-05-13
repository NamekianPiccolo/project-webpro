<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class InventarisSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'nama_alat'   => 'Mikroskop Binokuler',
                'jumlah'      => 5,
                'kondisi'     => 'Baik',
                'kategori'    => 'Elektronika',
                'deskripsi'   => 'Mikroskop cahaya dengan dua lensa okuler untuk pengamatan spesimen biologi.',
                'foto_barang' => 'mikroskop.jpg', // Nama file contoh
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
            [
                'nama_alat'   => 'Solder Listrik',
                'jumlah'      => 10,
                'kondisi'     => 'Baik',
                'kategori'    => 'Elektronika',
                'deskripsi'   => 'Alat pemanas untuk menyambungkan komponen elektronika pada PCB.',
                'foto_barang' => 'solder.jpg',
                'created_at'  => date('Y-m-d H:i:s'),
                'updated_at'  => date('Y-m-d H:i:s'),
            ],
        ];

        // Memasukkan data ke tabel 'alat_laboratorium'
        $this->db->table('inventaris')->insertBatch($data);
    }
}