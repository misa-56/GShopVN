@extends('admin.main')

@section('content')
    <table class="table">
        <thead>
        <tr>
            <th style="width: 50px">ID</th>
            <th>Tên Khách Hàng</th>
            <th>Số Điện Thoại</th>
            <th>Email</th>
            <th>Ngày Đặt Hàng</th>
            <th>Tình trạng</th>
            <th style="width: 100px">&nbsp;</th>
        </tr>
        </thead>
        <tbody>
        @foreach($customers as $key => $customer)
            <tr>
                <td>{{ '#' . str_pad($customer->id , 5, "0", STR_PAD_LEFT)}}</td>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->email }}</td>
                <td>{{ $customer->created_at }}</td>
                <td>
                    @php
                    $dt = $customer->created_at->addDay();
                    $now = Carbon\Carbon::now();
                    @endphp
                    @if( $customer->status  == 1)
                        <p class="text-primary">Đã thanh toán</p>
                    @elseif( $customer->status  == 2)
                        <p class="text-success">Đã giao</p>
                    @else
                        @if($dt >= $now)
                        <p class="text-danger">Chờ thanh toán</p>
                        @else
                        <p class="text-secondary">Đã hủy</p>
                        @endif
                    @endif
                </td>
                <td>
                    <a class="btn btn-primary btn-sm" href="/admin/customers/view/{{ $customer->id }}">
                        <i class="fas fa-eye"></i>
                    </a>
                    <a href="#" class="btn btn-danger btn-sm"
                       onclick="removeRow({{ $customer->id }}, '/admin/customers/destroy')">
                        <i class="fas fa-trash"></i>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="card-footer clearfix">
        {!! $customers->links() !!}
    </div>
    
@endsection


