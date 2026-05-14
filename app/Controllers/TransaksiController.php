<?php

namespace App\Controllers;

use App\Models\Transaksi;
use App\Models\Inventaris;

class TransaksiController extends BaseController
{
    // ... fungsi index, tambah, dan simpan tetap seperti kode kamu ...

    public function index()
    {
        $transaksiModel = new \App\Models\Transaksi();
        $data['semua_riwayat'] = $transaksiModel->select('transaksi.*, inventaris.nama_alat as barang, transaksi.nama_peminjam as peminjam')
            ->join('inventaris', 'inventaris.id = transaksi.id_barang')
            ->orderBy('transaksi.id', 'DESC')
            ->findAll();

        return view('riwayat', $data); 
    }

    public function tambah()
    {
        $inventarisModel = new \App\Models\Inventaris();
        $data['list_barang'] = $inventarisModel->where('jumlah >', 0)->findAll();
        return view('peminjaman', $data);
    }

    public function simpan()
    {
        $transaksiModel = new Transaksi();
        $inventarisModel = new Inventaris();

        $id_barang = $this->request->getPost('id_barang');
        $jumlah_pinjam = $this->request->getPost('jumlah');
        $barang = $inventarisModel->find($id_barang);

        if (!$barang) return redirect()->back()->with('error', 'Barang tidak ditemukan!');
        if ($barang['jumlah'] < $jumlah_pinjam) return redirect()->back()->with('error', 'Stok tidak mencukupi!');

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
            $stok_baru = $barang['jumlah'] - $jumlah_pinjam;
            $inventarisModel->update($id_barang, ['jumlah' => $stok_baru]);
            return redirect()->to(base_url('riwayat'))->with('success', 'Berhasil disimpan!');
        }
        return redirect()->to(base_url('transaksi'));
    }

    // --- TAMBAHKAN FUNGSI INI ---
    public function kembalikan($id)
    {
        $transaksiModel = new Transaksi();
        $inventarisModel = new Inventaris();

        // 1. Cari data transaksi
        $transaksi = $transaksiModel->find($id);

        if ($transaksi) {
            // Cek apakah sudah dikembalikan sebelumnya (mencegah double stok)
            if ($transaksi['status'] == 'Dikembalikan') {
                return redirect()->to(base_url('riwayat'))->with('error', 'Barang ini sudah dikembalikan!');
            }

            // 2. Ambil data barang
            $barang = $inventarisModel->find($transaksi['id_barang']);

            // 3. Tambah stok barang kembali
            $stok_sekarang = $barang['jumlah'];
            $stok_kembali = $transaksi['jumlah'];
            $stok_final = $stok_sekarang + $stok_kembali;

            // 4. Update stok di tabel inventaris
            $inventarisModel->update($transaksi['id_barang'], ['jumlah' => $stok_final]);

            // 5. Update status transaksi dan set tanggal pengembalian ke waktu sekarang
            $transaksiModel->update($id, [
                'status' => 'Dikembalikan',
                'tanggal_pengembalian' => date('Y-m-d H:i:s')
            ]);

            return redirect()->to(base_url('riwayat'))->with('success', 'Barang berhasil dikembalikan. Stok telah diperbarui!');
        }

        return redirect()->to(base_url('riwayat'))->with('error', 'Data transaksi tidak ditemukan!');
    }
}