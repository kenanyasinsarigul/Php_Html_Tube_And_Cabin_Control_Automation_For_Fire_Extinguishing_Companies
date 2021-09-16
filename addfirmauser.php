<?php session_start();?>
<?php include("phptools/yetki-firma.php"); ?>
<?php include("phptools/addfirmauser.php");?>

<?php
 $baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
 $baglanti->query("SET CHARACTER SET utf8");  
 $query ="SELECT * FROM firma";  
 $result1 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY mail");
 $result2 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY ilgilikisi");
 $result3 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY unvan");
 $result4 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY vergino");
 ?> 

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
			<label class="form" style="font-weight: bold; text-transform: uppercase;">FİRMA KULLANICISI EKLEME FORMU</label>
		</div>
		<form class="formekle" method="POST">
			<div class="form-group">
				<label>KULLANICI ADI:</label>
				<select class="form-control" name="username" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($result1)):;?>
					<option><?php echo $row1[6];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İLGİLİ KİŞİ:</label>
				<select class="form-control" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row2=mysqli_fetch_array($result2)):;?>
					<option><?php echo $row2[3];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>FİRMA:</label>
				<select class="form-control" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($result3)):;?>
					<option><?php echo $row3[1];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>VERGİ NUMARASI:</label>
				<select class="form-control" name="vergino" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row4=mysqli_fetch_array($result4)):;?>
					<option><?php echo $row4[9];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>ŞİFRE:</label>
				<label name="pass">alarm.kontrol</label>
			</div>
			<div class="form-group">
				<label>YETKİ:</label>
				<label name="yetki" style="color:purple;">firma</label>
			</div>
				<button type="submit" class="btn btn-primary" name="btnGonder" style="width:100%; height:50px;">KAYDET</button><br></br>
				<?php echo $info ?>
		</form>
	</div>
   <footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>






</html>
