<?php
$host = "localhost";
$user = "root";
$pw = "";
$db = "web_uas";

$koneksi = mysqli_connect($host,$user,$pw,$db);
if(!$koneksi){
    die("Lost connect". mysqli_connect_error());
}
?>