{{-- <div class="row">
    @foreach ($products as $key => $product) --}}
<div class="col-6 col-md-6 col-lg-3 p-2">
    <!-- Block2 -->

    <div class="border rounded text-center p-3 bg-white h-100">
        <a class="text-decoration-none" href="/san-pham/{{ $product->id }}-{{ Str::slug($product->name, '-') }}.html">
            <img class="w-100 rounded mb-3" src="{{ $product->thumb }}" alt="{{ $product->name }}">

            <h5>
                {{ $product->name }}

            </h5>
        </a>

        <p class="text-danger">
            @if ($product->price_sale != null)
                {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
                <small class="text-muted"><s>{!! \App\Helpers\Helper::price($product->price) !!}<sup>đ</sup></s></small>
                <span class="bg-danger rounded text-light p-1">
                    @php
                        $price = \App\Helpers\Helper::price($product->price);
                        $sale = \App\Helpers\Helper::price($product->price_sale);
                        $discount = floor(((int) $sale / (int) $price) * 100) - 100;
                    @endphp
                    {{ $discount }} %
                </span>
            @else
                {!! \App\Helpers\Helper::price($product->price, $product->price_sale) !!}<sup>đ</sup>
            @endif
        </p>

    </div>
</div>
{{-- @endforeach
</div> --}}
