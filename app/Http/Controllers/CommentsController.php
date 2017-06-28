<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use DB;


use App\Comments as Model; //insira o model que deseja utilizar no crud

class CommentsController extends Controller
{

    private $controller;

    public function __construct()
    {}

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function save(Request $request){

        $rules = array(
            'name' => 'required',                        // just a normal required validation
            'comment' => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        $event = new Model;
        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('Comments')
                ->withErrors($validator);

        } else {
            
            $event->comment_name = $request->input('name');
            $event->comment_text = $request->input('comment');
            $event->id_character = $request->input('id');
            $event->save();
            return Redirect::to('characters/ficha/'.$event->id_character);
        }
    }

    public function delete($id,$id_char){
        $model = Model::find($id);
        $model->delete();
        return Redirect::to('characters/ficha/'.$id_char);
    }
}
