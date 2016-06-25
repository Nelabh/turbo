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
use App\Device;
use Session;
class DealerController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
	public function __construct()
	{
		$this->middleware('auth');
	}
	public static function dealers(){
		if(Auth::user() -> level <= 5){
			$action = "Dashboard";
			return View::make('dashboard_dealer', compact('action'));
		}
		else{
			return Redirect::route('home');
		}
	}
	public function devices(){
		if(Auth::user()->level <= 5){
			$action = "Devices";
			$devices = Device::where('customer_code',Auth::user()->customer_code)->get();
			return View::make('devices',compact('action','devices'));
		}
		else{
			return Redirect::route('home');

		}
	}
	public function add_device(){
		if(Auth::user()->level <= 5){
			$data = Input::all();
			$rules=array(
				'device_id' => 'required',
				'device_pin' => 'required',
				);
			$validator = Validator::make($data, $rules);
			if($validator->fails()){

				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			else {
				if(Device::where('device_id',$data['device_id'])->first()){
					return Redirect::route('devices')->with('failure','Device Already Exists');

				}
				$admin = new Device;
				$admin->customer_code = Auth::user()->customer_code;
				$admin->device_id = $data['device_id'];
				$admin->device_pin = $data['device_pin'];
				$admin->save();

				return Redirect::route('devices')->with('success','Device Successfully Added');
			}

		}
	}

	public function delete_device($id){
		if(Auth::user()->level <= 5 && (Auth::user()->customer_code == Device::where('device_id',$id)->first()->customer_code)){
			$device = Device::where('device_id',$id)->first();
			if($device->delete()){
				return Redirect::route('devices')->with('success','Device Successfully Deleted');
			}
			else{
				return Redirect::route('devices')->with('failure','An Error Occured While Deleting Device!!! Please Try Again!!!');
			}
		}
		else{
			return Redirect::route('devices')->with('failure','Access Denied');
		}
	}
	
}
