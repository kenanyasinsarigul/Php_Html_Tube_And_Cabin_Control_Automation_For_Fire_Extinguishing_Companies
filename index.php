<?php session_start();?>
<?php include("phptools/yetki-firma.php");?>
<?php include("phptools/editfirmauser.php");?>
<?php include("phptools/editfirma.php");?>
<?php include("phptools/edituser.php");?>

<?php
$baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
$baglanti->query("SET CHARACTER SET utf8");

$query ="SELECT * FROM users";  
$result = mysqli_query($baglanti, $query);

$query2 ="SELECT * FROM firma ORDER BY ID DESC";  
$result2 = mysqli_query($baglanti, $query2);
$result2_1 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY mail");
$result2_2 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY ilgilikisi");
$result2_3 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY unvan");
$result2_4 = mysqli_query($baglanti, "SELECT * FROM firma GROUP BY vergino");

$query3 ="SELECT * FROM firmausers ORDER BY ID DESC";  
$result3 = mysqli_query($baglanti, $query3);
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
			<?php if ($_SESSION["yetki"] == "admin") { ?>
				<label class="ana" style="font-weight: bold; text-transform: uppercase; color:red;">KULLANICI > <?php echo $_SESSION["username"];?></label>
			<?php }else {?>
				<label class="ana" style="font-weight: bold; text-transform: uppercase; color:blue;">KULLANICI > <?php echo $_SESSION["username"];?></label>
			<?php }?>
			</div>

			<?php if (isset($_SESSION["yetki"]) && $_SESSION["yetki"] == "admin") { ?>

			<div class="container">
			<div class="contmenu">
			<a href="" class="isim">KULLANICILAR</a><a href="adduser.php" class="ekle">EKLE</a>
			</div>
			<input type="text" name="searchone" id="searchone" placeholder="Arama..." class="form-control">
                <div class="table-responsive">  
                     <table id="formdataone" class="table table-striped table-bordered table table-hover">  
                          <thead>  
                               <tr> 
							   		<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td> 
                                    <td style="font-weight: bold;">SR.</td>  
                                    <td style="font-weight: bold;">KULLANICI ADI</td>  
                                    <td style="font-weight: bold;">AD</td>
									<td style="font-weight: bold;">SOYAD</td>
									<td style="font-weight: bold;">MAİL</td>
									<td style="font-weight: bold;">ŞİFRE</td>
									<td style="font-weight: bold;">YETKİ</td>
                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result))  
                          {  ?>
							   <tr>
									<td>
									<button class="btn btn-primary edituserbtn">Edit</button>
									<button class="btn btn-danger deleteuserbtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td> 
                                    <td><?php echo $row["username"];?></td>  
                                    <td><?php echo $row["name"];?></td>  
									<td><?php echo $row["surname"];?></td>
									<td><?php echo $row["mail"];?></td>
									<td><label>**********</label></td>  
									<td style="display:none;"><?php echo $row["password"];?></td>
									<td><?php echo $row["yetki"];?></td>           
                               </tr>   
                         <?php $sr++;}  
                          ?>   
                     </table>  
                </div>  
		   </div>
		   <br>
		   
		   <?php }?>

		   <div class="container">
			<div class="contmenu">
			<a href="" class="isim">FİRMALAR</a><a href="addfirma.php" class="ekle">EKLE</a>
			</div>
			<input type="text" name="searchtwo" id="searchtwo" placeholder="Arama..." class="form-control">
                <div class="table-responsive">  
                     <table id="formdatatwo" class="table table-striped table-bordered table table-hover">  
                          <thead>  
                               <tr>  
							   		<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td> 
                                    <td style="font-weight: bold;">SR.</td>  
                                    <td style="font-weight: bold;">ÜNVAN</td>  
                                    <td style="font-weight: bold;">HİZ.VER.ADRES</td>
									<td style="font-weight: bold;">İLGİLİ KİŞİ</td>
									<td style="font-weight: bold;">GSM</td> 
									<td style="font-weight: bold;">SABİT TEL</td> 
									<td style="font-weight: bold;">MAİL</td> 
									<td style="font-weight: bold;">FATURA ADRESİ</td> 
									<td style="font-weight: bold;">VERGİ DAİRESİ</td> 
									<td style="font-weight: bold;">VERGİ NUMARASI</td> 
									<td style="font-weight: bold;">ANLAŞMA TÜRÜ</td> 
									<td style="font-weight: bold;">AÇIKLAMA</td>
									<td style="font-weight: bold;">TARİH</td> 
                               </tr>  
						  </thead>
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result2))  
                          {  ?>
							   <tr>
									<td>
									<button class="btn btn-primary editfirmabtn">Edit</button>
									<button class="btn btn-danger deletefirmabtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td> 
                                    <td><?php echo $row["unvan"];?></td>  
                                    <td><?php echo $row["adres"];?></td>  
									<td><?php echo $row["ilgilikisi"];?></td>
									<td><?php echo $row["gsm"];?></td> 
									<td><?php echo $row["sabit"];?></td>
									<td><?php echo $row["mail"];?></td>
									<td><?php echo $row["faturaadres"];?></td>  
                                    <td><?php echo $row["vergidairesi"];?></td>  
									<td><?php echo $row["vergino"];?></td>
									<td><?php echo $row["sozlesmelimi"];?></td> 
									<td><?php echo $row["aciklama"];?></td>
									<td><?php echo $row["tarih"];?></td>             
                               </tr>   
                         <?php $sr++;}  
						  ?>   
                     </table>  
                </div>  
		   </div>
		   <br>

		   <div class="container">
			<div class="contmenu">
			<a href="" class="isim">FİRMA KULLANICILARI</a><a href="addfirmauser.php" class="ekle">EKLE</a>
			</div>
			<input type="text" name="searchthree" id="searchthree" placeholder="Arama..." class="form-control">
                <div class="table-responsive">  
                     <table id="formdatathree" class="table table-striped table-bordered table table-hover">  
                          <thead>  
                               <tr> 
									<td style="font-weight: bold;"></td>
									<td style="font-weight: bold; display:none;">ID</td>   
							   		<td style="font-weight: bold;">SR.</td>  
                                    <td style="font-weight: bold;">KULLANICI ADI</td>  
                                    <td style="font-weight: bold;">İLGİLİ KİŞİ</td>
									<td style="font-weight: bold;">FİRMA</td>
									<td style="font-weight: bold;">VERGİ NUMARASI</td>
									<td style="font-weight: bold;">ŞİFRE</td>
									<td style="font-weight: bold;">YETKİ</td>
                               </tr>  
                          </thead>  
						  <?php
						  $sr = 1;  
                          while($row = mysqli_fetch_array($result3))  
                          {  ?>
							   <tr>
									<td>
									<button class="btn btn-primary editfirmauserbtn">Edit</button>
									<button class="btn btn-danger deletefirmauserbtn">Sil</button>
									</td>
									<td style="display: none;"><?php echo $row["id"];?></td>  
							   		<td><?php echo $sr;?></td> 
                                    <td><?php echo $row["username"];?></td>  
                                    <td><?php echo $row["ilgilikisi"];?></td>  
									<td><?php echo $row["firma"];?></td>
									<td><?php echo $row["vergino"];?></td>
									<td><label>**********</label></td> 
									<td style="display: none;"><?php echo $row["pass"];?></td>
									<td><?php echo $row["yetki"];?></td>           
                               </tr>   
                         <?php $sr++;}  
                          ?>  
					 </table>					 
                </div>  
		   </div>
		</div>
	</div>

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

		$(document).ready(function(){  
           $('#searchthree').keyup(function(){  
                search_table($(this).val());  
           });  
           function search_table(value){  
                $('#formdatathree tr').each(function(){  
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

<!-- EDITFİRMAUSER POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="editfirmausermodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">FİRMA KULLANICISI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="idfirmauser" id="idfirmauser">
        <div class="form-group">
			<label>Kullanıcı Adı</label>
			<select class="form-control" id="username" name="username" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row1=mysqli_fetch_array($result2_1)):;?>
					<option><?php echo $row1[6];?></option>
					<?php endwhile;?>
			</select>
		</div>
		<div class="form-group">
			<label>İlgili Kişi</label>
			<select class="form-control" id="ilgilikisi1" name="ilgilikisi" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row2=mysqli_fetch_array($result2_2)):;?>
					<option><?php echo $row2[3];?></option>
					<?php endwhile;?>
				</select>
		</div>
		<div class="form-group">
			<label>Firma</label>
			<select class="form-control" id="firma" name="firma" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row3=mysqli_fetch_array($result2_3)):;?>
					<option><?php echo $row3[1];?></option>
					<?php endwhile;?>
				</select>
		</div>
		<div class="form-group">
			<label>Vergi Numarası</label>
			<select class="form-control" id="vergino1" name="vergino" required>
					<option></option>
					<option>--- yok ---</option>
					<?php while($row4=mysqli_fetch_array($result2_4)):;?>
					<option><?php echo $row4[9];?></option>
					<?php endwhile;?>
				</select>
		</div>
		<div class="form-group">
			<label>Şifre</label>
			<input type="text" id="pass" name="pass" class="form-control" required>
		</div>
      </div>
      <div class="modal-footer">
		<button type="submit" id="updatefirmauserbtn" name="updatefirmauserbtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEFİRMAUSER POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deletefirmausermodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">FİRMA KULLANICISI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeletefirmauser" id="iddeletefirmauser">
		  <h5>Firma kullanıcısını silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deletefirmauser" name="deletefirmauser" class="btn btn-primary pull-right">EVET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">HAYIR</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- EDITFİRMA POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="editfirmamodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">FİRMA</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="idfirma" id="idfirma">
        <div class="form-group">
			<label>Ünvan</label>
			<input type="text" id="unvan" name="unvan" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Hizmetin Verildiği Adres</label>
			<input type="text" id="adres" name="adres" class="form-control" required>
		</div>
		<div class="form-group">
			<label>İlgili Kişi</label>
			<input type="text" id="ilgilikisi2" name="ilgilikisi" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Gsm</label>
			<input type="text" id="gsm" name="gsm" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Sabit Tel</label>
			<input type="text" id="sabit" name="sabit" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Mail</label>
			<input type="email" id="mail" name="mail" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Fatura Adresi</label>
			<input type="text" id="faturaadres" name="faturaadres" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Vergi Dairesi</label>
			<input type="text" id="vergidairesi" name="vergidairesi" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Vergi Numarası</label>
			<input type="text" id="vergino2" name="vergino" class="form-control" required>
		</div>
		<div class="form-group">
			<label>Anlaşma Türü</label>
			<select class="form-control" id="sozlesmelimi" name="sozlesmelimi" required>
					<option></option>
					<option>sözleşmeli</option>
					<option>sözleşmesiz</option>
			</select>
		</div>
		<div class="form-group">
			<label>Açıklama</label>
			<input type="text" id="aciklama" name="aciklama" class="form-control">
		</div>
      </div>
      <div class="modal-footer">
		<button type="submit" id="updatefirmabtn" name="updatefirmabtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEFİRMA POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deletefirmamodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">FİRMA</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeletefirma" id="iddeletefirma">
		  <h5>Firmayı silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deletefirma" name="deletefirma" class="btn btn-primary pull-right">EVET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">HAYIR</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- EDITUSER POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="editusermodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">KULLANICI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iduser" id="iduser">
		  <div class="form-group">
				<label>Kullanıcı Adı</label>
				<input type="text" class="form-control" name="username" id="username2" required>
			</div>
			<div class="form-group">
				<label>Ad</label>
				<input type="text" class="form-control" name="name" id="name" required>
			</div>
			<div class="form-group">
				<label>Soyad</label>
				<input type="text" class="form-control" name="surname" id="surname" required>
			</div>
			<div class="form-group">
				<label>Mail Adresi</label>
				<input type="email" class="form-control" name="mail" id="mail2" required>
			</div>
			<div class="form-group">
				<label>Şifre </label>
				<input type="text" class="form-control" name="pass" id="pass2" required>
			</div>
			<div class="form-group">
			<label>Yetki</label>
			<select class="form-control" id="yetki" name="yetki" required>
					<option></option>
					<option>admin</option>
					<option>çalışan</option>
			</select>
		</div>
      </div>
      <div class="modal-footer">
		<button type="submit" id="updateuserbtn" name="updateuserbtn" class="btn btn-primary pull-right">KAYDET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">KAPAT</button>
	  </div>
    </div>
  </div>
</div>
</form>

<!-- DELETEUSER POP UP MODAL -->
<form action="" method="POST">
<div class="modal fade" id="deleteusermodal" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
	  <h4 class="modal-title">KULLANICI</h4>
    	<button type="button" class="close" data-dismiss="modal">&times;</button>
	  </div>
      <div class="modal-body">
		  <input type="hidden" name="iddeleteuser" id="iddeleteuser">
		  <h5>Kullanıcıyı silmek istiyor musunuz?</h5>
      </div>
      <div class="modal-footer">
		<button type="submit" id="deleteuser" name="deleteuser" class="btn btn-primary pull-right">EVET</button>
		<button type="button" class="btn btn-secondary pull-right" data-dismiss="modal">HAYIR</button>
	  </div>
    </div>
  </div>
</div>
</form>

<script>
	$(document).ready(function() {
		$('.editfirmauserbtn').on('click', function(){

			$('#editfirmausermodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#idfirmauser').val(data[1]);
			$('#username').val(data[3]);
			$('#ilgilikisi1').val(data[4]);
			$('#firma').val(data[5]);
			$('#vergino1').val(data[6]);
			$('#pass').val(data[8]);

		});
	});

	$(document).ready(function() {
		$('.deletefirmauserbtn').on('click', function(){

			$('#deletefirmausermodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeletefirmauser').val(data[1]);

		});
	});

	$(document).ready(function() {
		$('.editfirmabtn').on('click', function(){

			$('#editfirmamodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#idfirma').val(data[1]);
			$('#unvan').val(data[3]);
			$('#adres').val(data[4]);
			$('#ilgilikisi2').val(data[5]);
			$('#gsm').val(data[6]);
			$('#sabit').val(data[7]);
			$('#mail').val(data[8]);
			$('#faturaadres').val(data[9]);
			$('#vergidairesi').val(data[10]);
			$('#vergino2').val(data[11]);
			$('#sozlesmelimi').val(data[12]);
			$('#aciklama').val(data[13]);

		});
	});

	$(document).ready(function() {
		$('.deletefirmabtn').on('click', function(){

			$('#deletefirmamodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeletefirma').val(data[1]);

		});
	});

	$(document).ready(function() {
		$('.edituserbtn').on('click', function(){

			$('#editusermodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iduser').val(data[1]);
			$('#username2').val(data[3]);
			$('#name').val(data[4]);
			$('#surname').val(data[5]);
			$('#mail2').val(data[6]);
			$('#pass2').val(data[8]);
			$('#yetki').val(data[9]);

		});
	});

	$(document).ready(function() {
		$('.deleteuserbtn').on('click', function(){

			$('#deleteusermodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iddeleteuser').val(data[1]);

		});
	});
</script>

   <footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>

</html>