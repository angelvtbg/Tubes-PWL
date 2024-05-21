<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::all();
        $idPelanggan = Auth::id();

        if ($request->has('filter')) {
            switch ($request->filter) {
                case 'allmenu':
                    $menus = Menu::all();
                    break;
                case 'food':
                    $menus = Menu::where('filterMenu', 'food')->get();
                    break;
                case 'drink':
                    $menus = Menu::where('filterMenu', 'drink')->get();
                    break;
                case 'dessert':
                    $menus = Menu::where('filterMenu', 'dessert')->get();
                    break;
            }
        }

        $order = Order::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();
        $orderDB = $order ? json_decode($order->pesanan, true) : [];
        $total = $order ? $order->total : 0;

        return view('order.index', compact('menus', 'orderDB', 'total'));
    }

    public function deleteOrder(Request $request)
    {
        $idPelanggan = Auth::id();
        $order = Order::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();
        
        if ($order) {
            $orders = json_decode($order->pesanan, true);
            array_splice($orders, $request->index, 1);
            $order->pesanan = json_encode($orders);
            $order->save();
        }

        return redirect()->route('orders.index');
    }

    public function confirmOrder(Request $request)
    {
        $idPelanggan = Auth::id();
        $order = Order::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();
        
        if ($order) {
            $order->status = 'confirmed';
            $order->save();
        }

        return redirect()->route('order.history');
    }

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $menus = Menu::where('namaMenu', 'like', '%' . $keyword . '%')->get();

        return view('order.index', compact('menus'));
    }
}
