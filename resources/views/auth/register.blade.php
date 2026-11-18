<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Sistem Tiket</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body style="align-items: center;">
    <div class="card" style="width: 100%; max-width: 420px;">
        <div style="text-align: center; margin-bottom: 1.5rem;">
            <span class="system-tag">Registrasi Akun Baru</span>
            <h2 style="color: var(--text-primary);">Daftar Sistem Tiket</h2>
        </div>

        @if ($errors->any())
            <div style="background: #fee2e2; color: #b91c1c; padding: 0.75rem; border-radius: 6px; margin-bottom: 1rem; font-size: 0.85rem;">
                <ul style="margin-left: 1rem;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register') }}" method="POST">
            @csrf
            <div class="form-group">
                <label>Nama Lengkap</label>
                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="Contoh: Muhammad Revaldi" required autofocus>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" class="form-control" value="{{ old('email') }}" placeholder="nama@gmail.com" required>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
            </div>

            <div class="form-group">
                <label>Konfirmasi Password</label>
                <input type="password" name="password_confirmation" class="form-control" placeholder="Ulangi password" required>
            </div>

            <button type="submit" class="btn btn-block">Daftar Sekarang</button>
        </form>

        <div style="text-align: center; margin-top: 1.25rem; font-size: 0.85rem; color: var(--text-secondary);">
            Sudah punya akun? <a href="{{ route('login') }}" style="color: var(--accent); font-weight: 600; text-decoration: none;">Masuk di sini</a>
        </div>
    </div>
</body>
</html>