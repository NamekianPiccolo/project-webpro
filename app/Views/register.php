<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register | LAB-SYS Inventaris</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        :root {
            --primary-color: #0dcaf0;
            --secondary-color: #0081a7;
            --bg-gradient: linear-gradient(135deg, #0081a7 0%, #00afb9 100%);
        }

        body {
            background: var(--bg-gradient);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Plus Jakarta Sans', sans-serif;
            margin: 0;
            padding: 20px 0;
        }

        /* Dekorasi Latar Belakang */
        .circle {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.1);
            z-index: -1;
            animation: float 20s infinite linear;
        }
        .circle-1 { width: 300px; height: 300px; top: -50px; right: -50px; }
        .circle-2 { width: 150px; height: 150px; bottom: 20px; left: 50px; }

        @keyframes float {
            0% { transform: translate(0, 0); }
            50% { transform: translate(-30px, 20px); }
            100% { transform: translate(0, 0); }
        }

        .register-container {
            width: 100%;
            max-width: 450px;
            padding: 20px;
        }

        .register-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(15px);
            border-radius: 24px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px rgba(0, 0, 0, 0.2);
            padding: 40px 30px;
        }

        .header-icon {
            width: 60px;
            height: 60px;
            background: var(--primary-color);
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 15px;
            margin: 0 auto 15px;
            color: white;
            font-size: 25px;
            box-shadow: 0 8px 15px rgba(13, 202, 240, 0.3);
        }

        .form-label {
            font-size: 0.8rem;
            font-weight: 700;
            color: #555;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            margin-left: 4px;
        }

        .input-group {
            background: #f8f9fa;
            border-radius: 12px;
            padding: 2px 12px;
            border: 2px solid #edf2f4;
            transition: all 0.3s ease;
        }

        .input-group:focus-within {
            border-color: var(--primary-color);
            background: white;
            box-shadow: 0 0 0 4px rgba(13, 202, 240, 0.1);
        }

        .input-group-text {
            background: transparent;
            border: none;
            color: #adb5bd;
        }

        .form-control {
            background: transparent;
            border: none;
            padding: 12px 8px;
            font-size: 0.95rem;
        }

        .form-control:focus {
            box-shadow: none;
            background: transparent;
        }

        .btn-register {
            background: var(--bg-gradient);
            border: none;
            border-radius: 12px;
            padding: 14px;
            font-weight: 700;
            color: white;
            margin-top: 10px;
            transition: all 0.3s ease;
            box-shadow: 0 10px 20px rgba(0, 129, 167, 0.3);
        }

        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 15px 25px rgba(0, 129, 167, 0.4);
            color: white;
        }

        .login-link {
            color: var(--secondary-color);
            text-decoration: none;
            font-weight: 700;
        }

        .login-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <div class="circle circle-1"></div>
    <div class="circle circle-2"></div>

    <div class="register-container">
        <div class="register-card">
            <div class="text-center mb-4">
                <div class="header-icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h3 class="fw-bold mb-1" style="color: #2b2d42;">Buat Akun</h3>
                <p class="text-muted small">Daftarkan NIM Anda di sistem LAB-SYS</p>
            </div>

            <?php if (session()->getFlashdata('error')) : ?>
                <div class="alert alert-danger py-2 small mb-3">
                    <?= session()->getFlashdata('error') ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('register/save') ?>" method="post">
                <?= csrf_field() ?>
                
                <div class="mb-3">
                    <label class="form-label">NIM (Nomor Induk Mahasiswa)</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-id-card"></i></span>
                        <input type="text" name="nim" class="form-control" placeholder="Contoh: 15240425" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama Lengkap</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-signature"></i></span>
                        <input type="text" name="nama_lengkap" class="form-control" placeholder="Masukkan nama anda" required>
                    </div>
                </div>

                <div class="mb-4">
                    <label class="form-label">Buat Password</label>
                    <div class="input-group">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                        <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-register w-100 shadow-sm">DAFTARKAN SEKARANG</button>
            </form>

            <div class="text-center mt-4">
                <p class="small text-muted mb-0">Sudah punya akun?</p>
                <a href="<?= base_url('login') ?>" class="login-link">Kembali ke Halaman Login</a>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>