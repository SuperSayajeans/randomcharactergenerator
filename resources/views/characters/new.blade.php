@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Personagens</h1>
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Adicionar Personagem</h3>  
        </div>
        <div class="box-body">
  
          <form action="{{ url('/'.$controller.'/save') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
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
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fraco</label>
                                    <input type="range" class="rangeselector" name="strenght" min="0" max="10">
                                    <label>Forte</label>
                                </div>
                            </div>
                        </div>
                        <!--<div class="form-group">
                            <label for="options-1" class="control-label">Opções Checkbox</label>
                            <br>
                            <label class="checkbox-inline"><input name="chec" type="checkbox" value="">Opção 1</label>
                            <label class="checkbox-inline"><input name="chec" type="checkbox" value="">Opção 2</label>
                            <label class="checkbox-inline"><input name="chec" type="checkbox" value="">Opção 3</label>
                        </div>
                        <div class="form-group">
                            <label for="options-1" class="control-label">Opções Checkbox</label>
                            <br>
                            <label class="checkbox-inline"><input name="chec2" type="checkbox" value="">Opção 1</label>
                            <br>
                            <label class="checkbox-inline"><input name="chec2" type="checkbox" value="">Opção 2</label>
                            <br>
                            <label class="checkbox-inline"><input name="chec2" type="checkbox" value="">Opção 3</label>
                        </div>
                        <div class="form-group">
                            <label for="options-1" class="control-label">Opções Radio</label>
                            <br>
                            <label class="radio-inline"><input name="rad" type="radio" value="">Opção 1</label>
                            <label class="radio-inline"><input name="rad" type="radio" value="">Opção 2</label>
                            <label class="radio-inline"><input name="rad" type="radio" value="">Opção 3</label>
                        </div>-->
                        <button type="button" class="btn btn-warning btn-randomize">Randomizar</button>
                        <button type="submit" class="btn btn-primary">Gerar!</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection
