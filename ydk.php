<?php session_start();?>
<?php include("phptools/yetki-firma.php");?>
<?php include("phptools/editydick.php");?>
<?php include("phptools/edityddisk.php");?>

<?php  
 $baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
 $baglanti->query("SET CHARACTER SET utf8");
 $username=$_SESSION["username"];
 if ($_SESSION["yetki"]!="admin") {
	$query1 ="SELECT * FROM ydick WHERE bakimyapan='$username'";
	$result1 = mysqli_query($baglanti, $query1);
	$query2 ="SELECT * FROM yddisk WHERE bakimyapan='$username'";  
	$result2 = mysqli_query($baglanti, $query2);
 }
else{
	$query1 ="SELECT * FROM ydick ORDER BY ID DESC";
	$result1 = mysqli_query($baglanti, $query1);
	$query2 ="SELECT * FROM yddisk ORDER BY ID DESC";  
	$result2 = mysqli_query($baglanti, $query2);
}
$queryA ="SELECT * FROM firma GROUP BY unvan";
$queryB ="SELECT * FROM firma GROUP BY vergino";
$queryC ="SELECT * FROM firma GROUP BY ilgilikisi";  
$resultA = mysqli_query($baglanti, $queryA);
$resultB = mysqli_query($baglanti, $queryB);
$resultC = mysqli_query($baglanti, $queryC);
$queryA_2 ="SELECT * FROM firma GROUP BY unvan";
$queryB_2 ="SELECT * FROM firma GROUP BY vergino";
$queryC_2 ="SELECT * FROM firma GROUP BY ilgilikisi";  
$resultA_2 = mysqli_query($baglanti, $queryA_2);
$resultB_2 = mysqli_query($baglanti, $queryB_2);
$resultC_2 = mysqli_query($baglanti, $queryC_2);
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

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css">
	<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>

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
			<a href="ydk.php" class="aktif">YANGIN DOLAPLARI</a>
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

	<div class="merkez_ydk">

			<div class="contbas">
				<label class="genel" style="font-weight: bold; text-transform: uppercase;">DOLAP BAKIM VE KONTROL</label>
			</div>

			<div class="container">
			<div class="contmenu">
			<a href="" class="isim">İÇ SAHA DOLAPLARI</a><a href="ydickform.php" class="ekle">EKLE</a>
			</div>
			<input type="text" name="searchone" id="searchone" placeholder="Arama..." class="form-control">
                <div class="table-responsive">
                     <table id="formdataone" class="table table-striped table-bordered table table-hover results">  
                          <thead>  
                               <tr> 
							   		<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td>   
                                    <td style="font-weight: bold;">SR.</td>  
									<td style="font-weight: bold;">DOLAP NO</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">BULUNAN YER</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td>
									<td style="font-weight: bold;">İLGLİLİ KİŞİ</td>       
									<td style="font-weight: bold;" title="Yangın Dolabı önünde kullanımı zorlaştırıcı bir engel var mı?" data-toggle="tooltip">SORU1</td>
									<td style="font-weight: bold;" title="Yangın Dolabı çalıştırma talimatı açılınca okunuyor mu?" data-toggle="tooltip">SORU2</td>
									<td style="font-weight: bold;" title="Makara kolu 180 derece kolayca açılıyor mu?" data-toggle="tooltip">SORU3</td>
									<td style="font-weight: bold;" title="Bağlantı noktalarında sızıntı var mı?" data-toggle="tooltip">SORU4</td>
									<td style="font-weight: bold;" title="Basınç göstergesi ile kontrol edildiğinde işletme basıncı aralığında çalışıyor mu?" data-toggle="tooltip">SORU5</td>
									<td style="font-weight: bold;" title="Hortum tam boy açıldığında çatlak, çürük, aşınma vs. hasar var mı?" data-toggle="tooltip">SORU6</td>
									<td style="font-weight: bold;" title="Hortum makarası her iki yöne de kolayca dönüyor mu?" data-toggle="tooltip">SORU7</td>
									<td style="font-weight: bold;" title="Duvara montaj delik yerleri sağlam uygun ve terazide montaj yapılmış mı?" data-toggle="tooltip">SORU8</td>
									<td style="font-weight: bold;" title="El ile çalıştırılan makaralarda Yangın vanaları kolay ve düzgün çalışıyor mu, herhangi bir sızıntı var mı?" data-toggle="tooltip">SORU9</td>
									<td style="font-weight: bold;" title="Sis başlıklarına (lans) Açma-kapatma yapıldığında; kapamadan sonra sızıntı ve damlatma oluyor mu?" data-toggle="tooltip">SORU10</td>
									<td style="font-weight: bold;" title="Yangın Dolabının kapak, gövde, menteşe, kapı kollarında hasar var mı?(Camlı yangın dolaplarında kırık cam var mı?)" data-toggle="tooltip">SORU11</td>
									<td style="font-weight: bold;" title="Yangın Dolabı yerleşim işareti üzerinde uygun görülebilir etiket bulunuyor mu?" data-toggle="tooltip">SORU12</td>
									<td style="font-weight: bold;">AÇIKLAMA</td>
									<td style="font-weight: bold;">DEĞİŞİM VARSA CİNSİ</td>
									<td style="font-weight: bold;">DEĞİŞİM VARSA TARİHİ</td>
									<td style="font-weight: bold;">KONTROL TARİHİ</td>
									<td style="font-weight: bold;">SONRAKİ KONTROL TARİHİ</td>
									<td style="font-weight: bold;">BAKIM SONUCU</td>
									<td style="font-weight: bold;">BAKIM YAPAN</td>
									<td style="font-weight: bold;">TARİH</td>

                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result1))  
                          {  ?>  
							   <tr> 
							   		<td>
									<button class="btn btn-primary editydickbtn">Edit</button>
									<button class="btn btn-danger deleteydickbtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td>  
									<td><?php echo $row["dolapno"];?></td>
									<td><?php echo $row["firma"];?></td>
									<td><?php echo $row["bulyer"];?></td> 
									<td><?php echo $row["vergino"];?></td>
									<td><?php echo $row["ilgilikisi"];?></td>     
									<td><?php echo $row["soru1"];?></td>
									<td><?php echo $row["soru2"];?></td> 
									<td><?php echo $row["soru3"];?></td> 
									<td><?php echo $row["soru4"];?></td> 
									<td><?php echo $row["soru5"];?></td> 
									<td><?php echo $row["soru6"];?></td> 
									<td><?php echo $row["soru7"];?></td> 
									<td><?php echo $row["soru8"];?></td> 
									<td><?php echo $row["soru9"];?></td> 
									<td><?php echo $row["soru10"];?></td>
									<td><?php echo $row["soru11"];?></td> 
									<td><?php echo $row["soru12"];?></td>  
									<td><?php echo $row["aciklama"];?></td>
									<td><?php echo $row["degisimvarsacins"];?></td>
									<td><?php echo $row["degisimvarsatar"];?></td>
									<td><?php echo $row["kontroltar"];?></td>
									<td><?php echo $row["sonrakontroltar"];?></td>
									<td><?php echo $row["bakimsonuc"];?></td>
									<td><?php echo $row["bakimyapan"];?></td> 
									<td><?php echo $row["tarih"];?></td>         
                               </tr>   
                         <?php $sr++;}  
                          ?>  
                     </table>  
                </div>  
		   </div>
		   <br>
		   <br>	   
		   <div class="container">
		   <div class="contmenu">
		   <a href="" class="isim">DIŞ SAHA DOLAPLARI</a><a href="yddiskform.php" class="ekle">EKLE</a>
			</div>
			<input type="text" name="searchtwo" id="searchtwo" placeholder="Arama..." class="form-control">
                <div class="table-responsive">
                     <table id="formdatatwo" class="table table-striped table-bordered results2">  
                          <thead>  
                               <tr>  
							   		<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td>   
                                    <td style="font-weight: bold;">SR.</td>  
									<td style="font-weight: bold;">DOLAP NO</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">BULUNAN YER</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td> 
									<td style="font-weight: bold;">İLGLİLİ KİŞİ</td>  
									<td style="font-weight: bold;" title="Yangın Dolabı önünde kullanımı zorlaştırıcı bir engel var mı?" data-toggle="tooltip">SORU1</td>
									<td style="font-weight: bold;" title="Yangın Dolabı çalıştırma talimatı açılınca okunuyor mu?" data-toggle="tooltip">SORU2</td>
									<td style="font-weight: bold;" title="Makara kolu 180 derece kolayca açılıyor mu?" data-toggle="tooltip">SORU3</td>
									<td style="font-weight: bold;" title="Bağlantı noktalarında sızıntı var mı?" data-toggle="tooltip">SORU4</td>
									<td style="font-weight: bold;" title="Basınç göstergesi ile kontrol edildiğinde işletme basıncı aralığında çalışıyor mu?" data-toggle="tooltip">SORU5</td>
									<td style="font-weight: bold;" title="Hortum tam boy açıldığında çatlak, çürük, aşınma vs. hasar var mı?" data-toggle="tooltip">SORU6</td>
									<td style="font-weight: bold;" title="Hortum makarası her iki yöne de kolayca dönüyor mu?" data-toggle="tooltip">SORU7</td>
									<td style="font-weight: bold;" title="Montaj delik yerleri sağlam uygun ve terazide montaj yapılmış mı?" data-toggle="tooltip">SORU8</td>
									<td style="font-weight: bold;" title="Sis başlıklarına (lans) Açma-kapatma yapıldığında; kapamadan sonra sızıntı ve damlatma oluyor mu?" data-toggle="tooltip">SORU9</td>
									<td style="font-weight: bold;" title="Yangın Dolabının kapak, gövde, menteşe, kapı kollarında hasar var mı?" data-toggle="tooltip">SORU10</td>
									<td style="font-weight: bold;" title="Hidrant anahtarı ve bez hortum rekorları var mı?" data-toggle="tooltip">SORU11</td>
									<td style="font-weight: bold;" title="Yangın Dolabı yerleşim işareti üzerinde uygun görülebilir etiket bulunuyor mu?" data-toggle="tooltip">SORU12</td>
									<td style="font-weight: bold;">AÇIKLAMA</td>
									<td style="font-weight: bold;">DEĞİŞİM VARSA CİNSİ</td>
									<td style="font-weight: bold;">DEĞİŞİM VARSA TARİHİ</td>
									<td style="font-weight: bold;">KONTROL TARİHİ</td>
									<td style="font-weight: bold;">SONRAKİ KONTROL TARİHİ</td>
									<td style="font-weight: bold;">BAKIM SONUCU</td>
									<td style="font-weight: bold;">BAKIM YAPAN</td>
									<td style="font-weight: bold;">TARİH</td>

                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result2))  
                          {  ?>
							   <tr>
							   		<td>
									<button class="btn btn-primary edityddiskbtn">Edit</button>
									<button class="btn btn-danger deleteyddiskbtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td>  
									<td><?php echo $row["dolapno"];?></td>
									<td><?php echo $row["firma"];?></td>
									<td><?php echo $row["bulyer"];?></td>
									<td><?php echo $row["vergino"];?></td>
									<td><?php echo $row["ilgilikisi"];?></td>      
									<td><?php echo $row["soru1"];?></td>
									<td><?php echo $row["soru2"];?></td> 
									<td><?php echo $row["soru3"];?></td> 
									<td><?php echo $row["soru4"];?></td> 
									<td><?php echo $row["soru5"];?></td> 
									<td><?php echo $row["soru6"];?></td> 
									<td><?php echo $row["soru7"];?></td> 
									<td><?php echo $row["soru8"];?></td> 
									<td><?php echo $row["soru9"];?></td> 
									<td><?php echo $row["soru10"];?></td>
									<td><?php echo $row["soru11"];?></td> 
									<td><?php echo $row["soru12"];?></td>  
									<td><?php echo $row["aciklama"];?></td>
									<td><?php echo $row["degisimvarsacins"];?></td>
									<td><?php echo $row["degisimvarsatar"];?></td>
									<td><?php echo $row["kontroltar"];?></td>
									<td><?php echo $row["sonrakontroltar"];?></td>
									<td><?php echo $row["bakimsonuc"];?></td>
									<td><?php echo $row["bakimyapan"];?></td> 
									<td><?php echo $row["tarih"];?></td>         
                               </tr>   
                          <?php $sr++;}  
                          ?>  
                     </table>  
                </div>  
           </div> 

	</div>

		<!-- EDITYDICK POP UP MODAL -->
