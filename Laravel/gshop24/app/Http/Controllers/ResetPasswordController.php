<?php 

namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class ResetPasswordController extends Controller { 

  public function getPassword($token) { 

    return view('users.reset_password', ['token' => $token]
    , [
        'title' => 'Đặt lại mật khẩu'
    ]
);
  }

  public function updatePassword(Request $request)
  {

  $request->validate([
      'email' => 'required|email|exists:users',
      'password' => 'required|string|min:5|confirmed',
      'password_confirmation' => 'required',

  ],[
    'email.required' => 'Chưa nhập email',
    'email.exists' => 'Email không đúng hoặc chưa được đăng ký',
    'password.required' => 'Chưa nhập mật khẩu mới',
    'password.min' => 'Mật khẩu tối thiểu 5 kí tự',
    'password.confirmed' => 'Xác nhận mật khẩu không khớp',
    'password_confirmation.required' => 'Chưa xác nhận mật khẩu',
  ]);

  $updatePassword = DB::table('password_resets')
                      ->where(['email' => $request->email, 'token' => $request->token])
                      ->first();

  if(!$updatePassword)
      return back()->withInput()->with('error', 'Invalid token!');

    $user = User::where('email', $request->email)
                ->update(['password' => Hash::make($request->password)]);

    DB::table('password_resets')->where(['email'=> $request->email])->delete();

    return redirect('/profile')->with('message', 'Đổi mật khẩu thành công!');

  }
}