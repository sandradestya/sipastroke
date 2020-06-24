<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<h4 style="text-transform: uppercase">Data Tindakan</h4>

<div class="main-page">
	<div class="forms">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" > 
			
			<div class="form panel-body">
				<?php echo form_open_multipart('index.php/tindakan/create_action'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label  class="col-sm-3 control-label">Kode Tindakan</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="kode_tindakan" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Tindakan</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="nama_tindakan" required="">
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