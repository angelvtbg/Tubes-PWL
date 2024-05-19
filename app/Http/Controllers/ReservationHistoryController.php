<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation; // Pastikan model Reservation sudah dibuat

class ReservationHistoryController extends Controller
{
    public function index()
    {
        $userLevel = session('role');
        $idPelanggan = session('idPelanggan');

        if (empty(session('nama')) || $userLevel == 'admin') {
            return redirect()->route($userLevel == 'admin' ? 'admin.dashboard' : 'home');
        }

        $waitingResult = Reservation::where('idPelanggan', $idPelanggan)
            ->where('status', 'waiting')
            ->orderBy('tanggal', 'ASC')
            ->orderBy('jamMasuk', 'ASC')
            ->get();

        // Tambahkan logika untuk status lainnya sesuai kebutuhan

        return view('history.reservhistory', compact('waitingResult'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        Reservation::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Riwayat berhasil dihapus.');
    }
}
