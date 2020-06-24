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
	<div class="forms" style="margin: 1.5em 0 1em 0">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" style="margin: 0"> 
			
			<div class="form-body">
				<?php echo form_open_multipart('index.php/tindakan/update_action/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kode Tindakan</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="kode_tindakan" value="<?php echo $dataTindakan[0]->kode_tindakan ?>" readonly>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Nama Tindakan</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="nama_tindakan" value="<?php echo $dataTindakan[0]->nama_tindakan ?>" required="">
						</div>
						<div class="clearfix"></div>
					</div>

					
					
					</div>
					
					<div style="text-align: right">
						<button type="submit" class="btn btn-default">SIMPAN</button>
					</div>
				</form>
				<?php echo form_close(); ?>
			</div>
		</div>
	</div>
</div>
</div>
</div>