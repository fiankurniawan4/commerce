<?php

namespace App\Livewire\Pages;

use App\Models\Product as ModelsProduct;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Product extends Component
{

    public function addToCart($id)
    {
        $product = ModelsProduct::find($id);

        $cart = Cache::get('cart', []);
        $id_cart = mt_rand(1, 99999999);

        if (isset($cart[$id_cart])) {
            $cart[$id_cart]['quantity']++;
        } else {

        $cart[$id_cart] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'image' => $product->image,
            'quantity' => 1,
        ];
    }

        Cache::put('cart', $cart);

        $this->dispatch('cartUpdated');
    }

    public function render()
    {
        $product = ModelsProduct::all();
        return view('livewire.pages.product', ['products' => $product]);
    }
}
