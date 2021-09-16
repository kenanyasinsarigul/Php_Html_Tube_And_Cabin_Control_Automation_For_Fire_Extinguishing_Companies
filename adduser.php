<?php session_start();?>
<?php include("phptools/yetki-nonadmin.php");?>
<?php include("phptools/adduser.php");?>

<!DOCTYPE html5>

<html lang="tr">

<head>

	<title>Alarm Yangın</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial - scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/style.css"></link>

	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script src="js/jquery-3.5.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</head>

<body>

	<header>

		<div class="tepe"> <!-- Üst Siyah Bar -->

		<div class="logom"> <!-- Logo Yerleşim -->
			<a href="index.php"><img class="logores" src="images/logo.png"></img></a>
		</div>

		<div class="menuler">
			<a href="index.php" class="aktif">ANASAYFA</a>
		</div>
		<div class="menuler">
			<a href="ystbk.php">YANGIN SÖNDÜRÜCÜLERİ</a>
		</div>
		<div class="menuler">
			<a href="ydk.php" >YANGIN DOLAPLARI</a>
		</div>
		<div class="menuler">
			<a href="phptools/exit.php" class="cikis" >ÇIKIŞ</a>
		</div>
		<div class="menuler">
			<a href="javascript:void(0);" class="mobbut" onclick="mobilemenu()">MENU</a>
		</div>

		</div>

	</header>

	<div class="mobilemenu" id="menuac">
		<ul>
			<li class="aktif"><a href="index.php">ANASAYFA</a></li>
			<li><a href="ystbk.php">YANGIN SÖNDÜRÜCÜLERİ</a></li>
			<li><a href="ydk.php">YANGIN DOLAPLARI</a></li>
			<li class="cikis"><a href="phptools/exit.php">ÇIKIŞ</a></li>
		</ul>
	</div>

	<script type="text/javascript">

	function mobilemenu() {
	var x = document.getElementById("menuac");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
	}
	}

	function altmenu() {
	var x = document.getElementById("altmenuac_1");
	if (x.style.display === "block") {
		x.style.display = "none";
	} else {
		x.style.display = "block";
	}
	var y = document.getElementById("altmenuac_2");
	if (y.style.display === "block") {
		y.style.display = "none";
	} else {
		y.style.display = "block";
	}
	}
	
	</script>

	<div class="merkez">
		<div class="contbas">
			<label class="form" style="font-weight: bold; text-transform: uppercase;">KULLANICI EKLEME FORMU</label>
		</div>
		<form class="formekle" method="POST">
			<div class="form-group">
				<label>KULLANICI ADI:</label>
				<input type="text" class="form-control" name="username" required>
			</div>
			<div class="form-group">
				<label>AD:</label>
				<input type="text" class="form-control" name="name" required>
			</div>
			<div class="form-group">
				<label>SOYAD:</label>
				<input type="text" class="form-control" name="surname" required>
			</div>
			<div class="form-group">
				<label>MAİL ADRESİ:</label>
				<input type="email" class="form-control" name="mail" required>
			</div>
			<div class="form-group">
				<label>ŞİFRE:</label>
				<input type="password" class="form-control" name="pass" required>
			</div>
			<div class="form-group">
				<label>YETKİ:&nbsp;&nbsp;</label>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="yetki" value="admin" required>
					<label class="form-check-label" style="color: red;">ADMİN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="yetki" value="çalışan" required>
					<label class="form-check-label" style="color: blue;">ÇALIŞAN</label>
				</div>
			</div>
				<button type="submit" class="btn btn-primary" name="btnGonder" style="width:100%; height:50px;">KAYDET</button><br></br>
				<?php echo $info ?>
		</form>
	</div>
   <footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>






</html>
