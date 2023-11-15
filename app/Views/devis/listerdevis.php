<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>



	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/home.css">
	<link rel="stylesheet" href="../../css/affichage2.css">


	<title>Gestion Devis</title>
	<style>
		.edit {
			position: relative;
		}

		.edit:hover::before {
			content: "Edit";
			position: absolute;
			top: -130%;
			left: 50%;
			transform: translateX(-50%);
			padding: 2px 5px;
			font-size: 13px;
			background-color: #333;
			color: #fff;
			border-radius: 5px;
			white-space: nowrap;
			z-index: 1;
		}

		.delete {
			position: relative;
		}

		.delete:hover::before {
			content: "Delete";
			position: absolute;
			top: -130%;
			left: 50%;
			transform: translateX(-50%);
			padding: 2px 5px;
			font-size: 13px;
			background-color: #333;
			color: #fff;
			border-radius: 5px;
			white-space: nowrap;
			z-index: 1;
		}

		.show {
			position: relative;
		}

		.show:hover::before {
			content: "Show";
			position: absolute;
			top: -130%;
			left: 50%;
			transform: translateX(-50%);
			padding: 2px 5px;
			font-size: 13px;
			background-color: #333;
			color: #fff;
			border-radius: 5px;
			white-space: nowrap;
			z-index: 1;
		}
	</style>

</head>

<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="#" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"><img src="../css/logo.png" alt="logo"></span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="dash">
					<i class='bx bxs-home'></i>
					<span class="text">Home</span>
				</a>
			</li>
			<li class="active">
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
			<form action="searchDevis">
				<div class="form-input">
					<input type="search" placeholder="Search..." name="searchNormal">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<form action="searchDevisByDate">
				<div class="form-input">
					<input type="date" placeholder="Search..." name="dateSearch">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			<!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/people.png"> -->
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<br>
					<h1>Liste des Devis</h1>
					<br>
					<table class="table table-light table-hover table-striped rounded" style="overflow: hidden" id='devis'>
						<thead>
							<tr>
								<th class="col-1">N° Devis</th>
								<th>Date Saisie</th>
								<th>Client</th>
								<th>Description</th>
								<th>Qte</th>
								<th>Prix Unitaire</th>
								<th>Total HT</th>
								<th>Total TTC</th>
								<th>Modalité.P</th>
								<th class="col-1">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$count = 1;
							foreach ($liste_devis as $list) : ?>
								<tr>
									<td><?= $list["id_devis"]; ?></td>
									<td><?= $list["date_saisie"]; ?></td>
									<td><?= $list["nom"] ?></td>
									<td>
										<?php foreach ($list["infos"] as $infos) { ?>
											<?= '<strong>' . $infos["titre"] . '</strong><br><br>' ?>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($list["infos"] as $infos) { ?>
											<?= $infos["qte_commande"] . "<br><br>" ?>
										<?php } ?>
									</td>
									<td>
										<?php foreach ($list["infos"] as $infos) { ?>

											<?= $infos["prix_unitaire"] . "<br><br>" ?>
										<?php } ?>
									</td>


									<td><?= $list["total_ht"] ?></td>
									<td><?= $list["total_ttc"] ?></td>
									<td><?= $list["modalite_paiement"] ?></td>
									<td>
										<a href="<?= base_url('modifierdevis/' . $list['id_devis']) ?>" class="edit"><span class="material-icons">edit</span></a>

										<a href="<?= base_url('devisdelete/'  . $list["id_devis"]) ?>" class="delete" ><span class="material-icons">delete</span></a>

										<a href="<?= base_url('devis/affichage/' . $list["id_devis"]) ?>" class="show"><span class="material-icons material-icons-outlined">visibility</span></a>
										
										<a href="#"><span class="material-icons material-icons-outlined" style="padding:12px"></span></a>

										<a href="#"><span class="material-icons material-icons-outlined download" id="<?= $count ?>">file_download</span></a>
									</td>
								</tr>
								<tr>
									<td colspan="10" style="padding: 0;">
										<div class="devis" id="<?= 'devis' . $count ?>">
											<img src="../../css/Devis.jpg" width="100%" class="bg">
											<div class="info-box">
												<div class="info">
													<p class="nom"><?= $list['nom'] ?></p>
													<p class="adresse"><?= $list['email_client'] ?></p>
													<p class="pays"><?= $list['pays'] ?></p>
													<p class="ville"><?= $list['ville'] ?></p>
													<p class="tel"><?= $list['numero_telephone'] ?></p>
													<p class="date"><?= $list['date_saisie'] ?></p>
													<p class="num"><?= $list["id_devis"]; ?></p>
												</div>
												<div class="details-container">
													<?php foreach ($list["infos"] as $infos) : ?>
														<div class="details">
															<p class="qte"><?= $infos['qte_commande'] ?></p>
															<p><span class="titre"><?= $infos['titre'] ?></span><?= nl2br($infos["description_service"])  ?></p>
															<p class="prix"><?= $infos['prix_unitaire'] ?> D</p>
															<p class="total"><?= number_format($infos['qte_commande'] * $infos['prix_unitaire'], 2, '.', ' ') ?> D</p>
														</div>
													<?php endforeach; ?>
												</div>
												<div class="bottom">
													<p class="sous-total"><?= $list['total_ht'] ?> D</p>
													<p class="tva"><?= number_format($list['total_ttc'] - $list['total_ht'], 2, '.', ' ') ?> D</p>
													<p class="ttc"><?= $list['total_ttc'] ?> D</p>
													<p class="modalité"><?= $list['modalite_paiement'] ?></p>
												</div>
											</div>
										</div>
									</td>
								</tr>
								<tr></tr>
							<?php
								$count++;
							endforeach ?>
						</tbody>
					</table>
				</div>
			</div>
		</main>
		<!-- MAIN -->
	</section>
	<!-- CONTENT -->
	<script src="../css/home.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

</body>
<script>
	console.clear()
	document.querySelectorAll('span').forEach(btn => {
		btn.addEventListener('click', e => {
			console.time('op')
			$('#devis' + e.target.id).show()
			html2canvas(document.getElementById('devis' + e.target.id))
				.then(canvas => {
					let base64image = canvas.toDataURL('image/png');
					console.log(base64image);

					let pdf = new jsPDF('p', 'px', [1117, 1423]);
					pdf.addImage(base64image, 'PNG', 4, -100, 1117, 1700);
					pdf.save('Devis.pdf')
					console.timeEnd('op')
				});
			$('#devis' + e.target.id).hide()

		})
	})
</script>

</html>