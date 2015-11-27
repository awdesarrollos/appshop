<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = "layouts.main";

	public function getLogin() {
		$this->layout->content = View::make('login');
	}

	public function postSignin() {
		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('admin/dashboard');
		} else {
			return Redirect::to('login')
				->with('error', 'Su username/password son incorrectos!! Vuelva a intentarlo.')
				->withInput();
		}
	}

	public function getDashboard() {

		$users = User::where('padre_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->take(5)->get();
		$eventos = Evento::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->take(5)->get();
		$ventas = Venta::where('user_id', '=', Auth::user()->id)->orderBy('id', 'DESC')->take(5)->get();
		$this->layout->content = View::make('admin/dashboard')
				->with('users',$users)
				->with('eventos',$eventos)
				->with('ventas',$ventas);
	}

	public function getLogout() {
		Auth::logout();
		return Redirect::to('login')->with('success', 'Sesión finalizada con éxito!');
	}

}