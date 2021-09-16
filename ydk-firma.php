<?php session_start();?>
<?php include("phptools/yetki-nonfirma.php");?>

<?php  
 $baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
 $baglanti->query("SET CHARACTER SET utf8");
 $ilgilikisi=$_SESSION["ilgilikisi"];
 $query1 ="SELECT * FROM ydick WHERE ilgilikisi='$ilgilikisi' ORDER BY ID DESC";
 $result1 = mysqli_query($baglanti, $query1);
 $query2 ="SELECT * FROM yddisk WHERE ilgilikisi='$ilgilikisi' ORDER BY ID DESC";
 $result2 = mysqli_query($baglanti, $query2);
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
			<a href="index-firma.php"><img class="logores" src="images/logo.png"></img></a>
		</div>

		<div class="menuler">
			<a href="index-firma.php">ANASAYFA</a>
		</div>
		<div class="menuler">
			<a href="ystbk-firma.php">YANGIN SÖNDÜRÜCÜLERİ</a>
		</div>
		<div class="menuler">
			<a href="ydk-firma.php" class="aktif">YANGIN DOLAPLARI</a>
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
			<li><a href="index-firma.php">ANASAYFA</a></li>
			<li><a href="ystbk-firma.php">YANGIN SÖNDÜRÜCÜLERİ</a></li>
			<li class="aktif"><a href="ydk-firma.php">YANGIN DOLAPLARI</a></li>
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
			<a href="" class="isim">İÇ SAHA DOLAPLARI</a>
			</div>
			<input type="text" name="searchone" id="searchone" placeholder="Arama..." class="form-control">
                <div class="table-responsive">
                     <table id="formdataone" class="table table-striped table-bordered table table-hover">  
                          <thead>  
                               <tr>  
                                    <td style="font-weight: bold;">SR.</td>  
									<td style="font-weight: bold;">DOLAP NO</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">BULUNAN YER</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td>
									<td style="font-weight: bold;">İLGİLİ KİŞİ</td>   
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
									<td style="font-weight: bold;">BAKIM SONUCU</td>
									<td style="font-weight: bold;">BAKIM YAPAN</td>
									<td style="font-weight: bold;">TARİH</td>

                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result1))  
                          {  
                               echo '  
							   <tr> 
							   		<td>'.$sr.'</td>  
									<td>'.$row["dolapno"].'</td>
									<td>'.$row["firma"].'</td>
									<td>'.$row["bulyer"].'</td>  
									<td>'.$row["vergino"].'</td>
									<td>'.$row["ilgilikisi"].'</td>     
									<td>'.$row["soru1"].'</td>
									<td>'.$row["soru2"].'</td> 
									<td>'.$row["soru3"].'</td> 
									<td>'.$row["soru4"].'</td> 
									<td>'.$row["soru5"].'</td> 
									<td>'.$row["soru6"].'</td> 
									<td>'.$row["soru7"].'</td> 
									<td>'.$row["soru8"].'</td> 
									<td>'.$row["soru9"].'</td> 
									<td>'.$row["soru10"].'</td>
									<td>'.$row["soru11"].'</td> 
									<td>'.$row["soru12"].'</td>  
									<td>'.$row["aciklama"].'</td>
									<td>'.$row["degisimvarsacins"].'</td>
									<td>'.$row["degisimvarsatar"].'</td>
									<td>'.$row["kontroltar"].'</td>
									<td>'.$row["bakimsonuc"].'</td>
									<td>'.$row["bakimyapan"].'</td> 
									<td>'.$row["tarih"].'</td>         
                               </tr>  
                               ';  
                          $sr++;}  
                          ?>  
                     </table>  
                </div>  
		   </div>
		   <br>
		   <br>	   
		   <div class="container">
		   <div class="contmenu">
		   <a href="" class="isim">DIŞ SAHA DOLAPLARI</a>
			</div>
			<input type="text" name="searchtwo" id="searchtwo" placeholder="Arama..." class="form-control">
                <div class="table-responsive">
                     <table id="formdatatwo" class="table table-striped table-bordered">  
                          <thead>  
                               <tr>  
                                    <td style="font-weight: bold;">SR.</td>  
									<td style="font-weight: bold;">DOLAP NO</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">BULUNAN YER</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td>
									<td style="font-weight: bold;">İLGİLİ KİŞİ</td>   
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
									<td style="font-weight: bold;">BAKIM SONUCU</td>
									<td style="font-weight: bold;">BAKIM YAPAN</td>
									<td style="font-weight: bold;">TARİH</td>

                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result2))  
                          {  
                               echo '  
							   <tr> 
							   		<td>'.$sr.'</td>  
									<td>'.$row["dolapno"].'</td>
									<td>'.$row["firma"].'</td>
									<td>'.$row["bulyer"].'</td> 
									<td>'.$row["vergino"].'</td>
									<td>'.$row["ilgilikisi"].'</td>    
									<td>'.$row["soru1"].'</td>
									<td>'.$row["soru2"].'</td> 
									<td>'.$row["soru3"].'</td> 
									<td>'.$row["soru4"].'</td> 
									<td>'.$row["soru5"].'</td> 
									<td>'.$row["soru6"].'</td> 
									<td>'.$row["soru7"].'</td> 
									<td>'.$row["soru8"].'</td> 
									<td>'.$row["soru9"].'</td> 
									<td>'.$row["soru10"].'</td>
									<td>'.$row["soru11"].'</td> 
									<td>'.$row["soru12"].'</td>  
									<td>'.$row["aciklama"].'</td>
									<td>'.$row["degisimvarsacins"].'</td>
									<td>'.$row["degisimvarsatar"].'</td>
									<td>'.$row["kontroltar"].'</td>
									<td>'.$row["bakimsonuc"].'</td>
									<td>'.$row["bakimyapan"].'</td> 
									<td>'.$row["tarih"].'</td>         
                               </tr>  
                               ';  
                          $sr++;}  
                          ?>  
                     </table>  
                </div>  
           </div> 

	</div>

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

   	<footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>

</html>
