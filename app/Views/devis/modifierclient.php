<?php $this->extend('layouts/index') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Gestion - Devis - Page
<?php $this->endsection() ?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- h1 -->
<?php $this->section('h1') ?>
Modifier un Client
<?php $this->endsection() ?>


<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<form method="post" action="<?= base_url('clientupdate/' . $client['id_client']) ?>">


    <div class="row">
        <div class="mb-3 col-sm-3">
            <label for="n-client" class="form-label">ICE <font color="red">*</font></label>
            <input type="text" class="form-control" id="n-client" name="ICE" value="<?= ($client['ICE']==0||$client['ICE']==null)?'Personne Normale':$client['ICE']?>" <?= ($client['ICE']==0||$client['ICE']==null)?'readOnly':''?>>
        </div>
    </div>
    <div class="row">
        <div class="mb-3 col-sm-4">
            <label for="n-client" class="form-label">Nom Du Client <font color="red">*</font></label>
            <input type="text" class="form-control" id="n-client" name="nom" value="<?= $client['nom']; ?>">
        </div>

        <div class="mb-3 col-sm-3">
            <label for="numnberPhone" class="form-label">Telephone <font color="red">*</font></label>
            <input type="text" class="form-control" id="numnberPhone" name="numero_telephone"
                value="<?= $client['numero_telephone']; ?>">
        </div>

        <div class="mb-3 col-sm-3">
            <label for="mail" class="form-label">Email <font color="red">*</font></label>
            <input type="email" class="form-control" id="mail" name="email_client"
                value="<?= $client['email_client']; ?>">
        </div>

    </div>
    <div class="row">

        <div class="mb-3 col-sm-4">
            <label for="adresse" class="form-label">Adresse <font color="red">*</font></label>
            <input type="text" class="form-control" id="adresse" name="adresse" value="<?= $client['adresse']; ?>">
        </div>

        <div class="mb-3 col-sm-3">
            <label for="ville" class="form-label">Ville <font color="red">*</font></label>
            <input type="text" class="form-control" id="ville" name="ville" value="<?= $client['ville']; ?>">
        </div>

        <div class="mb-3 col-sm-3">
            <label for="Pays" class="form-label">Pays <font color="red">*</font></label>
            <input type="text" class="form-control" id="Pays" name="pays" value="<?= $client['pays']; ?>">
        </div>

    </div>

    <button type="submit" class="btn btn-outline-primary">Modifier</button>
</form>
<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<?php $this->endsection() ?>