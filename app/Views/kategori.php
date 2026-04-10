<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm border-0 rounded-4 p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0"><i class="fas fa-tags me-2 text-info"></i>Kategori Barang</h4>
        
        <a href="<?= base_url('/tambah-kategori') ?>" class="btn btn-info text-white rounded-pill shadow-sm px-4">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Nama Kategori</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td class="fw-bold">Elektronika</td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i></button>
                        <button class="btn btn-sm btn-outline-danger"><i class="fas fa-trash"></i></button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>