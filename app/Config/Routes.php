<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Login & Dashboard [cite: 4, 5]
$routes->get('/', 'Home::index');
$routes->get('/login', 'AutentikasiController::login');
$routes->post('/login-auth', 'AutentikasiController::login_auth');
$routes->get('/register', 'AutentikasiController::register');
$routes->post('/register-save', 'AutentikasiController::register_save');
$routes->get('/logout', 'AutentikasiController::logout');


// 2. Manajemen Barang (CRUD & Upload Foto) [cite: 6, 7, 12]
$routes->get('/inventaris'  ,   'InventarisController::inventaris');
$routes->get('/tambah-alat' ,   'InventarisController::tambah');
$routes->post('/simpan-alat',   'InventarisController::simpan_alat');
$routes->get('inventaris/hapus/(:num)',   'InventarisController::hapus_inventaris/$1'); // Halaman form tambah barang
$routes->get('inventaris/edit/(:num)',    'InventarisController::edit_inventaris/$1');
$routes->post('inventaris/update/(:num)', 'InventarisController::update_inventaris/$1');


// 3. Kategori Barang (CRUD) [cite: 8, 9]
$routes->get('/kategori',               'KategoriController::kategori');
$routes->get('/tambah-kategori',        'KategoriController::tambah_kategori'); 
$routes->get('tambah-kategori',         'KategoriController::tambah_kategori'); // Form tambah
$routes->post('simpan-kategori',        'KategoriController::simpan_kategori');
$routes->get('kategori/hapus/(:num)',   'KategoriController::hapus_kategori/$1');// Halaman form tambah kategori (Page Baru)
$routes->get('kategori/edit/(:num)',    'KategoriController::edit_kategori/$1');
$routes->post('kategori/update/(:num)', 'KategoriController::update_kategori/$1');


// 4. Lokasi Barang (CRUD) [cite: 10, 11]
// Rute untuk Lokasi
$routes->get('/lokasi', 'LokasiController::lokasi');
$routes->get('/tambah-lokasi', 'LokasiController::tambah_lokasi');
$routes->post('/simpan_lokasi', 'LokasiController::simpan_lokasi');
$routes->get('/lokasi/hapus/(:num)', 'LokasiController::hapus_lokasi/$1');
$routes->get('lokasi/edit/(:num)',    'LokasiController::edit_lokasi/$1');
$routes->post('lokasi/update/(:num)', 'LokasiController::update_lokasi/$1');

// 5. Peminjaman & Riwayat [cite: 14, 16]
// Halaman untuk menampilkan tabel daftar riwayat
$routes->get('riwayat', 'TransaksiController::index');

// Halaman untuk menampilkan Form (Peminjaman)
$routes->get('peminjaman', 'TransaksiController::tambah');

// Route untuk memproses tombol simpan
$routes->post('transaksi/simpan', 'TransaksiController::simpan');






