<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php 
    // Cek apakah ini mode edit atau tambah
    $isEdit = isset($alat); 
    $title = $isEdit ? 'Edit Alat' : 'Tambah Alat Baru';
    $action = $isEdit ? base_url('inventaris/update/' . $alat['id']) : base_url('simpan-alat');
?>

<div class="container-fluid py-4">
    <div class="card shadow-sm border-0 rounded-4 p-4">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                <i class="fas <?= $isEdit ? 'fa-edit' : 'fa-plus' ?>"></i>
            </div>
            <h4 class="fw-bold m-0"><?= $title ?></h4>
        </div>

        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row">
                <div class="col-md-8">
                    <div class="mb-3">
                        <label class="fw-bold small">NAMA ALAT</label>
                        <input type="text" name="nama_alat" class="form-control" value="<?= $isEdit ? $alat['nama_alat'] : '' ?>" placeholder="Masukkan nama alat" required>
                    </div>

                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label class="fw-bold small">JUMLAH</label>
                            <input type="number" name="jumlah" class="form-control" value="<?= $isEdit ? $alat['jumlah'] : '1' ?>" required>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="fw-bold small">KONDISI</label>
                            <select name="kondisi" class="form-select">
                                <option value="Baik" <?= ($isEdit && $alat['kondisi'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                <option value="Rusak Ringan" <?= ($isEdit && $alat['kondisi'] == 'Rusak Ringan') ? 'selected' : '' ?>>Rusak Ringan</option>
                                <option value="Rusak Berat" <?= ($isEdit && $alat['kondisi'] == 'Rusak Berat') ? 'selected' : ''; ?>>Rusak Berat</option>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label class="fw-bold small">KATEGORI</label>
                            <select name="kategori" class="form-select">
                                <option value="Elektronika" <?= ($isEdit && $alat['kategori'] == 'Elektronika') ? 'selected' : '' ?>>Elektronika</option>
                                <option value="Mekanik" <?= ($isEdit && $alat['kategori'] == 'Mekanik') ? 'selected' : '' ?>>Mekanik</option>
                            </select>
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="fw-bold small">DESKRIPSI ALAT</label>
                        <textarea name="deskripsi" class="form-control" rows="4" placeholder="Jelaskan detail alat..."><?= $isEdit ? $alat['deskripsi'] : '' ?></textarea>
                    </div>
                </div>

                <div class="col-md-4 text-center">
                    <label class="fw-bold small d-block mb-2 text-start text-uppercase">Foto Barang</label>
                    <div class="border rounded-4 p-5 d-flex flex-column align-items-center justify-content-center" style="border-style: dashed !important; min-height: 250px;">
                        <?php if($isEdit && $alat['foto_barang']): ?>
                            <img src="<?= base_url('uploads/'.$alat['foto_barang']) ?>" class="img-fluid rounded mb-3" style="max-height: 150px;">
                        <?php else: ?>
                            <p class="text-muted small">Belum ada file dipilih</p>
                        <?php endif; ?>
                        
                        <input type="file" name="foto_barang" id="fotoInput" class="d-none">
                        <button type="button" class="btn btn-info text-white rounded-pill px-4" onclick="document.getElementById('fotoInput').click()">
                            <i class="fas fa-camera me-1"></i> Pilih Foto
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <button type="submit" class="btn btn-info text-white rounded-pill px-5 fw-bold">Simpan Data</button>
                <a href="<?= base_url('inventaris') ?>" class="btn btn-light rounded-pill px-5 ms-2">Batal</a>
            </div>
        </form>
    </div>
</div>

<?= $this->endSection() ?>