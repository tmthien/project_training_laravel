<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Kjmtrue\VietnamZone\Models\Province;
use Kjmtrue\VietnamZone\Models\District;
use Kjmtrue\VietnamZone\Models\Ward;
use Illuminate\Support\Facades\Auth;
use App\Models\Product;
use App\Models\Address;
use App\Models\Booking;
use App\Models\Cart;
use DB;


class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::where('user_id',Auth::guard('customer')->user()->id)->get();
        $provinces = Province::all()->pluck('name','id');
        $provinces->prepend('--Vui lòng chọn tỉnh/thành phố--')->all();
        $amount =  Cart::where('user_id', Auth::guard('customer')->user()->id)->sum('quantity');

        return view('front-end.checkout',compact('provinces', 'cart', 'amount'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $requestData = $request->all();
        $user_id = Auth::guard('customer')->user()->id; 
        $provincesName = Province::where('id',$requestData['province_id'])->first();
        $districtName = District::where('id',$requestData['district_id'])->first();
        $wardName = Ward::where('id',$requestData['ward_id'])->first();
        $requestData['address'] =  $requestData['address'].','.$wardName->name.','.$districtName->name.','.$provincesName->name;
        $arrayAddress = [
            'name'=>$requestData['nameAddress'],
            'phone_number'=>$requestData['phone'],
            'address'=>$requestData['address'],
            'province_id'=>$requestData['province_id'],
            'district_id'=>$requestData['district_id'],
            'ward_id'=>$requestData['ward_id'],
            'user_id'=>$user_id
        ];

        $totalQuantity = 0;
        $infoProduct =[];
        $idCart = [];
        foreach($requestData['id_cart'] as $key => $value){
            $cart = Cart::where('id', $value)->first();
            $product = Product::findOrFail($cart->product_id);
            $infoProduct[] = [
                'name' => $product->name,
                'price' => $product->sale_price,
                'quantity' => $cart->quantity
            ];
            $totalQuantity += $cart->quantity;
            $idCart[] = $value;
        }
        $amount = array(
            'info' => $infoProduct,
            'totalQuantity' => $totalQuantity,
            'totalPrice'=>$requestData['total']
        );
        $addressCreated = Address::create($arrayAddress);        
        $booking = [
            'user_id' => $user_id,
            'products' => json_encode($amount, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES),
            'address_id' => $addressCreated->id,
            'approve_id' => 1
        ];
        // dd($booking);
        $booking = Booking::create($booking);
        
        Cart::whereIn('id',$idCart)->delete();

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
