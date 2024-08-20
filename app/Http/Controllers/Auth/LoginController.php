<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        // Check for too many login attempts
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            if ($request->hasSession()) {
                $request->session()->put('auth.password_confirmed_at', time());
            }
            
            // Handle request that sends json response for AJAX login
            if ($request->wantsJson()) {
                return response()->json([
                    'redirect' => $this->redirectPath(),
                ]);
            }

            // Otherwise, proceed with the default login response
            return $this->sendLoginResponse($request);
        }

        // Increment login attempts if the login was unsuccessful
        $this->incrementLoginAttempts($request);

        // Handle failed login attempt with AJAX
        if ($request->wantsJson()) {
            return response()->json([
                'errors' => [
                    $this->username() => [trans('auth.failed')],
                ],
            ], 422);
        }

        // Otherwise, proceed with the default failed login response
        return $this->sendFailedLoginResponse($request);
    }
}
