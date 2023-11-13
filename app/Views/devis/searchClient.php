<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Client - Page
<?php $this->endsection() ?>

<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>

<!-- nav -->
<?php $this->section('nav') ?>
<form action="/searchClient" method="POST">
	<div class="form-input">
		<input type="search" name="searchClient">
		<button type="submit" class="search-btn">
			<i class='bx bx-search'></i>
		</button>
	</div>
</form>
<?php $this->endsection() ?>
<!-- h1 -->
<?php $this->section('h1') ?>
Recherche Client
<?php $this->endsection() ?>

<!-- class active -->
<?php $this->section('liste client') ?>
active
<?php $this->endsection() ?>

<!-- Le contenue du page home -->
<?php $this->section('content') ?>

<table class="table table-light table-hover table-striped rounded text-center" style="overflow: hidden" id='factures'>
	<thead>
		<tr>
			<th>ICE</th>
			<th>Nom</th>
			<th>Email</th>
			<th>Téléphone</th>
			<th>Adresse</th>
			<th>Ville</th>
			<th>Pays</th>
			<th>Action</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($clients as $list): ?>
			<tr>
				<td class="text-secondary">
					<?= ($list['ICE']==null||$list['ICE']==0)?'Pernonne Normale':$list['ICE'] ?>
				</td>
				<td>
					<?php echo $list["nom"]; ?>
				</td>
				<td>
					<?php echo $list["email_client"]; ?>
				</td>
				<td>
					<?php echo $list["numero_telephone"]; ?>
				</td>
				<td>
					<?php echo $list["adresse"]; ?>
				</td>
				<td>
					<?php echo $list["ville"]; ?>
				</td>
				<td>
					<?php echo $list["pays"]; ?>
				</td>
				<td class="text-center">
					<a href="<?= base_url('modifierclient/' . $list['id_client']) ?>"><span class="material-icons">edit</span></a>
					<a class="delete"><span class="material-icons" onclick="event.preventDefault(); 
                                                    Swal.fire({
                                                    title: 'Êtes-vous sûr?',
                                                    text: ' supprimer le client !',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Oui, supprimer'
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = '/clientdelete/<?= $list['id_client'] ?>';}});">delete</span></a>
			</tr>
        </td>
			</tr>

		<?php endforeach ?>
	</tbody>

</table>
<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<?php $this->endsection() ?>