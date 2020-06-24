
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<h4 style="text-transform: uppercase">Data Gejala</h4>

	<div class="forms" >
		<div class="form-grids "  > 
			
			<div class="form panel-body">
				<?php echo form_open_multipart('index.php/gejala/create_action'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label  class="col-sm-3 control-label">Kode Anamnesa</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="kode_gejala" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-3 control-label">Nama Anamnesa</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="nama_gejala" required="">
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Bobot</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="bobot" required="">
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-9" ">
							<input type="text" class="form-control" id="" placeholder="" name="keterangan" >
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
