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
    <link rel="stylesheet" href="../../css/copy.css">


    <title>Gestion Devis</title>
</head>

<body>
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
        </div>

    </div>

    <button id="btn-print">Print</button>
    <!-- CONTENT -->
    <script src="../../css/home.js"></script>
    <script>
        $('#btn-print').click(function(){
            html2canvas(document.querySelector('body')).then((canvas)=>{
                let myimg = canvas.toDataUrl('../../css/Devis.jpg');
                console.log(myimg);
            });
        });
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js" 
            integrity="sha512-qZvrmS2ekKPF2mSznTQsxqPgnpkI4DNTlrdUmTzrDgektczlKNRRhy5X5AAOnx5S09ydFYWWNSfcEqDTTHgtNA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js" 
            integrity="sha512-BNaRQnYJYiPSqHHDb58B0yaPfCu+Wgds8Gp/gU33kqBtgNS4tSPHuGibyoeqMV/TJlSKda6FXzoEyYGjTe+vXA==" 
            crossorigin="anonymous" referrerpolicy="no-referrer">
    </script>
</body>

</html>