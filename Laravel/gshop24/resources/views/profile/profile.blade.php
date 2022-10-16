@extends('main')

@section('content')
    {{-- @if(session('message'))
    <span class="alern alern-danger">
        <strong>{{session('message')}}</strong>
    </span>

    @endif --}}
    <section class="container">
        <div class="row my-3">
            <div class="col-12 col-md-3">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link active bg-info"  href="/profile" >
                      <i class="user-icon fas fa-user border-0 mr-3" aria-hidden="true"></i>Tài khoản</a>
                    <a class="nav-link text-info"  href="/my-order" >
                      <i class="fa-solid fa-box mr-3"></i>Đơn hàng của tôi</a>
                    <a class="nav-link text-info" href="{{url('profile_logout')}}">Thoát</a>
                </div>
            </div>
            <div class="col-12 col-md-9">
                <div class="tab-content bg-white p-4" id="v-pills-tabContent">
                    <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                        <h3>Thông tin cá nhân</h3>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                              {{ Session::get('success') }}
                            </div>
                        @endif
                        @if (Session::has('ok'))
                            <div class="alert alert-success">
                              {{ Session::get('ok') }}
                            </div>
                        @endif
                        
                      <form class="" action="{{URL::to('/profile/update')}}" method="post">
                            @csrf
                            {{-- {{method_field('PATCH')}} --}}
                            <div class="form-group">
                              <label for="email">Địa chỉ email</label>
                              <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                              @if($errors->has('email'))
                                <span class="text-danger">{{$errors->first('email')}}</span>
                              @endif
                            </div>

                            <div class="form-group">
                                <label for="name">Tên hiển thị&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                                @if($errors->has('name'))
                                  <span class="text-danger">{{$errors->first('name')}}</span>
                                @endif
                              </div>
   
                              <div class="form-group">
                                <label for="phone">Số điện thoại&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="phone" name="phone" value="{{$user->phone}}">
                                @if($errors->has('phone'))
                                    <span class="text-danger">{{$errors->first('phone')}}</span>
                                @endif
                              </div>
                        
                              <div class="form-group">
                                <legend>Thay đổi mật khẩu</legend>
                                @if (Session::has('warning'))
                                    <div class="alert alert-danger">
                                      {{ Session::get('warning') }}
                                    </div>
                                @endif
                                
                                <label for="password_current">Mật khẩu hiện tại</label>
                                <input type="password" class="form-control" id="name" name="old_password">
                                @if($errors->has('old_password'))
                                  <span class="text-danger">{{$errors->first('old_password')}}</span>
                                @endif
                                
                              </div>

                              <div class="form-group">
                                <label for="password_1">Mật khẩu mới</label>
                                <input type="password" class="form-control" id="password_1" name="password_1" autocomplete="off">
                                @if($errors->has('password_1'))
                                  <span class="text-danger">{{$errors->first('password_1')}}</span>
                                @endif
                              </div>

                              <div class="form-group">
                                <label for="password_2">Xác nhận mật khẩu mới</label>
                                <input type="password" class="form-control" id=
                                "password_2" name="password_2" autocomplete="off">
                                @if($errors->has('password_2'))
                                  <span class="text-danger">{{$errors->first('password_2')}}</span>
                                @endif
                              </div>

                            <p>
                                <input type="hidden" id="save-account-details-nonce" name="save-account-details-nonce" value="8c0a4033a7"><input type="hidden" name="_wp_http_referer" value="/my-account/edit-account/">		
                                <button type="submit" class="btn bg-info text-white" name="save_account_details" value="Lưu">Lưu</button>
                                <input type="hidden" name="action" value="save_account_details">
                            </p>
                        
                        </form>
                    </div>
                    <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                      
                    </div>
                    {{-- <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">...</div> --}}
                </div>
            </div>
        </div>
    </section>

@endsection