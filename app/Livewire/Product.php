<?php

namespace App\Livewire;

use App\Actions\Webshop\AddProductVariantToCart;
use Illuminate\View\View;
use Laravel\Jetstream\InteractsWithBanner;
use Livewire\Attributes\Computed;
use Livewire\Component;

/**
 * @property \App\Models\Product $product
 */
class Product extends Component
{
    use InteractsWithBanner;

    public $productId;

    public $variant;

    public $rules = [
        'variant' => ['required', 'exists:App\Models\ProductVariant,id']
    ];

    public function mount()
    {
        $this->variant = $this->product->variants()->value('id');
    }

    #[Computed]
    public function product(): \App\Models\Product
    {
        return \App\Models\Product::findOrFail($this->productId);
    }

    public function addToCart(AddProductVariantToCart $cart)
    {
        $this->validate();

        $cart->add(
            variantId: $this->variant
        );

        $this->banner('カートに追加されました');

        $this->dispatch('productAddedToCart');
    }

    public function render(): View
    {
        return view('livewire.product');
    }
}
