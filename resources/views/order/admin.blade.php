<head>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
</head>

<x-app-layout>
    @guest
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="text-center">Anda belum login. Silakan <a href="{{ route('login') }}"
                            class="text-blue-500">login</a> untuk melanjutkan atau kembali ke <a
                            href="{{ url('/') }}" class="text-blue-500">halaman utama</a>.</h3>
                </div>
            </div>
        </div>
    </div>
@endguest

@auth
@if (auth()->user()->role == 'admin')
<section class="history section" id="menu">
    <div class="history__container">
        <div>
            <h1 class="history__data text-xl font-semibold">Order List</h1>

            <div style=" margin-top: 20px;">                
                @foreach ($orders as $order)
                @if ($order->pesanan)
                <div class="history__box">

                    <h3>Nomor meja : {{ $order->nomorMeja }}</h3>

                    <?php
                    $user = \App\Models\User::find($order->idPelanggan);
                    $nama = $user ? $user->name : '';
                    ?>

                    <h4>Atas nama : {{ $nama }}</h4>

                    <table>

                        <tr>
                            <th>Nama Menu</th>
                            <th>Jumlah</th>
                            <th>Subtotal</th>
                        </tr>

                        @foreach (json_decode($order->pesanan) as $item)
                        <tr>
                            <td>{{ $item->namaMenu }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>Rp {{ number_format($item->subtotalMenu, 0, ',', '.') }}</td>
                        </tr>
                        @endforeach

                        <tr>
                            <td><b>TOTAL</b></td>
                            <td></td>
                            <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if($order->status == 'done')
                                Pesanan sudah diantar
                                @else
                                Pesanan sudah diantar?
                                @endif
                            </td>
                            <td>
                                @if($order->status != 'done')
                                <form method="post" action="{{ route('orders.deliver', $order->id) }}" onsubmit="return confirm('yakin sudah diantar?')">
                                    @csrf
                                    <button type="submit" name="delivered" class="custom-button">Done</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                @if($order->payment == 'done')
                                Pesanan sudah dibayar
                                @else
                                Pesanan sudah dibayar?
                                @endif
                            </td>
                            <td>
                                @if($order->payment != 'done')
                                <form method="post" action="{{ route('orders.pay', $order->id) }}" onsubmit="return confirm('yakin sudah dibayar?')">
                                    @csrf
                                    <button type="submit" name="paid" class="custom-button">Done</button>
                                </form>
                                @endif
                            </td>
                        </tr>
                    </table>

                </div>
                @endif
                @endforeach
            </div>

        </div>

    </div>
</section>
@endif
@endauth

</x-app-layout>