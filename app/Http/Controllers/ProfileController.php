<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;

use App\User;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('profile.index')->with(array('user'=>$user));
    }

    public function update(Request $request){

        $rules = array(
            'name'              => 'required',                        // just a normal required validation
            'email'             => 'required|email|unique:users,email,'.Auth::user()->id
        );
        
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('profile')
                ->withErrors($validator);

        } else {
            $user = User::find(Auth::user()->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if(strlen($request->input('password')) > 0){
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
            return Redirect::to('home');
        }
    }
}
