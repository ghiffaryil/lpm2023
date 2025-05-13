<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
<!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper">
        <section class="basic-elements">
          <div class="row">
            <div class="col-sm-12">
              <div class="content-header text-capitalize">Detail Data</div>
            </div>
          </div>
		  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
          <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body"> 
						<div class="row">
							<div class="col-md-6 text-capitalize">
				              <p class="lead"> &nbsp;</p>
				              <div class="table-responsive">
				                <table class="table">
				                  <tbody>
				                    <tr>
				                      <td><i class="fa fa-arrow-circle-right"></i> <a>Jenis Armada</a></td>
				                      <td class="text-right"><?php echo $armada->jenis_armada ?></td>
				                    </tr>
				                    <tr>
				                      <td><i class="fa fa-arrow-circle-right"></i> <a>Merk Armada</a></td>
				                      <td class="text-right"><?php echo $armada->merk_armada ?></td>
				                    </tr>
				                    <tr>
				                      <td class="text-bold-800"><i class="fa fa-arrow-circle-right"></i> <a>No Polisi</a></td>
				                      <td class="text-bold-800 text-right"><?php echo $armada->no_polisi ?></td>
				                    </tr>
				                    <tr>
				                      <td><i class="fa fa-arrow-circle-right"></i> <a>No Rangka</a></td>
				                      <td class="text-right"><?php echo $armada->no_rangka ?></td>
				                    </tr>
				                    <tr>
				                      <td class="text-bold-800"><i class="fa fa-arrow-circle-right"></i> <a>No Mesin</a></td>
				                      <td class="text-bold-800 text-right"><?php echo $armada->no_mesin ?></td>
				                    </tr>
				                    <tr>
				                      <td><i class="fa fa-arrow-circle-right"></i> <a>Tahun</a></td>
				                      <td class="text-right"><?php echo $armada->tahun ?></td>
				                    </tr>
				                    <tr>
				                      <td class="text-bold-800"><i class="fa fa-arrow-circle-right"></i> <a>Posko Armada</a></td>
				                      <td class="text-bold-800 text-right"><?php echo $armada->lokasi_armada ?></td>
				                    </tr>
				                    <tr>
				                      <td class="text-bold-800"><i class="fa fa-arrow-circle-right"></i> <a>Petugas</a></td>
				                      <td class="text-bold-800 text-right"><?php echo $armada->nama_1.' & '.$armada->nama_2 ?></td>
				                    </tr>
				                    <tr>
				                    	<td></td>
				                    	<td></td>
				                    </tr>
				                  </tbody>
				                </table>
				              </div>
							</div>
							<div class="col-md-6">
								<p class="text-bold-500 primary"><a>Foto Armada</a></p>
								<p class="d-block overflow-hidden">
									<?php if (empty($armada->foto)) {?>
				                      	<img class="img-fluid image" src="<?= base_url('app-assets/img/no-image.png')?>" width="100%" style="height: 370px;"/>
				                  	<?php }else{?>
				                    	<div class="container-image" style="margin-top: -15px;">
					                      	<img class="img-fluid image" src="<?php echo base_url('assets/armada/'.$armada->foto) ?>" width="100%" style="height: 370px;" />
					                      	<div class="middle">
					                        	<div class="lihat">
					                          		<a href="<?php echo base_url('assets/armada/'.$armada->foto) ?>" class="btn btn-success" target="_blank">Lihat</a>
					                          		<a href="<?php echo base_url('assets/armada/'.$armada->foto) ?>" class="btn btn-success" target="_blank" download>Download</a>
					                        	</div>
					                      	</div>
				                    	</div>  
				                  <?php }?>
								</p>
							</div>
						</div>					
				</div>
				<div class="card-footer">
					<button class="btn btn-success" onclick="history.back()">Kembali</button>
				</div>
			</div>
		</div>
	    </section>
          <br><br><br><br>
        </div>
    </div> 
</div>

<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
        $(document).ready(function() {
          $('#datatable_1').DataTable({
          	"dom"	      : '',
            "scrollX"     : true,
            "scrollY"     : false
          });
        } );
</script>