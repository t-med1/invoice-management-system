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
      <li class="active">
        <a href="#">
          <i class='bx bxs-user-plus'></i>
          <span class="text">Relancement</span>
        </a>
      </li>
    </ul>
    <ul class="side-menu">

      <li>
        <a href="#" class="logout" id="alert">
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
          <h1>Table du relancement</h1>
          <br>
          <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title text-primary">Tableau Du Relancement</h4>
              <div class="table-responsive">
                <?php if (isset($result)): ?>
                  <table class="table table-bordered">
                    <thead>
                      <tr>
                        <th> Nom Client </th>
                        <th> Email </th>
                        <th> Numero Telephone </th>
                        <th> Status Relancement </th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php foreach ($result as $res): ?>
                        <tr class='text-dark' <?= $res['relance_faite'] ? 'class="disabled"' : '' ?>>
                          <td>
                            <?php echo $res['nom'] ?>
                          </td>
                          <td>
                            <?php echo $res['email_client'] ?>
                          </td>
                          <td>
                            <?php echo $res['numero_telephone'] ?>
                          </td>
                          <td>
                          <form action="<?= base_url('/client/updateRelancement/' . $res['id_client']) ?>" method="post">
                            <label class="text-danger" name='lab'>Relance à Faire</label>
                            <input type="checkbox" name="relance_faite" value="on" <?= $res['relance_faite'] ? 'checked disabled' : '' ?> id="checkbox" class="checks">
                          </form>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                <?php endif; ?>
              </div>
            </div>
          </div>
        </div>
      </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Submit the form when the checkbox is checked
    $('input[name="relance_faite"]').change(function() {
        if ($(this).is(':checked')) {
          $(this).closest('form').submit();
        }
    });
    $(document).ready(function() {
    // Handler for checkbox change event
    $('input[name="relance_faite"]').change(function() {
      var label = $(this).siblings('label');
      if ($(this).is(':checked')) {
        label.text('Relance Faite').addClass('text-primary').removeClass('text-danger');
      } else {
        label.text('Relance à Faire').addClass('text-danger').removeClass('text-primary');
      }
      $(this).closest('form').submit();
    });

    // Initial label text and class setup
    $('input[name="relance_faite"]').each(function() {
      var label = $(this).siblings('label');
      if ($(this).is(':checked')) {
        label.text('Relance Faite').addClass('text-primary').removeClass('text-danger');
      } else {
        label.text('Relance à Faire').addClass('text-danger').removeClass('text-primary');
      }
    });
  });
</script>


          <script src="../css/home.js"></script>
          <script src="../jquery-3.6.4.min.js"></script>

</body>

</html>