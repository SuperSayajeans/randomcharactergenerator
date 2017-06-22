<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;


use App\Events as Model; //insira o model que deseja utilizar no crud

class EventsController extends Controller
{

    private $controller;

    public function __construct()
    {
        $this->middleware('auth');
        $this->controller = "events"; //digite o nome do controller, ele é usado na url e para a pasta das views
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(isset($_GET['search'])){
            $model = DB::table('events')
                                ->where('name', 'LIKE', '%'.$_GET['search'].'%')
                                ->get();
        }else{
            $model = Model::get();
        }

        return view('events.index')->with(array('data'=>$model, 'controller' => 'events'));
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
            'name'                     => 'required',                        // just a normal required validation
            'implications'             => 'required',
            'chances'                  => 'required',
            'traumatic_implications'   => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('events')
                ->withErrors($validator);

        } else {
            $event = Events::find(Auth::event()->id);
            $event->name = $request->input('name');
            $event->implications = $request->input('implications');
            $event->chances = $request->input('chances');
            $event->traumatic_implications = $request->input('traumatic_implications');
            $event->save();
            return Redirect::to('events');
        }
    }
    public function save(Request $request){

        $rules = array(
            'name'                     => 'required',                        // just a normal required validation
            'implications'             => 'required',
            'description'             => 'required',
            'chances'                  => 'required',
            'traumatic_implications'   => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        $event = new Model;
        if(is_numeric($request->input('id')) && $request->input('id') > 0){
            $event = Model::find($request->input('id'));
        }

        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('events')
                ->withErrors($validator);

        } else {
            
            $event->name = $request->input('name');
            $event->description = $request->input('description');
            $event->implications = $request->input('implications');
            $event->chances = $request->input('chances');
            $event->traumatic_implications = $request->input('traumatic_implications');
            //var_dump($event);
            $event->save();
            return Redirect::to('events');
        }
    }

    public function delete($id){
        $model = Model::find($id);
        $model->delete();
        return Redirect::to($this->controller);
    }
}
