@extends('admin.main')

@section('head')
    <script src="/ckeditor/ckeditor.js"></script>
@endsection

@section('content')
    <form action="" method="POST">
        <div class="card-body">

            <div class="form-group">
                <label for="menu">Tên Page</label>
                <input type="text" name="name" value="{{ $page->name }}" class="form-control"  placeholder="{{$page->name}}" disabled>
            </div>



            <div class="form-group">
                <label>Thiết kế nội dung</label>
                <textarea name="content" id="content" class="form-control">{{ $page->content }}</textarea>
            </div>



        </div>

        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Cập Nhật Danh Mục</button>
        </div>
        @csrf
    </form>
@endsection

@section('footer')
    <script>
        CKEDITOR.replace('content');
    </script>
@endsection
