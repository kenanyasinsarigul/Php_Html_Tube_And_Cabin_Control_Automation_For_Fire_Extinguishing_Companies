<?php
session_start();
unset($_SESSION["ID"]);
header("location:../giris.php");
?>