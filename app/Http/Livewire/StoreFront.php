<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

/**
 * @property Collection<Product> $products
 */
class StoreFront extends Component
{
    public function getProductsProperty()
    {
        return Product::query()->get();
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
