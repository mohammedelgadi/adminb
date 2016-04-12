<?php $__env->startSection('header'); ?>


<link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap-tags.css')); ?>" />

<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<h3 class="page-header">Ajouter un nouveau client</h3>

<div class="panel-body">
	<div class="row">
		<div class="col-lg-6">
			<form role="form" method="POST" action="/client/add" id="formID" enctype="multipart/form-data">
				<?php echo csrf_field(); ?>

				<div class="form-group">
					<label>Nom du client</label>
					<input class="form-control" name="nom" value="<?php echo e(old('nom')); ?>" >
					<p class="help-block">Example block-level help text here.</p>
				</div>
				<div class="form-group">
					<label>Prenom</label>
					<input class="form-control" value="<?php echo e(old('prenom')); ?>"  name="prenom" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>email</label>
					<input class="form-control" value="<?php echo e(old('email')); ?>"  name="email" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>Image : </label>
					<input type="file" name="image">
				</div>
				<div class="form-group">
					<label>tel portable</label>
					<input class="form-control" value="<?php echo e(old('tel_portable')); ?>"  name="tel_portable" placeholder="telephone portable">
				</div>
				<div class="form-group">
					<label>tel fixe</label>
					<input class="form-control"  value="<?php echo e(old('tel_fixe')); ?>" name="tel_fixe" placeholder="telephone fixe">
				</div>
				<div class="form-group">
					<label>tel fixe</label>
					<input class="form-control"  value="<?php echo e(old('tel_fixe')); ?>" name="tel_fixe" placeholder="telephone fixe">
				</div>
				<div class="form-group">
					<label>Langues</label>
					<div name="mamot" id="suggestOnClick"></div>
					
				</div>
				<div class="form-group">
					<label>Commentaire</label>
					<textarea class="form-control" name="commentaire" rows="3"><?php echo e(old('commentaire')); ?></textarea>
				</div>

				<input id="hiddenfield" name="langues" hidden="true"></input>

				<button id="send" type="submit" class="btn btn-outline btn-primary">Ajouter</button>
				<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>
			</form>

			<hr>


		</div>
		<div class="col-lg-6">
			<div>
				
				<div class="form-group">
					<label>Adresse</label>
					<input class="form-control" name="adresse_complete" value="<?php echo e(old('nom')); ?>" >
					<p class="help-block">Example block-level help text here.</p>
				</div>
				<div class="form-group">
					<label>Adresse</label>
					<input class="form-control" value="<?php echo e(old('prenom')); ?>"  name="adresse" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>Code postal</label>
					<input class="form-control" value="<?php echo e(old('email')); ?>"  name="code_postal" placeholder="Enter text">
				</div>
				<div class="form-group">
					<label>Ville</label>
					<input type="file" name="ville">
				</div>
				<div class="form-group" name="pays">
					<label>Pays</label>
					<input class="form-control" value="<?php echo e(old('tel_portable')); ?>"  name="tel_portable" placeholder="telephone portable">
				</div>
			</div>

			<?php if(count($errors)): ?>
			<ul>
				<?php foreach($errors->all() as $error): ?>
				<div class="alert alert-danger">
					<?php echo e($error); ?>

				</div>
				<?php endforeach; ?>
			</ul>

			<?php endif; ?>

			<?php if(isset($nom)): ?>
			<div class="alert alert-success">
				Le nouveau client <b> <?php echo e($nom); ?> <?php echo e($prenom); ?> </b> a été ajouté à la base de donnée.
			</div>
			<?php endif; ?>
		</div>
	</div>
	<!-- /.row (nested) -->
</div>
<!-- /.panel-body -->





<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer'); ?>
<script src='<?php echo e(asset("bootstrap-tags.js")); ?>'></script>
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



<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>