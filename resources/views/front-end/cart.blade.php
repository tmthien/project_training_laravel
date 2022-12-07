@extends('front-end.layout')

@section('css')
    
@endsection

<body>
@section('content')
    <section class="bread-crumb mb-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Giỏ hàng</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="product">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    @if(count($cart) > 0 )
                    <div class="shoping-cart">
                        <div class="shopping-cart-table">
                            <div class="row">
                                <div class="col-md-12">
                                    <h1 class="header-cart ">
                                    Giỏ hàng </br></br>
                                    <span class="count-text"> Số lượng sản phẩm trong giỏ hàng:  {{ $amount ?? 0 }}
                                    </span>
                                    </h1>
                                </div>
                            </div>
                            <form id="shopping-cart" action="post">
                                <div class="row">
                                    <div class="col-md-9">
                                        @php($total = 0)
                                        @php($temp_price = 0)
                                        @foreach ($cart as $item)
                                        @php($total += $item->total_price)
                                        <div class="cart-tbody">
                                            <div class="row shopping-cart-item">
                                                <div class="col-md-3 img-thumbnail-custom">
                                                    <p class="image">
                                                        <a href="">
                                                            <img src="{{ $item->products->img ?? "" }}" alt="">
                                                        </a>
                                                    </p>
                                                </div>
                                                <div class="col-md-9 box-info">
                                                    <div class="box-info-product">
                                                        <p class="name-product">{{ $item->products->name ?? ""}}</p>
                                                        <p>
                                                            <a class="m-2" href="{{ route('remove-Cart', $item->id) }}" onclick="return confirm('Xoá sản phẩm khỏi giỏ hàng?    ')";>Xoá</a>
                                                        </p>
                                                    </div>
                                                    <div class="box-price">
                                                        <p class="price pricechange">{{number_format($item->products->sale_price ?? 0)}}đ</p>
                                                    </div>
                                                    <div class="item-qty">
                                                        <div class="qty quantity-partent">
                                                            <button type="button" class="qty-down qty-btn" onclick="qtyDown(this, {{$item->product_id}})">-</button>
                                                            <input type="text" data-id="input-{{$item->product_id}}" value="{{ $item->quantity }}" class="text-center quantity update-cart input-number itemQty{{$item->product_id}}" min="1" onkeyup="updateCart(this,{{$item->product_id}})" onchange="validInputQty(this)" onkeypress="if(isNaN(this.value + String.fromCharCode(event.keyCode) )) return false;">
                                                            <button type="button" class="qty-up qty-btn" onclick="qtyUp(this, {{$item->product_id }})">+</button>
                                                        </div>
                                                    </div>
                                                    <div class="box-price">
                                                        <p class="price pricechange">{{number_format($item->products->sale_price ?? 0)}}đ</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <div class="col-md-3">
                                        <div class="cart-checkout">
                                          
                                            <div class="box-style fee mt-3 mb-3">
                                                <p class="list-info-price">
                                                    <span>Thành tiền: </span>
                                                    <strong class="float-end totals_price">{{ number_format($total ?? 0)}}đ</strong>
                                                </p>
                                            </div>
                                            <a href="{{route('checkout.index')}}">
                                                <button type="button" class="btn btn-dark form-control mb-3 mt-3  ">Thanh toán</button>
                                            </a>
                                            <a class="btn btn-default border form-control" href="{{ url('/') }}">Tiếp tục mua hàng</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    @else
                    <div class="cart-empty">
                      <img src="uploads/no-cart.png" alt="" style="max-width: 40%;">
                    </div>
                    @endif
                </div>
            </div>
            <div class="row">
            </div>
        </div>
    </section>
@endsection

@section('script')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript">
           function qtyUp(ob,id) {
                var qty = ob.previousElementSibling.value;
                qty++;
                document.querySelector('[data-id="input-' + id + '"]').value = qty;
                changeCartAjax(id, qty);
            }
        function qtyDown(ob,id) {
                var qty = ob.nextElementSibling.value;
                qty--;
                document.querySelector('[data-id="input-' + id + '"]').value = qty;
                if (qty < 1) 
                return alert('Vui lòng nhập số lượng lớn hơn 0!');
                changeCartAjax(id, qty);
            }
                $(".update-cart").click(function(e) {
                var id = $(this).data('id');
                var quantity = $(this).val();
                changeCartAjax(id, quantity);
            });

            function updateCart(ob, id) {
                var quantity = ob.value;
                if (quantity < 1) 
                document.querySelector('[data-id="input-' + id + '"]').value = 1;
                return alert('Vui lòng nhập số lượng lớn hơn 0!');
                changeCartAjax(id, quantity);
            }
            function number_format(number, decimals, dec_point, thousands_sep) {
    // Strip all characters but numerical ones.
    number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
    var n = !isFinite(+number) ? 0 : +number,
        prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
        sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
        dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
        s = '',
        toFixedFix = function(n, prec) {
            var k = Math.pow(10, prec);
            return '' + Math.round(n * k) / k;
        };
    // Fix for IE parseFloat(0.55).toFixed(0) = 0;
    s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
    if (s[0].length > 3) {
        s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
    }
    if ((s[1] || '').length < prec) {
        s[1] = s[1] || '';
        s[1] += new Array(prec - s[1].length + 1).join('0');
    }
    return s.join(dec);
}   
            function changeCartAjax(id, quantity) {
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: quantity
                    },
                    success: function(res) {
                        $('.totals_price').html(number_format(res.total) + '&nbsp;₫');
                        $('.cart-quantity').html(res.amount);
                    }
                });
            }

        $(document).ready(function() {
            function validInputQty(ob) {
                if (ob.value == 0) ob.value = 1;
            }
         
            //Change Cart Ajax
            function changeCartAjax(id, quantity) {
                $.ajax({
                    url: '{{ url('update-cart') }}',
                    method: "patch",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: id,
                        quantity: quantity
                    },
                    success: function(res) {
                        var arr = res.data;
                        $.each(arr, function(index, item) {
                            var itemTotal = item.price * item.quantity;
                            $('.itemPrice' + index).html(number_format(itemTotal) + '&nbsp;₫');
                        });
                        $('.totals_price').html(number_format(res.total) + '&nbsp;₫');
                        $('.cart-quantity').html(res.amount);
                    }
                });
            }
        });
    </script>
@endsection
</body>

</html>