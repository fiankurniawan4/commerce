<?php

namespace App\Livewire\Pages;

use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\On;
use Livewire\Component;

class Cart extends Component
{
    public $cart = [];
    public $total_barang = 0;

    public function mount() {
        $this->cart = Cache::get('cart') ?? [];
        $this->total_barang = array_sum(array_column($this->cart, 'quantity')) ?? 0;
    }

    #[On('cartUpdated')]
    public function cartUpdated()
    {
        $this->cart = Cache::get('cart');
        $this->total_barang = array_sum(array_column($this->cart, 'quantity'));
    }


    public function render()
    {
        return view('livewire.pages.cart', ['cart' => $this->cart, 'total_barang' => $this->total_barang]);
    }
}
