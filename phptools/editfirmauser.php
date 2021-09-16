<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if (isset($_POST['updatefirmauserbtn'])){

  $id=$_POST["idfirmauser"];
  $username = $_POST["username"];
  $ilgilikisi = $_POST["ilgilikisi"];
  $firma = $_POST["firma"];
  $vergino = $_POST["vergino"];
  $pass = $_POST["pass"];
  date_default_timezone_set('Europe/Istanbul');
  $time = date("Y-m-d H:i:s");

if (!empty($username) || !empty($ilgilikisi) || !empty($firma) || !empty($vergino) || !empty($pass)){

  $updatefirmauser=mysqli_query($connect,"UPDATE firmausers SET username='$username', ilgilikisi='$ilgilikisi', firma='$firma', vergino='$vergino', pass='$pass', date='$time' WHERE id='$id'");

    if($connect->query($updatefirmauser)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("location:index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:index.php");
}
}

if (isset($_POST['deletefirmauser'])){

  $id=$_POST["iddeletefirmauser"];

  $deletefirmauser=mysqli_query($connect,"DELETE FROM firmausers WHERE id='$id'");

    if($connect->query($deletefirmauser)){
      $info = '<script type="text/javascript">alert("Silme işlemi başarıyla tamamlandı!");</script>';
      header("location:index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:index.php");
}

?>