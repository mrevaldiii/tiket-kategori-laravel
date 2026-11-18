<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Tiket</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body style="align-items: center;">
    <div class="card" style="width: 100%; max-width: 400px;">
        <div style="text-align: center; margin-bottom: 1.5rem;">
            <span class="system-tag">Autentikasi Pengguna</span>
            <h2 style="color: var(--text-primary);">Login Sistem Tiket</h2>
        </div>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.85rem;">
                {{ $errors->first() }}
            </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="admin@gmail.com" required autofocus>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn btn-block">Masuk Log In</button>
        </form>

        <div style="text-align: center; margin-top: 1.25rem; font-size: 0.85rem; color: var(--text-secondary);">
            Belum punya akun? <a href="{{ route('register') }}" style="color: var(--accent); font-weight: 600; text-decoration: none;">Daftar di sini</a>
        </div>
    </div>
</body>
</html>