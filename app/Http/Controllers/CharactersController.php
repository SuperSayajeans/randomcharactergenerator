<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Auth;
use DB;
use App\User;
use App\Characters as Model; //insira o model que deseja utilizar no crud

class CharactersController extends Controller
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
        $this->controller='characters';
    }

    public static function cria_personagem($params) {
        $personagem = [
            'personal_charct_array' => [''],
            'social_charct_array' => [''],
            'description' => ''
        ];

        //roda o personagem com o vetor $params passado
        //preenche os 3 elementos do array $personagem de acordo com o resultado do algoritmo
        
        return $personagem;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=Auth::user();
        if(isset($_GET['search'])){
            $model = DB::table('characters')
                                ->where('name', 'LIKE', '%'.$_GET['search'].'%')
                                ->where('id_user','=',$user->id)
                                ->get();
        }else{
            $model = DB::table('characters')
                                ->where('id_user','=',$user->id)
                                ->get();
        }

        return view($this->controller.'.index')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function addNew(){
        $model = new Model;
        return view($this->controller.'.new')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function edit($id){
        $model = Model::find($id);        
        return view($this->controller.'.edit')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function sheet($id){
        $model = DB::table('characters')
                        ->join('users','users.id','=','characters.id_user')
                        ->first();        
        return view($this->controller.'.sheet')->with(array('data'=>$model, 'controller' => $this->controller));
    }

    public function save(Request $request){
        $rules = array(
            'name'                     => 'required',
            'race'                     => 'required',
            'sex'                      => 'required',
            'self-esteem'              => 'required',
            'orderness'               => 'required',
            'optimism'                 => 'required',
            'risk'                     => 'required',
            'emotion'                => 'required',
            'humility'                => 'required',
            'selfishness'              => 'required',   
            'extroversion'             => 'required',
            'fat'                      => 'required',
            'height'                   => 'required',
            'strenght'                   => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        $character = new Model;
        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('characters')
                ->withErrors($validator);

        } else {

            $params=[
                $request->input('name'),
                $request->input('race'),
                $request->input('sex'),
                $request->input('self-esteem'),
                $request->input('optimism'),
                $request->input('risk'),
                $request->input('emotion'),
                $request->input('humility'),
                $request->input('selfishness'),
                $request->input('extroversion'),
                $request->input('fat'),
                $request->input('height'),
                $request->input('strenght')
            ];

            //$personagem=cria_personagem($params);
            $personagem = [
                'personal_charct_array' => ['1','2','3'],
                'social_charct_array' => ['1','2','3'],
                'description' => 'lorem ipsum' 
            ];
            
            $character->char_name = $request->input('name');
            $character->id_user = Auth::user()->id;
            $character->race = $request->input('race');
            $character->sex = $request->input('sex');
            $character->self_esteem = $request->input('self-esteem');
            $character->lawfulness = $request->input('orderness');
            $character->optimism = $request->input('optimism');
            $character->risk = $request->input('risk');
            $character->emotional = $request->input('emotion');
            $character->arrogance = $request->input('humility');
            $character->selfishness = $request->input('selfishness');
            $character->introversion = $request->input('extroversion');
            $character->fat = $request->input('fat');
            $character->height = $request->input('height');
            $character->strenght = $request->input('strenght');
            $character->personal_charct_array = implode(',',$personagem['personal_charct_array']);     //<--falta preencher
            $character->social_charct_array = implode(',',$personagem['social_charct_array']);         //<--falta preencher
            $character->description = $personagem['description'];                         //<--falta preencher
            //var_dump($character);
            $character->save();
            return Redirect::to('characters');
        }
    }

    public function update(Request $request){
        $rules = array(
            'name'                     => 'required',
            'race'                     => 'required',
            'sex'                      => 'required'
        );
        
        $validator = Validator::make(Input::all(), $rules);

        $character = Model::find($request->input('id'));
        if ($validator->fails()) {            
            // get the error messages from the validator
            $messages = $validator->messages();            

            // redirect our user back to the form with the errors from the validator
            return Redirect::to('characters')
                ->withErrors($validator);

        } else {
            
            $character->char_name = $request->input('name');
            $character->id_user = Auth::user()->id;
            $character->race = $request->input('race');
            $character->sex = $request->input('sex');
            $character->save();
            return Redirect::to('characters');
        }
    }

    public function delete($id){
        $model = Model::find($id);
        $model->delete();
        return Redirect::to($this->controller);
    }
}
