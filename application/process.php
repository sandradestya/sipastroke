
<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html lang="en">
<head>
<title>Skripsi Sandraaa</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Dental Pro Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free web designs for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- //for-mobile-apps -->
<link href="<?=base_url()?>assets/css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="<?=base_url()?>assets/css/swipebox.css">
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="<?=base_url()?>assets/css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<link href="//fonts.googleapis.com/css?family=Pathway+Gothic+One" rel="stylesheet">
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<script>
	function onClick(e) {
		if (document.getElementById('g'+e).checked==true) {
			document.getElementById('pilih').value = +document.getElementById('pilih').value + 1;
		}
		else {
			document.getElementById('pilih').value = +document.getElementById('pilih').value - 1;
		}
	}
</script>
</head>
	
<body>

<!-- header -->
	<div class="w3_navigation">
		<div class="container">
			<nav class="navbar navbar-default">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
					<div class="logo">
						<h1><a class="navbar-brand" href="<?=base_url()?>index.php/welcome/"><span class="one">SiPa</span>Stroke</a></h1>
					</div>
				</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse nav-wil" id="bs-example-navbar-collapse-1">
					<nav class="link-effect-5" id="link-effect-5">
						<ul class="nav navbar-nav">
							<li class="active"><a  href="<?=base_url()?>index.php/welcome/">Home</a></li>
							<li><a href="#about" class="scroll hvr-underline-from-center">About</a></li>
							<li><a href="#services" class="scroll hvr-underline-from-center">Services</a></li>
							<li><a href="<?=base_url()?>index.php/login" >Login</a></li>
							
						</ul>
					</nav>
				</div>
				<!-- /.navbar-collapse -->
			</nav>
		</div>
	</div>
<!-- //header -->
<div class="main" id="home">

