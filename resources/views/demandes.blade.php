@extends('layout')

@section('header')


<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{{ asset('bootstrap-material-datetimepicker.css')}}}" />
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{{ asset('bootstrap-material-datetimepicker.js')}}}"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">


@stop
@section('content')
<hr>
<div class="row">
	<div class="col-lg-12">
		<div class="panel-group" id="accordion">
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
							Recherche avancée
						</a>
					</h4>
				</div>
				<div id="collapse2" class="panel-collapse collapse">
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								<label>Date d'evenement</label>
							</div>
							<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-2">
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Date Min </label>
											<input type="text" class="form-control" name="dateEventMin" id="date-event-start">
										</div>	
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Date Max</label>
											<input type="text" class="form-control" name="dateEventMax" id="date-event-end">
										</div>
									</div>
									<div class="col-lg-2">
									</div>
								</div>

							</div>
						</div>
						<div class="row">
							<div class="col-lg-2">
								<label> Date de creation de la demande </label>
							</div>
							<div class="col-lg-10">
								<div class="row">
									<div class="col-lg-2">
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Date Min </label>
											<input type="text" class="form-control" name="dateCreationMin" id="date-creation-demande-start">
										</div>
									</div>
									<div class="col-lg-4">
										<div class="form-group">
											<label>Date Max</label>
											<input type="text" class="form-control" name="dateCreationMax" id="date-creation-demande-end">
										</div>
									</div>
									<div class="col-lg-2">
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="panel-footer">
						<button id="search" class="btn btn-outline btn-primary">Chercher</button>
					</div>
				</div>
			</div>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h4 class="panel-title">
						<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
							Liste des demandes
						</a>
					</h4>
				</div>
				<div id="collapse1" class="table-responsive">
					<div class="panel-body" class="table-responsive">
						<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" cellspacing="0" id="example">
							<thead>
								<tr>
									<th>Titre</th>
									<th>Etat</th>
									<th>Nom du client</th>
									<th>Langue initiale</th>
									<th>Langue destination</th>
									<th>Date creation</th>
									<th>Edit/Delete</th>
									<th>Date d'evenement</th>
									<th>Date Modification</th>
									<th>Adresse de l'evenement</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Titre</th>
									<th>Etat</th>
									<th>Nom du client</th>
									<th>Langue initiale</th>
									<th>Langue destination</th>
									<th>Date creation</th>
									<th></th>
									<th>Date d'evenement</th>
									<th>Date de modification</th>
									<th>Adresse de l'evenement</th>
								</tr>
							</tfoot>
							<tbody>
								@foreach($demandes as $demande)
								<tr>
									<td>{{$demande->titre}}</td>
									<td>{{$demande->etat->libelle}}</td>
									<td>{{$demande->client->nom}}</td>
									<td>{{$demande->langueIni->content}}</td>
									<td>{{$demande->langueDest->content}}</td>
									<td>{{$demande->created_at}}</td>
									<td><a href="/demande/edit/{{$demande->id}}" class="editor_edit"><span class="glyphicon glyphicon-pencil"></span></a> / <a id="delete{{$demande->id}}" href="/demade/remove/{{$demande->id}}" class="editor_remove"><span class="glyphicon glyphicon-trash"></span></a></td>
									<td>{{$demande->dateEvent}}</td>
									<td>{{$demande->updated_at}}</td>
									<td>{{$demande->adresse->adresse}}</td>										
								</tr>
								<script type="text/javascript">
									$(document).ready(function() {
										$("#delete{{$demande->id}}").popConfirm({
											title: "Message de confirmation ?",
											content: "Voulez vous supprimer l'objet !",
											placement: "bottom"
										});
									});
								</script>
								@endforeach
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
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

<!-- Modal -->
<div class="modal fade" id="size" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header modal-header-success">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title" id="myModalLabel">Nouvelle demande ajoutée</h4>
			</div>
			<div class="modal-body">
				@if(isset($size))
				<label>Nombre de demandes trouvées est : {{$size}}</label>
				@endif
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->

	@stop


	@section('footer')

	<script type="text/javascript">
		@if (count($errors) > 0)
		$('#errorModal').modal('show');
		@endif
	</script>

	<script type="text/javascript">

		@if(isset($size))
		$('#size').modal('show');
		@endif

	</script>


	<script>
		$(document).ready(function() {

		// Setup - add a text input to each footer cell
		$('#example tfoot th').each( function () {
			var title = $(this).text();
			$(this).html( '<input type="text" placeholder="'+title+'" />' );
		} );

		table = $('#example').DataTable( {
			dom: 'Bfrtip',
			buttons: [
			{
				extend: 'colvis',
				columns: ':not(:first-child)'
			}
			]
		});

		// Apply the search
		table.columns().every( function () {
			var that = this;

			$( 'input', this.footer() ).on( 'keyup change', function () {
				if ( that.search() !== this.value ) {
					that
					.search( this.value )
					.draw();
				}
			} );
		} );

	} );
</script>

<script type="text/javascript">
	// Event listener to the two range filtering inputs to redraw on input

	$.fn.dataTable.ext.search.push(
		function( settings, data, dataIndex ) {

			var mincreationdate = "";
			var maxcreationdate = "";
			var dateEvent = moment(data[8],"YYYY-MM-DD HH:mm:00").format("YYYY/MM/DD");
			$response = true;

			if($('#date-event-start').val()!==""){
				mincreationdate = moment($('#date-event-start').val(),"YYYY/MM/DD").format("YYYY/MM/DD");
				$response = $response && (dateEvent >= mincreationdate);
			}
			if($('#date-event-end').val()!==""){
				maxcreationdate = moment($('#date-event-end').val(),"YYYY/MM/DD").format("YYYY/MM/DD");
				$response = $response && (dateEvent <= maxcreationdate);
			}

			var dateCreationDemande = moment(data[7],"YYYY-MM-DD HH:mm:00").format("YYYY/MM/DD");
			if($('#date-creation-demande-start').val()!==""){
				mincreationdemandedate = moment($('#date-creation-demande-start').val(),"YYYY/MM/DD").format("YYYY/MM/DD");
				$response = $response && (dateCreationDemande >= mincreationdemandedate);
			}

			if($('#date-creation-demande-end').val()!==""){
				maxcreationdemandedate = moment($('#date-creation-demande-end').val(),"YYYY/MM/DD").format("YYYY/MM/DD");
				$response = $response && (dateCreationDemande <= maxcreationdemandedate);
			}
			return $response;
		}
		);


	$('#search').click( function() {
		table.draw();
	} );

</script>


<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>


<script type="text/javascript">
	$('#date-creation-demande-end').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format: 'YYYY/MM/DD' , clearButton: true });
	$('#date-creation-demande-start').bootstrapMaterialDatePicker({ weekStart : 0,time : false, format: 'YYYY/MM/DD' , clearButton: true }).on('change', function(e, date)
	{
		$('#date-creation-demande-end').bootstrapMaterialDatePicker('setMinDate', date);
	}); 

	$('#date-event-end').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format: 'YYYY/MM/DD' , clearButton: true});
	$('#date-event-start').bootstrapMaterialDatePicker({ weekStart : 0, time : false, format: 'YYYY/MM/DD' , clearButton: true }).on('change', function(e, date)
	{
		$('#date-event-end').bootstrapMaterialDatePicker('setMinDate', date);
	}); 
</script>



<script type="text/javascript" src="{{{ asset('js/jquery.popconfirm.js')}}}"></script>



@stop


