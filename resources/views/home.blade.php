@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Bem vindo(a), {{ Auth::user()->name }}.</div>

                <div class="panel-body">
                    <a href="profile">Meu Perfil</a>
                    <br>
                    <a href="characters">Meus personagens</a>
                    <br>
                    @if(Auth::user()->type==2)
                        <div>
                        <!-- <p><strong>Gerenciar Elementos</strong></p> -->
                        <a href="events">Eventos</a>
                        <br>
                        <a href="characteristics">Características</a>
                        </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
