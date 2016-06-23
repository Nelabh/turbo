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
use Session;
class AdminController extends BaseController{

	use AuthorizesRequests, AuthorizesResources, DispatchesJobs, ValidatesRequests;
public function __construct()
{
    $this->middleware('auth');
}

	public static function admin(){
		if(Auth::check->level>=10)
		{
				$action = "Dashboard";
		return View::make('dashboard_admin', compact('action'));

		}

	}
	
}