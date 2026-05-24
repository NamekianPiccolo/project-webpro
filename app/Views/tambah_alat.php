<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<style>
    /* Styling Premium Form Tambah/Edit Alat */
    .tambah-card {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.6) !important;
        border-radius: 24px !important;
        box-shadow: 0 15px 35px rgba(0,0,0,0.05) !important;
    }
    
    .form-label-custom {
        font-size: 0.8rem;
        font-weight: 700;
        color: #495057;
        margin-bottom: 8px;
        text-transform: uppercase;
        letter-spacing: 0.8px;
    }
    
    .form-control, .form-select {
        border-radius: 14px;
        padding: 12px 16px;
        border: 2px solid #e9ecef;
        font-size: 0.95rem;
        transition: all 0.3s ease;
    }
    
    .form-control:focus, .form-select:focus {
        border-color: #0dcaf0;
        box-shadow: 0 0 0 0.25rem rgba(13, 202, 240, 0.15);
        background-color: #ffffff;
    }
    
    .upload-zone {
        border: 2.5px dashed #dee2e6 !important;
        border-radius: 20px;
        padding: 30px;
        background: #f8f9fa;
        transition: all 0.3s ease;
        min-height: 250px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    
    .upload-zone:hover {
        border-color: #0dcaf0 !important;
        background: #f0fdfe;
    }
    
    .btn-submit {
        background: linear-gradient(135deg, #0081a7 0%, #00afb9 100%);
        border: none;
        box-shadow: 0 5px 15px rgba(0, 129, 167, 0.25);
        transition: all 0.3s ease;
    }
    
    .btn-submit:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(0, 129, 167, 0.35);
        opacity: 0.95;
        color: white;
    }
</style>

<?php 
    // Cek apakah ini mode edit atau tambah
    $isEdit = isset($alat); 
    $title = $isEdit ? 'Edit Alat' : 'Tambah Alat Baru';
    $action = $isEdit ? base_url('inventaris/update/' . $alat['id']) : base_url('simpan-alat');
?>

<div class="container-fluid py-4">
    <div class="card tambah-card p-4">
        <div class="d-flex align-items-center mb-4">
            <div class="bg-info text-white rounded-circle d-flex align-items-center justify-content-center me-3" style="width: 45px; height: 45px; box-shadow: 0 5px 10px rgba(13, 202, 240, 0.2);">
                <i class="fas <?= $isEdit ? 'fa-edit' : 'fa-plus' ?> fa-lg"></i>
            </div>
            <h4 class="fw-bold m-0 text-dark"><?= $title ?></h4>
        </div>

        <form action="<?= $action ?>" method="post" enctype="multipart/form-data">
            <?= csrf_field() ?>
            
            <div class="row g-4">
                <!-- Kolom Kiri: Input Form Data -->
                <div class="col-lg-7">
                    <div class="p-3 bg-light rounded-4 border-0">
                        <div class="mb-4">
                            <label class="form-label-custom">Nama Alat Laboratorium</label>
                            <input type="text" name="nama_alat" class="form-control shadow-sm" value="<?= $isEdit ? esc($alat['nama_alat']) : '' ?>" placeholder="Masukkan nama alat..." required>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label-custom">Jumlah (Stok)</label>
                                <input type="number" name="jumlah" class="form-control shadow-sm" min="1" value="<?= $isEdit ? esc($alat['jumlah']) : '1' ?>" required>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label-custom">Kondisi</label>
                                <select name="kondisi" class="form-select shadow-sm">
                                    <option value="Baik" <?= ($isEdit && $alat['kondisi'] == 'Baik') ? 'selected' : '' ?>>Baik</option>
                                    <option value="Rusak Ringan" <?= ($isEdit && $alat['kondisi'] == 'Rusak Ringan') ? 'selected' : '' ?>>Rusak Ringan</option>
                                    <option value="Rusak Berat" <?= ($isEdit && $alat['kondisi'] == 'Rusak Berat') ? 'selected' : ''; ?>>Rusak Berat</option>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label-custom">Kategori</label>
                                <select name="kategori" class="form-select shadow-sm" required>
                                    <option value="">-- Pilih Kategori --</option>
                                    <?php if (!empty($kategori_list)): ?>
                                        <?php foreach ($kategori_list as $kat): ?>
                                            <option value="<?= esc($kat['nama_kategori']) ?>" <?= ($isEdit && $alat['kategori'] == $kat['nama_kategori']) ? 'selected' : '' ?>>
                                                <?= esc($kat['nama_kategori']) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <option value="Elektronika" <?= ($isEdit && $alat['kategori'] == 'Elektronika') ? 'selected' : '' ?>>Elektronika</option>
                                        <option value="Mekanik" <?= ($isEdit && $alat['kategori'] == 'Mekanik') ? 'selected' : '' ?>>Mekanik</option>
                                    <?php endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Kolom Kanan: Unggah Foto dengan Real-time Preview -->
                <div class="col-lg-5">
                    <div class="p-3 bg-light rounded-4 border-0 h-100 d-flex flex-column">
                        <label class="form-label-custom mb-3 text-start">Foto Alat Lab</label>
                        <div class="upload-zone shadow-sm flex-grow-1" onclick="document.getElementById('fotoInput').click()">
                            <div id="previewContainer" class="text-center w-100">
                                <?php if($isEdit && $alat['foto_barang']): ?>
                                    <img src="<?= base_url('uploads/'.$alat['foto_barang']) ?>" id="previewImage" class="img-fluid rounded-3 shadow-sm mb-3" style="max-height: 150px; object-fit: cover;">
                                    <p class="text-muted small mb-0" id="uploadText">Klik untuk mengubah foto</p>
                                <?php else: ?>
                                    <i class="fas fa-cloud-upload-alt fa-3x text-muted mb-3"></i>
                                    <p class="text-muted small mb-0" id="uploadText">Pilih foto barang (.png, .jpg, .jpeg)</p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <input type="file" name="foto_barang" id="fotoInput" class="d-none" accept="image/*">
                    </div>
                </div>
            </div>

            <!-- Tombol Aksi -->
            <div class="mt-4 pt-2 d-flex justify-content-start">
                <button type="submit" class="btn btn-info btn-submit text-white rounded-pill px-5 py-2 fw-bold">
                    <i class="fas fa-save me-1"></i> Simpan Data
                </button>
                <a href="<?= base_url('inventaris') ?>" class="btn btn-light rounded-pill px-5 py-2 ms-3 border fw-semibold">
                    Batal
                </a>
            </div>
        </form>
    </div>
</div>

<!-- Script Javascript untuk Real-time Preview Gambar -->
<script>
    document.getElementById('fotoInput').addEventListener('change', function(event) {
        const file = event.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewContainer = document.getElementById('previewContainer');
                previewContainer.innerHTML = `
                    <img src="${e.target.result}" class="img-fluid rounded-3 shadow-sm mb-3" style="max-height: 150px; object-fit: cover;">
                    <p class="text-info fw-bold small mb-0">Foto siap diunggah (Klik untuk mengganti)</p>
                `;
            }
            reader.readAsDataURL(file);
        }
    });
</script>

<?= $this->endSection() ?>