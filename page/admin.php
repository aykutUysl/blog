<?php
include "option.php";
session_start();
$message="";
$page=@$_GET["page"];
$id=@$_GET["id"];
if ($_POST){
    $user=trim($_POST["user"]);
    $pass=trim($_POST["password"]);
    $search= mysqli_query($connect,"SELECT * FROM users WHERE user=\"$user\" ");
    $select= mysqli_fetch_array($search);
    if (empty($user) or empty($pass)){
        $message="Lütfen Alanları Boş Bırakmayın";
    }elseif ($user!=$select["user"] or $pass!=$select["password"]){
        $message="Yanlış Kullanıcı Adı veya Şifre";
    }else{
        $_SESSION["oturum"]= true;
        $_SESSION["role"]= $select["role"];
    }
}else{
}

if($page=="exit"){
    session_destroy();
    header("Location:/page/admin.php");
}elseif($page=="delete"){
    mysqli_query($connect,"delete from articles where id=\"$id\" ");
    header("Location:/page/admin.php");
}elseif($page=="mdelete"){
    mysqli_query($connect,"delete from messages where id=\"$id\" ");
    header("Location:/page/admin.php?page=message");
}
?>


<?php if(!@$_SESSION){ ?>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
        <div class="container">
            <img src="../img/User.png">
            <form action="" method="post">
                <div class="input">
                    <input type="text" name="user" placeholder="Kullanıcı Adını Giriniz"><br>
                </div>
                <div class="input">
                    <input type="password" name="password" placeholder="Şifreyi Giriniz"><br>
                </div>
                <div class="input">
                    <input type="submit" name="login" class="button" value="GİRİŞ">
                </div>
                <div class="message">
                    <p><b><?php echo $message ?></b></p>
                </div>
            </form>
        </div>
</body>
</html>
<?php }else { if($_SESSION["role"]=="admin" and $page==""){?>

<html>
<head>
    <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
    <div class="wrap">
        <div class="menu">
            <div class="select">
                <a href="" ><img src="../img/admin/article.png" class="image"></a>
            </div>
            <div    class="select">
                <a href="insert.php" ><img src="../img/admin/addarticle.png" class="image"></a>
            </div>
            <div class="select">
                <a href="?page=message" ><img src="../img/admin/message.png" class="image"></a>
            </div>
            <div class="select">
                <a href="?page=exit" ><img src="../img/admin/exit.png" class="image"></a>
            </div>
        </div>
        <div class="contain">
            <table class="headtable" cellspacing="0px">
                <tr>
                    <td style="width: 50px"><p>Sıra</p></td>
                    <td style="width: 260px"><p>Başlık</p></td>
                    <td style="width: 90px"><p>Tarih</p></td>
                    <td style="width: 90px"><p>Kategori</p></td>
                    <td style="width: 90px"><p>Seçenekler</p></td>
                </tr>
            </table>
            <?php
            $search=mysqli_query($connect,"select * from articles");
            while($select=mysqli_fetch_array($search)){
            ?>
            <table class="containtable" cellspacing="0px">
                <tr>
                    <td style="width: 50px"><p><?php echo $select["id"]?></p></td>
                    <td style="width: 260px"><p><?php echo $select["topic"]?></p></td>
                    <td style="width: 90px"><p><?php echo $select["date"]?></p></td>
                    <td style="width: 90px"><p><?php echo $select["category"]?></p></td>
                    <td style="width: 90px">
                        <a href="insert.php?id=<?php echo $select["id"]; ?>"><img src="../img/admin/updateicon.png" class="icon"></a>
                        <a href="?page=delete&id=<?php echo $select["id"]; ?>"><img src="../img/admin/deleteicon.png" class="icon"></a>
                    </td>
                </tr>
            </table>
            <?php }?>
        </div>
    </div>
</body>
</html>

<?php }elseif($_SESSION["role"]=="admin" and $page=="message"){?>



    <html>
    <head>
        <link rel="stylesheet" type="text/css" href="../css/adminstyle.css">
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
                <a href="?page=message" ><img src="../img/admin/message.png" class="image"></a>
            </div>
            <div class="select">
                <a href="?page=exit" ><img src="../img/admin/exit.png" class="image"></a>
            </div>
        </div>
        <div class="contain">
            <table class="headtable" cellspacing="0px">
                <tr>
                    <td style="width: 50px"><p>Sıra</p></td>
                    <td style="width: 175px"><p>Gönderen</p></td>
                    <td style="width: 275px"><p>Mesaj</p></td>
                    <td style="width: 50px"><p>Konu</p></td>
                    <td style="width: 50px"><p>Seçenek</p></td>
                </tr>
            </table>
            <?php
            $search=mysqli_query($connect,"select * from messages");
            while($select=mysqli_fetch_array($search)){
                ?>
                <table class="containtable" cellspacing="0px">
                    <tr>
                        <td style="width: 50px;<?php if($select["READ"]==0){?> background-color: yellow<?php }?>"><p><?php echo $select["id"]?></p></td>
                        <td style="width: 175px;<?php if($select["READ"]==0){?> background-color: yellow<?php }?>"><p><?php echo $select["name"]?></p></td>
                        <td style="width: 275px;<?php if($select["READ"]==0){?> background-color: yellow<?php }?>"><p><?php echo substr($select["message"],0,40)?></p></td>
                        <td style="width: 50px;<?php if($select["READ"]==0){?> background-color: yellow<?php }?>"><p><?php echo $select["title"]?></p></td>
                        <td style="width: 50px;<?php if($select["READ"]==0){?> background-color: yellow<?php }?>">
                            <a href="insert.php?page=message&id=<?php echo $select["id"]; ?>"><img src="../img/admin/ask.png" class="icon"></a>
                            <a href="?page=mdelete&id=<?php echo $select["id"]; ?>"><img src="../img/admin/deleteicon.png" class="icon"></a>
                        </td>
                    </tr>
                </table>
            <?php }?>
        </div>
    </div>
    </body>
    </html>



<? }else{?>

<html>
<head>
    <title>Hata</title>
</head>
<body>
<div  style="color: red; margin: 300px; margin-left: 400px ;text-align: center">
    <h1> Sayfaya Giriş Yetkiniz Bulunmamaktadır! </h1>
    <a href="?page=exit" ><p>Çıkış</p></a>
</div>
</body>
</html>


<?  }
} ?>
