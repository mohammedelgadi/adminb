@extends('layout')

@section('header')
<!--

<link rel="stylesheet" type="text/css" href="{{{ asset('bootstrap-tags.css') }}}" />

-->

@stop

@section('content')


<h3 class="page-header">Ajouter un nouveau client</h3>

<div class="panel-body">
	<div class="row">
		<div class="col-lg-6">
			<form role="form" method="POST" action="/client/add" id="formID" enctype="multipart/form-data">
				{!! csrf_field() !!}
				<div class="form-group">
					<label>Nom du client</label>
					<input class="form-control" name="nom" value="{{ old('nom') }}" >
					<p class="help-block">Example block-level help text here.</p>
				</div>
				<div class="form-group">
					<label>Prenom</label>
					<input class="form-control" value="{{ old('prenom') }}"  name="prenom" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>email</label>
					<input class="form-control" value="{{ old('email') }}"  name="email" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>Image : </label>
					<input type="file" name="image" value="{{ old('image') }}">
				</div>
				<div class="form-group">
					<label>tel portable</label>
					<input class="form-control" value="{{ old('tel_portable') }}"  name="tel_portable" placeholder="telephone portable">
				</div>
				<div class="form-group">
					<label>tel fixe</label>
					<input class="form-control"  value="{{ old('tel_fixe') }}" name="tel_fixe" placeholder="telephone fixe">
				</div>
				<div class="form-group">
					<label>Commentaire</label>
					<textarea class="form-control" name="commentaire" rows="3">{{ old('commentaire') }}</textarea>
				</div>

				<input id="hiddenfield" name="langues" hidden="true"></input>

				<button id="send" type="submit" class="btn btn-outline btn-primary">Ajouter</button>
				<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>
			</form>

			<hr>


		</div>
		<div class="col-lg-6">
			@if(count($errors))
			<ul>
				@foreach($errors->all() as $error)
				<div class="alert alert-danger">
					{{$error}}
				</div>
				@endforeach
			</ul>

			@endif

			@if(isset($nom))
			<div class="alert alert-success">
				Le nouveau client <b> {{ $nom }} {{ $prenom }} </b> a été ajouté à la base de donnée.
			</div>
			@endif
		</div>
	</div>
	<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->





@stop

@section('footer')

<!--
<script src='{{{ asset("bootstrap-tags.js") }}}'></script>

<script type="text/javascript">
	$(function(){
		$("#suggestOnClick").tags({
			restrictTo: ["alpha", "bravo", "charlie", "delta", "echo", "foxtrot", "golf", "hotel", "india"],
			suggestions: ["alpha", "bravo", "charlie", "delta", "echo", "foxtrot", "golf", "hotel", "india"],
			promptText: "Click here to add new language",
			suggestOnClick: true
		});
	});

	$(function () {
		$("#send").on("click", function () {
			$("#hiddenfield").val($("#suggestOnClick").text());

			alert($("#hiddenfield").val());

			$("form#formID").submit();
		});
	});

</script>

-->



@stop