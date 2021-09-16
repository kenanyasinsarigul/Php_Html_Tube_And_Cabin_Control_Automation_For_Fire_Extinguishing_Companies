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
$name = $_POST["name"];
$surname = $_POST["surname"];
$mail = $_POST["mail"];
$pass = $_POST["pass"];
$yetki = $_POST["yetki"];

if (!empty($username) || !empty($name) || !empty($surname) || !empty($mail) || !empty($pass) || !empty($yetki)){

  $ekle = "insert into users(username,name,surname,mail,password,yetki) values('$username','$name','$surname','$mail','$pass','$yetki')";

    if($connect->query($ekle)){
      $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
      header("refresh:0; url=index.php");
    }
    else
      $info = '<script type="text/javascript">alert("HATA!!!");</script>';
}
}

?>