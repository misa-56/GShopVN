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
                    <a class="nav-link"  href="/profile" >
                      <i class="user-icon fas fa-user border-0 mr-3" aria-hidden="true"></i>Tài khoản</a>
                    <a class="nav-link active bg-info"  href="/my-order" >
                        <i class="fa-solid fa-box mr-3"></i>Đơn hàng của tôi</a>
                    <a class="nav-link" href="{{url('profile_logout')}}">Thoát</a>
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
                      <h4>Thông tin đơn hàng</h4>
                      <hr>
                      <ul class="list-unstyled">
                          <li>Mã đơn hàng: <strong>{{ '#' . str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</strong></li>
                          <li>Ngày tạo: <strong>{{ $customer->created_at }}</strong></li>
                          <li>Phương thức thanh toán: <strong>
                            @if($customer->payment_method == 'momo')
                            <span>MoMo</span>
                            @else
                            <span>Chuyển khoản ngân hàng</span>
                            @endif
                        </strong></li>
                          <li>Trạng thái: 
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
                                <a class="btn btn-info btn-sm" href="/checkout/{{ $customer->id }}-{{ $customer->order_key }}">
                                    Thanh Toán Ngay
                                </a>
                                
                                @else
                                <strong class="text-secondary">Đã hủy</strong>
                                @endif
                            @endif
                            
                        </li>
                          
                      </ul>
                  </div>

                  <div class="carts">
                      @php $total = 0; @endphp
                      

                          @foreach($carts as $key => $cart)
                              @php
                                  $price = $cart->price * $cart->pty;
                                  $total += $price;
                              @endphp

                              <div class="row m-0 border-top">
                                <div class="row m-0  align-items-center py-3 w-100">
                                    <div class="col-md-2 col-4 px-1"><img class="img-fluid" style="width: 8rem;" src="{{ $cart->product->thumb }}"></div>
                                    <div class="col-md col-8 px-1">
                                        
                                        <div class="row m-0"><strong>{{ $cart->product->name }}</strong></div>
                                        <div class="row m-0 text-secondary">{{ $cart->product->product_code }}</div>
                                            @if($cart->account_email !== "")
                                                <small>Email/User: {{$cart->account_email}}</small>
                                                @if($cart->account_password !== "")
                                                <small><br>Password: {{$cart->account_password}}</small>
                                                @endif
                                            @endif
                                        <div class="row m-0 ">x{{ $cart->pty }}</div>
                                    </div>
                                    
                                    <div class="col-md-1 px-1 my-2 mx-3 text-right"><sup>₫</sup>{{ number_format($price, 0, '', '.') }}</div>
                                </div>
                            </div>
                             
                          @endforeach
                              <hr>
                                  <p colspan="4" class="text-right">Tổng số tiền: <span class="text-danger" style="font-size: 25px;"><sup>₫</sup>{{ number_format($total, 0, '', '.') }}</span></p>
                                  
                              {{-- 
                          </tbody>
                      </table> --}}


                    </div>
                    {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> --}}
                </div>
            </div>
        </div>
    </section>

@endsection


