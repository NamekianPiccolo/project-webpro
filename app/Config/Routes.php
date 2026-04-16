<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// 1. Login & Dashboard [cite: 4, 5]
$routes->get('/', 'Home::index');
$routes->get('/login', 'Home::login');

// 2. Manajemen Barang (CRUD & Upload Foto) [cite: 6, 7, 12]
$routes->get('/inventaris', 'Home::inventaris');
$routes->get('/tambah-alat', 'Home::tambah'); // Halaman form tambah barang

// 3. Kategori Barang (CRUD) [cite: 8, 9]
$routes->get('/kategori', 'Home::kategori');
$routes->get('/tambah-kategori', 'Home::tambah_kategori'); // Halaman form tambah kategori (Page Baru)

// 4. Lokasi Barang (CRUD) [cite: 10, 11]
$routes->get('/lokasi', 'Home::lokasi');
$routes->get('/tambah-lokasi', 'Home::tambah_lokasi'); // Halaman form tambah lokasi (Page Baru)

// 5. Peminjaman & Riwayat [cite: 14, 16]
$routes->get('/peminjaman', 'Home::peminjaman');
$routes->get('/riwayat', 'Home::riwayat');
$routes->get('/register', 'Home::register');

$routes->post('/simpan-alat', 'Home::simpan_alat');
$routes->post('/auth', 'AutentikasiController::login_auth');
