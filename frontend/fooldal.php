<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aprohirdetes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT hirdetesek.cim, hirdetesek.ar, hirdetesek.leiras, hirdetesek.kep, hirdetesek.feltoltes_ideje, felhasznalok.email, felhasznalok.tszam 
        FROM hirdetesek 
        inner JOIN felhasznalok ON hirdetesek.felhasznaloId = felhasznalok.id 
        ORDER BY hirdetesek.id DESC";

$result = $conn -> query($sql);
?>
<!doctype html>
<html lang="hu">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Főoldal</title>
  <link rel="icon" type="image/png" href="./favicon/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/svg+xml" href="./favicon/favicon.svg" />
  <link rel="shortcut icon" href="./favicon/favicon.ico" />
  <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png" />
  <link rel="manifest" href="./favicon/site.webmanifest" />

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="./css/fooldal.css">
</head>

<body>
  <form action="" id="profile"><button type="submit" class="btn btn-dark" style="width: 100px;" formaction="profile.php">Profil</button></form>
  <img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px; border: 1px solid gray;" class="logo" src="kep/logo1.png" alt="logo">
  
  <div class="card">
    <div class="card-body">
      <h1>Apróhirdetések</h1> 
      <form action="" id="hFeladas">
          <button type="submit" class="btn btn-outline-primary" formaction="hirdetesfeladas.html">Hirdetés feladása</button>
      </form>
      
      <div class="container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo '<div class="innerCard">';
                echo '<div class="content">';
                $kepPath = !empty($row["kep"]) ? htmlspecialchars($row["kep"]) : 'kep/logo1.png';
                echo '<img src="' . $kepPath . '" alt="A hirdetés képe" id="hirdetesKep">';
                
                echo '<h4>' . htmlspecialchars($row["cim"]) . '</h4>';
                echo '<h6>Ár: ' . number_format($row["ar"], 0, ',', ' ') . ' Ft</h6>';
                echo '<p>' . nl2br(htmlspecialchars($row["leiras"])) . '</p>';
                
                echo '<div>';
                echo '<h5>Elérhetőségek:</h5>';
                echo '<ul>';
                echo '<li>Email: ' . htmlspecialchars($row["email"]) . '</li>';
                echo '<li>Telefonszám: ' . htmlspecialchars($row["tszam"]) . '</li>';
                echo '</ul>';
                echo '</div>';
                echo '<p id="feltoltesIdo">Feltöltés ideje: ' . htmlspecialchars($row["feltoltes_ideje"]) . ' </p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo '<p style="color: white; text-align: center;">Még nincsenek feltöltött hirdetések.</p>';
        }
        
        $conn->close();
        ?>
      </div>
    </div>
  </div>
  <script src="../backend/hirdetesfeladas.js"></script>
</body>
</html>