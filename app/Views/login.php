<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login | LAB-SYS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('https://images.unsplash.com/photo-1581093588401-fbb62a02f120?q=80&w=2070&auto=format&fit=crop');
            background-size: cover; height: 100vh; display: flex; align-items: center; justify-content: center;
        }
        .login-card {
            background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px);
            padding: 40px; border-radius: 20px; border: 1px solid rgba(255,255,255,0.2);
            color: white; width: 350px; text-align: center;
        }
        .form-control { background: rgba(255,255,255,0.2); border: none; color: white; margin-bottom: 15px; }
        .form-control::placeholder { color: #ddd; }
        .btn-primary { width: 100%; border-radius: 10px; font-weight: bold; }
    </style>
</head>
<body>
    <div class="login-card shadow-lg">
        <h2 class="fw-bold mb-4">LAB-SYS</h2>
        <form action="<?= base_url('/') ?>">
            <input type="text" class="form-control" placeholder="Username">
            <input type="password" class="form-control" placeholder="Password">
            <button type="submit" class="btn btn-primary py-2">MASUK</button>
        </form>
    </div>
</body>
</html>