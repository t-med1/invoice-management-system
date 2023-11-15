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
	<style>
		.clt1 {
			position: relative;
		}

		.clt1:hover::before {
			content: "Entreprise";
			position: absolute;
			top: -70%;
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

		.clt2 {
			position: relative;
		}

		.clt2:hover::before {
			content: "Particulier";
			position: absolute;
			top: -70%;
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
			<li class="active">
				<a href="#">
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
					<h1>Ajouter un Client</h1>
					<br>
					<form method="post" action="clientstore">

						<!-- les champs des services -->
						<div class="row">
							<a class="btn btn-light col-1 clt1" href="#" style="margin-left: 1%;" id="business-btn"><span class="material-icons material-icons-outlined">business</span></a>
							<a class="btn btn-light col-1 clt2" href="#" style="margin-left: 5%;" id="groups-btn"><span class="material-icons material-icons-outlined">groups</span></a>
						</div>
						<br>
						<div class="row">
							<div class="mb-3 col-sm-3" id="ICE">
								<label for="ice" class="form-label">ICE</label>
								<input type="text" class="form-control" id="ice" name="ICE">
							</div>
						</div>
						<div class="row">
							<div class="mb-3 col-sm-4">
								<label for="n-client" class="form-label">Nom Du Client</label>
								<input type="text" class="form-control" id="n-client" name="nom">
							</div>

							<div class="mb-3 col-sm-3">
								<label for="numnberPhone" class="form-label">Telephone</label>
								<input type="text" class="form-control" id="numnberPhone" name="numero_telephone">
							</div>

							<div class="mb-3 col-sm-3">
								<label for="mail" class="form-label">Email</label>
								<input type="email" class="form-control" id="mail" name="email_client">
							</div>
						</div>

						<div class="row">

							<div class="mb-3 col-sm-4" id="adresse">
								<label for="nameClient" class="form-label">Adresse</label>
								<input type="text" class="form-control" id="nameClient" name="adresse">
							</div>

							<div class="mb-3 col-sm-3">
								<label for="ville" class="form-label">Ville</label>
								<input type="text" class="form-control" id="ville" name="ville">
							</div>

							<div class="mb-3 col-sm-3">
								<label for="Pays" class="form-label">Pays</label>
								<input type="text" class="form-control" id="Pays" name="pays">
							</div>

						</div>

						<button type="submit" class="btn btn-primary">Ajouter</button>
					</form>

					<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	<script>
		$(document).ready(function() {
			$('#business-btn').click(function() {
				$('#ICE').show() // show the ICE input field
				$('#adresse').show(); // show the address input field
				
			});

			$('#groups-btn').click(function() {
				$('#ICE').hide(); // hide the ICE input field
				$('#adresse').hide(); // hide the address input field
			});
		});
	</script>



	<script src="../css/home.js"></script>
	<script src="../jquery-3.6.4.min.js"></script>

</body>

</html>