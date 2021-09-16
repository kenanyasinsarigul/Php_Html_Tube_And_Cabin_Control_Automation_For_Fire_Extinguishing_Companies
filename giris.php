<?php include("phptools/login.php");?>

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

<div class="login-square">

	<div class="login-center">
		<form method="POST">
		<div class="form-group">
			<label style="font-weight:500;">Kullanıcı Adı</label>
			<input style="font-weight: 500;" type="text" class="form-control" name="name" placeholder="Kullanıcı adınızı giriniz.">
			<!---<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>--->
		</div>
		<div class="form-group">
			<label style="font-weight:500;">Şifre</label>
			<input style="font-weight: 500;" type="password" class="form-control" name="pass" placeholder="Şifrenizi giriniz.">
		</div>
		<button style="font-weight: 500;" type="submit" class="btn btn-primary" name="gonder">GİRİŞ</button>
		</form>
	</div>
	<div class="login-info">
		<p class="logacc"><?php echo $info ?></p>
		<p class="logerr"><?php echo $info2 ?></p>
		</div>

</div>

</body>
</html>