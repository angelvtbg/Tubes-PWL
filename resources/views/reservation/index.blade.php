<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">

    <title>Reservation : Café de Flore</title>
</head>

<body>

    @include('includes.headerR')

    <main class="l-main">
        <!--========== HOME ==========-->
        <section id="home" class="review__container">
            <div class="home__container bd-container ">
                {{-- <div class="home__data">
                    <img src="{{ asset('images/mapss.png') }}" alt="">
                </div> --}}
                <div class="gridMeja">
                    <div style="padding: 20px" class="meja">
                        <img src="{{ asset('images/tableSmall.png') }}" alt="" width="300px">
                        <p class="history__data text-xl font-semibold">Meja 4 orang</p>
                        <p>Meja 3, 4, 5, 6, 7, 8</p>
                        <p>Harga meja per jam : Rp 100.000</p>
                        <a href="{{ route('reservation.first', ['tipeMeja' => '4 Orang']) }}"
                            class="custom-button">Pilih</a>
                    </div>

                    <div style="padding: 20px" class="meja">
                        <img src="{{ asset('images/tableLarge.png') }}" alt="" width="500px">
                        <p class="history__data text-xl font-semibold">Meja 8 orang</p>
                        <p>Meja 1, 2, 9, 10</p>
                        <p>Harga meja per jam : Rp 200.000</p>
                        <a href="{{ route('reservation.first', ['tipeMeja' => '8 Orang']) }}"
                            class="custom-button">Pilih</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");
        let classList = profileDropdownList.classList;
        const toggle = () => classList.toggle("active");
        window.addEventListener("click", function(e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

</body>

</html>
