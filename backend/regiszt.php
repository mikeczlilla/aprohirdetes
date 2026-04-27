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

$vnev = $_POST["vnev"];
$knev = $_POST["knev"];
$fnev = $_POST["fnev"];
$email = $_POST["email"];
$jelszo1 = $_POST["jelszo1"];
$tfon = $_POST["tfon"];
$szdatum = $_POST["szdatum"];


$sql = "SELECT email FROM felhasznalok";
$result = mysqli_query($conn, $sql);
$arrayEmail = ["a"];

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    $arrayEmail[] = $row["email"];
  }
}

if (empty($email) or empty($jelszo1) or empty($fnev) or empty($vnev) or empty($knev) or empty($tfon) or empty($szdatum)) {
  $_SESSION["hibauzenet"] = "Érvénytelen regisztráció!";
  header('Location: ../frontend/regisztracio.php');
  exit;
}

print_r($arrayEmail);
if (array_search($email, $arrayEmail)) {
  echo "Már van ilyen email-cím";
} else {
  $sql = "INSERT INTO felhasznalok (fnev, vnev, knev, email, jelszo, tszam, sztdatum)
  VALUES ('$fnev', '$vnev', '$knev', '$email', '$jelszo1', '$tfon', '$szdatum')";
  if ($conn->query($sql) === TRUE) {
    echo "Sikeres regisztráció";
    header('Location: ../frontend/index.php');
    exit;
  } else {
    echo "Hiba: " . $sql . "<br>" . $conn->error;
  }
}

mysqli_close($conn);
exit;
