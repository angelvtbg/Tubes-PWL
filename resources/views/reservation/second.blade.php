<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <title>Contact info (Reservation)</title>
</head>

<body>
    @include('includes.headerR')

    <main class="l-main">
        <section id="home" class="review__container reserv__content">
            <div class="">
                <div class="home__data">
                    <h1>Biodata</h1>
                    <p>Silahkan isi data diri anda</p>
                    <form method="POST" action="{{ route('saveContactInfo') }}">
                        @csrf
                        <table>
                            <tr>
                                <td><label for="name">Atas nama</label></td>
                            </tr>
                            <tr>
                                <td><input type="text" id="name" value="{{ $userResult->name }}" name="atasNama" required></td>
                            </tr>
                            <tr>
                                <td><label for="email">Email</label></td>
                            </tr>
                            <tr>
                                <td><input type="email" id="email" value="{{ $userResult->email }}" name="email" required></td>
                            </tr>
                            <tr>
                                <td><label for="telepon">No. telepon</label></td>
                            </tr>
                            <tr>
                                <td><input type="tel" id="telepon" name="telepon" pattern="^08[1-9]\d{6,11}$" placeholder="08xxxxxxxxx" title="Nomor telepon yang valid dimulai dengan '08' dan memiliki 9-13 digit." value="{{ $reservResult->telepon }}" required></td>
                            </tr>
                            <tr>
                                <td><button type="submit" name="submit" class="custom-button">Simpan dan lanjut-></button></td>
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
    </script>
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
