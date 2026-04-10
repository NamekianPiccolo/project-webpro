<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0"><i class="fas fa-boxes me-2 text-primary"></i>Daftar Inventaris Barang</h4>
        <a href="<?= base_url('/tambah-alat') ?>" class="btn btn-primary rounded-pill shadow-sm">
            <i class="fas fa-plus me-1"></i> Tambah Barang
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Alat</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th>Deskripsi</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($barang as $row): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="fw-bold"><?= $row['nama'] ?></td>
                    <td><span class="badge bg-dark"><?= $row['jumlah'] ?> Unit</span></td>
                    <td>
                        <?php if($row['kondisi'] == 'Baik'): ?>
                            <span class="badge bg-success">Baik</span>
                        <?php else: ?>
                            <span class="badge bg-warning text-dark">Rusak Ringan</span>
                        <?php endif; ?>
                    </td>
                    <td class="small text-muted"><?= $row['deskripsi'] ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                            <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                            <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                        </div>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>