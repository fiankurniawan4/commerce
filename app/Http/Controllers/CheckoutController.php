<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckoutController extends Controller
{
    public function index() {
        return view('pages.checkout', ['carts' => Cache::get('cart')]);
    }
}
