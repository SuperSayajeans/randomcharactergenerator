@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
@if(Auth::user()->type==2)
<section class="content-header">
    <h1>Categorias</h1>
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Eventos</h3>  
        </div>
        <div class="box-body">

          <form action="{{ url('/'.$controller.'/save') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
              <input type="hidden" name="id" value="{{$data->id}}">
              <div class="box-body">
                
                <div class="form-group">
                  <label for="title">Nome</label>                  
                  <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ sizeof($errors) > 0 ? old('name') : $data->name}}">
                  @if ($errors->has('name'))
                      <span class="help-block">
                          <strong>{{ $errors->first('name') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="title">Descrição</label>                  
                  <textarea maxlenght="255" class="form-control" id="description" name="description" placeholder="Descrição">{{ sizeof($errors) > 0 ? old('description') : $data->description}}</textarea>
                  @if ($errors->has('description'))
                      <span class="help-block">
                          <strong>{{ $errors->first('description') }}</strong>
                      </span>
                  @endif
                </div>
                
                <div class="form-group">
                  <label for="title">Implicações</label>                  
                  <input type="text" class="form-control" id="implications" name="implications" placeholder="Implicações" value="{{ sizeof($errors) > 0 ? old('implications') : $data->implications}}">
                  @if ($errors->has('implications'))
                      <span class="help-block">
                          <strong>{{ $errors->first('implications') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="title">Chances</label>                  
                  <input type="text" class="form-control" id="chances" name="chances" placeholder="Chances" value="{{ sizeof($errors) > 0 ? old('chances') : $data->chances}}">
                  @if ($errors->has('chances'))
                      <span class="help-block">
                          <strong>{{ $errors->first('chances') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="title">Implicações Traumáticas</label>                  
                  <input type="text" class="form-control" id="traumatic_implications" name="traumatic_implications" placeholder="Implicações Traumáticas" value="{{ sizeof($errors) > 0 ? old('traumatic_implications') : $data->traumatic_implications}}">
                  @if ($errors->has('traumatic_implications'))
                      <span class="help-block">
                          <strong>{{ $errors->first('traumatic_implications') }}</strong>
                      </span>
                  @endif
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Salvar</button>
              </div>
            </form>
        </div>    
    </div>
    <!-- /.box -->
</section>
@else
  <div class="denied-access">
    <section class="content-header">
      <h1>Erro</h1>
    </section>
    <div class="content-wrapper">
      <section class="content">
        <div class="row">
          <div class="container">
            Somente o administrador do sistema pode ter acesso aos dados dessa página
          </div>
        </div>
      </section>
    </div>
  </div>
@endif
<!-- /.content -->
@endsection
