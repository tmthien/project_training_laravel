@extends('front-end.layout')

@section('css')
<style>
  span.abe:hover {
            cursor: not-allowed;
        }
</style>
@endsection

<body>

    @section('content')
    <section class="bread-crumb mb-5">
        <div class="container">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Thông tin cá nhân</li>
                </ol>
            </nav>
        </div>
    </section>
    <section class="info-customer">
        <div class="container">
            <div class="row">
                <div class="col-md-2 info-sidebar">
                    <h5 class="info-heading">Thông tin cá nhân</h5>
                    @foreach($customer as $item)
                    <span>Xin chào! </span>{{ $item->name }} 
                    @endforeach
                    <ul>
                        <li>
                            <a href="{{ url('/info-customer') }}">Thông tin tài khoản</a>
                        </li>
                        <li>
                            <a href="{{ url('/orders-customer') }}">Thông tin đơn hàng</a>
                        </li> 
                        <li>
                            <a href="{{ url('/change-password') }}">Đổi mật khẩu</a>
                        </li> 
                    </ul>
                </div>
                <div class="col-md-10">
                    <h5 class="info-heading">Thông tin đơn hàng</h5>
                    </br>
                    <table class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Khách hàng</th>
                                    <th>Sản phẩm</th>
                                    <th>Giá</th>
                                    <th>Tổng số lượng</th>
                                    <th>Tổng tiền</th>
                                    <th>Trạng thái đơn hàng</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($order as $item)
                                    <tr>
                                        
                                        @php($json_decode = json_decode($item->products, true))
                                        <td>{{ $item->id }}</td>
                                        <td>{{ $item->users->name }}</td>
                                        <td>
                                        @foreach($json_decode['info'] as $info)
                                            <span>{{$info['name']}} | x{{$info['quantity']}}</span> </br> </span>
                                        @endforeach 
                                        </td>
                                        <td>
                                        @foreach($json_decode['info'] as $info)
                                            <span>{{ number_format($info['price']) }}đ</span> </br> </span>
                                        @endforeach 
                                        </td>
                                        <td>{{$json_decode['totalQuantity']}}</td>
                                        <td>{{$json_decode['totalPrice']}}đ</td>
                                        <td class="text-left">
                                          <div>
                                            
                                          </div>
                                          @if($item->approve_id == 4 || $item->approve_id == 5)
                                              <span class="label-color abe" id="status-{{ $item->id }} " disabled
                                                    data-id="{{ $item->id }}">{{ optional($item->approve)->name }}</span>
                                        
                                          @elseif($item->approve_id == 1)
                                                <span class="status-btn" id="status-{{ $item->id }}"
                                                    data-id="{{ $item->id }}">{{ optional($item->approve)->name }}</span> ||
                                                <a href="">Huỷ đơn hàng</a>
                                          @else
                                              <span class="label-color status-btn" id="status-{{ $item->id }}"
                                                    data-id="{{ $item->id }}">{{ optional($item->approve)->name }}</span>
                                          @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
    </section>
    @endsection
    
</body>