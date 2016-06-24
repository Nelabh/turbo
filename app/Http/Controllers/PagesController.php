<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use View;
use Illuminate\Support\Facades\Input;
use Redirect;
use Validator;
use Auth;
use App\Admin;
use App\Dealer;
use Session;
class PagesController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	public function home(){
		return View::make('home');
	}
	public function logout(){
		if(Auth::check()){
			Auth::logout();
			Session::forget('email');
		}
		return Redirect::route('home');
	}
	public function log(){
		$data = array('customer_code'=>Input::get('customer_code'),'password'=>Input::get('password'));
		$rules=array(
			'customer_code' => 'required',
			'password' => 'required',
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){

			return Redirect::back()->withErrors($validator->errors())->withInput();
		}
		else {
			if(Auth::attempt($data)){
				Session::put('customer_code',$data['customer_code']);
				return Redirect::intended('dashboard');
			}
			else{
				return Redirect::route('home')->with('message','Your email/password combination is incorrect!')->withInput();
			}
		}
	}

	public function dashboard(){
		if(Auth::check()){
		if(Auth::user()->level>=10){
			return AdminController::admin();
		}
		else{
			return DealerController::dealers();
		}
	}
	else{
		return Redirect::route('home');
	}
		
	}


	
}
