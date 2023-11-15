<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- shortcut icon -->
  <link rel="shortcut icon" href="../logofms.png">
  <!-- Boxicons -->
  <link href="https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css" rel="stylesheet" />
  <!-- My CSS -->
  <link rel="stylesheet" href="../cards/style.css" />
  <link rel="stylesheet" href="../cards/dash.css">


  <title>Fes Marketing Services - ACCEUIL</title>
</head>

<body>
  <div class="background"></div>
  <section id="content">
    <!-- NAVBAR -->
    <nav>
      <img src="../cards/logo.png" alt="logo" />

      <input type="checkbox" id="switch-mode" hidden />
      <label for="switch-mode" class="switch-mode"></label>
      <span class="material-icons material-icons-outlined">
        account_circle
      </span>
      <p class="text-info">
        <?php if (session()->has('nom_complet')): ?>
          <?php
          echo session('nom_complet');
          ?>
        <?php endif; ?>
      </p>

      <a href="/" class="profile" id='alert'>
        <span class="material-icons material-icons-outlined">logout</span>
      </a>
    </nav>
    <!-- NAVBAR -->
  </section>
  <div class="grid">
    <div class="grid-item">
      <div class="card">
        <a href="/devis">
          <img class="card-img" src="../cards/devis.png" alt="Page Devis" />
        </a>
      </div>
    </div>
    <div class="grid-item">
      <div class="card">
        <a href="/facture">
          <img class="card-img" src="../cards/fct.png" alt="Page Facture" />
        </a>
      </div>
    </div>
  </div>
  <script src="../cards/script.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    const saveButton = document.getElementById('alert');
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
  </script>
</body>

</html>





<!-- creer un diagramme de classe pour un systeme de gestion des factures et devis pour les tables swuivants :
- client : id_client , nom , email , telephone , ville , pays.
- factures : id_facture , id_client , date_saisie , date_echeance.
- paiment : id_paiment , id_facture , montant_payer.
- status_paiment : id_status , id_paiment , status_litige.
- relance : id_relance , id_client , relance_faite.
- devis : id_devis , id_client , date_saisie.
- service : id_service , id_devis , quantite , prixUnitaire.
- Admin : id_admin , nom , email , password. -->