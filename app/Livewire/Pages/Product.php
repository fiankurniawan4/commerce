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
        $is_cart = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity']++;
                $is_cart = true;
                break;
            }
        }
        if (!$is_cart) {
            $cart[] = [
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
