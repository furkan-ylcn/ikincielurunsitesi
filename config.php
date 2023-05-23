<?php

$db_host = "localhost";
$db_kullanici = "root";
$db_sifre = "";
$db_dbadi = "ikincielurunveritabani";

$veritabani = mysqli_connect($db_host, $db_kullanici, $db_sifre, $db_dbadi);

if (mysqli_connect_errno()) {
    echo "Bağlantı Kurulamadı!";
    exit();
}