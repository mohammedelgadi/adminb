<?php $__env->startSection('header'); ?>


<link rel="stylesheet" type="text/css" href="<?php echo e(asset('bootstrap-tags.css')); ?>" />
<link type="text/css" rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500">


<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>


<h3 class="page-header">Ajouter un nouveau client</h3>
<form role="form" method="POST" action="/interpreteur/add" id="formID" enctype="multipart/form-data">

	<div class="panel-body">
		<div class="row">
			<div class="col-lg-6">
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

				<!--<input id="hiddenfield" name="langues" hidden="true"></input>-->

				<button id="send" type="submit" class="btn btn-outline btn-primary">Ajouter</button>
				<button type="reset" class="btn btn-outline btn-primary">Supprimer</button>
				

				<hr>


			</div>
			<div class="col-lg-6">
				<div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Langue initiale 1: </label>
									<select class="form-control" name="langue_ini_1">
										<option value="0"></option>
										<?php foreach($langues as $langue): ?>
										<option value="<?php echo e($langue->id); ?>"><?php echo e($langue->content); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Langue destination 1: </label>
									<select class="form-control" name="langue_dest_1">
										<option value="0"></option>
										<?php foreach($langues as $langue): ?>
										<option value="<?php echo e($langue->id); ?>"><?php echo e($langue->content); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Langue initiale 2: </label>
									<select class="form-control" name="langue_ini_2">
										<option value="0"></option>
										<?php foreach($langues as $langue): ?>
										<option value="<?php echo e($langue->id); ?>"><?php echo e($langue->content); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Langue destination 2: </label>
									<select class="form-control" name="langue_dest_2">
										<option value="0"></option>
										<?php foreach($langues as $langue): ?>
										<option value="<?php echo e($langue->id); ?>"><?php echo e($langue->content); ?></option>
										<?php endforeach; ?>
									</select>
								</div>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label>Adresse</label>
						<input class="form-control" name="adresse" value="<?php echo e(old('adresse')); ?>" id="autocomplete" placeholder="Enter your address" onFocus="geolocate()"  type="text">
					</div>

					<div class="form-group">
						<label>Numero</label>
						<input class="form-control" name="numero" value="<?php echo e(old('numero')); ?>" id="street_number" disabled="true">
					</div>

					<div class="form-group">
						<label>Route</label>
						<input class="form-control" name="route" value="<?php echo e(old('route')); ?>" id="route" disabled="true">
					</div>

					<div class="form-group">
						<label>Code postal</label>
						<input class="form-control" name="code_postal" value="<?php echo e(old('code_postal')); ?>" id="postal_code"
						disabled="true"  type="text">
					</div>

					<div class="form-group">
						<label>Ville</label>
						<input class="form-control" name="ville" value="<?php echo e(old('ville')); ?>" id="locality"
						disabled="true" type="text">
					</div>

					<div class="form-group">
						<label>Pays</label>
						<input class="form-control" name="pays" value="<?php echo e(old('pays')); ?>" id="country" disabled="true">
					</div>

					<div class="form-group">
						<label>Departement</label>
						<input class="form-control" name="departement" value="<?php echo e(old('departement')); ?>" id="administrative_area_level_1" disabled="true">
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
</form>




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
  	/** @type  {!HTMLInputElement} */(document.getElementById('autocomplete')),
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

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>