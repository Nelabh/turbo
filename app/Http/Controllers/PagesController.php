<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use View;
class PagesController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	public function home(){
		$action = "Login";
		return View::make('home',compact('action'));
	}
	public function dealers(){
		$action = "Dealers";
		return View::make('dealers',compact('action'));
	}
	public function dashboard(){
		$action = "Dashboard";
		return View::make('dashboard_admin',compact('action'));
	}
	public function logout(){
		if(Auth::check()){
			Auth::logout();
			Session::forget('email');
		}
		return Redirect::route('home');
	}
	public function log(){
		$data = array('email'=>Input::get('email'),'password'=>Input::get('password'));
		$rules=array(
			'email' => 'required',
			'password' => 'required',
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){

			return Redirect::back()->withErrors($validator->errors())->withInput();
		}
		else {
			if(Auth::attempt($data)){
				Session::put('email',$data['email']);
				return Redirect::route('dashboard');
			}
			else{
				return Redirect::route('home')->with('message','Your email/password combination is incorrect!')->withInput();
			}
		}
	}
}
