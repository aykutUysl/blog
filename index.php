<?php
$page=@$_GET["page"];
include "page/option.php";
if($page!="spor" and $page!="kitaplik" and $page!="sinematik" and $page!="oyun" and $page!=""){
    include "page/404.php";
}else{
?>
<html>
<head>
    <title>Aykut UYSAL Kişisel Blog</title>
    <link rel="stylesheet" type="text/css" href="css/mainstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
    <?php
    if($page==""){echo '<style>.background{background-image:url("img/bg/bg.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="spor"){echo '<style>.text h3 a {color:#f1c40f;}.background{background-image:url("img/bg/backgroundspor.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="kitaplik"){echo '<style>.text h3 a {color:#d35400;}.background{background-image:url("img/bg/backgroundkitap.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="sinematik"){echo '<style>.text h3 a {color:#c01d19;}.background{background-image:url("img/bg/backgroundsinematik.jpg");background-attachment: fixed;}</style>';}
    elseif($page=="oyun"){echo '<style>.text h3 a {color:#27ae60;}.background{background-image:url("img/bg/backgroundoyun.jpg");background-attachment: fixed;}</style>';}

    ?>


</head>
<body>
<div class="header">
    <a href="index.php"><img src="img/banner.png" alt="index" class="banner"></a>
</div>

<div class="wrap">
    <div class="menu">
        <ul class="mainmenu">
            <li><a href="?page=">Anasayfa</a></li>
            <li><a href="?page=spor">Spor</a></li>
            <li><a href="?page=kitaplik">Kitaplık</a></li>
            <li><a href="?page=sinematik">Sinematik</a></li>
            <li><a href="?page=oyun">Oyun</a></li>
            <li><a href="page/iletisim.php">İletişim</a></li>
        </ul>
    </div>
    <div class="background"  >
        <div class="content"  >
            <div class="text">
                <div class="text1">
                    <?php
                    if($page==""){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='oyun' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=oyun\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=oyun\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="spor"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='spor' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=spor\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=spor\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="kitaplik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='kitaplık' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=kitaplik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=kitaplik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="sinematik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='film' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=sinematik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=sinematik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="oyun"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='oyun' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=oyun\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=oyun\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }
                    ?>
                </div>
                <div class="text2">
                    <?php
                    if($page==""){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='spor' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=spor\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=spor\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="spor"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='spor' ORDER BY date DESC limit 1,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=spor\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=spor\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="kitaplik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='kitaplık' ORDER BY date DESC limit 1,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=kitaplik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=kitaplik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="sinematik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='film' ORDER BY date DESC limit 1,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=sinematik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=sinematik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="oyun"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='oyun' ORDER BY date DESC limit 1,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=oyun\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=oyun\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }
                    ?>
                </div>
                <div class="text3">
                    <?php
                    if($page==""){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='film' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=sinematik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=sinematik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="spor"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='spor' ORDER BY date DESC limit 2,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=spor\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=spor\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
					}elseif($page=="kitaplik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='kitaplık' ORDER BY date DESC limit 2,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=kitaplik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=kitaplik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="sinematik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='film' ORDER BY date DESC limit 2,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=sinematik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=sinematik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="oyun"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='oyun' ORDER BY date DESC limit 2,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=oyun\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=oyun\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }
                    ?>
                </div>
                <div class="text4">
                    <?php
                    if($page==""){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='kitaplık' ORDER BY date DESC");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=kitaplik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=kitaplik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="spor"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='spor' ORDER BY date DESC limit 3,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=spor\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=spor\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="kitaplik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='kitaplık' ORDER BY date DESC limit 3,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=kitaplik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=kitaplik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="sinematik"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='film' ORDER BY date DESC limit 3,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=sinematik\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=sinematik\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }elseif($page=="oyun"){
                        $search=mysqli_query($connect,"SELECT * FROM articles WHERE category='oyun' ORDER BY date DESC limit 3,1");
                        $select=mysqli_fetch_array($search);
                        $image="<img src=\"img/{$select["image"]}\" class=\"img\">";
                        $article=substr($select["article"],0,120);
                        echo "<h3><b><a href=\"page/article.php?id={$select["id"]}&page=oyun\">{$select["topic"]}</b></a></h3>
						      $image
						      <p>$article...<a href=\"page/article.php?id={$select["id"]}&page=oyun\" class=\"continue\"> >>DEVAMINI OKU </a></p>";
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="footer">
    <div class="copyright">Tüm hakları saklıdır.</div>
    <div>
        <a href="https://www.facebook.com"><img src="img/media/face.jpg"  class="media"></a>
        <a href="https://www.twitter.com"><img src="img/media/twitter.jpg"  class="media"></a>
        <a href="https://www.youtube.com"><img src="img/media/youtube.png"  class="media"></a>
        <a href="https://www.instagram.com"><img src="img/media/instagram.jpg"  class="media"></a>
    </div>
</div>

</body>
</html>
<? } ?>