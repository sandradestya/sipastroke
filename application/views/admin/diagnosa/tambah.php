

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<h4 style="text-transform: uppercase">Data Diagnosa</h4>
		

			
						
	<div class="forms">
		<div class="form-grids"> 
			
			</div>
			<div class="form panel-body">
				<?php echo form_open_multipart('index.php/diagnosa/create_action'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label  class="col-md-2" control-label">Kode Diagnosa</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" placeholder="" name="kode_diagnosa" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">Nama Diagnosa</label>
						<div class="col-sm-9">
							<input type="text" class="form-control" id="" placeholder="" name="nama_diagnosa" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					
					<div>
						<button type="submit" class="btn btn-warning">SIMPAN</button>
					</div>
				</form>
				<?php echo form_close(); ?>
			</div>
		
	</div>




                        </div>
			
	</div>

</div>
	</div>
	<!--/.main-->
	
	