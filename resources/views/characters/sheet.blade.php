@extends('layouts.app')

@section('content')
<!-- <div id="rectangle" style="width:880px; height:150px; border-style: solid; border-color: #924DCD; float: right">
<div style="height:20px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; font-size: 15px; font-family: verdana;"> 
</div>
<div style="color: #924DCD; font-size: 20px; font-family: verdana;"> -->
<!-- <div id="rectangle" style="width:880px; height:150px; border-style: solid; border-color: #924DCD"> -->
<!--<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana; float: right;"> </div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana;"></div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana; float: right;"> </div>
<div style="width:435px; height:69px; border-style: solid; border-color: #924DCD; color: #924DCD; text-align: center; line-height: 70px; font-size: 30px; font-family: verdana;"></div> -->
Nome do Personagem: {{ $data->char_name }}
<br>
	Raça: 
	@if($data->race==1)
	Humano
	@endif
	@if($data->race==2)
	Anão
	@endif
	@if($data->race==3)
	Elfo
	@endif
	@if($data->race==4)
	Orc
	@endif
	@if($data->race==5)
	Hobbit
	@endif
	<br>
	Gênero: <?php echo $data->sex == 'male' ? "Masculino" : "Feminino"; ?>
	<br>
	Criador: {{ $creator->name }}
</div>

<!--<div id="rectangle" style="width:100%; height:250px; border-style: solid; border-color: #924DCD;">
<img src="http://i.imgur.com/u5dLCOC.pngC" alt="Images" height="100%" width="100%">
</div>-->
<div class="container">
	<h2 class="title-sheet"> Parâmetros </h2>
	<div class="traits-wrapper">
		<h3>Parâmetros Psicológicos</h3>
		<div class="trait">
			<span>Auto-Depreciativo</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->self_esteem}}0%;"></div>
			</div>
			<span>Auto-Confiante</span>
		</div>
		<div class="trait">
			<span>Caótico</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->lawfulness}}0%;"></div>
			</div>
			<span>Ordeiro</span>
		</div>
		<div class="trait">
			<span>Pessimista</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->optimism}}0%;"></div>
			</div>
			<span>Otimista</span>
		</div>
		<div class="trait">
			<span>Averso ao Risco</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->risk}}0%;"></div>
			</div>
			<span>Amante ao Risco</span>
		</div>
		<div class="trait">
			<span>Lógico</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->emotional}}0%;"></div>
			</div>
			<span>Emocional</span>
		</div>
		<div class="trait">
			<span>Humilde</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->arrogance}}0%;"></div>
			</div>
			<span>Arrogante</span>
		</div>
		<div class="trait">
			<span>Egoísta</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->selfishness}}0%;"></div>
			</div>
			<span>Altruísta</span>
		</div>
		<div class="trait">
			<span>Extrovertido</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->introversion}}0%;"></div>
			</div>
			<span>Introvertido</span>
		</div>
		<h3>Parâmetros Físicos</h3>
		<div class="trait">
			<span>Magro</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->fat}}0%;"></div>
			</div>
			<span>Gordo</span>
		</div>
		<div class="trait">
			<span>Baixo</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->height}}0%;"></div>
			</div>
			<span>Alto</span>
		</div>
		<div class="trait">
			<span>Fraco</span>
			<div class="bar">
				<div class="cursor" style="left:{{$data->strenght}}0%;"></div>
			</div>
			<span>Forte</span>
		</div>
	</div>


	<h2 class="title-sheet"> Características </h2>

	<div id="rectangle">
		<div class="charct-block">
			<h3>Social</h3>
			<div class="characteristics-wrapper">
				@foreach($social as $socia)
				<div class="characteristic">
					<img src="{{ url('public/images/'.$socia->icon) }}" style="width: 32px;" alt="{{$socia->name}}" title="{{$socia->description}}">
					<br>
					{{$socia->name}}
				</div>
				@endforeach
			</div>
		<!--<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">-->
		</div>
		<div class="charct-block"> 
			<h3>Pessoal</h3>
			<div class="characteristics-wrapper">
				@foreach($personal as $persona)
				<div class="characteristic">
					<img src="{{ url('public/images/'.$persona->icon) }}" style="width: 32px;" alt="{{$persona->name}}" title="{{$persona->description}}">
					<br>
					{{$persona->name}}
				</div>
				@endforeach
			</div>
		<!--<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">
		<img src="http://i.imgur.com/8ZPsHfi.png" alt="Images">-->

		</div>
	</div>
	<?php if($data->description!=''){ ?>
		<h2 class="title-sheet"> Descrição </h2>
		<p>
			{{ $data->description }}
		</p>
	<?php } ?>
	<h2 class="title-sheet"> Comentários </h2>
	<div class="comments">
		@foreach($comments as $com)
		<div class="comment">
			<h3>{{$com->comment_name}}</h3>
			<h6>{{$com->created_at}}</h6>
			<p>{{$com->comment_text}}</p>
		</div>
		@endforeach
	</div>
	<form method="post" action="{{ url('/comment/add') }}">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{$data->id}}">
		<h3 class="title-sheet">Faça um comentário sobre <?php echo $data->sex == 'male' ? "o" : "a"; ?> personagem {{$data->char_name}} </h3>
		<div class="row">
			<div class="col-sm-6">
				<label for="name">Seu nome</label>
				<input type="text" class="form-control" name="name">
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<label for="comment">Seu comentário</label>
				<textarea class="form-control" name="comment" id="comment"></textarea>
			</div>
		</div>
		<div class="row">
			<div class="col-sm-6">
				<br>
				<button class="btn btn-primary btn-submit-comment">Enviar</button>
			</div>
		</div>
		
	</form>
</div>


@endsection
