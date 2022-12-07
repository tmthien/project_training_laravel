<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $cart = Cart::all();
        $category = Category::all();
        $product = Product::all();
        // $notification = Notification::where('user_id', Auth::guard('customer')->user()->id);
        // $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        // dd($cart);
        return view('front-end.index', compact('product', 'category','cart'));
    }
}
