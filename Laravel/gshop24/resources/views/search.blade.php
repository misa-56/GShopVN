@php
      $searchCount = count($products);                 
@endphp
@extends('main')
@section('content')
<div class="container">
    <div class="row">
      <div class=" col-12 my-3 my-md-5">
        <h2>Kết quả tìm kiếm: tìm thấy {{$searchCount}} sản phẩm</h2>
        <a href="/" class="text-secondary">Trang chủ</a><span> / <a href="/san-pham" class="text-secondary">Shop</a> / {{ $title }}</span>
      </div>
      <div class="col-md-8 order-md-2 col-lg-9">
        <div class="container-fluid">
            {{-- sort --}}
          @include('products.sort')
          {{-- middle --}}
          <div class="row">
            @foreach($products as $key => $product)
              @include('products.list')
            @endforeach
            @if($searchCount == 0)
                <p>Không tìm thấy sản phẩm bạn muốn, xin hãy thử từ khóa tìm kiếm khác</p>
            @endif
          </div>
          {{-- bottom --}}
          {{-- @include('products.bottom') --}}
        </div>
      </div>

        @include('products.sidebar')
    </div>
</div>

@endsection