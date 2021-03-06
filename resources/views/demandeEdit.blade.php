@extends('layout')

@section('header')
<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<link rel="stylesheet" href="{{{ asset('bootstrap-material-datetimepicker.css')}}}" />
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{{ asset('bootstrap-material-datetimepicker.js')}}}"></script>
<script type="text/javascript" src="{{{ asset('js/jquery.popconfirm.js')}}}"></script>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">
<script src="//cdn.ckeditor.com/4.5.8/full/ckeditor.js"></script>


<style type="text/css">
	.modal-dialog {
		width: 98%;
		height: 92%;
		padding: 0;
	}
</style>

@stop

@section('content')
<form role="form" method="POST" action="/demande/update">
	{!! csrf_field() !!}
	<div class="panel-body">
		<div class="row">
			<div class="col-lg-5">
				<div class="panel panel-primary">
					<div class="panel-heading">
						Edition de la demande 
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Titre de la demande</label>
							<input class="form-control" name="titre" value="{{$demande->titre}}">
							<p class="help-block">Saisir l'objet de la demande.</p>
						</div>
						<div class="form-group">
							<label>Etat de la demande</label>
							<select class="form-control" name="etat_id">
								<option value=""></option>
								@foreach($etats as $etat)
								@if($etat->id == $demande->etat->id)
								<option value="{{$etat->id}}" selected>{{$etat->libelle}}</option>
								@else
								<option value="{{$etat->id}}">{{$etat->libelle}}</option>
								@endif
								@endforeach
							</select>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-lg-6">
									<label>Date de debut de l'evenement</label>
									<div class="input-group date" >
										<!--<input type="text" name="dateEvent" value="{{$demande->dateEvent}}" class="form-control" id="datetimepicker_mask">-->
										<input type="text" name="dateEvent" id="date-start" class="form-control floating-label" value="{{$demande->dateEvent}}" >
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
									</div>
								</div>
								<div class="col-lg-6">
									<label>Date de fin de l'evenement</label>
									<div class="input-group date" >
										<!--<input type="text" name="dateEvent" value="{{$demande->dateEvent}}" class="form-control" id="datetimepicker_mask">-->
										<input type="text" name="dateEndEvent" id="date-end" class="form-control floating-label" value="{{$demande->dateEndEvent}}" >
										<div class="input-group-addon">
											<span class="glyphicon glyphicon-th"></span>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Contenu de la demande</label>
							<textarea class="form-control ckeditor" rows="15" name="content">{{$demande->content}}</textarea>
							<p class="help-block">Saisir le contenu de la demande.</p>
						</div>

						<input type="hidden" name="id" value="{{$demande->id}}" id="id">

						<button type="submit" name="action" value="modifier" class="btn btn-outline btn-primary">Modifier</button>
						<button type="submit" name="action" value="supprimer" class="btn btn-outline btn-primary">Supprimer</button>
					</div>
				</div>
				
				
			</div>
			<!-- /.col-lg-6 (nested) -->
			<div class="col-lg-7">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							Le demandeur
						</h4>
					</div>
					<div class="panel-body">
						<div class="row">
							<div class="col-lg-2">
								
								<img class="img-circle" src="http://www.lawyersweekly.com.au/images/LW_Media_Library/594partner-profile-pic-An.jpg" style="width: 100px;height:100px;">
							</div>
							<div class="col-lg-9">
								<h3>{{$demande->client->nom}} {{$demande->client->prenom}}</h3>
								<span class="glyphicon glyphicon-phone-alt"> {{$demande->client->tel_portable}} </span><br/>
								<span class="glyphicon glyphicon-earphone"> {{$demande->client->tel_fixe}}</span><br/>
								<span class="glyphicon glyphicon-globe"> {{$demande->client->email}}</span><br/>
							</div>
						</div>
					</div>
				</div>
				<div class="panel panel-default">
					<div class="row">
						<div class="col-lg-1">
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<label>Langue initiale: </label>
								<select class="form-control" name="langue_ini">
									<option value=""></option>
									@foreach($langues as $langue)
									@if($langue->id == $demande->langue_ini)
									<option value="{{$langue->id}}" selected>{{$langue->content}}</option>
									@else
									<option value="{{$langue->id}}">{{$langue->content}}</option>

									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-5">
							<div class="form-group">
								<label>Langue destination : </label>
								<select class="form-control" name="langue_dest">
									<option value=""></option>
									@foreach($langues as $langue)
									@if($langue->id == $demande->langue_dest)
									<option value="{{$langue->id}}" selected>{{$langue->content}}</option>
									@else
									<option value="{{$langue->id}}">{{$langue->content}}</option>

									@endif
									@endforeach
								</select>
							</div>
						</div>
						<div class="col-lg-1">
						</div>
					</div>
				</div>
				<div class="panel-group" id="accordion">
					<div class="panel panel-primary">
						<div class="panel-heading">
							<h4 class="panel-title">
								<a data-toggle="collapse" data-parent="#accordion" href="#collapse1">
									Les devis en cours (4 premiers)
								</a>
							</h4>
						</div>
						<div id="collapse1" class="panel-collapse collapse in">
							<div class="panel-body">
								<div class="list-group">
									@foreach(array_slice($demande->devies->all(),0,4) as $devis)
									<a href="/devis/edit/{{$devis->id}}" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> Interpreteur : <strong>{{$devis->interpreteur->nom}} {{$devis->interpreteur->prenom}}</strong><br/>
										Crée le : <strong>{{date('D d M Y h:m:s',strtotime($devis->demande->created_at))}}</strong>
										<span class="pull-right text-muted small"><em>Prix : <strong>{{$devis->total}} &euro;</strong></em>
										</span>
									</a>
									@endforeach
								</div>
								<!-- /.list-group -->
								
								<div class="row">
									<div class="col-lg-6">
										<a href="#" class="btn btn-default btn-block"  data-toggle="modal" data-target="#devisModal">Afficher tous les devis</a>
									</div>
									<div class="col-lg-6">
										<a href="/devis/add/{{$demande->id}}" class="btn btn-default btn-block">Ajouter un devis</a>
									</div>
								</div>
								<!-- Modal -->
								<div class="modal fade" id="devisModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
									<div class="modal-dialog modal-lg">
										<div class="modal-content">
											<div class="modal-header">
												<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
												<h4 class="modal-title" id="myModalLabel">Liste des devis en cours</h4>
											</div>
											<div class="modal-body">
												<table class="table nowrap" cellspacing="0" cellspacing="0" id="example">	<thead>
													<tr>
														<th>Nom de l'interpreteur</th>
														<th>Prenom de l'interpreteur</th>
														<th>Adresse de l'interpreteur</th>
														<th>Prix proposé</th>
														<th>Date creation du devis</th>
														<th>Date modification du devis</th>
														<th>Edit/Delete</th>
														<th>Valider</th>
													</tr>
												</thead>
												<tfoot>
													<tr>
														<th>Nom de l'interpreteur</th>
														<th>Prenom de l'interpreteur</th>
														<th>Adresse de l'interpreteur</th>
														<th>Prix proposé</th>
														<th>Date creation du devis</th>
														<th>Date modification du devis</th>
														<th>Edit/Delete</th>
														<th>Valider</th>
													</tr>
												</tfoot>
												<tbody>
													@foreach($demande->devies as $devi)
													<tr>
														<td>{{$devi->interpreteur->nom}}</td>
														<td>{{$devi->interpreteur->prenom}}</td>
														<td>{{$devi->interpreteur->adresse->adresse}}</td>
														<td>{{$devi->total}}</td>
														<td>{{$devi->created_at}}</td>
														<td>{{$devi->updated_at}}</td>
														<td><a href="/devis/edit/{{$devi->id}}" class="editor_edit"><span class="glyphicon glyphicon-pencil"></span></a> / <a id="delete{{$devi->id}}" href="/devis/remove/{{$devi->id}}" class="editor_remove"><span class="glyphicon glyphicon-trash" ></span></a></td>
														<td><a id="validate{{$devi->id}}" href="/devis/validate/{{$devi->id}}" class="editor_edit"><span class="glyphicon glyphicon-ok"></span></a></td>
													</tr>
													<script type="text/javascript">
														$(document).ready(function() {
															$("#delete{{$devi->id}}").popConfirm({
																title: "Message de confirmation ?",
																content: "Voulez vous supprimer l'objet !",
																placement: "bottom"
															});

															$("#validate{{$devi->id}}").popConfirm({
																title: "Message de confirmation ?",
																content: "Voulez vous Valider le devis en cours !",
																placement: "bottom"
															});
														});
													</script>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-primary" data-dismiss="modal">close</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->
						</div>
					</div>
				</div>
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h4 class="panel-title">
							<a data-toggle="collapse" data-parent="#accordion" href="#collapse2">
								Les factures en cours
							</a>
						</h4>
					</div>
					<div id="collapse2" class="panel-collapse collapse">
						<div class="panel-body">
							<div class="list-group">
								@foreach($demande->factures as $facture)
								<a href="/facture/edit/{{$facture->id}}" class="list-group-item">
									<i class="fa fa fa-money fa-fw"></i> Interpreteur : <strong>{{$facture->devis->interpreteur->nom}} {{$facture->devis->interpreteur->prenom}}</strong><br/>
									Crée le : <strong>{{date('D d M Y h:m:s',strtotime($facture->created_at))}}</strong>
									<span class="pull-right text-muted small"><em>Prix : <strong>{{$facture->devis->total}} &euro;</strong></em>
									</span>
								</a>
								@endforeach
							</div>
							<!-- /.list-group -->

							<div class="row">
								<div class="col-lg-6">
									<a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#facturesModal">Afficher toutes les factures</a>
								</div>
								<div class="col-lg-6">
									<a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#facturesModal">Afficher toutes les factures</a>
								</div>
							</div>

							<!-- Modal -->
							<div class="modal fade" id="facturesModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-lg">
									<div class="modal-content">
										<div class="modal-header">
											<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
											<h4 class="modal-title" id="myModalLabel">Modal title</h4>
										</div>
										<div class="modal-body">
											Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
										</div>
										<div class="modal-footer">
											<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
											<button type="button" class="btn btn-primary">Save changes</button>
										</div>
									</div>
									<!-- /.modal-content -->
								</div>
								<!-- /.modal-dialog -->
							</div>
							<!-- /.modal -->

						</div>
					</div>
				</div>
			</div> 

		</div>
	</div>
	<!-- /.panel-body -->

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
</div>
</form>



@stop

@section('footer')

<script type="text/javascript">
	@if (count($errors) > 0)
	$('#errorModal').modal('show');
	@endif
</script>

<!-- Page-Level Demo Scripts - Tables - Use for reference -->

<!--

<script src="{{{ asset('jquery.datetimepicker.full.js') }}}"></script>

-->


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


<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>


<script type="text/javascript">

	$('#date-end').bootstrapMaterialDatePicker({ 
		weekStart : 0 ,
		format: 'YYYY-MM-DD HH:mm:00'
	});

	$('#date-start').bootstrapMaterialDatePicker({ 
		weekStart : 0 ,
		format: 'YYYY-MM-DD HH:mm:00'

	}).on('change', function(e, date)
	{
		$('#date-end').bootstrapMaterialDatePicker('setMinDate', date);
	});	
</script>


@stop