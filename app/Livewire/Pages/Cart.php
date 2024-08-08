<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total_barang = 0;

    public function mount()
    {
        $this->cart = Cache::get('cart') ?? [];
        $uniqueProductIds = [];

        foreach ($this->cart as $item) {
            $uniqueProductIds[$item['id']] = true;
        }
        $this->total_barang = count($uniqueProductIds);
    }

    #[On('cartUpdated')]
    public function cartUpdated()
    {
        $this->cart = Cache::get('cart');
        $this->total_barang = array_sum(array_column($this->cart, 'quantity'));
    }

    public function removeFromCart($id)
    {
        $this->cart = Cache::get('cart');
        $this->cart = array_filter($this->cart, function ($item) use ($id) {
            return $item['id'] != $id;
        });
        Cache::put('cart', $this->cart);
        $this->dispatch('cartUpdated');
    }

    public function shouldShowCart()
    {
        return !Route::is('checkout.*');
    }

    public function render()
    {
        return view('livewire.pages.cart', ['total_barang' => $this->total_barang]);
    }
}
