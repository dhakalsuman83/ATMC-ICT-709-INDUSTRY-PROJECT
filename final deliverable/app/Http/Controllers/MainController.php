<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use DB;
use App\Models\Student;
use App\Models\Room;
use Session;


class MainController extends Controller
{
    public function checklogin(Request $request)
    {
		$id=$request->id;
    	$email=$request->email;
    	$password=$request->password;
    	$data= Student::where('email', $email)->first();
    	if($data->email==$request->email && $data->password==md5($request->password)) {
    		if($data->role=='1')
    		{
				//return view('admin_dashboard',['id'=>$id]);
			Session::put('id', $data->sid);
			Session::put('fname', $data->fname);
			
				return redirect('admin_dashboard');
    	}
		 if($data->role=='0') {
			
			Session::put('id', $data->sid);
			Session::put('fname', $data->fname);
			Session::put('mname', $data->mname);
			Session::put('lname', $data->lname);
			Session::put('eid', $data->enrollId);
			return Redirect('studenthome');
			

    	}
	}
    else
    {
    	return redirect('/')->with('status', 'Incorrect email or password!!!!');
    	
    }
    

}
}

