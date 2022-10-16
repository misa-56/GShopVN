<?php


namespace App\Http\Services\Profile;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use App\Models\Cart;
use App\Models\Customer;
use App\Models\User;

class ProfileService
{
    
    public function update($request, $user) : bool
    {
        // $user->name = (string) $request->input('name');
        // $user->phone = (string) $request->input('phone');
        // $user->save();
        // Session::flash('success', 'Cập nhật Tài khoản thành công');
        // return true;
        try {
            
            $user->fill($request->input());
            $user->save();
            Session::flash('success', 'Cập nhật Tài khoản thành công');
        } catch (\Exception $err) {
            Session::flash('error', 'Cập nhật Tài khoản Lỗi');
            Log::info($err->getMessage());

            return false;
        }

        return true;
    }
    public function getCustomer()
    {
        return Customer::orderByDesc('id')->paginate(15);
    }
}