<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// --- 1. RUTE PUBLIK (Bisa diakses tanpa login) ---
$routes->get('/login', 'AutentikasiController::login');
$routes->post('/login-auth', 'AutentikasiController::login_auth');
$routes->get('/register', 'AutentikasiController::register');
$routes->post('/register-save', 'AutentikasiController::register_save');


// --- 2. RUTE TERKUNCI (Wajib Login) ---
$routes->group('', ['filter' => 'auth'], function($routes) {
    
    // Dashboard (Rute Utama)
    $routes->get('/', 'Home::index'); // Pastikan ini mengarah ke controller dashboard kamu

    // Manajemen Barang (Inventaris)
    $routes->get('/inventaris', 'InventarisController::inventaris');
    $routes->get('/tambah-alat', 'InventarisController::tambah');
    $routes->post('/simpan-alat', 'InventarisController::simpan_alat');
    $routes->get('inventaris/hapus/(:num)', 'InventarisController::hapus_inventaris/$1');
    $routes->get('inventaris/edit/(:num)', 'InventarisController::edit_inventaris/$1');
    $routes->post('inventaris/update/(:num)', 'InventarisController::update_inventaris/$1');

    // Kategori Barang
    $routes->get('/kategori', 'KategoriController::kategori');
    $routes->get('/tambah-kategori', 'KategoriController::tambah_kategori');
    $routes->post('/simpan-kategori', 'KategoriController::simpan_kategori');
    $routes->get('kategori/hapus/(:num)', 'KategoriController::hapus_kategori/$1');
    $routes->get('kategori/edit/(:num)', 'KategoriController::edit_kategori/$1');
    $routes->post('kategori/update/(:num)', 'KategoriController::update_kategori/$1');

    // Lokasi Barang
    $routes->get('/lokasi', 'LokasiController::lokasi');
    $routes->get('/tambah-lokasi', 'LokasiController::tambah_lokasi');
    $routes->post('/simpan_lokasi', 'LokasiController::simpan_lokasi');
    $routes->get('/lokasi/hapus/(:num)', 'LokasiController::hapus_lokasi/$1');
    $routes->get('lokasi/edit/(:num)', 'LokasiController::edit_lokasi/$1');
    $routes->post('lokasi/update/(:num)', 'LokasiController::update_lokasi/$1');

    // Peminjaman & Transaksi
    $routes->get('riwayat', 'TransaksiController::index');
    $routes->get('peminjaman', 'TransaksiController::tambah');
    $routes->post('transaksi/simpan', 'TransaksiController::simpan');
    $routes->get('transaksi/kembalikan/(:num)', 'TransaksiController::kembalikan/$1');
    $routes->get('transaksi/export', 'TransaksiController::export');

    // Logout
    $routes->get('/logout', 'AutentikasiController::logout');
});