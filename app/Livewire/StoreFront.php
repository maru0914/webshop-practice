<?php

namespace App\Livewire;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

/**
 * @property Collection<Product> $products
 */
class StoreFront extends Component
{
    use WithPagination;

    #[Url]
    public $keywords;

    #[Computed]
    public function products()
    {
        return Product::query()
            ->when($this->keywords, fn($query) => $query->where('name', 'like', "%{$this->keywords}%"))
            ->paginate(5);
    }

    public function render()
    {
        return view('livewire.store-front');
    }
}
