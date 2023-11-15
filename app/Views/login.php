<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="../css/index.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <!-- shortcut icon -->
	  <link rel="shortcut icon" href="../logo.png">
    <title>Login - Page</title>
  </head>
  <body>
    <?php if(session()->getFlashdata('error')): ?>
        <script>alert('<?= session()->getFlashdata('error') ?>')</script>
    <?php endif; ?>
    <?php if (isset($validation)) : ?>
          <div class="alert alert-danger fixed-top container text-center w-25 px-5">
                <?= $validation ?>
          </div>
        <?php endif; ?>
    <section>
    <div class="form-box">
        <div class="form-value">
          <form method="post" action="/login">
            <h2>Login</h2>
            <div class="inputbox">
              <ion-icon name="mail"></ion-icon>
              <input type="email" name="email" required />
              <label for="">Email</label>
            </div>
            <div class="inputbox">
              <ion-icon name="lock-closed"></ion-icon>
              <input type="password" name="password" required />
              <label for="">Password</label>
            </div>
            
            <button>Log in</button>
            <div class="register">
              <p>Don't have a account ? <br><a href="/register">Register</a></p>
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
