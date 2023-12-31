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
  <link rel="stylesheet" href="../../css/home.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

  <title>Gestion Devis</title>
</head>

<body style="overflow-y: overlay;">
  <!-- SIDEBAR -->
  <section id="sidebar">
    <a href="#" class="brand">
      <i class='bx bxs-smile'></i>
      <span class="text"><img src="../../css/logo.png" alt="logo"></span>
    </a>
    <ul class="side-menu top">
      <li>
        <a href="/dash">
          <i class='bx bxs-home'></i>
          <span class="text">Home</span>
        </a>
      </li>
      <li>
        <a href="/facture">
          <i class='bx bxs-dashboard'></i>
          <span class="text">Listes des Factures</span>
        </a>
      </li>
      <li>
        <a href="/createFacture">
          <i class='bx bx-add-to-queue'></i>
          <span class="text">Créer une facture</span>
        </a>
      </li>
      <li>
        <a href="/tablesRelance">
          <i class='bx bxs-user-plus'></i>
          <span class="text">Relancement</span>
        </a>
      </li>
    </ul>
    <ul class="side-menu">

      <li>
        <a href="#" class="logout">
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
          <h1>Modifier Facture</h1>
          <br>
          <form method="post" action="/UpdateFcature/<?= $facture['id_facture']?>">
  <div class="row">
    <div class="mb-5 col-sm-3">
      <label for="ref" class="form-label">Numéro de Facture</label>
      <input type="text" class="form-control" name="id_facture" id="id_facture" value="<?= $facture['id_facture']?>" readonly>

    </div>
    <div class="mb-5 col-sm-3">
      <label for="ref" class="form-label">Numéro de DU Devis</label>
      <input class="form-control" value="<?= $devis['id_devis']?>" name="id_devis" readonly>
    </div>
    <div class="mb-5 col-sm-3">
      <label for="desc" class="form-label">ICE Client</label>
      <input type="text" class="form-control" id="desc" name="descriptif" value="<?= ($client['ICE']==0 ||$client['ICE']==null)?"Personne Normale":$client['ICE']?>"  readonly>
    </div>
    <div class="mb-5 col-sm-3">
      <label for="saisie" class="form-label">Date de saisie</label>
      <input type="date" class="form-control"id="date_saisie" value="<?= $facture['date_saisie']?>" name="date_saisie" readonly>
    </div>
  </div>
  <div class="row">
    
    <div class="mb-5 col-sm-4">
      <label for="nameClient" class="form-label">Nom Du Client</label>
      <input type="text" class="form-control" id="nameClient" value="<?= $client['nom']?>" name="nameClient" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="mail" class="form-label">Email</label>
      <input type="email" class="form-control" id="mail" value="<?= $client['email_client']?>" name="mail" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="numnberPhone" class="form-label">Numero de Telephone</label>
      <input type="text" class="form-control" id="numnberPhone" value="<?= $client['numero_telephone']?>" name="numnberPhone" readonly>
    </div>

  </div>
  <div class="row">
    
  </div>
  <div class="row">
    <div class="mb-5 col-sm-4">
      <label for="ttc" class="form-label">Total HT</label>
      <input type="text" class="form-control text-dark" id="ht" value="<?= $devis['total_ht']?>" name="ht" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="ttc" class="form-label">Total TTC</label>
      <input type="text" class="form-control text-dark" id="ttc" value="<?= $devis['total_ttc']?>" name="ttc" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="montant" class="form-label">Montant Restant</label>
      <input type="number" class="form-control text-dark" id="montantrest" value="<?= $paiment['montant_rest']?>" name="montantRest" readonly>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="emission" class="form-label">Date Émission <font color="red">*</font></label>
      <input type="date" class="form-control" id="emission" value="<?= $facture['date_emission']?>" name="emission" required>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="echeance" class="form-label">Date Echéance <font color="red">*</font></label>
      <input type="date" class="form-control" id="echeance" value="<?= $facture['date_echeance']?>" name="echeance" required>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="montant" class="form-label">Montant payé <font color="red">*</font></label>
      <input type="number" class="form-control" id="montant" value="<?= $paiment['montant_paye']?>" name="montant" required>
    </div>
  </div>
  <div class="row">
  <div class="mb-5 col-sm-2">
    </div>
    <div class="mb-5 col-sm-4">
      <label for="status" class="form-label">Statut <font color="red">*</font></label>
      <select class="form-select" aria-label="Default select" name="status" id="select-status" required>
          <option value="echue" <?= ($paiment['status'] == 'echue') ? 'selected' : '' ?>>Echue</option>
          <option value="non Echue" <?= ($paiment['status'] == 'non Echue') ? 'selected' : '' ?>>Non Echue</option>
          <option value="encaisse" <?= ($paiment['status'] == 'encaissee') ? 'selected' : '' ?>>Encaissée</option>
      </select>
    </div>
    <div class="mb-5 col-sm-4">
      <label for="statusPaiment" class="form-label">Statut de paiement <font color="red">*</font></label>
      <select class="form-select" aria-label="Default select" name="status_paiment" id="select-option" required>
          <option value="impayee" <?= ($paiment['status_paiment'] == 'impayee') ? 'selected' : '' ?>>Impayée</option>
          <option value="paiement partiel"   <?= ($paiment['status_paiment'] == 'paiement partiel') ? 'selected' : '' ?>>Paiement Partiel</option>
          <option value="encaissee" <?= ($paiment['status_paiment'] == 'encaissee') ? 'selected' : '' ?>>Encaissee</option>
      </select>
  </div>
  <div class="mb-5 col-sm-2">
    </div>
  </div>
  <div class="row">
  <div class="mb-5 col-sm-2">
    </div>
    <div class="mb-5 col-sm-4">
    <label for="statusLitige" class="form-label">Status Litige ? <font color="red">*</font></label>
    <select class="form-select" aria-label="Default select" name="litige" required>
      <option value="normal" <?= ($paiment['status_litige'] == 'normal') ? 'selected' : '' ?>>Normal</option>
      <option value="technique" <?= ($paiment['status_litige'] == 'technique') ? 'selected' : '' ?>>Litige Technique</option>
      <option value="commercial" <?= ($paiment['status_litige'] == 'commercial') ? 'selected' : '' ?>>Litige Commercial</option>
      <option value="irrecouvrable" <?= ($paiment['status_litige'] == 'irrecouvrable') ? 'selected' : '' ?>>Irrécouvrable</option>
    </select>
    
    </div>
    <div class="mb-5 col-sm-4">
      <label for="datePaiment" class="form-label">Date Paiment <font color="red">*</font></label>
      <input type="date" class="form-control" id="datePaiment" name="datePaiment" value="<?= $paiment['date_dernier_paiment']?>" required>
    </div>
    <div class="mb-5 col-sm-2">
    </div>
  </div>
  <button type="submit" class="btn btn-outline-primary">Update</button>
