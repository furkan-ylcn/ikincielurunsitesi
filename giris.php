<!DOCTYPE html>
<html>
    <head>
        <title>İkinci El Ürün İlanları</title>
        <link rel="stylesheet" type="text/css" href="tablolar.css">
    </head>
    <body>
        <?php

        require_once "config.php";

        if (isset($_POST["kullaniciadi"])) {

            $form_kullaniciadi = $_POST["kullaniciadi"];
            $form_sifre = $_POST["sifre"];
            $form_sifre_hash = hash("sha256", $form_sifre);

            $kullanici = mysqli_query($veritabani, "SELECT * FROM `kullanicilar` WHERE kullaniciadi='$form_kullaniciadi' AND sifre='$form_sifre_hash'");
            $row = mysqli_fetch_assoc($kullanici);
            $kullanicino = mysqli_num_rows($kullanici);

            if ($kullanicino == 0) {
                echo "Kullanıcı bulunamadı. Lütfen kullanıcı adınızı ve şifrenizi kontrol ediniz.";
            } else if ($kullanicino > 0) {
                session_start();
                $_SESSION["kullaniciadi"] = $row["kullaniciadi"];
                header("Location: anasayfa.php");
            }
        } else {

            ?>

            <form action="giris.php" method="POST">
                <table cellpadding="10" cellspacing="25">
                    <tr>
                        <td class="hg" colspan="2">HOŞGELDİNİZ</td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">Kullanıcı Adı:</td>
                        <td style="text-align: right;"><input type="text" name="kullaniciadi"></td>
                    </tr>
                    <tr>
                        <td style="font-size: 20px;">Şifre:</td>
                        <td style="text-align: right;"><input type="password" name="sifre"></td>
                    </tr>
                    <tr>
                        <td colspan="2" align="center"><button type="submit">Giriş Yap</button> &nbsp; <input type="button" value="Kayıt Ol" onclick="window.location.href='kayit.php'"></td>
                    </tr>
                </table>
            <form>

        <?php
        }
        ?>
    </body>
</html>