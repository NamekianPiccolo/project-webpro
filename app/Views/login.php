<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - LAB-SYS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; height: 100vh; display: flex; align-items: center; justify-content: center; font-family: 'Segoe UI', sans-serif; }
        .login-card { width: 100%; max-width: 400px; border: none; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); }
        .btn-info { background-color: #0dcaf0; border: none; color: white; transition: 0.3s; }
        .btn-info:hover { background-color: #0baccc; color: white; transform: translateY(-2px); }
        .form-control { border-radius: 10px; padding: 12px; border: 2px solid #eee; }
        .form-control:focus { border-color: #0dcaf0; box-shadow: none; }
    </style>
</head>
<body>

<div class="card login-card p-4">
    <div class="text-center mb-4">
        <div class="bg-info bg-opacity-10 text-info d-inline-block p-3 rounded-circle mb-3">
            <i class="fas fa-microscope fa-2x"></i>
        </div>
        <h3 class="fw-bold">LAB-SYS</h3>
        <p class="text-muted small">Kelompok 2 - Inventaris Laboratorium</p>
    </div>

    <form action="<?= base_url('/auth') ?>" method="post">
    <?= csrf_field() ?>
    
    <div class="mb-3">
        <label class="form-label small fw-bold text-muted">USERNAME / NIM</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent border-end-0"><i class="fas fa-user text-muted"></i></span>
            <input type="text" name="nim" id="nim" class="form-control border-start-0" placeholder="Masukkan NIM anda" required>
        </div>
    </div>

    <div class="mb-4">
        <label class="form-label small fw-bold text-muted">PASSWORD</label>
        <div class="input-group">
            <span class="input-group-text bg-transparent border-end-0"><i class="fas fa-lock text-muted"></i></span>
            <input type="password" name="password" id="password" class="form-control border-start-0" placeholder="Password" required>
        </div>
    </div>

    <button type="submit" class="btn btn-info w-100 rounded-pill fw-bold py-2 shadow-sm">MASUK</button>
</form>