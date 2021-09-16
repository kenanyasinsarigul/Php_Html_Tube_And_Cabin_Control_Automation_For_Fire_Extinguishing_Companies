<?php
include("baglanti.php");
$info = '';

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");

if($connect->connect_error){
  die("Bağlantı hatası oluştu.");
}

if (isset($_POST["updateyddiskbtn"])){

$id=$_POST["idyddisk"];
$dolapno = $_POST["dolapno"];
$firma = $_POST["firma"];
$bulyer = $_POST["bulyer"];
$vergino = $_POST["vergino"];
$ilgilikisi = $_POST["ilgilikisi"];
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
date_default_timezone_set('Europe/Istanbul');
$time = date("Y-m-d H:i:s");

if (!!empty($dolapno) || !empty($firma) || !empty($bulyer) || !empty($vergino) || !empty($ilgilikisi) || !empty($soru1) || !empty($soru2) || !empty($soru3) || !empty($soru4) || !empty($soru5) || !empty($soru6) || !empty($soru7) ||
!empty($soru8) || !empty($soru9) || !empty($soru10) || !empty($soru11) || !empty($soru12) || !empty($kontroltar) || !empty($sonrakontroltar) || !empty($bakimsonuc)){

    $updateyddisk=mysqli_query($connect,"UPDATE yddisk SET dolapno='$dolapno', firma='$firma', bulyer='$bulyer', vergino='$vergino', ilgilikisi='$ilgilikisi', soru1='$soru1', soru2='$soru2', soru3='$soru3', soru4='$soru4', soru5='$soru5', soru6='$soru6', soru7='$soru7',
    soru8='$soru8', soru9='$soru9', soru10='$soru10', soru11='$soru11', soru12='$soru12', aciklama='$aciklama', degisimvarsacins='$degisimvarsacins', degisimvarsatar='$degisimvarsatar', kontroltar='$kontroltar',
    sonrakontroltar='$sonrakontroltar', bakimsonuc='$bakimsonuc', tarih='$time' WHERE id='$id'");

    if($connect->query($updateyddisk)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("location:ydk.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
      header("location:ydk.php");
}
}

if (isset($_POST['deleteyddisk'])){

    $id=$_POST["iddeleteyddisk"];
  
    $deleteydick=mysqli_query($connect,"DELETE FROM yddisk WHERE id='$id'");
  
      if($connect->query($deleteyddisk)){
        $info = '<script type="text/javascript">alert("Silme işlemi başarıyla tamamlandı!");</script>';
        header("location:ydk.php");
      }
      else
        $info = '<script type="text/javascript">alert("HATA!!!");</script>';
        header("location:ydk.php");
  }

?>