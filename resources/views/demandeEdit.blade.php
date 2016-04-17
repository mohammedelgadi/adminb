@extends('layout')


@section('header')

<!--
<link rel="stylesheet" type="text/css" href="{{{ asset('jquery.datetimepicker.css') }}}"/>
-->


<link href='http://fonts.googleapis.com/css?family=Roboto:400,500' rel='stylesheet' type='text/css'>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="{{{ asset('bootstrap-material-datetimepicker.css')}}}" />

<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="{{{ asset('bootstrap-material-datetimepicker.js')}}}"></script>



<!--
<script>
	$(function() {
		$( "#datepicker" ).datepicker();
	});
</script>
-->





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
							<label>Date de l'evenement</label>
							<div class="input-group date" >
								<!--<input type="text" name="dateEvent" value="{{$demande->dateEvent}}" class="form-control" id="datetimepicker_mask">-->
								<input type="text" name="dateEvent" id="date-format" class="form-control floating-label" value="{{$demande->dateEvent}}" >
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label>Contenu de la demande</label>
							<textarea class="form-control" rows="15" name="content">{{$demande->content}}</textarea>
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
				<div class="panel panel-default">
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
						<div class="col-lg-6">
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
						<div class="col-lg-6">
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
					</div>
				</div>
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
								<div class="list-group">
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> New Comment
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa fa-money fa-fw"></i> Message Sent
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> New Task
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> Server Rebooted
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
								</div>
								<!-- /.list-group -->
								<a href="#" class="btn btn-default btn-block"  data-toggle="modal" data-target="#devisModal">View All Alerts</a>
								<!-- Modal -->
								<div class="modal fade" id="devisModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
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
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> New Comment
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> 3 New Followers
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa fa-money fa-fw"></i> Message Sent
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> New Task
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
									<a href="#" class="list-group-item">
										<i class="fa fa fa-money fa-fw"></i> Server Rebooted
										<span class="pull-right text-muted small"><em>500 euros</em>
										</span>
									</a>
								</div>
								<!-- /.list-group -->
								<a href="#" class="btn btn-default btn-block" data-toggle="modal" data-target="#facturesModal">View All Alerts</a>

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
	/*

	$.datetimepicker.setLocale('fr');

	$('#datetimepicker_mask').datetimepicker({
		format:'Y-m-d h:00:00'
	});
	*/

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
                    //alert(nodes);
                    $('#client').val(row[0][0]);
                    console.log(row[0][0]);
                }
            }

            ,"columnDefs":
            [ { "visible": false, "searchable": false, "targets":[0] }]

        });



	});
</script>


<script type="text/javascript" src="https://rawgit.com/FezVrasta/bootstrap-material-design/master/dist/js/material.min.js"></script>
<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>


<script type="text/javascript">
	$('#date-format').bootstrapMaterialDatePicker
	({
		format: 'YYYY-MM-DD HH:mm:00'
	});	
</script>



@stop