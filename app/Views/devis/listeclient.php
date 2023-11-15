<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="../css/home.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

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
			<li class="active">
				<a href="#">
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
	<section  id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu'></i>
			<form action="searchclient" method="post">
				<div class="form-input">
					<input type="search" placeholder="Search..." name="searchclient">
					<button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
				</div>
			</form>
			
		</nav>
		
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<br>
					<h1>Liste des Clients</h1>
					<br>
					<table class="table table-light table-hover table-striped table-bordered rounded" style="overflow: hidden" id='factures'>
						<thead>
							<tr>
								<th>Nom</th>
								<th>Tèl</th>
								<th>Email</th>
								<th>Adresse</th>
								<th>Ville</th>
								<th>Pays</th>
								<th class="text-center col-1">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach ($liste_devis as $list) : ?>
								<tr>
									<td><?= $list["nom"]?></td>
									<td><?= $list["numero_telephone"]; ?></td>
									<td><?= $list["email_client"]; ?></td>
									<td><?= $list["adresse"]; ?></td>
									<td><?= $list["ville"]; ?></td>
									<td><?= $list["pays"]; ?></td>
									<td class="text-center">
										<a href="<?= base_url('modifierclient/' . $list['id_client']) ?>" class="edit"><span class="material-icons">edit</span></a>
										<a class="delete"><span class="material-icons" onclick="event.preventDefault(); 
											Swal.fire({
											title: 'Êtes-vous sûr?',
											text: 'Vous ne pourrez pas revenir en arrière !',
											icon: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#3085d6',
											cancelButtonColor: '#d33',
											confirmButtonText: 'Oui, supprimer'
											}).then((result) => {
											if (result.isConfirmed) {
												window.location.href = '<?= base_url('clientdelete/' . $list['id_client']) ?>';}});">delete</span></a></td>
								</tr>
							<?php endforeach ?>
						</tbody>
					</table>


					<!-- MAIN -->
	</section>
	<!-- CONTENT -->



	<script src="../css/home.js"></script>
	<script src="../jquery-3.6.4.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.js"></script>

</body>

</html>