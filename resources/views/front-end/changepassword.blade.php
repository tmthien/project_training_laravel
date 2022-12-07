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
            <div class="col-md-2 info-sidebar">
                    <h5 class="info-heading">Đổi mật khẩu</h5>
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
                    <h5 class="info-heading">Thay đổi mật khẩu</h5>
                    <form action="{{ url('/change-password') }}" method="post">
                        @csrf
                        <div class="form-group m-3">
                            <label for="">Mật khẩu cũ</label>
                            <input type="password" name="current_password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group m-3">
                            <label for="">Mật khẩu mới</label>
                            <input type="password" name="new_password" class="form-control" placeholder="">
                        </div>
                        <div class="form-group m-3">
                            <label for="">Nhập lại mật khẩu mới</label>
                            <input type="password" name="new_confirm_password" class="form-control" placeholder="">
                        </div>
                        <button class="btn btn-dark">Lưu</button>
                    </form>
                    </br>
                </div>
            </div>
        </div>
    </section>
    @endsection
    
</body>