@extends('layouts.app')

@section('content')
<!-- Content Header (Page header) -->
<section class="content-header">
    <h1>Meus Personagens</h1>
</section>

<!-- Main content -->
<div class="content-wrapper">
<section class="content">
 
  <div class="row">
    <div class="col-xs-12">
      <div class="box">
        <div class="box-header">
          <a href="{{ url('/'.$controller.'/new') }}" class="btn btn-primary btn-sm pull-left" >Novo Personagem</a>
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
              <th>Data de Criação</th>
              <th>Ações</th>
            </tr>
            @if(count($data) > 0)
              @foreach($data as $d)
                <tr>
                  <td>{{ $d->char_name }}</td>
                  <td>{{ $d->created_at }}</td>
                  <?php //var_dump($d); ?>
                  <td>
                    <a href="{{ url('/'.$controller.'/edit/'.$d->id) }}">Editar</a> |
                    <a href="{{ url('/'.$controller.'/ficha/'.$d->id) }}">Ver Ficha</a> |
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
<!-- /.content -->
@endsection
