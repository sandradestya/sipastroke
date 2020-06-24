
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->

		<h4 style="text-transform: uppercase">Data Kasus</h4>


	<div class="forms" >
		<div class="form-grids "  > 
			
			<div class="form panel-body">
				<?php echo form_open_multipart('index.php/kasus/create_actionn'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label  class="col-sm-3 control-label">Kode Kasus</label>
						<div class="col-sm-9" >
							<input type="text" class="form-control" id="" placeholder="" name="id_kasus" required="">
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Nama Diagnosa</label>
						<div class="col-sm-9">
							<select class="form-control" id="kode_diagnosa" name="kode_diagnosa" class="select-select2" style="width: 100%;" data-placeholder="Pilih Diagnosa">
                                		<option value=""></option>
                                		<?php foreach ($diagnosa as $key){?>
                                    		<option value="<?php echo $key->kode_diagnosa ?>"><?php echo $key->nama_diagnosa ?></option>
                                        <?php } ?>
                            		</select>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Gejala</label>
						<div class="col-sm-9">
							<?php
								$this->db->order_by('kode_gejala');
								$sql = $this->db->get('gejala');
								foreach ($sql->result() as $row) {?>
									<div class="col-sm-1">
										<input type="checkbox" value="<?php echo $row->kode_gejala ?>" name="gejala-<?php echo $row->kode_gejala ?>">
									</div>
									<div class="col-sm-11">
										<?php echo $row->nama_gejala ?><br />
									</div>
									<br><br>
								<?php }
							?>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Tindakan</label>
						<div class="col-sm-9">
							<?php
								$this->db->order_by('kode_tindakan');
								$sql = $this->db->get('tindakan');
								foreach ($sql->result() as $row) {?>
									<div class="col-sm-1">
										<input type="checkbox" value="<?php echo $row->kode_tindakan ?>" name="tindakan-<?php echo $row->kode_tindakan ?>">
									</div>									
									<div class="col-sm-11">
										<?php echo $row->nama_tindakan ?>
									</div>
									<br><br>
								<?php }
							?>
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
