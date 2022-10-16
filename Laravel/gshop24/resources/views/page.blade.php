@extends('main')

@section('content')
    <!-- ------------------------------------ -->
<section id="content" class="container my-2 my-lg-3">
    <div class="mainBody">
        {{-- <div class=" col-12 my-3 my-md-5">
            <h2>{{ $title }}</h2>
            <a href="/" class="text-secondary">Trang chủ</a><span> /  {{ $title }}</span>
        </div> --}}
        <div>
            {!! $page->content !!}
        </div>
    </div>
    
  </section>
@endsection
