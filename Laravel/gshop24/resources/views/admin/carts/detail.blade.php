@extends('admin.main')

@section('content')
    <div class="customer mt-3">
        <ul>
            <li>Tên khách hàng: <strong>{{ $customer->name }}</strong></li>
            <li>Số điện thoại: <strong>{{ $customer->phone }}</strong></li>
            <li>Email: <strong>{{ $customer->email }}</strong></li>
            <li>Ghi chú: <strong>{{ $customer->content }}</strong></li>
            <li>Phương thức thanh toán: <strong>{{ $customer->payment_method }}</strong></li>
        </ul>
    </div>

    <div class="carts">
        @php $total = 0; @endphp
        <table class="table">
            <tbody>
            <tr class="table_head">
                <th class="column-1">IMG</th>
                <th class="column-2">Product</th>
                <th class="column-3">Price</th>
                <th class="column-4">Quantity</th>
                <th class="column-5">Total</th>
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
                    <td class="column-3">{{ number_format($cart->price, 0, '', '.') }}</td>
                    <td class="column-4">{{ $cart->pty }}</td>
                    <td class="column-5">{{ number_format($price, 0, '', '.') }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="4" class="text-right">Tổng Tiền</td>
                    <td>{{ number_format($total, 0, '', '.') }}</td>
                </tr>
            </tbody>
        </table>
        <div class="p-3">
            
                
                <form action="" method="POST">
                    <h4 class="text-success"><strong>STATUS:</strong> Khách hàng đã thanh toán đơn hàng này?</h4>
                    {{-- <div class="custom-control custom-radio">
                        <input class="custom-control-input"  type="radio" id="no_paid" name="status"
                            {{ $customer->status == 0 ? ' checked=""' : '' }}
                            >
                        <label for="no_paid" class="custom-control-label">Chưa thanh toán</label>
                    </div> --}}
                    <div class="custom-control custom-radio">
                        
                        <label for="paid" class="">Đã thanh toán</label>
                        <input type="checkbox" id="paid" name="paid"
                            {{ $customer->status == 1 || $customer->status == 2  ? ' checked=""' : '' }}
                            >
                    </div>
                    

                    <div>
                            <label>Đã gửi hàng xong?</label>
                            <input type="checkbox" name="delivered"
                            {{ $customer->status == 2 ? ' checked=""' : '' }}
                            >
                            
                    </div>
                    
                    @if (Session::has('error'))
                                <div class="text-danger">
                                    {{ Session::get('error') }}
                                </div>
                            @endif
                    
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Cập Nhật Tình Trạng Đơn Hàng</button>
                    </div> 
                    @csrf
                </form>
            
        </div>
        
        
    </div>
    
    
@endsection


