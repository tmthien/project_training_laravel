@extends('front-end.layout')

<body>
@section('content')
    <div class="container">
        {!! Form::open(['method' => 'POST', 'route' => 'checkout.store']) !!}
            <div class="row">
                <h1>Thanh toán</h1>
                <hr>
                <div class="col-md-4">
                    <h3>Thông tin khách hàng</h3>
                    <div class="form-group">
                        <label for="label">Email:</label>
                        <span>Email@gmail.com</sp>
                    </div>
                    <div class="form-group">
                        <label for="label">Họ và tên:</label>
                        <span>Trần Minh Thiện</sp>
                    </div>
                    <div class="form-group">
                        <label for="label">Ghi chú: </label>
                        <textarea class="form-control mw-form"  name="note" cols="20" rows="10" placeholder="Ghi chú cho đơn hàng"></textarea>
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Địa chỉ giao hàng</h3>
                    <div class="form-group">
                        <label for="label">Tên người nhận</label>
                        <input type="string" class="form-control mw-form" name="nameAddress" placeholder="Nhập tên">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại người nhận</label>
                        <input type="string" class="form-control mw-form" name="phone" placeholder="Nhập số điện thoại">
                    </div>
                    <div class="form-group">
                        {!!Form::label('province','Tỉnh/Thành phố')!!}
                        {!!Form::select('province_id',$provinces,null, ['class' => 'form-control mw-form','id'=>'province_id'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('district','Quận/Huyện')!!}
                        {!!Form::select('district_id',$districts ?? [], null, ['class' => 'form-control mw-form','id'=>'district_id'])!!}
                    </div>
                    <div class="form-group">
                        {!!Form::label('ward','Phường/Xã')!!}
                        {!!Form::select('ward_id',$wards ?? [], null, ['class' => 'form-control mw-form','id'=>'ward_id'])!!}
                    </div>
                    <div class="form-group">
                        <label for="label">Địa chỉ nhận hàng</label>
                        <input type="string" class="form-control mw-form" name="address" placeholder="Nhập địa chỉ của bạn">
                    </div>
                </div>
                <div class="col-md-4">
                    <h3>Đơn hàng</h3>
                    <div class="row">
                        @php($total = 0)
                        @foreach ($cart as $item)
                        @php( $total += $item->total_price)
                        <table>
                        <input type="hidden" name="id_cart[]" value="{{$item->id}}">
                            <td width="300px">
                                <img width="80%" src="{{ $item->products->img ?? "" }}" alt="">
                            </td>
                            <td width="300px">
                                <div class="info-order">
                                    <strong>{{$item->products->name ?? ""}}</strong>

                                    <p>x{{ $item->quantity }}</p>
                                </div>
                            </tdc>
                            <td>
                                <div class="price-order">
                                    <p>{{number_format($item->products->sale_price) ?? 0 }}đ</p>
                                </div>
                            </td>
                            </tbody>
                        </table>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="total-price-order">
                            <p>Thành tiền</p>
                            <strong>{{ number_format($total ?? 0)}}đ</strong>
                            <input type="hidden" name="total" value="{{ number_format($total)}}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <a class="btn btn-default bordered form-control" href="{{ url('/cart') }}">
                                Quay lại giỏ hàng
                            </a>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" class="btn btn-primary form-control">Thanh toán</button>
                        </div>
                    </div>
                </div>
            </div>
        {!! Form::close() !!}
    </div>
@endsection

@section('script')
    <script type="text/javascript">
        $("select[name='province_id']").change(function(){
            var province_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "{{url('/getDistrict')}}",
                method: 'GET',
                data: {
                    province_id: province_id,
                    _token: token
                },
                success: function(data) {
                    $("select[name='district_id'").html('');

                    $.each(data, function(key, value){

                        $("select[name='district_id']").append(
                            "<option value=" + key + ">" + value + "</option>"
                        );
                    });
                }
            });
        });
        $("select[name='district_id']").change(function(){
            var district_id = $(this).val();
            var token = $("input[name='_token']").val();
            $.ajax({
                url: "{{url('/getWard')}}",
                method: 'GET',
                data: {
                    district_id: district_id,
                    _token: token
                },
                success: function(data) {
                    $("select[name='ward_id'").html('');

                    $.each(data, function(key, value){

                        $("select[name='ward_id']").append(
                            "<option value=" + key + ">" + value + "</option>"
                        );
                    });
                }
            });
        });
    </script>
@endsection
</body>

</html>