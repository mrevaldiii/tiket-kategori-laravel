<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modul Tiket & Kategori - Profil</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <div class="card">
            <div class="profile-header">
                <span class="system-tag">Sistem Manajemen Event</span>
                <div class="profile-title">
                    <h1>Modul Tiket & Kategori</h1>
                </div>
            </div>

            <div class="grid-info">
                <div class="info-item"><label>Nama</label><span>Muhammad Revaldi</span></div>
                <div class="info-item"><label>NIM</label><span>102022500014</span></div>
                <div class="info-item"><label>Kelas</label><span>SI-49-06</span></div>
                <div class="info-item"><label>Kelompok</label><span>Kelompok 8</span></div>
                <div class="info-item"><label>Modul</label><span>Tiket & Kategori</span></div>
            </div>
        </div>

        <div>
            <h3 style="margin-bottom: 0.75rem; color: var(--text-primary);">Ringkasan Modul</h3>
            <div class="summary-cards-grid">
                <div class="summary-card-item">
                    <label>Total Kategori Tiket</label>
                    <div class="big-value">3 Tipe</div>
                    <div class="sub-value">Early Bird, Regular, VIP</div>
                </div>
                <div class="summary-card-item">
                    <label>Total Kuota Dialokasikan</label>
                    <div class="big-value">850 Kursi</div>
                    <div class="sub-value">Tersedia untuk penjualan</div>
                </div>
            </div>
        </div>

        <div class="card">
            <form action="{{ route('tiket.kelola') }}" method="GET">
                <button type="submit" class="btn btn-block">Lanjutkan Memilih Tiket &gt;</button>
            </form>
        </div>
    </div>
</body>
</html>