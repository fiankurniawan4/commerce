<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['name', 'price', 'stok'];

    public function hasWishlists()
    {
        return $this->hasOne(Wishlist::class)->where('wishlists.user_id', Auth::user()->id);
    }
}
