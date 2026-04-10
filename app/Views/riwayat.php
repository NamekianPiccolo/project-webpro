<?= $this->extend('layout') ?>
<?= $this->section('content') ?>

<div class="card shadow-sm border-0 rounded-4 p-4 text-dark">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="fw-bold m-0">
            <i class="fas fa-history me-2 text-info"></i>Riwayat Transaksi Lab
        </h4>
        <button class="btn btn-info text-white rounded-pill px-4 shadow-sm fw-bold">
            <i class="fas fa-file-export me-1"></i> Export Data
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>NIM</th> <th>Nama Peminjam</th>
                    <th>Alat Lab</th>
                    <th>Qty</th> <th>Tgl Pinjam</th>
                    <th>Status</th>
                    <th class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; foreach($semua_riwayat as $r): ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td class="text-muted"><?= $r['nim'] ?></td> <td class="fw-bold"><?= $r['peminjam'] ?></td>
                    <td><?= $r['barang'] ?></td>
                    <td class="text-center"><span class="badge bg-light text-dark border"><?= $r['jumlah'] ?></span></td> <td><?= $r['tgl_pinjam'] ?></td>
                    <td>
                        <?php if($r['status'] == 'Dipinjam'): ?>
                            <span class="badge bg-info text-white rounded-pill px-3">Dipinjam</span>
                        <?php else: ?>
                            <span class="badge bg-success text-white rounded-pill px-3">Kembali</span>
                        <?php endif; ?>
                    </td>
                    <td class="text-center">
                        <button class="btn btn-sm btn-info text-white rounded-pill px-3 shadow-sm">
                            Detail
                        </button>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?= $this->endSection() ?>