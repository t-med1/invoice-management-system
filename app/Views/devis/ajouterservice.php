<?php $this->extend('layouts/index')?>

<!-- titre du page -->
<?php $this->section('title')?>
Gestion - Devis - Page
<?php $this->endsection()?>

<!-- h1 -->
<?php $this->section('h1')?>
Cree Service
<?php $this->endsection()?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- class active -->
<?php $this->section('Nouveau Service')?>
active
<?php $this->endsection()?>

<!-- Le contenue du page home -->
<?php $this->section('content')?>
					<form method="post" action="Servicestore">
						
						<!-- les champs des services -->
						<span class="services-add">
							<!-- <div class="service"> -->
							<div class="service">
                                <div class="row">
                                    <div class="mb-3 col-sm-7">
										<label for="desc" class="form-label">Titre  du service <font color="red">*</font></label>
										<input type="text" class="form-control desc_0" id="desc" name="titre">
									</div>
                                </div>
								<div class="row">
									<div class="mb-3 col-sm-7">
										<label for="desc" class="form-label">Description du service <font color="red">*</font></label>
                                        <textarea class="form-control desc_0" id="desc" name="descriptif_devis" cols="30" rows="9"></textarea>
									</div>
                                <div class="row">
									<div class="mb-3 col-sm-2">
										<label for="pu" class="form-label">Prix Unitaire <font color="red">*</font></label>
										<input type="text" class="form-control prices prix_0" id="pu" name="prix_unitaire" onInput="updateTotal(0)">
									</div>
								</div>
							</div>

						</span>

						<button type="submit" class="btn btn-outline-primary">Ajouter</button>
					</form>
	<script src="../css/home.js"></script>
	<script src="../jquery-3.6.4.min.js"></script>

<?php $this->endsection()?>