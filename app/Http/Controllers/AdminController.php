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
use App\Transaction;

use Hash;
use DB;
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
			$count = Customer::all()->count('name');
			$transaction = DB::select(DB::raw("SELECT SUM(volume) as volume,SUM(total_cost) as cost,type,CAST(created_at as DATE) as date FROM `transaction` GROUP BY type,CAST(created_at as DATE)"));

			//dd($transaction);
			foreach ($dealer as $deal) {
				$cust = count(Customer::where('customer_code',$deal->customer_code)->get());
				$volume = Transaction::where('customer_code',$deal->customer_code)->get()->sum('volume');
				$cost = Transaction::where('customer_code',$deal->customer_code)->get()->sum('total_cost');
				$deal->customers = $cust;
				$deal->volume  = $volume;
				$deal->cost = $cost;
			}
			$dealer->total = $total;
			$dealer->count = $count;
			$tran = Transaction::all()->sum('total_cost');
			$dealer->trans = $tran;


			$transaction_chart = DB::select(DB::raw("SELECT SUM(volume) as volume,SUM(total_cost) as cost,type,CAST(created_at as DATE) as date  FROM `transaction` GROUP BY type,CAST(created_at as DATE)"));
			$diesel_graph = [];
			$petrol_graph = [];
			


			foreach ($transaction_chart as $tr){
				if($tr->type == 'petrol'){
					$petrol_graph[] = $tr;
				}
				else if($tr->type == 'diesel'){
					$diesel_graph[] = $tr;

				}

			}



			$action="Dashboard";
			return View::make('dashboard_admin', compact('action','dealer','petrol_graph','diesel_graph'));
		}
	}
	public function dealers(){
		if(Auth::user() -> level > 5){
			$action = "Dealers";
			$dealers = Dealer::all();
			//dd($dealers);
			return View::make('dealers', compact('action','dealers'));
		}
		else{
			return Redirect::route('dashboard');
		}
	}
	public function add_dealer(){
		if(Auth::user()->level > 5){
			$data = Input::all();
			$rules=array(
				'email' => 'required',
				'password' => 'required',
				'customer_code' => 'required',
				'city' => 'required',
				'pump_name' =>'required',
				'name' => 'required'
				);
			$validator = Validator::make($data, $rules);
			if($validator->fails()){

				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			else {
				if(Admin::where('customer_code',$data['customer_code'])->first()){
					return Redirect::route('dealers')->with('failure','Dealer Already Exists');
				}
				$admin = new Admin;
				$admin->customer_code = $data['customer_code'];
				$admin->password = Hash::make($data['password']);
				$admin->level = '5';
				$admin->save();

				$dealer = new Dealer;
				$dealer->customer_code = $data['customer_code'];
				$dealer->name= $data['name'];
				$dealer->contact = $data['contact'];
				$dealer->pump_name = $data['pump_name'];
				$dealer->city = $data['city'];
				$dealer->email = $data['email'];
				$dealer->save();
				return Redirect::route('dealers')->with('success','Dealer Successfully Added');
			}

		}
	}
	public function delete_dealer($id){
		if(Auth::user()->level >= 5){
			$admin = Admin::where('customer_code',$id)->first();
			if($admin->delete()){
				return Redirect::route('dealers')->with('success','Dealer Successfully Deleted');
			}
			else{
				return Redirect::route('dealers')->with('failure','An Error Occured While Deleting Dealer!!! Please Try Again!!!');
			}
		}
		else{
			return Redirect::route('devices')->with('failure','Access Denied');
		}
	}
	public function view_users(){
		return view::make('view_users');
	}
	
}