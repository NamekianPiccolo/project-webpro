<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<?php 
    // Logika deteksi mode
    $isEdit = isset($lokasi_data); 
    $title  = $isEdit ? 'Edit Lokasi Penyimpanan' : 'Tambah Lokasi Penyimpanan';
    $action = $isEdit ? base_url('lokasi/update/' . $lokasi_data['id']) : base_url('/simpan_lokasi');
?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-danger-subtle text-danger p-2 rounded-3 me-3">
            <i class="fas <?= $isEdit ? 'fa-edit' : 'fa-map-marker-alt' ?>"></i>
        </div>
        <h4 class="fw-bold m-0"><?= $title ?></h4>
    </div>
    
    <form action="<?= $action ?>" method="post">
        <?= csrf_field() ?>
        
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label fw-bold small text-muted text-uppercase">Nama Lokasi / Ruangan</label>
                <input type="text" class="form-control form-control-lg shadow-sm" name="nama_lokasi" 
                       value="<?= $isEdit ? $lokasi_data['nama_lokasi'] : old('nama_lokasi') ?>" 
                       placeholder="Contoh: Rak A, Lemari 2, Lab Fisika" required>
            </div>
            <div class="col-md-12 mb-4">
                <label class="form-label fw-bold small text-muted text-uppercase">Deskripsi Lokasi</label>
                <textarea class="form-control shadow-sm" name="keterangan" rows="3" 
                          placeholder="Jelaskan detail posisi penyimpanan barang..."><?= $isEdit ? $lokasi_data['keterangan'] : old('keterangan') ?></textarea>
            </div>
        </div>
        
        <div class="d-flex gap-2 mt-2">
            <button type="submit" class="btn btn-danger px-5 rounded-pill shadow-sm">
                <?= $isEdit ? 'Update Lokasi' : 'Simpan Lokasi' ?>
            </button>
            <a href="<?= base_url('/lokasi') ?>" class="btn btn-light px-4 rounded-pill border">Batal</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>