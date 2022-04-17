<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function login(Request $request)
    {
        $input = $request->all();

        $this->validate($request, [
            'identity' => 'required',
            'password' => 'required',
        ]);

        $fieldType = filter_var($request->identity, FILTER_VALIDATE_EMAIL) ? 'email' : 'name';
        if(auth()->attempt(array($fieldType => $input['identity'], 'password' => $input['password'])))
        {
            return redirect('/home');
        }else
        {
            return redirect()->route('login')->with('error','อีเมลหรือรหัสผ่านไม่ถูกต้อง');
        }
    }

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
