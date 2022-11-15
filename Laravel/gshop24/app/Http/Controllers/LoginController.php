<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\MOdels\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    protected $errorBag = 'account';

    public function index()
    {
        return view('login', [
            'title' => 'Đăng Nhập - Đăng Ký',
        ]);
    }
    public function signup(Request $request)
    {
        $validator = $request->validateWithBag('account', [
            'email' => 'required',
            'name' => 'required|max:30',
            'phone' => 'required|min:8|max:20',
            'password' => 'required',
        ], [
            'email.required' => 'Bạn chưa nhập email',
            'name.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',
            'password.required' => 'Bạn chưa nhập mật khẩu',
        ]);

        $user = DB::table('users')->where('email', $request->email)->first();
        if (!$user) {
            $newUser = new User();
            $newUser->name = $request->name;
            $newUser->email = $request->email;
            $newUser->phone = $request->phone;
            $newUser->password = $request->password;
            $newUser->save();
            Auth::loginUsingId($newUser->id);
            return redirect()->back()->with('alert', 'Tạo tài khoản thành công!');

        } else {
            Session::flash('message', 'Email đã tồn tại');
            return redirect()->back();
        }

    }

    public function signin(Request $request)
    {

        $request->validateWithBag('account', [
            'login-email' => 'required|email:filter',
            'login-password' => 'required',
        ], [
            'login-email.required' => 'Bạn chưa nhập email',
            'login-password.required' => 'Bạn chưa nhập mật khẩu',

        ]);

        if (Auth::attempt([
            'email' => $request->get('login-email'),
            'password' => $request->get('login-password'),
        ]
            , $request->input('remember')
        )) {
            session([
                'email' => $request->get('login-email'),
            ]);

            return redirect()->back()->with('alert', 'Đăng nhập thành công!');
        }

        Session::flash('error', 'Email hoặc Mật khẩu không đúng');
        return redirect()->back();

    }

    public function logout()
    {
        Auth::logout();
        return redirect()->back();
    }

    public function forgot()
    {
        return view('users.forgot_password', [
            'title' => 'Lấy lại mật khẩu',
        ]);
    }
    public function forgot_password(Request $request)
    {
        $data = $request->all();
        $now = Carbon::now('Asia/Ho_Chi_Minh')->format('d-m-Y');
        $title_mail = "Đặt lại mật khẩu GShopvn" . ' ' . $now;
        $user = User::where('email', '=', $data['email'])->first();
        if ($user) {
            $count_user = $user->count();
            if ($count_user == 0) {
                return redirect()->back()->with('reset_error', 'Email này chưa được đăng ký!');
            } else {
                $token_random = Str::random();
                $user->reset_token = $token_random;
                $user->save();
                $data = array();

            }
        }

        // return redirect()->back()->with('forgot_password_message','Đường dẫn thay đổi mật khẩu đã được gửi đến email của bạn!');
    }

    public function reset(Request $request)
    {
        // $data = $request ->all();
        // dd($data);
        return view('users.reset_password', [
            'title' => 'Đặt lại mật khẩu',
        ]);

        // return redirect()->back()->with('reset_password_message','Thay đổi mật khẩu thành công!');
    }

    public function reset_password(Request $request)
    {
        $data = $request->all();
        // dd($data);

        return redirect()->back()->with('reset_password_message', 'Thay đổi mật khẩu thành công!');
    }

}
