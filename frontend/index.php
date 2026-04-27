<?php session_start() ?>
<!doctype html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Bejelentkezés</title>
  <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
  <link rel="shortcut icon" href="./favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
  <link rel="manifest" href="./favicon/site.webmanifest" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"
    integrity="sha384-G/EV+4j2dNv+tEPo3++6LCgdCROaejBqfUeNjuKAiuXbjrxilcCdDz6ZAVfHWe1Y"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/bejelentkezes.css">
</head>

<body>
<img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px;" class="logo" src="kep/quiz.logo.png" alt="logo">
  <div class="card">
    <div class="card-body">
      <h1>Bejelentkezés</h1>
      <?php
      if (isset($_SESSION["hibauzenet"])) {
        echo '<div class="alert alert-danger" style="width: 400px;" role="alert">' . $_SESSION["hibauzenet"] . '</div>';
        unset($_SESSION["hibauzenet"]);
      } ?>
      <form action="../backend/bejelentkezes.php" method="post">
        <div class="mb-3">
          <label for="email_b" class="form-label">Email cím</label>
          <input style="max-width: 400px;" type="email" name="email_b" class="form-control" id="email_b"
            aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="jelszo_b" class="form-label">Jelszó</label>
          <input style="max-width: 400px;" type="password" name="jelszo_b" class="form-control" id="jelszo_b">
        </div>
        <div class="mb-3 form-check" id="checkB">
          <input type="checkbox" class="form-check-input" id="emlek">
          <label class="form-check-label" for="emlek">Emlékezz rám</label>
        </div>
        <button type="submit" class="btn btn-primary">Bejelentkezés</button>

        <div id="div-regisztracio">
          <p>Nincs még fiókja?</p>
          <p><a class="linkregisztracio" href="regisztracio.php">Regisztráció</a></p>
        </div>
      </form>

    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
    crossorigin="anonymous"></script>
</body>

</html>