<head>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
    <link rel="stylesheet" href="{{ asset('css/breezeStyles.css') }}">

    <!--========== BOX ICONS ==========-->
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>

</head>

<body>
    <section class="menu section menusection" id="menu">
        <div class="menulist__container" id="menulist">
            <div>
                <h2 class="section-title">Menu List</h2>
                <form action="{{ route('orders.search') }}" method="POST" class="searchform">
                    @csrf
                    <div class="search-box">
                        <input type="text" name="keyword" class="input-search" autofocus autocomplete="off"
                            placeholder="Search Here">
                        <input type="submit" name="search" value="Cari" class="submit-btn">
                    </div>
                </form>

                <div class="menu__container bd-grid">
                    @if (empty($menus))
                        <p>Keyword yang anda cari tidak tersedia</p>
                    @else
                        @foreach ($menus as $menu)
                            <div class="menu__content">
                                <img src="{{ Storage::url($menu->gambar_menu) }}" alt="" class="menu__img">
                                <h3 class="menu__name">{{ $menu->nama_menu }}</h3>
                                <span class="menu__detail">{{ Str::limit($menu->berita_menu, 20) }}</span>
                                <span class="menu__preci">Rp
                                    {{ number_format((float) $menu->harga_menu, 0, ',', '.') }}</span>
                                <a href="{{ route('order.details', ['id' => $menu->id_menu]) }}"
                                    class="cart menu__button"><i class='bx bx-cart-alt'></i></a>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="dinein__container" id="struk">
            <div class="tableKategori">
                @if (!empty($orderDB))
                    <table class="table__menu">
                        <thead>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th colspan="2">Subtotal</th>
                        </thead>
                        @foreach ($orderDB as $index => $order)
                            <tr>
                                <td>{{ $order['namaMenu'] }}</td>
                                <td>{{ $order['quantity'] }}</td>
                                <td>Rp {{ number_format($order['subtotalMenu'], 0, ',', '.') }}</td>
                                <td>
                                    <form method="POST" action="{{ route('orders.delete') }}"
                                        onsubmit="return confirm('yakin mau dihapus?')">
                                        @csrf
                                        <input type="hidden" name="index" value="{{ $index }}">
                                        <button type="submit" name="hapus" class="custom-button">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                        <tr>
                            <td><b>TOTAL</b></td>
                            <td></td>
                            <td colspan="2">Rp {{ number_format($total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="4">
                                <form method="POST" action="{{ route('orders.confirm') }}"
                                    onsubmit="return confirm('yakin mau konfirmasi?');">
                                    @csrf
                                    <label for="nomorMeja">Your Table Number</label><br>
                                    <input type="number" name="nomorMeja" id="nomorMeja" value="1"
                                        style="width: 50px" min="1" max="20"><br>
                                    <button type="submit" name="konfirm" class="custom-button">Confirm the
                                        Order</button>
                                </form>
                            </td>
                        </tr>
                    </table>
                @else
                    <h4 class="history__data text-xl font-semibold">Pesanan anda akan muncul di sini</h4>
                @endif
            </div>

    </section>
</body>
