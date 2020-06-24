

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
			<h4 style="text-transform: uppercase">Data Diagnosa</h4>

			<p style="margin-bottom: 1em"><a href="<?=base_url()?>index.php/diagnosa/create"><button class="btn btn-success">TAMBAH</button></a></p>

			
						<div class="canvas-wrapper table-responsive">
                                <table class="table table-hover" id="example-datatable">
                                    <thead>
                                        <tr>
                                            <th>Kode Diagnosa</th>
                                            <th>Nama Diagnosa</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                   
									<tbody>
                                    <?php $no=0;  foreach ($dataDiagnosa as $key): $no++ ?>
                                        <tr>
                                            <td class="text-justify"><?php echo $key->kode_diagnosa ?></td>
                                            <td ><?php echo $key->nama_diagnosa ?></td>
                                            <td>
							<a href="<?=base_url('index.php/diagnosa/update/').$key->kode_diagnosa ?>"><button class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
							<a onclick="confirmDelete(<?php echo $key->kode_diagnosa; ?>)"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
						</td>
                                          
                                            
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if(! $dataDiagnosa){ ?>
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
	function confirmDelete($kode_diagnosa) {
		var $idku = $kode_diagnosa;
		var $test = "<?php echo site_url('index.php/diagnosa/delete/'); ?>";
		var $res = $test.concat($idku);

		if (confirm("anda yakin ingin menghapus data diagnosa ?")) {
			document.location.href = $res;
		}
		else {
		}
	}
</script>

	
	