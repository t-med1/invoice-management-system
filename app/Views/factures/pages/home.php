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


    <title>Gestion Devis</title>
</head>

<body>


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
            <li class="active">
                <a href="#">
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
    <!-- SIDEBAR -->



    <!-- CONTENT -->
    <section id="content">
        <!-- NAVBAR -->
        <nav>
            <i class='bx bx-menu'></i>
            <form action="search">
                <div class="form-input">
                    <input type="search" placeholder="Search..." name="keyword">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <form action="Bydate">
                <div class="form-input">
                    <input type="date" placeholder="Search..." name="dateSearch">
                    <button type="submit" class="search-btn"><i class='bx bx-search'></i></button>
                </div>
            </form>
            <!-- <input type="checkbox" id="switch-mode" hidden>
			<label for="switch-mode" class="switch-mode"></label>
			<a href="#" class="profile">
				<img src="img/people.png"> -->
            </a>
        </nav>
        <!-- NAVBAR -->

        <!-- MAIN -->
        <main>
            <div class="head-title">
                <div class="left">
                    <br>
                    <h1>Liste des Factures</h1>
                    <br>

                    <?php if (session()->getFlashdata('success')) : ?>
                        <div class="alert alert-success" id="myDiv">
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    <?php endif; ?>
                    <article>
                        <?php if (isset($factures)) : ?>
                            <table class="table table-light table-hover table-striped rounded" style="overflow: hidden" id='factures'>
                                <thead>
                                    <tr>
                                        <th>Numéro Du Facture</th>
                                        <th>Nom Du Client</th>
                                        <th>Date Saisie</th>
                                        <th>Descriptif Facture</th>
                                        <th>Total HT</th>
                                        <th>Total TTC</th>
                                        <th>Date Emission</th>
                                        <th>Date Echéance</th>
                                        <th>Montant Payé</th>
                                        <th>Status Du Paiment</th>
                                        <th class="col-1">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($factures as $fact) : ?>
                                        <tr>
                                            <td><?= $fact['id_facture'] ?></td>
                                            <td><?= isset($fact['nom']) ? $fact['nom'] : '' ?> </td>
                                            <td><?= $fact['date_saisie'] ?></td>
                                            <td>
                                                <?php foreach ($fact["infos"] as $infos) { ?>
                                                    <?= '<strong>' . $infos["titre"] . '</strong><br><br>' ?>
                                                <?php } ?>
                                            </td>
                                            <td><?= $fact['total_ht'] ?></td>
                                            <td><?= $fact['total_ttc'] ?></td>
                                            <td><?= $fact['date_emission'] ?></td>
                                            <td><?= $fact['date_echeance'] ?></td>
                                            <td><?= $fact['montant_paye'] ?></td>
                                            <td><?= $fact['status_paiment'] ?></td>
                                            <td>
                                                <a href="/factureModify/<?= $fact['id_client'] ?>/<?= $fact['id_devis'] ?>"><span class="material-icons">edit</span></a>
                                                <a href="/deleteFacture/<?= $fact['id_facture'] ?>"><span class="material-icons">delete</span></a>
                                                <a href="<?= base_url('factures/affichageFct/' . $fact["id_devis"]) ?>" class="show"><span class="material-icons material-icons-outlined">visibility</span></a>
                                                <a href="#"><span class="material-icons material-icons-outlined" style="padding:12px"></span></a>
                                                <a href="#"><span class="material-icons material-icons-outlined download" id="">file_download</span></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        <?php endif; ?>
                    </article>
                </div>
            </div>
        </main>
        <!-- MAIN -->
    </section>
    <!-- CONTENT -->
    <script src="../css/home.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
    $(document).ready(function () {
        setTimeout(function () {
            $('#myDiv').slideUp();
        }, 1000);
    });
</script>
</body>

</html>