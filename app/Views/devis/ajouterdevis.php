<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Créer Un Devis
<?php $this->endsection() ?>

<!-- class active -->
<?php $this->section('Nouveau Devis') ?>
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
<form method="post" action="/storeDevis">
	<div class="row">

		<div class="mb-3 col-sm-5">
			<label for="ref" class="form-label">Numéro de Devis</label>
			<input type="text" class="form-control" name="id_devis" id="ref" readonly>
		</div>

		<div class="mb-3 col-sm-5 client">
			<label for="ref" class="form-label">Nom du Client </label>
			<select name="id_client" id="selectclient" class="form-select">
				<option value=""></option>
				<?php foreach ($clients as $nom) : ?>
					<option value="<?= $nom->id_client ?>"><?= $nom->nom ?></option>
				<?php endforeach ?>
			</select>
		</div>
	</div>


	<div class="row">

		<div class="mb-3 col-sm-3">
			<label for="saisie" class="form-label">Date de saisie</label>
			<input type="date" class="form-control" id="saisie" name="date_saisie">
		</div>
	</div>

	<br><br>
	<!-- les champs des services -->
	<span class="services-add">
		<!-- <div class="service"> -->
		<div class="service">

			<div class="row">
				<div class="mb-3 col-sm-10">
					<label for="pu" class="form-label">Service</label>
					<select class="form-select service-select" name="service[0]" id="service">
						<option value=""></option>
						<?php foreach ($services as $titre) : ?>
							<option value="<?= $titre->id_service ?>"><?= $titre->titre ?></option>
						<?php endforeach ?>
					</select>
				</div>
			</div>

			<div class="row">
				<div class="mb-3 col-sm-10">
					<label for="desc" class="form-label" style="white-space: pre-wrap;">Description du service</label>
					<textarea class="form-control desc_0" name="descriptif_devis[0]" id="desc" cols="30" rows="10"></textarea>
				</div>
			</div>

			<div class="row">

				<div class="mb-3 col-sm-1">
					<label for="pu" class="form-label">Qte</label>
					<input type="text" class="form-control prices qte_0" id="pu" name="qte_commande[0]" onInput="updateTotal(0)">
				</div>


				<div class="mb-3 col-sm-2">
					<label for="pxunitaire" class="form-label">Prix Unitaire</label>
					<input type="text" class="form-control prices prix_0" id="pxunitaire" name="prix_unitaire[0]" onInput="updateTotal(0)">
				</div>

				<div class="mb-3 col-sm-2">
					<label for="pu" class="form-label">Total</label>
					<input type="text" class="form-control total_0 row-total" name="total[0]" readonly>
				</div>

			</div>
		</div>

		<a href="#" class="btn btn-success" id="add-service-button">
			+ service
		</a>
		<br><br><br>

	</span>

	<div class="row">
		<div class="mb-3 col-sm-5">
			<label for="Total" class="form-label">Total HT</label>
			<input type="text" class="form-control" id="Total" name="total_ht" readonly>
		</div>

		<div class="mb-3 col-sm-5">
			<label for="ttc" class="form-label">Total TTC <span style="margin-right: 170px;"></span><a href="#" class="text-danger" onclick="SupprimerTTC()" style="position:relative;"><span class="material-icons material-icons-outlined">remove_circle_outline</span></a></label>
			<input type="text" class="form-control text-dark" id="ttc" name="total_ttc">
		</div>
	</div>
	
	<div class="row">
		<div class="mb-3 col-sm-5">
			<label for="statusLitige" class="form-label">Modalite de Paiment</label>
			<select class="form-select" aria-label="Default select" id='montant' name="modalite_paiement">
				<option value="service Prépayé">service Prépayé</option>
				<option value="50% à la commande 50% à la livraison">50% à la commande 50% à la livraison</option>
				<option value="Bon de commande">Bon de commande</option>
			</select>
		</div>
		<div class="mb-3 col-sm-5">
			<label for="" class="form-label">Etat</label>
			<select class="form-select" aria-label="Default select" name="etat">
				<option value="Non Accordé">Non Accordé</option>
				<option value="Accordé">Accordé</option>
			</select>
		</div>
	</div>
	<br>
	<button type="submit" class="btn btn-primary">Ajouter</button>
</form>
<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>

