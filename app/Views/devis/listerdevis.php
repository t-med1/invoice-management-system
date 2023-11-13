<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>

<!-- partie css -->
<?php $this->section('css') ?>
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
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Devis
<?php $this->endsection() ?>

<!-- class active -->
<?php $this->section('home') ?>
active
<?php $this->endsection() ?>

<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<article>
	<?php if (session()->getFlashdata('success')): ?>
		<div class="alert alert-success" id="myDiv">
			<?= session()->getFlashdata('success') ?>
		</div>
	<?php endif; ?>
	<table class="table table-light table-hover table-striped rounded text-center" style="overflow: hidden"
		id='factures'>
		<thead>
			<tr>
				<th>N° Devis</th>
				<th>Date Saisie</th>
				<th>Client</th>
				<th>Description</th>
				<th>Qte</th>
				<th>Prix Unitaire</th>
				<th>Total HT</th>
				<th>Total TTC</th>
				<th>Action</th>
				<th>Imprimer</th>
			</tr>
		</thead>
		<tbody>
			<?php
			$count = 1;
			foreach ($liste_devis as $list): ?>
				<tr>
					<td>
						<?= $list["id_devis"]; ?>
					</td>
					<td>
						<?= $list["date_saisie"]; ?>
					</td>
					<td>
						<?= $list["nom"] ?>
					</td>
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
					<td>
						<?= $list["total_ht"] ?>
					</td>
					<td>
						<?= $list["total_ttc"] ?>
					</td>
					<td>
						<a href="<?= base_url('modifierdevis/' . $list['id_devis']) ?>" class="text-success"><span
								class="material-icons">edit</span></a>
								<a class="delete"><span class="material-icons" onclick="event.preventDefault(); 
											Swal.fire({
											title: 'Êtes-vous sûr?',
											text: 'Cela va supprimer aussi la facture de ce devis !',
											icon: 'warning',
											showCancelButton: true,
											confirmButtonColor: '#3085d6',
											cancelButtonColor: '#d33',
											confirmButtonText: 'Oui, supprimer'
											}).then((result) => {
											if (result.isConfirmed) {
												window.location.href = '<?= base_url('devisdelete/'  . $list['id_devis']) ?>';}});">delete</span></a>
					</td>
					<td>
						<a href="#" class="text-primary">
							<span class="material-icons material-icons-outlined download" id="<?= $count ?>">picture_as_pdf</span>
						</a>
					</td>
				</tr>
				<tr>
					<td colspan="10" style="padding: 0;">
						<div class="devis" id="<?= 'devis' . $count ?>">
							<img src="../../css/Devis.jpg" width="100%" class="bg">
							<div class="info-box">
								<div class="info">
									<p class="nom">
										<?= $list['nom'] ?>
									</p>
									<p class="adresse">
										<?= $list['email_client'] ?>
									</p>
									<p class="pays">
										<?= $list['pays'] ?>
									</p>
									<p class="ville">
										<?= $list['ville'] ?>
									</p>
									<p class="tel">
										<?= $list['numero_telephone'] ?>
									</p>
									<p class="date">
										<?= $list['date_saisie'] ?>
									</p>
									<p class="num">
										<?= $list["id_devis"]; ?>
									</p>
								</div>
								<div class="details-container">
									<?php foreach ($list["infos"] as $infos): ?>
										<div class="details">
											<p class="qte">
												<?= $infos['qte_commande'] ?>
											</p>
											<p><span class="titre">
													<?= $infos['titre'] ?>
												</span>
												<?= nl2br($infos["description_service"]) ?>
											</p>
											<p class="prix">
												<?= $infos['prix_unitaire'] ?> D
											</p>
											<p class="total">
												<?= number_format($infos['qte_commande'] * $infos['prix_unitaire'], 2, '.', ' ') ?>
												D
											</p>
										</div>
									<?php endforeach; ?>
								</div>
								<div class="bottom">
									<p class="sous-total">
										<?= $list['total_ht'] ?> D
									</p>
									<p class="tva">
										<?= number_format($list['total_ttc'] - $list['total_ht'], 2, '.', ' ') ?> D
									</p>
									<p class="ttc">
										<?= $list['total_ttc'] ?> D
									</p>
									<p class="modalité">
										<?= $list['modalite_paiement'] ?>
									</p>
								</div>
							</div>
						</div>
					</td>
				</tr>
				<tr></tr>

			<?php $count++;
			endforeach ?>
		</tbody>
	</table>
</article>

<script src="../../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

	// function deleteButton(event, ev) {
	// 	Swal.fire({
	// 		title: 'Are you sure?',
	// 		text: "You won't be able to revert this!",
	// 		icon: 'warning',
	// 		showCancelButton: true,
	// 		confirmButtonColor: '#3085d6',
	// 		cancelButtonColor: '#d33',
	// 		confirmButtonText: 'Yes, delete it!',
	// 	}).then((result) => {
	// 		if (result.value) {
	// 			Swal.fire({
	// 				title: 'Deleted !',
	// 				text: "It was been deleted !",
	// 				icon: 'success',
	// 				showConfirmButton: true,
	// 			})

	// 			// Send an AJAX request to delete the line
	// 			$.ajax({
	// 				url: 'devisdelete/' + ev,
	// 				type: 'GET',
	// 				success: function (response) {
	// 					console.log(response);
	// 				},
	// 				error: function (xhr, status, error) {
	// 					console.log(error);
	// 				}
	// 			});

	// 		}
	// 		if (result.isConfirmed) {
	// 			location.href = '/devis';
	// 			// Swal.fire('Saved!', '', 'success')
	// 		}
	// 	})
	// }

	$(document).ready(function () {
		setTimeout(function () {
			$('#myDiv').slideUp();
		}, 1000);
	});
</script>
<script>
	console.clear()
	document.querySelectorAll('.download').forEach(btn => {
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
<?php $this->endsection() ?>