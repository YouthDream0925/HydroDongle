<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

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
        $this->middleware('guest:admin')->except('logout');
    }

    public function showAdminLoginForm()
    {
        // return view('auth.login', ['route' => route('admin.login-view'), 'title'=>'Admin']);
        return view('auth.admin.login');
    }

    public function adminLogin(Request $request)
    {
        $this->validate($request, [
            'name'   => 'required|string',
            'password' => 'required|min:8'
        ]);

        if (\Auth::guard('admin')->attempt($request->only('name','password'), $request->get('remember'))){
            return redirect()->intended('/admin/dashboard');
        }

        return $this->sendFailedAdminLoginResponse($request);
    }

    protected function sendFailedAdminLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->userAdminName() => [trans('auth.failed')],
        ]);
    }

    public function userAdminName()
    {
        return 'name';
    }
}