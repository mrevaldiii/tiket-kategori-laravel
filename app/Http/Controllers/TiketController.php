<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTiket;

class TiketController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function kelolaTiket()
    {
        $transaksi = TransaksiTiket::all();
        return view('kelola_tiket', compact('transaksi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required',
            'ticket_select' => 'required',
        ]);

        $ticketInfo = explode('|', $request->ticket_select);
        $harga = $ticketInfo[0] ?? 0;
        $kuota = $ticketInfo[1] ?? 0;

        TransaksiTiket::create([
            'tipe_tiket' => $request->tipe_tiket_name ?? 'Regular',
            'harga' => $harga,
            'kuota_tersedia' => $kuota . ' Kursi',
            'nama_lengkap' => $request->nama_lengkap,
        ]);

        return redirect()->route('tiket.kelola');
    }

    public function destroy($id)
    {
        $data = TransaksiTiket::findOrFail($id);
        $data->delete();

        return redirect()->route('tiket.kelola');
    }
}