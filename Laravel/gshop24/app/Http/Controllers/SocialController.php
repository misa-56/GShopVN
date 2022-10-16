<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialController extends Controller
{
/**
 * Login Using Facebook
 */
    public function loginUsingFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callbackFromFacebook()
    {
    // try {
    //     $user = Socialite::driver('facebook')->user();
    //     // dd($user);

    //     $saveUser = User::updateOrCreate([
    //         'facebook_id' => $user->getId(),
    //     ],[
    //         'name' => $user->getName(),
    //         'email' => $user->getEmail(),
    //         'password' => Hash::make($user->getName().'@'.$user->getId())
    //         ]);

    //     Auth::loginUsingId($saveUser->id);

    //     return redirect()->route('home');
    //     } catch (\Throwable $th) {
    //         dd($th->getMessage());
    //         throw $th;
    //     }
        $user = Socialite::driver('facebook')->user();
        // dd($user);

        $data = User::where('email',$user->email)->first();
        if(is_null($data)){
            $users['name'] = $user->name;
            $users['email'] = $user->email;
            // $users['phone'] = '';
            $users['password'] = '';
            $data = User::create($users);
        }
        Auth::login($data);
        return redirect()->route('home')->with('alert','Đăng nhập thành công!');
    }
    //GOOGLE
    public function loginUsingGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function callbackFromGoogle()
    {
        // try {
            $user = Socialite::driver('google')->user();
            // dd($user);

            $data = User::where('email',$user->email)->first();
            if(is_null($data)){
                $users['name'] = $user->name;
                $users['email'] = $user->email;
                // $users['phone'] = '';
                $users['password'] = '';
                $data = User::create($users);
            }
            Auth::login($data);
            return redirect()->route('home')->with('alert','Đăng nhập thành công!');

        //     $finduser = User::where('google_id', $user->id)->first();
        //     if($finduser){
        
        //         Auth::login($finduser);
    
        //         return redirect()->intended('dashboard');
    
        //     }else{
        //         $newUser = User::create([
        //             'name' => $user->name,
        //             'email' => $user->email,
        //             'google_id'=> $user->id,
        //             'password' => encrypt('123456dummy')
        //         ]);
    
        //         Auth::login($newUser);
    
        //         return redirect()->intended('dashboard');
        //     }
    
        // } catch (Exception $e) {
        //     dd($e->getMessage());
        // }
    }
}
