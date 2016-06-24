<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesResources;
use Illuminate\Support\Facades\Input;
use App\Admin;
use App\Dealer;
use App\Customer;

class ApiController extends BaseController
{
    use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;




/*
    RESPONSE CODES :::::
    110 : Data Valid ( Data is present in DB)
    100 : Data Invalid ( Data Is not present in DB)
    101: Reference code already used
    111: Already registered

*/


public function check_device(){
	$data = Input::all();
	if(Device::where('device_id',$data['device_id'])->first()){

		return '110';
	}
	return '100';
}

public function check_vehicle(){     //device id vehicle
	$data - Input::all();
	if(Customer::where('vehicle_number',$data['vehicle_number'])->first()){
		return '110'
	}

	return '100';
}

public function register_user(){
	

}


//register user

vehicle
device
device _pin
name
contact 
email
refernce _no



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




}
