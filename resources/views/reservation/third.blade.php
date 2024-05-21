<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <title>Confirmation (Reservation)</title>
</head>

<body>
    @include('includes.headerR')

    <main class="l-main">
        <section id="home" class="review__container">
            <div class="home__container bd-container home-grid">
                <div class="home__data">
                    <h1>Konfirmasi</h1>
                    <p>Silahkan konfirmasi data anda</p>
                    <form method="POST" action='{{ route('confirmReservation') }}' enctype="multipart/form-data">
                        @csrf
                        <table>
                            <tr>
                                <td><h3>Data Reservasi</h3></td>
                            </tr>
                            <tr>
                                <td>No. meja </td>
                                <td>:</td>
                                <td>Meja {{ $reservResult->idMeja }}</td>
                            </tr>
                            <tr>
                                <td>Tanggal </td>
                                <td>:</td>
                                <td>{{ $reservResult->tanggal }}</td>
                            </tr>
                            <tr>
                                <td>Jam datang </td>
                                <td>:</td>
                                <td>{{ $reservResult->jamMasuk }}</td>
                            </tr>
                            <tr>
                                <td>Jam pulang </td>
                                <td>:</td>
                                <td>{{ $reservResult->jamKeluar }}</td>
                            </tr>
                            <tr>
                                <td>Biaya </td>
                                <td>:</td>
                                <td>Rp {{ number_format($reservResult->biaya, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <td><h3>Data diri</h3></td>
                            </tr>
                            <tr>
                                <td>Atas nama </td>
                                <td>:</td>
                                <td>{{ $reservResult->atasNama }}</td>
                            </tr>
                            <tr>
                                <td>Email </td>
                                <td>:</td>
                                <td>{{ $reservResult->email }}</td>
                            </tr>
                            <tr>
                                <td>No. Telepon  </td>
                                <td>:</td>
                                <td>{{ $reservResult->telepon }}</td>
                            </tr>
                            <tr>
                                <td><h3>Pembayaran</h3></td>
                            </tr>
                            <tr>
                                <td colspan="3">Silahkan lakukan pembayaran ke nomor rekening berikut sesuai biaya yang tertera. </td>
                            </tr>
                            <tr>
                                <td><b>068 965 545 6</b></td>
                            </tr>
                            <tr>
                                <td><label for="bukti">Bukti pembayaran </label></td>
                                <td>:</td>
                                <td><input type="file" id="bukti" name="buktiBayar" onchange="validateImage()" required>
                                    <br>
                                    <p id="error-message" style="color: red; font-size: 12px"></p>
                                </td>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button type="submit" name="submit" onclick="return confirm('Yakin mau konfirmasi?')" class="custom-button">Konfirmasi</button></td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
        </section>
    </main>

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");
        let classList = profileDropdownList.classList;
        const toggle = () => classList.toggle("active");
        window.addEventListener("click", function (e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });

        function validateImage() {
            var input = document.getElementById('bukti');
            var errorMessage = document.getElementById('error-message');
            
            if (input.files.length > 0) {
                var file = input.files[0];
                var allowedTypes = ['image/jpeg', 'image/png', 'image/jpg'];
                
                if (allowedTypes.indexOf(file.type) === -1) {
                    errorMessage.textContent = 'Hanya file gambar yang diperbolehkan (JPG, JPEG, PNG).';
                    input.value = ''; // Kosongkan input gambar
                    return;
                }

                if (file.size > 2048 * 2048) {
                    errorMessage.textContent = 'Ukuran file gambar tidak boleh lebih dari 2 MB.';
                    input.value = ''; // Kosongkan input gambar
                } else {
                    errorMessage.textContent = ''; // Bersihkan pesan error jika valid
                }
            }
        }
    </script>

    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
