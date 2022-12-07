@extends('front-end.layout')

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
                <div class="col-md-3 info-sidebar">
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
                <div class="col-md-8">
                    <h5 class="info-heading">Thông tin tài khoản</h5>
                    <a href="{{ url('/edit-info/{$customer->id}') }}" style="float:right;">Chỉnh sửa</a>
                    </br>
                    @foreach($customer as $item)
                    <strong>Họ tên:</strong> <span>{{ $item->name }}</span>
                    </br></br>
                    <strong>Email:</strong> <span>{{ $item->email }}</span>
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    @endsection
    
</body>