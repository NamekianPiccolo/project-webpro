<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* Background Animasi Halus */
    .main-content {
        background: linear-gradient(135px, #f5f7fa 0%, #c3cfe2 100%);
        min-height: 100vh;
    }

    /* Welcome Banner */
    .welcome-banner {
        background: linear-gradient(to right, #4e73df, #224abe);
        color: white;
        border-radius: 20px;
        padding: 30px;
        margin-bottom: 30px;
        box-shadow: 0 10px 20px rgba(78, 115, 223, 0.2);
    }

    /* Card Styling */
    .stat-card {
        border: none;
        border-radius: 15px;
        transition: all 0.3s ease;
    }
    .stat-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 15px 30px rgba(0,0,0,0.1);
    }

    .icon-box {
        width: 60px;
        height: 60px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        margin-bottom: 15px;
    }

    /* Table Styling */
    .custom-table {
        background: white;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    }
</style>

<div class="welcome-banner d-flex align-items-center justify-content-between">
    <div>
        <h2 class="fw-bold mb-1">Selamat Datang, Admin Kelompok 2!</h2>
        <p class="mb-0 opacity-75">Sistem Inventaris Barang Laboratorium siap dikelola.</p>
    </div>
    <div class="d-none d-md-block">
        <i class="fas fa-user-shield fa-4x opacity-25"></i>
    </div>
</div>

<div class="row g-4 mb-4">
    <div class="col-md-3">
        <div class="card stat-card p-4 bg-white">
            <div class="icon-box bg-primary-subtle text-primary">
                <i class="fas fa-boxes"></i>
            </div>
            <h6 class="text-muted small fw-bold text-uppercase">Total Barang </h6>
            <h3 class="fw-bold mb-0">1,240</h3>
            <span class="text-success small"><i class="fas fa-plus"></i> 12 baru bulan ini</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card p-4 bg-white">
            <div class="icon-box bg-info-subtle text-info">
                <i class="fas fa-tags"></i>
            </div>
            <h6 class="text-muted small fw-bold text-uppercase">Kategori </h6>
            <h3 class="fw-bold mb-0">15</h3>
            <span class="text-muted small">Jenis alat berbeda</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card p-4 bg-white">
            <div class="icon-box bg-warning-subtle text-warning">
                <i class="fas fa-map-marker-alt"></i>
            </div>
           <h6 class="text-muted small fw-bold text-uppercase">Lokasi Simpan </h6>
            <h3 class="fw-bold mb-0">8</h3>
            <span class="text-muted small">Ruangan & Rak</span>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card stat-card p-4 bg-white">
            <div class="icon-box bg-danger-subtle text-danger">
                <i class="fas fa-hand-holding"></i>
            </div>
            <h6 class="text-muted small fw-bold text-uppercase">Dipinjam </h6>
            <h3 class="fw-bold mb-0">24</h3>
            <span class="text-danger small">Perlu segera kembali</span>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm p-4 mb-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h5 class="fw-bold m-0"><i class="fas fa-history me-2 text-primary"></i>Riwayat Peminjaman Terbaru </h5>
                <a href="<?= base_url('/riwayat') ?>" class="btn btn-link btn-sm text-decoration-none">Lihat Semua</a>
            </div>
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>Peminjam</th>
                            <th>Alat</th>
                            <th>Tanggal Pinjam </th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><strong>Budi Santoso</strong></td>
                            <td>Mikroskop Digital</td>
                            <td>07 Apr 2026</td>
                            <td><span class="badge rounded-pill bg-info">Dipinjam </span></td>
                        </tr>
                        <tr>
                            <td><strong>Ani Wijaya</strong></td>
                            <td>Solder Station</td>
                            <td>06 Apr 2026</td>
                            <td><span class="badge rounded-pill bg-success">Kembali</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card border-0 shadow-sm p-4 bg-dark text-white">
            <h5 class="fw-bold mb-3">Aksi Cepat</h5>
            <p class="small opacity-75">Kelola data inventaris dengan satu klik. </p>
            <div class="d-grid gap-2">
                <a href="<?= base_url('/tambah-alat') ?>" class="btn btn-outline-light text-start">
                    <i class="fas fa-plus-circle me-2"></i> Tambah Alat Baru 
                </a>
                <a href="<?= base_url('/peminjaman') ?>" class="btn btn-primary text-start">
                    <i class="fas fa-exchange-alt me-2"></i> Buat Transaksi Pinjam 
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>