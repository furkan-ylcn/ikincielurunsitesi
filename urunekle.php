<?php

session_start();

require_once "config.php";

if (isset($_POST["urunadi"])) {
    $form_urunadi = $_POST["urunadi"];
    $form_kategori = $_POST["kategori"];
    $form_aciklama = $_POST["aciklama"];

    if($form_urunadi != "" || $form_kategori !="" || $form_aciklama != "")
        $query = mysqli_query($veritabani, "INSERT INTO `urunler` (`urunadi`, `kategori`, `ilansahibi`, `aciklama`) VALUES ('" . $form_urunadi . "','" . $form_kategori . "', '" . $_SESSION['kullaniciadi'] . "','" . $form_aciklama . "')");
    else{
        echo "<p style='font-size: 30px; '>Ürün ekleme başarısız.</p>";
        echo "<p style='font-size: 30px; '>Lütfen tüm alanları doldurun.</p>";
        echo "<p style='font-size: 30px;'>Tekrardan ürün ekleme sayfasına gitmek için <a href='urunekle.php'>tıklayınız.</a></p>";
    }

    if (mysqli_errno($veritabani) != 0) {
        echo "Bir hata oluştu.";
        exit;
    }

} else {
    ?>

    <form action="urunekle.php" method="POST">
    <link rel="stylesheet" type="text/css" href="tablolar.css">
        <table cellpadding="10" cellspacing="25">
            <tr>
                <td class="hg" colspan="2">ÜRÜN EKLE</td>
            </tr>
            <tr>
                <td style="font-size: 20px;">Ürün Adı:</td>
                <td><input type="text" name="urunadi"></td>
            </tr>
            <tr>
                <td style="font-size: 20px;">Kategori:</td>
                <td><input type="text" name="kategori"></td>
            </tr>
            <tr>
                <td style="font-size: 20px;">Açıklama:</td>
                <td><textarea style="width: 200px; height: 100px;" name="aciklama"
                    placeholder="Açıklama yazınız..."></textarea></td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit">Ürünü Ekle</button></td>
            </tr>
        </table>
    <form>

<?php
    echo "<a href='anasayfa.php' >Anasayfa</a> &nbsp; &nbsp;  &nbsp;";
    echo "<a href='urunekle.php'>Ürün Ekle</a> &nbsp; &nbsp; &nbsp;";
    echo "<a href='urunler.php'>Ürünleri Görüntüle</a> &nbsp; &nbsp; &nbsp;";
    echo "<a href='cikis.php'>Çıkış Yap</a><hr>";
}
?>