<?php $this->extend('layouts/master') ?>

<!-- title Section -->
<?php $this->section('title') ?>
Table - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1')?>
Tables
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
<?php $this->section('relance')?>
active
<?php $this->endsection()?>

<!-- partial -->
<?php $this->section('content') ?>
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
                        <th> Nombre </th>
                        <th> Nom Client </th>
                        <th> Email </th>
                        <th> Numero Telephone </th>
                        <th> Status Relancement </th>
                      </tr>
                    </thead>
                   <!-- ... -->
                  <tbody>
                      <?php foreach ($result as $res): ?>
                          <tr class='text-dark' <?= $res['relance_faite'] ? 'class="disabled"' : '' ?>>
                              <td><?php echo $res['id_facture'] ?></td>
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
                                  <form action="<?= base_url('/client/updateRelancement/' . $res['id_facture']) ?>" method="post">
                                      <label class="text-danger" name='lab'>Relance à Faire</label>
                                      <input type="checkbox" name="relance_faite" value="on" <?= $res['relance_faite'] ? 'checked disabled' : '' ?> id="checkbox" class="checks">
                                      <input type="hidden" name="id_client" value="<?= $res['id_facture'] ?>">
                                  </form>
                              </td>
                          </tr>
                      <?php endforeach; ?>
                  </tbody>
<!-- ... -->

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
<?php $this->endsection() ?>