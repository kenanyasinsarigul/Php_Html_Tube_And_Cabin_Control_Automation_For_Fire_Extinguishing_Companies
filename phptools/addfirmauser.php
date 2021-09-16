<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if ($_POST){
	
$username = $_POST["username"];
$ilgilikisi = $_POST["ilgilikisi"];
$firma = $_POST["firma"];
$vergino = $_POST["vergino"];
$pass = 'alarm.kontrol';
$yetki = "firma";

if (!empty($username) || !empty($ilgilikisi) || !empty($firma) || !empty($vergino)){

  $ekle = "insert into firmausers(username,ilgilikisi,firma,vergino,pass,yetki) values('$username','$ilgilikisi','$firma','$vergino','$pass','$yetki')";

    if($connect->query($ekle)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("refresh:0; url=index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
}
}

?>