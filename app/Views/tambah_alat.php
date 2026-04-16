<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4 text-dark bg-white">
    <div class="d-flex align-items-center mb-4">
        <div class="bg-info bg-opacity-10 text-info p-2 rounded-3 me-3">
            <i class="fas fa-plus-circle fa-lg"></i>
        </div>
        <h4 class="fw-bold m-0">Tambah Alat Baru</h4>
    </div>

    <form action="<?= base_url('/simpan-alat') ?>" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold small text-muted">NAMA ALAT</label>
                        <input type="text" class="form-control border-2 shadow-sm" name="nama_alat" placeholder="Masukkan nama alat" required>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-muted">JUMLAH</label>
                        <input type="number" class="form-control border-2 shadow-sm" name="jumlah" value="1">
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-muted">KONDISI</label>
                        <select class="form-select border-2 shadow-sm" name="kondisi">
                            <option value="Baik">Baik</option>
                            <option value="Rusak Ringan">Rusak Ringan</option>
                            <option value="Rusak Berat">Rusak Berat</option>
                        </select>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label fw-bold small text-muted">KATEGORI (Poin 3)</label>
                        <select class="form-select border-2 shadow-sm" name="kategori">
                            <option value="Elektronika">Elektronika</option>
                            <option value="Alat Ukur">Alat Ukur</option>
                            <option value="Optik">Optik</option>
                        </select>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label fw-bold small text-muted">DESKRIPSI ALAT</label>
                        <textarea class="form-control border-2 shadow-sm" name="deskripsi" rows="3" placeholder="Jelaskan detail alat..."></textarea>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <label class="form-label fw-bold small text-muted">FOTO BARANG (Poin 5)</label>
                <div class="card border-2 border-dashed shadow-sm text-center p-3 h-100 d-flex flex-column align-items-center justify-content-center" style="border-style: dashed !important; background-color: #f8f9fa;">
                    <img id="img-preview" src="https://via.placeholder.com/150?text=Preview+Foto" class="img-fluid rounded mb-3 shadow-sm" style="max-height: 150px; object-fit: cover;">
                    
                    <p class="small text-muted mb-2" id="file-name text-break text-wrap">Belum ada file dipilih</p>
                    
                    <input type="file" name="foto_barang" id="foto_barang" class="d-none" accept="image/*" onchange="previewImage()">
                    
                    <button type="button" class="btn btn-info btn-sm text-white rounded-pill px-4" onclick="document.getElementById('foto_barang').click()">
                        <i class="fas fa-camera me-1"></i> Pilih Foto
                    </button>
                </div>
            </div>
        </div>

        <div class="d-flex gap-2 mt-4">
            <button type="submit" class="btn btn-info text-white px-5 rounded-pill shadow-sm fw-bold">Simpan Data</button>
            <a href="<?= base_url('/inventaris') ?>" class="btn btn-light px-4 rounded-pill border fw-bold text-muted">Batal</a>
        </div>
    </form>
</div>

<script>
    function previewImage() {
        const image = document.querySelector('#foto_barang');
        const imgPreview = document.querySelector('#img-preview');
        const fileName = document.querySelector('#file-name');

        if (image.files && image.files[0]) {
            fileName.textContent = image.files[0].name;
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }
        }
    }
</script>

<?= $this->endSection() ?>