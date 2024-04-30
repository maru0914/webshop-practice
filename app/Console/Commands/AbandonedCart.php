<?php

namespace App\Console\Commands;

use App\Mail\AbandonedCartReminder;
use App\Models\Cart;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AbandonedCart extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:abandoned-cart';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '放置されたカートを探し、カート所有ユーザーに通知します。';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $carts = Cart::withWhereHas('user')->whereDate('updated_at', today()->subDay());

        foreach ($carts as $cart) {
            Mail::to($cart->user)->send(new AbandonedCartReminder($cart));
        }
    }
}
