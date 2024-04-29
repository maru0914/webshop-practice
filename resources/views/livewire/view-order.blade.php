<div class="grid grid-cols-2 gap-4">
    <x-panel class="mt-12 col-span-2" title="Your order #{{ $this->order->id }}">
        <table class="w-full">
            <thead>
            <tr>
                <th class="text-left">商品</th>
                <th class="text-left">数量</th>
                <th class="text-right">合計</th>
            </tr>
            </thead>
            <tbody>
            @foreach($this->order->items as $item)
                <tr>
                    <td>
                        {{ $item->name }} <br>
                        {{ $item->description }}
                    </td>
                    <td>{{ $item->quantity }}</td>
                    <td class="text-right">
                        {{ $item->amount_total }}
                    </td>
                </tr>
            @endforeach
            </tbody>
            <tfoot>
            @if($this->order->amount_shipping->isPositive())
            <tr>
                <td colspan="2" class="text-right font-medium">配送料</td>
                <td class="font-medium text-right">{{ $this->order->amount_shipping }}</td>
            </tr>
            @endif
            @if($this->order->amount_discount->isPositive())
            <tr>
                <td colspan="2" class="text-right font-medium">割引金額</td>
                <td class="font-medium text-right">{{ $this->order->amount_discount }}</td>
            </tr>
            @endif

            <tr>
                <td colspan="2" class="text-right font-medium">税額</td>
                <td class="font-medium text-right">{{ $this->order->amount_tax }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-medium">小計</td>
                <td class="font-medium text-right">{{ $this->order->amount_subtotal }}</td>
            </tr>
            <tr>
                <td colspan="2" class="text-right font-medium">合計</td>
                <td class="font-medium text-right">{{ $this->order->amount_total }}</td>
            </tr>
            </tfoot>
        </table>
    </x-panel>

    <x-panel class="col-span-1" title="請求情報">
        @foreach($this->order->billing_address->filter() as $value)
            {{ $value }} <br>
        @endforeach
    </x-panel>

    <x-panel class="col-span-1" title="配送情報">
        @foreach($this->order->shipping_address->filter() as $value)
            {{ $value }} <br>
        @endforeach
    </x-panel>
</div>
