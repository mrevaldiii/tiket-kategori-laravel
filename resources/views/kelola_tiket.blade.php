<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengelolaan Tiket</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <div class="container">
        <!-- 1. NAVBAR IDENTITAS USER & LOGOUT -->
        <div style="display: flex; justify-content: space-between; align-items: center; background: var(--card-bg); padding: 1rem; border-radius: 8px; margin-bottom: 1rem; border: 1px solid var(--border-color);">
            <div style="color: var(--text-primary);">
                Logged in as: <strong>{{ auth()->user()->name }}</strong> (Role: <span style="text-transform: uppercase; color: #3b82f6; font-weight: bold;">{{ auth()->user()->role }}</span>)
            </div>
            <form action="{{ route('logout') }}" method="POST" style="margin: 0;">
                @csrf
                <button type="submit" class="btn" style="background: #ef4444; padding: 0.4rem 0.8rem; font-size: 0.85rem;">Logout</button>
            </form>
        </div>

        <div style="margin-bottom: -0.5rem;">
            <a href="{{ route('home') }}" class="btn" style="background: var(--card-bg); border: 1px solid var(--border-color); color: var(--text-primary); padding: 0.5rem 1rem;">
                &larr; Kembali
            </a>
        </div>

        <div class="card">
            <h2>Tipe Tiket, Harga, Kuota & Benefit</h2>
            <div class="ticket-grid">
                <div class="ticket-card">
                    <div>
                        <h3>Early Bird</h3>
                        <div class="ticket-price">Rp 150.000</div>
                        <span>Kuota: <strong>50 Kursi</strong></span>
                        <ul class="benefit-list">
                            <li>Akses Sesi Utama</li>
                            <li>E-Certificate</li>
                            <li>Snack Box</li>
                        </ul>
                    </div>
                </div>
                <div class="ticket-card">
                    <div>
                        <h3>Regular</h3>
                        <div class="ticket-price">Rp 250.000</div>
                        <span>Kuota: <strong>200 Kursi</strong></span>
                        <ul class="benefit-list">
                            <li>Akses Sesi Utama</li>
                            <li>E-Certificate</li>
                            <li>Lunch Buffet</li>
                            <li>Merchandise Kit</li>
                        </ul>
                    </div>
                </div>
                <div class="ticket-card">
                    <div>
                        <h3>VIP</h3>
                        <div class="ticket-price">Rp 500.000</div>
                        <span>Kuota: <strong>30 Kursi</strong></span>
                        <ul class="benefit-list">
                            <li>VIP Seat & Fast-Track</li>
                            <li>Meet & Greet Speaker</li>
                            <li>Exclusive Lounge</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="card">
            <h3>Pilih Tiket</h3>
            <form action="{{ route('tiket.store') }}" method="POST" style="margin-top: 1rem;">
                @csrf
                <input type="hidden" id="tipeTiketName" name="tipe_tiket_name" value="Regular">

                <div class="grid-info" style="grid-template-columns: repeat(auto-fit, minmax(180px, 1fr)); background: transparent; padding: 0; border: none;">
                    <div class="form-group">
                        <label>Tipe Tiket</label>
                        <select id="ticketSelect" name="ticket_select" class="form-control" onchange="updateTicketInfo()">
                            <option value="150000|50">Early Bird</option>
                            <option value="250000|200" selected>Regular</option>
                            <option value="500000|30">VIP</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Harga Tiket (Rp)</label>
                        <input type="text" id="ticketPrice" class="form-control" value="250.000" readonly>
                    </div>
                    <div class="form-group">
                        <label>Kuota Tersedia</label>
                        <input type="text" id="ticketQuota" class="form-control" value="200 Kursi" readonly>
                    </div>
                </div>

                <div class="form-group">
                    <label>Masukan Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Contoh: Muhammad Revaldi" required>
                </div>

                <button type="submit" class="btn">Simpan Tiket dan Bayar</button>
            </form>
        </div>

        <div class="card">
            <h3>Daftar Pemesanan Tiket</h3>
            <table style="width: 100%; border-collapse: collapse; margin-top: 1rem; color: var(--text-primary);">
                <thead>
                    <tr style="border-bottom: 1px solid var(--border-color); text-align: left;">
                        <th style="padding: 8px;">Nama</th>
                        <th style="padding: 8px;">Tipe</th>
                        <th style="padding: 8px;">Harga</th>
                        <th style="padding: 8px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($transaksi as $item)
                    <tr style="border-bottom: 1px solid var(--border-color);">
                        <td style="padding: 8px;">{{ $item->nama_lengkap }}</td>
                        <td style="padding: 8px;">{{ $item->tipe_tiket }}</td>
                        <td style="padding: 8px;">Rp {{ number_format($item->harga, 0, ',', '.') }}</td>
                        
                        <!-- 2. HAK AKSES TOMBOL HAPUS KHUSUS ADMIN -->
                        <td style="padding: 8px;">
                            @if(auth()->user()->role == 'admin')
                                <form action="{{ route('tiket.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn" style="background: #ef4444; padding: 0.3rem 0.6rem; font-size: 0.8rem;">Hapus</button>
                                </form>
                            @else
                                <span style="color: #9ca3af; font-size: 0.85rem; font-style: italic;">Tidak Ada Akses Hapus</span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function updateTicketInfo() {
            const select = document.getElementById('ticketSelect');
            const selectedOptionText = select.options[select.selectedIndex].text;
            const [price, quota] = select.value.split('|');

            document.getElementById('ticketPrice').value = new Intl.NumberFormat('id-ID').format(price);
            document.getElementById('ticketQuota').value = quota + ' Kursi';
            document.getElementById('tipeTiketName').value = selectedOptionText;
        }
    </script>
</body>
</html>