<!-- banner -->
	<div class="banner">
			<!--Slider-->
			<div class="container">
				<div class="col-sm-12" style="margin: 2em 0; color: #fff;">
					<p>						
						<?php if ($this->uri->segment(3)=='1') {?>
						<?php echo form_open_multipart('index.php/process/diagnosa/2'); ?>
						<form class="form-horizontal" role="form">
							<div class="col-sm-12">
								<b>Diagnosa</b><br>
								<i>Pilih gejala-gejala yang terjadi pada kondisi pasien :</i><br><br>
							</div>
							<?php
								$this->db->order_by('kode_gejala');
								$sql = $this->db->get('gejala');
								foreach ($sql->result() as $row) {?>
									<div class="col-sm-12" style="padding: 0;">
									<div class="col-sm-1" style="width: 4%;">										
										<input type="checkbox" id="g<?php echo $row->kode_gejala ?>" onClick="onClick(<?php echo $row->kode_gejala ?>)" value="<?php echo $row->kode_gejala ?>" name="gejala-<?php echo $row->kode_gejala ?>">
									</div>
									<div class="col-sm-11" style="padding: 0;">
										<?php echo $row->nama_gejala ?>
									</div>
									</div>
									<br>
								<?php }
							?>
							<input hidden id="pilih" name="pilih" />
							<button type="submit" class="submitread">Proses</button>
						</form>
						<?php } else if ($this->uri->segment(3)=='2') {?>
						<?php echo form_open_multipart('index.php/process/diagnosa/3'); ?>
						<form class="form-horizontal" role="form">
							<div class="col-sm-12">
								<div class="col-sm-2" style="padding: 0;"></div>
								<div class="col-sm-7" style="padding: 0; text-align: center;"><b>Gejala</b></div>
								<div class="col-sm-2" style="padding: 0; text-align: center;"><b>Bobot</b></div>
								<br><br>
							</div>
							<?php								
								$d = $this->session->userdata('baru');

								$this->db->order_by('id_kasus', 'DESC');
								$sql = $this->db->get('kasus', 0, 1);
								$row = $sql->row();
								$id_kasus = (int)$row->id_kasus + 1;
								$data = array(
									'id_kasus' => $id_kasus
								);
								$this->db->insert('kasus', $data);

								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									$data = array(
										'kasus' => $id_kasus,
										'gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]
									);								
									$this->db->insert('kasus_gjl', $data);

									$sql = $this->db->get_where('gejala', array('kode_gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
									$row = $sql->row(); ?>									
									<!-- JKHKH -->
									<div class="col-sm-12">
										<?php $nmkasus = ""; if ($n==0) { $nmkasus = "Kasus Baru"; } ?>
										<div class="col-sm-2" style="padding: 0;"><b><?php echo $nmkasus ?></b></div>
										<div class="col-sm-7" style="padding: 0;"><?php echo $row->nama_gejala; ?></div>
										<div class="col-sm-2" style="padding: 0; text-align: center;"><?php echo $row->bobot; ?></div>
									</div>									
								<?php }
							?>
							<div class="col-sm-12" style="height: 1em;"></div>
							
							<?php
								$k = array();
								$i = 0;
								$id = "";
								
								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									
									$this->db->order_by('kasus', '');
									$sql = $this->db->get_where('kasus_gjl', array('kasus!=' => $id_kasus, 'gejala' => explode("#",substr($d,0,strlen($d)-1))[$n], 'acc' => '1'));
									foreach ($sql->result() as $row) {
										if (substr_count($id,$row->kasus."#")<1)
										{
											$id = $id . $row->kasus."#";
											$k[$i] = $row->kasus;
											$i++;
										}								
									}							
								}
								sort($k);
								
								for($n = 0; $n < count($k); $n++) {
									$x = 0;
									$this->db->order_by('gejala', '');
									$sql = $this->db->get_where('kasus_gjl', array('kasus' => $k[$n]));
									foreach ($sql->result() as $row) {
										$sqld = $this->db->get_where('gejala', array('kode_gejala' => $row->gejala));
										$rowd = $sqld->row(); ?>									
										<div class="col-sm-12">
											<?php $nmkasus = ""; if ($x==0) { $nmkasus = "Kasus Lama " . $k[$n]; } ?>
											<div class="col-sm-2" style="padding: 0;"><b><?php echo $nmkasus ?></b></div>
											<div class="col-sm-7" style="padding: 0;"><?php echo $rowd->nama_gejala; ?></div>
											<div class="col-sm-2" style="padding: 0; text-align: center;"><?php echo $rowd->bobot; ?></div>
										</div>
									<?php $x++; } ?>
									<div class="col-sm-12" style="height: 1em;"></div>
								<?php }
							?>
							<button type="submit" class="submitread">Lanjut</button>
						</form>
						<?php } else if ($this->uri->segment(3)=='3') {?>
						<?php echo form_open_multipart('index.php/welcome'); ?>
						<form class="form-horizontal" role="form">
							<div class="col-sm-12">
								<div class="col-sm-2" style="padding: 0;"></div>
								<div class="col-sm-7" style="padding: 0; text-align: center;"><b>Gejala</b></div>
								<div class="col-sm-2" style="padding: 0; text-align: center;"><b>Bobot</b></div>
								<br><br>
							</div>
							<?php
								$d = $this->session->userdata('baru');

								$this->db->order_by('id_kasus', 'DESC');
								$sql = $this->db->get_where('kasus', array('kode_diagnosa' => '0'));
								$this->db->limit(1, 0);
								$row = $sql->row();
								$id_kasus = $row->id_kasus;
									
								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									$sql = $this->db->get_where('gejala', array('kode_gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
									$row = $sql->row(); ?>									
									<div class="col-sm-12">
										<?php $nmkasus = ""; if ($n==0) { $nmkasus = "Kasus Baru"; } ?>
										<div class="col-sm-2" style="padding: 0;"><b><?php echo $nmkasus ?></b></div>
										<div class="col-sm-7" style="padding: 0;"><?php echo $row->nama_gejala; ?></div>
										<div class="col-sm-2" style="padding: 0; text-align: center;"><?php echo $row->bobot; ?></div>
									</div>									
								<?php }
							?>
							<div class="col-sm-12" style="height: 1em;"></div>
							
							<?php
								$k = array();
								$i = 0;
								$id = "";
								
								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									$this->db->order_by('kasus', '');
									$sql = $this->db->get_where('kasus_gjl', array('kasus!=' => $id_kasus, 'gejala' => explode("#",substr($d,0,strlen($d)-1))[$n], 'acc' => '1'));
									foreach ($sql->result() as $row) {
										if (substr_count($id,$row->kasus."#")<1)
										{
											$id = $id . $row->kasus."#";
											$k[$i] = $row->kasus;
											$i++;
										}								
									}							
								}		
								sort($k);

								$jS = 0;
								$tS = 0;
								$nS = 0;
								$ketS = "";								
								
								for($n = 0; $n < count($k); $n++) {
									$b = 0;
									$wb = 0;
									$x = 0;
									$this->db->order_by('gejala', '');
									$sql = $this->db->get_where('kasus_gjl', array('kasus' => $k[$n]));									
								
									foreach ($sql->result() as $row) {										
										$sqld = $this->db->get_where('gejala', array('kode_gejala' => $row->gejala));
										$rowd = $sqld->row();

										$wb = $wb + (int)$rowd->bobot;
										
										if (substr_count($d,$row->gejala."#")>0) {
											$b = $b + (int)$rowd->bobot;
										} ?>

										<div class="col-sm-12">
											<?php $nmkasus = ""; if ($x==0) { $nmkasus = "Kasus Lama " . $k[$n]; } ?>
											<div class="col-sm-2" style="padding: 0;"><b><?php echo $nmkasus ?></b></div>
											<div class="col-sm-7" style="padding: 0;"><?php echo $rowd->nama_gejala; ?></div>
											<div class="col-sm-2" style="padding: 0; text-align: center;"><?php echo $rowd->bobot; ?></div>
										</div>
									<?php $x++; } ?>
									
									<div class="col-sm-12">
										<div class="col-sm-2" style="padding: 0;"><b></b></div>
										<div class="col-sm-7" style="padding: 0; text-align: right;"><i>Similarity</i></div>
										<div class="col-sm-2" style="padding: 0; text-align: center;">
											<?php
												if (round($b / $wb,6) > $jS)
												{
													$jS = round($b / $wb,6);
													$tS = $k[$n];
													
													$sqldg = $this->db->get_where('kasus', array('id_kasus' => $k[$n]));
													$rowdg = $sqldg->row();
													$sqlng = $this->db->get_where('diagnosa', array('kode_diagnosa' => $rowdg->kode_diagnosa));
													$rowng = $sqlng->row();
													$nS = $rowng->kode_diagnosa;
													
													if ($jS<0.8) {
														$ketS = "Maaf Sistem Tdk Dapat Melakukan Diagnosa";	
													}
													else {
														$ketS = $rowng->nama_diagnosa;
													}													
												}
												
												echo number_format($b / $wb,6,",",".")
											?>
										</div>
									</div>									
									<div class="col-sm-12" style="height: 1em;"></div>
								<?php } ?>
								<div class="col-sm-12">
									<div class="col-sm-2" style="padding: 0;"><b>Hasil Diagnosa</b></div>
									<div class="col-sm-7" style="padding: 0;">
										<?php
											if ($jS>=0.8) {
												$data = array(
													'kode_diagnosa' => $nS
												);
												$this->db->where('id_kasus', $id_kasus);
												$this->db->update('kasus', $data);
											}
											
											echo $ketS
										?>
									</div>
									<div class="col-sm-2" style="padding: 0;"></div>
								</div>									
								<div class="col-sm-12" style="height: 1em;"></div>
								<?php
									if ($jS>=0.8) {
									$x = 0;
									$this->db->order_by('tindakan');
									$sql = $this->db->get_where('kasus_tnd', array('kasus' => $tS));
									foreach ($sql->result() as $row) {
										$data = array(
											'kasus' => $id_kasus,
											'tindakan' => $row->tindakan
										);								
										$this->db->insert('kasus_tnd', $data); ?>
										<div class="col-sm-12">
											<?php
												$nmtindakan = ""; if ($x==0) { $nmtindakan = "Tindakan"; }
												$sqlt = $this->db->get_where('tindakan', array('kode_tindakan' => $row->tindakan));
												$rowt = $sqlt->row();													
											?>
											<div class="col-sm-2" style="padding: 0;"><b><?php echo $nmtindakan ?></b></div>
											<div class="col-sm-9" style="padding: 0;"><?php echo $rowt->nama_tindakan; ?></div>
										</div>										
									<?php $x++; } } ?>
									<div class="col-sm-12" style="height: 1em;"></div>
							<button type="submit" class="submitread">Selesai</button>
						</form>
						<?php } ?>
						<?php echo form_close(); ?>						
					</p>
				</div>
			</div>
	</div>
