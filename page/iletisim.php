<?php
include "option.php";
?>


<html>
<head>
	<title>Aykut UYSAL-İletişim</title>
	<link rel="stylesheet" type="text/css" href="../css/iletisimstyle.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
	<style>.background{background-image:url("../img/bg/iletisim.png");background-attachment: fixed;}</style>
</head>
<body>
	<div class="header">
		<a href="index.php"><img src="../img/banner.png" alt="index" class="banner"></a>
	</div>
	
	<div class="wrap">
		<div class="menu">
			<ul class="mainmenu">
				<li><a href="../index.php?page=">Anasayfa</a></li>
				<li><a href="../index.php?page=spor">Spor</a></li>
				<li><a href="../index.php?page=kitaplik">Kitaplık</a></li>
				<li><a href="../index.php?page=sinematik">Sinematik</a></li>
				<li><a href="../index.php?page=oyun">Oyun</a></li>
				<li><a href="">İletişim</a></li>
			</ul>
		</div>
		<div class="background"  >
			<div class="content"  >
                <div class="form">
                    <?php
                    if ($_POST){
                        $user = trim($_POST["user"]);
                        $eposta = trim($_POST["email"]);
                        $title = trim($_POST["title"]);
                        $message = trim($_POST["message"]);
                        if (!empty($user) && !empty($eposta) && !empty($message)){
                            $add = mysqli_query($connect,"INSERT INTO messages(`name`, `eposta`, `title`, `message`, `READ`) VALUES (\"$user\",\"$eposta\",\"$title\",\"$message\",'0')");
                            if($add){
                                echo "<font color='green'><strong>Mesajınız Gönderildi!</strong></font>";
                            }else{
                                echo "<font color='red'><strong>Siteye Ulaşılamıyor!..</strong></font>";
                            }
                        }else{
                            echo "<font color='red'><strong>Gönderme Başarısız. Lütfen Bilgileri Tam Giriniz.</strong></font>";}
                    }
                    ?>

                    <form action="" method="post">
                        <table cellpadding="5px" cellspacing="20px">
                            <tr>
                                <td><p>Ad Soyad</p></td>
                                <td><input type="text" name="user" placeholder="Ad-Soyad"> </td>
                            </tr>
                            <tr>
                                <td><p>E-posta</p></td>
                                <td ><input type="text" name="email" placeholder="E-posta"></td>
                            </tr>
                            <tr>
                                <td><p>Konu</p></td>
                                <td><select name="title" value="">
                                        <option value="Oneri">Öneri</option>
                                        <option value="İstek">İstek</option>
                                        <option value="Hata Bildir">Hata Bildir!</option>
                                        <option value="Diger">Diğer</option>
                                </td>
                            </tr>
                            <tr>
                                <td><p>Mesaj</p></td>
                                <td><textarea rows="6" cols="35" placeholder="Mesajınızı Giriniz.." name="message"></textarea></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td><input type="submit" class="button" value="Gönder" > </td>
                            </tr>
                        </table>
                    </form>

                </div>
                <div class="smedia">
                <?php

                ?>
                </div>
			</div>
		</div>
	</div>
	
	<div class="footer">
		<div class="copyright">&copy Tüm hakları saklıdır.</div>
		<div>
			<a href="https://www.facebook.com"><img src="../img/media/face.jpg"  class="media"></a>
			<a href="https://www.twitter.com"><img src="../img/media/twitter.jpg"  class="media"></a>
			<a href="https://www.youtube.com"><img src="../img/media/youtube.png"  class="media"></a>
			<a href="https://www.instagram.com"><img src="../img/media/instagram.jpg"  class="media"></a>
		</div>
	</div>
	
</body>
</html>