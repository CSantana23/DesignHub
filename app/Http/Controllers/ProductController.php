<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Session;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        $products = Product::all();
        return view('shop.index',compact('products'));
    }

    public function addToCart(Request $request, $id){
        $product = Product::find($id);
        $oldCart = Session::has('cart') ? Session::get('cart'): null;
        $cart = new Cart($oldCart);
        $cart->add($product, $id);

        $request->session()->put('cart', $cart);
//        dd($request->session()->get('cart')->totalQty);
        return redirect()->back();
    }

    public function getCart(){
        if(!Session::has('cart')){
            return view('shop.shopping-cart',['products'=>null]);
        }
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        return view('shop.shopping-cart',['products'=>$cart->items,'totalPrice'=>$cart->totalPrice]);
    }

    public function getCheckout(){
            if(!Session::has('cart')){
                return view('shop.shopping-cart');
            }
            $oldCart = Session::get('cart');
            $cart = new Cart($oldCart);
            $total = $cart->totalPrice;
            return view('shop.checkout', compact('total'));
    }

    public function postCheckout(){
     //
    }
}
