<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Kasir - All Clean Laundry</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');
        body {
            background: linear-gradient(135deg, #eff6ff 0%, #dbeafe 100%);
            font-family: 'Plus Jakarta Sans', sans-serif;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .login-card {
            border: none;
            border-radius: 24px;
            box-shadow: 0 20px 40px rgba(15, 23, 42, 0.08);
            background: #ffffff;
            width: 100%;
            max-width: 420px;
            padding: 40px 30px;
        }
        .form-control-modern {
            border: 2px solid #e2e8f0;
            border-radius: 12px;
            padding: 12px 16px;
            font-weight: 500;
            transition: all 0.3s;
        }
        .form-control-modern:focus {
            border-color: #3b82f6;
            box-shadow: 0 0 0 4px rgba(59, 130, 246, 0.1);
        }
        .btn-login {
            border-radius: 12px;
            padding: 12px;
            font-weight: 700;
            background: linear-gradient(135deg, #2563eb 0%, #1d4ed8 100%);
            border: none;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(37, 99, 219, 0.3);
        }
    </style>
</head>
<body>

    <div class="login-card text-center">
        <div class="mb-4">
            <div class="bg-primary-subtle text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width: 60px; height: 60px;">
                <i class="fas fa-lock fa-lg"></i>
            </div>
            <h4 class="fw-bold text-dark m-0">Autentikasi Kasir</h4>
            <p class="text-muted small">Masuk untuk mengelola transaksi All Clean</p>
        </div>

        @if (session('error'))
            <div class="alert alert-danger border-0 small rounded-3 text-start mb-3" role="alert">
                <i class="fas fa-exclamation-circle me-1"></i> {{ session('error') }}
            </div>
        @endif

        <form action="/login" method="POST" class="text-start">
            @csrf
            <div class="mb-3">
                <label class="form-label small fw-semibold text-secondary">Username</label>
                <input type="text" name="username" class="form-control form-control-modern" placeholder="Masukkan username" required autocomplete="off">
            </div>
            <div class="mb-4">
                <label class="form-label small fw-semibold text-secondary">Password</label>
                <input type="password" name="password" class="form-control form-control-modern" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-login w-100 text-white shadow-sm">
                Masuk ke Dashboard <i class="fas fa-arrow-right ms-1 small"></i>
            </button>
        </form>
        
        <div class="mt-4 pt-3 border-top">
            <a href="/" class="text-decoration-none small fw-semibold text-secondary"><i class="fas fa-arrow-left me-1 small"></i> Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>