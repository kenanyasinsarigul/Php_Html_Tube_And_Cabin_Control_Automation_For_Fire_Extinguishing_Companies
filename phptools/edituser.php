<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if (isset($_POST["updateuserbtn"])){

$id=$_POST["iduser"];
$username = $_POST["username"];
$name = $_POST["name"];
$surname = $_POST["surname"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$yetki = $_POST["yetki"];
date_default_timezone_set('Europe/Istanbul');
$time = date("Y-m-d H:i:s");

if (!empty($username) || !empty($name) || !empty($surname) || !empty($mail) || !empty($pass) || !empty($yetki)){

    $updateuser=mysqli_query($connect,"UPDATE users SET username='$username', name='$name', surname='$surname', mail='$mail', password='$pass', yetki='$yetki', date='$time' WHERE id='$id'");

    if($connect->query($updateuser)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("location:index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:index.php");
}
}

if (isset($_POST['deleteuser'])){

  $id=$_POST["iddeleteuser"];

  $deleteuser=mysqli_query($connect,"DELETE FROM users WHERE id='$id'");

    if($connect->query($deleteuser)){
      $info = '<script type="text/javascript">alert("Silme işlemi başarıyla tamamlandı!");</script>';
      header("location:index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:index.php");
}
?>