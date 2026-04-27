<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "aprohirdetes";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$email = $_POST["email_b"];
$jelszo = $_POST["jelszo_b"];

$sql = "SELECT email, jelszo FROM felhasznalok WHERE email = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $arrayEmail = $row["email"];
        $arrayJelszo = $row["jelszo"];
    }
}

if ($email == "" or $arrayEmail != $email) {
    $_SESSION["hibauzenet"] = "Érvénytelen bejelentkezés!";
    header('Location: ../frontend/index.php');
    exit;
}

if ($arrayJelszo == $jelszo) {
    $sql = "SELECT fnev, vnev, knev, tszam, sztdatum FROM felhasznalok WHERE email = '$email'";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $_SESSION["fnev"] = $row["fnev"];
        $_SESSION["vnev"] = $row["vnev"];
        $_SESSION["knev"] = $row["knev"];
        $_SESSION["email"] = $arrayEmail;
        $_SESSION["jelszo"] = $arrayJelszo;
        $_SESSION["sztdatum"] = $row["sztdatum"];
        $_SESSION["tszam"] = $row["tszam"];
    }
    echo "Sikeres bejelentkezés";
    header('Location: ../frontend/fooldal.php');
    exit;
} else {
    $_SESSION["hibauzenet"] = "Érvénytelen bejelentkezés!";
    header('Location: ../frontend/index.php');
}
