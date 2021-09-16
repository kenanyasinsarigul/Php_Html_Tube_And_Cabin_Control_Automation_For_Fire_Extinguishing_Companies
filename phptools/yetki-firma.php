<?php 
include("phptools/session.php");
if (isset($_SESSION["yetki"]) && $_SESSION["yetki"]=="firma") {
	header("location:index-firma.php");
	die();
}
?>