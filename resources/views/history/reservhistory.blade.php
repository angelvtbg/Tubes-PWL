<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/cust.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reservation History : Café de Flore</title>
</head>
<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    @include('includes.headerR')

    <section class="menu section " id="menu">
        <div class="menulist__container ">
            <div>
                <h1>Reservasi</h1>

                <div style="margin-top: 20px; ">
                    <div style="margin-bottom: 20px;">
                        @if(count($waitingResult) > 0)

                            <h3>Confirmed</h3>
                            <p>Pesanan reservasi anda telah terkirim.<br>Reservasi yang telah dikonfirmasi akan masuk di kolom "Coming Up"</p>

                            @php $i = 1 @endphp
                            @foreach ($waitingResult as $waiting)

                                <div class="history__box">

                                    <table>
                                    <tr>
                                        <td><h3>Data diri</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Atas nama </td>
                                        <td>:</td>
                                        <td>{{ $waiting['atasNama'] }}</td>
                                    </tr>
                                    <!-- Sisanya ikuti format yang sama -->
                                    <!-- ........... -->
                                    </table>

                                </div>

                            @php $i++ @endphp
                            @endforeach

                        @endif
                    </div>
                    <!-- Lanjutkan dengan kode berikutnya sesuai format -->
                    <!-- ........... -->
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

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

</body>
</html>
