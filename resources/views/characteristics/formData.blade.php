@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
@if(Auth::user()->type==2)
<section class="content-header">
    <h1>Características</h1>
</section>

<!-- Main content -->
<section class="content">
<!-- Default box -->
    <div class="box box-primary">
        <div class="box-header with-border">
          <h3 class="box-title">Adicionar/Editar Característica</h3>  
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
                  <label for="image">Imagem</label> 
                  <input type="file" class="input-image" id="image" name="image" accept="image/*">
                  <input type="hidden" name="old-image-name" value="{{ sizeof($errors) > 0 ? old('icon') : $data->icon}}">
                  <?php
                  if(strlen($data->icon) > 0){
                  ?>
                  <img class="icon-fix" src="{{ url('public/images/'.$data->icon) }}">
                  <?php
                  }
                  ?>
                  @if ($errors->has('icon'))
                      <span class="help-block">
                          <strong>{{ $errors->first('icon') }}</strong>
                      </span>
                  @endif
                </div>

                <div class="form-group">
                  <label for="type">Tipo nº</label>                  
                  <input type="number" class="form-control" id="type" name="type" placeholder="Tipo" value="{{ sizeof($errors) > 0 ? old('type') : $data->type}}">
                  @if ($errors->has('type'))
                      <span class="help-block">
                          <strong>{{ $errors->first('type') }}</strong>
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
