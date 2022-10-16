@php
      if(is_null(Session::get('carts'))) { $productQuantity = 0; } 
      else $productQuantity = count(Session::get('carts'));                 
@endphp

<header>
<div class="d-none d-md-block" >
  
  {{-- @if(session('alert'))
      <section class='alert alert-success text-center'>{{session('alert')}}</section>
  @endif --}}

    <nav class="container d-none d-md-flex justify-content-between align-items-center">
<div class="text-white rounded bg-info px-2 ">
      <span>Hỗ trợ nhanh nhất tại Zalo: <a class="text-white" href="https://zalo.me/0965324305" target="_blank">0965324305</a></span>
</div>

{{-- ------------------ACCOUNT--------------------------- --}}

  {{-- ------------------ACCOUNT--------------------------- --}}
  @if(Auth::check())
  <div>
    <span class="btn text-light" >
      <i class="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
      <span class="d-none d-md-inline dropdown-toggle" type="button" data-toggle="dropdown"> Chào <b>{{Auth::user()->name}}</b></span>
      <div class="dropdown-menu">
        <a class="dropdown-item" href="/profile">Tài khoản</a></li>
        <a class="dropdown-item" href="/my-order">Đơn hàng</a></li>
        <a class="dropdown-item" href="{{url('logout')}}">Thoát</a></li>
      </div>
    </span>
    {{-- <a class="btn text-warning p-0" href="{{url('logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i></a> --}}
  @else
    <a class="btn text-white" href="" data-toggle="modal" data-target="#modalLoginForm">
      <i class="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
      <span class="d-none d-md-inline"> Đăng nhập | Đăng ký</span>
    </a>
  </div>
  @endif
  
  {{-- ------------------ACCOUNT--------------------------- --}}
</div>
@include('login')
    </nav>
    
  </div>
  <div class="bg-white">
  <nav
    class="headerTop container navbar d-md-flex justify-content-between align-items-center "
  >
    <div class="logo mx-auto mx-md-0 d-flex justify-content-center d-md-block">
      <a href="/" class="text-decoration-none">
            <div class="d-flex">
        <div class="pt-2">
          <img
              class="rounded"
              src="/template/images/icons/logo_2.png"
              alt="GShop"
              width="100px"
              height="100px"
            />
        </div>
        <div class="">
          <div class="navbar-brand text-dark w-100 m-0 py-0" style="font-size: 50px;">GShop</div>
          <div class="navbar-brand text-dark d-block text-center py-0 m-0 w-100 " href="/" style="font-size: 17px;">Tài khoản Premium</div>
        </div>
      </div>
      </a>
    </div>
    
    <div class="search-bar text-center mt-4 w-100 w-md-50">

      {{-- -----------------------SEARCH BAR--------------------- --}}
      <div class="bg-light border border-info rounded p-1">
        <form class="input-group bg-light" role="search" method="get" action="{{URL::to('search')}}">
          <input
            class="form-control border-0 mr-1 bg-light"
            type="text"
            value=""
            name="key"
            placeholder="Tìm sản phẩm..."
          />
          <button class="btn btn-info" type="submit">
            <i class="fa fa-search"></i>
          </button>
        </form>
      </div>
      <div class="pt-1">
        <span class="slogan text-dark" style="font-size: 21px"
          ><b>An toàn - Chất lượng - Uy tín</b></span
        >
      </div>
      {{-- -----------------------SEARCH BAR--------------------- --}}

    </div>

    <div class="rounded mb-2">
      <div class="d-none d-md-block">
          {{-- -----------------------CARTS--------------------- --}}
          <a href="/carts">
            <button class="btn btn-light border-dark mb-2 p-2">
              <b class="d-none d-lg-inline">Giỏ Hàng</b>
              <i
                class="fas fa-cart-plus"
                style="font-size: 20px;"
                aria-hidden="true"
              ></i><span class='badge badge-info' id='lblCartCount'> {{ $productQuantity  }} </span>
            </button>
            </a>
            {{-- -----------------------CARTS--------------------- --}}
        </div>
    </div>

    <!-- </div> -->
  </nav>
</div>

  <nav class="headerBot navbar navbar-dark navbar-expand-md p-0" style="background-color: #4267b2;">
    <div class="container">
      <button
        class="navbar-toggler border-0"
        type="button"
        data-toggle="collapse"
        data-target="#collapsibleNavbar"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="d-flex justify-content-end align-items-center">
        <div class="d-block d-md-none">
            {{-- -----------------------CARTS--------------------- --}}
                      <a href="/carts">
          <button class="btn text-light">
            <b class="d-none d-lg-inline">Giỏ Hàng</b>
            <i
              class="fas fa-cart-plus text-light"
              style="font-size: 20px;"
              aria-hidden="true"
            ></i><span class='bg-info badge badge-warning' id='lblCartCount'> {{ $productQuantity  }} </span>
          </button>
          </a>
          {{-- -----------------------CARTS--------------------- --}}
        </div>
        
        <div class="d-block d-md-none">
            {{-- ------------------ACCOUNT--------------------------- --}}
      @if(Auth::check())
      <a class="btn text-white" href="{{url('profile')}}">
        <i class="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
        <span class="d-none d-md-inline"> Chào {{Auth::user()->name}}</span>
      </a>
    @else        
    <a class="btn text-white" href="" data-toggle="modal" data-target="#modalLoginForm">
        <i class="user-icon fas fa-user text-white p-md-1 rounded" aria-hidden="true"></i>
        <span class="d-none d-md-inline"> Đăng nhập | Đăng ký</span>
      </a>
      @endif
    {{-- ------------------ACCOUNT--------------------------- --}}
        </div>
      </div>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav px-md-0">
          <li class="nav-item">
            <a class="nav-link text-white px-3" href="/">Trang chủ</a>
          </li>
          <li class="nav-item"> 
            <a
              class="nav-link text-white px-3"
              href="/1-about"
              >Giới thiệu</a
            >
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link text-white dropdown-toggle px-3"
              data-toggle="dropdown" 
              href="/san-pham"
              >Sản phẩm <span class="caret"></span></a
            >
            <ul class="dropdown-menu bg-info m-0">
              
              <li>
                <a href="/danh-muc/1-giai-tri.html" class="dropdown-item text-white px-3">Giải trí</a>
              </li>
              <li>
                <a href="/danh-muc/2-lam-viec.html" class="dropdown-item text-white px-3">Làm việc</a>
              </li>
              <li>
                <a href="/danh-muc/3-hoc-tap.html" class="dropdown-item text-white px-3">Học tập</a>
              </li>
              <li>
                <a href="/danh-muc/4-tien-ich-van-phong.html" class="dropdown-item text-white px-3">Tiện ích văn phòng</a>
              </li>
              <li>
                <a href="/danh-muc/5-thiet-ke.htmll" class="dropdown-item text-white px-3">Thiết kế</a>
              </li>
              <li>
                <a href="/danh-muc/6-vpn.html" class="dropdown-item text-white px-3">VPN</a>
              </li>
              <li>
                <a href="/danh-muc/7-goi-cuoc-data-4g.html" class="dropdown-item text-white px-3">Gói cước - Data 4G</a>
              </li>
            </ul>
          </li>

          <li class="nav-item">
            <a
              class="nav-link text-white px-3"
              href="/2-notification"
              >Thông báo</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link text-white px-3"
              href="/3-review"
              >Review</a
            >
          </li>
          <li class="nav-item">
            <a
              class="nav-link text-white px-3"
              href="/4-feedback"
              >Feedback</a
            >
          </li>

          <li class="nav-item">
            <a
              class="nav-link text-white px-3"
              href="/5-support"
              >Hướng dẫn mua hàng</a
            >
          </li>
          
          
        </ul>
        
      </div>
      
    </div>
  </nav>
</header>
