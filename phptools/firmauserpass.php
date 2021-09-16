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
$checkpass = $_POST["checkpass"];
$oldpass = $_POST["oldpass"];
$newpass = $_POST["newpass"];
$pass = $_POST["pass"];

if (!empty($oldpass) || !empty($newpass) || !empty($pass)) {


    if ($oldpass == $checkpass) {

        if ($newpass == $pass) {

            $updateuser=mysqli_query($connect,"UPDATE firmausers SET pass='$pass' WHERE id='$id'");

            if($connect->query($updateuser)){
              $info = '<script type="text/javascript">alert("Kayıt başarıyla tamamlandı!");</script>';
              header("location:index-firma.php");
            }
            else
              $info = '<script type="text/javascript">alert("HATA!!!");</script>';
              header("location:index-firma.php");
        }
        else{
            $info = '<script type="text/javascript">alert("Şifreler Uyuşmadı!");</script>';
        }
    }
    else{
        $info = '<script type="text/javascript">alert("Eski Şifre Hatalı!");</script>';
    }
}
}
?>