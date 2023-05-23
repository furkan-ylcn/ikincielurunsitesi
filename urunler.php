<link rel="stylesheet" type="text/css" href="tablolar.css">

<?php

session_start();

require_once "config.php";

echo "<a href='anasayfa.php' >Anasayfa</a> &nbsp; &nbsp;  &nbsp;";
echo "<a href='urunekle.php'>Ürün Ekle</a> &nbsp; &nbsp; &nbsp;";
echo "<a href='urunler.php'>Ürünleri Görüntüle</a> &nbsp; &nbsp; &nbsp;";
echo "<a href='cikis.php'>Çıkış Yap</a><hr>";

$sorgu = mysqli_query($veritabani, "SELECT * FROM `urunler`");

while ($row = mysqli_fetch_assoc($sorgu)) {
    echo "<b><u>Ürün Adı :</u></b> &nbsp;" . $row["urunadi"] . " <b><u>Kategori :</u></b> &nbsp;" . $row["kategori"] . " <b><u>Ürün Sahibi :</u></b> &nbsp;" . $_SESSION["kullaniciadi"] . " <b><u>Ürün Açıklaması :</u></b> &nbsp;" . $row["aciklama"] . "<br><br><hr>";
}