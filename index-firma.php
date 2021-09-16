<?php session_start();?>
<?php include("phptools/yetki-nonfirma.php");?>
<?php include("phptools/firmauserpass.php");?>

<?php
$baglanti = mysqli_connect("localhost", "root", "", "kontroldb");
$baglanti->query("SET CHARACTER SET utf8");
$username=$_SESSION["username"];
$ilgilikisi=$_SESSION["ilgilikisi"];
$firma=$_SESSION["firma"];
$query ="SELECT * FROM firmausers WHERE username='$username' ORDER BY ID DESC";
$result = mysqli_query($baglanti, $query);
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
			<a href="index-firma.php" class="aktif">ANASAYFA</a>
		</div>
		<div class="menuler">
			<a href="ystbk-firma.php">YANGIN SÖNDÜRÜCÜLERİ</a>
		</div>
		<div class="menuler">
			<a href="ydk-firma.php" >YANGIN DOLAPLARI</a>
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
			<li class="aktif"><a href="index-firma.php">ANASAYFA</a></li>
			<li><a href="ystbk-firma.php">YANGIN SÖNDÜRÜCÜLERİ</a></li>
			<li><a href="ydk-firma.php">YANGIN DOLAPLARI</a></li>
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
				<label class="ana" style="font-weight: bold; text-transform: uppercase; color:purple;">KULLANICI > <?php echo $_SESSION["firma"];?> > <?php echo $_SESSION["ilgilikisi"];?></label>
			</div>

			<div class="container">
			<div class="contmenu">
			<a href="" class="isim">KULLANICI BİLGİLERİ</a>
			</div>
			<div class="table-responsive">  
			<table id="formdata" class="table table-striped table-bordered table table-hover">  
                          <thead>  
                               <tr> 
								   	<td style="font-weight: bold; width:13%;"></td>
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
                          while($row = mysqli_fetch_array($result))  
                          {   ?>
							   <tr> 
							   		<td>
									<button class="btn btn-primary edituserbtn">Yeni Şifre Al</button>
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
			 <input type="hidden" name="checkpass" id="checkpass">
			 <?php echo $info;?>
		  	<div class="form-group">
				<label>Eski Şifre</label>
				<input type="text" class="form-control" name="oldpass" id="oldpass" required>
			</div>
			<div class="form-group">
				<label>Yeni Şifre</label>
				<input type="text" class="form-control" name="newpass" id="newpass" required>
			</div>
			<div class="form-group">
				<label>Yeni Şifre Tekrar</label>
				<input type="text" class="form-control" name="pass" id="pass" required>
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

<script>
$(document).ready(function() {
		$('.edituserbtn').on('click', function(){

			$('#editusermodal').modal('show');
			$tr = $(this).closest('tr');
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			console.log(data);

			$('#iduser').val(data[1]);
			$('#checkpass').val(data[8]);

		});
	});
</script>

   <footer id="telif"><label>www.github.com/kenanyasinsarigul (2020)</label></footer>

</body>

</html>