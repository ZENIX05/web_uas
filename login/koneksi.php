<?php
$servername = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "crud";

$conn = new mysqli($servername, $dbusername, $dbpassword, $dbname);

if($conn->connect_error){
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
