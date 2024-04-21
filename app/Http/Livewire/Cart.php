<?php

namespace App\Http\Livewire;

use App\Factories\CartFactory;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Component;

/**
 * @property \App\Models\Cart $cart
 * @property Collection<CartItem> $items
 */
class Cart extends Component
{
    public function getCartProperty(): \App\Models\Cart
    {
        return CartFactory::make()->loadMissing('items', 'items.product', 'items.variant');
    }

    public function getItemsProperty(): Collection
    {
        return $this->cart->items;
    }

    public function increment($itemId): void
    {
        $this->cart->items()->find($itemId)?->increment('quantity');
    }

    public function decrement($itemId): void
    {
        $item =  $this->cart->items()->find($itemId);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }
    }

    public function delete($itemId): void
    {
         $this->cart->items()->where('id', $itemId)->delete();

        $this->emit('productRemovedFromCart');
    }

    public function render(): View
    {
        return view('livewire.cart');
    }
}
