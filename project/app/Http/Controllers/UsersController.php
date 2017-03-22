<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Relationship;
use Session;
use Auth;

class UsersController extends Controller
{
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


    public function postLogin(Request $request){
        $this->validate($request,[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){
            return redirect()->intended('home');
        }

        Session::flash('err_message','Invalid Login');
        return redirect('/');
    }


    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }


    public function searchUsers(Request $request){
        $search = "%".$request->search."%";
        $users = User::orWhere('firstname', 'LIKE' , $search)
                        ->orWhere('lastname', 'LIKE', $search)
                        ->orWhere('username', 'LIKE', $search)
                        ->get();

        $relationships = Relationship::all();
        $counter = 0;

        return view('users.search',compact('users','relationships','counter'));
    }

    public function updateRel(Request $request){
        $user1 = $request->user1;
        $user2 = $request->user2;
        $action = Auth::user()->id;
        $status = $request->status;

        if($status == 1){
            $status = 2;
        }else if($status == 2){
            $status = 3;
        }else if($status == 3){
            $status = 1;
        }else if($status == 0){
            $status = 1;
            $relationship = new Relationship;
            $relationship->user1 = $user1;
            $relationship->user2 = $user2;
            $relationship->action_user_id = $action;
            $relationship->status_id = $status;
            $relationship->save();

            return;
        }

        Relationship::where('user1',$user1)
                    ->where('user2',$user2)
                    ->update(['action_user_id' => $action, 'status_id' => $status]);
    }


}
