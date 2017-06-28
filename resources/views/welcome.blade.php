<!doctype html>
<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link href="{{ asset('public/css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/main.css') }}" rel="stylesheet">
        <link href="{{ asset('public/css/theme.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #F2B06E;
                color: #924DCD;
                font-family: 'Raleway', sans-serif;
                font-weight: 400;
                height: 100vh;
                margin: 0;
            }

            .header {
                background-color: #F1904E;
                color: #421D7D;
                display: block;
                width: 100%;
                padding-top: 10px;
            }

            .header ::after{
                clear: both;
            }

            .header a {
                color: #1265B1;
                text-decoration: underline;
                font-weight: 700;
            }

            .field-wrapper-wrapper {
                padding-right: 0;
            }

            .field-wrapper {
                width: 48%;
                display: inline-block;
            }

            footer {
                margin-top: 50px;
                background-color: #C05020;
            }

            .inline-block {
                display: inline-block;
            }

            /*.flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }*/
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <header class="header">
                @if (Route::has('login'))
                    <div class="top-right links">
                        <div class="container">

                            @if (Auth::check())
                                <a href="{{ url('/home') }}">Home</a>
                            @else
                                <form class="col-md-8 col-md-offset-4" role="form" method="POST" action="{{ route('login') }}">
                                    {{ csrf_field() }}

                                    <div class="col-md-10 field-wrapper-wrapper">
                                        <div class="field-wrapper {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <input id="email" type="email" class="form-control" name="email" placeholder="E-mail" value="{{ old('email') }}" required>

                                            @if ($errors->has('email'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('email') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                        <div class="field-wrapper {{ $errors->has('password') ? ' has-error' : '' }}">
                                            <input id="password" type="password" class="form-control" placeholder="Senha" name="password" required>

                                            @if ($errors->has('password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('password') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>

                                    <button type="submit" class="col-md-2 btn btn-primary">
                                        Entrar
                                    </button>
                              
                                    <div class="form-group">
                                        <div class="col-md-12">
                                            <div class="checkbox inline-block">
                                                <label>
                                                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> 
                                                    Lembrar de mim
                                                </label>
                                            </div>
                                            <a class="btn btn-link inline-block" href="{{ route('password.request') }}">
                                                Esqueci minha Senha
                                            </a>
                                            <a class="btn btn-link inline-block pull-right" href="{{ route('register') }}">
                                                Novo Usuário
                                            </a>
                                            
                                            
                                        </div>
                                    </div>
                                </form>
                                
                            @endif
                        </div>
                    </div>
                @endif
            </header>

            <div class="container">
                <h1>Sistema de Criação de Personagens Aleatórios</h1>
                <p>
                    Bem-vindo ao sistema de criação de personagens aleatórios. Com ele, é possível você criar seu próprio personagem, atribuindo-lhe nome, raça, sexo e parâmetros psicológicos (otimista ou pessimista, humilde ou arrogante, introvertido ou extrovertido etc.) e parâmetros físicos (gordo ou magro, fraco ou forte, alto ou baixo). 
                </p>
                <p>
                    Com os dados que você inseriu, o sistema vai gerar uma ficha do seu personagem contendo características que ele possui graças à forma como você criou ele.
                </p>
                <p>
                    Você pode adicionar uma descrição antes ou depois que o personagem foi criado, e você também pode mostrar a ficha dele para os seus amigos para que eles possam inserir comentários no seu personagem.
                </p>
                <p>
                    @if (Auth::guest())
                        Para criar um personagem, é necessário estar <a href="{{ route('login') }}">logado</a>. Não tem uma conta? <a href="{{ route('register') }}">Faça a sua agora</a>!
                    @else
                        Para criar um personagem novo, <a href="characters/new">clique aqui</a>.
                        <br>
                        Para ver sua lista de personagens, <a href="characters">clique aqui</a>.
                    @endif
                </p>
               
                <!--<form class="form-horizontal" method="POST" action="{{ route('login') }}">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <h1>Gerador de Personagens Aleatórios</h1>
                                <p>Preencha o formulário abaixo para criar um novo personagem</p>
                            </div>
                        </div>
                    </div>
                @if (Auth::guest())
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <span style="color: #D00; font-weight: 700;">Você precisa estar logado para poder salvar seu personagem!</span>
                            </div>
                        </div>
                    </div>
                @endif
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="name" class="control-label">Nome do Personagem:</label>
                                <input type="text" class="form-control" name="name">
                            </div>
                            <div class="form-group">
                                <label for="race" class="control-label">Raça:</label>
                                <select class="form-control" name="race">
                                    <option value="">Selecione</option>
                                    <option value="1">Humano</option>
                                    <option value="2">Anão</option>
                                    <option value="3">Elfo</option>
                                    <option value="4">Orc</option>
                                    <option value="5">Hobbit</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="options-1" class="control-label">Sexo</label>
                                <br>
                                <label class="radio-inline"><input name="sex" type="radio" value="male">Masculino</label>
                                <label class="radio-inline"><input name="sex" type="radio" value="female">Feminino</label>
                            </div>
                            <div class="row row-bars">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Introvertido</label>
                                        <input type="range" class="rangeselector" name="extroversion" min="0" max="10">
                                        <label>Extrovertido</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Auto-Depreciativo</label>
                                        <input type="range" class="rangeselector" name="self-esteem" min="0" max="10">
                                        <label>Auto-Confiante</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Caótico</label>
                                        <input type="range" class="rangeselector" name="orderness" min="0" max="10">
                                        <label>Ordeiro</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Pessimista</label>
                                        <input type="range" class="rangeselector" name="optimism" min="0" max="10">
                                        <label>Otimista</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Amante ao Risco</label>
                                        <input type="range" class="rangeselector" name="risk" min="0" max="10">
                                        <label>Averso ao Risco</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Arrogante</label>
                                        <input type="range" class="rangeselector" name="humility" min="0" max="10">
                                        <label>Humilde</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Altruista</label>
                                        <input type="range" class="rangeselector" name="selfishness" min="0" max="10">
                                        <label>Egoísta</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Lógico</label>
                                        <input type="range" class="rangeselector" name="emotion" min="0" max="10">
                                        <label>Emotivo</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Magro</label>
                                        <input type="range" class="rangeselector" name="fat" min="0" max="10">
                                        <label>Gordo</label>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Baixo</label>
                                        <input type="range" class="rangeselector" name="height" min="0" max="10">
                                        <label>Alto</label>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="btn btn-warning btn-randomize">Randomizar</button>
                            <button type="submit" class="btn btn-primary">Gerar!</button>
                        </div>
                    </div>
                </form>-->
            </div>
        </div>
        <footer class="text-center" style="color: white; font-weight: 700; padding: 5px 0;">
            ACH1234 - Soluções Web
        </footer>
        <script type="text/javascript" src="{{ asset('public/js/jquery-3.2.1.min.js') }}"></script>
        <script type="text/javascript" src="{{ asset('public/js/main.js') }}"></script>
    </body>
</html>
