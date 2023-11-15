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
    <link rel="stylesheet" href="../../css/affichageFct.css">


    <title>Gestion Devis</title>
</head>

<body>


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
                <a href="#" cl="t">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>

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
                <div class="devis">
                    <div class="info">
                        <p class="nom"><?= $client['nom'] ?></p>
                        <p class="adresse"><?= $client['adresse'] ?></p>
                        <p class="pays"><?= $client['pays'] ?></p>
                        <p class="ville"><?= $client['ville'] ?></p>
                        <p class="tel"><?= $client['ICE'] ?></p>
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
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../../../css/home.js"></script>
</body>

</html>