<div class="bg-white rounded shadow mt-12 p-5 max-w-xl mx-auto">
    @if($this->order)
        <p>
            注文No. {{ $this->order->id }} を受け付けました！
        </p>
    @else
        <p wire:poll>
            注文を確認中です。少々お待ちください。。。
        </p>
    @endif
</div>
