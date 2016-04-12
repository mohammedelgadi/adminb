@extends('layout')


@section('header')


<link rel="stylesheet" type="text/css" href="{{{ asset('jquery.datetimepicker.css') }}}"/>
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
	}

</style>

<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>
@stop

@section('content')
<h3 class="page-header">Nouvelle demande</h3>
<form role="form" method="POST" action="/demande/add">
	{!! csrf_field() !!}
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-5">

				<div class="panel panel-primary">
					<div class="panel-heading">
						Nouvelle demande
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Titre de la demande</label>
							<input class="form-control" name="titre" value="{{ old('titre') }}">
							<p class="help-block">Saisir l'objet de la demande.</p>
						</div>
						<div class="form-group">
							<label>Date de l'evenement</label>
							<div class="input-group date" >
								<input type="text" name="dateEvent" value="{{ old('dateEvent') }}" class="form-control" id="datetimepicker_mask">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Contenu de la demande</label>
							<textarea class="form-control"  rows="15" name="content">{{ old('content') }}</textarea>
							<p class="help-block">Saisir le contenu de la demande.</p>
						</div>
						<input type="hidden" name="client_id" value="" id="client">
						<button type="submit" class="btn btn-outline btn-primary">Ajouter</button>
						<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>
					</div>
				</div>
			</div>
			<!-- /.col-lg-6 (nested) -->
			<div class="col-lg-7">
				<div class="panel-group" id="accordion">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									Les devis en cours
								</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body">
								<table class="table table-striped table-bordered table-hover" id="dataTables-example" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>id</th>
											<th>Nom</th>
											<th>Prenom</th>
											<th>E-MAIL</th>

										</tr>
									</thead>
									<tfoot>
										<tr>
											<th>id</th>
											<th>Nom</th>
											<th>Prenom</th>
											<th>E-MAIL</th>

										</tr>
									</tfoot>

									<tr>
										<td>1</td>
										<td>Mohammed</td>
										<td>EL GADI</td>
										<td>Comment</td>

									</tr>
									<tr>
										<td>2</td>
										<td>Shad Decker</td>
										<td><input class="form-control" id="disabledInput" type="text" placeholder="Disabled input" disabled></td>
										<td><a id="1">edit</a></td>

									</tr>
									<tr>
										<td>3</td>
										<td>Michael Bruce</td>
										<td>Javascript Developer</td>
										<td>Singapore</td>

									</tr>
									<tr>
										<td>4</td>
										<td>Michael Bruce</td>
										<td>Javascript Developer</td>
										<td>Singapore</td>

									</tr>
									<tr>
										<td>5</td>
										<td>Michael Bruce</td>
										<td>Javascript Developer</td>
										<td>Singapore</td>

									</tr>
									<tr>
										<td>6</td>
										<td>Michael Bruce</td>
										<td>Javascript Developer</td>
										<td>Singapore</td>

									</tr>
									<tr>
										<td>7</td>
										<td>Donna Snider</td>
										<td>Customer Support</td>
										<td>New York</td>

									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>

				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
								L'adresse de la demande
							</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="form-group">
								<label>Adresse</label>
								<input class="form-control" name="adresse" value="{{ old('adresse') }}" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()"  type="text">
							</div>

							<div class="form-group">
								<label>Numero</label>
								<input class="form-control" name="numero" value="{{ old('numero') }}" id="street_number" disabled="true">
							</div>

							<div class="form-group">
								<label>Route</label>
								<input class="form-control" name="route" value="{{ old('route') }}" id="route" disabled="true">
							</div>

							<div class="form-group">
								<label>Code postal</label>
								<input class="form-control" name="code_postal" value="{{ old('code_postal') }}" id="postal_code"
								disabled="true"  type="text">
							</div>

							<div class="form-group">
								<label>Ville</label>
								<input class="form-control" name="ville" value="{{ old('ville') }}" id="locality"
								disabled="true" type="text">
							</div>

							<div class="form-group">
								<label>Pays</label>
								<input class="form-control" name="pays" value="{{ old('pays') }}" id="country" disabled="true">
							</div>

							<div class="form-group">
								<label>Departement</label>
								<input class="form-control" name="departement" value="{{ old('departement') }}" id="administrative_area_level_1" disabled="true">
							</div>

						</div>
					</div>
				</div>
			</div>

			<div class="panel panel-default">
				<div class="row">
					<div class="col-lg-6">
						<div class="form-group">
							<label>Langue initiale : </label>
							<select class="form-control" name="langue_ini">
								<option value="1">Arabe</option>
								<option value="2">Français</option>
								<option value="3">Anglais</option>
								<option value="4">Darija</option>
								<option value="5">ESPAGNOLE</option>
							</select>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="form-group">
							<label>Langue destination : </label>
							<select class="form-control" name="langue_dest">
								<option value="1">Arabe</option>
								<option value="2">Français</option>
								<option value="3">Anglais</option>
								<option value="4">Darija</option>
								<option value="5">ESPAGNOLE</option>
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- /.row (nested) -->
</div>
</form>

<!-- Modal -->
<div class="modal fade" id="devisModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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


<!-- Modal -->
<div class="modal fade" id="sucess" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Nouvelle demande ajoutée</h4>
			</div>
			<div class="modal-body">

				@if(isset($message))
				<dl>
					<dt>{{$message}}</dt>
					<dd>{{$creerLe}}</dd>
					<dt>Titre :</dt>
					<dd>{{$titre}}</dd>
					<dt>Date de l'evenement :</dt>
					<dd>{{$dateEvent}}</dd>
					<dt>Demandeur :</dt>
					<dd>{{$client}}</dd>
				</dl>
				@endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>








@stop

@section('footer')
<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<script src="{{{ asset('jquery.datetimepicker.full.js') }}}"></script>


<script>

	$.datetimepicker.setLocale('fr');

	$('#datetimepicker_mask').datetimepicker({
		format:'d/m/Y h:00:00'
	});

	$(document).ready(function() {
		$('#dataTables-example').DataTable({
			responsive: true,
			"pageLength": 10,
			dom: 'T<"clear">lfrtip',
			tableTools: {
				"sRowSelect": "single",
				fnRowSelected: function(nodes) {
					var ttInstance = TableTools.fnGetInstance("dataTables-example");
					var row = ttInstance.fnGetSelectedData();
					$('#client').val(row[0][0]);
					console.log(row[0][0]);
				},

				fnRowDeselected: function ( node ) {
					$('#client').val("");
				}
			}
			,"columnDefs":
			[ { "visible": false, "searchable": false, "targets":[0] }]

		});
	});

	/*

	$(function () {
		$("#1").on("click", function () {
			$("#disabledInput").prop('disabled',false);

			
		});
	});
	*/
</script>


<script type="text/javascript">
	@if (count($errors) > 0)
	$('#devisModal').modal('show');
	@endif
</script>

@if(isset($message))
<script type="text/javascript">
	$('#sucess').modal('show');
</script>
@endif


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
  	document.getElementById(component).value = '';
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


