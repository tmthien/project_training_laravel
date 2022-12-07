<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\Notification;
use App\Models\Booking;

class CustomerController extends Controller
{
    public function getlogin () {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        $arr = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if ($request->remember == trans('remember.Remember Me')) {
            $remember = true;
        } else {
            $remember = false;
        }

        if (Auth::guard('customer')->attempt($arr)) {

            return redirect('/');
        } else {

            return redirect()->back();
        }
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    public function postRegister(Request $request)
    {
        Customer::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]); 
        return redirect('login-customer');  
    }

    public function getlogout(Request $request)
    {
        Auth::guard('customer')->logout();

        return redirect('/');
    }

    public function index() {
        $cart = Cart::all();
        $category = Category::all();
        $product = Product::all();
        $notification = Notification::where('user_id',Auth::guard('customer')->user()->id)->get();
        $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        $customer = Customer::where('id',Auth::guard('customer')->user()->id)->get();
        // dd($account);
        return view('front-end.info_customer', compact('product', 'category','notification','amount','cart','customer'));
    }

    public function edit() {
        $cart = Cart::all();
        $notification = Notification::where('user_id',Auth::guard('customer')->user()->id)->get();
        $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        $customer = Customer::where('id',Auth::guard('customer')->user()->id)->get();
        return view('front-end.edit_customer', compact('notification','amount','cart','customer'));
    }


    public function orders() {
        $order = Booking::where('user_id', Auth::guard('customer')->user()->id)->get();
        $cart = Cart::all();
        $category = Category::all();
        $product = Product::all();
        $notification = Notification::where('user_id',Auth::guard('customer')->user()->id)->get();
        // $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        $customer = Customer::where('id',Auth::guard('customer')->user()->id)->get();
        // dd($customer);
        return view('front-end.customer_order', compact('product', 'category','notification','cart','customer','order'));
    }
}
