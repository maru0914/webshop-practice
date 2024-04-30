<div class="mt-12">
    <div class="flex justify-between">
        <h1 class="text-xl font-medium">商品一覧</h1>
        <div>
            <x-input wire:model.live.debounce="keywords" type="text" placeholder="検索キーワード" />
        </div>
    </div>
    <div class="grid grid-cols-4 gap-4 mt-12">
        @foreach($this->products as $product)
            <x-panel class="relative">
                <a wire:navigate href="{{ route('product', $product->id) }}" class="absolute inset-0"></a>
                <img src="{{ $product->image->path }}" alt="">
                <h2 class="font-medium text-lg">{{ $product->name }}</h2>
                <span class="text-gray-700 text-sm">{{ $product->price }}</span>
            </x-panel>
        @endforeach
    </div>
    <div class="mt-6">
        {{ $this->products->links() }}
    </div>
</div>
