<div class="sidebar">
    <div class="p-4 text-center"><h5>LAB-SYS</h5><small class="text-info">Kelompok 2</small></div>
    <a href="<?= base_url('/') ?>" class="<?= url_is('/') ? 'active' : '' ?>"><i class="fas fa-home me-2"></i> Dashboard</a>
    <a href="<?= base_url('/inventaris') ?>"><i class="fas fa-boxes me-2"></i> Manajemen Barang</a>
    <a href="<?= base_url('/kategori') ?>"><i class="fas fa-tags me-2"></i> Kategori Barang</a>
    <a href="<?= base_url('/lokasi') ?>"><i class="fas fa-map-marker-alt me-2"></i> Lokasi Barang</a>
    <a href="<?= base_url('/peminjaman') ?>"><i class="fas fa-exchange-alt me-2"></i> Peminjaman</a>
    <a href="<?= base_url('/riwayat') ?>"><i class="fas fa-history me-2"></i> Riwayat</a>
    <a href="<?= base_url('/logout') ?>" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
</div>
