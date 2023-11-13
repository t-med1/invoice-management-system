<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- shortcut icon -->
	  <link rel="shortcut icon" href="../logo.png">
    <title>Register - Page</title>
  </head>
  <body>
    <?php if(session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error') ?>')</script>
    <?php endif; ?>
    <?php if (isset($validation)): ?>
          <div class="alert alert-danger fixed-top container">
              <div class="row">
                  <div class="col-12 text-center"><?= $validation ?></div>
              </div>
          </div>
        <?php endif; ?>
        <?php
          //pour garder les champs de formulaire rempli aprés l'erreur
          $session = session();
          $formData = $session->getFlashdata('formData');

          // Utilisez les données pour remplir les champs
          $email = isset($formData['email']) ? $formData['email'] : '';
          $nom = isset($formData['nomComplet']) ? $formData['nomComplet'] : '';
        ?>
    <section>
    <div class="form-box">
        <div class="form-value">
          <form action="/registered" method='post'>
            <h2>Register</h2>
            <div class="inputbox">
              <ion-icon name="person"></ion-icon>
              <input type="text" name='nomComplet'  value="<?= old('nomComplet', $nom) ?>" required />
              <label for="">Name</label>
            </div>
            <div class="inputbox">
              <ion-icon name="mail"></ion-icon>
              <input type="email" name='email'  value="<?= old('email', $email) ?>" required />
              <label for="">Email</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed"></ion-icon>
              <input type="password" name='password' required />
              <label for="">Password</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed"></ion-icon>
              <input type="password" name='Cpass' required />
              <label for="">Confirm password</label>
            </div>
            <button>Register</button>
            <div class="register">
              <p>Already have a account ? <br><a href="/">Login</a></p>
            </div>
          </form>
        </div>
      </div>
    </section>
    <script
      type="module"
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script
      src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
  </body>
</html>
