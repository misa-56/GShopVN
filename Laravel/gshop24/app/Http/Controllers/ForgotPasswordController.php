<?php 

namespace App\Http\Controllers; 

use Illuminate\Http\Request; 
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon; 
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller
{
  public function getEmail()
  {

    return view('users.forgot_password', [
        'title' => 'Lấy lại mật khẩu'
    ]);
  }

 public function postEmail(Request $request)
  {
    $request->validate([
        'email' => 'required|email|exists:users',
    ],[
        'email.exists' => 'Email này chưa được đăng ký',
        'email.required' => 'Chưa nhập email'
    ]);

    $token = Str::random(64);

      DB::table('password_resets')->insert(
          ['email' => $request->email, 'token' => $token, 'created_at' => Carbon::now()]
      );

      Mail::send('mail.reset_password', ['token' => $token], function($message) use($request){
          $message->to($request->email);
          $message->subject('Đặt lại mật khẩu GShopvn');
      });

      return redirect()->back()->with('forgot_password_message','Đường dẫn thay đổi mật khẩu đã được gửi đến email của bạn!');
  }
}