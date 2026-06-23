<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="mb-4">
        <h4 class="fw-bold m-0 text-dark">
            <i class="fas fa-plus-circle me-2 text-info"></i>Tambah Kategori Baru
        </h4>
    </div>

    <form action="<?= base_url('simpan-kategori') ?>" method="POST">
        <?= csrf_field() ?> 
        
        <div class="row g-3">
            <div class="col-md-8">
                <label class="form-label fw-bold small text-uppercase">Nama Kategori</label>
                <input type="text" name="nama_kategori" class="form-control" 
                       placeholder="Masukkan nama kategori"
                       value="<?= old('nama_kategori') ?>" required>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold small text-uppercase">Kode Kategori</label>
                <input type="text" name="kode" class="form-control" maxlength="20" 
                       placeholder="Contoh: KTG01"
                       value="<?= old('kode') ?>" required>
            </div>

            <div class="col-12">
                <label class="form-label fw-bold small text-uppercase">Deskripsi Teknis</label>
                <textarea name="deskripsi" class="form-control" 
                          placeholder="Tuliskan detail deskripsi teknis kategori di sini..."><?= old('deskripsi') ?></textarea>
            </div>

            <div class="col-md-6">
                <label class="form-label fw-bold small text-uppercase">Status</label>
                <select name="status" class="form-select">
                    <option value="aktif">Aktif</option>
                    <option value="non-aktif">Non-Aktif</option>
                    <option value="restock">Restock</option>
                </select>
            </div>
        </div>

        <div class="mt-4">
            <button type="submit" class="btn btn-info text-white px-4">
                Simpan Kategori
            </button>
            <a href="<?= base_url('/kategori') ?>" class="btn btn-light px-4 border">Batal</a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>