<form method="POST">
<div class="modal fade" id="editydickmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">İÇ SAHA DOLABI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="idydick" id="idydick">
		  <div class="form-group">
				<label>Dolap No</label>
				<input type="text" class="form-control" id="dolapno" name="dolapno" required>
			</div>
			<div class="form-group">
				<label>Firma</label>
				<select class="form-control" id="firma" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($resultA)):;?>
					<option><?php echo $row1[1];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>Bulunan Yer</label>
				<input type="text" class="form-control" id="bulyer" name="bulyer" required>
			</div>
			<div class="form-group">
				<label>Vergi Numarası</label>
				<select class="form-control" id="vergino" name="vergino" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row2=mysqli_fetch_array($resultB)):;?>
					<option><?php echo $row2[9];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İlgili Kişi</label>
				<select class="form-control" id="ilgilikisi" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($resultC)):;?>
					<option><?php echo $row3[3];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı önünde kullanımı zorlaştırıcı bir engel var mı?</label><br>
				<select class="form-control" id="soru1" name="soru1" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı çalıştırma talimatı açılınca okunuyor mu?</label><br>
				<select class="form-control" id="soru2" name="soru2" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Makara kolu 180 derece kolayca açılıyor mu?</label><br>
				<select class="form-control" id="soru3" name="soru3" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Bağlantı noktalarında sızıntı var mı?</label><br>
				<select class="form-control" id="soru4" name="soru4" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Basınç göstergesi ile kontrol edildiğinde işletme basıncı aralığında çalışıyor mu?</label><br>
				<select class="form-control" id="soru5" name="soru5" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Hortum tam boy açıldığında çatlak, çürük, aşınma vs. hasar var mı?</label><br>
				<select class="form-control" id="soru6" name="soru6" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Hortum makarası her iki yöne de kolayca dönüyor mu?</label><br>
				<select class="form-control" id="soru7" name="soru7" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Duvara montaj delik yerleri sağlam uygun ve terazide montaj yapılmış mı?</label><br>
				<select class="form-control" id="soru8" name="soru8" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>El ile çalıştırılan makaralarda Yangın vanaları kolay ve düzgün çalışıyor mu, herhangi bir sızıntı var mı?</label><br>
				<select class="form-control" id="soru9" name="soru9" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Sis başlıklarına (lans) Açma-kapatma yapıldığında; kapamadan sonra sızıntı ve damlatma oluyor mu?</label><br>
				<select class="form-control" id="soru10" name="soru10" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabının kapak, gövde, menteşe, kapı kollarında hasar var mı?(Camlı yangın dolaplarında kırık cam var mı?)</label><br>
				<select class="form-control" id="soru11" name="soru11" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı yerleşim işareti üzerinde uygun görülebilir etiket bulunuyor mu?</label><br>
				<select class="form-control" id="soru12" name="soru12" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Açıklama</label>
				<textarea class="form-control" id="aciklama" name="aciklama" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Değişen Parça Varsa Cinsi ve Tarihi</label>
				<input type="text" class="form-control" id="degisimvarsacins" name="degisimvarsacins">
				<input type="date" class="form-control" id="degisimvarsatar" name="degisimvarsatar">
			</div>
			<div class="form-group">
				<label>Kontrol Tarihi</label>
				<input type="date" class="form-control" id="kontroltar" name="kontroltar" required>
			</div>
			<div class="form-group">
				<label>Bir Sonraki Kontrol Tarihi (MM.YYYY)</label>
				<input type="text" placeholder="MM.YYYY" class="form-control" id="sonrakontroltar" name="sonrakontroltar" required>
			</div>
			<div class="form-group">
				<label>Bakım Sonucu</label>
				<select class="form-control" id="bakimsonuc" name="bakimsonuc" required>
					<option></option>
					<option style="color: green;">olumlu</option>
					<option style="color: red;">olumsuz</option>
				</select>
			</div>
      </div>
      <div class="modal-footer">
		<button type="submit" id="updateydickbtn" name="updateydickbtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEYDICK POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deleteydickmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">İÇ SAHA DOLABI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeleteydick" id="iddeleteydick">
		  <h5>İç saha dolabını silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deleteydick" name="deleteydick" class="btn btn-primary pull-right">EVET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">HAYIR</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- EDITYDDISK POP UP MODAL -->
