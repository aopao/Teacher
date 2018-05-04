<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

/**
 * Class LoginController
 * @package App\Http\Controllers\Auth
 */
class LoginController extends BaseController
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
	protected $redirectTo = '/agent';

	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		parent::__construct();
		$this->middleware('guest')->except('logout');
	}


	/**
	 * @param Request $request
	 * @return \Illuminate\Http\Response|\Symfony\Component\HttpFoundation\Response|void
	 * @throws \Illuminate\Validation\ValidationException
	 */
	public function login(Request $request)
	{
		$this->validateLogin($request);

		// If the class is using the ThrottlesLogins trait, we can automatically throttle
		// the login attempts for this application. We'll key this by the username and
		// the IP address of the client making these requests into this application.
		if ($this->hasTooManyLoginAttempts($request)) {
			$this->fireLockoutEvent($request);

			return $this->sendLockoutResponse($request);
		}

		if ($this->attemptLogin($request)) {
			return $this->sendLoginResponse($request);
		}

		// If the login attempt was unsuccessful we will increment the number of attempts
		// to login and redirect the user back to the login form. Of course, when this
		// user surpasses their maximum number of attempts they will get locked out.
		$this->incrementLoginAttempts($request);

		return $this->sendFailedLoginResponse($request);
	}

	/**
	 * Attempt to log the user into the application.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @return bool
	 */
	protected function attemptLogin(Request $request)
	{
		if (validation_phone($request->username)) {
			$credentials = [
				'phone' => $request->username ,
				'password' => $request->password ,
			];
		} else {
			$credentials = [
				'username' => $request->username ,
				'password' => $request->password ,
			];
		}
		return $this->customLogin($credentials);
	}

	/**
	 * 自定义登录 实现手机号和用户名一起登录
	 * @param $credentials
	 * @return bool
	 */
	private function customLogin($credentials)
	{
		return $this->guard()->attempt($credentials);
	}

	/**
	 * @return string
	 */
	public function username()
	{
		return 'username';
	}
}
