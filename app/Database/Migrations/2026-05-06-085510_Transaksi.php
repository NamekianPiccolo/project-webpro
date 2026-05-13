<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Transaksi extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'                   => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true, 'auto_increment' => true],
            'id_user'              => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'id_barang'            => ['type' => 'INT', 'constraint' => 11, 'unsigned' => true],
            'nama_peminjam'        => ['type' => 'VARCHAR', 'constraint' => 255],
            'nim'                  => ['type' => 'VARCHAR', 'constraint' => 20],
            'keperluan'            => ['type' => 'TEXT'],
            'jumlah'               => ['type' => 'INT', 'constraint' => 11],
            'tanggal_peminjaman'   => ['type' => 'DATETIME'],
            'tanggal_pengembalian' => ['type' => 'DATETIME'], // SUDAH DIPERBAIKI (Bukan DATATIME)
            'status'               => ['type' => 'ENUM', 'constraint' => ['Dipinjam', 'Kembali'], 'default' => 'Dipinjam'],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('transaksi');
    }

    public function down()
    {
        // Disamakan namanya dengan fungsi up
        $this->forge->dropTable('transaksi'); 
    }
}