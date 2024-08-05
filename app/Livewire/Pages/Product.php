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

        if (isset($cart[$id])) {
            $cart[$id]['quantity']++;
        } else {

        $cart[$id] = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
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
