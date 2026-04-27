<?php session_start(); ?>

<!doctype html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Regisztráció</title>
  <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
  <link rel="shortcut icon" href="./favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
  <link rel="manifest" href="./favicon/site.webmanifest" />
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="css/regisztracio.css">
</head>

<body>
  <img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px;" class="logo" src="kep/logo1.png" alt="logo">
  <div class="card" style="margin-top: 50px;">
    <div class="card-body">
      <h1>Regisztráció</h1>
      <?php
      if (isset($_SESSION["hibauzenet"])) {
        echo '<div class="alert alert-danger" role="alert">' . $_SESSION["hibauzenet"] . '</div>';
        unset($_SESSION["hibauzenet"]);
      }
      ?>
      <div id="section1">
        <form class="row g-4" action="../backend/regiszt.php" method="post">
          <div class="mb-3 col-md-6">
            <label for="vnev" class="form-label">Vezetéknév</label>
            <input type="text" id="vnev" name="vnev" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
          <div class="mb-3 col-md-6">
            <label for="knev" class="form-label">Keresztnév</label>
            <input type="text" id="knev" name="knev" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div>
          <div class="mb-3 col-md-6">
            <label for="fnev" class="form-label">Felhasználónév</label>
            <input type="text" id="fnev" name="fnev" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
          </div><br>
          <div class="col-md-6">
            <label for="email" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="email">
          </div>
          <div class="col-md-6">
            <label for="jelszo1" class="form-label">Jelszó</label>
            <input type="password" name="jelszo1" class="form-control" id="jelszo1">
          </div>
          <div class="col-md-6">
            <label for="jelszo2" class="form-label">Jelszó ismétlése</label>
            <input type="password" name="jelszo2" class="form-control" id="jelszo2">
          </div>

          <div class="col-md-6">
            <label for="tfon" class="form-label">Telefonszám</label>
            <input type="number" name="tfon" class="form-control" id="tfon" placeholder="pl. 06301234567">
          </div>
          <div class="col-md-6">
            <label for="szdatum" class="form-label">Születési dátum</label>
            <input type="date" name="szdatum" class="form-control" id="szdatum">
          </div>


          <div id="section2">
            <br>
            <button type="submit" value="submit" class="btn btn-primary">Regisztráció</button>

            <div id="div-regisztracio">
              <p>Van már fiókja?</p>
              <p><a class="linkbejelentkezes" href="index.php">Bejelentkezés</a></p>
            </div>
          </div>
        </form>


      </div>


    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
</body>

</html>