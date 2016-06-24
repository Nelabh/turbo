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

public function check_device(){
	$data = Input::all();
	if(Device::where('device_id',$data['device_id'])->first()){

		return '110';
	}
	return 100;
}

public function check_vehicle(){
	$data - Input::all();
	if(Customer::where('vehicle_number',$data['vehicle_number'])->first()){
		return '100'
	}

	return 110;
}

}
