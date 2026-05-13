<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Createlokasi extends Migration
{
    public function up()
    {
        // 1. Definisikan kolom-kolom untuk tabel lokasi
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 11,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'nama_lokasi' => [
                'type'       => 'VARCHAR',
                'constraint' => '100',
            ],
            'keterangan' => [
                'type' => 'TEXT',
                'null' => true, // Mengizinkan field ini kosong jika tidak ada keterangan
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
        ]);

        // 2. Set 'id' sebagai Primary Key
        $this->forge->addKey('id', true);

        // 3. Buat tabelnya (disini saya beri nama 'lokasi')
        $this->forge->createTable('createlokasis');
    }

    public function down()
{
    $this->forge->dropTable('createlokasis', true);
}
}