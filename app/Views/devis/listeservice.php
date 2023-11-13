<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Liste des services
<?php $this->endsection() ?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- class active -->
<?php $this->section('liste Service') ?>
active
<?php $this->endsection() ?>

<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<?php if (session()->getFlashdata('success')): ?>
	<div class="alert alert-success" id="myDiv">
		<?= session()->getFlashdata('success') ?>
	</div>
<?php endif; ?>
<table class="table table-light table-hover table-striped rounded" style="overflow: hidden" id='factures'>
	<thead>
		<tr>
			<th>Titre du service</th>
			<th>Description</th>
			<th>prix unitaire</th>
			<th>Action</th>

		</tr>
	</thead>
	<tbody>
		<?php foreach ($liste as $list): ?>
			<tr>
				<td>
					<?php echo $list["titre"]; ?>
				</td>
				<td>
					<?php echo $list["descriptif_devis"]; ?>
				</td>
				<td>
					<?php echo $list["prix_unitaire"]; ?>
				</td>
				<td>
					<a href="/modifierservice/<?= $list['id_service'] ?>"><span class="material-icons">edit</span></a>

				</td>
			</tr>

		<?php endforeach ?>
	</tbody>
</table>
<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<script>
	$(document).ready(function () {
		setTimeout(function () {
			$('#myDiv').slideUp();
		}, 1000);
	});
</script>
<?php $this->endsection() ?>