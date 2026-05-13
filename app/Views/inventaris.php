<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
<style>
    /* 1. Animasi Latar Belakang Abstrak */
    .bg-animation {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: -2;
        background: linear-gradient(-45deg, #f0f2f5, #e0e7ff, #fdf2f8, #f0f9ff);
        background-size: 400% 400%;
        animation: gradientMove 15s ease infinite;
    }

    .bg-abstract-overlay {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        z-index: -1;
        backdrop-filter: blur(40px);
        background: rgba(255, 255, 255, 0.4);
    }

    @keyframes gradientMove {
        0% { background-position: 0% 50%; }
        50% { background-position: 100% 50%; }
        100% { background-position: 0% 50%; }
    }

    /* 2. Styling Card & Tabel (Glassmorphism) */
    .glass-card {
        background: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
        border-radius: 24px !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05) !important;
    }

    .table thead th {
        background-color: rgba(248, 249, 250, 0.5);
        border-top: none;
    }
</style>

<div class="bg-animation"></div>
<div class="bg-abstract-overlay"></div>

<div class="container-fluid py-4">
    
    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <div>
                    <?= session()->getFlashdata('success') ?>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="card glass-card p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h4 class="fw-bold m-0"><i class="fas fa-boxes me-2 text-primary"></i>Daftar Inventaris Barang</h4>
            
            <?php if (session()->get('role') == 'admin') : ?>
            <a href="<?= base_url('/tambah-alat') ?>" class="btn btn-primary rounded-pill shadow-sm px-4">
                <i class="fas fa-plus me-1"></i> Tambah Barang
            </a>
            <?php endif; ?>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>No</th>
                        <th>Foto</th> 
                        <th>Nama Alat</th>
                        <th>Jumlah</th>
                        <th>Kondisi</th>
                        <th>Deskripsi</th>
                        
                        <?php if (session()->get('role') == 'admin') : ?>
                        <th class="text-center">Aksi</th>
                        <?php endif; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php if(!empty($list_alat)): ?>
                        <?php $no = 1; foreach($list_alat as $row): ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <?php if (!empty($row['foto_barang'])): ?>
                                    <img src="<?= base_url('uploads/' . $row['foto_barang']); ?>" alt="Foto" class="rounded-3 shadow-sm" style="width: 60px; height: 60px; object-fit: cover;">
                                <?php else: ?>
                                    <div class="bg-light rounded-3 d-flex align-items-center justify-content-center text-muted border" style="width: 60px; height: 60px; font-size: 10px;">
                                        No Photo
                                    </div>
                                <?php endif; ?>
                            </td>
                            <td><strong><?= $row['nama_alat']; ?></strong></td>
                            <td><span class="badge bg-dark rounded-pill px-3"><?= $row['jumlah']; ?> Unit</span></td>
                            <td>
                                <?php 
                                    $kondisi = $row['kondisi'];
                                    $badgeColor = ($kondisi == 'Rusak Ringan') ? 'bg-warning text-dark' : (($kondisi == 'Rusak Berat') ? 'bg-danger' : 'bg-success');
                                ?>
                                <span class="badge <?= $badgeColor; ?> rounded-pill px-3"><?= $kondisi; ?></span>
                            </td>
                            <td><small class="text-muted"><?= $row['deskripsi']; ?></small></td>
                            
                            <?php if (session()->get('role') == 'admin') : ?>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('inventaris/edit/' . $row['id']); ?>" class="btn btn-sm btn-outline-primary rounded-start-pill px-3">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('inventaris/hapus/' . $row['id']); ?>" 
                                       class="btn btn-sm btn-outline-danger rounded-end-pill px-3" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus alat ini?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="<?= (session()->get('role') == 'admin') ? '7' : '6' ?>" class="text-center py-5 text-muted">
                                <i class="fas fa-folder-open d-block mb-2 fa-2x"></i>
                                Belum ada data barang tersedia.
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?= $this->endSection() ?>