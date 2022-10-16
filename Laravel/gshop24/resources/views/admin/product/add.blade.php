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
                        <input type="text" name="name" value="{{ old('name') }}" class="form-control"  placeholder="Nhập tên sản phẩm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Danh Mục</label>
                        <select class="form-control" name="menu_id">
                            @foreach($menus as $menu)
                                <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Gốc</label>
                        <input type="number" name="price" value="{{ old('price') }}"  class="form-control" >
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="menu">Giá Giảm</label>
                        <input type="number" name="price_sale" value="{{ old('price_sale') }}"  class="form-control" >
                    </div>
                </div>
            </div>

            <div class="form-group">
                <label>Mô Tả </label>
                <textarea name="description" class="form-control">{{ old('description') }}</textarea>
            </div>

            <div class="form-group">
                <label>Mô Tả Chi Tiết</label>
                <textarea name="content" id="content" class="form-control">{{ old('content') }}</textarea>
            </div>

            <div class="form-group">
                <label for="menu">Ảnh Sản Phẩm</label>
                <input type="file"  class="form-control" id="upload">
                <div id="image_show">

                </div>
                <input type="hidden" name="thumb" id="thumb">
            </div>

            <div class="form-group">
                <label>Kích Hoạt</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="active" name="active" checked="">
                    <label for="active" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_active" name="active" >
                    <label for="no_active" class="custom-control-label">Không</label>
                </div>
            </div>

            {{-- FEATURED --}}
            <div class="form-group">
                <label>Đặt làm sản phẩm nổi bật</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="featured" name="featured">
                    <label for="featured" class="custom-control-label">Có</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_featured" name="featured" checked="">
                    <label for="no_featured" class="custom-control-label">Không</label>
                </div>
            </div>
            {{-- IN STOCK --}}
            <div class="form-group">
                <label>Stock</label>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="1" type="radio" id="stock" name="stock" checked="">
                    <label for="featured" class="custom-control-label">Còn hàng</label>
                </div>
                <div class="custom-control custom-radio">
                    <input class="custom-control-input" value="0" type="radio" id="no_stock" name="stock">
                    <label for="no_stock" class="custom-control-label">Hết hàng</label>
                </div>
            </div>
            {{-- ATTRIBUTE --}}
            {{-- <div class="form-group">
                <label>Thời hạn</label>
                <div class="d-flex">
                    <div class="column1">
                        <div class="custom-control custom-checkbox">
                            <input class="" value="1h" type="checkbox" id="1h" name="1h">
                            <label for="1h" class="">1 giờ</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="1d" type="checkbox" id="1d" name="1d">
                            <label for="1d" class="">1 ngày</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="1w" type="checkbox" id="1w" name="1w">
                            <label for="1w" class="">1 tuần</label>
                        </div>
                        
                    </div>
                    <div class="column2">
                        <div class="custom-control custom-checkbox">
                            <input class="" value="1m" type="checkbox" id="1m" name="1m">
                            <label for="1m" class="">1 tháng</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="3m" type="checkbox" id="3m" name="3m">
                            <label for="3m" class="">3 tháng</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="6m" type="checkbox" id="6m" name="6m">
                            <label for="6m" class="">6 tháng</label>
                        </div>
                        
                    </div>
                    <div class="column3">
                        <div class="custom-control custom-checkbox">
                            <input class="" value="12m" type="checkbox" id="12m" name="12m">
                            <label for="12m" class="">12 tháng</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="24m" type="checkbox" id="24m" name="24m">
                            <label for="24m" class="">24 tháng</label>
                        </div>
                        <div class="custom-control custom-checkbox">
                            <input class="" value="36m" type="checkbox" id="36m" name="36m">
                            <label for="36m" class="">36 tháng</label>
                        </div>
                        
                    </div>
                </div>
                <div>
                    <input type="text" placeholder="Nhập thời hạn" value="" name="">
                    <input type="text" placeholder="Nhập giá" value="" name="">
                    <button type="sybmit" class=""></button>
                </div>
            </div> --}}
           {{-- ADDITIONAL INFORMATION --}}
           <div class="form-group">
            <label>Yêu cầu Email</label>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="1" type="radio" id="account_email" name="account_email"
                    >
                <label for="account_email" class="custom-control-label">Yêu cầu Email</label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_email" name="account_email" checked=""
                    >
                <label for="no_email" class="custom-control-label">Không yêu cầu Email</label>
            </div>
        </div>

        <div class="form-group">
            <label>Yêu cầu Password</label>
            <div class="custom-control custom-radio">
                
                <input class="custom-control-input" value="1" type="radio" id="account_password" name="account_password"
                >
                <label for="account_password" class="custom-control-label">Yêu cầu Password </label>
            </div>
            <div class="custom-control custom-radio">
                <input class="custom-control-input" value="0" type="radio" id="no_password" name="account_password" checked=""
                >
                <label for="no_password" class="custom-control-label">Không yêu cầu Password</label>
            </div>
        </div>
        <div class="form-group">
            <label>Mã hàng</label>
            <div class="">
                
                <input class="" value="" type="text" id="product_code" name="product_code" placeholder="Nhập mã hàng">
                
            </div>
            
        </div>
        <div class="form-group">
            <label>Thời hạn</label>
            <div class="">
                
                <input class="" value="" type="text" id="term" name="term" placeholder="Nhập thời hạn nếu có">
                
            </div>
            
        </div>
        

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Thêm Sản Phẩm</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
