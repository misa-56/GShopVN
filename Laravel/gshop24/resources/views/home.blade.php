@extends('main')

@section('content')
    <!-- ------------------------------------ -->
    <section id="content" class="container my-2 my-lg-3">
        <div class="mainBody">

            {{-- --------------------Danh Muc & Slide-------------------- --}}
            <div class="d-flex">
                <div class=" col-3 p-0 bg-white rounded-left d-none d-xl-block">
                    <div class="rounded-left">
                        <span class="list-group-title list-group-item text-white" style="font-size: 18px;"><b>Danh mục sản
                                phẩm</b></span>
                        <ul class="p-0 m-0" style="transform: rotate(-180deg);">
                            {{-- {!! \App\Helpers\Helper::menus($menus) !!} --}}
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0"
                                    href="/danh-muc/7-goi-cuoc-data-4g.html">
                                    <i class="fa-solid fa-signal"></i> Gói cước - Data 4G
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0" href="/danh-muc/6-vpn.html">
                                    <i class="fa-solid fa-rotate-left"></i> VPN
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0" href="/danh-muc/5-thiet-ke.html">
                                    <i class="fa-solid fa-marker"></i> Thiết Kế
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0"
                                    href="/danh-muc/4-tien-ich-van-phong.html">
                                    <i class="fa-regular fa-file-excel"></i> Tiện Ích Văn Phòng
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0" href="/danh-muc/3-hoc-tap.html">
                                    <i class="fa-sharp fa-solid fa-graduation-cap"></i> Học Tập
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0" href="/danh-muc/2-lam-viec.html">
                                    <i class="fa-solid fa-briefcase"></i> Làm Việc
                                </a>
                            </li>
                            <li class="text-decoration-none" style="list-style-type: none; transform: rotate(-180deg);">
                                <a class="list-group-item list-group-item-action border-0" href="/danh-muc/1-giai-tri.html">
                                    <i class="fa-solid fa-tv"></i> Giải Trí
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>

                @include('slider')
            </div>
            {{-- ---------------------------------------- --}}

            {{-- --------------------SP NOI BAT-------------------- --}}

            <div class="mx-auto my-3 my-lg-5">
                <div class="d-flex justify-content-between">
                    <h4>Sản phẩm nổi bật</h4>
                    <a class="text-decoration-none text-info" href="san-pham">Xem thêm</a>
                </div>
                <!-- ------------------ -->
                <div class="main">
                    <div class="slider">
                        {{-- ------------------------- --}}
                        @foreach ($featureds as $product)
                            <div class="border rounded text-center m-2 p-3 bg-white">
                                <img class="w-100 rounded mb-3" src="{{ $product->thumb }}" alt="{{ $product->name }}">

                                <h6><a class="text-decoration-none"
                                        href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">
                                        {{ $product->name }}
                                    </a>
                                </h6>
                                <p class="text-danger">
                                    @if ($product->price_sale != null)
                                        {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
                                        <small class="text-muted"><del>{!! \App\Helpers\Helper::price($product->price) !!}<sup>đ</sup></del></small>
                                        <span class="bg-danger rounded text-light p-1">
                                            @php
                                                $price = \App\Helpers\Helper::price($product->price);
                                                $sale = \App\Helpers\Helper::price($product->price_sale);
                                                $discount = floor(((float) $sale / (float) $price) * 100) - 100;
                                            @endphp
                                            {{ $discount }} %
                                        </span>
                                    @else
                                        {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
                                    @endif
                                </p>
                            </div>
                        @endforeach
                        {{-- ------------------------- --}}
                    </div>
                </div>
                <!-- ------------------- -->
            </div>
            <hr>

            {{-- --------------------GIAI TRI-------------------- --}}
            <div class="mx-auto my-3 my-lg-5">
                <div class="d-flex justify-content-between">
                    <h4>Giải trí</h4>
                    <a class="text-decoration-none text-info" href="danh-muc/1-giai-tri.html">Xem thêm</a>
                </div>
                <!-- ------------------ -->
                <div class="row">
                    @foreach ($entertains as $product)
                        @include('home.list')
                    @endforeach
                    <!-- ------------------- -->
                </div>
                <hr>
                {{-- --------------------LAM VIEC-------------------- --}}
                <div class="mx-auto my-3 my-lg-5">
                    <div class="d-flex justify-content-between">
                        <h4>Làm Việc</h4>
                        <a class="text-decoration-none text-info" href="danh-muc/2-lam-viec.html">Xem thêm</a>
                    </div>
                    <!-- ------------------ -->
                    <div class="row">
                        @foreach ($works as $product)
                            @include('home.list')
                        @endforeach
                        <!-- ------------------- -->
                    </div>
                    <hr>
                    {{-- --------------------TIEN ICH VAN PHONG-------------------- --}}
                    <div class="mx-auto my-3 my-lg-5">
                        <div class="d-flex justify-content-between">
                            <h4>Học Tập</h4>
                            <a class="text-decoration-none text-info" href="danh-muc/3-hoc-tap.html">Xem thêm</a>
                        </div>
                        <!-- ------------------ -->
                        <div class="row">
                            @foreach ($tools as $product)
                                @include('home.list')
                            @endforeach
                            <!-- ------------------- -->
                        </div>
                        <hr>
                        {{-- --------------------HOC TAP-------------------- --}}
                        <div class="mx-auto my-3 my-lg-5">
                            <div class="d-flex justify-content-between">
                                <h4>Tiện Ích Văn Phòng</h4>
                                <a class="text-decoration-none text-info" href="danh-muc/4-tien-ich.html">Xem thêm</a>
                            </div>
                            <!-- ------------------ -->
                            <div class="row">
                                @foreach ($studies as $product)
                                    @include('home.list')
                                @endforeach
                                <!-- ------------------- -->
                            </div>
                            <hr>
                            {{-- --------------------THIET KE-------------------- --}}
                            <div class="mx-auto my-3 my-lg-5">
                                <div class="d-flex justify-content-between">
                                    <h4>Thiết Kế</h4>
                                    <a class="text-decoration-none text-info" href="danh-muc/5-thiet-ke.html">Xem thêm</a>
                                </div>
                                <!-- ------------------ -->
                                <div class="row">
                                    @foreach ($designs as $product)
                                        @include('home.list')
                                    @endforeach
                                    <!-- ------------------- -->
                                </div>
                                <hr>

                                {{-- --------------------VPN-------------------- --}}
                                <div class="mx-auto my-3 my-lg-5">
                                    <div class="d-flex justify-content-between">
                                        <h4>VPN</h4>
                                        <a class="text-decoration-none text-info" href="danh-muc/6-vpn.html">Xem thêm</a>
                                    </div>
                                    <!-- ------------------ -->
                                    <div class="row">
                                        @foreach ($vpns as $product)
                                            @include('home.list')
                                        @endforeach
                                        <!-- ------------------- -->
                                    </div>
                                    <hr>
                                    {{-- --------------------DATA-------------------- --}}
                                    <div class="mx-auto my-3 my-lg-5">
                                        <div class="d-flex justify-content-between">
                                            <h4>Gói cước - Data 4G</h4>
                                            <a class="text-decoration-none text-info" href="danh-muc/7-goi-data.html">Xem
                                                thêm</a>
                                        </div>
                                        <!-- ------------------ -->
                                        <div class="row">
                                            @foreach ($data4gs as $product)
                                                @include('home.list')
                                            @endforeach
                                            <!-- ------------------- -->
                                        </div>
                                    </div>

    </section>
@endsection
