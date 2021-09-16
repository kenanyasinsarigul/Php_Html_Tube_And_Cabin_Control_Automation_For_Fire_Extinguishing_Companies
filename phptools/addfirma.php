<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if ($_POST){
	
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

if (!empty($unvan) || !empty($adres) || !empty($ilgilikisi) || !empty($gsm) || !empty($sabit) || !empty($mail) || !empty($faturaadres) || !empty($vergidairesi) || !empty($vergino)
|| !empty($sozlesmelimi)){

  $ekle = "insert into firma(unvan,adres,ilgilikisi,gsm,sabit,mail,faturaadres,vergidairesi,vergino,sozlesmelimi,aciklama) values('$unvan','$adres','$ilgilikisi','$gsm','$sabit','$mail'
  ,'$faturaadres','$vergidairesi','$vergino','$sozlesmelimi','$aciklama')";

    if($connect->query($ekle)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("refresh:0; url=index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
}
}

?>