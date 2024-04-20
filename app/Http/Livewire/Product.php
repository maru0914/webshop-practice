<?php

namespace App\Http\Livewire;

use Illuminate\View\View;
use Livewire\Component;

/**
 * @property \App\Models\Product $product
 */
class Product extends Component
{
    public $productId;

    public function mount()
    {

    }

    public function getProductProperty(): \App\Models\Product
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function render(): View
    {
        return view('livewire.product');
    }
}
