<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cache::get('cart');
        $total_harga = array_sum(array_column($cart, 'price'));
        $total_harga = number_format($total_harga, 0, ',', '.');

        $harga_barang = [];
        foreach ($cart as $item) {
            $harga_barang[$item['id']] = number_format($item['price'], 0, ',', '.');
        }
        return view('pages.checkout', ['carts' => Cache::get('cart'), 'total_harga' => $total_harga, 'harga_barang' => $harga_barang]);
    }

    public function checkout(Request $request) {
        $cart = Cache::get('cart');

        $total_harga = array_sum(array_column($cart, 'price'));
        $total_harga = number_format($total_harga, 0, ',', '.');

        // mengabungkan array $cart dengan $total_harga, $harga_barang dan $request->all()
        $cart = array_map(function($item) use ($total_harga, $request) {
            return array_merge($item, [
                'total_harga' => $total_harga,
                'name' => $request->name,
                'address' => $request->address
            ]);
        }, $cart);

        Checkout::create([
            'cart' => json_encode($cart),
            'status' => 'pending',
            'user_id' => auth()->id()
        ]);

        Cache::forget('cart');

        return redirect()->route('home');
    }
}
