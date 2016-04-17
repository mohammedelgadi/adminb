<?php $__env->startSection('header'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.1.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">

<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="<?php echo e(asset('bootstrap-material-datetimepicker.css')); ?>" />

<script type="text/javascript" src="http://momentjs.com/downloads/moment-with-locales.min.js"></script>
<script type="text/javascript" src="<?php echo e(asset('bootstrap-material-datetimepicker.js')); ?>"></script>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


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
								<label> Date de creation </label>
							</div>
							<div class="col-lg-10">
								<form class="form-inline">
									<div class="form-group">
										<label>Date Min </label>
										<input type="text" class="form-control" id="date-creation-start">
									</div>
									<div class="form-group">
										<label>Date Max</label>
										<input type="text" class="form-control" id="date-creation-end">
									</div>

								</form>
							</div>
						</div>
						<hr>
						<div class="row">
							<div class="col-lg-2">
								<label>Date d'evenement</label>
							</div>
							<div class="col-lg-10">
								<form class="form-inline">
									<div class="form-group">
										<label>Date Min </label>
										<input type="text" class="form-control" id="date-event-start">
									</div>
									<div class="form-group">
										<label>Date Max</label>
										<input type="text" class="form-control" id="date-event-end">
									</div>

								</form>
							</div>
						</div>
					</div>
					<div class="panel-footer">

						<a href="#" class="btn btn-primary">Cherhcer</a>

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
									<th>etat</th>
									<th>Nom du client</th>
									<th>Langue initiale</th>
									<th>Langue destination</th>
									<th>Interpreteur</th>
									<th>Prix</th>
									<th>Date creation</th>
									<th>Date d'evenement</th>
									<th>Date Modification</th>
									<th>adresse</th>
									<th>Edit/Valide</th>
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>Titre</th>
									<th>etat</th>
									<th>Nom du client</th>
									<th>Langue initiale</th>
									<th>Langue destination</th>
									<th>Interpreteur</th>
									<th>Prix</th>
									<th>Date creation</th>
									<th>Date d'evenement</th>
									<th>Date Modification</th>
									<th>adresse</th>
									<th></th>
								</tr>
							</tfoot>
							<tbody>
								<?php foreach($demandes as $demande): ?>
								<tr>
									<td><?php echo e($demande->titre); ?></td>
									<td><?php echo e($demande->etat->libelle); ?></td>
									<td><?php echo e($demande->client->nom); ?></td>
									<td><?php echo e($demande->langueIni->content); ?></td>
									<td><?php echo e($demande->langueDest->content); ?></td>
									<td><?php echo e($demande->titre); ?></td>
									<td><?php echo e($demande->titre); ?></td>
									<td><?php echo e($demande->created_at); ?></td>
									<td><?php echo e($demande->dateEvent); ?></td>
									<td><?php echo e($demande->updated_at); ?></td>
									<td><?php echo e($demande->adresse->adresse); ?></td>
									<td><a href="/demande/edit/<?php echo e($demande->id); ?>" class="editor_edit">Edit</a> / <a href="" class="editor_remove">Valide</a></td>
								</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?php $__env->stopSection(); ?>


<?php $__env->startSection('footer'); ?>



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
$('#date-creation-end').bootstrapMaterialDatePicker({ weekStart : 0 });
$('#date-creation-start').bootstrapMaterialDatePicker({ weekStart : 0 }).on('change', function(e, date)
{
$('#date-creation-end').bootstrapMaterialDatePicker('setMinDate', date);
}); 

$('#date-event-end').bootstrapMaterialDatePicker({ weekStart : 0 });
$('#date-event-start').bootstrapMaterialDatePicker({ weekStart : 0 }).on('change', function(e, date)
{
$('#date-event-end').bootstrapMaterialDatePicker('setMinDate', date);
}); 
</script>



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>