<script>
	var count = 0;

	function addService() {
		count++;

		// Créer un nouvel élément div
		const newServiceDiv = document.createElement("div");

		$(document).ready(function() {
			$('.service-select' + count).on('change', function() {
				var id_service = $('.service-select' + count + ' option:selected').val();
				var row = $(this).closest('.row');

				$.ajax({
					url: '/Controllers/DevisController/getServiceInfo/' + id_service,
					type: 'GET',
					data: {
						id_service: id_service
					},
					success: function(response) {
						var service_info = response;
						$('.desc_' + count).val(service_info.description);
						$('.prix_' + count).val(service_info.prix);

					}
				});
			});
		});
		// Ajouter les classes CSS pour les éléments du formulaire
		newServiceDiv.classList.add("row", "mb-3");

		// Ajouter le code HTML pour les éléments du formulaire
		newServiceDiv.innerHTML = `
<div class="row">
<div class="mb-3 col-sm-10">
	<label for="pu" class="form-label">Service</label>
	<select class="form-select service-select${count}" name="service[${count}]" id="service">
		<option value=""></option>
		<?php foreach ($services as $titre) : ?>
				<option value="<?= $titre->id_service ?>"><?= $titre->titre ?></option>
		<?php endforeach ?>
	</select>
</div>
</div>

<div class="row">
<div class="mb-3 col-sm-10">
	<label for="desc" class="form-label">Description du service</label>
	<textarea class="form-control desc_${count}" name="descriptif_devis[${count}]" id="desc" cols="30" rows="10"></textarea>
</div>
</div>

<div class="row">

<div class="mb-3 col-sm-1">
	<label for="pu" class="form-label">Qte</label>
	<input type="text" class="form-control prices qte_${count} " id="pu" name="qte_commande[${count}]"  onInput="updateTotal(${count})">
</div>


<div class="mb-3 col-sm-2">
	<label for="pxunitaire" class="form-label">Prix Unitaire</label>
	<input type="text" class="form-control prices prix_${count}" id="pxunitaire" name="prix_unitaire[${count}]" onInput="updateTotal(${count})">
</div>

<div class="mb-3 col-sm-2">
	<label for="pu" class="form-label">Total</label>
	<input type="text" class="form-control total_${count} row-total"  name="total[${count}]" readonly>
</div>

</div>
`;

		// Ajouter le nouvel élément div à la balise span
		const servicesAdd = document.querySelector(".service");
		servicesAdd.appendChild(newServiceDiv);


	}

	function updateTotal(index) {
		const qte = parseInt(document.querySelector('.qte_' + index).value);
		const prix = parseInt(document.querySelector('.prix_' + index).value);
		const total = qte * prix;
		document.querySelector('.total_' + index).value = isNaN(total) ? "" : total;
		const totals = Object.values(document.getElementsByClassName('row-total'))
		const totalAmount = totals.reduce(
			(accumulator, input) => accumulator + parseInt(input.value), 0);
		document.getElementById("Total").value = isNaN(totalAmount) ? 0 : totalAmount,
			document.getElementById("ttc").value = isNaN(totalAmount) ? 0 : totalAmount * 1.2,
			document.getElementById("montantrest").value = document.getElementById("ttc").value

	}



	document.querySelectorAll(".prices").forEach(e => {
		e.addEventListener("input", (e) => {
			var index = e.target.className.split(" ").pop().split("_").pop();
			updateTotal(index);
		})
	});



	$(document).ready(function() {
		$('#saisie').on('input', function() {
			var date_saisie = $('#saisie').val();
			// Call the generate_id_devis function using AJAX
			$.ajax({
				url: '/Controllers/DevisController/generatedIdDevis/' + date_saisie,
				type: 'GET',
				data: {
					date_saisie: date_saisie
				},
				success: function(response) {
					// Set the value of the id_facture field
					$('#ref').val(response.id_devis);
				}
			});
		})
	});

	// Ajouter un événement au bouton pour appeler la fonction addService
	const addServiceButton = document.querySelector("#add-service-button");
	addServiceButton.addEventListener("click", addService);
	var inputField = document.getElementById("numclient");
	var selectField = document.getElementById("selectclient");
	var nameCliient = document.getElementById("n-client");
	var prenom = document.getElementById("nameClient");
	var email = document.getElementById("mail");
	var telephone = document.getElementById("numnberPhone");
	var ville = document.getElementById("ville");
	var pays = document.getElementById("Pays");

	var montantInput = document.getElementById("montant");
	var optionSelect1 = document.getElementById("select-option");
	var optionSelect2 = document.getElementById("select-status")
	var montantRest = document.getElementById('montantrest');
	var ttcInput = document.getElementById("ttc");
	var htInput = document.getElementById("Total");

	function SupprimerTTC() {
		ttcInput.value = '';
		montantRest.value = htInput.value
	}


	// remplir les champs description et prix unitaire d'apres la base de donné
	$(document).ready(function() {
		$('.service-select').on('change', function() {
			var id_service = $('.service-select option:selected').val();

			$.ajax({
				url: '/Controllers/DevisController/getServiceInfo/' + id_service,
				type: 'GET',
				data: {
					id_service: id_service
				},
				success: function(response) {
					var service_info = response;
					$('.desc_0').val(service_info.description);
					$('.prix_0').val(service_info.prix);
				}
			});
		});
	});
</script>


<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>



<?php $this->endsection() ?>