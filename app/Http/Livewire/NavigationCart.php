<?php

namespace App\Http\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

/**
 * @property int $count
 */
class NavigationCart extends Component
{
    public $listeners = [
        'productAddedToCart' => '$refresh',
        'productRemovedFromCart' => '$refresh',
    ];

    public function getCountProperty()
    {
        return CartFactory::make()->items()->sum('quantity');
    }

    public function render()
    {
        return view('livewire.navigation-cart');
    }
}
