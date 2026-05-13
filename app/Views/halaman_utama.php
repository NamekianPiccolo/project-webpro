<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* Sinkronisasi dengan palet warna Login */
    :root {
        --primary-color: #0dcaf0;
        --secondary-color: #0081a7;
        --bg-gradient: linear-gradient(135deg, #0081a7 0%, #00afb9 100%);
    }

    .main-content {
        background-color: #f8f9fa;
        font-family: 'Plus Jakarta Sans', sans-serif;
        position: relative;
        overflow-x: hidden;
        min-height: 100vh;
    }

    /* Dekorasi Lingkaran Latar Belakang (Meniru style Login) */
    .bg-circle {
        position: fixed;
        border-radius: 50%;
        background: rgba(13, 202, 240, 0.05);
        z-index: -1;
    }
    .circle-1 { width: 400px; height: 400px; top: -150px; right: -150px; }
    .circle-2 { width: 300px; height: 300px; bottom: -100px; left: -100px; }

    /* Welcome Banner - Menggunakan Gradasi yang Sama dengan Login */
    .welcome-banner {
        background: var(--bg-gradient);
        color: white;
        border-radius: 24px;
        padding: 40px;
        margin-bottom: 35px;
        position: relative;
        overflow: hidden;
        box-shadow: 0 15px 30px rgba(0, 129, 167, 0.2);
    }

    .welcome-banner::after {
        content: '';
        position: absolute;
        top: -30px;
        right: -30px;
        width: 150px;
        height: 150px;
        background: rgba(255, 255, 255, 0.1);
        border-radius: 40px;
        transform: rotate(20deg);
    }

    /* Stat Cards - Penyesuaian Warna */
    .stat-card {
        border: none;
        border-radius: 20px;
        background: #ffffff;
        padding: 25px;
        transition: all 0.3s ease;
        box-shadow: 0 10px 20px rgba(0,0,0,0.03);
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 25px rgba(0,0,0,0.08);
    }

    .icon-shape {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 22px;
        margin-bottom: 20px;
    }

    /* Table & Glassmorphism */
    .glass-card {
        background: rgba(255, 255, 255, 0.8);
        backdrop-filter: blur(10px);
        border-radius: 24px;
        border: 1px solid rgba(255, 255, 255, 0.6);
        box-shadow: 0 10px 30px rgba(0,0,0,0.04);
    }

    /* Button Action - Mengikuti warna tema */
    .btn-primary-custom {
        background: var(--bg-gradient);
        border: none;
        color: white;
    }
    
    .btn-primary-custom:hover {
        opacity: 0.9;
        color: white;
        transform: scale(1.02);
    }

    .badge-status {
        padding: 6px 12px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 0.75rem;
    }
</style>

<div class="bg-circle circle-1"></div>
<div class="bg-circle circle-2"></div>

<div class="container-fluid py-4">
    <div class="welcome-banner d-flex align-items-center justify-content-between">
        <div>
            <h1 class="fw-bold mb-2">Halo, Admin Kelompok 2! 👋</h1>
            <p class="mb-0 opacity-75 fs-5">Pantau dan kelola inventaris laboratorium dalam satu dasbor cerdas.</p>
        </div>
        <div class="d-none d-lg-block">
            <i class="fas fa-microscope fa-5x opacity-25" style="transform: rotate(-15deg);"></i>
        </div>
    </div>

    <div class="row g-4 mb-5">
        <div class="col-xl-3 col-md-6">
            <div class="card stat-card">
                <div class="icon-shape text-white shadow-sm" style="background: #0081a7;">
                    <i class="fas fa-boxes"></i>
                </div>
                <p class="text-muted small fw-bold mb-1">TOTAL BARANG</p>
                <div class="d-flex align-items-center">
                    <h2 class="fw-bold mb-0">1,240</h2>
                    <span class="ms-2 badge bg-success-subtle text-success">+12%</span>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card">
                <div class="icon-shape text-white shadow-sm" style="background: #00afb9;">
                    <i class="fas fa-layer-group"></i>
                </div>
                <p class="text-muted small fw-bold mb-1">KATEGORI ALAT</p>
                <h2 class="fw-bold mb-0">15</h2>
                <small class="text-muted">Tersedia di sistem</small>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card">
                <div class="icon-shape text-white shadow-sm" style="background: #f0ad4e;">
                    <i class="fas fa-map-marker-alt"></i>
                </div>
                <p class="text-muted small fw-bold mb-1">LOKASI SIMPAN</p>
                <h2 class="fw-bold mb-0">8</h2>
                <small class="text-muted">Titik penyimpanan</small>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card stat-card">
                <div class="icon-shape text-white shadow-sm" style="background: #e76f51;">
                    <i class="fas fa-hand-holding-heart"></i>
                </div>
                <p class="text-muted small fw-bold mb-1">SEDANG DIPINJAM</p>
                <h2 class="fw-bold mb-0 text-danger">24</h2>
                <small class="text-danger fw-bold"><i class="fas fa-clock"></i> Segera Jatuh Tempo</small>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-8">
            <div class="card glass-card border-0 p-4 mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h5 class="fw-bold m-0" style="color: #2b2d42;">
                        <i class="fas fa-history me-2 text-info"></i>Aktivitas Peminjaman
                    </h5>
                    <a href="<?= base_url('/riwayat') ?>" class="btn btn-light btn-sm fw-bold px-3 rounded-pill border">Lihat Semua</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead>
                            <tr class="text-muted">
                                <th>Mahasiswa</th>
                                <th>Nama Alat</th>
                                <th>Tanggal</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm rounded-circle bg-light p-2 me-2 text-center" style="width: 35px;">
                                            <i class="fas fa-user text-secondary"></i>
                                        </div>
                                        <span class="fw-600">Budi Santoso</span>
                                    </div>
                                </td>
                                <td><span class="text-muted">Mikroskop Digital X-1</span></td>
                                <td>07 Apr 2026</td>
                                <td><span class="badge badge-status bg-info-subtle text-info">Proses</span></td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="d-flex align-items-center">
                                        <div class="avatar-sm rounded-circle bg-light p-2 me-2 text-center" style="width: 35px;">
                                            <i class="fas fa-user text-secondary"></i>
                                        </div>
                                        <span class="fw-600">Ani Wijaya</span>
                                    </div>
                                </td>
                                <td><span class="text-muted">Solder Station Pro</span></td>
                                <td>06 Apr 2026</td>
                                <td><span class="badge badge-status bg-success-subtle text-success">Kembali</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card border-0 bg-white shadow-sm rounded-4 p-4 mb-4">
                <h5 class="fw-bold mb-4" style="color: #2b2d42;">Aksi Cepat</h5>
                <div class="d-grid gap-3">
                    <a href="<?= base_url('/tambah-alat') ?>" class="btn btn-primary-custom btn-action text-start p-3 rounded-4 transition-all">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-plus-circle fa-lg me-3"></i>
                            <div>
                                <div class="fw-bold">Tambah Alat</div>
                                <small class="opacity-75">Input data barang baru</small>
                            </div>
                        </div>
                    </a>
                    <a href="<?= base_url('/peminjaman') ?>" class="btn btn-outline-info btn-action text-start p-3 rounded-4 border-2">
                        <div class="d-flex align-items-center">
                            <i class="fas fa-exchange-alt fa-lg me-3"></i>
                            <div>
                                <div class="fw-bold">Transaksi Pinjam</div>
                                <small class="opacity-75">Catat peminjaman alat</small>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="card border-0 p-4 text-white rounded-4 shadow-sm" style="background: #2b2d42;">
                <div class="d-flex align-items-center mb-3">
                    <div class="bg-warning rounded-circle p-2 me-3">
                        <i class="fas fa-lightbulb text-dark"></i>
                    </div>
                    <h6 class="fw-bold mb-0">Tips Hari Ini</h6>
                </div>
                <p class="small mb-0 opacity-75">Pastikan setiap alat yang kembali dicek kondisinya sebelum divalidasi ke sistem.</p>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>