{{-- <div>
    <p>Mã đơn hàng: {{ '#' . str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</p>
    <p>Ngày tạo: {{ $customer->created_at }}</p>
    <p>Tên sản phẩm: </p>
    <p>Số tiền: </p>
    <p>Lưu ý: {{ $customer->content }}</p>
</div> --}}

@extends('main')

@section('content')
@php $total1 = 0; @endphp
@foreach($carts as $key => $cart)
    @php
        $price = $cart->price * $cart->pty;
        $total1 += $price;
    @endphp
@endforeach
    <section class="container">
        <div class="row my-5">
            
            {{---------- Payment Method ----------}}
            @if($customer->payment_method == 'momo')
            {{-- MoMo --}}
            <div class="col-12 text-center col-md-8">
                
                <table class="table table-bordered table-info">
                    <thead>
                      <tr>
                        <th  colspan="2">Thông tin chuyển khoản</th>
                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <td>Người nhận</td>
                        <td>Hoàng Thị Triều Giang</td>
                      </tr>

                      <tr>
                        <td>Số điện thoại</td>
                        <td>0965324305</td>
                      </tr>

                      <tr>
                        <td>Số tiền</td>
                        <td class="text-danger"><sup>₫</sup><strong>{{ number_format($total1, 0, '', '.') }}</strong></td>
                      </tr>

                      <tr>
                        <td>Nội dung chuyển khoản</td>
                        <td><strong class="text-danger">{{ str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</strong></td>
                      </tr>
                      
                    </tbody>
                  </table>

                
                
                <h4 class="text-primary">Quét mã dưới đây để thanh toán</h4>
                <img 
                class="rounded m-3" 
                src="/template/images/checkout/momo_qr.png" 
                alt="momo_checkout" 
                width="300px"
                height="300px">

                
                <p id="footer_scan">
                    <i class="fa-solid fa-qrcode"></i>
                    Sử dụng App <b>MoMo</b> để quét mã.
                    <br>
                    
                    <img width="38" class="" src="/template/images/loading.gif" alt="loading"> 
                    <br><button class="btn btn-info" onclick="paid()">Tôi đã thanh toán xong</button>
                    <p id="paid" class="bg-warning font-weight-bold"></p>
                    <br><strong>Nếu chưa thanh toán, đơn hàng sẽ tự động hủy sau 24h</strong>
                </p>

                
                
            </div>
            @else
            {{-- Banking --}}
            <div class="col-12 text-center col-md-8">

                <table class="table table-bordered table-info">
                    <thead>
                      <tr>
                        <th  colspan="2">Thông tin chuyển khoản</th>
                      </tr>
                    </thead>
                    <tbody>

                      <tr>
                        <td>Tên tài khoản</td>
                        <td>HOANG THI TRIEU GIANG</td>
                      </tr>
                      <tr>
                        <td>Số tài khoản</td>
                        <td>3070199747777</td>
                      </tr>
                      <tr>
                        <td>Ngân hàng</td>
                        <td>Quân Đội MB-Bank</td>
                      </tr>
                      <tr>
                        <td>Số tiền</td>
                        <td class="text-danger"><sup>₫</sup><strong>{{ number_format($total1, 0, '', '.') }}</strong></td>
                      </tr>
                      <tr>
                        <td>Nội dung chuyển khoản</td>
                        <td><strong class="text-danger">{{ str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</strong></td>
                      </tr>

                    </tbody>
                  </table>

                <h4 class="text-primary">
                    <i class="fa-solid fa-qrcode"></i>
                    Mã QR chuyển khoản</h4>
                <img 
                class="rounded m-3" 
                src="/template/images/checkout/banking_qr.jpg" 
                alt="momo_checkout" 
                width="300px"
                height="300px">

                <p id="footer_scan">

                    <img width="38" class="" src="/template/images/loading.gif" alt="loading"> 
                    <br><button class="btn btn-info" onclick="paid()">Tôi đã thanh toán xong</button>
                    <p id="paid" class="bg-warning font-weight-bold"></p>
                    <br><strong>Nếu chưa thanh toán, đơn hàng sẽ tự động hủy sau 24h</strong>
                </p>

            </div>
            @endif

            {{---------- Payment Method ----------}}

            
            
            <div class="col-12 col-md-4 ">
                
                    
                <div class="p-3 border rounded bg-white" >
                    <p class="text-success"><strong>Đơn hàng đã được tiếp nhận</strong></p>
                    
                    <hr>
                    <ul class="list-unstyled m-0">
                        <li>Mã đơn hàng: <strong>{{str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</strong></li>
                        <li>Ngày tạo: {{ $customer->created_at }}<strong></strong></li>
                        <li>Tổng cộng: <sup>₫</sup><strong>{{ number_format($total1, 0, '', '.') }}</strong></li>
                        <li>Phương thức thanh toán: 
                            @if($customer->payment_method == 'momo')
                            <span>MoMo</span>
                            @else
                            <span>Chuyển khoản ngân hàng</span>
                            @endif</li>
                        
                    </ul>
                    
                    
                </div>
                <div class="bg-white p-3 my-3 border rounded">
                    <p>{{$customer->name}}</p>
                    <p class="text-secondary">{{$customer->email}}</p>
                    <p class="text-secondary">{{$customer->phone}}</p>
                </div>
            </div>

            
        </div>
        
        

      <div class="carts">
        <h3 class="">Chi tiết đơn hàng</h3>
          @php $total = 0; @endphp
          <table class="table">
              <tbody>
              <tr class="table_head">
                  <th class="column-1"></th>
                  <th class="column-2">Sản phẩm</th>
                  <th class="column-3">Giá</th>
                  <th class="column-4">Số lượng</th>
                  <th class="column-5">Tổng</th>
              </tr>

              @foreach($carts as $key => $cart)
                  @php
                      $price = $cart->price * $cart->pty;
                      $total += $price;
                  @endphp
                  <tr>
                      <td class="column-1">
                          <div class="how-itemcart1">
                              <img src="{{ $cart->product->thumb }}" alt="IMG" style="width: 100px">
                          </div>
                      </td>
                      <td class="column-2"><p>{{ $cart->product->name }}</p>
                        @if($cart->account_email !== "")
                            <small>Email/User: {{$cart->account_email}}</small>
                            @if($cart->account_password !== "")
                            <small><br>Password: {{$cart->account_password}}</small>
                            @endif
                        @endif
                      
                      </td>
                      <td class="column-3"><sup>₫</sup>{{ number_format($cart->price, 0, '', '.') }}</td>
                      <td class="column-4">{{ $cart->pty }}</td>
                      <td class="column-5"><sup>₫</sup>{{ number_format($price, 0, '', '.') }}</td>
                  </tr>
                  <tr>
                    
                  </tr>
              @endforeach
              <tr>
                <td colspan="5">
                    Ghi chú đơn hàng: {{ $customer->content }}
                </td>
              </tr>

                  <tr>
                      <td colspan="4" class="text-right">Tổng Tiền</td>
                      <td class="text-danger"><sup>₫</sup>{{ number_format($total, 0, '', '.') }}</td>
                  </tr>
              </tbody>
          </table>
        </div>
    </section>

@endsection


<script>
  function paid() {
    document.getElementById("paid").innerHTML = "Đã ghi nhận đơn hàng, GShop sẽ phản hồi sớm nhất!";
  }
  </script>