

	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
			<div class="tables">
		<div class="table-responsive bs-example widget-shadow">
			<h4 style="text-transform: uppercase">Data Kasus</h4>

			<p style="margin-bottom: 1em"><a href="<?=base_url()?>index.php/kasus/create"><button class="btn btn-success">TAMBAH</button></a></p>

			
						<div class="canvas-wrapper table-responsive">
                                <table class="table table-hover" id="example-datatable">
                                    <thead>
                                        <tr>
                                            <th width="10%">Kode Kasus</th>
                                            <th width="15%">Nama Diagnosa</th>
											<th>Gejala</th>
											<th>Tindakan</th>                                           
                                            <th width="10%">Opsi</th>
                                        </tr>
                                    </thead>
                                   
									<tbody>
                                    <?php $no=0;  foreach ($dataKasus as $key): $no++ ?>
                                        <tr>
                                            <td ><?php echo $key->id_kasus ?></td>
                                            <td ><?php echo $key->nama_diagnosa ?></td>
											<td align="justify">
												<?php
													$this->db->order_by('gejala');
													$sql = $this->db->get_where('kasus_gjl', array('kasus' => $key->id_kasus));
													foreach ($sql->result() as $row) {
														$sqln = $this->db->get_where('gejala', array('kode_gejala' => $row->gejala));
														$rown = $sqln->row();														
														echo $rown->nama_gejala . "<br><br>";
													}
												?>							
											</td>
											<td align="justify">
												<?php
													$this->db->order_by('tindakan');
													$sql = $this->db->get_where('kasus_tnd', array('kasus' => $key->id_kasus));
													foreach ($sql->result() as $row) {
														$sqln = $this->db->get_where('tindakan', array('kode_tindakan' => $row->tindakan));
														$rown = $sqln->row();														
														echo $rown->nama_tindakan . "<br><br>";
													}
												?>							
											</td>
											<td>
												<a href="<?=base_url('index.php/kasus/update/').$key->id_kasus ?>"><button class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
												<a onclick="confirmDelete(<?php echo $key->id_kasus; ?>)"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
												<?php if ($key->acc=='0') { ?>
												<br /><br /><br />
												<a href="<?=base_url('index.php/kasus/rekom/').$key->id_kasus ?>"><button class="btn btn-success">Rekom</button></a>
												<?php } ?>
											</td>                                            
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if(! $dataKasus){ ?>
                                        <tr>
                                            <td colspan="7" style="text-align: center;">
                                                -- No records found --
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>

                                </table>
                            </div>
                        </div>
			
	</div>


	</div>	

	<script type="text/javascript">
	function confirmDelete($id_kasus) {
		var $idku = $id_kasus;
		var $test = "<?php echo site_url('index.php/kasus/delete/'); ?>";
		var $res = $test.concat($idku);

		if (confirm("anda yakin ingin menghapus data Kasus ?")) {
			document.location.href = $res;
		}
		else {
		}
	}
</script>

	
	