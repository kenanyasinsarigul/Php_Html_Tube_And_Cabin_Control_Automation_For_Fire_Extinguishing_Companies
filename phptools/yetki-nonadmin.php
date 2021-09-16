<?php 
include("phptools/session.php");
if (isset($_SESSION["yetki"]) && $_SESSION["yetki"]!="admin") {
	header("location:index.php");
	die();
}
?>