<form method="POST">
<div class="modal fade" id="edityddiskmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">DIŞ SAHA DOLABI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="idyddisk" id="idyddisk">
		  <div class="form-group">
				<label>Dolap No</label>
				<input type="text" class="form-control" id="dolapno_2" name="dolapno" required>
			</div>
			<div class="form-group">
				<label>Firma</label>
				<select class="form-control" id="firma_2" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($resultA_2)):;?>
					<option><?php echo $row1[1];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>Bulunan Yer</label>
				<input type="text" class="form-control" id="bulyer_2" name="bulyer" required>
			</div>
			<div class="form-group">
				<label>Vergi Numarası</label>
				<select class="form-control" id="vergino_2" name="vergino" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row2=mysqli_fetch_array($resultB_2)):;?>
					<option><?php echo $row2[9];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İlgili Kişi</label>
				<select class="form-control" id="ilgilikisi_2" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($resultC_2)):;?>
					<option><?php echo $row3[3];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı önünde kullanımı zorlaştırıcı bir engel var mı?</label><br>
				<select class="form-control" id="soru1_2" name="soru1" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı çalıştırma talimatı açılınca okunuyor mu?</label><br>
				<select class="form-control" id="soru2_2" name="soru2" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Makara kolu 180 derece kolayca açılıyor mu?</label><br>
				<select class="form-control" id="soru3_2" name="soru3" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Bağlantı noktalarında sızıntı var mı?</label><br>
				<select class="form-control" id="soru4_2" name="soru4" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Basınç göstergesi ile kontrol edildiğinde işletme basıncı aralığında çalışıyor mu?</label><br>
				<select class="form-control" id="soru5_2" name="soru5" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Hortum tam boy açıldığında çatlak, çürük, aşınma vs. hasar var mı?</label><br>
				<select class="form-control" id="soru6_2" name="soru6" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Hortum makarası her iki yöne de kolayca dönüyor mu?</label><br>
				<select class="form-control" id="soru7_2" name="soru7" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Montaj delik yerleri sağlam uygun ve terazide montaj yapılmış mı?</label><br>
				<select class="form-control" id="soru8_2" name="soru8" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Sis başlıklarına (lans) Açma-kapatma yapıldığında; kapamadan sonra sızıntı ve damlatma oluyor mu?</label><br>
				<select class="form-control" id="soru9_2" name="soru9" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabının kapak, gövde, menteşe, kapı kollarında hasar var mı?</label><br>
				<select class="form-control" id="soru10_2" name="soru10" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Hidrant anahtarı ve bez hortum rekorları var mı?</label><br>
				<select class="form-control" id="soru11_2" name="soru11" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Yangın Dolabı yerleşim işareti üzerinde uygun görülebilir etiket bulunuyor mu?</label><br>
				<select class="form-control" id="soru12_2" name="soru12" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Açıklama</label>
				<textarea class="form-control" id="aciklama_2" name="aciklama" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Değişen Parça Varsa Cinsi ve Tarihi</label>
				<input type="text" class="form-control" id="degisimvarsacins_2" name="degisimvarsacins">
				<input type="date" class="form-control" id="degisimvarsatar_2" name="degisimvarsatar">
			</div>
			<div class="form-group">
				<label>Kontrol Tarihi</label>
				<input type="date" class="form-control" id="kontroltar_2" name="kontroltar" required>
			</div>
			<div class="form-group">
				<label>Bir Sonraki Kontrol Tarihi (MM.YYYY):</label>
				<input type="text" placeholder="MM.YYYY" class="form-control" id="sonrakontroltar_2" name="sonrakontroltar" required>
			</div>
			<div class="form-group">
				<label>Bakım Sonucu</label>
				<select class="form-control" id="bakimsonuc_2" name="bakimsonuc" required>
					<option></option>
					<option style="color: green;">olumlu</option>
					<option style="color: red;">olumsuz</option>
				</select>
			</div>
      </div>
      <div class="modal-footer">
		<button type="submit" id="updateyddiskbtn" name="updateyddiskbtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEYDISK POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deleteyddiskmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">DIŞ SAHA DOLABI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeleteyddisk" id="iddeleteyddisk">
		  <h5>Dış saha dolabını silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deleteyddisk" name="deleteyddisk" class="btn btn-primary pull-right">EVET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">HAYIR</button>
	  </div>
    </div>
  </div>