</div>

<!-- footer -->
	<div class="copy-right-social">
		<div class="container">
			<div class="copy-right">
				<p>&copy; 2019 SiPaStroke | Design by <a href="http://w3layouts.com/">W3layouts</a></p>
			</div>
				<div class="bottom-socila-icons">
							<ul class="top-links two">
									<li><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a href="#"><i class="fa fa-linkedin"></i></a></li>
									<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								</ul>
				</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //footer -->
<a href="#" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

<script src="<?=base_url()?>assets/js/jquery-2.2.3.min.js"></script> 
<!-- skills -->

						<script src="<?=base_url()?>assets/js/responsiveslides.min.js"></script>
							<script>
								// You can also use "$(window).load(function() {"
								$(function () {
								  // Slideshow 4
								  $("#slider3").responsiveSlides({
									auto: true,
									pager:true,
									nav:false,
									speed: 500,
									namespace: "callbacks",
									before: function () {
									  $('.events').append("<li>before event fired.</li>");
									},
									after: function () {
									  $('.events').append("<li>after event fired.</li>");
									}
								  });
							
								});
							 </script>
							 <!-- js -->
							 
<!-- Starts-Number-Scroller-Animation-JavaScript -->
				<script src="<?=base_url()?>assets/js/waypoints.min.js"></script> 
				<script src="<?=base_url()?>assets/js/counterup.min.js"></script> 
				<script>
					jQuery(document).ready(function( $ ) {
						$('.counter').counterUp({
							delay: 20,
							time: 1000
						});
					});
				</script>

			<!-- //Starts-Number-Scroller-Animation-JavaScript -->
