@extends('main')

@section('content')
    
    <div class="container">
        <div class="row">
          <div class=" col-12 my-3 my-md-5">
            <h2>{{ $title }}</h2>
            <a href="/" class="text-secondary">Trang chủ</a><span> /  {{ $title }}</span>
            </div>
          @include('products.main')
          @include('products.sidebar')
        </div>
    </div>
@endsection
