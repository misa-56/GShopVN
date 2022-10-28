import { Modal, Button, Tabs, Tab } from 'react-bootstrap';
import React, { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faFacebookF, faGoogle } from '@fortawesome/free-brands-svg-icons';
import { faUser } from '@fortawesome/free-solid-svg-icons';
import './Login.css';
import request from '../../../../utils/request';

function Login() {
    const [show, setShow] = useState(false);
    const handleClose = () => setShow(false);
    const handleShow = () => setShow(true);

    const [email, setEmail] = useState();
    const [password, setPassword] = useState();

    const submit = () => {
        request.post('/login', { email: email, password: password }).then((res) => {
            console.log(res.data);
        });
    };
    // console.warn(email, password);

    return (
        <>
            <Button variant="none" onClick={handleShow} className="btn text-white d-flex align-items-center">
                <FontAwesomeIcon icon={faUser} className="user-icon p-md-1 rounded" aria-hidden="true" />
                <span className="d-none d-md-inline">&nbsp;Đăng nhập | Đăng ký</span>
            </Button>

            <Modal show={show} onHide={handleClose}>
                <Modal.Body className="pt-0 mt-0">
                    <div className="d-flex justify-content-end">
                        <Button variant="" className="pb-0" onClick={handleClose}>
                            <span aria-hidden="true" className="font-weight-bold">
                                &times;
                            </span>
                        </Button>
                    </div>
                    <Tabs defaultActiveKey="signIn" className="mb-3 mx-3">
                        <Tab eventKey="signIn" title="Đăng nhập" className="text-info">
                            {/* {{-- @include('admin.alert') --}}
                    @if(session('error'))
                        <p className="text-danger"> {{ session('error')}} </p>
                    @endif
                    @if(session('login-message'))
                        <p className="text-danger"> {{ session('login-message')}} </p>
                    @endif */}

                            <div className="m-4">
                                {/* <form id="login" action="{{url('/login')}}" method="post"> */}
                                <div className="form-group {{ $errors->account->has('login-email') ? ' has-error' : '' }}">
                                    <input
                                        type="text"
                                        name="email"
                                        onChange={(e) => setEmail(e.target.value)}
                                        className="form-control"
                                        placeholder="Nhập Email"
                                        // value=""
                                    />
                                    {/* @if($errors->account->has('login-email'))
                                    <span className="text-danger">{{$errors->account->first('login-email')}}</span>
                                @endif */}
                                </div>
                                <div className="form-group {{ $errors->account->has('login-password') ? ' has-error' : '' }}">
                                    <input
                                        type="password"
                                        name="password"
                                        onChange={(e) => setPassword(e.target.value)}
                                        className="form-control"
                                        placeholder="Mật Khẩu"
                                        // value=""
                                    />
                                    {/* @if($errors->account->has('login-password'))
                                    <span className="text-danger">{{$errors->account->first('login-password')}}</span>
                                @endif */}
                                </div>
                                <div className="d-flex justify-content-between">
                                    <div className="icheck-primary">
                                        <input type="checkbox" name="remember" id="remember" />
                                        <label for="remember">&nbsp;Ghi nhớ mật khẩu</label>
                                    </div>
                                    <div className="form-group">
                                        <a href="{{url('/quen-mat-khau')}}" className="ForgetPwd">
                                            Quên Mật Khẩu?
                                        </a>
                                    </div>
                                </div>
                                <div className="form-group">
                                    <Button
                                        onClick={submit}
                                        type="button"
                                        className="btnSubmit btn btn-info rounded-pill w-100"
                                        // value="Đăng Nhập"
                                    >
                                        Dang Nhap
                                    </Button>
                                </div>
                                <p className="font-small dark-grey-text text-right d-flex justify-content-center mb-3 pt-2">
                                    {' '}
                                    hoặc Đăng nhập với:
                                </p>
                                <div className="row my-3 d-flex justify-content-center">
                                    {/* <!--Facebook--> */}
                                    <a
                                        href="{{ route('facebook.login') }}"
                                        className="btn btn-white text-info  btn-rounded mr-3 z-depth-1a waves-effect waves-light shadow rounded-pill w-25"
                                    >
                                        <i className=" fab fa-facebook-f text-center"></i>
                                        <FontAwesomeIcon icon={faFacebookF} />
                                    </a>
                                    {/* <!--Google +--> */}
                                    <a
                                        href="{{ route('google.login') }}"
                                        className="btn btn-white text-info btn-rounded z-depth-1a waves-effect waves-light shadow rounded-pill w-25"
                                    >
                                        <i className="text-info fab fa-google"></i>
                                        <FontAwesomeIcon icon={faGoogle} />
                                    </a>
                                </div>
                                {/* @csrf */}
                                {/* </form> */}
                            </div>
                        </Tab>
                        <Tab eventKey="register" title="Đăng ký">
                            {/* {{-- Register --}} */}

                            {/* @if(session('message')) */}
                            {/* <p className="text-danger"> {{ session('message')}} </p> */}
                            {/* @endif */}
                            <div className="m-4">
                                <form id="register" action="{{url('/register')}}" method="post">
                                    <div className="form-group">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Họ & Tên"
                                            value=""
                                            name="name"
                                        />
                                        {/* @if($errors->account->has('name'))
                                    <span className="text-danger">{{$errors->account->first('name')}}</span>
                                @endif */}
                                    </div>
                                    <div className="form-group">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Số Điện Thoại"
                                            value=""
                                            name="phone"
                                        />
                                        {/* @if($errors->account->has('phone'))
                                    <span className="text-danger">{{$errors->account->first('phone')}}</span>
                                @endif */}
                                    </div>
                                    <div className="form-group">
                                        <input
                                            type="text"
                                            className="form-control"
                                            placeholder="Nhập Email"
                                            value=""
                                            name="email"
                                        />
                                        {/* @if($errors->account->has('email'))
                                    <span className="text-danger">{{$errors->account->first('email')}}</span>
                                @endif */}
                                    </div>
                                    <div className="form-group">
                                        <input
                                            type="password"
                                            className="form-control"
                                            placeholder="Mật Khẩu"
                                            value=""
                                            name="password"
                                            autocomplete="off"
                                        />
                                        {/* @if($errors->account->has('password'))
                                    <span className="text-danger">{{$errors->account->first('password')}}</span>
                                @endif */}
                                    </div>
                                    <div className="form-group">
                                        <input
                                            type="submit"
                                            className="btnSubmit btn rounded-pill btn-info w-100"
                                            value="Tạo Tài Khoản"
                                        />
                                    </div>
                                    {/* @csrf */}
                                </form>
                            </div>
                        </Tab>
                    </Tabs>
                    <div className="tab-content"></div>
                </Modal.Body>
            </Modal>
        </>
    );
}

export default Login;