<!-- search-jQuery -->
			
			<script src="<?=base_url()?>assets/js/simplePlayer.js"></script>
			<script>
				$("document").ready(function() {
					$("#video").simplePlayer();
				});
			</script>
			
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="<?=base_url()?>assets/js/move-top.js"></script>
<script type="text/javascript" src="<?=base_url()?>assets/js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
			<!--swipebox -->	
				<link rel="stylesheet" href="<?=base_url()?>assets/css/swipebox.css">
					<script src="<?=base_url()?>assets/js/jquery.swipebox.min.js"></script> 
					<script type="text/javascript">
						jQuery(function($) {
							$(".swipebox").swipebox();
						});
					</script>
				<!--//swipebox Ends -->
<!-- //js -->
<script type="text/javascript">
						$(window).load(function() {
							$("#flexiselDemo1").flexisel({
								visibleItems: 3,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 3000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems: 1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:2
									},
									tablet: { 
										changePoint:768,
										visibleItems: 3
									}
								}
							});
							
						});
				</script>
				<script type="text/javascript" src="<?=base_url()?>assets/js/jquery.flexisel.js"></script>
	<script src="<?=base_url()?>assets/js/bootstrap.js"></script>
<!-- //for bootstrap working -->
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<!-- //here ends scrolling icon -->
</body>
</html>