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

<div class="main-page">
	<div class="forms" style="margin: 1.5em 0 1em 0">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" style="margin: 0"> 
			
			<div class="form-body">
				<?php echo form_open_multipart('index.php/kasus/update_action/'.$this->uri->segment(3)); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kode Kasus</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="id_kasus" value="<?php echo $dataKasus[0]->id_kasus; ?>" readonly>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Nama Diagnosa</label>
						<div class="col-sm-9" style="padding: 0">							
							<select class="form-control" id="kode_diagnosa" name="kode_diagnosa" class="select-select2" style="width: 100%;" data-placeholder="Pilih Diagnosa">
                                		<option value=""></option>
                                		<?php foreach ($diagnosa as $key){ $sel = ""; if ($key->kode_diagnosa==$dataKasus[0]->kode_diagnosa) { $sel = "selected"; } ?>                                   		
									<option <?php echo $sel ?> value="<?php echo $key->kode_diagnosa ?>"><?php echo $key->nama_diagnosa ?></option>
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
								foreach ($sql->result() as $row) {
									$c = "";
									$sqln = $this->db->get_where('kasus_gjl', array('kasus' => $dataKasus[0]->id_kasus, 'gejala' => $row->kode_gejala));
									if ($sqln->num_rows()>0) { $c = "checked"; } ?>
									<div class="col-sm-1">
										<input type="checkbox" <?php echo $c ?> value="<?php echo $row->kode_gejala ?>" name="gejala-<?php echo $row->kode_gejala ?>">
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
								foreach ($sql->result() as $row) {
									$c = "";
									$sqln = $this->db->get_where('kasus_tnd', array('kasus' => $dataKasus[0]->id_kasus, 'tindakan' => $row->kode_tindakan));
									if ($sqln->num_rows()>0) { $c = "checked"; } ?>
									<div class="col-sm-1">
										<input type="checkbox" <?php echo $c ?> value="<?php echo $row->kode_tindakan ?>" name="tindakan-<?php echo $row->kode_tindakan ?>">
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