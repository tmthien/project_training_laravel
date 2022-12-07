<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;

class ChangePasswordController extends Controller
{
    //
    public function __construct()
    {
       
    }
   
    public function index()
    {
        $cart = Cart::all();
        $category = Category::all();
        $product = Product::all();
        $notification = Notification::where('user_id',Auth::guard('customer')->user()->id)->get();
        // $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        $customer = Customer::where('id',Auth::guard('customer')->user()->id)->get();
        // dd($customer);
        return view('front-end.changepassword', compact('product', 'category','notification','cart','customer'));
    } 

    public function store(Request $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password'],
        ]);
        Customer::find(Auth::guard('customer')->user()->id)->update(['password'=> Hash::make($request->new_password)]);
        return redirect('/change-password');
    }
}


