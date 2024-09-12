<?php

namespace App\Http\Controllers\Auth;

use App\Events\NotifyProcessed;
use App\Http\Controllers\Controller;
use App\Models\Deposit;
use App\Models\Earning;
use App\Models\User;
use App\Models\Withdraw;
use Illuminate\Foundation\Http\Events\MyEvent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthenticatedController extends Controller
{

    public function singup_get(Request $request){

        $referralId = $request->query('rel');
        if($referralId != null){
            $request->session()->put('Rel', $referralId);
        }

        return view('Frontend.signup');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->intended('/')->with('success', 'You are Logout Successfully');
    }


    public function login(Request $request)
    {


        $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);
        $users = User::Where("name", $request->username)->get();


        foreach ($users as $user) {
            if (Hash::check($request->password, $user->password)) {
                Auth::login($user);
                if ($request->user()->role === 'admin') {
                    return redirect()->intended('admin/dashboard')->with('success', 'LogIn Admin Successfully');
                } else {
                    return redirect()->intended('/dashboard')->with('success', 'Hello '. Auth::user()->name .' You are Login Seccessfully');
                }
            }
        }
        return back()->withErrors([
            'username' => 'The Username do not match our records.',
            'password' => 'The Password do not match our records.',
        ]);
    }

    public function signup(Request $request)  {
        $request->validate([
            'fullname' => 'required|min:4',
            'username' => 'required|min:4',
            'password' => 'required|min:6',
            'password1' => 'required|min:6|same:password',
            'email' => 'required|email|unique:users,email',
            'email1' => 'required|email|unique:users,email|same:email',
            'sq' => 'required',
            'sa' => 'required',

        ]);

        $refferal = $request->session()->has('Rel') ? $request->session()->get('Rel') : null;

        $users = User::create([
            'fullname' => $request->fullname,
            'name' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'perfect_money' => ($request->perfectmoney != null ? $request->perfectmoney : null),
            'payeer' => ($request->payeer != null ? $request->payeer : null),
            'bitcoin' => ($request->bitcoin != null ? $request->bitcoin : null),
            'litecoin' => ($request->litecoin != null ? $request->litecoin : null),
            'ethereum' => ($request->ethereum != null ? $request->ethereum : null),
            'bitcoin_cash' => ($request->bitcoin_cash != null ? $request->bitcoin_cash : null),
            'sq' => ($request->sq != null ? $request->sq : null),
            'sa' => ($request->sa != null ? $request->sa : null),
            'link_from' => $refferal,
            'remember_token' => Str::random(40),
        ]);


        Auth::login($users);

        event(new MyEvent('hello'));


        return redirect()->intended('/dashboard')->with('success', 'Hello '. Auth::user()->name .' You are Register Seccessfully');
    }

    public function edit_account(Request $request){
        $request->validate([
            'fullname' => 'required|min:4',
            'password' => 'required|min:6',
            'password1' => 'required|min:6|same:password',
            'email' => 'required|email'
        ]);

        $user = $request->user();
        $user->update([
            'fullname' => $request->fullname,
            'password' => Hash::make($request->password),
            'email' => $request->email,
            'perfect_money' => ($request->perfectmoney != null ? $request->perfectmoney : null),
            'payeer' => ($request->payeer != null ? $request->payeer : null),
            'bitcoin' => ($request->bitcoin != null ? $request->bitcoin : null),
            'litecoin' => ($request->litecoin != null ? $request->litecoin : null),
            'ethereum' => ($request->ethereum != null ? $request->ethereum : null),
            'bitcoin_cash' => ($request->bitcoin_cash != null ? $request->bitcoin_cash : null),
        ]);
        return redirect()->back()->with('success', "Update Successfully");
    }


}
