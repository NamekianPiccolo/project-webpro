<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - LAB-SYS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .register-card { width: 100%; max-width: 450px; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-info { background-color: #0dcaf0; border: none; color: white; }
        .form-control { border-radius: 10px; border: 2px solid #eee; }
    </style>
</head>
<body>

<div class="card register-card p-4">
    <div class="mb-4">
        <h4 class="fw-bold m-0">Buat Akun Baru</h4>
        <p class="text-muted small">Lengkapi data untuk akses sistem laboratorium</p>
    </div>

    <form action="<?= base_url('/login') ?>" method="get">
        <div class="row">
            <div class="col-md-12 mb-3">
                <label class="form-label small fw-bold text-muted">NAMA LENGKAP</label>
                <input type="text" class="form-control" placeholder="Nama sesuai KTM" required>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label small fw-bold text-muted">NIM</label>
                <input type="text" class="form-control" placeholder="Contoh: 220101xxx" required>
            </div>
            <div class="col-md-12 mb-3">
                <label class="form-label small fw-bold text-muted">PASSWORD</label>
                <input type="password" class="form-control" placeholder="Buat password aman" required>
            </div>
        </div>
        
        <button type="submit" class="btn btn-info w-100 rounded-pill fw-bold py-2 shadow-sm text-white mt-3">DAFTAR AKUN</button>
    </form>

    <div class="text-center mt-4">
        <p class="small text-muted">Sudah punya akun? <a href="<?= base_url('/login') ?>" class="text-info fw-bold text-decoration-none">Login Disini</a></p>
    </div>
</div>

</body>
</html>