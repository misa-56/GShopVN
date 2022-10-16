@extends('main')

@section('content')
    {{-- @if(session('message'))
    <span class="alern alern-danger">
        <strong>{{session('message')}}</strong>
    </span>

    @endif --}}
    <section class="container">
        <div class="row my-3">
            <div class="col-12 col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link text-info"  href="/profile" >
                      <i class="user-icon fas fa-user border-0 mr-3" aria-hidden="true"></i>Tài khoản</a>
                      <a class="nav-link active  bg-info"  href="/my-order" >
                        <i class="fa-solid fa-box mr-3"></i>Đơn hàng của tôi</a>
                    <a class="nav-link text-info" href="{{url('profile_logout')}}">Thoát</a>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="tab-content bg-white p-4" id="v-pills-tabContent">
                    <div class="tab-pane fade" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3>Thông tin cá nhân</h3>
                      <form class="" action="{{url('/profile')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="name">Tên hiển thị&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" value="{{Auth::user()->name}}">
                                
                              </div>

                              <div class="form-group">
                                <label for="email">Địa chỉ email&nbsp;<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}">
                              </div>

                              <div class="form-group">
                                <label for="phone">Số điện thoại&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" value="{{Auth::user()->phone}}">
                              </div>
                        
                              <div class="form-group">
                                <legend>Thay đổi mật khẩu</legend>
                                <label for="password_current">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" id="name">
                              </div>

                              <div class="form-group">
                                <label for="password_1">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="password_1"  autocomplete="off">
                              </div>

                              <div class="form-group">
                                <label for="password_1">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id=
                                "password_1"  autocomplete="off">
                              </div>

                            <p>
                                <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="8c0a4033a7"><input type="hidden" name="_wp_http_referer" value="/my-account/edit-account/">		
                                <button type="submit" class="btn bg-info text-white" name="save_account_details" value="Lưu">Lưu</button>
                                <input type="hidden" name="action" value="save_account_details">
                            </p>
                        
                        </form>
                    </div>
                    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      <h3>Đơn hàng của tôi</h3>
                      <table class="table-shopping-cart table ">
                        <tbody>
                        <tr class="table_head ">
                            <th class="column-1 text-center">Mã đơn hàng</th>
                            <th class="column-2  text-center">Ngày đặt hàng</th>
                            {{-- <th class="column-4  text-center">Thành tiền</th> --}}
                            <th class="column-3  text-center">Tình trạng</th>
                            <th class="column-5 text-center">&nbsp;</th>
                        </tr>

                        {{-- @foreach($products as $key => $product)
                            @php
                                $price = $product->price_sale != 0 ? $product->price_sale : $product->price;
                                $priceEnd = $price * $carts[$product->id];
                                $total += $priceEnd;
                            @endphp --}}
                            
                            @foreach($customer_orders as $key => $customer)
                              @php $total = 0; @endphp

                              @foreach($carts as $key => $cart)
                              @php
                                  $price = $cart->price * $cart->pty;
                                  $total += $price;
                              @endphp
                              @endforeach
                              
                            <tr class="table_row border-bottom">
                              
                                <td class="column-1 text-center">
                                    <div class="how-itemcart1">
                                      <a class="text-info text-decoration-none" href="/my-order/view/{{ $customer->id }}">
                                      {{ '#' . str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}
                                      </a>
                                    </div>
                                </td>
                                
                                <td class="column-2 text-center">{{ $customer->created_at }}
                                
                                </td>
                                
                                {{-- <td class="column-4 text-danger text-center"><sup>₫</sup>{{ number_format($total, 0, '', '.') }} --}}
                                  
                                </td>
                                <td class="column-3 text-center">
                                  <div class="" id="">
                                    @php
                                    $dt = $customer->created_at->addDay();
                                    $now = Carbon\Carbon::now();
                                    @endphp
                                    @if( $customer->status  == 1)
                                        <strong class="text-primary">Đang xử lý</strong>
                                    @elseif( $customer->status  == 2)
                                        <strong class="text-success">Đã giao</strong>
                                    @else
                                        @if($dt >= $now)
                                        <strong class="text-danger">Chờ thanh toán</strong>
                                        @else
                                        <strong class="text-secondary">Đã hủy</strong>
                                        @endif
                                    @endif
                                    
                                      
                                  </div>
                                </td>
                                <td class="column-5 text-center">
                                  <a href="/my-order/view/{{ $customer->id }}">Chi tiết</a>
                                </td>
                            </tr>
                            @endforeach
                        {{-- @endforeach --}}

                        </tbody>
                      </table>
                      
                      
                        
                    
                    </div>
                    
                    {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> --}}
                </div>
                <div class="card-footer clearfix border rounded">
                  {!! $customer_orders->links() !!}
              </div>
                
            </div>
        </div>
    </section>

@endsection