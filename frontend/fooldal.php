<?php
session_start();

// Adatbázis kapcsolat
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aprohirdetes";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Lekérdezzük a hirdetéseket és a hozzájuk tartozó felhasználó adatait (email, telefon)
$sql = "SELECT hirdetesek.cim, hirdetesek.ar, hirdetesek.leiras, hirdetesek.kep, felhasznalok.email, felhasznalok.tszam 
        FROM hirdetesek 
        inner JOIN felhasznalok ON hirdetesek.felhasznaloId = felhasznalok.id 
        ORDER BY hirdetesek.id DESC"; // Csökkenő sorrend, hogy a legújabb legyen legelöl

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
  <a href="profile.php" title="Profil" id="profile">
      <img src="kep/account_circle.svg" style="width: 50px;" alt="profile">
  </a>
  <img style="width: 100px; position: absolute; top: 30px; left: 30px; border-radius: 10px;" class="logo" src="kep/logo1.png" alt="logo">
  
  <div class="card">
    <div class="card-body">
      <h1>Hirdetések</h1>
      <form action="" id="hFeladas">
          <button type="submit" class="btn btn-outline-primary" formaction="hirdetesfeladas.html">Hirdetés feladása</button>
      </form>
      
      <div class="container">
        <?php
        if ($result->num_rows > 0) {
            // Végigmegyünk az összes talált hirdetésen
            while($row = $result->fetch_assoc()) {
                echo '<div class="innerCard">';
                
                // Ha van kép, megjelenítjük, ha nincs, adhatsz egy default képet is
                $kepPath = !empty($row["kep"]) ? htmlspecialchars($row["kep"]) : 'kep/logo1.png';
                echo '<img src="' . $kepPath . '" alt="A hirdetés képe">';
                
                // Cím, ár és leírás kiírása a htmlspecialchars() függvénnyel a biztonság (XSS elleni védelem) érdekében
                echo '<h4>' . htmlspecialchars($row["cim"]) . '</h4>';
                echo '<h6>Ár: ' . number_format($row["ar"], 0, ',', ' ') . ' Ft</h6>';
                echo '<p>' . nl2br(htmlspecialchars($row["leiras"])) . '</p>';
                
                // Elérhetőségek
                echo '<div>';
                echo '<h5>Elérhetőségek:</h5>';
                echo '<ul>';
                echo '<li>Email: ' . htmlspecialchars($row["email"]) . '</li>';
                echo '<li>Telefonszám: ' . htmlspecialchars($row["tszam"]) . '</li>';
                echo '</ul>';
                echo '</div>';
                
                echo '</div>'; // innerCard vége
            }
        } else {
            echo '<p>Még nincsenek feltöltött hirdetések.</p>';
        }
        
        $conn->close();
        ?>
      </div>
    </div>
  </div>
  <script src="../backend/hirdetesfeladas.js"></script>
</body>
</html>