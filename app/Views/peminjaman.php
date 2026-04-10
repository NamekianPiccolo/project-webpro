<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="card shadow-sm p-4">
    <h4><i class="fas fa-exchange-alt me-2 text-primary"></i>Form Transaksi Peminjaman</h4>
    <p class="text-muted small">Catat peminjaman alat oleh mahasiswa/dosen di sini.</p>
    <hr>
    
    <form action="#" method="post">
        <div class="row">
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_peminjam" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-bold">NIM / ID User</label>
                <input type="text" class="form-control" name="nim" placeholder="Contoh: 20210001" required>
            </div>
            <div class="col-md-6 mb-3">
                <label class="fw-bold">Pilih Barang yang Dipinjam</label>
                <select class="form-control" name="id_barang">
                    <option value="">-- Pilih Alat Laboratorium --</option>
                    <option value="1">Mikroskop Binokuler (Tersedia: 5)</option>
                    <option value="2">Oskiloskop Digital (Tersedia: 2)</option>
                    <option value="3">Multimeter (Tersedia: 10)</option>
                </select>
            </div>
            <div class="col-md-3 mb-3">
                <label class="fw-bold">Jumlah Pinjam</label>
                <input type="number" class="form-control" name="jumlah" min="1" value="1">
            </div>
            <div class="col-md-3 mb-3">
                <label class="fw-bold">Batas Pengembalian</label>
                <input type="date" class="form-control" name="tgl_kembali">
            </div>
            <div class="col-12 mb-3">
                <label class="fw-bold">Keperluan / Alasan Pinjam</label>
                <textarea class="form-control" name="keperluan" rows="2" placeholder="Contoh: Praktikum Fisika Dasar"></textarea>
            </div>
        </div>
        
        <div class="mt-3">
            <button type="submit" class="btn btn-success px-4">
                <i class="fas fa-save me-2"></i>Proses Peminjaman
            </button>
            <a href="<?= base_url('/riwayat') ?>" class="btn btn-outline-secondary">
                Lihat Daftar Peminjaman
            </a>
        </div>
    </form>
</div>
<?= $this->endSection() ?>