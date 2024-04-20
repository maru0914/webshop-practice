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

    public function render()
    {
        return view('livewire.cart');
    }
}