</form>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  var montantInput = document.getElementById("montant");
  var optionSelect1 = document.getElementById("select-option");
  var optionSelect2 = document.getElementById("select-status")
  var montantRest = document.getElementById('montantrest');
  var ttcInput = document.getElementById("ttc");
  var htInput = document.getElementById("ht");

  montantInput.addEventListener("input", function() {
    var montantPaye = parseFloat(montantInput.value);
    // var Rest = parseFloat(montantRest.value);
    var calc = ttcInput.value - montantPaye;
      // mettre à jour la valeur de l'option sélectionnée en fonction de la valeur de l'entrée de montant
      if (montantPaye == '') {
        optionSelect1.value = "impayee";
        optionSelect2.value = "echue";
      } else if(montantPaye == ttcInput.value){
        optionSelect1.value = "encaissee";
        optionSelect2.value = "encaisse";
      }else if(montantPaye < ttcInput.value && montantPaye.length !== 0){
        optionSelect1.value = "paiement partiel";
        optionSelect2.value = "non Echue";
      }
      if(montantInput.value !== ''){
        montantRest.value = calc ;
      }if(montantInput.value == ''){
        datePaiment.value = '';
      }
  });
</script>
          <script src="../../css/home.js"></script>
          <script src="../../jquery-3.6.4.min.js"></script>


</body>

</html>