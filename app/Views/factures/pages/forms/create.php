<?php $this->extend('layouts/master') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Create - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Nouvelle Facture
<?php $this->endsection() ?>
<!-- input search -->
<?php $this->section('type') ?>
hidden
<?php $this->endsection() ?>

<!-- input search by date-->
<?php $this->section('datee') ?>
hidden
<?php $this->endsection() ?>
<!-- class active -->
<?php $this->section('create') ?>
active
<?php $this->endsection() ?>

<!-- Le contenue du fORMULAIRE a remplir -->
<?php $this->section('content') ?>
<form method="post" action="facture/store">
  <div class="row">
    <div class="mb-5 col-sm-3">
      <label for="ref" class="form-label">Numéro de Facture</label>
      <input type="text" class="form-control" name="id_facture" id="id_facture" required readonly>
    </div>
    <div class="mb-5 col-sm-3">
      <label for="saisie" class="form-label">Date de saisie <font color="red">*</font></label>
      <input type="date" class="form-control" id="date_saisie" name="date_saisie" required>
    </div>
    <div class="mb-5 col-sm-3">
      <label for="emission" class="form-label">Date Émission <font color="red">*</font></label>
      <input type="date" class="form-control" id="emission" name="date_emission" required>
    </div>
    <div class="mb-5 col-sm-3">
      <label for="echeance" class="form-label">Date Echéance <font color="red">*</font></label>
      <input type="date" class="form-control" id="echeance" name="date_echeance" required>
    </div>
    
  </div>
  <div class="row">
    <div class="mb-5 col-sm-4">
        <label for="ref" class="form-label">Numéro du Devis <font color="red">*</font></label>
        <select class="form-select devis-select" aria-label="Default select example" name="selectDevis">
          <option value="">Choisi un Numéro Devis</option>
          <?php foreach ($dataDevis as $DevisID): ?>
            <option value='<?= $DevisID["id_devis"] ?>'><?= $DevisID["id_devis"] ?></option>
          <?php endforeach; ?>
        </select>
      </div><div class="mb-5 col-sm-4">
        <label for="lastName" class="form-label">ICE</label>
        <input type="text" class="form-control ICE" id="ICE" name="ICE" readonly>
        <input type="hidden" class="form-control" id="id_client" name="id_client">
      </div>
      <div class="mb-5 col-sm-4">
        <label for="nameClient" class="form-label">Nom Du Client</label>
        <input type="text" class="form-control nameClient" id="nameClient" name="nameClient" readonly>
      </div>
  </div>
  <div class="row">
    <div class="mb-5 col-sm-4">
      <label for="mail" class="form-label">Email</label>
      <input type="email" class="form-control" id="mail" name="mail" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="numnberPhone" class="form-label">Numero de Telephone</label>
      <input type="text" class="form-control" id="numberPhone" name="numnberPhone" readonly>
    </div>
    <div class="mb-3 col-sm-4">
      <label for="ville" class="form-label">Ville</label>
      <input type="text" class="form-control" id="ville" name="ville" readonly>
    </div>
  </div>
  <div class="row">
    <div class="mb-5 col-sm-2">
    </div>
    <div class="mb-5 col-sm-4">
      <label for="Pays" class="form-label">Pays</label>
      <input type="text" class="form-control" id="pays" name="pays" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="adresse" class="form-label">Adresse</label>
      <input type="text" class="form-control" id="adresse" name="adresse" readonly>
    </div>
    <div class="mb-5 col-sm-2">
    </div>
    </div>
    <div class="row">
    <div class="mb-5 col-sm-2">
    </div>
    <div class="mb-5 col-sm-4">
      <label for="ttc" class="form-label">Total HT</label>
      <input type="text" class="form-control text-dark ht" id="ht" name="ht" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="ttc" class="form-label">Total TTC</label>
      <input type="text" class="form-control text-dark ttc" id="ttc" name="ttc" value="1"readonly>
    </div>
    <div class="mb-5 col-sm-2">
    </div>
  </div>
  <div class="row">
    <div class="mb-5 col-sm-4">
      <label for="montant" class="form-label">Montant payé <font color="red">*</font></label>
      <input type="number" class="form-control" id="montant" name="montant" required>
      <input type="hidden" class="form-control" id="id_paiment" name="id_paiment">
    </div>
    <div class="mb-5 col-sm-4">
      <label for="montant" class="form-label">Montant Restant</label>
      <input type="number" class="form-control text-dark" id="montantrest" name="montant_rest" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="status" class="form-label">Statut <font color="red">*</font></label>
      <select class="form-select" aria-label="Default select" name="status" id="status" required>
        <option value="echue" selected>Echue</option>
        <option value="non Echue">Non Echue</option>
        <option value="encaisse">Encaissée</option>
      </select>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="statusPaiment" class="form-label">Statut de paiement <font color="red">*</font></label>
      <select class="form-select" aria-label="Default select" name="status_paiment" id="select-option" required>
        <option value="impayee" selected>Impayée</option>
        <option value="paiement partiel">Paiement Partiel</option>
        <option value="encaissee">Encaissee</option>
      </select>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="statusLitige" class="form-label">Status Litige ? <font color="red">*</font></label>
      <select class="form-select" aria-label="Default select" name="status_litige" id="litige" required>
        <option value="normal">Normal</option>
        <option value="technique">Litige Technique</option>
        <option value="commercial">Litige Commercial</option>
        <option value="irrecouvrable">Irrécouvrable</option>
      </select>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="datePaiment" class="form-label">Date Paiment <font color="red">*</font></label>
      <input type="date" class="form-control" id="datePaiment" name="datePaiment" required>
    </div>
  </div>

  <button type="submit" class="btn btn-outline-primary">Ajouter</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // récupérer l'élément input
  var dateCurrent = document.getElementById('dateSaisie')
  var montantInput = document.getElementById("montant");
  var optionSelect1 = document.getElementById("select-option");
  var optionSelect2 = document.getElementById("status")
  var montantRest = document.getElementById('montantrest');
  var ttcInput = document.getElementById("ttc");
  var htInput = document.getElementById("ht");
  var datePaiment = document.getElementById("datePaiment");
  
  montantRest.value = ttcInput.value;
  montantInput.addEventListener("input", function () {
    var calc = parseFloat(ttcInput.value) - parseFloat(montantInput.value)
    console.log(calc)
    var montantPaye = parseFloat(montantInput.value);
    // mettre à jour la valeur de l'option sélectionnée en fonction de la valeur de l'entrée de montant
    if (montantPaye == '') {
      optionSelect1.value = "impayee";
      optionSelect2.value = "echue";
    } else if (montantPaye == ttcInput.value) {
      optionSelect1.value = "encaissee";
      optionSelect2.value = "encaisse";
    } else if (montantPaye < ttcInput.value && montantPaye.length !== 0) {
      optionSelect1.value = "paiement partiel";
      optionSelect2.value = "non Echue";
    }
    if (montantInput.value !== '') {
      montantRest.value = calc;
    }
    if (montantInput.value == '') {
      datePaiment.value = '';
    }
  });

  $(document).ready(function () {
    $('#date_saisie').on('input', function () {
      var date_saisie = $('#date_saisie').val();
      // Call the generate_id_facture function using AJAX
      $.ajax({
        url: '/Controllers/CreatingController/generatedId/' + date_saisie,
        type: 'GET',
        data: {
          date_saisie: date_saisie
        },
        success: function (response) {
          // Set the value of the id_facture field
          $('#id_facture').val(response.id_facture);
        }
      });
    })
  });
  $(document).ready(function () {
    $('.devis-select').on('change', function () {
      var devis_id = $('.devis-select option:selected').val();

      $.ajax({
        url: '/Controllers/CreatingController/generatedDevis/' + devis_id,
        type: 'GET',
        data: {
          devis_id: devis_id
        },
        success: function (response) {
          var data = response[0]; // Assuming there is only one row in the response
          $('#ICE').val((data.ICE==0||data.ICE==null)?'Personne Normale':data.ICE);
          $('#nameClient').val(data.nom);
          $('#mail').val(data.email_client);
          $('#numberPhone').val(data.numero_telephone);
          $('#ville').val(data.ville);
          $('#pays').val(data.pays);
          $('#ht').val(data.total_ht);
          $('#ttc').val(data.total_ttc);
          $('#montantrest').val($('#ttc').val());
          $('#id_client').val(data.id_client);
          $('#adresse').val(data.adresse);
        }
      });
    });
  });
</script>


<script src="../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<?php $this->endsection() ?>