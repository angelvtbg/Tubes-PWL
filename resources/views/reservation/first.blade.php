<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <title>Choose Time (Reservation)</title>
</head>

<body>
    @include('includes.headerR')

    <main class="l-main">
        <section id="home" class="review__container">
            <div class="home__container bd-container home-grid">
                <div class="home__data">
                    <img src="{{ asset('images/mapss.png') }}" alt="">

                    <div>
                        <div>
                            <form action="{{ url('reservation/first/date?tipeMeja=' . $tipeMeja) }}" method="POST">
                                @csrf
                                <p>Silahkan masukkan tanggal terlebih dahulu untuk melihat ketersediaan meja</p>
                                <input type="date" name="tanggal" id="tanggal" required>
                                <input type="hidden" name="idPelanggan" value="{{ Session::get('idPelanggan') }}">
                                <button type="submit" class="custom-button">Pilih</button>
                            </form>
                        </div>

                        <div style="margin-top: 50px">
                            @if (isset($reservResult->tanggal))
                                <form action="{{ url('reservation/first/choose') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="idPelanggan" value="{{ Session::get('idPelanggan') }}">
                                    <input type="hidden" name="hargaMeja" value="{{ $hargaMeja }}">
                                    <input type="hidden" name="tipeMeja" value="{{ $tipeMeja }}">
                                    <input type="hidden" name="tanggal" value="{{ $reservResult->tanggal }}">
                                    <table>
                                        <tr>
                                            <td>Pilih meja</td>
                                            <td>:</td>
                                            <td>
                                                <select name="idMeja" id="idMeja" required>
                                                    <option value="" disabled selected hidden>Pilih meja...</option>
                                                    @foreach ($namaMeja as $meja)
                                                        <option value="{{ $meja }}">Meja {{ $meja }}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jam masuk</td>
                                            <td>:</td>
                                            <td><input type="time" name="jamMasuk" id="jamMasuk" required></td>
                                        </tr>
                                        <tr>
                                            <td>Jam keluar</td>
                                            <td>:</td>
                                            <td><input type="time" name="jamKeluar" id="jamKeluar" required></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><button type="submit" class="custom-button">Pilih</button></td>
                                        </tr>
                                    </table>
                                </form>
                            @endif
                        </div>
                        <div style="margin-top: 50px">
                            @if(!isset($reservResult->biaya))
            <p>Biaya tidak dihitung. Pastikan Anda sudah memilih jam masuk dan jam keluar yang valid.</p>
        @elseif($reservResult->biaya == 0)
            <p>Biaya tidak boleh nol. Pastikan perhitungan biaya benar.</p>
        @elseif(!in_array($reservResult->idMeja, $namaMeja))
            <p>ID meja tidak valid. Pastikan Anda memilih meja yang benar.</p>
        @else
                                <form action="{{ url('reservation/first/decide') }}" method="POST">
                                    @csrf
                                    <table>
                                        <tr>
                                            <td>Nomor meja</td>
                                            <td>:</td>
                                            <td>{{ $reservResult->idMeja }}</td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal</td>
                                            <td>:</td>
                                            <td>{{ $reservResult->tanggal }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jam datang</td>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($reservResult->jamMasuk)->format('H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Jam pulang</td>
                                            <td>:</td>
                                            <td>{{ \Carbon\Carbon::parse($reservResult->jamKeluar)->format('H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td>Biaya</td>
                                            <td>:</td>
                                            <td>Rp {{ number_format($reservResult->biaya, 0, ',', '.') }}</td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td><button type="submit">Simpan dan lanjut -></button></td>
                                        </tr>
                                    </table>
                                </form>
                            @endif
                        </div>
                    </div>
                </div>
                <div>@if (isset($reservResult->tanggal))
                    <h2>Tanggal : {{ $reservResult->tanggal }}</h2>
                    @foreach ($namaMeja as $meja)
                        <div>
                            <h3>Meja {{ $meja }}</h3>
                            <?php
                            $tanggal = $reservResult->tanggal; // Menggunakan panah untuk mengakses properti objek
                
                            $mejaResult = DB::table('reservation')
                                ->whereIn('idMeja', function($query) use ($tipeMeja) {
                                    $query->select('id')->from('tables')->where('tipeMeja', $tipeMeja);
                                })
                                ->where('status', 'confirmed')
                                ->where('tanggal', $tanggal)
                                ->get();
                
                            $mejaReserved = $mejaResult->pluck('idMeja')->toArray();
                            ?>
                            @if(in_array($meja, $mejaReserved))
                                <ul>
                                    @foreach ($mejaResult as $table)
                                        @if ($table->idMeja == $meja)
                                            <li style="color: red">
                                                <i> Jam masuk : {{ \Carbon\Carbon::parse($table->jamMasuk)->format('H:i') }} || Jam keluar : {{ \Carbon\Carbon::parse($table->jamKeluar)->format('H:i') }}</i>
                                            </li>
                                        @endif
                                    @endforeach
                                </ul>
                            @else
                                <p>Tidak ada reservasi untuk meja ini di tanggal yang anda pilih</p>
                            @endif
                        </div>
                    @endforeach
                @endif
                
                </div>
            </div>
        </section>
    </main>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var today = new Date();
            today.setHours(0, 0, 0, 0);

            var tanggalInput = document.getElementById('tanggal');
            tanggalInput.addEventListener('change', function() {
                var inputDate = new Date(tanggalInput.value);
                if (inputDate <= today) {
                    tanggalInput.value = '';
                    alert('Tanggal yang dimasukkan harus setelah hari ini.');
                }
            });

            var jamMasukInput = document.getElementById('jamMasuk');
            var jamKeluarInput = document.getElementById('jamKeluar');

            jamMasukInput.addEventListener('change', function() {
                var jamMasuk = new Date('1970-01-01T' + jamMasukInput.value);
                var jamBuka = new Date('1970-01-01T09:00:00');
                var jamTutup = new Date('1970-01-01T22:00:00');
                if (jamMasuk < jamBuka || jamMasuk > jamTutup) {
                    jamMasukInput.value = '';
                    alert('Resto buka pada jam 09:00 sampai 22:00.');
                }
            });

            jamKeluarInput.addEventListener('change', function() {
                var jamKeluar = new Date('1970-01-01T' + jamKeluarInput.value);
                var jamBuka = new Date('1970-01-01T09:00:00');
                var jamTutup = new Date('1970-01-01T22:00:00');
                if (jamKeluar < jamBuka || jamKeluar > jamTutup) {
                    jamKeluarInput.value = '';
                    alert('Resto buka pada jam 09:00 sampai 22:00.');
                }
            });
        });
    </script>
</body>
</html>
