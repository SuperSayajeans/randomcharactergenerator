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
        $this->middleware('auth',['except'=>['sheet']]);
        $this->controller='characters';
    }

    public function cria_personagem($params) {
        $personagem = [
            'personal_charct_array' => [''],
            'social_charct_array' => [''],
            'description' => 'lorem ipsum'
        ];

        $characteristics = $personagem['personal_charct_array'];

        array_push($characteristics, $this->Affection($params));
        array_push($characteristics, $this->Obcession($params));
        array_push($characteristics, $this->Moral($params));
        array_push($characteristics, $this->Work($params));
        foreach ($this->Culture($params) as $culture) {
            array_push($characteristics, $culture);
        }
        foreach ($this->Adequation($params) as $adequation) {
            array_push($characteristics, $adequation);
        }
         foreach ($this->Difficulties($params) as $difficulties) {
            array_push($characteristics, $difficulties);
        }
        $personal = DB::table('characteristics')
                    ->whereIn('id',$characteristics)
                    ->where('type','=','0')
                    ->select('id')
                    ->get();
        $social = DB::table('characteristics')
                    ->whereIn('id',$characteristics)
                    ->where('type','=','1')
                    ->select('id')
                    ->get();
        //var_dump($personal);
        $per=array();
        $soc=array();
        for($i=0;$i<count($personal);$i++){
            array_push($per, $personal[$i]->id);
        }
        for($i=0;$i<count($social);$i++){
            array_push($soc, $social[$i]->id);
        }

        $personagem['personal_charct_array'] = $per;
        $personagem['social_charct_array'] = $soc;

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
                                ->where('char_name', 'LIKE', '%'.$_GET['search'].'%')
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
                        ->where('id','=',$id)
                        ->first();
        $creator = DB::table('users')
                        ->where('id','=',$model->id_user)
                        ->first();
        $soc=explode(',',$model->social_charct_array);
        $per=explode(',',$model->personal_charct_array);
        $personal = DB::table('characteristics')->whereIn('id',$per)->get();
        $social = DB::table('characteristics')->whereIn('id',$soc)->get();
        $comments = DB::table('comments')
                        ->where('id_character','=',$id)
                        ->get();
        return view($this->controller.'.sheet')->with(array('data'=>$model, 'creator'=>$creator, 'personal'=>$personal, 'social'=>$social, 'comments'=>$comments, 'controller' => $this->controller));
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
                $request->input('lawfulness'),
                $request->input('fat'),
                $request->input('height'),
                $request->input('strenght')
            ];

            $personagem=$this->cria_personagem($params);
            var_dump($personagem);

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
            $character->personal_charct_array = implode(',',$personagem['personal_charct_array']);
            $character->social_charct_array = implode(',',$personagem['social_charct_array']);
            if($request->input('description')){
                $character->description = $request->input('description');                      
            }else {
                $character->description = '';                         
            }
            
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

        } else if($character->id_user!=Auth::user()->id){
            return Redirect::to('characters')
                ->withErrors('Você não pode alterar os dados de um personagem criado por outra pessoa');
        }else{
            $character->char_name = $request->input('name');
            $character->race = $request->input('race');
            $character->sex = $request->input('sex');
            $character->description = $request->input('description');
            $character->save();
            return Redirect::to('characters');
        }
    }

    public function delete($id){
        $model = Model::find($id);
        $model->delete();
        return Redirect::to($this->controller);
    }

    public static function Affection($params) {
        if(rand(0, 100) < 30) { //Tem uma paixão?
            if($params[6] > 7 || $params[3] < 3) {
                return '4'; //Paixão doentia
            }
        }
        else if($params[6] < 2)
                return '65'; //Solitário
        else if($params[6] > 7 || $params[3] < 3)
                return '35'; //Aversão à rejeição
        else if(($params[5] > 7 || $params[3] < 3))
                return '36'; //Libidinoso
    }

    public static function Obcession($params) {
        if(rand(0, 100) < 60) { //Tem uma obcessão?
            if($params[6] > 6 || $params[8] > 8  || $params[10] < 3)
                return '5'; //Vingança
        else if($params[6] > 5 || $params[3] < 4 || $params[8] < 2)
                return 6; //Devoção à causa
        else if($params[5] > 6 || $params[7] < 4 || $params[10] < 4)
                return '7'; //Competitivo
        else if($params[3] < 4 || $params[8] > 6)
                return '9'; //Ilusões de Grandeza
        else if($params[3] > 7 || $params[7] < 3 || $params[9] > 5)
                return '12'; //Conquistador
        else    return '10'; //Unidade Familiar
        }
    }

    public static function Moral($params) {
        if(rand(0, 100) < 50) { //Segue a moral ou não?
            if($params[8] < 4 || $params[10] > 6)
                return '13';  //Código do Herói
            else if($params[5] < 5 || $params[7] > 4 || $params[10] > 6)
                return '15'; //Subordinado à autoridades
            else if(($params[10] > 7 || $params[7] < 3))
                return '21'; //Censurador
            else if($params[4] < 5 || $params[5] > 7 || $params[8] < 2)
                return '20'; //Justiceiro
            else if(($params[8] < 6))
                return '26'; //Empático
        }
        else {
        if($params[5] > 5 || $params[4] < 4 || $params[10] < 4)
                return '14'; //Corrupção
        else if($params[5] > 7 || $params[6] < 4 || $params[8] > 7)
                return '18'; //Os fins justificam os meios
        else if(($params[8] > 8 || $params[3] > 8))
                return '19'; //Megalomaniaco
        else if($params[5] > 7 || $params[8] > 7 || $params[10] < 3)
                return '22'; //Cruel
        else if($params[6] > 7 || $params[10] < 3 || $params[5] > 7)
                return '23'; //Sadista
        else if(($params[8] > 6 || $params[5] < 4))
                return '24'; //Manipulador
        else if($params[8] > 7 || $params[6] < 3 || $params[3] > 7)
                return '25'; //Traidor
        else if(($params[3] > 8 || $params[8] > 7))
                return '27'; //Mão-de-Vaca
        }
    }

    public static function Work($params) {
        $results = rand(0, 100); //O que ele faz pra sobreviver?
        if($results < 20)
                return '59'; //Mago
        else if($results > 19 && $results < 40)
                return '57'; //Guerreiro
        else if($results > 39 && $results < 60)
                return '56'; //Agricultor
        else if($results > 59 && $results < 80)
                return '58'; //Artesão
        else return '62'; //Preguiçoso
    }

    public static function Culture($params) {
        $culture = [''];
        if(rand(0, 100) < 40) {
            if($params[4] > 7 || $params[9] > 7)
                array_push($culture, '72');  //Piadista
        }
        if(rand(0, 100) < 30) {
            if($params[3] > 7 || $params[7] < 2 || $params[5] > 7)
                array_push($culture, '71');  //Explosivo
        }
        if(rand(0, 100) < 30) {
            if($params[3] < 2 || $params[7] > 7 || $params[5] < 2)
                array_push($culture, '70');  //Implosivo
        }
        if(rand(0, 100) < 30) {
            if($params[9] > 7 || $params[7] < 3 || $params[10] < 3)
                array_push($culture, '69');  //Intimidador
        }
        if(rand(0, 100) < 30) {
            if($params[9] > 6 || $params[8] < 4)
                array_push($culture, '17'); //Propagador de ideais
        }
        if(rand(0, 100) < 50) {
            if($params[3] < 3 || $params[5] < 3 || $params[6] < 3)
                array_push($culture, '68');  //Mascara Emocional
        }
        if(rand(0, 100) < 40) {
            if($params[5] < 3 || $params[7] > 7)
                array_push($culture, '67');  //Apego à fé
        }
        if(rand(0, 100) < 50) {
            if($params[6] < 3 || $params[8] > 7)
                array_push($culture, '64');  //Frieza
        }
        if(rand(0, 100) < 40) {
            if($params[5] < 3 || $params[10] > 7)
                array_push($culture, '63');  //Organizado
        }
        if(rand(0, 100) < 40) {
            if($params[5] > 7 || $params[6] > 7)
                array_push($culture, '61');  //Hedonista
        }
        if(rand(0, 100) < 30) {
            if($params[10] > 7 || $params[5] < 3)
                array_push($culture, '60');  //Higiênico
        }
        if(rand(0, 100) < 40) {
            if($params[5] < 3 || $params[4] < 3)
                array_push($culture, '55');  //Aversão ao estrangeiro
        }
        if(rand(0, 100) < 40) {
            if($params[5] > 7 || $params[10] < 3 || $params[8] > 7 || $params[6] > 7)
                array_push($culture, '39');  //Violento
        }
        return array_slice($culture, 1);
    }

    public static function Adequation($params) {
        $adequation = [''];
        if(rand(0, 100) < 30) {
            if($params[10] < 3 && $params[5] > 7)
                array_push($adequation, '66');  //Criminoso
        }
        if(rand(0, 100) < 15) {
                array_push($adequation, '11');  //Desvio Sexual
        }
        if(rand(0, 100) < 30) {
            $results = rand(0, 100);
                if($results > 20)
                    array_push($adequation, '54');  //Boa fama
                else
                    array_push($adequation, '49');  //Reverenciado
        }
        if(rand(0, 100) < 50) {
            if($params[11] > 3 && $params[11] < 7 || $params[12] > 3 && $params[12] < 7 || $params[13] > 3 && $params[13] < 7)
                array_push($adequation, '53');  //Beleza Incomparável
        }
        if(rand(0, 100) < 30) {
            if($params[13] > 7)
                array_push($adequation, '52');  //Aparência aterradora
        }
        if(rand(0, 100) < 30) {
            if($params[13] < 3)
                array_push($adequation, '51');  //Aparência inofensiva
        }
        if(rand(0, 100) < 30) {
            if($params[7] < 3 || $params[8] > 7 || $params[10] < 3)
                array_push($adequation, '50');  //Mal educado
        }
        if(rand(0, 100) < 35) {
            $results = rand(0, 100);
                if($results < 20)
                    array_push($adequation, '47');  //Perseguido
                else {
                    if ($results > 19 && $results < 70 )
                        array_push($adequation, '46');  //Fora dos padrões
                    else
                        array_push($adequation, '48');  //Má fama
                }
        }
        return array_slice($adequation, 1);
    }

    public static function Difficulties($params) {
        $difficulties = [''];
        if(rand(0, 100) < 20) {
            $results = rand(0, 100);
                if($results < 70)
                    array_push($difficulties, '45');  //Amaldiçoado
                if($results > 69 && $results < 75 )
                    array_push($difficulties, '41');  //Autista
                if($results > 74 && $results < 85 )
                    array_push($difficulties, '40');  //Doente Crônico
                if($results > 84 && $results < 95 )
                    array_push($difficulties, '38');  //Cego
                if($results > 95)
                    array_push($difficulties, '37');  //Amputado
        }
        if(rand(0, 100) < 20) {
            if(($params[5] < 4 || $params[6] > 7) && $params[4] < 3)
                array_push($difficulties, '44');  //Paranóia
        }
        if(rand(0, 100) < 20) {
            if(($params[4] < 3 || $params[6] < 4) && $params[3] < 3)
                array_push($difficulties, '43');  //Depressivo
        }
        if(rand(0, 100) < 30) {
            if($params[4] < 3 || $params[6] > 6)
                array_push($difficulties, '42');  //Traumatizado
        }
        if(rand(0, 100) < 20) {
            if($params[3] < 3 || $params[5] < 3)
                array_push($difficulties, '34');  //Dificuldade para se auto-afirmar
        }
        if(rand(0, 100) < 20) {
            if($params[3] < 3 && $params[7] > 4)
                array_push($difficulties, '33');  //Complexo de inferioridade
        }
        if(rand(0, 100) < 20) {
            if($params[6] > 7 || $params[10] < 3 || $params[4] < 3)
                array_push($difficulties, '32');  //Transtorno Alimentar
        }
        if(rand(0, 100) < 30) {
            if($params[8] > 7 || $params[5] < 3)
                array_push($difficulties, '31');  //Aversão à mudanças
        }
        if(rand(0, 100) < 20) {
            if($params[3] < 4 || $params[6] > 7 || $params[9] < 3)
                array_push($difficulties, '30');  //Dependência do Círculo Social
        }
        if(rand(0, 100) < 20) {
            if($params[4] < 4 || $params[3] < 3 || $params[5] > 7)
                array_push($difficulties, '29');  //Viciado em substância
        }
        if(rand(0, 100) < 20) {
            if($params[4] < 4 || $params[3] < 3 || $params[8] > 7)
                array_push($difficulties, '28');  //Alcoólatra
        }
        return array_slice($difficulties, 1);
    }
}
