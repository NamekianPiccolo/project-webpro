<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0">
            <i class="fas fa-map-marker-alt me-2 text-danger"></i>Lokasi Penyimpanan
        </h4>
        
        <?php if (session()->get('role') == 'admin') : ?>
        <a href="<?= base_url('/tambah-lokasi') ?>" class="btn btn-danger rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-1"></i> Tambah Lokasi
        </a>
        <?php endif; ?>
    </div>

    <?php if (session()->getFlashdata('success')) : ?>
        <div class="alert alert-success alert-dismissible fade show border-0 shadow-sm rounded-4 mb-4" role="alert">
            <i class="fas fa-check-circle me-2"></i><?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th width="50">No</th>
                    <th>Nama Lokasi</th>
                    <th>Keterangan</th>
                    <?php if (session()->get('role') == 'admin') : ?>
                    <th class="text-center" width="150">Aksi</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($lokasi)) : ?>
                    <?php $no = 1; foreach ($lokasi as $row) : ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td class="fw-bold"><?= esc($row['nama_lokasi']) ?></td>
                            <td class="text-muted"><?= esc($row['keterangan']) ?></td>
                            
                            <?php if (session()->get('role') == 'admin') : ?>
                            <td class="text-center">
                                <div class="btn-group">
                                    <a href="<?= base_url('lokasi/edit/' . $row['id']) ?>" class="btn btn-sm btn-outline-primary rounded-3 me-1">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="<?= base_url('/lokasi/hapus/' . $row['id']) ?>" 
                                       class="btn btn-sm btn-outline-danger rounded-3" 
                                       onclick="return confirm('Apakah Anda yakin ingin menghapus lokasi <?= esc($row['nama_lokasi']) ?>?')">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="<?= (session()->get('role') == 'admin') ? '4' : '3' ?>" class="text-center text-muted py-5">
                            Belum ada data lokasi penyimpanan.
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>