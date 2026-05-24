<?php

namespace App\Controllers;

use App\Models\Transaksi;
use App\Models\Inventaris;
use App\Models\Kategori;
use App\Models\Createlokasi;

class Home extends BaseController
{
    public function index()
    {
        $transaksiModel = new Transaksi();
        $inventarisModel = new Inventaris();
        $kategoriModel = new Kategori();
        $lokasiModel = new Createlokasi();
        
        // Join dengan inventaris untuk mendapatkan nama_alat
        $recentLoans = $transaksiModel
            ->select('transaksi.*, inventaris.nama_alat')
            ->join('inventaris', 'inventaris.id = transaksi.id_barang', 'left')
            ->orderBy('transaksi.tanggal_peminjaman', 'DESC')
            ->limit(5)
            ->findAll();

        // Hitung statistik dinamis dari database
        $totalBarang = $inventarisModel->selectSum('jumlah')->first();
        $totalKategori = $kategoriModel->countAllResults();
        $totalLokasi = $lokasiModel->countAllResults();
        
        // Asumsi status pinjam adalah 'Dipinjam'
        $sedangDipinjam = $transaksiModel->where('status', 'Dipinjam')->countAllResults();

        $data = [
            'title'          => 'Dashboard',
            'recent_loans'   => $recentLoans,
            'total_barang'   => $totalBarang['jumlah'] ?? 0,
            'total_kategori' => $totalKategori,
            'total_lokasi'   => $totalLokasi,
            'sedang_dipinjam'=> $sedangDipinjam
        ];

        return view('halaman_utama', $data);
    }
}