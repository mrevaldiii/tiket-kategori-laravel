<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Tiket</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container" style="max-width: 400px; margin-top: 5rem;">
        <div class="card">
            <h2 style="text-align: center; margin-bottom: 1.5rem;">Login Sistem Tiket</h2>

            @if($errors->any())
                <div style="color: #ef4444; margin-bottom: 1rem; text-align: center;">
                    {{ $errors->first() }}
                </div>
            @endif

            <form action="{{ route('login.post') }}" method="POST">
                @csrf
                <div class="form-group" style="margin-bottom: 1rem;">
                    <label>Email</label>
                    <input type="email" name="email" class="form-control" placeholder="admin@gmail.com" required>
                </div>
                <div class="form-group" style="margin-bottom: 1.5rem;">
                    <label>Password</label>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>
                <button type="submit" class="btn btn-block">Masuk Log In</button>
            </form>
        </div>
    </div>
</body>
</html>