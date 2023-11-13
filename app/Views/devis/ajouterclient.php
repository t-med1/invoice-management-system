<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Ajouter un Client
<?php $this->endsection() ?>

<!-- class active -->
<?php $this->section('Nouveau client') ?>
active
<?php $this->endsection() ?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<form method="post" action="clientstore">

	<!-- les champs des services -->
	<div class="row">
		<a class="btn btn-outline-primary col-1" href="#" style="margin-left: 1%;" id="business-btn"><span
				class="material-icons material-icons-outlined">business</span></a>
		<a class="btn btn-light col-1" href="#" style="margin-left: 5%;" id="groups-btn"><span
				class="material-icons material-icons-outlined">groups</span></a>
	</div>
	<br>
	<div class="row">
		<div class="mb-3 col-sm-3" id="ICE">
			<label for="ice" class="form-label">ICE <font color="red">*</font></label>
			<input type="text" class="form-control" id="ice" name="ICE">
		</div>
	</div>
	<div class="row">
		<div class="mb-3 col-sm-3">
			<label for="n-client" class="form-label">Nom Du Client <font color="red">*</font></label>
			<input type="text" class="form-control" id="n-client" name="nom">
		</div>

		<div class="mb-3 col-sm-3">
			<label for="numnberPhone" class="form-label">Telephone <font color="red">*</font></label>
			<input type="text" class="form-control" id="numnberPhone" name="numero_telephone">
		</div>

		<div class="mb-3 col-sm-3" id="adresse">
			<label for="adresse" class="form-label">Adresse <font color="red">*</font></label>
			<input type="text" class="form-control" id="adresse" name="adresse">
		</div>
	</div>

	<div class="row">
		<div class="mb-3 col-sm-3">
			<label for="mail" class="form-label">Email <font color="red">*</font></label>
			<input type="email" class="form-control" id="mail" name="email_client">
		</div>

		<div class="mb-3 col-sm-3">
			<label for="ville" class="form-label">Ville <font color="red">*</font></label>
			<input type="text" class="form-control" id="ville" name="ville">
		</div>

		<div class="mb-3 col-sm-3">
			<label for="Pays" class="form-label">Pays <font color="red">*</font></label>
			<input type="text" class="form-control" id="Pays" name="pays">
		</div>

	</div>

	<button type="submit" class="btn btn-outline-primary">Ajouter</button>
</form>

<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
		$('#business-btn').click(function () {
			$('#ICE').show() // show the ICE input field
			$('#adresse').show() // show the adress input field
			$('#business-btn').addClass('btn-outline-primary')
			$('#groups-btn').removeClass('btn-outline-primary');
		});

		$('#groups-btn').click(function () {
			$('#ICE').hide(); // hide the ICE input field
			$('#adresse').hide() // show the adress input field
			$('#business-btn').removeClass('btn-outline-primary');
			$('#groups-btn').addClass('btn-outline-primary')
		});
	});
</script>

<?php $this->endsection() ?>