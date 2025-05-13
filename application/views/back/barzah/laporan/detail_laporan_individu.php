<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<!-- BEGIN : Main Content-->
	<div class="main-content">
		<div class="content-wrapper">
			<section class="">
				<div class="row">
					<div class="col-sm-12">
						<div class="card">
							<div class="card-body">
								<div class="text-capitalize">
									<h1><b><?php echo $page_title . ' - ' . $get_all[0]->nama ?></b></h1>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
								<a href="<?php echo base_url('individu/view/' . $get_all[0]->nik) ?>" class="btn btn-primary text-capitalize"><i class="fa fa-eye"></i> Lihat Data Penduduk</a>
								<span class="pull-right">
								</span>
							</div>

							<div class="card-body">
								<div class="row">
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Nama Penerima Manfaat</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->nama ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-calendar"></i> Tanggal Pengajuan</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->tanggal_transaksi ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-credit-card"></i> No. KTP</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->nik ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-credit-card"></i> No. KK</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->no_kk ?></p>
									</div>
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Alamat</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->alamat ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Desa / Kelurahan </a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->desa_kelurahan ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Kecamatan</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->kecamatan_name ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Kota / Kab</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->kota_kab ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Provinsi</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->provinsi ?></p>
									</div>
								</div>

								<hr>
								<div class="row">
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-book"></i> Nama Program</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->nama_program ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-briefcase"></i> Sub Program </a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->nama_subprogram ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-layers"></i> Bentuk Manfaat / Kegiatan</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->jenis_bantuan ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-users"></i> Jumlah Bantuan (Rp) </a></p>
										<p class="d-block overflow-hidden"><?php echo number_format($get_all[0]->jumlah_bantuan) ?></p>
									</div>
									<div class="col-md-6 text-capitalize">
										<p class="text-bold-500 primary"><a><i class="ft ft-user-check"></i> Asnaf</a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->asnaf ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-briefcase"></i> Sumber Dana </a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->sumber_dana ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-calendar"></i> Periode Menerima Manfaat </a></p>
										<p class="d-block overflow-hidden"><?php echo date("d-m-Y", strtotime($get_all[0]->periode_bantuan)) ?></p>
										<p class="text-bold-500 primary"><a><i class="ft ft-pocket"></i> Total Periode </a></p>
										<p class="d-block overflow-hidden"><?php echo $get_all[0]->total_periode ?></p>
									</div>
								</div>
							</div>

							<div class="card-footer">
								<button class="btn btn-success" onclick="history.back()">Kembali</button>
							</div>
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