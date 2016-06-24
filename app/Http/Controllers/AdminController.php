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
class AdminController extends BaseController{

	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
public function __construct()
{
    $this->middleware('auth');
}

	public static function admin(){
		if(Auth::user()-> level >= 10)
		{  
			$dealer = Dealer::all();
			foreach ($dealer as $deal) {
				$cust = count(Customer::where('customer_code',$deal->customer_code)->get());
				$volume = Customer::where('customer_code',$deal->customer_code)->sum('total_volume');
				$total= Customer::all()->sum('total_volume');
				$deal->customers = $cust;
				$deal->volume  = $volume;
				$deal->total = $total;
			}
			$action="Dashboard";
		return View::make('dashboard_admin', compact('action','dealer'));

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