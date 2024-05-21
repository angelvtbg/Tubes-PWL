<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Reservation; // Pastikan model Reservation sudah dibuat

class ReservationHistoryController extends Controller
{
    public function index()
    {
        $user = Auth::user();
    $userLevel = $user->role;
    $idPelanggan = $user->id;

    if (empty($user->name) || $userLevel == 'admin') {
        return redirect()->route($userLevel == 'admin' ? 'admin.dashboard' : 'home');
    }

    $waitingResult = Reservation::where('idPelanggan', $idPelanggan)
        ->where('status', 'waiting')
        ->orderBy('tanggal', 'ASC')
        ->orderBy('jamMasuk', 'ASC')
        ->get();

    $rejectedResult = Reservation::where('idPelanggan', $idPelanggan)
        ->where('status', 'rejected')
        ->orderBy('tanggal', 'ASC')
        ->orderBy('jamMasuk', 'ASC')
        ->get();

    $absentResult = Reservation::where('idPelanggan', $idPelanggan)
        ->where('status', 'absent')
        ->orderBy('tanggal', 'ASC')
        ->orderBy('jamMasuk', 'ASC')
        ->get();

    $confirmedResult = Reservation::where('idPelanggan', $idPelanggan)
        ->where('status', 'confirmed')
        ->orderBy('tanggal', 'ASC')
        ->orderBy('jamMasuk', 'ASC')
        ->get();

    $attendedResult = Reservation::where('idPelanggan', $idPelanggan)
        ->where('status', 'attended')
        ->orderBy('tanggal', 'ASC')
        ->orderBy('jamMasuk', 'ASC')
        ->get();

    // Tambahkan logika untuk status lainnya sesuai kebutuhan

    return view('history.reservhistory', compact('waitingResult', 'rejectedResult', 'absentResult', 'confirmedResult', 'attendedResult'));
    }

    public function delete(Request $request)
    {
        $id = $request->input('id');

        Reservation::where('id', $id)->delete();

        return redirect()->back()->with('success', 'Riwayat berhasil dihapus.');
    }
}
