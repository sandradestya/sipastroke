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
<body>
	<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span></button>
				<a class="navbar-brand" href="#"><span>SiPaStroke</span>Admin</a>
				<ul class="nav navbar-top-links navbar-right">
					
					
				</ul>
			</div>
		</div><!-- /.container-fluid -->
	</nav>
	<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="http://placehold.it/50/30a5ff/fff" class="img-responsive" alt="">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">
					<span><?= $this->session->userdata('logged_in')['username']; ?></span>
				</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>
		
		<ul class="nav menu">
			<li ><a href="<?=base_url()?>index.php/dashboard"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			<li><a href="<?=base_url()?>index.php/diagnosa"><em class="fa fa-clone">&nbsp;</em> Data Diagnosa</a></li>
			<li><a href="<?=base_url()?>index.php/gejala"><em class="fa fa-clone">&nbsp;</em> Data Gejala</a></li>
			<li><a href="<?=base_url()?>index.php/kasus"><em class="fa fa-clone">&nbsp;</em> Data Kasus</a></li>
			<li><a href="<?=base_url()?>index.php/tindakan"><em class="fa fa-clone">&nbsp;</em>  Data Tindakan </a></li>			
			<li><a href="<?=base_url()?>index.php/login/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
		</ul>
	</div><!--/.sidebar-->

	<div id="page-wrapper">
				<?php echo $content; ?>
			</div>
</body>
</html>


	
    
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
