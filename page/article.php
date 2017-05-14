<?php
include "option.php";
$id=@$_GET["id"];
$page=@$_GET["page"];
$search=mysqli_query($connect,"SELECT * FROM articles WHERE id=\"$id\" ");
$select=mysqli_fetch_array($search);
$article=explode("@",$select["article"]);
if($page!="spor" and $page!="kitaplik" and $page!="sinematik" and $page!="oyun"){
    include "404.php";
}elseif(empty($select)){
    include "404.php";
}else{
?>
<html>
<head>
    <title>Aykut UYSAL Kişisel Blog</title>
    <link rel="stylesheet" type="text/css" href="../css/articlestyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <?php
    if($page=="spor"){echo '<style>h3 a {color:#f1c40f;}.background{background-image:url("../img/bg/backgroundspor.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="kitaplik"){echo '<style>h3 a {color:#d35400;}.background{background-image:url("../img/bg/backgroundkitap.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="sinematik"){echo '<style>h3 a {color:#c01d19;}.background{background-image:url("../img/bg/backgroundsinematik.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="oyun"){echo '<style>h3 a {color:#27ae60;}.background{background-image:url("../img/bg/backgroundoyun.jpg");background-attachment: fixed;}</style>';}

    ?>


</head>
<body>
<div class="header">
    <a href="../index.php"><img src="../img/banner.png" alt="index" class="banner"></a>
</div>

<div class="wrap">
    <div class="menu">
        <ul class="mainmenu">
            <li><a href="../?page=">Anasayfa</a></li>
            <li><a href="../?page=spor">Spor</a></li>
            <li><a href="../?page=kitaplik">Kitaplık</a></li>
            <li><a href="../?page=sinematik">Sinematik</a></li>
            <li><a href="../?page=oyun">Oyun</a></li>
            <li><a href="iletisim.php">İletişim</a></li>
        </ul>
    </div>
    <div class="background"  >
        <div class="content"  >
            <?php
            echo "<h3><a href='#'>{$select["topic"]}</a></h3>";
            echo "<p>$article[0]</p>";
            echo "<div style=\" margin: 0px 16%;\" >"."<img src=\"../img/{$select["image"]}\" class=\"img\">"."</div>";
            if (@$article[1]){
            echo "<p>$article[1]</p><br><br>";}
            echo "<div style=\" margin: 0px 16%;\" >".$select["video"]."</div>";
            if (@$article[2]){
            echo "<p>&nbsp"."$article[2]</p>";}
            for ($i=0;$i<5;$i++){echo "<br>";}
            ?>
        </div>
    </div>
</div>

<div class="footer">
    <div class="copyright">Tüm hakları saklıdır.</div>
    <div>
        <a href="https://www.facebook.com"><img src="../img/media/face.jpg"  class="media"></a>
        <a href="https://www.twitter.com"><img src="../img/media/twitter.jpg"  class="media"></a>
        <a href="https://www.youtube.com"><img src="../img/media/youtube.png"  class="media"></a>
        <a href="https://www.instagram.com"><img src="../img/media/instagram.jpg"  class="media"></a>
    </div>
</div>

</body>
</html>

<?php } ?>
