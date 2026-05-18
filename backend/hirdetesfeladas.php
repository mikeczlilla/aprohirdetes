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


if (!isset($_POST['cim']) || !isset($_POST['leiras']) || !isset($_POST['ar'])) {
    $_SESSION["hibauzenet"] = "Minden mező kitöltése kötelező!";
    header('Location: ../frontend/hirdetes_feltoltes.html');
    exit;
}

$cim = trim($_POST['cim']);
$leiras = trim($_POST['leiras']);
$ar = trim($_POST['ar']);
$felhasznaloId = $_SESSION['id'];


$kep = '';
if (isset($_FILES['kep']) && $_FILES['kep']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = '../uploads/';
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }
    $fileName = time() . '_' . basename($_FILES['kep']['name']);
    $targetFile = $uploadDir . $fileName;
    if (move_uploaded_file($_FILES['kep']['tmp_name'], $targetFile)) {
        $kep = $targetFile;
    } else {
        $_SESSION["hibauzenet"] = "Kép feltöltése sikertelen!";
        header('Location: ../frontend/hirdetesfeladas.html');
        exit;
    }
}

$sql = "INSERT INTO hirdetesek (cim, ar, leiras, kep, felhasznaloId) VALUES (?, ?, ?, ?, ?)";
$stmt = $conn->prepare($sql);
if (!$stmt) {
    die("Prepare failed: " . $conn->error);
}

$stmt->bind_param("sissi", $cim, $ar, $leiras, $kep, $felhasznaloId);

if ($stmt->execute()) {
    $_SESSION["sikeruzenet"] = "Hirdetés sikeresen feltöltve!";
    header('Location: ../frontend/fooldal.html');
    exit;
} else {
    echo "Hiba: " . $stmt->error;
}

$stmt->close();
$conn->close();
exit;
