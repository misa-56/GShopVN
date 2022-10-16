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