<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<!-- shortcut icon -->
	<link rel="shortcut icon" href="./logofms.png">

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

	<!-- My CSS -->
	<link rel="stylesheet" href="../../css/home.css">

	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<!-- My CSS -->
	<link rel="stylesheet" href="../../style.css">

	<style>
		.text-container {
			overflow: hidden;
		}

		.text-animated {
			font-weight: bold;
			display: inline-block;
			animation: move-left-to-right 5s linear infinite;
		}

		@keyframes move-left-to-right {
		0% {
			transform: translateX(-100%);
		}
		100% {
			transform: translateX(100%);
		}
		}

		.text-animated:hover {
			animation-play-state: paused;
		}
		#sidebar{
			z-index: 99;
		}

	</style>
	<title><?php $this->renderSection('title')?></title>
</head>
<body>
	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="/facture" class="brand">
			<i class='bx bxs-smile'></i>
			<span class="text"><img src="../../logofes.png" width="180" alt="fes marketing Logo"></span>
		</a>
		<ul class="side-menu top">
			<li class="<?php $this->renderSection('home')?>">
				<a href="/facture">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li class="<?php $this->renderSection('create')?>">
				<a href="createFacture">
					<i class='bx bx-add-to-queue'></i>
					<span class="text">Nouvelle Facture</span>
				</a>
			</li>
			<li class="<?php $this->renderSection('relance')?>">
				<a href="/tablesRelance">
					<i class='bx bxs-group' ></i>
					<span class="text">Relancement</span>
				</a>
			</li>
		</ul>
		<ul class="side-menu">
			<li>
				<a href="#" class="logout" id='alert'>
					<i class='bx bxs-log-out-circle'></i>
					<span class="text">Log-out</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			<form action="/search" method="POST">
				<div class="form-input">
					<input type="search" name="keyword">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<form action="/Bydate" method="POST">
				<div class="form-input">
					<input type="date" name="dateSearch">
					<button type="submit" class="search-btn"><i class='bx bx-search' ></i></button>
				</div>
			</form>
			<a href="/facture" class="profile">
				<img src="../../img/people.png">
			</a>
		</nav>
		<!-- NAVBAR -->

		<!-- MAIN -->
		<main>
			<div class="head-title">
				<div class="left">
					<h1 class="text-primary"><?php $this->renderSection('h1')?></h1>
					<ul class="breadcrumb">
						<li>
							<a href="/facture">Dashboard</a>
						</li>
						<li><i class='bx bx-chevron-right' ></i></li>
						<li>
							<a class="active" href="/facture">Home</a>
						</li>
					</ul>
				</div>
				
			</div>
			<div class="mt-4">
				<div class="content-wrapper">
					<div class="container">
						<?php $this->renderSection('content')?>
					</div>
				</div>
			</div>
		</main>
		<!-- MAIN -->
		<article class="container" style="width: 50%">
			<div class="text-container">
				<span class="text-animated"><a href="#" class="text-danger" id="redirect">Tu Veux Voir Les Pages Des Devis ?</a></span>
			</div>
		</article>
	</section>
	<!-- CONTENT -->
	

	<script src="../script.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script>
		const saveButton = document.getElementById('alert');
		const redirectButton = document.getElementById('redirect')
		saveButton.addEventListener('click', () => {
			Swal.fire({
				title: 'Do you want to Leave ? ',
				showDenyButton: true,
				confirmButtonText: 'Log-Out',
				denyButtonText: `Annuler`,
			}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					location.href = '/';
					// Swal.fire('Saved!', '', 'success')
				} else if (result.isDenied) {
					Swal.fire('Mercie !!', '', 'info')
				}
			})
		})
		redirectButton.addEventListener('click', () => {
			Swal.fire({
				title: 'Tu Veux Voir Les Pages Des Devis ? ',
				showDenyButton: true,
				confirmButtonText: 'Go to Devis',
				denyButtonText: `Annuler`,
			}).then((result) => {
				/* Read more about isConfirmed, isDenied below */
				if (result.isConfirmed) {
					location.href = '/devis';
					// Swal.fire('Saved!', '', 'success')
				} else if (result.isDenied) {
					Swal.fire('Mercie !!', '', 'info')
				}
			})
		})
	</script>
</body>
</html>