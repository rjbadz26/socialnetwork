<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Session;
use Auth;

class UsersController extends Controller
{

    /*public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }*/

    public function getRegister(){
    	return view('users.register');
    }

    public function postRegister(Request $request){
    	
    	$this->validate($request,[
    		'username' => 'required|unique:users|max:100',
    		'email' => 'required|unique:users|max:100',
    		'password' => 'required|max:100',
    		'firstname' => 'required|max:100',
    		'lastname' => 'required|max:100'
    	]);

    	User::create($request->all());

    	Session::flash('message','Successfully Registered !!!');

    	return view('users.register');
    }

    /*public function getHome(){
    	return view('users.home');
    }*/


    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        /*$user = User::where('email', $request->email)
                    ->where('password', $request->password)->first();

        if(count($user) == 1){
            return $user;
        }*/

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('home');
        }

        Session::flash('message','Invalid Login');
        return redirect('/');
        
    }


    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }


}
