<?php
namespace App\Controllers;

class Home extends BaseController {
    public function index() { return view('halaman_utama'); }

    // Manajemen Barang: Tetap di halaman ini (sesuai gambar kamu) 
    public function inventaris() {
        $data['barang'] = [
            ['nama' => 'Mikroskop Binokuler', 'jumlah' => 5, 'kondisi' => 'Baik', 'deskripsi' => 'Lensa 40x']
        ];
        return view('inventaris', $data);
    }

    // Kategori & Lokasi: Pindah ke halaman baru saat diklik "Tambah" 
    public function kategori() {
        $data['kategori'] = [['nama' => 'Elektronika'], ['nama' => 'Optik']];
        return view('kategori', $data);
    }
    public function tambah_kategori() { return view('tambah_kategori'); }

    public function lokasi() {
        $data['lokasi'] = [['nama' => 'Rak A'], ['nama' => 'Lemari 1']];
        return view('lokasi', $data);
    }
    public function tambah_lokasi() { return view('tambah_lokasi'); }

    public function tambah() { return view('tambah_alat'); }
    public function peminjaman() { return view('peminjaman'); }
    public function riwayat()
{
    $data['semua_riwayat'] = [
        [
            'nim'      => '220101001',
            'peminjam' => 'Budi Santoso',
            'barang'   => 'Mikroskop Binokuler',
            'jumlah'   => 1, // Tambahan Jumlah Pinjam
            'tgl_pinjam' => '07 Apr 2026',
            'status'   => 'Dipinjam'
        ],
        [
            'nim'      => '220101045',
            'peminjam' => 'Ani Wijaya',
            'barang'   => 'Solder Station',
            'jumlah'   => 2, // Tambahan Jumlah Pinjam
            'tgl_pinjam' => '05 Apr 2026',
            'status'   => 'Kembali'
        ],
    ];
    return view('riwayat', $data);
}
    
    public function login()
{
    return view('login'); // Pastikan kamu punya file login.php di folder Views
}
}