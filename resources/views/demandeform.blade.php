@extends('layout')


@section('header')


<link rel="stylesheet" type="text/css" href="{{{ asset('jquery.datetimepicker.css') }}}"/>

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

				<div class="panel panel-default">
					<div class="panel-heading">
						Nouvelle demande
					</div>
					<div class="panel-body">
						<div class="form-group">
							<label>Titre de la demande</label>
							<input class="form-control" name="titre">
							<p class="help-block">Saisir l'objet de la demande.</p>
						</div>
						<div class="form-group">
							<label>Date de l'evenement</label>
							<div class="input-group date" >
								<input type="text" name="dateEvent" class="form-control" id="datetimepicker_mask">
								<div class="input-group-addon">
									<span class="glyphicon glyphicon-th"></span>
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Contenu de la demande</label>
							<textarea class="form-control" rows="15" name="content"></textarea>
							<p class="help-block">Saisir le contenu de la demande.</p>
						</div>

						<input type="hidden" name="client_id" value="" id="client">

						<button type="submit" class="btn btn-outline btn-primary">Modifier</button>
						<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>
					</div>
				</div>
				
				
				
			</div>
			<!-- /.col-lg-6 (nested) -->
			<div class="col-lg-7">
				<div class="panel panel-default">
					<div class="panel-heading">
						Liste des clients
					</div>
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
								<td>Regional Director</td>
								<td>Edinburgh</td>

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
<!-- /.panel-body -->



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


@stop