<?php

namespace App\Http\Livewire;

use App\Factories\CartFactory;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

/**
 * @property Collection<CartItem> $items
 */
class Cart extends Component
{
    public function getItemsProperty()
    {
        return CartFactory::make()->items;
    }

    public function increment($itemId)
    {
        CartFactory::make()->items()->find($itemId)?->increment('quantity');
    }

    public function decrement($itemId)
    {
        $item = CartFactory::make()->items()->find($itemId);

        if ($item->quantity > 1) {
            $item->decrement('quantity');
        }
    }

    public function delete($itemId)
    {
        CartFactory::make()->items()->where('id', $itemId)->delete();

        $this->emit('productRemovedFromCart');
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
