@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
@if(Auth::user()->type==2)
<section class="content-header">
    <h1>Eventos</h1>
</section>

<!-- Main content -->
<div class="content-wrapper">
<section class="content">
 
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="{{ url('/'.$controller.'/new') }}" class="btn btn-primary btn-sm pull-left" >Novo Evento</a>
          <div class="pull-right box-tools">      
            <form action="{{ url('/'.$controller) }}" method="get">      
              <div class="input-group input-group-sm" style="width: 300px;">
                
                <input type="text" name="search" class="form-control pull-right" placeholder="Buscar">
                <div class="input-group-btn">                
                  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                </div>
              </div>
            </form>

          </div>

        </div>
        <div class="clearfix"></div>
        <!-- /.box-header -->
        <div class="box-body table-responsive no-padding">
          <table class="table table-hover">
            <tr>            
              <th>Nome</th>
              <th>Descrição</th>
              <th>Ações</th>
            </tr>
            @if(count($data) > 0)
              @foreach($data as $d)
                <tr>
                  <td>{{ $d->name }}</td>
                  <td>{{ $d->description }}</td>
                  <td>
                    <a href="{{ url('/'.$controller.'/edit/'.$d->id) }}">Editar</a> |
                    <a href="{{ url('/'.$controller.'/delete/'.$d->id) }}" delete-link>Excluir</a>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan='3'>
                  Nenhum registro foi encontrado.
                </td>
              </tr>
            @endif            
          </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>
  </div>
  
</section>
</div>
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
