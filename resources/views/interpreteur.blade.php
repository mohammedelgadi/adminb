@extends('layout')

@section('header')


<!--<link rel="stylesheet" type="text/css" href="{{{ asset('bootstrap-tags.css') }}}" />-->
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">

<style type="text/css">

	.modal-header-danger {
		color:#fff;
		padding:9px 15px;
		border-bottom:1px solid #eee;
		background-color: #d9534f;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}

	.modal-header-success {
		color:#fff;
		padding:9px 15px;
		border-bottom:1px solid #eee;
		background-color: #5cb85c;
		-webkit-border-top-left-radius: 5px;
		-webkit-border-top-right-radius: 5px;
		-moz-border-radius-topleft: 5px;
		-moz-border-radius-topright: 5px;
		border-top-left-radius: 5px;
		border-top-right-radius: 5px;
	}l

</style>
@stop

@section('content')

<form role="form" method="POST" action="/interpreteur/add" id="formID" enctype="multipart/form-data">

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
				{!! csrf_field() !!}
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="form-group">
							<label>Nom de l'interpreteur</label>
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
							<input type="file" name="image">
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
							<label>tel fixe</label>
							<input class="form-control"  value="{{ old('tel_fixe') }}" name="tel_fixe" placeholder="telephone fixe">
						</div>
						<!--
						<div class="form-group">
							<label>Langues</label>
							<div name="mamot" id="suggestOnClick"></div>

						</div>
						-->
						<div class="form-group">
							<label>Commentaire</label>
							<textarea class="form-control" name="commentaire" rows="3">{{ old('commentaire') }}</textarea>
						</div>

						<!--<input id="hiddenfield" name="langues" hidden="true"></input>-->

						<button id="send" type="submit" class="btn btn-outline btn-primary">Ajouter</button>
						<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>


						<hr>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<div>
							<div class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Langue initiale 1: </label>
											<select class="form-control" name="langue_ini">
												<option value=""></option>
												@foreach($langues as $langue)
												@if($langue->id == old('langue_ini'))
												<option value="{{$langue->id}}" selected>{{$langue->content}}</option>
												@else
												<option value="{{$langue->id}}">{{$langue->content}}</option>

												@endif
												@endforeach
											</select>
										</div>
									</div>
									<div class="col-lg-6">
										<div class="form-group">
											<label>Langue destination 1: </label>
											<select class="form-control" name="langue_dest" >
												<option value=""></option>
												@foreach($langues as $langue)
												@if($langue->id == old('langue_dest'))
												<option value="{{$langue->id}}" selected>{{$langue->content}}</option>
												@else
												<option value="{{$langue->id}}">{{$langue->content}}</option>

												@endif
												@endforeach
											</select>
										</div>
									</div>
								</div>
							</div>
							<div class="form-group">
								<label>Adresse</label>
								<input class="form-control" name="adresse" value="{{ old('adresse') }}" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()"  type="text">
							</div>

							<div class="form-group">
								<label>Numero</label>
								<input class="form-control" name="numero" value="{{ old('numero') }}" id="street_number">
							</div>

							<div class="form-group">
								<label>Route</label>
								<input class="form-control" name="route" value="{{ old('route') }}" id="route">
							</div>

							<div class="form-group">
								<label>Code postal</label>
								<input class="form-control" name="code_postal" value="{{ old('code_postal') }}" id="postal_code" type="text">
							</div>

							<div class="form-group">
								<label>Ville</label>
								<input class="form-control" name="ville" value="{{ old('ville') }}" id="locality"
								 type="text">
							</div>

							<div class="form-group">
								<label>Pays</label>
								<input class="form-control" name="pays" value="{{ old('pays') }}" id="country" >
							</div>

							<div class="form-group">
								<label>Departement</label>
								<input class="form-control" name="departement" value="{{ old('departement') }}" id="administrative_area_level_1">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- /.row (nested) -->
	</div>
	<!-- /.panel-body -->
</form>


<!-- Modal -->
<div class="modal fade" id="errorModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header  modal-header-danger">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Liste d'erreurs</h4>
			</div>
			<div class="modal-body">
				<ul>
					@foreach($errors->all() as $error)
					<a href="#" class="list-group-item">
						<i class="fa fa fa-times fa-fw"></i> {{$error}}
					</a>
					@endforeach
				</ul>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

@if(isset($message))
<!-- Modal -->
<div class="modal fade" id="sucess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">{{$message}}</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-lg-2">

						<img class="img-circle" src="http://www.lawyersweekly.com.au/images/LW_Media_Library/594partner-profile-pic-An.jpg" style="width: 100px;height:100px;">
					</div>
					<div class="col-lg-9">
						<h3>{{$interpreteur->nom}} {{$interpreteur->prenom}}</h3>
						<span class="glyphicon glyphicon-phone-alt"> {{$interpreteur->tel_portable}} </span><br/>
						<span class="glyphicon glyphicon-earphone"> {{$interpreteur->tel_fixe}}</span><br/>
						<span class="glyphicon glyphicon-globe"> {{$interpreteur->email}}</span><br/>
						<span class="glyphicon glyphicon-home"> {{$interpreteur->adresse->adresse}}</span><br/>

					</div>

				</div>
				
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>
@endif








@stop

@section('footer')

<script type="text/javascript">
	@if (count($errors) > 0)
	$('#errorModal').modal('show');
	@endif
</script>

@if(isset($message))
<script type="text/javascript">
	$('#sucess').modal('show');
</script>
@endif
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

	/*

	$(function () {
		$("#send").on("click", function () {
			$("#hiddenfield").val($("#suggestOnClick").text());

			alert($("#hiddenfield").val());

			$("form#formID").submit();
		});
	});
	*/

</script>
-->

<script>
// This example displays an address form, using the autocomplete feature
// of the Google Places API to help users fill in the information.

var placeSearch, autocomplete;
var componentForm = {
	street_number: 'short_name',
	route: 'long_name',
	locality: 'long_name',
	administrative_area_level_1: 'short_name',
	country: 'long_name',
	postal_code: 'short_name'
};

function initAutocomplete() {
  // Create the autocomplete object, restricting the search to geographical
  // location types.
  autocomplete = new google.maps.places.Autocomplete(
  	/** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
  	{types: ['geocode']});

  // When the user selects an address from the dropdown, populate the address
  // fields in the form.
  autocomplete.addListener('place_changed', fillInAddress);
}

// [START region_fillform]
function fillInAddress() {
  // Get the place details from the autocomplete object.
  var place = autocomplete.getPlace();

  for (var component in componentForm) {
  	//document.getElementById(component).value = '';
  	document.getElementById(component).disabled = false;
  }

  // Get each component of the address from the place details
  // and fill the corresponding field on the form.
  for (var i = 0; i < place.address_components.length; i++) {
  	var addressType = place.address_components[i].types[0];
  	if (componentForm[addressType]) {
  		var val = place.address_components[i][componentForm[addressType]];
  		document.getElementById(addressType).value = val;
  	}
  }
}
// [END region_fillform]

// [START region_geolocation]
// Bias the autocomplete object to the user's geographical location,
// as supplied by the browser's 'navigator.geolocation' object.
function geolocate() {
	if (navigator.geolocation) {
		navigator.geolocation.getCurrentPosition(function(position) {
			var geolocation = {
				lat: position.coords.latitude,
				lng: position.coords.longitude
			};
			var circle = new google.maps.Circle({
				center: geolocation,
				radius: position.coords.accuracy
			});
			autocomplete.setBounds(circle.getBounds());
		});
	}
}
// [END region_geolocation]

</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAS3tOh8NpT_5A_-P2-Oz2HqAhEf5h4uSs&signed_in=true&libraries=places&callback=initAutocomplete"
async defer></script>

@stop