@extends('main')

@section('content')
    
    <div class="container">
        <div class="wrap-breadcrumb">
            <ul class="breadcrumb bg-transparent">
                <li class="breadcrumb-item"><a href="/" class="link">Trang chủ</a></li>
                <li class="breadcrumb-item active"><span>Forgot password</span></li>
            </ul>
        </div>

        <div class="row justify-content-center mb-5 ">
            <div class="col-md-8 ">
                <div class="card shadow">
                     <div class="card-header">Quên Mật Khẩu</div>
                          <div class="card-body">
                            @if (Session::has('forgot_password_message'))
                                <div class="alert alert-success">
                                    {{ Session::get('forgot_password_message') }}
                                </div>
                            @endif
                            <form action="" method="post">
                                @csrf
                                {{-- <h3 class="form-title">QUÊN MẬT KHẨU</h3> --}}
                                <div class="mb-3 form-group row">
                                    <label class="col-md-4 col-form-label text-md-right" for="reset-password">Địa Chỉ E-Mail:</label>
                                    <div class="col-md-6">
                                        <input type="email" id="reset-password" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email..." value="" name="email" autofocus/>
                                    
                                    @if($errors->has('email'))
                                        <span class="text-danger">{{$errors->first('email')}}</span>
                                    @endif
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-info  w-100 rounded-pill">Quên Mật Khẩu</button>
                                    </div>
                                </div>              
                            </form>
                        </div>
                    </div>
            </div>
        </div>
      </div>
@endsection
