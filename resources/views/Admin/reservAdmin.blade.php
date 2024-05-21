<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <title>Reservation : Café de Flore</title>
</head>

<body>
    @include('partials.navbar')
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>
    <section class="menu section" id="menu">
        <div class="menulist__container">
            <div>
                <h1>Reservasi</h1>
                <div style="margin-top: 20px;">
                    @foreach ($reservConfirm as $confirm)
                        <div class="history__box">
                            <table>
                                <tr><td><h3>Data diri</h3></td></tr>
                                <tr><td>Atas nama </td><td>:</td><td>{{ $confirm->atasNama }}</td></tr>
                                <tr><td>Email </td><td>:</td><td>{{ $confirm->email }}</td></tr>
                                <tr><td>No. Telepon  </td><td>:</td><td>{{ $confirm->telepon }}</td></tr>
                                <tr><td><h3>Data Reservasi</h3></td></tr>
                                <tr><td>No. meja </td><td>:</td><td>Meja {{ $confirm->idMeja }}</td></tr>
                                <tr><td>Tanggal </td><td>:</td><td>{{ $confirm->tanggal }}</td></tr>
                                <tr><td>Jam reservasi </td><td>:</td><td>{{ date('H:i', strtotime($confirm->jamMasuk)) }} - {{ date('H:i', strtotime($confirm->jamKeluar)) }}</td></tr>
                                <tr><td>Biaya </td><td>:</td><td>Rp {{ number_format($confirm->biaya, 0, ',', '.') }}</td></tr>
                                <tr>
                                    <td>Bukti pembayaran </td><td>:</td>
                                    <td>
                                        <button type="button" class="custom-button" data-toggle="modal" data-target="#exampleModal{{ $loop->iteration }}">Lihat</button>
                                        <div class="modal fade" id="exampleModal{{ $loop->iteration }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
                                                        <button type="button" class="close custom-button" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <img src="{{ Storage::url($confirm->buktiBayar) }}" alt="">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="custom-button" data-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <form action="{{ route('reservations.reject') }}" method="POST" onsubmit="return confirm('Yakin mau ditolak?')">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $confirm->id }}">
                                            <button type="submit" class="custom-button">Reject</button>
                                        </form>
                                    </td>
                                    <td></td>
                                    <td>
                                        <form action="{{ route('reservations.accept') }}" method="POST" onsubmit="return confirm('Konfirmasi?')">
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

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");

        let classList = profileDropdownList.classList;

        const toggle = () => classList.toggle("active");

        window.addEventListener("click", function (e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script> 
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

</html>
