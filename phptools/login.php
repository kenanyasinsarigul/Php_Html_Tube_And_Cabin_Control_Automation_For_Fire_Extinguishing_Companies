<?php
error_reporting(0);
session_start();

include("baglanti.php");
$info = "";
$info2 = "";

$connect = new mysqli($servername,$username,$password,$dbname);
$connect->query("SET CHARACTER SET utf8");
if($connect->connect_error){
	die("connection failed: " . $connect->connect_error);
}

	if($_POST){
		$name = $_POST["name"];
		$pass = $_POST["pass"];

			$giris = "select * from users where username='$name' and password='$pass'";
			$giris2 = "select * from firmausers where username='$name' and pass='$pass'";
			$getir = $connect->query($giris);
			$getir2 = $connect->query($giris2);

				if($getir->num_rows>0){
					while ($row = $getir->fetch_assoc()){
						$_SESSION["ID"] = $row["id"];
						$_SESSION["username"] = $row["username"];
						$_SESSION["name"] = $row["name"];
						$_SESSION["surname"] = $row["surname"];
						$_SESSION["yetki"] = $row["yetki"];
						header("refresh:1; url=index.php");
						$info="Giriş yapılıyor...";			
					}
				}

		elseif ($getir2->num_rows>0) {
			while ($row = $getir2->fetch_assoc()){
				$_SESSION["ID"] = $row["id"];
				$_SESSION["username"] = $row["username"];
				$_SESSION["pass"] = $row["pass"];
				$_SESSION["firma"] = $row["firma"];
				$_SESSION["ilgilikisi"] = $row["ilgilikisi"];
				$_SESSION["vergino"] = $row["vergino"];
				$_SESSION["yetki"] = $row["yetki"];
				header("refresh:1; url=index-firma.php");
				$info="Giriş yapılıyor...";			
			}
		}

		else{
			$info2="Hatalı kullanıcı adı veya şifre!"; 
		}
	}

?>