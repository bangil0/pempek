<?php

namespace Simpeg\Http\Controllers\Frontend\Auth;

use Simpeg\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Artisan;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function username()
    {
        return 'nip';
    }

    public function showLoginForm()
    {
        return view('frontend.auth.login');
    }

    public function logout()
    {
        \Auth::logout();
        Artisan::call('cache:clear');
        return redirect(route('home'));
    }
}
