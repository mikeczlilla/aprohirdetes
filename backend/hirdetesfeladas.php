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


// if (!isset($_POST['cim']) || !isset($_POST['leiras']) || !isset($_POST['ar'])) {
//     $_SESSION["hibauzenet"] = "Minden mező kitöltése kötelező!";
//     header('Location: ../frontend/hirdetes_feltoltes.html');
//     exit;
// }

$cim = trim($_POST['cim']);
$leiras = trim($_POST['leiras']);
$ar = trim($_POST['ar']);
$felhasznaloId = $_SESSION['id'];
$feltoltes_ideje = date("Y-m-d");

$kepadat = $_FILES['kep'];

$ext = strtolower(pathinfo($kepadat['name'], PATHINFO_EXTENSION));
$filename = pathinfo($kepadat['name'], PATHINFO_EXTENSION);
$kep = "../frontend/kep/hirdetesek_kep/" . $filename . "." . $ext;
$_SESSION['kep_utvonal'] = $kep;
move_uploaded_file($kepadat['tmp_name'], $kep);

$sql = "INSERT INTO hirdetesek (cim, ar, leiras, kep, feltoltes_ideje, felhasznaloId) VALUES (?, ?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sisssi", $cim, $ar, $leiras, $kep, $feltoltes_ideje, $felhasznaloId);

if ($stmt->execute()) {
    $_SESSION["sikeruzenet"] = "Hirdetés sikeresen feltöltve!";
    header('Location: ../frontend/fooldal.php');
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();
exit;
