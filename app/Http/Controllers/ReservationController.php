<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Reservation;
use App\Models\Users;
use App\Models\Tables;
use Carbon\Carbon;


class ReservationController extends Controller
{
    public function index()
    {
        return view('reservation.index');
    }

    public function showFirst(Request $request)
    {
        $idPelanggan = Auth::user()->id;

        $tipeMeja = $request->query('tipeMeja');
        $namaMeja = [];
        $hargaMeja = 0;

        if ($tipeMeja == '4 Orang') {
            $namaMeja = [3, 4, 5, 6, 7, 8];
            $hargaMeja = 100000;
        } else if ($tipeMeja == '8 Orang') {
            $namaMeja = [1, 2, 9, 10];
            $hargaMeja = 200000;
        }

        $reservResult = DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->first();

        $biaya = $reservResult ? $reservResult->biaya : null;

        return view('reservation.first', compact('namaMeja', 'hargaMeja', 'reservResult', 'tipeMeja', 'biaya'));
    }

    public function setDate(Request $request)
    {
        $idPelanggan = Auth::user()->id;
        $tipeMeja = $request->query('tipeMeja');
        $tanggal = $request->input('tanggal');

        $reservation = DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->first();

        if (empty($reservation)) {
            DB::table('reservation')->insert([
                'idPelanggan' => $idPelanggan,
                'status' => 'processing',
                'tanggal' => $tanggal,
            ]);
        } else {
            DB::table('reservation')
                ->where('idPelanggan', $idPelanggan)
                ->where('status', 'processing')
                ->update(['tanggal' => $tanggal]);
        }
        $reservResult = DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->first();

        return redirect()->route('reservation.first', ['tipeMeja' => $tipeMeja, 'reservResult']);
    }

    public function chooseTable(Request $request)
    {
        $idMeja = $request->input('idMeja');
        $jamMasuk = $request->input('jamMasuk');
        $jamKeluar = $request->input('jamKeluar');
        $hargaMeja = $request->input('hargaMeja');
        $tipeMeja = $request->input('tipeMeja');

        // Menghitung durasi reservasi dalam menit
        $durasiReservasi = Carbon::parse($jamMasuk)->diffInMinutes(Carbon::parse($jamKeluar));

        // Menghitung biaya reservasi
        $biaya = $durasiReservasi / 60 * $hargaMeja; // Harga per jam * durasi reservasi dalam jam


        $timeCheckResult = $this->timeCheck($idMeja, $jamMasuk, $jamKeluar, $hargaMeja);

        if ($timeCheckResult == -1) {
            return back()->with('error', 'Meja yang anda pilih sudah direservasi di jam tersebut');
        } else if ($timeCheckResult == -2) {
            return back()->with('error', 'Durasi reservasi minimal 1 jam');
        } else if ($timeCheckResult == -3) {
            return back()->with('error', 'Jam keluar tidak boleh lebih dulu dari jam masuk.');
        }

        return redirect()->route('reservation.first', ['tipeMeja' => $tipeMeja]);
    }

    public function decide(Request $request)
    {
        return redirect()->route('reservation.second');
    }

    private function timeCheck($idMeja, $jamMasuk, $jamKeluar, $hargaMeja)
    {
        // Parsing time inputs to Carbon instances for easier comparison
    $jamMasuk = \Carbon\Carbon::parse($jamMasuk);
    $jamKeluar = \Carbon\Carbon::parse($jamKeluar);

    // Check if the reservation duration is at least 1 hour
    if ($jamKeluar->diffInMinutes($jamMasuk) < 60) {
        return -2; // Reservation duration is less than 1 hour
    }

    // Check if jamKeluar is after jamMasuk
    if ($jamKeluar->lessThanOrEqualTo($jamMasuk)) {
        return -3; // jamKeluar is before or equal to jamMasuk
    }

    // Check if the table is already reserved in the given time frame
    $existingReservations = \DB::table('reservation')
        ->where('idMeja', $idMeja)
        ->where(function($query) use ($jamMasuk, $jamKeluar) {
            $query->whereBetween('jamMasuk', [$jamMasuk, $jamKeluar])
                  ->orWhereBetween('jamKeluar', [$jamMasuk, $jamKeluar])
                  ->orWhere(function($query) use ($jamMasuk, $jamKeluar) {
                      $query->where('jamMasuk', '<=', $jamMasuk)
                            ->where('jamKeluar', '>=', $jamKeluar);
                  });
        })
        ->where('status', 'confirmed')
        ->exists();

    if ($existingReservations) {
        return -1; // The table is already reserved
    }

    // If all checks pass, return a valid result (could be the price or another positive indicator)
    return $hargaMeja; // Example of returning the table price if all checks pass
    }

    public function showSecond(Request $request)
    {
        $idPelanggan = Auth::user()->id;

        $reservResult = DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->first();

        if(!$reservResult || !isset($reservResult->jamMasuk)) {
            return redirect()->route('reservation.first');
        }

        $userResult = DB::table('users')->where('id', $idPelanggan)->first();

        return view('reservation.second', compact('userResult', 'reservResult'));
    }

