<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Admin - Dashboard</title>
	<link href="<?=base_url()?>assetsadmin/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/font-awesome.min.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/datepicker3.css" rel="stylesheet">
	<link href="<?=base_url()?>assetsadmin/css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->

	
<link rel="stylesheet" href="//cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" />
	
</head>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Register</h1>
			</div>
		</div><!--/.row-->


<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" > 
			
			<div class="form panel-body">
				<?php echo form_open_multipart('index.php/login/daftar'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama </label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="nama" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Username </label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="username" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Password</label>
						<div class="col-sm-9" >
							<input type="Password" class="form-control" id="" placeholder="" name="password" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Email</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="email" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					
					
					
						<button type="submit" class="btn btn-warning">SIMPAN</button>
					</div>
				</form>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
	</div>
</div>

<script src="<?=base_url()?>assetsadmin/js/jquery-1.11.1.min.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/bootstrap.min.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/chart.min.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/chart-data.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/easypiechart.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/easypiechart-data.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/bootstrap-datepicker.js"></script>
	<script src="<?=base_url()?>assetsadmin/js/custom.js"></script>
	
	<script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
	

	<script>
	$(document).ready( function () {
    $('#example-datatable').DataTable();
} );
	</script>