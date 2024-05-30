<head>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
</head>

<x-app-layout>
    <section class="history section" id="menu">
        <div class="history__container">
            <div>
                <h1 class="history__data text-xl font-semibold">Reservation List</h1>
                <div style="margin-top: 20px;">
                    @foreach ($reservConfirm as $confirm)
                        <div class="history__box">
                            <table>
                                <tr>
                                    <td colspan="3">
                                        <h3>Data diri</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Atas nama </td>
                                    <td>:</td>
                                    <td>{{ $confirm->atasNama }}</td>
                                </tr>
                                <tr>
                                    <td>Email </td>
                                    <td>:</td>
                                    <td>{{ $confirm->email }}</td>
                                </tr>
                                <tr>
                                    <td>No. Telepon </td>
                                    <td>:</td>
                                    <td>{{ $confirm->telepon }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3">
                                        <h3>Data Reservasi</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td>No. meja </td>
                                    <td>:</td>
                                    <td>Meja {{ $confirm->idMeja }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal </td>
                                    <td>:</td>
                                    <td>{{ $confirm->tanggal }}</td>
                                </tr>
                                <tr>
                                    <td>Jam reservasi </td>
                                    <td>:</td>
                                    <td>{{ date('H:i', strtotime($confirm->jamMasuk)) }} -
                                        {{ date('H:i', strtotime($confirm->jamKeluar)) }}</td>
                                </tr>
                                <tr>
                                    <td>Biaya </td>
                                    <td>:</td>
                                    <td>Rp {{ number_format($confirm->biaya, 0, ',', '.') }}</td>
                                </tr>
                                <tr>
                                    <td>Bukti pembayaran </td>
                                    <td>:</td>
                                    <td>
                                        <button type="button" class="custom-button" data-toggle="modal"
                                            data-target="#exampleModal{{ $loop->iteration }}">Lihat</button>
                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran
                                                        </h5>
                                                        <button type="button" class="close custom-button"
                                                            data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ Storage::url($confirm->buktiBayar) }}"
                                                            alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="custom-button"
                                                            data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{ route('reservations.reject') }}" method="POST"
                                            onsubmit="return confirm('Yakin mau ditolak?')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $confirm->id }}">
                                            <button type="submit" class="custom-button">Reject</button>
                                        </form>
                                    </td>
                                    <td></td>
                                    <td>
                                        <form action="{{ route('reservations.accept') }}" method="POST"
                                            onsubmit="return confirm('Konfirmasi?')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $confirm->id }}">
                                            <button type="submit" class="custom-button">Accept</button>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous">
    </script>
    </body>

    </html>
</x-app-layout>
