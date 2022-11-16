<?php

namespace App\Http\Controllers;

use App\Http\Services\Profile\ProfileService;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    protected $profile;
    protected $errorBag = 'profile';
    public function __construct(ProfileService $profile)
    {
        $this->profile = $profile;
    }

    public function index(User $user)
    {
        // $exitCode = Artisan::call('optimize');
        if (Auth::check()) {

            $user = auth()->user();
            $data['user'] = $user;
            return view('/profile.profile', [
                'title' => 'Tài Khoản - GShop',
            ], $data);
            // $exitCode = Artisan::call('optimize');

        }
        return redirect()->route('home')->with('login-message', 'Bạn cần đăng nhập');

    }

    public function update(User $user, Request $request)
    {
        $request->validate([
            'email' => 'required|unique:users',
            'name' => 'required|min:1|max:100',
            'phone' => 'required|min:8|max:20',

        ], [
            'email.required' => 'Bạn chưa nhập email',
            'email.unique' => 'Email đã tồn tại',
            'name.required' => 'Bạn chưa nhập tên',
            'phone.required' => 'Bạn chưa nhập số điện thoại',

        ]);

        $user = Auth::user()->id;
        User::where('id', $user)->update([
            'email' => $request->email,
            'name' => $request->name,
            'phone' => $request->phone,
        ]);

        if ($request->filled('old_password') || $request->filled('password_1') || $request->filled('password_2')) {
            $request->validate([

                'old_password' => 'required|min:6|max:100',
                'password_1' => 'required|min:6|max:100',
                'password_2' => 'required|same:password_1',
            ], [

                'old_password.required' => 'Bạn cần nhập mật khẩu hiện tại',
                'old_password.min' => 'Mật khẩu tối thiểu 6 kí tự',
                'password_1.required' => 'Bạn cần nhập mật khẩu mới',
                'password_1.min' => 'Mật khẩu tối thiểu 6 kí tự',
                'password_2.required' => 'Bạn cần nhập xác nhận mật khẩu mới',
                'password_2.same' => 'Xác nhận mật khẩu mới không khớp',
            ]);

            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user = Auth::user()->id;
                $new_password = bcrypt($request->input('password_1'));
                User::where('id', $user)->update([
                    'password' => $new_password,
                ]);

                return back()->with('ok', 'Cập nhật tài khoản thành công');

            } else {
                return back()->with('warning', 'Mật khẩu hiện tại không đúng, xin hãy nhập lại');
            }

        }

        return back()->with('success', 'Cập nhật tài khoản thành công');

    }

    public function my_order(Customer $customer)
    {
        if (Auth::check()) {
            $customer_orders = Customer::where('email', Auth::user()->email)->orderByDesc('id')->paginate(20);

            $cart_orders = Cart::where('customer_id', Auth::user()->id)->get();

            return view('/profile.my-order', compact('cart_orders', 'customer_orders'), [
                'title' => 'Đơn Hàng Của Tôi',
                'customer' => $customer,
                'carts' => $customer->carts()->get(),
                // 'customers' => $this->profile->getCustomer()
            ]);
        }
        return redirect()->route('home')->with('login-message', 'Bạn cần đăng nhập');
    }

    public function profile_logout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function detail(Customer $customer)
    {
        if (Auth::check()) {

            return view('/profile.list', [
                'title' => 'Chi Tiết Đơn Hàng: #' . str_pad($customer->id, 5, "0", STR_PAD_LEFT),
                'customer' => $customer,
                'carts' => $customer->carts()->get(),
            ]);
        }
        return redirect()->route('home')->with('login-message', 'Bạn cần đăng nhập');

    }
}
