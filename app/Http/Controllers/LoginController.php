<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengrajin;
use App\Admin;
use Session;

class LoginController extends Controller
{
    public function pengrajin_login(){
        if (Session::get('id') != null ) {
            return redirect('dashboard');
        }else{
            return view('login.index');
        }
    }

	public function admin_process(Request $req){
    	$where = array(
    		'username' => $req->username,
    		'password' => md5($req->password)
    	);

    	$userdata = Admin::where($where)->first();
    	$count = Admin::where($where)->count();
    	if ($count == 0) {
            $status = [
	            'status' => 'danger',
	            'msg' => 'Username atau password salah'
	        ];

    		return redirect('/login')->with($status);
    	}else{
    		Session::put('id', $userdata->id);
    		Session::put('username', $userdata->username);
    		Session::put('type', 'admin');
    		Session::put('name', $userdata->name);

    		return redirect('/dashboard');
    	}
    }

    public function pengrajin_process(Request $req){
    	$where = array(
    		'username' => $req->username,
    		'password' => md5($req->password)
    	);

    	$userdata = Pengrajin::where($where)->first();
    	$count = Pengrajin::where($where)->count();
    	if ($count == 0) {
            $status = [
	            'status' => 'danger',
	            'msg' => 'Username atau password salah'
	        ];

    		return redirect('/login')->with($status);
    	}else{
    		Session::put('id', $userdata->id);
    		Session::put('username', $userdata->username);
    		Session::put('type', 'pengrajin');
    		Session::put('name', $userdata->name);

    		return redirect('/dashboard');
    	}
    }

    public function logout() {
        Session::flush();
        return redirect('login');
    }
}
