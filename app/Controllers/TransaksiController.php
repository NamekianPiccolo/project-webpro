<?php

namespace App\Controllers;

use App\Models\Transaksi;
use App\Models\Inventaris;

class TransaksiController extends BaseController
{
    // Halaman Riwayat (Tabel)
   // Menampilkan Tabel Riwayat
    public function index()
    {
        $transaksiModel = new \App\Models\Transaksi();
        
        // Key 'semua_riwayat' harus sama dengan yang ada di foreach View kamu
        $data['semua_riwayat'] = $transaksiModel->select('transaksi.*, inventaris.nama_alat as barang, transaksi.nama_peminjam as peminjam')
            ->join('inventaris', 'inventaris.id = transaksi.id_barang')
            ->orderBy('transaksi.id', 'DESC')
            ->findAll();

        // Pastikan file ini ada di app/Views/transaksi/index.php
        return view('riwayat', $data); 
    }

    // Menampilkan Form Tambah
    public function tambah()
    {
        $inventarisModel = new \App\Models\Inventaris();
        $data['list_barang'] = $inventarisModel->where('jumlah >', 0)->findAll();
        
        // Pastikan file ini ada di app/Views/transaksi/peminjaman.php
        return view('peminjaman', $data);
    }

    public function simpan()
    {
        $transaksiModel = new Transaksi();
        $inventarisModel = new Inventaris();

        $id_barang = $this->request->getPost('id_barang');
        $jumlah_pinjam = $this->request->getPost('jumlah');

        $barang = $inventarisModel->find($id_barang);

        if (!$barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        }
        
        if ($barang['jumlah'] < $jumlah_pinjam) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi!');
        }

        $data = [
            'id_user'              => session()->get('id_user') ?? 1,
            'id_barang'            => $id_barang,
            'nama_peminjam'        => $this->request->getPost('nama_peminjam'),
            'nim'                  => $this->request->getPost('nim'),
            'keperluan'            => $this->request->getPost('keperluan'),
            'jumlah'               => $jumlah_pinjam,
            'tanggal_peminjaman'   => date('Y-m-d H:i:s'),
            'tanggal_pengembalian' => $this->request->getPost('tanggal_pengembalian'),
            'status'               => 'Dipinjam'
        ];

        if($transaksiModel->insert($data)) {
            // Potong Stok
            $stok_baru = $barang['jumlah'] - $jumlah_pinjam;
            $inventarisModel->update($id_barang, ['jumlah' => $stok_baru]);
            
            // Redirect ke halaman riwayat (index)
            return redirect()->to(base_url('riwayat'))->with('success', 'Berhasil disimpan!');
        }

        return redirect()->to(base_url('transaksi'));
    }
}