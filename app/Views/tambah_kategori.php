<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php 
    // 1. Logika Deteksi: Jika variabel $ktgr ada (dikirim dari edit_kategori), maka mode EDIT
    $isEdit = isset($ktgr); 
    
    // 2. Tentukan Judul dan Action Form secara dinamis
    $title  = $isEdit ? 'Edit Kategori: ' . $ktgr['nama_kategori'] : 'Tambah Kategori Baru';
    $action = $isEdit ? base_url('kategori/update/' . $ktgr['id']) : base_url('simpan-kategori');
?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="mb-4">
        <h4 class="fw-bold m-0 text-dark">
            <i class="fas <?= $isEdit ? 'fa-edit' : 'fa-plus-circle' ?> me-2 text-info"></i><?= $title ?>
        </h4>
    </div>

    <form action="<?= $action ?>" method="POST">
        <?= csrf_field() ?> 
        
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-bold small text-uppercase">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" 
                       placeholder="Masukkan nama kategori"
                       value="<?= $isEdit ? $ktgr['nama_kategori'] : old('nama_kategori') ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold small text-uppercase">Kode Kategori</label>
                <input type="text" name="kode" class="form-control" maxlength="5" 
                       placeholder="Contoh: KTG01"
                       value="<?= $isEdit ? $ktgr['kode'] : old('kode') ?>" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold small text-uppercase">Deskripsi Teknis</label>
                <textarea name="deskripsi" class="form-control" 
                          placeholder="Tuliskan detail deskripsi teknis kategori di sini..."><?= $isEdit ? $ktgr['deskripsi'] : old('deskripsi') ?></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold small text-uppercase">Status</label>
                <select name="status" class="form-select">
                    <option value="aktif" <?= ($isEdit && $ktgr['status'] == 'aktif') ? 'selected' : '' ?>>Aktif</option>
                    <option value="non-aktif" <?= ($isEdit && $ktgr['status'] == 'non-aktif') ? 'selected' : '' ?>>Non-Aktif</option>
                    <option value="restock" <?= ($isEdit && $ktgr['status'] == 'restock') ? 'selected' : '' ?>>Restock</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-info text-white px-4">
                <?= $isEdit ? 'Update Kategori' : 'Simpan Kategori' ?>
            </button>
            <a href="<?= base_url('/kategori') ?>" class="btn btn-light px-4 border">Batal</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>