<?php session_start();?>
<?php include("phptools/yetki-firma.php");?>
<?php include("phptools/editystbk.php");?>

<?php  
$baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
$baglanti->query("SET CHARACTER SET utf8");
$username=$_SESSION["username"];
if ($_SESSION["yetki"]!="admin") {
	$query ="SELECT * FROM ystbk WHERE bakimyapan='$username'";  
	$result = mysqli_query($baglanti, $query);
}
else{
	$query ="SELECT * FROM ystbk ORDER BY ID DESC";  
	$result = mysqli_query($baglanti, $query);
}
$query2 ="SELECT * FROM firma GROUP BY unvan";
$query3 ="SELECT * FROM firma GROUP BY vergino";
$query4 ="SELECT * FROM firma GROUP BY ilgilikisi";  
$result2 = mysqli_query($baglanti, $query2);
$result3 = mysqli_query($baglanti, $query3);
$result4 = mysqli_query($baglanti, $query4);
?> 

<!DOCTYPE html5>

<html lang="tr">

<head>

	<title>Alarm Yangın</title>
	<meta name="viewport" content="width=device-width, initial - scale=1.0">
	<meta charset="UTF-8">

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
			<a href="ystbk.php" class="aktif">YANGIN SÖNDÜRÜCÜLERİ</a>
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
			<li><a href="index.php">ANASAYFA</a></li>
			<li class="aktif"><a href="ystbk.php">YANGIN SÖNDÜRÜCÜLERİ</a></li>
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
				<label class="genel" style="font-weight: bold; text-transform: uppercase;">TÜP BAKIM VE KONTROL</label>
			</div>
			<div class="container">
			<div class="contmenu">
			<a href="" class="isim">YANGIN TÜPLERİ</a><a href="ystbkform.php" class="ekle">EKLE</a> 
			</div>
			<input type="text" name="search" id="search" placeholder="Arama..." class="form-control">
                <div class="table-responsive"> 
                     <table id="formdata" class="table table-striped table-bordered table table-hover results">  
                          <thead>  
                               <tr> 
							   		<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td>   
                                    <td style="font-weight: bold;">SR.</td>  
                                    <td style="font-weight: bold;">TÜP NO</td>  
									<td style="font-weight: bold;">CİNSİ</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">BULUNAN YER</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td>
									<td style="font-weight: bold;">İLGİLİ KİŞİ</td>         
									<td style="font-weight: bold;">İMAL TARİHİ</td>
									<td style="font-weight: bold;">DOLUM TARİHİ</td>
									<td style="font-weight: bold;">TEKRAR DOLUM TARİHİ</td>
									<td style="font-weight: bold;" title="Söndürücü etiket levha veya işaretle gösterilen yerde mi?" data-toggle="tooltip">SORU1</td>
									<td style="font-weight: bold;" title="Söndürücüye ulaşılmasını engelleyen bir durum var mı?" data-toggle="tooltip">SORU2</td>
									<td style="font-weight: bold;" title="Söndürücü tanıtım etiketi öne gelecek şekilde mi?" data-toggle="tooltip">SORU3</td>
									<td style="font-weight: bold;" title="Söndürücü dolap stand veya askılıkta uygun durumda mı?" data-toggle="tooltip">SORU4</td>
									<td style="font-weight: bold;" title="Varsa basınç göstergesi (manometre) kullanılan aralıkta mı?" data-toggle="tooltip">SORU5</td>
									<td style="font-weight: bold;" title="Elle taşınabilen söndürücü (tartıldı mı?) tam dolu mu?" data-toggle="tooltip">SORU6</td>
									<td style="font-weight: bold;" title="Söndürücü hortumunda çatlak veya kırılma var mı?" data-toggle="tooltip">SORU7</td>
									<td style="font-weight: bold;" title="Söndürücüde korozyon, darbe veya hasar var mı?" data-toggle="tooltip">SORU8</td>
									<td style="font-weight: bold;" title="Söndürücünün mühürü takılı mı (kurşun ya da plastik)" data-toggle="tooltip">SORU9</td>
									<td style="font-weight: bold;" title="Söndürücünün dolum ve bakım etiketleri var mı?" data-toggle="tooltip">SORU10</td>
									<td style="font-weight: bold;" >AÇIKLAMA</td>
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
                          while($row = mysqli_fetch_array($result))
                          {  ?> 
							   <tr> 
							   		<td>
									<button class="btn btn-primary editystbkbtn">Edit</button>
									<button class="btn btn-danger deleteystbkbtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td>  
                                    <td><?php echo $row["tupno"];?></td>  
									<td><?php echo $row["cinsi"];?></td>
									<td><?php echo $row["firma"];?></td>
									<td><?php echo $row["bulyer"];?></td>
									<td><?php echo $row["vergino"];?></td>
									<td><?php echo $row["ilgilikisi"];?></td>     
                                    <td><?php echo $row["imaltar"];?></td>  
									<td><?php echo $row["dolumtar"];?></td>
									<td><?php echo $row["tekrardoltar"];?></td> 
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

	<!-- EDITYSTBK POP UP MODAL -->
<form method="POST">
<div class="modal fade" id="editystbkmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">YANGIN TÜPÜ</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="idystbk" id="idystbk">
		  <div class="form-group">
				<label>Tüp No</label>
				<input type="text" class="form-control" id="tupno" name="tupno" required>
			</div>
			<div class="form-group">
				<label>Cinsi</label>
				<input type="text" class="form-control" id="cinsi" name="cinsi" required>
			</div>
			<div class="form-group">
				<label>Firma</label>
				<select class="form-control" id="firma" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($result2)):;?>
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
					<?php while($row2=mysqli_fetch_array($result3)):;?>
					<option><?php echo $row2[9];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İlgili Kişi</label>
				<select class="form-control" id="ilgilikisi" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($result4)):;?>
					<option><?php echo $row3[3];?></option>
					<?php endwhile;?>
				</select>
			</div>
			<div class="form-group">
				<label>İmal Tarihi (YYYY)</label>
				<input type="text" placeholder="YYYY" class="form-control" id="imaltar" name="imaltar" required>
			</div>
			<div class="form-group">
				<label>Dolum Tarihi</label>
				<input type="date" class="form-control" id="dolumtar" name="dolumtar" required>
			</div>
			<div class="form-group">
				<label>Tekrar Dolum Tarihi</label>
				<input type="date" class="form-control" id="tekrardoltar" name="tekrardoltar" required>
			</div>
			<div class="form-group">
				<label>Söndürücü etiket levha veya işaretle gösterilen yerde mi?:</label><br>
				<select class="form-control" id="soru1" name="soru1" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücüye ulaşılmasını engelleyen bir durum var mı?:</label><br>
				<select class="form-control" id="soru2" name="soru2" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücü tanıtım etiketi öne gelecek şekilde mi?:</label><br>
				<select class="form-control" id="soru3" name="soru3" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücü dolap stand veya askılıkta uygun durumda mı?:</label><br>
				<select class="form-control" id="soru4" name="soru4" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Varsa basınç göstergesi (manometre) kullanılan aralıkta mı?:</label><br>
				<select class="form-control" id="soru5" name="soru5" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Elle taşınabilen söndürücü (tartıldı mı?) tam dolu mu?:</label><br>
				<select class="form-control" id="soru6" name="soru6" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücü hortumunda çatlak veya kırılma var mı?:</label><br>
				<select class="form-control" id="soru7" name="soru7" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücüde korozyon, darbe veya hasar var mı?:</label><br>
				<select class="form-control" id="soru8" name="soru8" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücünün mühürü takılı mı (kurşun ya da plastik)?:</label><br>
				<select class="form-control" id="soru9" name="soru9" required>
					<option></option>
					<option style="color: green;">uygun</option>
					<option style="color: red;">uygun değil</option>
					<option style="color: blue;">ilgisiz</option>
				</select>
			</div>
			<div class="form-group">
				<label>Söndürücünün dolum ve bakım etiketleri var mı?:</label><br>
				<select class="form-control" id="soru10" name="soru10" required>
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
				<label>Değişim Varsa Cinsi ve Tarihi</label>
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
		<button type="submit" id="updateystbkbtn" name="updateystbkbtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEYSTBK POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deleteystbkmodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">YANGIN TÜPÜ</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeleteystbk" id="iddeleteystbk">
		  <h5>Yangın tüpünü silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deleteystbk" name="deleteystbk" class="btn btn-primary pull-right">EVET</button>
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
           $('#search').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#formdata tr').each(function(){  
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
		$('.editystbkbtn').on('click', function(){

			$('#editystbkmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#idystbk').val(data[1]);
			$('#tupno').val(data[3]);
			$('#cinsi').val(data[4]);
			$('#firma').val(data[5]);
			$('#bulyer').val(data[6]);
			$('#vergino').val(data[7]);
			$('#ilgilikisi').val(data[8]);
			$('#imaltar').val(data[9]);
			$('#dolumtar').val(data[10]);
			$('#tekrardoltar').val(data[11]);
			$('#soru1').val(data[12]);
			$('#soru2').val(data[13]);
			$('#soru3').val(data[14]);
			$('#soru4').val(data[15]);
			$('#soru5').val(data[16]);
			$('#soru6').val(data[17]);
			$('#soru7').val(data[18]);
			$('#soru8').val(data[19]);
			$('#soru9').val(data[20]);
			$('#soru10').val(data[21]);
			$('#aciklama').val(data[22]);
			$('#degisimvarsacins').val(data[23]);
			$('#degisimvarsatar').val(data[24]);
			$('#kontroltar').val(data[25]);
			$('#sonrakontroltar').val(data[26]);
			$('#bakimsonuc').val(data[27]);
		});
	});

	$(document).ready(function() {
		$('.deleteystbkbtn').on('click', function(){

			$('#deleteystbkmodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeleteystbk').val(data[1]);

		});
	});
</script>


   	<footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>

</html>