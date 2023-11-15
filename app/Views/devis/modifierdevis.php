<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

	<title>Gestion Devis</title>
</head>

<body style="overflow-y: overlay;">
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"><img src="../css/logo.png" alt="logo"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="/dash">
					<i class='bx bxs-home'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li>
				<a href="/devis">
					<i class="material-icons material-icons-outlined" style="font-size: 20px;padding-inline: 10px;">view_list</i>
					<span class="text">Listes des Devis</span>
				</a>
			</li>
			<li>
				<a href="/createDevis">
					<i class='bx bx-add-to-queue'></i>
					<span class="text">Créer un devis</span>
				</a>
			</li>
			<li>
				<a href="/createClient">
					<i class='bx bxs-user-plus'></i>
					<span class="text">Ajouter Client</span>
				</a>
			</li>
			<li>
				<a href="/listeClient">
					<i class='bx bx-list-ol'></i>
					<span class="text">Liste des Clients</span>
				</a>
			</li>
			<li>
				<a href="/createService">
					<i class='bx bxs-add-to-queue'></i>
					<span class="text">Ajouter service</span>
				</a>
			</li>
			<li>
				<a href="/listeService">
					<i class='bx bx-list-ul'></i>
					<span class="text">Liste des service</span>
				</a>
			</li>

		</ul>
		<ul class="side-menu">

			<li>
				<a href="/" class="logout">
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>

		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<br>
					<h1>Modifier Devis</h1>
					<br>
					<form method="post" action="/devisUpdate/<?= $service['id_service'] ?>/<?= $devis['id_devis'] ?>">
						<div class="row">

							<div class="mb-3 col-sm-3">
								<label for="ref" class="form-label">Numéro de Devis</label>
								<input type="text" class="form-control" name="id_devis" id="ref" value="<?= $devis['id_devis'] ?>" disabled>
							</div>

							<div class="mb-3 col-sm-3 client">
								<label for="ref" class="form-label">Numéro de Client </label>
								<input type="text" name="id_client" id="selectclient" class="form-control" value="<?= ($client[0]['ICE'] == 0 || $client[0]['ICE'] == null) ? 'Personne Normal' : $client[0]['ICE'] ?>" disabled>
							</div>
						</div>
						<div id="details">
							<div class="row">
								<div class="mb-3 col-sm-3">
									<label for="n-client" class="form-label">Nom Du Client</label>
									<input type="text" class="form-control" id="n-client" name="nom" value="<?= $client[0]['nom'] ?>" disabled>
								</div>

								<div class="mb-3 col-sm-3">
									<label for="numnberPhone" class="form-label">Numero de Telephone</label>
									<input type="text" class="form-control" id="numnberPhone" name="numero_telephone" value="<?= $client[0]['numero_telephone'] ?>" disabled>
								</div>
								<div class="mb-3 col-sm-3">
									<label for="adresse" class="form-label">Adresse</label>
									<input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client[0]['adresse'] ?>" disabled>
								</div>

							</div>

							<div class="row">

								<div class="mb-3 col-sm-3">
									<label for="mail" class="form-label">Email</label>
									<input type="email" class="form-control" id="mail" name="email_client" value="<?= $client[0]['email_client'] ?>" disabled>
								</div>

								<div class="mb-3 col-sm-3">
									<label for="ville" class="form-label">Ville</label>
									<input type="text" class="form-control" id="ville" name="ville" value="<?= $client[0]['ville'] ?>" disabled>
								</div>

								<div class="mb-3 col-sm-3">
									<label for="Pays" class="form-label">Pays</label>
									<input type="text" class="form-control" id="Pays" name="pays" value="<?= $client[0]['pays'] ?>" disabled>
								</div>

							</div>
						</div>

						<div class="row">

							<div class="mb-3 col-sm-3">
								<label for="saisie" class="form-label">Date de saisie</label>
								<input type="date" class="form-control" id="saisie" name="dat_saisie" value="<?= $devis['date_saisie'] ?>">
							</div>

						</div>

						<br><br>
						<!-- les champs des services -->
						<span class="services-add">
							<!-- <div class="service"> -->
							<div class="service">
								<?php $count = 0; ?>
								<?php $descriptions = []; ?>
								<?php foreach ($lignes as $ligne) : ?>
									<div class="mb-3 col-sm-8">
										<label for="titre" class="form-label">Titre</label>
										<input type="text" class="form-control" name="titre[<?= $count ?>]" readonly id="titre" value="<?= $ligne['titre'] ?>">
									</div>

									<div class="mb-3 col-sm-8">
										<label for="desc" class="form-label" style="white-space: pre-wrap;">Description du service</label>
										<textarea class="form-control" id="desc" name="description_service[<?= $count ?>]" cols="30" rows="10" data-index="<?= $count ?>"></textarea>
									</div>

									<div class='row'>

										<div class="mb-3 col-sm-1">
											<label for="qte" class="form-label">Qte</label>
											<input type="text" id="qte" class="form-control prices qte_<?= $count ?>" name="qte[<?= $count ?>]" onInput="updateTotal('<?= $count ?>')" value="<?= $ligne['qte_commande'] ?>">
										</div>

										<div class="mb-3 col-sm-2">
											<label for="unitaire" class="form-label">Prix Unitaire</label>
											<input type="text" class="form-control prices prix_<?= $count ?>" id="unitaire" name="prix_unitaire[<?= $count ?>]" onInput="updateTotal(<?= $count ?>)" value="<?= $ligne['prix_unitaire'] ?>">
										</div>

										<div class="mb-3 col-sm-2">
											<label for="unitaire" class="form-label">Prix Total</label>
											<input type="text" class="form-control total_<?= $count ?> row-total" name="total[<?= $count ?>]" readonly id="total_<?= $count ?>" value="<?= $ligne['qte_commande']*$ligne['prix_unitaire'] ?>" readonly>
										</div>
									</div>
									<?php $descriptions[] = $ligne['description_service']; ?>
									<?php $count += 1; ?>
									<?php endforeach ?>
									
								</div>
								
							<br><br><br>

						</span>

						<div class="row">
							<div class="mb-3 col-sm-5">
								<label for="Total" class="form-label">Total HT</label>
								<input type="text" class="form-control ht_0" id="Total" name="total_ht" readonly value="<?= $devis['total_ht'] ?>">
							</div>

							<div class="mb-3 col-sm-5">
								<label for="ttc" class="form-label">Total TTC <span style="margin-right: 170px;"></span><a href="#" class="text-danger" onclick="SupprimerTTC()" style="position:relative;"><span class="material-icons material-icons-outlined">remove_circle_outline</span></a></label>
								<input type="text" class="form-control text-dark ttc_0" id="ttc" name="total_ttc" value="<?= $devis['total_ttc'] ?>" readonly>
							</div>
						</div>

						<button type="submit" class="btn btn-success">Modifier</button>
					</form>

					<script>
						var descriptions = <?= json_encode($descriptions); ?>;
						var textareas = document.querySelectorAll('textarea');

						textareas.forEach(function(textarea) {
							var index = textarea.dataset.index;
							textarea.value = descriptions[index];
						});
					</script>

					<script>
						// var ht = document.getElementById('ht');
						// var ttc = document.getElementById('ttc');

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


					<script src="../css/home.js"></script>
					<script src="../jquery-3.6.4.min.js"></script>

</body>

</html>