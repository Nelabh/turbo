<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Response;
use App\Admin;
use App\Dealer;
use App\Device;
use App\Reference;
use App\Customer;
use App\Transaction;
use App\Offer;
class ApiController extends BaseController
{
	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;




/*
    RESPONSE CODES :::::
    110 : Data Valid ( Data is present in DB)
    100 :Device not found in db 
    101: Reference code already used
    111: Already registered
    001: aLREADY REGISTERED


*/


    public function check_device(){
    	$data = Input::all();
    	$device = Device::where('device_id',$data['device_id'])->first();
    	if($device){

    		return $device->device_pin;
    	}
    	else return '0';
    }


public function check_vehicle(){     //device id vehicle
	$data = Input::all();
	$cust = Customer::where('vehicle_number',$data['vehicle_number'])->first();
	if($cust){
		return '110';   //DEPICTS LOGIN
	}

	

	else return '100';  //DEPICTS REGISTRATION
}


public function register(){
	$data = Input::all();
	


	if(isset($data['reference_number'])){


		$ref = Reference::where('reference_number',$data['reference_number'])->first();


		


		if(isset($ref)&&(!$ref->flag)){


			$vehicle = Customer::where('vehicle_number',$data['vehicle_number'])->first();
			if(!$vehicle){


				$cust = new Customer();
				$cust->vehicle_number = $data['vehicle_number'];
				$cust->name = $data['name'];
				$cust->contact = $data['contact'];
				$cust->email = $data['email'];
				$dev=Device::where('device_id',$data['device_id'])->first();
				$cust->customer_code=$dev->customer_code;
				$cust->save(); 
				$ref->flag=1;
				$ref->save();
				return '110';
			}


			else{
				return '101';

			}

		}

		else{
			return '101';

		}
		


	}

	else
	{
		$vehicle = Customer::where('vehicle_number',$data['vehicle_number'])->first();
		if(!$vehicle){


			$cust = new Customer();
			$cust->vehicle_number = $data['vehicle_number'];
			$cust->name = $data['name'];
			$cust->contact = $data['contact'];
			$cust->email = $data['email'];
			$dev=Device::where('device_id',$data['device_id'])->first();
			$cust->customer_code=$dev->customer_code;
			$cust->save(); 

			return '110';
		}


		else{
			return '101';

		}
	}
}



public function fills(){

	$data = Input::all();
	$trans = new Transaction;
	$trans->device_id = $data['device_id'];
	$trans->vehicle_number = $data['vehicle_number'];
	$trans->volume = $data['fill_volume'];



	$customer = Customer::where('vehicle_number',$data['vehicle_number'])->first();
	$customer->total_volume += $data['fill_volume'];
	$customer->save();

	if($data['petrol']=='1')
		$trans->type = 'petrol';
	
	else
		$trans->type = 'diesel';




	if(!$data['reference_flag'])
	{

		$device=Device::where('device_id',$data['device_id'])->first()->customer_code;
		$trans->customer_code=$device;
		$trans->save();
		
		$offer = Offer::where('customer_code',$device)->get();
		$t =  array();
		foreach($offer as $off )
		{
			if($off->discount_volume<=$customer->total_volume)
			{
				$t[]=array("id"=>$off->id,"percent"=>$off->discount_percent);

			}
		}
		$f = array("total_volume"=>$customer->total_volume,"discounts"=>$t,"transaction_id"=>$trans->id);
		return response()->json($f);



	}
	else 
	{
		$device=Device::where('device_id',$data['device_id'])->first()->customer_code;
		$trans->customer_code=$devices;
		$trans->save();

		$offer = Offer::where('customer_code',$device)->where('refill_type','ft')->get();
		$t =  array();
		foreach($offer as $off )
		{
			if($off->discount_volume<=$customer->total_volume)
			{
				$t[]=array("id"=>$off->id,"percent"=>$off->discount_percent);

			}
		}
		$f = array("total_volume"=>$customer->total_volume,"discounts"=>$t,"transaction_id"=>$trans->id);
		return response()->json($f);








	}

}
public function calc(){
	$data = Input::all();
	$device=Device::where('device_id',$data['device_id'])->first()->customer_code;
	$dealer = Dealer::where('customer_code',$device)->first();
	$trans = Transaction::where('id',$data['transaction_id'])->first();


	if($data['petrol']==1)
	{

		$calc = $data['volume']*$dealer->petrol_price;
		$trans->rate = $dealer->petrol_price;
	}
	else
	{
		$calc = $data['volume']*$dealer->diesel_price;
		$trans->rate = $dealer->diesel_price;


	}


	if($data['flag_discount'])
	{
		$discount=Offer::where('id',$data['discount_id'])->first();
		$ret = $calc;
		$calc=$calc-($discount->discount_percent/100)*$calc;
	}

	$trans->total_cost=$calc;
	$trans->save();

	if($data['petrol']==1)
		return $dealer->petrol_price;
	else
		return $dealer->diesel_price;

}
 public function check(){
 	$data = Input::all();
 	$use = "username";
 	$pass = "password";
 	if($use == $data['username']&& $pass == $data['password']){
 		return "Correct";
 	}else{
 		return "Not Correct";
 	}
 }


}

public function check_vehicle(){     //device id vehicle
	$data = Input::all();
	if(Customer::where('vehicle_number',$data['vehicle_number'])->first()){
		return '110'   //DEPICTS LOGIN
	}

	return '100';  //DEPICTS REGISTRATION
}

public function register_user(){
	$data = Input::all();
	if(Device::where('device_id',$data['device_id'])->first()){
		$device = Device::where('device_id',$data['device_id'])->first();
		if($device->device_pin == $data['device_pin']){
			if($data['flag']=='1'){                                              //flag -> registration/login
				$cust = new Customer;
				$cust->vehicle_number = $data['vehicle_number'];
				$cust->name = $data['name'];
				$cust->contact = $data['contact'];
				$cust->email = $data['email'];
				$cust->save();


				$device = new Device;
				$device->device_pin = $data['device_pin'];
				$device->device_id = $data['device_id'];
				$device->save();



				$ref = Reference::where('reference_number',$data['reference_number'])->first();

				if($ref){
					return '101';   //DEPICTS rEF ID USED
				}
				else{
					$ref->flag=1;
					$ref->save();

					return '001';   //DEPICTS REGISTRATIOMN COMPLETED

				}




			}
		}


	}

}

public function input()





}





//input into db
vehivle no
device_id
total_volume


RESPONSE->JSON

totL_VOLUME++

DISCOUNT inFOKWEY VALUE



KEY IF AVAILED OR NOT AVAILEDD
IF AVAILED THEN GIVE DISCOUNT ID



//VEHICLE NU,MBER ,IMEI,DISCOUNT_ID ,flag_discount,total_volume


if(flag_discount=1)
	volume--
cost




response main present litre main amount
discount AVAILED





