<?php

session_start();

if ($_SESSION['nama'] == '') {
    header('location:../index.php');
    exit();
}

if ($_SESSION['userLevel'] == 'admin') {
    header('location:../admin/index.php');
}


require "./include/functions.php";

// MENGAMBIL DATA DARI DATABASE UNTUK DITAMPILKAN
$menus = query("SELECT * FROM menu");
$idPelanggan = $_SESSION['id'];


// PAGINATION SESUAI TIPE MENU
if (isset($_GET['filter'])) {

    switch ($_GET['filter']) {

        case 'allmenu':
            $menus = query("SELECT * FROM menu");
            break;
        case 'food':
            $menus = query("SELECT * FROM menu WHERE filterMenu = 'food'");
            break;
        case 'drink':
            $menus = query("SELECT * FROM menu WHERE filterMenu = 'drink'");
            break;
        case 'dessert':
            $menus = query("SELECT * FROM menu WHERE filterMenu = 'dessert'");
            break;
    }
}

// MENGAMBIL DATA PESANAN YANG SUDAH DIPESAN
$orderQuery = "SELECT pesanan FROM ticket WHERE idPelanggan = $idPelanggan AND status = 'waiting'";
if (count(query($orderQuery)) != 0) {
    $orderDB = json_decode(query($orderQuery)[0]['pesanan'], true);
}


// MENGAMBIL DATA TOTALAN YANG SUDAH DIPESAN
$totalQuery = "SELECT total FROM ticket WHERE idPelanggan = $idPelanggan AND status = 'waiting'";
if (count(query($totalQuery)) != 0) {
    $total = query($totalQuery)[0];
}


// MENGHAPUS PESANAN
if (isset($_POST['hapus'])) {

    deleteOrder($_POST['index']);
    header("Location: menu.php");
}

// KONFIRMASI PESANAN
if (isset($_POST['konfirm'])) {

    confirm($_POST['nomorMeja']);
    header("Location: orderhistory.php");
}

// FUNGSI MENCARI MENU
if (isset($_POST['search'])) {

    $keyword = $_POST['keyword'];
    $menus = query("SELECT * FROM menu WHERE namaMenu LIKE '%$keyword%'");
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

    <!--========== CSS ==========-->
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/cust.css">

    <title>Menu : Café de Flore</title>
</head>

<body>

    <!--========== SCROLL TOP ==========-->
    <a href="#" class="scrolltop" id="scroll-top">
        <i class='bx bx-chevron-up scrolltop__icon'></i>
    </a>

    <!--========== HEADER ==========-->
    <?php include './include/headerM.php'; ?>


    <section class="menu section menusection" id="menu">
        <div class="menulist__container" id="menulist">
            <div>
                <h2 class="section-title">Menu List</h2>
                <center>
                    <div class="menu__filters">
                        <ul>
                            <li><a class="filter__button" href="menu.php?filter=allmenu">ALL MENU</a></li>
                            <li><a class="filter__button" href="menu.php?filter=food">FOOD</a></li>
                            <li><a class="filter__button" href="menu.php?filter=drink">DRINK</a></li>
                            <li><a class="filter__button" href="menu.php?filter=dessert">DESSERT</a></li>
                        </ul>
                    </div>
                </center>

                <!-- <form action="" method="POST">
                    <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword.." autocomplete="off">
                    <button type="submit" name="search">Search</button><br><br>
                </form> -->

                <?php
                $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : '';
                ?>
                <form action="#" method="POST" class="searchform">
                    <div class="search-box" onclick="showInput()">
                        <div class="logo"></div>
                        <input type="text" name="keyword" class="input-search" autofocus autocomplete="off" placeholder="Search Here" value="<?php echo $katakunci ?>">
                        <input type="submit" name="search" value="Cari" class="submit-btn">
                    </div>
                </form>

                <!-- MENAMPILKAN MENU -->
                <div class="menu__container bd-grid">

                    <?php
                    if (empty($menus)) {
                        echo "Keyword yang anda cari tidak tersedia";
                    }
                    ?>

                    <?php foreach ($menus as $menu) : ?>

                        <div class="menu__content">
                            <img src="../img/menu/<?= $menu['gambarMenu'] ?>" alt="" class="menu__img">
                            <h3 class="menu__name"><?= $menu['namaMenu'] ?></h3>
                            <span class="menu__detail">Delicious dish</span>
                            <span class="menu__preci">Rp <?= number_format($menu['hargaMenu'], 0, ',', '.') ?></span>
                            <a href="details.php?id=<?= $menu['id'] ?>" class="cart menu__button"><i class='bx bx-cart-alt'></i></a>
                        </div>

                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <!-- MENAMPILKAN TIKET PESANAN -->
        <div class="dinein__container" id="struk">
            <div>
                <?php if (isset($orderDB[0])) : ?>
                    <table class="table__menu">
                        <thead>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th colspan="2">Subtotal</th>
                        </thead>
                        <?php for ($i = 0; $i <= count($orderDB) - 1; $i++) : ?>
                            <tr>
                                <td><?= $orderDB[$i]['namaMenu'] ?></td>
                                <td><?= $orderDB[$i]['quantity'] ?></td>
                                <td>Rp <?= number_format($orderDB[$i]['subtotalMenu'], 0, ',', '.') ?></td>
                                <td>
                                    <form method="POST" onsubmit="return confirm('yakin mau dihapus?')">
                                        <input type="hidden" name="index" value="<?= $i ?>">
                                        <button type="submit" name="hapus" class="custom-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endfor; ?>
                        <tr>
                            <td><b>TOTAL</b></td>
                            <td></td>
                            <td colspan="2">Rp <?= number_format($total['total'], 0, ',', '.') ?></td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <form method="POST" onsubmit="return confirm('yakin mau konfirmasi?');">
                                    <label for="nomorMeja">Your Table Number</label><br>
                                    <input type="number" name="nomorMeja" id="nomorMeja" value=1 style="width: 50px" min="1" max="20"><br>
                                    <button type="submit" name="konfirm" class="custom-button">Confirm the Order</button>
                                </form>
                            </td>
                        </tr>
                    </table>
            </div>
        <?php else : ?>
            <h4>Pesanan anda akan muncul di sini</h4>
        <?php endif; ?>
        </div>
        </div>
    </section>

    <script>
        let profileDropdownList = document.querySelector(".profile-dropdown-list");
        let btn = document.querySelector(".profile-dropdown-btn");

        let classList = profileDropdownList.classList;

        const toggle = () => classList.toggle("active");

        window.addEventListener("click", function(e) {
            if (!btn.contains(e.target)) classList.remove("active");
        });
    </script>

    <script>
        function showInput() {
            document.querySelector('.input-search').focus();
        }
    </script>

    <!--========== SCROLL REVEAL ==========-->
    <script src="https://unpkg.com/scrollreveal"></script>

    <!--========== MAIN JS ==========-->
    <script src="../assets/js/main.js"></script>
</body>

</html>