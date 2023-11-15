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
				<a href="dash">
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
			<li >
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
			<li class="active">
				<a href="#">
                    <i class='bx bxs-add-to-queue'></i>
					<span class="text">Ajouter service</span>
				</a>
			</li>
			<li >
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
					<h1>Ajouter un Service</h1>
					<br>
					<form method="post" action="Servicestore">
						
						<!-- les champs des services -->
						<span class="services-add">
							<!-- <div class="service"> -->
							<div class="service">
                                <div class="row">
                                    <div class="mb-3 col-sm-7">
										<label for="desc" class="form-label">Titre  du service</label>
										<input type="text" class="form-control desc_0" id="desc" name="titre">
									</div>
                                </div>
								<div class="row">
									<div class="mb-3 col-sm-7">
										<label for="desc" class="form-label">Description du service</label>
                                        <textarea class="form-control desc_0" id="desc" name="descriptif_devis" cols="30" rows="9"></textarea>
									</div>
                                <div class="row">
									<div class="mb-3 col-sm-2">
										<label for="pu" class="form-label">Prix Unitaire</label>
										<input type="text" class="form-control prices prix_0" id="pu" name="prix_unitaire" onInput="updateTotal(0)">
									</div>
								</div>
							</div>

						</span>

						<button type="submit" class="btn btn-primary">Ajouter</button>
					</form>


					<!-- MAIN -->
	</section>
	<!-- CONTENT -->

	

	<script src="../css/home.js"></script>
	<script src="../jquery-3.6.4.min.js"></script>

</body>

</html>