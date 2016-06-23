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
				return Redirect::route('dashboard');
			}
			else{
				return Redirect::route('home')->with('message','Your email/password combination is incorrect!')->withInput();
			}
		}
	}

	public function dashboard(){
		if(Auth::check()->level>=10){
			$action = "Dashboard";
			/*return View::make('dashboard_admin', compact('action'));*/
			return AdminController::admin();
		}
		else{
			$action = "Dashboard";
			/*return View::make('dashboard_dealer', compact('action'));*/
			return DealerController::dealers();

		}
		
	}

	public function dealers(){
		$dealers = Dealer::all();
		$action = "Dealers";
		return View::make('dealers', compact('action','dealers'));
	}
	public function add_dealer(){
		$rules=array(
			'email' => 'required',
			'customer_code' => 'required',
			'contact' => 'required',
			'city' => 'required',
			'name' => 'required',
			'password' => 'required',
			'pump_name' => 'required'
			);
		$validator = Validator::make($data, $rules);
		if($validator->fails()){

			return Redirect::back()->withErrors($validator->errors())->withInput();
		}
		else {
			$data = Input::all();
			$admin = new Admin;
			$admin->customer_code = $data['customer_code'];
			$admin->password = Hash::make($data['password']);
			$admin->level = 5;
			$admin->save();
			$dealer = new Dealer;
			$dealer->customer_code = $data['customer_code'];
			$dealer->name = $data['name'];
			$dealer->contact = $data['contact'];
			$dealer->pump_name = $data['pump_name'];
			$dealer->city = $data['city'];
			$dealer->email = $data['email'];
			$dealer->save();
			return Redirect::route('dashboard')->with('success','Dealer Successfully Added');
		}
	}

	
}
