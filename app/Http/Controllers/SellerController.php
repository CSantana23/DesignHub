<?php

namespace App\Http\Controllers;

use App\Mail\NotificationEmail;
use App\Order;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class SellerController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        $orders = Order::all();
        return view("seller.index", compact('orders'));
    }

    /**
     * @return Factory|View
     */
    public function createShippingLabel()
    {
        $order = Order::query()->inRandomOrder()->get()->first();
        return view("seller.create", compact('order'));
    }

    /**
     * @return Factory|View
     */
    public function generateTracking()
    {
        $tk = rand(4,1000);
        return view("seller.tracking", compact('tk'));
    }

    /**
     * @return void
     */
    public function sendNotification()
    {
        Mail::to('customer@customer.com')->send(new NotificationEmail());
    }
}
