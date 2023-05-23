<?php

$db_host = "sql307.epizy.com";
$db_kullanici = "epiz_34270666";
$db_sifre = "bQdV30Cqz9";
$db_dbadi = "epiz_34270666_ikincielurunler";

$veritabani = mysqli_connect($db_host, $db_kullanici, $db_sifre, $db_dbadi);
mysqli_set_charset($veritabani, "utf8");

if (mysqli_connect_errno()) {
    echo "Bağlantı Kurulamadı!";
    exit();
}