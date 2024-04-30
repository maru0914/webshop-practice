@component('mail::message')
{{ $cart->user->name }} 様

カートに商品が残っています。購入手続きへ進むには以下のボタンをクリックしてください。


@component('mail::button', ['url' => route('cart'), 'color' => 'success'])
    購入手続きへ
@endcomponent

@endcomponent
