<?php

namespace App\Http\Controllers;

use App\Cart;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class CheckoutController extends Controller
{
    /**
     * @return Factory|View
     */
    public function index()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $total = $cart->totalPrice;
        return view('shop.checkout', compact('total'));
    }

    public function store(Request $request)
    {
        dd($request);
    }

    public function getThankYou()
    {
        if(!Session::has('cart')){
            return view('shop.shopping-cart');
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.thankyou', compact('cart'));
    }
}
