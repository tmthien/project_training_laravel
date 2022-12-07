@extends('front-end.layout')


  @section('content')
  <section class="section1">
    <img class="img-slider" src="assets/img/slider/slider_1.jpg" alt="" />
  </section>
  <section class="section2">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-product">
            <div class="section-header">
              <a class="title-blog text-center" href="">Sản phẩm <strong> mới</strong></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb ">
                  <li class="breadcrumb-item"><a href="#">Nam</a></li>
                  <li class="breadcrumb-item"><a href="#">Nữ</a></li>
                  <li class="breadcrumb-item"><a href="#">Phụ kiện</a></li>
                </ul>
              </nav>
            </div>
            <div class="section-product-item">
              <div class="row">
                @foreach($product as $item)
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="{{ $item->img }}" alt="">
                    <p class="name-product text-center">{{ $item->name }}</p>
                    <div class="price-product text-center">
                      <span class="price-sale">{{ number_format($item->sale_price) }}</span>
                      <span class="price-root"><del>{{ number_format($item->old_price) }}</del></span>
                    </div>
                  </div>
                  <div class="product-item-card">
                    <img class="img-product" src="{{ $item->img }}" alt="">
                    @if (Auth::guard('customer')->user() != null)
                    <a href="javascript:" onclick="addCart({{ $item->id }})">
                      <button class="add-cart-product border border-dark text-center">
                        Thêm vào giỏ hàng
                      </button>
                    </a>
                    @else
                      <a href="{{ url('login-customer') }}">
                        <button class="add-cart-product border border-dark text-center">
                          Thêm vào giỏ hàng
                        </button>
                      </a>
                      @endif
                  </div>
                </div>
                @endforeach
              </div>
              <div class="text-center pt-4">
                <a class="" href="#">
                  <button class="show-all-product border border-dark">Xem tất cả sản phẩm mới</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-banner">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="banner-item">
            <img src="assets/img/slider/banner_1.jpg" alt="">
            <div class="banner-content">
              <h3>Đồng hồ</h3>
              <a href="">Xem thêm</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="banner-item">
            <img src="assets/img/slider/banner_2.jpg" alt="">
            <div class="banner-content">
              <h3>Mắt kính</h3>
              <a href="">Xem thêm</a>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="banner-item">
            <img src="assets/img/slider/banner_3.jpg" alt="">
            <div class="banner-content">
              <h3>Trang sức</h3>
              <a href="">Xem thêm</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-product">
            <div class="section-header">
              <a class="title-blog text-center" href="">Dành cho <strong> nam</strong></a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb ">
                  <li class="breadcrumb-item"><a href="#">Nam</a></li>
                  <li class="breadcrumb-item"><a href="#">Nữ</a></li>
                  <li class="breadcrumb-item"><a href="#">Phụ kiện</a></li>
                </ul>
              </nav>
            </div>
            <div class="section-product-item">
              <div class="row">
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                      <span class="price-root"><del>4.900.000</del></span>
                    </div>
                  </div>
                  <div class="product-item-card">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-2-master.jpg" alt="">
                    <button class="add-cart-product border border-dark text-center">Thêm vào giỏ hàng</button>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center pt-4">
                <a class="" href="#">
                  <button class="show-all-product border border-dark">Xem tất dành cho nam</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section4">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-product">
            <div class="section-header">
              <a class="title-blog text-center" href=""><strong>Phụ kiện</strong> mới</a>
              <nav aria-label="breadcrumb">
                <ul class="breadcrumb ">
                  <li class="breadcrumb-item"><a href="#">Nam</a></li>
                  <li class="breadcrumb-item"><a href="#">Nữ</a></li>
                  <li class="breadcrumb-item"><a href="#">Phụ kiện</a></li>
                </ul>
              </nav>
            </div>
            <div class="section-product-item">
              <div class="row">
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                      <span class="price-root"><del>4.900.000</del></span>
                    </div>
                  </div>
                  <div class="product-item-card">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-2-master.jpg" alt="">
                    <button class="add-cart-product border border-dark text-center">Thêm vào giỏ hàng</button>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="product-item">
                    <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                    <p class="name-product text-center">CRUX</p>
                    <div class="price-product text-center">
                      <span class="price-sale">4.500.000</span>
                    </div>
                  </div>
                </div>
              </div>
              <div class="text-center pt-4">
                <a class="" href="#">
                  <button class="show-all-product border border-dark">Xem tất cả phụ kiện mới</button>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="secsion5">
    <div class="slider_1">
      <div class="container">
        <div class="section-header">
          <a class="title-blog text-center pt-5" href="">Bộ sưu tập <strong>Mùa hè</strong></a>
        </div>
        <div class="row justify-content-center">
          <div class="col-md-8 col-md-offset-2">
            <div class="row">
              <div class="col-md-6">
                <div class="banner">
                  <img src="assets/img/slider/banner_2.jpg" alt="">
                </div>
              </div>
              <div class="col-md-6">
                <div class="product-item ">
                  <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-master.jpg" alt="">
                  <p class="name-product text-center">CRUX</p>
                  <div class="price-product text-center">
                    <span class="price-sale">4.500.000</span>
                    <span class="price-root"><del>4.900.000</del></span>
                  </div>
                </div>
                <div class="product-item-card">
                  <img class="img-product" src="assets/img/product/dong-ho-mvmt-crux-2-master.jpg" alt="">
                  <button class="add-cart-product border border-dark text-center">Thêm vào giỏ hàng</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section6">
    <div class="container">
      <div class="section-header">
        <a class="title-blog text-center" href="">Tin tức <strong>Evo Watch</strong></a>
      </div>
      <div class="row">
        <div class="col-md-3 news-item">
          <a class="news-link" href="">
            <div class="news-img">
              <img src="assets/img/news/shop-dong-ho-seiko-chinh-hang-2.jpg" alt="">
            </div>
            <h3 class="news-title">Mạnh Mẽ & Cuốn Hút với đồng hồ mặt rắn L'Duchen Silver Snake</h3>
            <p>Thương hiệu đồng hồ Thụy Sỹ L’Duchen đã mở rộng bộ sưu tập Art Collection của mình với mẫu đồng hồ mặt r...</p>
          </a>
        </div>
        <div class="col-md-3 news-item">
          <a class="news-link" href="">
            <div class="news-img">
              <img src="assets/img/news/chronograph.jpg" alt="">
            </div>
            <h3 class="news-title">Chuyên gia chia sẻ 4 cách phân biệt đồng hồ hàng hiệu thật và giả</h3>
            <p> Việc sưu tầm và sở hữu những chiếc đồng hồ hàng hiệu xa xỉ luôn là một niềm đam mê của nhiều quý ông hiện ...</p>
          </a>
        </div>
        <div class="col-md-3 news-item">
          <a class="news-link" href="">
            <div class="news-img">
              <img src="assets/img/news/ban-biet-gi-ve-dong-ho-chronograph.jpg" alt="">
            </div>
            <h3 class="news-title">Mạnh Mẽ & Cuốn Hút với đồng hồ mặt rắn L'Duchen Silver Snake</h3>
            <p> 1. Đồng hồ Jacques Lemans JL-1-1654
              Đứng đầu danh sách Top 3 đồng hồ 6 kim là mẫu đồng hồ Jacques Lema...</p>
          </a>
        </div>
        <div class="col-md-3 news-item">
          <a class="news-link" href="">
            <div class="news-img">
              <img src="assets/img/news/4-ways-to-create-a-more-stable-healthy-work-environment.jpg" alt="">
            </div>
            <h3 class="news-title">Mạnh Mẽ & Cuốn Hút với đồng hồ mặt rắn L'Duchen Silver Snake</h3>
            <p> Bạn có yêu công việc của bạn không? Tôi chắc rằng sẽ có rất nhiều câu trả lời là không. Vậy, nếu bạn không...</p>
          </a>
        </div>
      </div>
      <div class="text-center pt-5">
        <a class="" href="#">
          <button class="show-all-product border border-dark">Xem tất cả</button>
        </a>
      </div>
    </div>
  </section>
  @endsection

  
  @section('script')
    <script type="text/javascript">
      function addCart(id) {
        $.ajax({
          url: 'add-Cart/' + id,
          type: 'GET',
          success: function(response) {
            if (response.success = true) {
              alert('Thêm giỏ hàng thành công!');
              var loaded = false;
              var time = 1000;
              window.onload = function() {
                loaded = true;
              };
              setTimeout(function() {
                if (!loaded) {
                  window.location.reload();
                }
              }, time);
            }
          },

        });
      }
    </script>
  @endsection


