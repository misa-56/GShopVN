@extends('main')

@section('content')
<div class="container my-md-5 ">
    <form class="" action="" method="post">
        
        @if (Session::has('cart_error'))
            <div class="alert alert-danger">
                {{ Session::get('cart_error') }}
            </div>
        @endif

        @if (count($products) != 0)
            <div class="">
                
                <div class="row shadow">
                    
                    <div class="col-md-8 bg-white  rounded-left p-3">
                        {{-- <div class="m-l-25 m-r--38 m-lr-0-xl"> --}}
                            {{-- <div class="wrap-table-shopping-cart"> --}}
                                <div class="title">
                                    <div class="row">
                                        <div class="col"><h4><b>Giỏ Hàng</b></h4></div>
                                        <div class="col align-self-center text-right text-muted">{{count(Session::get('carts'))}} items</div>
                                    </div>
                                </div>    
                                @php $total = 0; @endphp

                                @foreach($products as $key => $product)
                                    @php
                                        $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                        $priceEnd = (int)$price * (int)$carts[$product->id];
                                        $total += $priceEnd;
                                    @endphp

                                <div class="row m-0 border-top">
                                    <div class="row m-0  align-items-center py-3 w-100">
                                        <div class="col-md-2 col-4 px-1"><img class="img-fluid" style="width: 8rem;" src="{{ $product->thumb }}"></div>
                                        <div class="col-md col-8 px-1">
                                            <div class="row m-0 ">{{ $product->product_code }}</div>
                                            <div class="row m-0"><p class="font-weight-bold">{{ $product->name }}</p></div>
                                            {{-- @if($account_email !== "") --}}
                                                {{-- <div> --}}
                                                @foreach(session('account') as $product_id => $details)
                                                @if($details['id'] == $product->id)
                                                    @if($details['account_email'] !== "")
                                                        <small>Email/User: {{$details['account_email']}}</small>
                                                        @if($details['account_password'] !== "")
                                                        <small><br>Password: {{$details['account_password']}}</small>
                                                        @endif
                                                    @endif
                                                
                                                @endif
                                                @endforeach
                                                {{-- </div> --}}
                                            {{-- @endif --}}
                                        </div>
                                        <div class="col-md col-12 px-1 my-2 mx-3">
                                            <div class="handle-counter" id="handleCounter">
                                                    
                                                <input class="font-weight-bold" type="number" min="1"
                                                name="num_product[{{ $product->id }}]" value="{{ $carts[$product->id] }}">
                                                
                                            </div>
                                        </div>
                                        <div class="col px-1 text-danger my-2 mx-3"><sup>₫</sup>{{ number_format($priceEnd, 0, '', '.') }}<span class="close "><a class=" text-decoration-none text-dark" href="/carts/delete/{{ $product->id }}">&#10005;</a></span></div>
                                    </div>
                                </div>
                                @endforeach

                                
                            

                            <div class="d-flex justify-content-between border-top pt-4">
                               
                                <div class="back-to-shop mt-4"><a class="text-decoration-none text-secondary" href="/san-pham">&leftarrow;Trở lại shop</a></div>

                                <button type="submit" formaction="/update-cart"
                                    class="btn btn-info">Cập nhật Giỏ hàng
                                </button>
                                @csrf
                            </div>
                        
                    </div>

                    <div class="col-md-4 border rounded-right p-3" style="background-color: #ddd;">
                        <div class="">
                            <h4 class="mtext-109 cl2 p-b-30">
                                Tổng đơn hàng
                            </h4>
                            <hr>

                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <span class="mtext-101 cl2">
                                        Tạm tính:
                                    </span>
                                </div>
                                

                                <div class="size-209 p-t-1">
                                    <span class="mtext-110 cl2">
                                        <sup>₫</sup>{{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>
                            <hr>
                            <div class="d-flex justify-content-between mb-3">
                               
                                <div class="">
                                    <span class="font-weight-bold">
                                        Tổng tiền:
                                    </span>
                                </div>

                                <div class="size-209 p-t-1">
                                    <span class="font-weight-bold">
                                        <sup>₫</sup>{{ number_format($total, 0, '', '.') }}
                                    </span>
                                </div>
                            </div>
                            
                            <div class="flex-w flex-t bor12 p-t-15 p-b-30">

                                <div class="size-100 p-r-18 p-r-0-sm w-full-ssm">

                                    <div class="p-t-15">
                                        <h5 class="stext-112 cl8">
                                            Thông tin khách hàng
                                        </h5>
                                        @if(Auth::check())
                                        
                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="name" value="{{ Auth::user()->name }}" placeholder="Tên Khách Hàng">
                                            </div>
    
                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="phone" value="{{ Auth::user()->phone }}" placeholder="Số Điện Thoại">
                                            </div>
    
                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="email" value="{{ Auth::user()->email }}" placeholder="Email Liên Hệ">
                                            </div>
    
                                            <div class="m-1">
                                                <textarea style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" w-100" name="content" placeholder="Ghi chú đơn hàng"></textarea>
                                            </div>

                                        
                                        @else

                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="name" placeholder="Tên Khách Hàng" >
                                            </div>

                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="phone" placeholder="Số Điện Thoại" >
                                            </div>

                                            <div class="m-1">
                                                <input style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" " type="text" name="email" placeholder="Email Liên Hệ">
                                            </div>

                                            <div class="m-1">
                                                <textarea style="border: 1px solid rgba(0, 0, 0, 0.137); background-color: rgb(247, 247, 247);" class=" w-100" name="content" placeholder="Ghi chú đơn hàng"></textarea>
                                            </div>
                                    
                                        @endif
                                        <div>
                                            <input type="radio" name="payment_method" value="banking" id="banking" checked>
                                            <label for="banking">Thanh toán chuyển khoản</label>
                                        </div>
                                        <div>
                                            <input type="radio" name="payment_method" value="momo" id="momo">
                                            <label for="momo">Thanh toán MoMo</label>
                                            <img class="mx-2" src="/template/images/momo.png" alt="Momo" width="25px" height="25px"/>
                                            
                                        </div>

                                    </div>
                                </div>
                            </div>

                            {{-- <a href="/momo_payment">
                                <button class="btn btn-info w-100 my-1" style="background-color: #ae2070;">
                                    <img class="mx-2" src="/template/images/momo.svg" alt="Momo" width="25px" height="25px"/>
                                Thanh toán MoMo
                                </button>
                            </a> --}}

                            
                            <button class="btn btn-info w-100 my-1 text-white">
                                {{-- <img class="mx-2" src="/template/images/momo.svg" alt="Momo" width="25px" height="25px"/> --}}
                                Tiến hành thanh toán
                            </button>
                        </div>
                    </div>
                </div>
            </div>
    </form>

   

    @else
        <div class="text-center m-5 pb-5">
            <h6 class="p-3">Không có sản phẩm nào trong giỏ hàng</h6>
            <a class="" href="/san-pham">
                <button class="btn btn-info " type="button">
                    TỚI CỬA HÀNG
                </button>
            </a>
        </div>
        
    @endif
</div>
    

    
    
@endsection
