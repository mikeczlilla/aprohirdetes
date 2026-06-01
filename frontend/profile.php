<?php session_start(); ?>
<!DOCTYPE html>
<html lang="hu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
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
    <link rel="stylesheet" href="./css/profile.css">
</head>

<body>
<img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px; border: 1px solid gray;" class="logo"
src="kep/logo1.png" alt="logo">
    <div class="card">
        <div class="card-body">
            <h1>Profil</h1>
            <ul>
                <li><b>Vezetéknév: </b><i><?php echo $_SESSION['vnev']; ?></i></li>
                <li><b>Keresztnév: </b><i><?php echo $_SESSION['knev']; ?></i></li>
                <li><b>Felhasználónév: </b><i><?php echo $_SESSION['fnev']; ?></i></li>
                <li><b>Email cím: </b><i><?php echo $_SESSION['email']; ?></i></li>
                <li><b>Telefonszám: </b><i><?php echo $_SESSION['tszam']; ?></i></li>
                <li><b>Születési dátum: </b><i><?php echo $_SESSION['sztdatum']; ?></i></li>
            </ul>

            <div class="container">
                <div>
                    <form action="" id="kilepes">
                        <button type="button" id="kilepes" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            Kilépés
                        </button>
                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Biztos ki akarsz lépni?</h1>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Mégse</button>
                                        <button type="submit" formaction="index.php" class="btn btn-danger">Kilépés</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div>
                    <form action=""><button type="submit" formaction="fooldal.php" class="btn btn-secondary">Vissza</button></form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>