<?php

namespace App\Listeners;

use App\Actions\Webshop\HandleCheckoutSessionCompleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Laravel\Cashier\Events\WebhookReceived;

class StripeEventListener
{
    /**
     * Handle the event.
     */
    public function handle(WebhookReceived $event): void
    {
        if($event->payload['type'] === 'payment_intent.succeeded') {
            (new HandleCheckoutSessionCompleted)->handle($event->payload['data']['object']['id']);
        }
    }
}
