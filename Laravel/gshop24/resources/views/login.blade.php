<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="container">



                <div class="modal-header text-center">

                    <ul class="nav nav-tabs">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#home">Đăng nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link dangky" data-toggle="tab" href="#menu1">Đăng ký</a>
                        </li>
                    </ul>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="tab-content">
                    <div id="home" class="modal-body mx-md-3 tab-pane active">
                        {{-- @include('admin.alert') --}}
                        @if (session('error'))
                            <p class="text-danger"> {{ session('error') }} </p>
                        @endif
                        @if (session('login-message'))
                            <p class="text-danger"> {{ session('login-message') }} </p>
                        @endif

                        <form id="login" action="{{ url('/login') }}" method="post">
                            <div class="form-group {{ $errors->account->has('login-email') ? ' has-error' : '' }}">
                                <input type="text" name="login-email" class="form-control" placeholder="Nhập Email"
                                    value="" />
                                @if ($errors->account->has('login-email'))
                                    <span class="text-danger">{{ $errors->account->first('login-email') }}</span>
                                @endif
                            </div>
                            <div class="form-group {{ $errors->account->has('login-password') ? ' has-error' : '' }}">
                                <input type="password" name="login-password" class="form-control" placeholder="Mật Khẩu"
                                    value="" />
                                @if ($errors->account->has('login-password'))
                                    <span class="text-danger">{{ $errors->account->first('login-password') }}</span>
                                @endif
                            </div>
                            <div class="d-flex justify-content-between">
                                <div class="icheck-primary">
                                    <input type="checkbox" name="remember" id="remember">
                                    <label for="remember">
                                        Ghi nhớ mật khẩu
                                    </label>
                                </div>
                                <div class="form-group">
                                    <a href="{{ url('/quen-mat-khau') }}" class="ForgetPwd">Quên Mật Khẩu?</a>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit btn btn-info rounded-pill w-100"
                                    value="Đăng Nhập" />
                            </div>
                            <p class="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2">
                                hoặc Đăng nhập với:</p>
                            <div class="row my-3 d-flex justify-content-center">
                                <!--Facebook-->
                                <a href="{{ route('facebook.login') }}"
                                    class="btn btn-white btn-rounded mr-3 z-depth-1a waves-effect waves-light shadow rounded-pill w-25"><i
                                        class="text-info fab fa-facebook-f text-center"></i></a>
                                <!--Google +-->
                                <a href="{{ route('google.login') }}"
                                    class="btn btn-white btn-rounded z-depth-1a waves-effect waves-light shadow rounded-pill w-25"><i
                                        class="text-info fab fa-google"></i></a>
                            </div>
                            @csrf
                        </form>

                    </div>

                    {{-- Register --}}
                    <div id="menu1" class="modal-body mx-md-3 tab-pane fade "><br>
                        @if (session('message'))
                            <p class="text-danger"> {{ session('message') }} </p>
                        @endif
                        <form id="register" action="{{ url('/register') }}" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Họ & Tên" value=""
                                    name="name" />
                                @if ($errors->account->has('name'))
                                    <span class="text-danger">{{ $errors->account->first('name') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Số Điện Thoại" value=""
                                    name="phone" />
                                @if ($errors->account->has('phone'))
                                    <span class="text-danger">{{ $errors->account->first('phone') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Nhập Email" value=""
                                    name="email" />
                                @if ($errors->account->has('email'))
                                    <span class="text-danger">{{ $errors->account->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Mật Khẩu" value=""
                                    name="password" autocomplete="off" />
                                @if ($errors->account->has('password'))
                                    <span class="text-danger">{{ $errors->account->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group">
                                <input type="submit" class="btnSubmit btn rounded-pill btn-info w-100"
                                    value="Tạo Tài Khoản" />
                            </div>
                            @csrf
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
