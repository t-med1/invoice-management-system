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
    <link rel="stylesheet" href="../../css/affichage2.css">


    <title>Gestion Devis</title>
</head>

<body>



    <!-- NAVBAR -->

    <!-- MAIN -->
    <main class="main">
        <div class="head-title">
            <div class="devis">
                <img src="../../css/Devis.jpg" width="100%" class="bg">
                <div class="info-box">
                    <div class="info">
                        <p class="nom"><?= $client['nom'] ?></p>
                        <p class="adresse"><?= $client['email_client'] ?></p>
                        <p class="pays"><?= $client['pays'] ?></p>
                        <p class="ville"><?= $client['ville'] ?></p>
                        <p class="tel"><?= $client['numero_telephone'] ?></p>
                        <p class="date"><?= $devis['date_saisie'] ?></p>
                        <p class="num"><?= $devis['id_devis'] ?></p>
                    </div>
                    <div class="details-container">
                        <?php
                        foreach ($lignecommande as $sr) : ?>
                            <div class="details">
                                <p class="qte"><?= $sr['qte_commande'] ?></p>
                                <p><span class="titre"><?= $sr['titre'] ?></span><?= nl2br($sr["description_service"])  ?></p>
                                <p class="prix"><?= $sr['prix_unitaire'] ?> D</p>
                                <p class="total"><?= number_format($sr['qte_commande'] * $sr['prix_unitaire'], 2, '.', ' ') ?> D</p>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="buttom">
                        <p class="sous-total"><?= $devis['total_ht'] ?> D</p>
                        <p class="tva"><?= number_format($devis['total_ttc'] - $devis['total_ht'], 2, '.', ' ') ?> D</p>
                        <p class="ttc"><?= $devis['total_ttc'] ?> D</p>
                        <p class="modalité"><?= $devis['modalite_paiement'] ?></p>
                    </div>
                    <div  class="btn">
                            <button id="btn-print">Print</button>
                    </div>
                </div>
            </div>

        </div>
    </main>
    <!-- CONTENT -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.debug.js" integrity="sha512-234m/ySxaBP6BRdJ4g7jYG7uI9y2E74dvMua1JzkqM3LyWP43tosIqET873f3m6OQ/0N6TKyqXG4fLeHN9vKkg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        jQuery(document).ready(function(){
            $('#btn-print').click(function(){
                $('#btn-print').hide()
                html2canvas(document.querySelector('.devis'))
                .then( canvas => {
                    let base64image = canvas.toDataURL('image/png');
                    console.log(base64image);

                    let pdf = new jsPDF('p','px',[1117, 1423]);
                    pdf.addImage(base64image, 'PNG', 15, 15, 1005.84, 1423.41);
                    pdf.save('Devis.pdf')
                });
            });
        });
    </script>
</body>

</html>