</div>
</form>

	<script type="text/javascript">
		$(document).ready(function(){
			$('[data-toggle="tooltip"]').tooltip();
		});
	</script>

	<script>  
      $(document).ready(function(){  
           $('#searchone').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#formdataone tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
	 </script> 
	 
	 <script>  
      $(document).ready(function(){  
           $('#searchtwo').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#formdatatwo tr').each(function(){  
                     var found = 'false';  
                     $(this).each(function(){  
                          if($(this).text().toLowerCase().indexOf(value.toLowerCase()) >= 0)  
                          {  
                               found = 'true';  
                          }  
                     });  
                     if(found == 'true')  
                     {  
                          $(this).show();  
                     }  
                     else  
                     {  
                          $(this).hide();  
                     }  
                });  
           }  
      });  
	 </script>
	 
	 <script>
	$(document).ready(function() {
		$('.editydickbtn').on('click', function(){

			$('#editydickmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#idydick').val(data[1]);
			$('#dolapno').val(data[3]);
			$('#firma').val(data[4]);
			$('#bulyer').val(data[5]);
			$('#vergino').val(data[6]);
			$('#ilgilikisi').val(data[7]);
			$('#soru1').val(data[8]);
			$('#soru2').val(data[9]);
			$('#soru3').val(data[10]);
			$('#soru4').val(data[11]);
			$('#soru5').val(data[12]);
			$('#soru6').val(data[13]);
			$('#soru7').val(data[14]);
			$('#soru8').val(data[15]);
			$('#soru9').val(data[16]);
			$('#soru10').val(data[17]);
			$('#soru11').val(data[18]);
			$('#soru12').val(data[19]);
			$('#aciklama').val(data[20]);
			$('#degisimvarsacins').val(data[21]);
			$('#degisimvarsatar').val(data[22]);
			$('#kontroltar').val(data[23]);
			$('#sonrakontroltar').val(data[24]);
			$('#bakimsonuc').val(data[25]);
		});
	});

	$(document).ready(function() {
		$('.deleteydickbtn').on('click', function(){

			$('#deleteydickmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeleteydick').val(data[1]);

		});
	});

	$(document).ready(function() {
		$('.edityddiskbtn').on('click', function(){

			$('#edityddiskmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#idyddisk').val(data[1]);
			$('#dolapno_2').val(data[3]);
			$('#firma_2').val(data[4]);
			$('#bulyer_2').val(data[5]);
			$('#vergino_2').val(data[6]);
			$('#ilgilikisi_2').val(data[7]);
			$('#soru1_2').val(data[8]);
			$('#soru2_2').val(data[9]);
			$('#soru3_2').val(data[10]);
			$('#soru4_2').val(data[11]);
			$('#soru5_2').val(data[12]);
			$('#soru6_2').val(data[13]);
			$('#soru7_2').val(data[14]);
			$('#soru8_2').val(data[15]);
			$('#soru9_2').val(data[16]);
			$('#soru10_2').val(data[17]);
			$('#soru11_2').val(data[18]);
			$('#soru12_2').val(data[19]);
			$('#aciklama_2').val(data[20]);
			$('#degisimvarsacins_2').val(data[21]);
			$('#degisimvarsatar_2').val(data[22]);
			$('#kontroltar_2').val(data[23]);
			$('#sonrakontroltar_2').val(data[24]);
			$('#bakimsonuc_2').val(data[25]);
		});
	});

	$(document).ready(function() {
		$('.deleteyddiskbtn').on('click', function(){

			$('#deleteyddiskmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeleteyddisk').val(data[1]);

		});
	});
</script>

   	<footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>

</html>
