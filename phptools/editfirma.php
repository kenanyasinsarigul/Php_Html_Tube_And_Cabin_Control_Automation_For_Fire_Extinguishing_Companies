<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if (isset($_POST['updatefirmabtn'])){

$id=$_POST["idfirma"];
$unvan = $_POST["unvan"];
$adres = $_POST["adres"];
$ilgilikisi = $_POST["ilgilikisi"];
$gsm = $_POST["gsm"];
$sabit = $_POST["sabit"];
$mail = $_POST["mail"];
$faturaadres = $_POST["faturaadres"];
$vergidairesi = $_POST["vergidairesi"];
$vergino = $_POST["vergino"];
$sozlesmelimi = $_POST["sozlesmelimi"];
$aciklama = $_POST["aciklama"];
date_default_timezone_set('Europe/Istanbul');
$time = date("Y-m-d H:i:s");

if (!empty($unvan) || !empty($adres) || !empty($ilgilikisi) || !empty($gsm) || !empty($sabit) || !empty($mail) || !empty($faturaadres) || !empty($vergidairesi) || !empty($vergino)
|| !empty($sozlesmelimi)){

$updatefirma=mysqli_query($connect,"UPDATE firma SET unvan='$unvan', adres='$adres', ilgilikisi='$ilgilikisi', gsm='$gsm', sabit='$sabit', mail='$mail', faturaadres='$faturaadres',
vergidairesi='$vergidairesi', vergino='$vergino', sozlesmelimi='$sozlesmelimi', aciklama='$aciklama', tarih='$time' WHERE id='$id'");

  if($connect->query($updatefirma)){
    $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
    header("location:index.php");
  }
  else
    $info = '<script type="text/javascript">alert("HATA!!!");</script>';
    header("location:index.php");
}
}

if (isset($_POST['deletefirma'])){

  $id=$_POST["iddeletefirma"];

  $deletefirma=mysqli_query($connect,"DELETE FROM firma WHERE id='$id'");

    if($connect->query($deletefirma)){
      $info = '<script type="text/javascript">alert("Silme işlemi başarıyla tamamlandı!");</script>';
      header("location:index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:index.php");
}
?>