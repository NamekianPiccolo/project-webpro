<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php if (session()->getFlashdata('success')) : ?>
    <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
        <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
<?php endif; ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0 text-dark"><i class="fas fa-microscope me-2 text-info"></i>Kategori Alat</h4>
        
        <?php /* HANYA ADMIN YANG BISA MELIHAT TOMBOL TAMBAH */ ?>
        <?php if (session()->get('role') == 'admin') : ?>
            <a href="<?= base_url('/tambah-kategori') ?>" class="btn btn-info text-white rounded-pill px-4">
                <i class="fas fa-plus me-1"></i> Tambah Kategori
            </a>
        <?php endif; ?>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Kategori</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Status</th>
                    
                    <?php /* HEADER AKSI HANYA MUNCUL UNTUK ADMIN */ ?>
                    <?php if (session()->get('role') == 'admin') : ?>
                        <th class="text-center">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($kategori)) : $no = 1; foreach ($kategori as $k) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><span class="badge bg-light text-dark border"><?= esc($k['kode']); ?></span></td>
                    <td class="fw-bold text-primary"><?= esc($k['nama_kategori']); ?></td>
                    <td class="text-muted small"><?= esc($k['deskripsi']); ?></td>
                    <td class="text-center">
                        <?php 
                            $status = strtolower($k['status']);
                            if ($status == 'aktif') {
                                $colorClass = 'bg-success-subtle text-success border-success';
                            } elseif ($status == 'non-aktif') {
                                $colorClass = 'bg-danger-subtle text-danger border-danger';
                            } elseif ($status == 'restock') {
                                $colorClass = 'bg-warning-subtle text-warning border-warning';
                            } else {
                                $colorClass = 'bg-info-subtle text-info border-info';
                            }
                        ?>
                        <span class="badge rounded-pill border <?= $colorClass ?> px-3">
                            <?= ucfirst($k['status']); ?>
                        </span>
                    </td>

                    <?php /* KOLOM AKSI HANYA MUNCUL UNTUK ADMIN */ ?>
                    <?php if (session()->get('role') == 'admin') : ?>
                        <td class="text-center">
                            <div class="btn-group">
                                <a href="<?= base_url('kategori/edit/' . $k['id']) ?>" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="<?= base_url('kategori/hapus/' . $k['id']) ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Hapus kategori?')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </div>
                        </td>
                    <?php endif; ?>
                </tr>
                <?php endforeach; else : ?>
                <tr>
                    <?php /* Sesuaikan colspan agar tetap rapi saat data kosong */ ?>
                    <td colspan="<?= (session()->get('role') == 'admin') ? '6' : '5' ?>" class="text-center py-4">Data kosong.</td>
                </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>