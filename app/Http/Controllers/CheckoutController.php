<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function index() {
        $cart = Cache::get('cart');
        $total_harga = array_sum(array_column($cart, 'price'));
        $total_harga = number_format($total_harga, 0, ',', '.');
        $harga_barang = array_map(function($item) {
            return number_format($item['price'], 0, ',', '.');
        }, $cart);

        $harga_barang_associative = [];
        foreach ($cart as $item) {
            $harga_barang_associative[$item['id']] = number_format($item['price'], 0, ',', '.');
        }
        return view('pages.checkout', ['carts' => Cache::get('cart'), 'total_harga' => $total_harga, 'harga_barang' => $harga_barang_associative]);
    }
}
