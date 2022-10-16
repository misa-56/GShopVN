@extends('main')
@section('content')
<div class="container">
    <div class="row">
      <div class=" col-12 my-3 my-md-5">
        <h2>{{ $title }}</h2>
        <a href="/" class="text-secondary">Trang chủ</a><span> /  {{ $title }}</span>
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
          </div>
          {{-- bottom --}}
          @include('products.bottom')
        </div>
      </div>

        @include('products.sidebar')
    </div>
</div>

@endsection