    public function saveContactInfo(Request $request)
    {
        $idPelanggan = Auth::user()->id;
        $atasNama = $request->input('atasNama');
        $email = $request->input('email');
        $telepon = $request->input('telepon');

        DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->update([
                'atasNama' => $atasNama,
                'email' => $email,
                'telepon' => $telepon
            ]);

            return redirect()->route('reservation.third');
        }

    public function showThird(Request $request)
    {
        $idPelanggan = Auth::user()->id;
        $reservResult = DB::table('reservation')
            ->where('idPelanggan', $idPelanggan)
            ->where('status', 'processing')
            ->first();

        if (!$reservResult || !isset($reservResult->email)) {
            return redirect()->route('reservation.first');
        }

        return view('reservation.third', compact('reservResult'));
    }

    public function confirmReservation(Request $request)
{
    $idPelanggan = Auth::user()->id;

    $request->validate([
        'buktiBayar' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    if ($request->hasFile('buktiBayar')) {
        // Buat nama file yang unik
        $fileName = time() . '_' . $request->file('buktiBayar')->getClientOriginalName();
        // Simpan file ke direktori public/images/bukti_bayar
        $path = $request->file('buktiBayar')->store('public/images/bukti_bayar');

        // Hapus 'public/' dari path untuk penyimpanan di database
        $buktiBayar = $path;
    }

    DB::table('reservation')
        ->where('idPelanggan', $idPelanggan)
        ->where('status', 'processing')
        ->update([
            'buktiBayar' => $buktiBayar,
            'status' => 'waiting'
        ]);

    return redirect()->route('reservhistory');
}


    public function choose(Request $request)
{
    $idPelanggan = Auth::user()->id;

    // Validasi data
    $validatedData = $request->validate([
        'idMeja' => 'required|integer',
        'tanggal' => 'required|date',
        'jamMasuk' => 'required|date_format:H:i',
        'jamKeluar' => 'required|date_format:H:i',
        'hargaMeja' => 'required|numeric',
        'tipeMeja' => 'required|string',
    ]);

    // Mengambil nilai yang telah divalidasi
    $idMeja = $validatedData['idMeja'];
    $tanggal = $validatedData['tanggal'];
    $jamMasuk = $validatedData['jamMasuk'];
    $jamKeluar = $validatedData['jamKeluar'];
    $hargaMeja = $validatedData['hargaMeja'];
    $tipeMeja = $validatedData['tipeMeja'];

    // Menghitung durasi reservasi dalam menit
    $durasiReservasi = Carbon::parse($jamMasuk)->diffInMinutes(Carbon::parse($jamKeluar));

    // Menghitung biaya reservasi
    $biaya = $durasiReservasi / 60 * $hargaMeja; // Harga per jam * durasi reservasi dalam jam

    // Cek konflik waktu reservasi
    $timeCheckResult = $this->timeCheck($idMeja, $jamMasuk, $jamKeluar, $hargaMeja);

    if ($timeCheckResult == -1) {
        return back()->with('error', 'Meja yang anda pilih sudah direservasi di jam tersebut');
    } else if ($timeCheckResult == -2) {
        return back()->with('error', 'Durasi reservasi minimal 1 jam');
    } else if ($timeCheckResult == -3) {
        return back()->with('error', 'Jam keluar tidak boleh lebih dulu dari jam masuk.');
    }

    // Parse jamMasuk dan jamKeluar dengan tanggal yang sesuai
    $tanggal = Carbon::parse($request->input('tanggal'));
    $jamMasuk = Carbon::parse($tanggal->toDateString() . ' ' . $validatedData['jamMasuk']);
    $jamKeluar = Carbon::parse($tanggal->toDateString() . ' ' . $validatedData['jamKeluar']);

    // Cari reservasi yang sudah ada berdasarkan idPelanggan dan tanggal
    $reservation = Reservation::where('idPelanggan', $idPelanggan)
                    ->where('tanggal', $tanggal)
                    ->first();

    // Jika reservasi ditemukan, update data
    if ($reservation) {
        $reservation->idMeja = $idMeja;
        $reservation->jamMasuk = $jamMasuk;
        $reservation->jamKeluar = $jamKeluar;
        $reservation->biaya = $biaya;
        $reservation->hargaMeja = $hargaMeja;
        $reservation->tipeMeja = $tipeMeja;
        $reservation->status = 'processing'; // atau status default yang diinginkan
    } else {
        // Jika reservasi tidak ditemukan, buat entri baru
        $reservation = new Reservation();
        $reservation->idPelanggan = $idPelanggan;
        $reservation->idMeja = $idMeja;
        $reservation->tanggal = $tanggal;
        $reservation->jamMasuk = $jamMasuk;
        $reservation->jamKeluar = $jamKeluar;
        $reservation->biaya = $biaya;
        $reservation->hargaMeja = $hargaMeja;
        $reservation->tipeMeja = $tipeMeja;
        $reservation->status = 'processing'; // atau status default yang diinginkan
    }

    // Simpan reservasi (baik update atau entri baru)
    $reservation->save();

    // Redirect atau kembalikan respon yang sesuai
    return redirect()->route('reservation.first', ['tipeMeja' => $tipeMeja]);
}

    public function success()
    {
        return view('reservation/first/decide');
    }
}
