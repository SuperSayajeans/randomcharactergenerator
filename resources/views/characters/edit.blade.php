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
          <h3 class="box-title">Editar Personagem</h3>  
        </div>
        <div class="box-body">
  
          <form action="{{ url('/'.$controller.'/update') }}" method="post" enctype="multipart/form-data" >
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" value="{{ $data->id }}" name="id">
                    <div class="col-md-8">
                        <div class="form-group">
                            <label for="name" class="control-label">Nome do Personagem:</label>
                            <input type="text" value="{{ $data->char_name }}" class="form-control" name="name">
                        </div>
                        <div class="form-group">
                            <label for="race" class="control-label">Raça:</label>
                            <select class="form-control" name="race">
                                <option value="">Selecione</option>
                                <option value="1" <?php echo $data->race == '1' ? "selected='selected'" : ''; ?> >Humano</option>
                                <option value="2" <?php echo $data->race == '2' ? "selected='selected'" : ''; ?> >Anão</option>
                                <option value="3" <?php echo $data->race == '3' ? "selected='selected'" : ''; ?> >Elfo</option>
                                <option value="4" <?php echo $data->race == '4' ? "selected='selected'" : ''; ?> >Orc</option>
                                <option value="5" <?php echo $data->race == '5' ? "selected='selected'" : ''; ?> >Hobbit</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="options-1" class="control-label">Sexo</label>
                            <br>
                            <label class="radio-inline"><input name="sex" <?php echo $data->sex == 'male' ? "checked='checked'" : ''; ?> type="radio" value="male">Masculino</label>
                            <label class="radio-inline"><input name="sex" <?php echo $data->sex == 'female' ? "checked='checked'" : ''; ?> type="radio" value="female">Feminino</label>
                        </div>
                        <div class="row row-bars">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Introvertido</label>
                                    <input type="range" disabled value="{{ $data->introversion }}" class="rangeselector" name="extroversion" min="0" max="10">
                                    <label>Extrovertido</label>
                                </div>
                                <div class="form-group">
                                    <label>Auto-Depreciativo</label>
                                    <input type="range" disabled value="{{ $data->self_esteem }}" class="rangeselector" name="self-esteem" min="0" max="10">
                                    <label>Auto-Confiante</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Caótico</label>
                                    <input type="range" disabled value="{{ $data->lawfulness }}" class="rangeselector" name="orderness" min="0" max="10">
                                    <label>Ordeiro</label>
                                </div>
                                <div class="form-group">
                                    <label>Pessimista</label>
                                    <input type="range" disabled value="{{ $data->optimism }}" class="rangeselector" name="optimism" min="0" max="10">
                                    <label>Otimista</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Amante ao Risco</label>
                                    <input type="range" disabled value="{{ $data->risk }}" class="rangeselector" name="risk" min="0" max="10">
                                    <label>Averso ao Risco</label>
                                </div>
                                <div class="form-group">
                                    <label>Arrogante</label>
                                    <input type="range" disabled value="{{ $data->arrogante }}" class="rangeselector" name="humility" min="0" max="10">
                                    <label>Humilde</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Altruista</label>
                                    <input type="range" disabled value="{{ $data->selfishness }}" class="rangeselector" name="selfishness" min="0" max="10">
                                    <label>Egoísta</label>
                                </div>
                                <div class="form-group">
                                    <label>Lógico</label>
                                    <input type="range" disabled value="{{ $data->emotion }}" class="rangeselector" name="emotion" min="0" max="10">
                                    <label>Emotivo</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Magro</label>
                                    <input type="range" disabled value="{{ $data->fat }}" class="rangeselector" name="fat" min="0" max="10">
                                    <label>Gordo</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Baixo</label>
                                    <input type="range" disabled value="{{ $data->height }}" class="rangeselector" name="height" min="0" max="10">
                                    <label>Alto</label>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Fraco</label>
                                    <input type="range" disabled value="{{ $data->strenght }}" class="rangeselector" name="strenght" min="0" max="10">
                                    <label>Forte</label>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Atualizar Personagem</button>
                    </div>
                </div>
            </form>
        </div>    
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->
@endsection
