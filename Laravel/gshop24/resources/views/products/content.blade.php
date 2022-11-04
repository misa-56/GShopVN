@extends('main')
@section('content')
    {{-- <div class="container border border-dark">
        <div class=" m-3">
            <a href="/" class="text-decoration-none">
                Trang chủ
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
               class="text-decoration-none">
                {{ $product->menu->name }}
                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
            </a>

            <span class="stext-109 cl4">
				{{ $title }}
			</span>
        </div>
    </div> --}}

    <section class="">
        <div class="container bg-white">
            <div class=" m-4">
                <div class="row py-4">
                    <div class="col-md-6">
                        <img class="w-100 h-auto rounded" src="{{ $product->thumb }}">
                    </div>

                    <div class="col-md-6 col-lg-5">
                        <div class="mb-2">
                            <a href="/" class="text-decoration-none text-dark">
                                Trang Chủ
                                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                            </a>

                            <a href="/danh-muc/{{ $product->menu->id }}-{{ Str::slug($product->menu->name) }}.html"
                                class="text-decoration-none text-dark">
                                {{ $product->menu->name }}
                                <i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
                            </a>


                        </div>
                        <div class="p-r-50 p-t-5 p-lr-0-lg">

                            @include('admin.alert')

                            <h4 class="text-primary">
                                {{ $title }}
                            </h4>
                            <div>
                                <span class="">
                                    <i class="fas fa-store"></i>
                                    Tình trạng:
                                    @if ($product->stock == 1)
                                        <span class="text-success">Còn hàng
                                        </span>
                                    @else
                                        <span class="text-danger">Tạm hết hàng
                                        </span>
                                    @endif
                            </div>
                            <!--  -->


                            <h5 class="text-danger mt-1">
                                @if ($product->price_sale != null)
                                    {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
                                    <small class="text-muted"><del>{!! \App\Helpers\Helper::price($product->price) !!}<sup>đ</sup></del></small>
                                    <span class="bg-danger rounded text-light p-1">
                                        @php
                                            $price = $product->price;
                                            $sale = $product->price_sale;
                                            $discount = floor(((float) $sale / (float) $price) * 100) - 100;
                                        @endphp
                                        {{ $discount }} %
                                    </span>
                                @else
                                    {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
                                @endif

                            </h5>

                            {{-- <p class="stext-102 cl3 p-t-23">
                            {{ $product->description }}
                        </p> --}}
                            <hr>
                            {{-- <div>

                            <select class="custom-select"></select>
                            <option class="font-weight-bold">Chọn thời hạn</option>

                            @foreach ($product['attribute'] as $attr)
                                <button type="submit" class="btn btn-light text-danger border border-danger py-0">{{$attr->term}}</button>
                            @endforeach
                        </div> --}}



                            {{-- @if ($product->account_email == 1 || $product->account_password == 1)
                        <div class="pb-3">

                            <p class="font-weight-bold">Thông tin bổ sung&nbsp;<span class="text-danger">*</span></p>

                            

                        </div>
                        @endif --}}

                            <!--  -->

                            <div class="p-t-33">
                                <div class="flex-w flex-r-m p-b-10">
                                    <div class="d-flex">
                                        <form action="/add-cart" method="post">
                                            @csrf
                                            @if ($product->price !== null)

                                                @if ($product->term !== null)
                                                    <div data-toggle="">

                                                        <p class="font-weight-bold">Thời hạn</p>

                                                        {{-- @foreach ($product['attribute'] as $attr) --}}

                                                        {{-- <a class="btn btn-info active" href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">{{$product->term}}</a> --}}
                                                        {{-- <a class="btn btn-info" href="/san-pham/18-account-2.html">2 tháng</a> --}}
                                                        {{-- @endforeach --}}
                                                        @foreach ($collect as $coll)
                                                            <a class="btn border-info
                                            @if ($coll->id == $product->id) btn-info active @endif
                                            "
                                                                href="/san-pham/{{ $coll->id }}-{{ Str::slug($coll->name, '-') }}.html">{{ $coll->term }}</a>
                                                        @endforeach

                                                        <hr>
                                                    </div>
                                                @endif
                                                @if ($product->account_email == 1)
                                                    <div>
                                                        <p class="font-weight-bold">Nhập thông tin bổ sung &nbsp;<span
                                                                class="text-danger">*</span></p>
                                                        <div class="form-group">
                                                            <input class="form-control" type="text"
                                                                placeholder="Email/user tài khoản" id="acc_email"
                                                                name="acc_email" value="" autocomplete="off" required>
                                                        </div>

                                                        @if ($product->account_password == 1)
                                                            <div class="form-group">
                                                                <input class="form-control" type="text"
                                                                    placeholder="Password tài khoản" id="acc_password"
                                                                    name="acc_password" value="" autocomplete="off"
                                                                    required>
                                                            </div>
                                                        @endif
                                                        <hr>
                                                    </div>
                                                @endif

                                                <div class="d-flex mb-3">
                                                    <div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-minus"></i>
                                                    </div>

                                                    <input class="mr-2 border border-info rounded d-none" type="text"
                                                        style="width: 50px;" name="num_product" value="1"
                                                        min="1">

                                                    <div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
                                                        <i class="fs-16 zmdi zmdi-plus"></i>
                                                    </div>
                                                    <button type="submit" class="btn btn-light border border-info "
                                                        @if ($product->stock != 1) disabled @endif>
                                                        <i class="fas fa-shopping-cart text-info"></i>
                                                        Thêm vào Giỏ
                                                    </button>


                                                </div>




                                                <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            @endif
                                            @csrf
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!--  -->

                        </div>
                    </div>
                </div>

                <div class="bor10 m-t-50 p-t-43 p-b-40">
                    <!-- Tab01 -->
                    <div class="tab01">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item p-b-10">
                                <a class="nav-link active" data-toggle="tab" href="#description" role="tab">Mô Tả</a>
                            </li>



                            {{-- <li class="nav-item p-b-10">
                            <a class="nav-link" data-toggle="tab" href="#reviews" role="tab">Đánh Giá (1)</a>
                        </li> --}}
                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content p-t-43">
                            <!-- - -->
                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <div class="how-pos2 p-lr-15-md">
                                    <p class="stext-102 cl6">
                                        {!! $product->content !!}
                                    </p>
                                </div>
                            </div>



                            <!-- - -->
                            <div class="tab-pane fade" id="reviews" role="tabpanel">
                                <div class="row">
                                    <div class="col-sm-10 col-md-8 col-lg-6 m-lr-auto">
                                        <div class="p-b-30 m-lr-15-sm">
                                            <!-- Review -->
                                            <div class="flex-w flex-t p-b-68">
                                                <div class="wrap-pic-s size-109 bor0 of-hidden m-r-18 m-t-6">
                                                    <img src="images/avatar-01.jpg" alt="AVATAR">
                                                </div>

                                                <div class="size-207">
                                                    <div class="flex-w flex-sb-m p-b-17">
                                                        <span class="mtext-107 cl2 p-r-20">
                                                            Ariana Grande
                                                        </span>

                                                        <span class="fs-18 cl11">
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star"></i>
                                                            <i class="zmdi zmdi-star-half"></i>
                                                        </span>
                                                    </div>

                                                    <p class="stext-102 cl6">
                                                        Quod autem in homine praestantissimum atque optimum est, id
                                                        deseruit. Apud ceteros autem philosophos
                                                    </p>
                                                </div>
                                            </div>

                                            <!-- Add review -->
                                            {{-- <form class="w-full">
                                            <h5 class="mtext-108 cl2 p-b-7">
                                                Add a review
                                            </h5>

                                            <p class="stext-102 cl6">
                                                Your email address will not be published. Required fields are marked *
                                            </p>

                                            <div class="flex-w flex-m p-t-50 p-b-23">
												<span class="stext-102 cl3 m-r-16">
													Your Rating
												</span>

                                                <span class="wrap-rating fs-18 cl11 pointer">
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<i class="item-rating pointer zmdi zmdi-star-outline"></i>
													<input class="dis-none" type="number" name="rating">
												</span>
                                            </div>

                                            <div class="row p-b-25">
                                                <div class="col-12 p-b-5">
                                                    <label class="stext-102 cl3" for="review">Your review</label>
                                                    <textarea class="size-110 bor8 stext-102 cl2 p-lr-20 p-tb-10"
                                                              id="review" name="review"></textarea>
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="name">Name</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="name"
                                                           type="text" name="name">
                                                </div>

                                                <div class="col-sm-6 p-b-5">
                                                    <label class="stext-102 cl3" for="email">Email</label>
                                                    <input class="size-111 bor8 stext-102 cl2 p-lr-20" id="email"
                                                           type="text" name="email">
                                                </div>
                                            </div>

                                            <button
                                                class="flex-c-m stext-101 cl0 size-112 bg7 bor11 hov-btn3 p-lr-15 trans-04 m-b-10">
                                                Submit
                                            </button>
                                        </form> --}}

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <section class="sec-relate-product bg0 p-t-45 p-b-105">
                    <div class="container">
                        <div class="p-b-45">
                            <h4 class="text-dark">
                                Sản phẩm liên quan
                            </h4>
                        </div>
                        <div class="row">
                            @foreach ($products as $key => $product)
                                @include('products.list')
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>



        </div>

    </section>





    {{-- @if (session('alert')) {
        <script>
            alertify.set('notifier','position', 'top-right');
            alertify.success('Sản phẩm đã được thêm vào Giỏ hàng');
        </script>
        }
    @endif --}}

@endsection
