<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservation;
use Illuminate\Auth\SessionGuard;

class ReservAdminController extends Controller
{
    public function __construct()
{
    $this->middleware('auth');
    $this->middleware(function ($request, $next) {
        if (auth()->user()->role != 'admin') {
            return redirect('/customer/index');
        }
        return $next($request);
    });
}

    public function index()
    {
        $reservConfirm = Reservation::where('status', 'waiting')->orderBy('tanggal', 'asc')->get();
        return view('admin.reservAdmin', compact('reservConfirm'));
    }

    public function accept(Request $request)
    {
        $id = $request->input('id');
        $reservation = Reservation::find($id);
        $reservation->status = 'confirmed';
        $reservation->save();

        return redirect()->route('admin.reservadmin')->with('success', 'Reservasi berhasil diterima.');
    }

    public function reject(Request $request)
    {
        $id = $request->input('id');
        $reservation = Reservation::find($id);
        $reservation->status = 'rejected';
        $reservation->save();

        return redirect()->route('admin.reservadmin')->with('success', 'Reservasi berhasil ditolak.');
    }
}
