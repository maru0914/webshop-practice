@component('mail::message')
{{ $order->user->name }} 様

ご注文ありがとうございます！以下、注文の詳細です。

<table style="width: 100%">
    <thead>
    <tr>
        <th>商品</th>
        <th>価格</th>
        <th>数量</th>
        <th>税額</th>
        <th>合計</th>
    </tr>
    </thead>
    <tbody>
    @foreach($order->items as $item)
        <tr>
            <td>
                {{ $item->name }} <br>
                {{ $item->description }}
            </td>
            <td>
                {{ $item->price }}
            </td>
            <td>
                {{ $item->quantity }}
            </td>
            <td>
                {{ $item->amount_tax }}
            </td>
            <td>
                {{ $item->amount_total }}
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    @if($order->amount_shipping->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                配送料
            </td>
            <td>
                {{ $order->amount_shipping }}
            </td>
        </tr>
    @endif
    @if($order->amount_discount->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                割引金額
            </td>
            <td>
                {{ $order->amount_discount }}
            </td>
        </tr>
    @endif
    @if($order->amount_tax->isPositive())
        <tr>
            <td colspan="4" style="text-align: right;">
                税額
            </td>
            <td>
                {{ $order->amount_tax }}
            </td>
        </tr>
    @endif
    <tr>
        <td colspan="4" style="text-align: right;">
            小計
        </td>
        <td>
            {{ $order->amount_subtotal }}
        </td>
    </tr>
    <tr>
        <td colspan="4" style="text-align: right;">
            合計
        </td>
        <td>
            {{ $order->amount_total }}
        </td>
    </tr>
    </tfoot>
</table>
@endcomponent
