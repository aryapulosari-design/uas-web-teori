<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login — CMS Blog</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { font-family: 'Inter', sans-serif; }
        body {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #0f1117;
            position: relative;
            overflow: hidden;
        }
        body::before {
            content: '';
            position: absolute;
            top: 0; left: 0; right: 0; bottom: 0;
            background:
                radial-gradient(ellipse at 30% 40%, rgba(25,135,84,0.15) 0%, transparent 50%),
                radial-gradient(ellipse at 70% 60%, rgba(32,201,151,0.1) 0%, transparent 50%);
        }
        .login-card {
            background: #1a1d25;
            border-radius: 20px;
            padding: 3rem;
            width: 100%;
            max-width: 420px;
            position: relative;
            border: 1px solid rgba(255,255,255,0.08);
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
        }
        .login-card .brand {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-card .brand .icon {
            width: 56px; height: 56px;
            background: linear-gradient(135deg, #198754, #20c997);
            border-radius: 14px;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            color: #fff;
            margin-bottom: 1rem;
            box-shadow: 0 8px 25px rgba(25,135,84,0.3);
        }
        .login-card .brand h4 { color: #fff; font-weight: 700; }
        .login-card .brand p { color: rgba(255,255,255,0.5); font-size: 0.9rem; }
        .form-label { color: rgba(255,255,255,0.7); font-weight: 500; font-size: 0.9rem; }
        .form-control {
            background: rgba(255,255,255,0.06);
            border: 1px solid rgba(255,255,255,0.1);
            color: #fff;
            padding: 0.75rem 1rem;
            border-radius: 10px;
            transition: all 0.3s;
        }
        .form-control:focus {
            background: rgba(255,255,255,0.08);
            border-color: #198754;
            color: #fff;
            box-shadow: 0 0 0 3px rgba(25,135,84,0.15);
        }
        .form-control::placeholder { color: rgba(255,255,255,0.3); }
        .btn-login {
            background: linear-gradient(135deg, #198754, #20c997);
            border: none;
            padding: 0.75rem;
            border-radius: 10px;
            font-weight: 600;
            color: #fff;
            width: 100%;
            transition: all 0.3s;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(25,135,84,0.35);
            color: #fff;
        }
        .form-check-label { color: rgba(255,255,255,0.6); font-size: 0.85rem; }
        .form-check-input:checked {
            background-color: #198754;
            border-color: #198754;
        }
        .back-link {
            color: rgba(255,255,255,0.5);
            text-decoration: none;
            font-size: 0.85rem;
            transition: color 0.2s;
        }
        .back-link:hover { color: #20c997; }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="brand">
            <div class="icon"><i class="bi bi-journal-richtext"></i></div>
            <h4>Login CMS</h4>
            <p>Masuk untuk mengelola konten blog</p>
        </div>

        @if($errors->any())
            <div class="alert alert-danger py-2 px-3" style="border-radius: 10px; font-size: 0.85rem;">
                <i class="bi bi-exclamation-triangle-fill me-1"></i>
                @foreach($errors->all() as $error)
                    {{ $error }}
                @endforeach
            </div>
        @endif

        <form method="POST" action="{{ route('login.authenticate') }}">
            @csrf
            <div class="mb-3">
                <label class="form-label">Email</label>
                <div class="input-group">
                    <span class="input-group-text" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-right:none; color: rgba(255,255,255,0.4);">
                        <i class="bi bi-envelope"></i>
                    </span>
                    <input type="email" name="email" class="form-control" placeholder="nama@email.com" value="{{ old('email') }}" required autofocus style="border-left:none;">
                </div>
            </div>
            <div class="mb-3">
                <label class="form-label">Password</label>
                <div class="input-group">
                    <span class="input-group-text" style="background: rgba(255,255,255,0.06); border: 1px solid rgba(255,255,255,0.1); border-right:none; color: rgba(255,255,255,0.4);">
                        <i class="bi bi-lock"></i>
                    </span>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required style="border-left:none;">
                </div>
            </div>
            <div class="mb-4 form-check">
                <input type="checkbox" class="form-check-input" name="remember" id="remember">
                <label class="form-check-label" for="remember">Ingat saya</label>
            </div>
            <button type="submit" class="btn btn-login mb-3">
                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk
            </button>
        </form>

        <div class="text-center">
            <a href="{{ route('publik.index') }}" class="back-link">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Beranda
            </a>
        </div>
    </div>
</body>
</html>
