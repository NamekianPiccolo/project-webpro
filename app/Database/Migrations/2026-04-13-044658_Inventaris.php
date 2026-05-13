<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Inventaris extends Migration
{

        public function up()
    {
        $this->forge->addField([
            'id'                => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'nama_alat'         => ['type' => 'VARCHAR', 'constraint' => '255'],
            'kategori_id'       => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'lokasi_id'         => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'null' => true],
            'jumlah'            => ['type' => 'INT', 'constraint' => 11, 'default' => 1],
            'kondisi'           => ['type' => 'ENUM', 'constraint' => ['Baik', 'Rusak Ringan', 'Rusak Berat'], 'default' => 'Baik'],
            'kategori'          => ['type' => 'VARCHAR', 'constraint' => '100'],
            'deskripsi'         => ['type' => 'TEXT', 'null' => true],
            'foto_barang'       => ['type' => 'VARCHAR', 'constraint' => '255', 'null' => true],
            'created_at'        => ['type' => 'DATETIME', 'null' => true],
            'updated_at'        => ['type' => 'DATETIME', 'null' => true],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('inventaris');
        $this->forge->addForeignKey('kategori_id', 'kategori', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('lokasi_id', 'lokasi', 'id', 'CASCADE', 'CASCADE');
    }



    public function down()
    {
        $this->forge->dropTable('inventaris');
    }
}