=	
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">Dashboard</h1>
			</div>
		</div><!--/.row-->
		
		
			<div class="panel panel-container">
			<div class="row">
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-teal panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-shopping-cart color-blue"></em>
							<div class="large"><?php
									$sqln = $this->db->get('diagnosa');
									echo $sqln->num_rows();
								?></div>
							<div class="text-muted">Penyakit</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-blue panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-comments color-orange"></em>
							<div class="large">
								<?php
									$sqln = $this->db->get('gejala');
									echo $sqln->num_rows();
								?>
							</div>
							<div class="text-muted">Anamnesa</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-orange panel-widget border-right">
						<div class="row no-padding"><em class="fa fa-xl fa-users color-teal"></em>
							<div class="large">
								<?php									
									$sqln = $this->db->get_where('kasus', array('acc' => '1'));
									echo $sqln->num_rows();
								?>
							</div>
							<div class="text-muted">Kasus</div>
						</div>
					</div>
				</div>
				<div class="col-xs-6 col-md-3 col-lg-3 no-padding">
					<div class="panel panel-red panel-widget ">
						<div class="row no-padding"><em class="fa fa-xl fa-search color-red"></em>
							<div class="large">
								<?php
									$sqln = $this->db->get('tindakan');
									echo $sqln->num_rows();
								?>
							</div>
							<div class="text-muted">Tindakan</div>
						</div>
					</div>
				</div>
			</div><!--/.row-->
		</div>
		
		<div class="row">
			<div class="col-lg-12">
				<div class="col-md-6">
					<div class="panel panel-teal">
					<div class="panel-heading dark-overlay">Sistem Pakar</div>
					<div class="panel-body">
						<p>Sistem pakar merupakan sistem yang mengadaptasi pengetahuan pakar dari berbagai bidang keahlian tertentu, dengan tujuan agar sistem dapat digunakan sebagai alat bantu penunjang pakar maupun sebagai sistem yang digunakan non pakar atau awam untuk melakukan tindakan layaknya pakar.</p>
					</div>
				</div>
				</div>
				<div class="col-md-6">
					<div class="panel panel-teal">
					<div class="panel-heading dark-overlay">Metode Cased Base Reasoning</div>
					<div class="panel-body">
						<p>Case Base Reasoning merupakan metode yang mencocokan kasus baru dengan kasus terdahulu untuk mendapatkan suatu solusi.</p>
					</div>
				</div>
				</div>
			</div>
		</div>
		<div class="main-page">
	<div class="charts" style="margin: 1.5em 0 1em 0">		
		<div class="mid-content-top charts-grids" style="margin-right: 0">
			<div class="middle-content">
				
				<div id="owl-demo" class="owl-carousel text-center">
					<?php foreach ($dataBidang as $key) { ?>
					<div class="item">
						
					</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>

	</div>	<!--/.main-->
	
	
		

