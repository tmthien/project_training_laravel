<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class CartController extends Controller
{
    //
    public function cart()
    {
        $cart = Cart::where('user_id', Auth::guard('customer')->user()->id)->get();
        $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');
        return view('front-end.cart', compact('cart', 'amount'));
    }

    public function addToCart($id)
    {
        $cart = Cart::where('product_id', $id)->where('user_id', Auth::guard('customer')->user()->id)->first();

        if ($cart != null) {
            $price = Product::where('id', $id)->pluck('sale_price')->first();
            $quantity = $cart->quantity + 1;
            Cart::where('product_id', $id)->update(['quantity' => $quantity, 'total_price' => $price * $quantity]);
        } else {
            $price = Product::where('id', $id)->pluck('sale_price')->first();
            $cart1 = [
                "user_id" => Auth::guard('customer')->user()->id,
                "product_id" => $id,
                "quantity" => 1,
                "total_price" => $price * 1
            ];
            DB::table('carts')->insert($cart1);
        }
        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        $price = Product::where('id', $request->id)->pluck('sale_price')->first();
        $cart = Cart::where('product_id', $request->id)->update(['quantity' => $request->quantity, 'total_price' => $price * $request->quantity]);
        $cartAll = Cart::where('product_id', $request->id)->where('user_id', Auth::guard('customer')->user()->id)->get();

        $totalPrice = 0;
        
        $countQty = 0;
        foreach ($cartAll as $item) {
            $totalPrice = $item->total_price;
            $countQty += $item->quantity;
        }
        return response()->json([
            'data' => $cart,
            'total' => $totalPrice,
            'amount' => $countQty,
            'message' => 'Cập nhật sản phẩm thành công!',
        ]);
    }

    public function removeCart($id)
    {
        Cart::destroy($id);
        return redirect()->back();
    }
}
