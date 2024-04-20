<?php

namespace App\Http\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property \App\Models\Product $product
 */
class Product extends Component
{
    public $productId;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    public function getProductProperty(): \App\Models\Product
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );
    }

    public function render(): View
    {
        return view('livewire.product');
    }
}
