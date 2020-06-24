<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Lumino - Login</title>
	<link href="<?=base_url()?>assetsadmin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/styles.css" rel="stylesheet">
	
	<link rel="stylesheet" href="<?=base_url()?>assetsadmin/datatable/datatables.min.css">
	<link href="<?=base_url()?>assetsadmin/css/bootstrGap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Log in</div>
				<div class="panel-body">

					<?php echo form_open('index.php/login/cekLogin'); ?>
					<?php echo validation_errors(); ?>

					<form role="form">
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="username" name="username"  autofocus="">
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							
							
							<button type="submit" value="login" class="btn btn-default">MASUK</button>
							<p>Tidak punya akun? <a href="<?=base_url()?>index.php/login/daftar">Daftar</a></p>
							
					</form>
					<?php echo form_close(); ?>
				</div>

			</div>
			<div class="col-md-12" >
			<a href="<?=base_url()?>index.php/welcome" class="btn btn-primary">Kembali ke halaman utama</a></fieldset>
			</div>
		</div><!-- /.col-->

	</div><!-- /.row -->	
	

<script src="<?=base_url()?>assetsadmin/js/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/bootstrap.min.js"></script>
</body>
</html>
