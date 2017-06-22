<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use DateTime;
use DB;
use App\User;
use File;
use App\Characteristics as Model; //insira o model que deseja utilizar no crud

class CharacteristicsController extends Controller
{
    private $controller;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->controller = "characteristics";
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $model = DB::table('characteristics')
                                ->where('name', 'LIKE', '%'.$_GET['search'].'%')
                                ->get();
        }else{
            $model = Model::get();
        }

        return view($this->controller.'.index')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function addNew(){
        $model = new Model;
        return view($this->controller.'.formData')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function edit($id){
        $model = Model::find($id);        
        return view($this->controller.'.formData')->with(array('data'=>$model, 'controller' => $this->controller));
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
            return Redirect::to('characteristics')
                ->withErrors($validator);

        } else {
            $user = User::find(Auth::user()->id);
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            if(strlen($request->input('password')) > 0){
                $user->password = bcrypt($request->input('password'));
            }
            $user->save();
            return Redirect::to('characteristics');
        }
    }

    public function save(Request $request){
        
        $rules = array(
            'name'          => 'required',
            'description'          => 'required',
            'type'          => 'required'
        );

        $imagemEdit = false;

        $model = new Model;
        if(is_numeric($request->input('id')) && $request->input('id') > 0){
            $model = Model::find($request->input('id'));

            if($request->image != $request->input('old-image-name') && $request->image!=''){
                $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024';          
                $imagemEdit = true;
            }
        }else{
            $rules['image'] = 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024';
        }

        

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            // get the error messages from the validator
            $messages = $validator->messages();         

            // redirect our user back to the form with the errors from the validator
            return Redirect::back()
                ->withErrors($validator);
        } else {
            if(is_numeric($request->input('id')) && $request->input('id') > 0){
                if($imagemEdit){
                    File::delete(public_path().'/images/'.$request->input('old-image-name'));
                    $imageName = time().'.'.$request->image->getClientOriginalExtension();
                    $request->image->move(public_path('images'), $imageName);                    
                }else{
                    $imageName = $model->icon; 
                }
            }else{
                $imageName = time().'.'.$request->image->getClientOriginalExtension();
                $request->image->move(public_path('images'), $imageName);

            }
            
            $model->name        = $request->input('name');
            $model->description = $request->input('description');
            $model->type        = $request->input('type');
            $model->icon       = $imageName;
            $model->save();
            return Redirect::to($this->controller);
        }
    }

    public function delete($id){
        $model = Model::find($id);
        File::delete(public_path().'/images/'.$model->icon);
        $model->delete();
        return Redirect::to($this->controller);
    }
}
