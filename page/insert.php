<?php
include "option.php";
session_start();
$message="";
$id=@$_GET["id"];
$page=@$_GET["page"];

if(!$_SESSION){
?>


<html>
<head>
    <title>404 Not Found</title>
</head>
<body>
<h1> Not Found</h1><br>
<p style="margin-top: -15px ; font-size: 16px">The requested URL/page/insert.php was not found on this server</p>
</body>
</html>

<?php }else{ if(@$_SESSION["role"]=="user"){ ?>


<html>
<head>
    <title>Hata</title>
</head>
<body>
<div  style="color: red; margin: 300px; margin-left: 400px ;text-align: center">
    <h1> Sayfaya Giriş Yetkiniz Bulunmamaktadır! </h1>
    <a href="admin.php?page=exit" ><p>Çıkış</p></a>
</div>
</body>
</html>


<?php }elseif(@$_SESSION["role"]=="admin") { if($page=="message"){?>
<html>
<head>
    <title> Mesaj </title>
    <link rel="stylesheet" type="text/css" href="../css/insertstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class="wrap">
    <div class="menu">
        <div class="select">
            <a href="admin.php" ><img src="../img/admin/article.png" class="image"></a>
        </div>
        <div    class="select">
            <a href="insert.php" ><img src="../img/admin/addarticle.png" class="image"></a>
        </div>
        <div class="select">
            <a href="admin.php?page=message" ><img src="../img/admin/message.png" class="image"></a>
        </div>
        <div class="select">
            <a href="admin.php?page=exit" ><img src="../img/admin/exit.png" class="image"></a>
        </div>
    </div>
    <div class="container">
        <div class="input">
            <?php
            $search=mysqli_query($connect,"select * from messages where id=\"$id\" ");
            $select=mysqli_fetch_array($search);
            echo "
            <strong>Gönderen : </strong>{$select["name"]}<br>
            <strong>Eposta : </strong>{$select["eposta"]}<br>
            <strong>Konu : </strong>{$select["title"]}<br>
            <strong>Mesaj : </strong>{$select["message"]}<br>
            ";
            $add=mysqli_query($connect,"update messages set `READ`=1 where id=\"$id\" ");
            if($_POST){
                $eposta=$select["eposta"];
                $text=$_POST["text"];
            }
            ?>
        </div>
        <div class="output" style="margin-top: 50px; padding: 10px;">
            <form action="" method="post">
                <textarea rows="10px" cols="50px" name="text"></textarea><br>
                <input type="submit" value="YANITLA" style="float: right; margin: 10px 50px;">
            </form>
        </div>
    </div>
</div>
</body>
</html>

<?php }else {?>
<html>
<head>
        <?php if(isset($id)){?>
            <title>Makale Düzenle</title>
        <? }else{ ?>
            <title>Makale Ekle</title>
        <? } ?>
    <link rel="stylesheet" type="text/css" href="../css/insertstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<div class="wrap">
    <div class="menu">
        <div class="select">
            <a href="admin.php" ><img src="../img/admin/article.png" class="image"></a>
        </div>
        <div    class="select">
            <a href="insert.php" ><img src="../img/admin/addarticle.png" class="image"></a>
        </div>
        <div class="select">
            <a href="admin.php?page=message" ><img src="../img/admin/message.png" class="image"></a>
        </div>
        <div class="select">
            <a href="admin.php?page=exit" ><img src="../img/admin/exit.png" class="image"></a>
        </div>
    </div>


<?php if(isset($id)){
    if($_POST){
        $topic=$_POST["topic"];
        $article=$_POST["article"];
        $image=$_POST["image"];
        $video=$_POST["video"];
        $date=$_POST["date"];
        $category=$_POST["category"];
        $add=mysqli_query($connect,"UPDATE articles SET `topic`=\"$topic\",`article`=\"$article\",`image`=\"$image\",`video`=\"$video\",`date`=\"$date\",`category`=\"$category\" WHERE `id`=\"$id\" ");
        if($add){ $message= "<font color='green'>Makale Başarıyla Güncellendi</font>";}
        else{ $message= "<font color='red'>Sisteme Ulaşılamıyor!</font>";}
    }
    $search=mysqli_query($connect,"select * from articles WHERE id=\"$id\" " );
    $select=mysqli_fetch_array($search);
    ?>
    <div class="container">
        <form action="" method="post">
            <table cellspacing="5" cellpadding="5">
                <tr>
                    <td></td>
                    <td><?php echo $message; ?></td>
                </tr>
                <tr>
                    <td>Kategori :</td>
                    <td><select name="category" value="">
                            <option value="spor">Spor</option>
                            <option value="film">Sinematik</option>
                            <option value="oyun">Oyun</option>
                            <option value="kitaplık">Kitaplık</option>
                    </td>
                </tr>
                <tr>
                    <td>Makale Adı :</td>
                    <td><input type="text" name="topic" value="<?php echo $select["topic"]?>"></td>
                </tr>
                <tr>
                    <td>Makale :</td>
                    <td><textarea cols="50" rows="20" name="article" ><?php echo $select["article"]; ?></textarea></td>
                </tr>
                <tr>
                    <td>Resim Uzantısı :</td>
                    <td><input type="text" name="image"  value="<?php echo $select["image"]?>"></td>
                </tr>
                <tr>
                    <td>Video Uzantısı :</td>
                    <td><textarea cols="50" rows="4" name="video" ><?php echo $select["video"]?></textarea></td>
                </tr>
                <tr>
                    <td>Tarih :</td>
                    <td><input type="text" name="date"  value="<?php echo $select["date"]?>"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="button" value="Kaydet" > </td>
                </tr>
            </table>
        </form>
    </div>


    <?php
}else{
    if($_POST){
        $topic=$_POST["topic"];
        $article=$_POST["article"];
        $image=$_POST["image"];
        $video=$_POST["video"];
        $date=$_POST["date"];
        $category=$_POST["category"];
        $add=mysqli_query($connect,"INSERT INTO articles (`topic`,`article`,`image`,`video`,`date`,`category`) VALUES (\"$topic\",\"$article\",\"$image\",\"$video\",\"$date\",\"$category\") ");
            if($add){ $message= "<font color='green'>Makale Başarıyla Eklendi</font>";}
            else{ $message= "<font color='red'>Sisteme Ulaşılamıyor!</font>";}
    }
    ?>
    <div class="container">
        <form action="" method="post">
            <table cellspacing="5" cellpadding="5">
                <tr>
                    <td></td>
                    <td><?php echo $message; ?></td>
                </tr>
                <tr>
                    <td>Kategori :</td>
                    <td><select name="category" value="">
                            <option value="spor">Spor</option>
                            <option value="film">Sinematik</option>
                            <option value="oyun">Oyun</option>
                            <option value="kitaplık">Kitaplık</option>
                    </td>
                </tr>
                <tr>
                    <td>Makale Adı :</td>
                    <td><input type="text" name="topic"></td>
                </tr>
                <tr>
                    <td>Makale :</td>
                    <td><textarea cols="50" rows="20" name="article" ></textarea></td>
                </tr>
                <tr>
                    <td>Resim Uzantısı :</td>
                    <td><input type="text" name="image" placeholder="ÖR: spor/futbol.jpg"></td>
                </tr>
                <tr>
                    <td>Video Uzantısı :</td>
                    <td><textarea cols="50" rows="4" name="video" ></textarea></td>
                </tr>
                <tr>
                    <td>Tarih :</td>
                    <td><input type="text" name="date" placeholder="yyyy-aa-gg"></td>
                </tr>
                <tr>
                    <td></td>
                    <td><input type="submit" class="button" value="Kaydet" > </td>
                </tr>
            </table>
        </form>
    </div>
<? } ?>
</div>
</body>
</html>

<?php } } } ?>
