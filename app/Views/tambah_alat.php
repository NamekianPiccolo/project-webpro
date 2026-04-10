<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <h4 class="fw-bold mb-4"><i class="fas fa-plus-circle me-2 text-success"></i>Tambah Alat Baru</h4>
    
    <form action="#" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Nama Alat</label>
                <input type="text" class="form-control shadow-sm" placeholder="Masukkan nama alat" required>
            </div>
            
            <div class="col-md-6 mb-3">
                <label class="form-label fw-bold">Foto Barang (Poin 5)</label>
                <input type="file" class="form-control shadow-sm" accept="image/*">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Jumlah</label>
                <input type="number" class="form-control shadow-sm" value="1">
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Kondisi</label>
                <select class="form-select shadow-sm">
                    <option value="Baik">Baik</option>
                    <option value="Rusak Ringan">Rusak Ringan</option>
                    <option value="Rusak Berat">Rusak Berat</option>
                </select>
            </div>

            <div class="col-md-4 mb-3">
                <label class="form-label fw-bold">Kategori (Poin 3)</label>
                <select class="form-select shadow-sm">
                    <option>Elektronika</option>
                    <option>Optik</option>
                    <option>Mekanik</option>
                </select>
            </div>

            <div class="col-12 mb-4">
                <label class="form-label fw-bold">Deskripsi Alat</label>
                <textarea class="form-control shadow-sm" rows="3" placeholder="Jelaskan detail alat..."></textarea>
            </div>
        </div>

        <div class="mt-2">
            <button type="submit" class="btn btn-success px-5 rounded-pill shadow">Simpan Data</button>
            <a href="<?= base_url('/inventaris') ?>" class="btn btn-light px-4 rounded-pill ms-2">Batal</a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>