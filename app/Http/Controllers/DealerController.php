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
use App\Offer;
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

public function offers(){
		if(Auth::user()->level <= 5){
			$action = "Offers";
			$offers = Offer::where('customer_code',Auth::user()->customer_code)->get();
			return View::make('offers',compact('action','offers'));
		}
		else{
			return Redirect::route('home');

		}
	}

	public function add_offer(){
		if(Auth::user()->level <= 5){
			$data = Input::all();
			$rules=array(
				'discount_percent' => 'required',
				'discount_volume' => 'required',
				'refill_type' => 'required'
				);
			$validator = Validator::make($data, $rules);
			if($validator->fails()){

				return Redirect::back()->withErrors($validator->errors())->withInput();
			}
			else {
				if(Offer::where('discount_percent',$data['discount_percent'])->
						where('discount_volume',$data['discount_volume'])->first()){
					return Redirect::route('offers')->with('failure','Offer Already Exists');
				}
				$offer = new Offer;
				$offer->refill_type = $data['refill_type'];
				$offer->discount_volume = $data['discount_volume'];
				$offer->discount_percent = $data['discount_percent'];
				$offer->save();
				return Redirect::route('offers')->with('success','Offer Successfully Added');
			}

		}
	}

	public function delete_offer($id){
		if(Auth::user()->level <= 5 && (Auth::user()->customer_code == Offer::where('id',$id)->first()->customer_code)){
			$offer = Offer::where('id',$id)->first();
			if($offer->delete()){
				return Redirect::route('offers')->with('success','Offer Successfully Deleted');
			}
			else{
				return Redirect::route('ofers')->with('failure','An Error Occured While Deleting Offer!!! Please Try Again!!!');
			}
		}
		else{
			return Redirect::route('offers')->with('failure','Access Denied');
		}
	}
	
}
