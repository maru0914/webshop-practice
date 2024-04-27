@component('mail::message')
{{ $order->user->name }} 様

ご注文ありがとうございます！以下ご注文の詳細です。

@component('mail::table')
    | 商品                          | 価格              | 数量           | 税額           | 合計   |
    | :--------------------------- | ------------------:| ------------------:| -------------:| -------:|
    @foreach($order->items as $item)
        | **{{ $item->name }}** <br>{{ $item->description }} | {{ $item->price }} | {{ $item->quantity }} | {{ $item->amount_tax }} | {{ $item->amount_total }} |
    @endforeach
    @if($order->amount_shipping->isPositive())
        |||| **配送手数料** | {{ $order->amount_shipping }} |
    @endif
    @if($order->amount_discount->isPositive())
        |||| **割引金額** | {{ $order->amount_discount }} |
    @endif
    @if($order->amount_tax->isPositive())
        |||| **税額** | {{ $order->amount_tax }} |
    @endif
    |||| **小計** | {{ $order->amount_subtotal }} |
    |||| **合計** | {{ $order->amount_total }} |
@endcomponent

@component('mail::button', ['url' => route('view-order', $order->id), 'color' => 'success'])
    注文を見る
@endcomponent

@endcomponent
