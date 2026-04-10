<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>LAB-SYS | Kelompok 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background: #f8f9fa; display: flex; min-height: 100vh; }
        .sidebar { width: 260px; background: #212529; color: white; position: fixed; height: 100%; }
        .sidebar a { color: #adb5bd; text-decoration: none; padding: 12px 20px; display: block; border-bottom: 1px solid #343a40; }
        .sidebar a:hover, .sidebar .active { background: #343a40; color: white; }
        .main-content { margin-left: 260px; flex-grow: 1; padding: 30px; }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="p-4 text-center"><h5>LAB-SYS</h5><small class="text-info">Kelompok 2</small></div>
        <a href="<?= base_url('/') ?>" class="<?= url_is('/') ? 'active' : '' ?>"><i class="fas fa-home me-2"></i> Dashboard</a>
        <a href="<?= base_url('/inventaris') ?>"><i class="fas fa-boxes me-2"></i> Manajemen Barang</a>
        <a href="<?= base_url('/kategori') ?>"><i class="fas fa-tags me-2"></i> Kategori Barang</a>
        <a href="<?= base_url('/lokasi') ?>"><i class="fas fa-map-marker-alt me-2"></i> Lokasi Barang</a>
        <a href="<?= base_url('/peminjaman') ?>"><i class="fas fa-exchange-alt me-2"></i> Peminjaman</a>
        <a href="<?= base_url('/riwayat') ?>"><i class="fas fa-history me-2"></i> Riwayat</a>
        <a href="<?= base_url('/login') ?>" class="text-danger"><i class="fas fa-sign-out-alt me-2"></i> Logout</a>
    </div>
    <div class="main-content">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>