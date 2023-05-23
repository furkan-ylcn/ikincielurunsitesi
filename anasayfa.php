<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <style type="text/css">
        .baslik {
            color: darkblue;
            text-align: center;
            font-size: 500%;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .eylemler {
            text-align: center;
            margin-top: 20%;
            font-size: larger;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        a {
            margin-left: 20px;
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
    </style>
</head>

<body>
    <div class="baslik">
        <p><b>İKİNCİ EL ÜRÜN İLANLARI</b></p>
    </div>
    <hr color="darkblue" size="7">
    <?php

    session_start();

    require_once "config.php";

    if (!isset($_SESSION["kullaniciadi"])){
        echo "Lütfen yeniden oturum açın.";
    }
    
    echo "<h1 style='margin-left: 20px; font-family:Verdana, Geneva, Tahoma, sans-serif;'>Hoşgeldin " . $_SESSION["kullaniciadi"] . "</h1><br>";
    echo "<a href='anasayfa.php' >Anasayfa</a> &nbsp;";
    echo "<a href='urunekle.php'>Ürün Ekle</a> &nbsp;";
    echo "<a href='urunler.php'>Ürünleri Görüntüle</a> &nbsp;";
    echo "<a href='cikis.php'>Çıkış Yap</a> &nbsp;";
    ?>
</body>

</html>
