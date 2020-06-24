

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
			<h4 style="text-transform: uppercase">Data Gejala</h4>

			<p style="margin-bottom: 1em"><a href="<?=base_url()?>index.php/gejala/create"><button class="btn btn-success">TAMBAH</button></a></p>

			
						<div class="canvas-wrapper table-responsive">
                                <table class="table table-hover" id="example-datatable">
                                    <thead>
                                        <tr>
                                            <th>Kode Anamnesa</th>
                                            <th>Nama Anamnesa</th>
                                            <th>Bobot</th>
                                            <th>Keterangan</th>
                                            <th>Opsi</th>
                                        </tr>
                                    </thead>
                                   
									<tbody>
                                    <?php $no=0;  foreach ($dataGejala as $key): $no++ ?>
                                        <tr>
                                            <td class="text-justify"><?php echo $key->kode_gejala ?></td>
                                            <td ><?php echo $key->nama_gejala ?></td>
                                            <td ><?php echo $key->bobot ?></td>
                                            <td ><?php echo $key->keterangan ?></td>
                                            <td>
							<a href="<?=base_url('index.php/gejala/update/').$key->kode_gejala ?>"><button class="btn btn-warning"><span class="fa fa-pencil"></span></button></a>
							<a onclick="confirmDelete(<?php echo $key->kode_gejala; ?>)"><button class="btn btn-danger"><span class="fa fa-trash"></span></button></a>
						</td>
                                          
                                            
                                        </tr>
                                    <?php endforeach ?>
                                    <?php if(! $dataGejala){ ?>
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


	</div>	<!--/.main-->
	
	<script type="text/javascript">
	function confirmDelete($kode_gejala) {
		var $idku = $kode_gejala;
		var $test = "<?php echo site_url('index.php/gejala/delete/'); ?>";
		var $res = $test.concat($idku);

		if (confirm("anda yakin ingin menghapus data gejala ?")) {
			document.location.href = $res;
		}
		else {
		}
	}
</script>