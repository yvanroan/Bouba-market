<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
	public function index(){
		$users = User::where('is_Admin','!=','1')->get();
		return view('admin.user.index',compact('users'));
	}
}
