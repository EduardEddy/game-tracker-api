<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use Redirect;

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
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'code_confirm'=>null])) {
            Auth::user();
            return redirect('/activities');
        }

        if(!$this->isActiveUser($request->email) ) {
            return Redirect::back()->withErrors(['msg' => 'El usuario debe activar su cuenta']);
        }

        return Redirect::back()->withErrors(['msg' => 'Credenciales invalidas']);
    }

    private function isActiveUser($email) {
        $user = User::whereEmail($email)->first();

        if ( $user->code_confirm != null ) {
            return false;
        }
        return true;
    }
}
