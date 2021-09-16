<?php session_start(); ?>
<?php include("phptools/yetki-firma.php"); ?>
<?php include("phptools/ydickekle.php"); ?>

<?php
 $baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
 $baglanti->query("SET CHARACTER SET utf8");  
 $query ="SELECT * FROM firma GROUP BY unvan";
 $query2 ="SELECT * FROM firma GROUP BY vergino";
 $query3 ="SELECT * FROM firma GROUP BY ilgilikisi";    
 $result = mysqli_query($baglanti, $query);
 $result2 = mysqli_query($baglanti, $query2);
 $result3 = mysqli_query($baglanti, $query3);
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
			<a href="index.php">ANASAYFA</a>
		</div>
		<div class="menuler">
			<a href="ystbk.php">YANGIN SÖNDÜRÜCÜLERİ</a>
		</div>
		<div class="menuler">
			<a href="ydk.php" class="aktif" >YANGIN DOLAPLARI</a>
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
			<li><a href="index.php">ANASAYFA</a></li>
			<li><a href="ystbk.php">YANGIN SÖNDÜRÜCÜLERİ</a></li>
			<li class="aktif"><a href="ydk.php">YANGIN DOLAPLARI</a></li>
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
			<label class="form" style="font-weight: bold; text-transform: uppercase;">İÇ SAHA PERİYODİK KONTROL FORMU</label>
		</div>
		<form class="formekle" method="POST">
			<div class="form-group">
				<label>DOLAP NO:</label>
				<input type="text" class="form-control" name="dolapno" required>
			</div>
			<div class="form-group">
				<label>FİRMA:</label>
				<select class="form-control" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($result)):;?>
					<option><?php echo $row1[1];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>BULUNAN YER:</label>
				<input type="text" class="form-control" name="bulyer" required>
			</div>
			<div class="form-group">
				<label>VERGİ NUMARASI:</label>
				<select class="form-control" name="vergino" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row2=mysqli_fetch_array($result2)):;?>
					<option><?php echo $row2[9];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İLGİLİ KİŞİ:</label>
				<select class="form-control" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($result3)):;?>
					<option><?php echo $row3[3];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı önünde kullanımı zorlaştırıcı bir engel var mı?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru1" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru1" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru1" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı çalıştırma talimatı açılınca okunuyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru2" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru2" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru2" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Makara kolu 180 derece kolayca açılıyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru3" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru3" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru3" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Bağlantı noktalarında sızıntı var mı?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru4" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru4" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru4" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Basınç göstergesi ile kontrol edildiğinde işletme basıncı aralığında çalışıyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru5" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru5" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru5" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Hortum tam boy açıldığında çatlak, çürük, aşınma vs. hasar var mı?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru6" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru6" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru6" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Hortum makarası her iki yöne de kolayca dönüyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru7" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru7" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru7" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Duvara montaj delik yerleri sağlam uygun ve terazide montaj yapılmış mı?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru8" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru8" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru8" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>El ile çalıştırılan makaralarda Yangın vanaları kolay ve düzgün çalışıyor mu, herhangi bir sızıntı var mı?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru9" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru9" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru9" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Sis başlıklarına (lans) Açma-kapatma yapıldığında; kapamadan sonra sızıntı ve damlatma oluyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru10" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru10" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru10" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Yangın Dolabının kapak, gövde, menteşe, kapı kollarında hasar var mı?(Camlı yangın dolaplarında kırık cam var mı?):</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru11" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru11" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru11" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı yerleşim işareti üzerinde uygun görülebilir etiket bulunuyor mu?:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru12" value="uygun" required>
					<label class="form-check-label" style="color: green;">UYGUN</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru12" value="uygun değil" required>
					<label class="form-check-label" style="color:red;">UYGUN DEĞİL</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="soru12" value="ilgisiz" required>
					<label class="form-check-label" style="color: darkblue;">İLGİSİZ</label>
				</div>
			</div>
			<div class="form-group">
				<label>AÇIKLAMA:</label>
				<textarea class="form-control" name="aciklama" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>DEĞİŞEN PARÇA VARSA CİNSİ VE TARİHİ:</label>
				<input type="text" class="form-control" name="degisimvarsacins">
				<input type="date" class="form-control" name="degisimvarsatar">
			</div>
			<div class="form-group">
				<label>KONTROL TARİHİ:</label>
				<input type="date" class="form-control" name="kontroltar" required>
			</div>
			<div class="form-group">
				<label>BİR SONRAKİ KONTROL TARİHİ:</label>
				<input type="text" placeholder="MM.YYYY" class="form-control" name="sonrakontroltar" required>
			</div>
			<div class="form-group">
				<label>BAKIM SONUCU:</label><br>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="bakimsonuc" value="olumlu" required>
					<label class="form-check-label" style="color: green;">OLUMLU</label>
				</div>
				<div class="form-check form-check-inline">
					<input type="radio" class="form-check-input" name="bakimsonuc" value="olumsuz" required>
					<label class="form-check-label" style="color: red;">OLUMSUZ</label>
				</div>
			</div>
				<button type="submit" class="btn btn-primary" name="btnGonder" style="width:100%; height:50px;">KAYDET</button><br></br>
				<?php echo $info ?>
		</form>
	</div>

   <footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

	</div>

</body>
</html>
