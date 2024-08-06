<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;

    public $fillable = ['name', 'price', 'stok'];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }
}
