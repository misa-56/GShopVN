@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    @if (Session::has('attribute_message'))
        <div class="alert alert-success">
            {{ Session::get('attribute_message') }}
        </div>
    @endif
    <form action="" method="post">
        @csrf
        <div class="card-body">
            <div class="">
                <div class="">
                    <div class="form-group">
                        <label for="menu">Tên Sản Phẩm</label>
                        <input type="text" name="name" value="{{$product_by_id->name}}" class="form-control" disabled>
                    </div>
                </div>

                

                <div class="field_wrapper">
                    <label for="">Thêm thuộc tính</label>
                    
                    <div>
                        <input class="m-1" type="text" name="term[]" value="" placeholder="Thời hạn"/>
                        <input class="m-1" type="text" name="price[]" value="" placeholder="Giá Gốc"/>
                        <input class="m-1" type="text" name="price_sale[]" value="" placeholder="Giá Giảm"/>
                        <input class="m-1" type="text" name="qty[]" value="" placeholder="Số lượng"/>
                        <a href="javascript:void(0);" class="add_button btn btn-info btn-sm" title="Add field">Thêm</a>
                    </div>
                    
                    
                </div>
                <div class="d-flex justify-content-center">
                    <button type="submit" class="btn btn-success">Confirm</button>
                </div>

                <hr>


            </div>

            {{-- <div class="row">
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
            </div> --}}

            
            
            
            
            <div class="form-group">
                <label>Danh sách thuộc tính</label>
                <table class="table table-bordered">
                    <tr>
                        <th>Thời hạn</th>
                        <th>Giá Gốc</th>
                        <th>Giá Giảm</th>
                        <th>Số Lượng</th>
                    </tr>

                    @foreach($attribute as $attr)
                    <tr>
                        <td>{{$attr->term}}</td>
                        <td>{{$attr->price}}</td>
                        <td>{{$attr->price_sale}}</td>
                        <td>{{$attr->qty}}</td>
                    </tr>
                    @endforeach

                </table>
            </div>

        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Hoàn thành</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
