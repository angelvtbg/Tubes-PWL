<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
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

        $ticket = Ticket::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();
        $orderDB = $ticket ? json_decode($ticket->pesanan, true) : [];
        $total = $ticket ? $ticket->total : 0;

        return view('order.index', compact('menus', 'orderDB', 'total'));
    }

    public function deleteOrder(Request $request)
    {
        $idPelanggan = Auth::id();
        $ticket = Ticket::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();
        
        if ($ticket) {
            $orders = json_decode($ticket->pesanan, true);
            array_splice($orders, $request->index, 1);
            $ticket->pesanan = json_encode($orders);
            $ticket->save();
        }

        return redirect()->route('orders.index');
    }

    public function confirmOrder(Request $request)
    {
        $idPelanggan = Auth::id();

        // Retrieve the order from session (or wherever you store it)
        $orderDB = session()->get('orderDB', []);

        // Calculate the total order amount
        $total = array_sum(array_column($orderDB, 'subtotalMenu'));

        // Retrieve the existing ticket for the logged-in user with status 'confirmed' and no payment
        $ticket = Ticket::where('idPelanggan', $idPelanggan)
                        ->where('status', 'waiting')
                        ->first();

        if ($ticket) {
            // Update the existing ticket
            $ticket->update([
                'nomorMeja' => $request->nomorMeja,
                'tanggal' => now(),
                'status' => 'confirmed',
                'payment' => '',
            ]);
        } else {
            // If no existing ticket found, create a new one
            $ticket = Ticket::create([
                'idPelanggan' => $idPelanggan,
                'pesanan' => json_encode($orderDB),
                'total' => $total,
                'nomorMeja' => $request->nomorMeja,
                'status' => 'confirmed',
                'payment' => '',
                'tanggal' => now(),
            ]);
        }

        // Clear the session order
        session()->forget('orderDB');

        // Redirect to order history
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
        $ticket = Ticket::where('idPelanggan', $idPelanggan)->where('status', 'waiting')->first();

        if (!$ticket) {
            $ticket = new Ticket();
            $ticket->idPelanggan = $idPelanggan;
            $ticket->status = 'waiting';
            $ticket->pesanan = json_encode([]);
            $ticket->total = 0;
            $ticket->save();
        }

        $orders = json_decode($ticket->pesanan, true);

        $hargaMenu = floatval($request->hargaMenu);
        $quantity = intval($request->quantity);
        $subtotalMenu = $hargaMenu * $quantity;

        $newOrder = [
            'namaMenu' => $request->namaMenu,
            'quantity' => $quantity,
            'subtotalMenu' => $subtotalMenu,
        ];

        $orders[] = $newOrder;
        $ticket->pesanan = json_encode($orders);
        $ticket->total = $ticket->total + $subtotalMenu;
        $ticket->save();

        return redirect()->route('orders.index');
    }

    public function orderHistory()
    {
        $idPelanggan = Auth::id();

        $orders = Ticket::where('status', 'done')
            ->where('payment', 'done')
            ->where('idPelanggan', $idPelanggan)
            ->orderBy('id', 'DESC')
            ->get();

        $pendingOrders = Ticket::where(function($query) {
                $query->where('status', 'confirmed')
                      ->orWhere('payment', '');
            })
            ->where('idPelanggan', $idPelanggan)
            ->orderBy('id', 'DESC')
            ->get();

        return view('history.orderhistory', compact('orders', 'pendingOrders'));
    }
}
