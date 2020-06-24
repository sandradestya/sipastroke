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

<div class="main-page">
	<div class="forms" style="margin: 1.5em 0 1em 0">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" style="margin: 0"> 
			
			<div class="form-body">
				<?php echo form_open_multipart('index.php/gejala/update_action/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kode Anamnesa</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="kode_gejala" value="<?php echo $dataGejala[0]->kode_gejala ?>" readonly>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Nama Anamnesa</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="nama_gejala" value="<?php echo $dataGejala[0]->nama_gejala ?>" required="">
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Bobot</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="bobot" value="<?php echo $dataGejala[0]->bobot ?>" required="">
						</div>
						<div class="clearfix"></div>
					</div>

					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Keterangan</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="keterangan" value="<?php echo $dataGejala[0]->keterangan ?>" >
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