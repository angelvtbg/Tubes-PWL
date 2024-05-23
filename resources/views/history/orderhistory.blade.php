<x-app-layout>
    <section class="menu section" id="menu">
        <div class="menulist__container">
            <div>
                <h1>Order History</h1>
                
                <!-- MENAMPILKAN PESANAN YANG BELUM DIANTAR DAN/ATAU BELUM DIBAYAR -->
                <div style="margin-top: 20px;">
    
                    @if($pendingOrders->count() > 0)
    
                    <h3>On Going</h3>
                    
                    @foreach ($pendingOrders as $pending)
    
                        <div class="history__box">
    
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
                                    <td>Rp {{ number_format($pesan['subtotalMenu'], 0, ',', '.') }}</td>
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
                                    <td colspan="3">Segera lakukan pembayaran pesanan di kasir !</td>
                                </tr>
    
                                @endif
    
                            </table>
    
                        </div>
    
                    @endforeach
    
                    @endif
    
                </div>
    
                <!-- MENAMPILKAN PESANAN YANG SUDAH DIANTAR DAN DIBAYAR -->
                <div style="margin-top: 20px;">
    
                    @if($orders->count() > 0)
    
                    <h3>Completed Orders</h3>
    
                    @foreach ($orders as $order)
    
                        <div class="history__box">
    
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
                                    <td>Rp {{ number_format($pesan['subtotalMenu'], 0, ',', '.') }}</td>
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
    
                    @endif
    
                </div>
    
            </div>
        </div>
    </section>
    </x-app-layout>
    