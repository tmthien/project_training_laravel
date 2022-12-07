
    <header class="header">
      <div class="container header-top">
        <div class="row">
          <div class="col-md-5 header-left">
            <span class="text-contact">HOTLINE ĐẶT HÀNG:
              <a href="#" class="phone-contact">1900 6750</a></span>
          </div>
          <div class="col-md-2 logo-header">
            <a href="{{ url('/') }}">
              <img class="logo-img" src="assets/img/logo/logo.jpg" alt="" />
            </a>
          </div>
          <div class="col-md-5 header-right">
            <ul class="nav">
              <li class="nav-item dropdown">
              @if (Auth::guard('customer')->user() != null )
              
              <a class="nav-link account-text" href="">{{ Auth::guard('customer')->user()->name ?? ""}}</a>
              <ul class="dropdown-content">
                <li class="dropdown-item">
                  <a class="dropdown-link" href="{{ url('/info-customer') }}">Hồ sơ</a>
                </li>
                <li class="dropdown-item">
                  <a class="dropdown-link" href="{{ url('/getlogout') }}">Đăng xuất</a>
                </li>
              </ul>
              @else
              <a class="nav-link account-text" href="">Tài khoản</a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="{{ url('/login-customer') }}">Đăng nhập</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="{{ url('/register-customer') }}">Đăng ký</a>
                  </li>
                </ul>
              @endif
              </li>
              <li class="nav-item cart">
                <a class="nav-link account-card" href="">Giỏ hàng
                  <i class="fa-solid fa-cart-arrow-down"></i>
                  <small class="cart-quantity">{{ $amount ?? 0 }}</small>
                </a>
                <div class="cart-content">
                  @if (count($cart) > 0)
                  <ul class="cart-sidebar">
                    <ul class="cart-list-item">
                        @php($total = 0)
                        @foreach ($cart as $item)
                        @php( $total = $total + $item->total_price)
                        <li class="cart-item">
                          <a a class="product-img" href="">
                            <img src=" {{ $item->products->img ?? "" }}" alt="">
                          </a>
                          <div class="cart-detail">
                            <div class="product-detail">
                              <a href="{{ route('remove-Cart', $item->id) }}" title="Xóa" class="remove-item-cart fa fa-remove">&nbsp;</a>
                              <p class="product-name">{{ $item->products->name ?? ""}}</p>
                              <div class="cart-detail-bottom">
                                <span class="product-price">{{number_format($item->products->sale_price ?? 0)}}đ    / x{{$item->quantity}}</span>
                                
                              </div>
                            </div>
                          </div>
                        </li>
                        @endforeach
                    </ul>
                    <div class="cart-total">
                      Tổng cộng:
                      <span class="total">{{ number_format($total ?? 0)}}đ</span>
                    </div>
                    <div>
                      <div class="checkout">
                        <a class="btn btn-outline-dark btn-checkout" href="{{ url('/checkout') }}">Thanh toán</a>
                        <a class="btn btn-outline-dark btn-cart" href="{{ url('/cart') }}">Giỏ hàng</a>
                      </div>
                    </div>
                  </ul>
                  @else 
                  <ul class="cart-sidebar">
                    <div class="cart-empty">
                      <img src="uploads/no-cart.png" alt="">
                    </div>
                  </ul>
                  @endif
                </div>
              </li>

              <li class="nav-item">
                <span class="nav-link account-find" href="">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="container header-bottom">
        <div class="row">
          <div class="col-md-12">
            <ul class="nav nav-bottom">
              <li class="nav-item">
                <a href="" class="nav-link">Trang chủ</a>
              </li>
              <li class="nav-item dropdown">
                <a href="" class="nav-link">Giới thiệu
                  <i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Chính sách đổi hàng</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">FAQ</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Hướng dẫn thanh toán</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Chính sách vận chuyển</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Hệ thống cửa hàng</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="" class="nav-link">Nam
                  <i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Đồng hồ KASHMIR</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Đồng hồ WEIMAR</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Đồng hồ COLOSSEUM</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="" class="nav-link">Nữ
                  <i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Đồng hồ MELISSANI</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Đồng hồ MORAINE</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="" class="nav-link">Phụ kiện
                  <i class="fa-solid fa-angle-down"></i>
                </a>
                <ul class="dropdown-content">
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Dây đồng hồ</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Kính râm</a>
                  </li>
                  <li class="dropdown-item">
                    <a class="dropdown-link" href="">Kính mắt</a>
                  </li>
                </ul>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Tin tức</a>
              </li>
              <li class="nav-item">
                <a href="" class="nav-link">Liên hệ</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </header>