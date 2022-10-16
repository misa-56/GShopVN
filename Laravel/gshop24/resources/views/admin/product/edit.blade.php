@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input type="text" name="name" value="{{ $product->name }}" class="form-control"
                               placeholder="Nhập tên sản phẩm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}" {{ $product->menu_id == $menu->id ? 'selected' : '' }}>
                                    {{ $menu->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ $product->price }}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{ $product->price_sale }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ $product->description }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control">{{ $product->content }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">
                    <a href="{{ $product->thumb }}" target="_blank">
                        <img src="{{ $product->thumb }}" width="100px">
                    </a>
                </div>
                <input type="hidden" name="thumb" value="{{ $product->thumb }}" id="thumb">
            </div>

            {{-- ACTIVE --}}
            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active"
                        {{ $product->active == 1 ? ' checked=""' : '' }}>
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active"
                        {{ $product->active == 0 ? ' checked=""' : '' }}>
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

            {{-- FEATURED --}}
            <div class="form-group">
                <label>Đặt làm sản phẩm nổi bật</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="featured" name="featured"
                        {{ $product->featured == 1 ? ' checked=""' : '' }}>
                    <label for="featured" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_featured" name="featured"
                        {{ $product->featured == 0 ? ' checked=""' : '' }}>
                    <label for="no_featured" class="custom-control-label">Không</label>
                </div>
            </div>

            {{-- IN STOCK --}}
            <div class="form-group">
                <label>Stock</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="stock" name="stock"
                        {{ $product->stock == 1 ? ' checked=""' : '' }}>
                    <label for="stock" class="custom-control-label">Còn hàng</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_stock" name="stock"
                        {{ $product->stock == 0 ? ' checked=""' : '' }}>
                    <label for="no_stock" class="custom-control-label">Hết hàng</label>
                </div>
            </div>
            
            {{-- ADDITIONAL INFORMATION --}}
            <div class="form-group">
                <label>Yêu cầu Email</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="account_email" name="account_email"
                        {{ $product->account_email == 1 ? ' checked=""' : '' }}>
                    <label for="account_email" class="custom-control-label">Yêu cầu Email</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_email" name="account_email"
                        {{ $product->account_email == 0 ? ' checked=""' : '' }}>
                    <label for="no_email" class="custom-control-label">Không yêu cầu Email</label>
                </div>
            </div>
            <div class="form-group">
                <label>Yêu cầu Password</label>
                <div class="custom-control custom-radio">
                    
                    <input class="custom-control-input" value="1" type="radio" id="account_password" name="account_password"
                    {{ $product->account_password == 1 ? ' checked=""' : '' }}>
                    <label for="account_password" class="custom-control-label">Yêu cầu Password </label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_password" name="account_password"
                    {{ $product->account_password == 0 ? ' checked=""' : '' }}
                        >
                    <label for="no_password" class="custom-control-label">Không yêu cầu Password</label>
                </div>
            </div>

            <div class="form-group">
                <label>Mã hàng</label>
                <div class="">
                    
                    <input class="" value="{{$product->product_code}}" type="text" id="product_code" name="product_code" placeholder="Nhập mã hàng">
                    
                </div>
                
            </div>
            <div class="form-group">
                <label>Thời hạn</label>
                <div class="">
                    
                    <input class="" value="{{$product->term}}" type="text" id="term" name="term" placeholder="Nhập thời hạn nếu có">
                    
                </div>
                
            </div>



        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Sản Phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
