<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- h1 -->
<?php $this->section('h1') ?>
Modifier un Devis
<?php $this->endsection() ?>

<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<form method="post" action="/devisUpdate/<?= $service['id_service'] ?>/<?= $devis['id_devis'] ?>">
	<div class="row">

		<div class="mb-3 col-sm-3">
			<label for="ref" class="form-label">Numéro de Devis</label>
			<input type="text" class="form-control" name="id_devis" id="ref" value="<?= $devis['id_devis'] ?>" readonly>
		</div>

		<div class="mb-3 col-sm-3 client">
			<label for="ref" class="form-label">Numéro de Client </label>
			<input type="text" name="id_client" id="selectclient" class="form-control"
				value="<?= ($client[0]['ICE'] == 0 || $client[0]['ICE'] == null) ? 'Personne Normal' : $client[0]['ICE'] ?>"
				disabled>
		</div>
	</div>
	<div id="details">
		<div class="row">
			<div class="mb-3 col-sm-3">
				<label for="n-client" class="form-label">Nom Du Client</label>
				<input type="text" class="form-control" id="n-client" name="nom" value="<?= $client[0]['nom'] ?>"
					disabled>
			</div>

			<div class="mb-3 col-sm-3">
				<label for="numnberPhone" class="form-label">Numero de Telephone</label>
				<input type="text" class="form-control" id="numnberPhone" name="numero_telephone"
					value="<?= $client[0]['numero_telephone'] ?>" disabled>
			</div>
			<div class="mb-3 col-sm-3">
				<label for="adresse" class="form-label">Adresse</label>
				<input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client[0]['adresse'] ?>"
					disabled>
			</div>

		</div>

		<div class="row">

			<div class="mb-3 col-sm-3">
				<label for="mail" class="form-label">Email</label>
				<input type="email" class="form-control" id="mail" name="email_client"
					value="<?= $client[0]['email_client'] ?>" disabled>
			</div>

			<div class="mb-3 col-sm-3">
				<label for="ville" class="form-label">Ville</label>
				<input type="text" class="form-control" id="ville" name="ville" value="<?= $client[0]['ville'] ?>"
					disabled>
			</div>

			<div class="mb-3 col-sm-3">
				<label for="Pays" class="form-label">Pays</label>
				<input type="text" class="form-control" id="Pays" name="pays" value="<?= $client[0]['pays'] ?>"
					disabled>
			</div>

		</div>
	</div>

	<div class="row">

		<div class="mb-3 col-sm-3">
			<label for="saisie" class="form-label">Date de saisie</label>
			<input type="date" class="form-control" id="saisieDate" name="dat_saisie"
				value="<?= $devis['date_saisie'] ?>">
		</div>

	</div>

	<br><br>
	<!-- les champs des services -->
	<span class="services-add">
		<!-- <div class="service"> -->
		<div class="service">
			<?php $count = 0; ?>
			<?php foreach ($lignes as $ligne): ?>
				<?php $count += 1; ?>
				<div class="mb-3 col-sm-7">
					<label for="titre" class="form-label">Titre</label>
					<input type="text" class="form-control" name="titre[<?= $count ?>]" readonly id="titre"
						value="<?= $ligne['titre'] ?>">
				</div>

				<div class="mb-3 col-sm-7">
					<label for="desc" class="form-label">Description du service</label>
					<textarea class="form-control" id="desc" name="description_service[<?= $count ?>]" cols="30" rows="9"><?= $ligne['description_service'] ?></textarea>
				</div>
				<div class='row'>

					<div class="mb-3 col-sm-1">
						<label for="qte" class="form-label">Qte</label>
						<input type="text" id="qte" class="form-control prices qte_<?= $count ?>" name="qte[<?= $count ?>]"
							onInput="updateTotal('<?= $count ?>')" value="<?= $ligne['qte_commande'] ?>">
					</div>

					<div class="mb-3 col-sm-2">
						<label for="unitaire" class="form-label">Prix Unitaire</label>
						<input type="text" class="form-control prices prix_<?= $count ?>" id="unitaire"
							name="prix_unitaire[<?= $count ?>]" onInput="updateTotal(<?= $count ?>)"
							value="<?= $ligne['prix_unitaire'] ?>">
					</div>

					<div class="mb-3 col-sm-2">
						<label for="unitaire" class="form-label">Prix Total</label>
						<input type="text" class="form-control total_<?= $count ?> row-total" name="total[<?= $count ?>]"
							readonly id="total_<?= $count ?>"
							value="<?= $ligne['qte_commande'] * $ligne['prix_unitaire'] ?>" readonly>
					</div>
				</div>
			<?php endforeach ?>

		</div>

		<br><br><br>

	</span>

	<div class="row">
		<div class="mb-3 col-sm-5">
			<label for="Total" class="form-label">Total HT</label>
			<input type="text" class="form-control ht_0" id="Total" name="total_ht" readonly
				value="<?= $devis['total_ht'] ?>">
		</div>

		<div class="mb-3 col-sm-5">
			<label for="ttc" class="form-label">Total TTC <span style="margin-right: 170px;"></span><a href="#"
					class="text-danger" onclick="SupprimerTTC()" style="position:relative;"><span
						class="material-icons material-icons-outlined">remove_circle_outline</span></a></label>
			<input type="text" class="form-control text-dark ttc_0" id="ttc" name="total_ttc"
				value="<?= $devis['total_ttc'] ?>" readonly>
		</div>
	</div>

	<button type="submit" class="btn btn-outline-success">Modifier</button>
</form>

<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>

<script>
	// var ht = document.getElementById('ht');
	// var ttc = document.getElementById('ttc');
	$(document).ready(function () {
		$('#saisieDate').on('input', function () {
			var date_saisie = $('#saisieDate').val();
			// Call the generate_id_devis function using AJAX
			$.ajax({
				url: '/Controllers/DevisController/generatedIdDevis/' + date_saisie,
				type: 'GET',
				data: {
					date_saisie: date_saisie
				},
				success: function (response) {
					// Set the value of the id_devis field
					$('#ref').val(response.id_devis);
				}
			});
		})
	});


	function updateTotal(index) {
		const qte = parseInt(document.querySelector('.qte_' + index).value);
		const prix = parseInt(document.querySelector('.prix_' + index).value);
		const total = qte * prix;
		document.querySelector('.total_' + index).value = isNaN(total) ? "" : total;
		console.log(document.querySelector('.total_' + index));
		const totals = Object.values(document.getElementsByClassName('row-total'))
		const totalAmount = totals.reduce(
			(accumulator, input) => accumulator + parseInt(input.value), 0);
		document.getElementById("Total").value = isNaN(totalAmount) ? 0 : totalAmount,
			document.getElementById("ttc").value = isNaN(totalAmount) ? 0 : totalAmount * 1.2,
			document.getElementById("montantrest").value = document.getElementById("ttc").value
	}



	function SupprimerTTC() {
		ttc.value = '';
	}

	document.querySelectorAll(".prices").forEach(e => {
		e.addEventListener("input", (e) => {
			var index = e.target.className.split(" ").pop().split("_").pop();
			updateTotal(index);
		})
	});
</script>



<?php $this->endsection(); ?>