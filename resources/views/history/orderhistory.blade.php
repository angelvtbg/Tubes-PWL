<head>
    <link rel="stylesheet" href="{{ asset('css/stylesReserve.css') }}">
    <link rel="stylesheet" href="{{ asset('css/cust.css') }}">
</head>
<x-app-layout>
    <section class="history section" id="menu">
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
@if (auth()->user()->role == 'user')
        <div class="his__container">
            <h1 class="history__data text-xl font-semibold">Order History</h1>
            <div class="menusection">
                <div style="margin-top: 20px;">
                    @if ($pendingOrders->count() > 0)
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="tableKategori p-4 text-gray-900 dark:text-gray-100">

                                        <h1 class="history__data text-xl font-semibold">On Going</h1>
                                        <div class="flex justify-between items-center mb-4">
                                        </div>
                                        @foreach ($pendingOrders as $pending)
                                            <div class="tableKategorii min-w-full divide-y divide-gray-200 mb-4">
                                                <table>
                                                    <tr>
                                                        <th>Nama Menu</th>
                                                        <th>Jumlah</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                    @foreach (json_decode($pending->pesanan, true) as $pesan)
                                                        <tr>
                                                            <td>{{ $pesan['namaMenu'] }}</td>
                                                            <td>{{ $pesan['quantity'] }}</td>
                                                            <td>Rp
                                                                {{ number_format($pesan['subtotalMenu'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td><b>TOTAL</b></td>
                                                        <td></td>
                                                        <td>Rp {{ number_format($pending->total, 0, ',', '.') }}</td>
                                                    </tr>
                                                    @if ($pending->status == 'confirmed')
                                                        <tr>
                                                            <td colspan="3">Pesanan akan segera diantar</td>
                                                        </tr>
                                                    @endif
                                                    @if ($pending->payment == '')
                                                        <tr>
                                                            <td colspan="3">Segera lakukan pembayaran pesanan di
                                                                kasir !</td>
                                                        </tr>
                                                    @endif
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- MENAMPILKAN PESANAN YANG SUDAH DIANTAR DAN DIBAYAR -->
                <div style="margin-top: 20px;">
                    @if ($orders->count() > 0)
                        <div class="py-12">
                            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                                <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                                    <div class="tableKategori p-4 text-gray-900 dark:text-gray-100">

                                        <h1 class="history__data text-xl font-semibold">Completed Orders</h1>
                                        <div class="flex justify-between items-center mb-4">
                                        </div>
                                        @foreach ($orders as $order)
                                            <div class="tableKategorii min-w-full divide-y divide-gray-200">
                                                <table>
                                                    <tr>
                                                        <th>Nama Menu</th>
                                                        <th>Jumlah</th>
                                                        <th>Subtotal</th>
                                                    </tr>
                                                    @foreach (json_decode($order->pesanan, true) as $pesan)
                                                        <tr>
                                                            <td>{{ $pesan['namaMenu'] }}</td>
                                                            <td>{{ $pesan['quantity'] }}</td>
                                                            <td>Rp
                                                                {{ number_format($pesan['subtotalMenu'], 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    <tr>
                                                        <td><b>TOTAL</b></td>
                                                        <td></td>
                                                        <td>Rp {{ number_format($order->total, 0, ',', '.') }}</td>
                                                    </tr>
                                                </table>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        </div>
    </section>
    @endif
    @endauth
</x-app-layout>
