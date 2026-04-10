<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-info bg-opacity-10 text-info p-2 rounded-3 me-3">
            <i class="fas fa-tags fa-lg"></i>
        </div>
        <h4 class="fw-bold m-0 text-dark">Tambah Kategori Baru</h4>
    </div>

    <form action="<?= base_url('/kategori') ?>" method="get">
        <div class="mb-4">
            <label class="form-label fw-bold small text-muted text-uppercase">Nama Kategori</label>
            <input type="text" class="form-control form-control-lg border-2 shadow-sm" placeholder="Misal: Elektronika, Optik" required>
        </div>

        <div class="d-flex gap-2">
            <button type="submit" class="btn btn-info text-white px-5 rounded-pill shadow-sm fw-bold">
                Simpan Kategori
            </button>
            <a href="<?= base_url('/kategori') ?>" class="btn btn-light px-4 rounded-pill border fw-bold">
                Batal
            </a>
        </div>
    </form>
</div>

<?= $this->endSection() ?>