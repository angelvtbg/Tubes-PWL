<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

    <title>Reservation History : Café de Flore</title>
</head>
<body>
    @include('partials.navbar')
    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    @include('includes.headerR')

    <section class="menusection " id="menu">
        <div class="menulist__container ">
            <div>
                <h1>Reservasi</h1>

                <div style="margin-top: 20px; ">
                    <div style="margin-bottom: 20px;">
                        @if(isset($waitingResult) && count($waitingResult) > 0)

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
                                    <tr>
                                        <td>Email </td>
                                        <td>:</td>
                                        <td><?= $waiting['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon  </td>
                                        <td>:</td>
                                        <td><?= $waiting['telepon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Data Reservasi</h3></td>
                                    </tr>
                                    <tr>
                                        <td>No. meja </td>
                                        <td>:</td>
                                        <td>Meja <?= $waiting['idMeja'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td><?= $waiting['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam reservasi </td>
                                        <td>:</td>
                                        <td><?= date_format(new DateTime($waiting['jamMasuk']), 'H:i'); ?> - <?= date_format(new DateTime($waiting['jamKeluar']), 'H:i'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya </td>
                                        <td>:</td>
                                        <td>Rp <?= number_format($waiting['biaya'], 0, ',', '.')?></td>
                                    </tr>
                                    <tr>
                                        <td>Bukti pembayaran </td>
                                        <td>:</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="custom-button" data-toggle="modal" data-target="#exampleModal<?= $i ?>">
                                            Lihat
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
                                                    <button type="button" class="close custom-button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    @if(Storage::exists($waiting->buktiBayar))
                                                        <img src="{{ Storage::url($waiting->buktiBayar) }}" alt="Bukti Bayar" class="menu__img">
                                                    @else
                                                        <p>Gambar tidak tersedia</p>
                                                    @endif

                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="custom-button" data-dismiss="modal">Close</button>
                                                </div>
                                                </div>
                                            </div>
                                            </div>
                                        </td>
                                    </tr>
                                    </table>

                                </div>

                            @php $i++ @endphp
                            @endforeach

                        @endif
                    </div>
                    <div style="margin-bottom: 20px;">
                        @if(isset($rejectedResult) && count($rejectedResult) > 0)

                            <h3>Rejected</h3>
                            <p>Reservasi ditolak bisa karena bukti pembayaran atau data diri/kontak yang tidak valid.</p>

                            <?php $i = 1 ?>
                            <?php foreach ($rejectedResult as $rejected) : ?>

                                <div class="history__box">

                                    <table>
                                    <tr>
                                        <td><h3>Data diri</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Atas nama </td>
                                        <td>:</td>
                                        <td><?= $rejected['atasNama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>:</td>
                                        <td><?= $rejected['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon  </td>
                                        <td>:</td>
                                        <td><?= $rejected['telepon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Data Reservasi</h3></td>
                                    </tr>
                                    <tr>
                                        <td>No. meja </td>
                                        <td>:</td>
                                        <td>Meja <?= $rejected['idMeja'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td><?= $rejected['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam reservasi </td>
                                        <td>:</td>
                                        <td><?= date_format(new DateTime($rejected['jamMasuk']), 'H:i'); ?> - <?= date_format(new DateTime($rejected['jamKeluar']), 'H:i'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya </td>
                                        <td>:</td>
                                        <td>Rp <?= number_format($rejected['biaya'], 0, ',', '.')?></td>
                                    </tr>
                                    <tr>
                                        <td>Bukti pembayaran </td>
                                        <td>:</td>
                                        <td>
                                            <!-- Button trigger modal -->
                                            <button type="button" class="custom-button" data-toggle="modal" data-target="#exampleModal<?= $i ?>">
                                            Lihat
                                            </button>

                                            <!-- Modal -->
                                            <div class="modal fade" id="exampleModal<?= $i ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
                                                    <button type="button" class="close custom-button" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <img src="../img/buktiBayar/<?=$rejected['buktiBayar']?>" alt="">
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
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form action="" method="post" onsubmit="return confirm('dihapus nih?')">
                                                <input type="hidden" name="id" value="<?=$rejected['id']?>">
                                                <button type="submit" name="delHistory" class="custom-button">Hapus riwayat</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </table>
                                </div>

                            <?php $i++ ?>
                            <?php endforeach; ?>
                        @endif
                    </div>
                    <div style="margin-bottom: 20px;">
                        @if(isset($absentResult) && count($absentResult) > 0)

                            <h3>Absent</h3>

                            <?php foreach ($absentResult as $absent) : ?>

                                <div class="history__box">

                                    <table>
                                    <tr>
                                        <td><h3>Data diri</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Atas nama </td>
                                        <td>:</td>
                                        <td><?= $absent['atasNama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>:</td>
                                        <td><?= $absent['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon  </td>
                                        <td>:</td>
                                        <td><?= $absent['telepon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Data Reservasi</h3></td>
                                    </tr>
                                    <tr>
                                        <td>No. meja </td>
                                        <td>:</td>
                                        <td>Meja <?= $absent['idMeja'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td><?= $absent['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam reservasi </td>
                                        <td>:</td>
                                        <td><?= date_format(new DateTime($absent['jamMasuk']), 'H:i'); ?> - <?= date_format(new DateTime($absent['jamKeluar']), 'H:i'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya </td>
                                        <td>:</td>
                                        <td>Rp <?= number_format($absent['biaya'], 0, ',', '.')?></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>
                                            <form action="" method="post" onsubmit="return confirm('dihapus nih?')">
                                                <input type="hidden" name="id" value="<?=$absent['id']?>">
                                                <button type="submit" name="delHistory" class="custom-button">Hapus riwayat</button>
                                            </form>
                                        </td>
                                    </tr>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        @endif
                    </div>
                    <div style="margin-bottom: 20px;">
                        @if(isset($confirmedResult) && count($confirmedResult) > 0)

                            <h3>Coming Up</h3>

                            <?php foreach ($confirmedResult as $confirmed) : ?>

                                <div class="history__box">

                                    <table>
                                    <tr>
                                        <td><h3>Data diri</h3></td>
                                    </tr>
                                    <tr>
                                        <td>Atas nama </td>
                                        <td>:</td>
                                        <td><?= $confirmed['atasNama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>:</td>
                                        <td><?= $confirmed['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon  </td>
                                        <td>:</td>
                                        <td><?= $confirmed['telepon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Data Reservasi</h3></td>
                                    </tr>
                                    <tr>
                                        <td>No. meja </td>
                                        <td>:</td>
                                        <td>Meja <?= $confirmed['idMeja'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td><?= $confirmed['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam reservasi </td>
                                        <td>:</td>
                                        <td><?= date_format(new DateTime($confirmed['jamMasuk']), 'H:i'); ?> - <?= date_format(new DateTime($confirmed['jamKeluar']), 'H:i'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya </td>
                                        <td>:</td>
                                        <td>Rp <?= number_format($confirmed['biaya'], 0, ',', '.')?></td>
                                    </tr>
                                    </table>
                                </div>
                            <?php endforeach; ?>
                        @endif
                    </div>
                    <div style="margin-bottom: 20px;">
                        <h3>Passed</h3>
                        @if(isset($attendedResult) && count($attendedResult) > 0)
                            <?php foreach ($attendedResult as $attended) : ?>

                                <div class="history__box">

                                    <table>
                                    <tr>
                                       ba               <td>:</td>
                                        <td><?= $attended['atasNama'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email </td>
                                        <td>:</td>
                                        <td><?= $attended['email'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>No. Telepon  </td>
                                        <td>:</td>
                                        <td><?= $attended['telepon'] ?></td>
                                    </tr>
                                    <tr>
                                        <td><h3>Data Reservasi</h3></td>
                                    </tr>
                                    <tr>
                                        <td>No. meja </td>
                                        <td>:</td>
                                        <td>Meja <?= $attended['idMeja'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tanggal </td>
                                        <td>:</td>
                                        <td><?= $attended['tanggal'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jam reservasi </td>
                                        <td>:</td>
                                        <td><?= date_format(new DateTime($attended['jamMasuk']), 'H:i'); ?> - <?= date_format(new DateTime($attended['jamKeluar']), 'H:i'); ?></td>
                                    </tr>
                                    <tr>
                                        <td>Biaya </td>
                                        <td>:</td>
                                        <td>Rp <?= number_format($attended['biaya'], 0, ',', '.')?></td>
                                    </tr>
                                    </table>

                                </div>

                            <?php endforeach; ?>

                        @else
                            <p>Anda belum pernah menghadiri reservasi apapun</p>
                        @endif
                    </div>
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
