<?php $this->extend('layouts/master') ?>

<!-- titre du page -->
<?php $this->section('title') ?>
Home - Page
<?php $this->endsection() ?>

<!-- h1 -->
<?php $this->section('h1') ?>
Factures
<?php $this->endsection() ?>

<!-- class active -->
<?php $this->section('home') ?>
active
<?php $this->endsection() ?>

<!-- Le contenue du page home -->
<?php $this->section('content') ?>
<?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success" id="myDiv">
        <?= session()->getFlashdata('success') ?>
    </div>
<?php endif; ?>
<article>
    <table class="table table-light table-hover table-striped rounded text-center" style="overflow: hidden"
        id='factures'>
        <thead>
            <tr>
                <th>Numéro Du Facture</th>
                <th>Nom Du Client</th>
                <th>Date Saisie</th>
                <th>Total HT</th>
                <th>Total TTC</th>
                <th>Date Emission</th>
                <th>Date Echéance</th>
                <th>Date Dernier Paiement</th>
                <th>Montant Payé</th>
                <th>Status</th>
                <th>Status Litige</th>
                <th>Status Du Paiment</th>
                <th>ACTION</th>
                <th>Imprimer</th>
            </tr>
        </thead>
        <?php if (isset($factures)): ?>
            <tbody>
                <?php $count = 1;
                foreach ($factures as $fact): ?>
                    <tr>
                        <td>
                            <?= $fact['id_facture'] ?>
                        </td>
                        <td>
                            <?= isset($fact['nom']) ? $fact['nom'] : '' ?>
                        </td>
                        <td>
                            <?= $fact['date_saisie'] ?>
                        </td>
                        <td>
                            <?= $fact['total_ht'] ?>
                        </td>
                        <td>
                            <?= $fact['total_ttc'] ?>
                        </td>
                        <td>
                            <?= $fact['date_emission'] ?>
                        </td>
                        <td>
                            <?= $fact['date_echeance'] ?>
                        </td>
                        <td>
                            <?= isset($fact['date_dernier_paiment']) ? $fact['date_dernier_paiment'] : '00-00-00' ?>
                        </td>
                        <td>
                            <?= isset($fact['montant_paye']) ? $fact['montant_paye'] : '00.00' ?>
                        </td>
                        <td>
                            <?= $fact['status'] ?>
                        </td>
                        <td>
                            <?= isset($fact['status_litige']) ? $fact['status_litige'] : '' ?>
                        </td>
                        <td>
                            <?= isset($fact['status_paiment']) ? $fact['status_paiment'] : '' ?>
                        </td>
                        <td>
                            <a href="/factureModify/<?= $fact['id_client'] ?>/<?= $fact['id_devis'] ?>" class="text-success">
                               <span class="material-icons">edit</span>
                            </a>
                            <a class="delete"><span class="material-icons" onclick="event.preventDefault(); 
                                                    Swal.fire({
                                                    title: 'Êtes-vous sûr?',
                                                    text: 'supprimer la facture  !',
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Oui, supprimer'
                                                    }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        window.location.href = '/deleteFacture/<?= $fact['id_facture'] ?>';}});">delete</span></a>
                        </td>
                        <td>
						    <a href="#"><span class="material-icons material-icons-outlined download" id="<?= $count ?>">picture_as_pdf</span></a>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="10" style="padding: 0;">
                            <div class="devis" id="<?= 'devis' . $count ?>">
                                <img src="../../css/facture.jpg" width="100%" class="bg">
                                <div class="info-box">
                                    <div class="info">
                                        <p class="nom"><?= $fact['nom'] ?></p>
                                        <p class="adresse"><?= $fact['adresse'] ?></p>
                                        <p class="pays"><?= $fact['pays'] ?></p>
                                        <p class="ville"><?= $fact['ville'] ?></p>
                                        <p class="tel"><?= ( $fact['ICE']==0||$fact['ICE']==null )?'Personne normale': $fact['ICE']?></p>
                                        <p class="date"><?= $fact['date_saisie'] ?></p>
                                        <p class="num"><?= $fact["id_facture"]; ?></p>
                                    </div>
                                    <div class="details-container">
                                        <?php foreach ($fact["infos"] as $infos) : ?>
                                            <div class="details">
                                                <p class="qte"><?= $infos['qte_commande'] ?></p>
                                                <p><span class="titre"><?= $infos['titre'] ?></span><?= nl2br($infos["description_service"])  ?></p>
                                                <p class="prix"><?= $infos['prix_unitaire'] ?> D</p>
                                                <p class="total"><?= number_format($infos['qte_commande'] * $infos['prix_unitaire'], 2, '.', ' ') ?> D</p>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="bottom">
                                        <p class="sous-total"><?= $fact['total_ht'] ?> D</p>
                                        <p class="tva"><?= number_format($fact['total_ttc'] - $fact['total_ht'], 2, '.', ' ') ?> D</p>
                                        <p class="ttc"><?= $fact['total_ttc'] ?> D</p>
                                        <p class="modalité"><?= $fact['modalite_paiement'] ?></p>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr></tr>
                <?php $count++; endforeach; ?>
            </tbody>
        <?php endif; ?>
    </table>
</article>
<script src="../../css/home.js"></script>
<script src="../jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
</script>
<script>
        $(document).ready(function() {
            setTimeout(function() {
                $('#myDiv').slideUp();
            }, 1000);
        });
    </script>
    <script>
        console.clear()
        document.querySelectorAll('.download').forEach(btn => {
            btn.addEventListener('click', e => {
                $('#devis' + e.target.id).show()
                html2canvas(document.getElementById('devis' + e.target.id))
                    .then(canvas => {
                        let base64image = canvas.toDataURL('image/png');
                        console.log(base64image);

                        let pdf = new jsPDF('p', 'px', [1117, 1423]);
                        pdf.addImage(base64image, 'PNG', 4, -30, 1117, 1400);
                        pdf.save('Facture.pdf')
                    });
                $('#devis' + e.target.id).hide()

            })
        })
    </script>
<?php $this->endsection() ?>