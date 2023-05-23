<?php

require_once "config.php";

if (isset($_POST["kullaniciadi"])){
    $form_ad = $_POST["ad"];
    $form_soyad = $_POST["soyad"];
    $form_email = $_POST["email"];
    $form_kullaniciadi = $_POST["kullaniciadi"];
    $form_sifre = $_POST["sifre"];

    $kullaniciadiuzunlugu = strlen($form_kullaniciadi);
    if ($kullaniciadiuzunlugu < 5 || $kullaniciadiuzunlugu > 20){
        echo "Kullanıcı adı en az 5, en fazla 20 karakterden oluşmalıdır.";
        exit;
    }

    $sifreuzunlugu = strlen($form_sifre);
    if ($sifreuzunlugu < 8 || $sifreuzunlugu > 20){
        echo "Şifre en az 8, en fazla 20 karakterden oluşmalıdır.";
        exit();
    }

    $form_sifre_hash = hash("sha256", $form_sifre);

    $query = mysqli_query($veritabani, "INSERT INTO `kullanicilar` (`ad`, `soyad`, `email`, `kullaniciadi`, `sifre`) VALUES ('".$form_ad."','".$form_soyad."','".$form_email."','".$form_kullaniciadi."','".$form_sifre_hash."')");

    if (mysqli_errno($veritabani) != 0){
        echo "Bir hata oluştu.";
        exit;
    }

    header("Location: kayitbasarili.php");

}
else {
?>

<form action="kayit.php" method="POST">
    <link rel="stylesheet" type="text/css" href="tablolar.css">
    <table cellpadding="10" cellspacing="25">
        <tr>
            <td class="hg" colspan="2">KAYIT</td>
        </tr>
        <tr>
            <td style="font-size: 20px;">Ad:</td>
            <td><input type="text" name="ad"></td>
        </tr>
        <tr>
            <td style="font-size: 20px;">Soyad:</td>
            <td><input type="text" name="soyad"></td>
        </tr>
        <tr>
            <td style="font-size: 20px;">E-mail:</td>
            <td><input type="email" name="email"></td>
        </tr>
        <tr>
            <td style="font-size: 20px;">Kullanıcı Adı:</td>
            <td><input type="text" name="kullaniciadi"></td>
        </tr>
        <tr>
            <td style="font-size: 20px;">Şifre:</td>
            <td><input type="password" name="sifre"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><button type="submit">Kayıt Ol</button></td>
        </tr>
    </table>
<form>

<?php
}
?>