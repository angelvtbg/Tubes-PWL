<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Kategori;
use App\Models\Order;
use App\Models\Ticket;
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
        $menus = Menu::where('nama_menu', 'like', '%' . $keyword . '%')->get();

        return view('order.index', compact('menus'));
    }

    public function details($id)
    {
        $menu = Menu::find($id);

        if (!$menu) {
            return redirect()->route('orders.index')->with('error', 'Menu item not found.');
        }

        return view('order.details', compact('menu'));
    }
    public function addToCart(Request $request)
{
    $idPelanggan = Auth::id();
    $order = Ticket::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();

    if (!$order) {
        $order = new Ticket();
        $order->idPelanggan = $idPelanggan;
        $order->status = 'waiting';
        $order->save();
    }

    $orders = json_decode($order->pesanan, true);
    $newOrder = [
        'namaMenu' => $request->namaMenu,
        'quantity' => $request->quantity,
        'subtotalMenu' => $request->hargaMenu * $request->quantity,
    ];

    $orders[] = $newOrder;
    $order->pesanan = json_encode($orders);
    $order->total = $order->total + $request->hargaMenu * $request->quantity;
    $order->save();

    return redirect()->route('orders.index');
}
}
