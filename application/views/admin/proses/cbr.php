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
				<?php if ($this->uri->segment(3)==1) { ?>
				<?php echo form_open_multipart('index.php/proses/cbr/2'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kasus Baru</label>
						<div class="col-sm-9" style="padding: 0;">
							<div class="col-sm-9">
							<?php foreach ($gejala as $key){?>							
								<input type="checkbox" value="<?php echo $key->kode_gejala ?>" name="gejala-<?php echo $key->kode_gejala ?>">&nbsp;&nbsp;&nbsp;<?php echo $key->nama_gejala ?><br />
							<?php } ?>							
							</div>
						</div>
						<div class="clearfix"></div>
					</div>					
					<div style="text-align: right">
						<button type="submit" class="btn btn-default">PROSES</button>
					</div>
				</form>
				<?php } else if ($this->uri->segment(3)==2) { ?>
				<?php echo form_open_multipart('index.php/proses/cbr/3'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kasus Baru</label>
						<div class="col-sm-9" style="padding: 0;">
							<div class="col-sm-8" style="text-align: center;"><b>Gejala</b></div>
							<div class="col-sm-1" style="text-align: center;"><b>Bobot</b></div>
							<br>
							<?php
								$d = $this->session->userdata('baru');
								
								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									$sql = $this->db->get_where('gejala', array('kode_gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
									foreach ($sql->result() as $row) {?>
										<div class="col-sm-8">
										<?php echo $row->nama_gejala; ?>
										</div>
										<div class="col-sm-1" style="text-align: center;">
										<?php echo $row->bobot; ?>
										</div>
									<?php }
								}								
							?>							
						</div>
						<div class="clearfix"></div>
					</div>
					<br><br>
					<?php
						$k = array();
						$i = 0;
						$id = "";
						
						for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
						{
							$this->db->order_by('kasus', '');
							$sql = $this->db->get_where('kasus_gjl', array('gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
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
						for($n = 0; $n < count($k); $n++) {?>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Kasus Lama <?php echo $k[$n] ?></label>
								<div class="col-sm-9" style="padding: 0;">
									<div class="col-sm-8" style="text-align: center;"><b>Gejala</b></div>
									<div class="col-sm-1" style="text-align: center;"><b>Bobot</b></div>
									<br>
									<?php
										$this->db->order_by('gejala', '');
										$sql = $this->db->get_where('kasus_gjl', array('kasus' => $k[$n]));
										foreach ($sql->result() as $row) {
											$idgejala = $row->gejala;
											$sqld = $this->db->get_where('gejala', array('kode_gejala' => $idgejala));
											foreach ($sqld->result() as $rowd) {?>
												<div class="col-sm-8">
													<?php echo $rowd->nama_gejala; ?>
												</div>
												<div class="col-sm-1" style="text-align: center;">
													<?php echo $rowd->bobot; ?>
												</div>
											<?php }
										}
									?>
								</div>
								<div class="clearfix"></div>
							</div>
							<br><br>
						<?php }
					?>					
					
					<div style="text-align: right">
						<button type="submit" class="btn btn-default">NEXT</button>
					</div>				
				</form>
				<?php } else if ($this->uri->segment(3)==3) { ?>
				<?php echo form_open_multipart('index.php/proses/cbr/1'); ?>
				<?php echo validation_errors(); ?>
				<form class="form-horizontal" role="form">
					<div class="form-group">
						<label for="" class="col-sm-3 control-label">Kasus Baru</label>
						<div class="col-sm-9" style="padding: 0;">
							<div class="col-sm-8" style="text-align: center;"><b>Gejala</b></div>
							<div class="col-sm-1" style="text-align: center;"><b>Bobot</b></div>
							<br>
							<?php
								$d = $this->session->userdata('baru');
								for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
								{
									$sql = $this->db->get_where('gejala', array('kode_gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
									foreach ($sql->result() as $row) {?>
										<div class="col-sm-8">
										<?php echo $row->nama_gejala; ?>
										</div>
										<div class="col-sm-1" style="text-align: center;">
										<?php echo $row->bobot; ?>
										</div>
									<?php }
								}								
							?>							
						</div>
						<div class="clearfix"></div>
					</div>
					<br><br>
					<?php
						$k = array();
						$i = 0;
						$id = "";
						
						for($n = 0; $n <= substr_count(substr($d,0,strlen($d)-1),"#"); $n++)
						{
							$this->db->order_by('kasus', '');
							$sql = $this->db->get_where('kasus_gjl', array('gejala' => explode("#",substr($d,0,strlen($d)-1))[$n]));
							foreach ($sql->result() as $row) {
								if (substr_count($id,$row->kasus."#")<1)
								{
									$id = $id . $row->kasus."#";
									$k[$i] = $row->kasus;
									$i++;
								}								
							}							
						}

						$jmlS = 0;
						$ketS = "";
						sort($k);						
						for($n = 0; $n < count($k); $n++) {?>
							<div class="form-group">
								<label for="" class="col-sm-3 control-label">Kasus Lama <?php echo $k[$n] ?></label>
								<div class="col-sm-9" style="padding: 0;">
									<div class="col-sm-8" style="text-align: center;"><b>Gejala</b></div>
									<div class="col-sm-1" style="text-align: center;"><b>Bobot</b></div>
									<br>
									<?php
										$b = 0;
										$wb = 0;
										$this->db->order_by('gejala', '');
										$sql = $this->db->get_where('kasus_gjl', array('kasus' => $k[$n]));
										foreach ($sql->result() as $row) {
											$idgejala = $row->gejala;
											$sqld = $this->db->get_where('gejala', array('kode_gejala' => $idgejala));
											foreach ($sqld->result() as $rowd) {
												$wb = $wb + (int)$rowd->bobot;
												if (substr_count($d,$idgejala."#")>0)
												{
													$b = $b + (int)$rowd->bobot;
												}?>
												<div class="col-sm-8">
													<?php echo $rowd->nama_gejala; ?>
												</div>
												<div class="col-sm-1" style="text-align: center;">
													<?php echo $rowd->bobot; ?>
												</div>
											<?php }
										}
									?>
									<br>
									<div class="col-sm-8" style="text-align: center;"><i>Similarity</i></div>
									<div class="col-sm-1" style="text-align: center;"><i>
										<?php
											if (round($b / $wb,6) > $jmlS)
											{
												$jmlS = round($b / $wb,6);
												
												$sqldg = $this->db->get_where('kasus', array('id_kasus' => $k[$n]));
												foreach ($sqldg->result() as $rowdg)
												{
													$sqlng = $this->db->get_where('diagnosa', array('kode_diagnosa' => $rowdg->kode_diagnosa));
													foreach ($sqlng->result() as $rowng)
													{
														$ketS = $rowng->nama_diagnosa;
													}
												}
											}											
											echo number_format($b / $wb,6,",",".")
										?>
									</i></div>
								</div>
								<div class="clearfix"></div>
							</div>
							<br><br>
						<?php } ?>

						<div class="form-group">
							<label for="" class="col-sm-3 control-label">Diagnosa</label>
							<div class="col-sm-9" style="padding: 0;">
								<div class="col-sm-8" style="text-align: center;"><i><?php echo $ketS ?></i></div>
							</div>
						</div>						
						
					<div style="text-align: right">
						<button type="submit" class="btn btn-default">FINISH</button>
					</div>				
				</form>
				<?php } ?>
				<?php echo form_close(); ?>				
			</div>
		</div>
	</div>
</div>
</div>
</div>