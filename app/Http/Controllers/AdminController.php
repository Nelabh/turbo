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
use App\Customer;

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
				$total= Customer::all()->sum('total_volume');

			foreach ($dealer as $deal) {
				$cust = count(Customer::where('customer_code',$deal->customer_code)->get());
				$volume = Customer::where('customer_code',$deal->customer_code)->sum('total_volume');
				$deal->customers = $cust;
				$deal->volume  = $volume;
			}
			$dealer->total = $total;
							$action="Dashboard";
		return View::make('dashboard_admin', compact('action','dealer'));

		}

	}
	public function dealers(){
		if(Auth::user() -> level <= 5){
		$action = "Dashboard";
			$dealers = Dealer::all();

		return View::make('dealers', compact('action','dealers'));
	}
	}
	
}