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


<div class="main-page">
	<div class="forms" style="margin: 1.5em 0 1em 0">
		<div class="form-grids row widget-shadow" data-example-id="basic-forms" style="margin: 0"> 
			
			<div class="form-body">					
				<?php echo form_open_multipart('index.php/kasus/detail_action'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kode Kasus</label>
						<div class="col-sm-9" style="padding: 0">
							<input type="text" class="form-control" id="" placeholder="" name="id_kasus" value="<?php echo $dataKasus[0]->id_kasus ?>" readonly>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Nama Diagnosa</label>
						<div class="col-sm-9" style="padding: 0">
							<?php
								$sql = $this->db->get_where('diagnosa', array('kode_diagnosa' => $dataKasus[0]->kode_diagnosa));
								foreach ($sql->result() as $row) {
									$nama = $row->nama_diagnosa;
								}							
							?>
							<input type="text" class="form-control" id="" placeholder="" value="<?php echo $nama ?>" readonly>
						</div>
						<div class="clearfix"></div>
					</div>					
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Gejala</label>
						<div class="col-sm-9" style="padding: 0;">
							<div class="col-sm-9">
							<?php foreach ($gejala as $key){
								$c = "";
								$sql = $this->db->get_where('kasus_gjl', array('kasus' => $dataKasus[0]->id_kasus, 'gejala' => $key->kode_gejala));
								if ($sql->num_rows()>0)
								{
									$c = "checked";
								}?>							
								<input type="checkbox" <?php echo $c ?> value="<?php echo $key->kode_gejala ?>" name="gejala-<?php echo $key->kode_gejala ?>">&nbsp;&nbsp;&nbsp;<?php echo $key->nama_gejala ?><br />
							<?php } ?>							
							</div>
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