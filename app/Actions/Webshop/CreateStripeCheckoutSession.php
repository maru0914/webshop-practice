<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;
use Laravel\Cashier\Checkout;

class CreateStripeCheckoutSession
{
    public function createFromCart(Cart $cart): Checkout
    {
        return $cart->user
            ->allowPromotionCodes()
            ->checkout(
            $this->formatCartItems($cart->items)
        );
    }

    private function formatCartItems(Collection $items): array
    {
        return $items->loadMissing('product', 'variant')->map(function (CartItem $item) {
            return [
                'price_data' => [
                    'currency' => 'JPY',
                    'unit_amount' => $item->product->price->getAmount(),
                    'product_data' => [
                        'name' => $item->product->name,
                        'description' => "サイズ: {$item->variant->size} - 色: {$item->variant->color}",
                        'metadata' => [
                            'product_id' => $item->product->id,
                            'product_variant_id' => $item->product_variant_id,
                        ],
                    ],
                ],
                'quantity' => $item->quantity,
            ];
        })->toArray();
    }
}
