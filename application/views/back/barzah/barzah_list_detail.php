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
						<div class="content-header text-capitalize">List Data - <?php echo $get_all[0]->nama ?></div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<a href="<?php echo base_url('barzah/view/' . $get_all[0]->nik) ?>" class="btn btn-primary text-capitalize"><i class="fa fa-eye"></i> Lihat Data Penduduk</a>
								<span class="pull-right">
									<?php if ($get_all[0]->is_active == '0') {
										$is_active = "";
									} else {
										$is_active = "";
									}
									$edit = '<a href="' . base_url('barzah/update/' . $get_all[0]->nik) . '" class="btn btn-success" title="Ubah"><span><i class="fa fa-pencil">
								</i></span></a>';
									$delete = '<a href="' . base_url('barzah/delete/' . $get_all[0]->id_barzah) . '" onClick="return confirm(\'Are you sure?\');" class="btn btn-danger" title="Hapus"><span><i class="fa fa-trash"></i></span></a>';
									?>
									<?php echo $edit ?> <?php echo $delete ?>
								</span>
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Nama Jenazah</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->nama ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-activity"></i> Sebab Kematian</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->sebab_kematian ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-layers"></i> Bentuk Layanan</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->bentuk_layanan ?></p>
									</div>
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Tempat Meninggal </a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->tempat_meninggal ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Meninggalkan</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->meninggalkan ?></p>
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
			"dom": '',
			"scrollX": true,
			"scrollY": false
		});
	});
</script>