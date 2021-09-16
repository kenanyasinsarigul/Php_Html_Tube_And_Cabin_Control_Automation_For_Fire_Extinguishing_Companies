<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if ($_POST){
	
$dolapno = $_POST["dolapno"];
$firma = $_POST["firma"];
$bulyer = $_POST["bulyer"];
$vergino = $_POST["vergino"];
$soru1 = $_POST["soru1"];
$soru2 = $_POST["soru2"];
$soru3 = $_POST["soru3"];
$soru4 = $_POST["soru4"];
$soru5 = $_POST["soru5"];
$soru6 = $_POST["soru6"];
$soru7 = $_POST["soru7"];
$soru8 = $_POST["soru8"];
$soru9 = $_POST["soru9"];
$soru10 = $_POST["soru10"];
$soru11 = $_POST["soru11"];
$soru12 = $_POST["soru12"];
$aciklama = $_POST["aciklama"];
$degisimvarsacins = $_POST["degisimvarsacins"];
$degisimvarsatar = $_POST["degisimvarsatar"];
$kontroltar = $_POST["kontroltar"];
$sonrakontroltar = $_POST["sonrakontroltar"];
$bakimsonuc = $_POST["bakimsonuc"];
$bakimyapan = $_SESSION['username'];

if (!empty($dolapno) || !empty($firma) || !empty($bulyer) || !empty($vergino) || !empty($soru1) || !empty($soru2) || !empty($soru3) || !empty($soru4) || !empty($soru5) || !empty($soru6) || !empty($soru7) || !empty($soru8) || !empty($soru9) || !empty($soru10) || !empty($soru11) || !empty($soru12) || !empty($kontroltar) || !empty($sonrakontroltar) || !empty($bakimsonuc) || !empty($bakimyapan)){

  $ekle = "insert into yddisk(id,dolapno,firma,bulyer,vergino,soru1,soru2,soru3,soru4,soru5,soru6, soru7,soru8,soru9,soru10,soru11,soru12,aciklama,degisimvarsacins,degisimvarsatar,kontroltar,sonrakontroltar,bakimsonuc,bakimyapan) values('','$dolapno','$firma','$bulyer','$vergino','$soru1','$soru2','$soru3','$soru4','$soru5','$soru6','$soru7','$soru8','$soru9','$soru10',
  '$soru11','$soru12','$aciklama','$degisimvarsacins','$degisimvarsatar','$kontroltar','$sonrakontroltar','$bakimsonuc','$bakimyapan')";

  if($connect->query($ekle)){
    $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
    header("refresh:0; url=ydk.php");
  }
  else
  $info = '<script type="text/javascript">alert("HATA!!!");</script>';
}
}

?>
