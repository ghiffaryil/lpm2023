<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<div class="main-content">
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="content-header"><?php echo $page_title ?></div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>
			</section>

			<section class="basic-elements">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">

								<div class="row">
									<div class="col-lg-12">
										<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">
											<i class="fa fa-plus-circle"></i> Tambah Manfaat
										</button>
										<hr>
									</div>
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
													Data Individu
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
													Data Komunitas
												</a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table id="tabel-individu" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th>
																<th>PETUGAS/USER</th>
																<th>TGL</th>
																<th>NAMA PM</th>
																<th>NIK</th>

																<th>NO KTP</th>
																<th>JK</th>
																<th>TEMPAT LAHIR</th>
																<th>TGL LAHIR</th>
																<th>USIA</th>

																<th>ALAMAT</th>
																<th>KELURAHAN</th>
																<th>KECAMATAN</th>
																<th>KABUPATEN/KOTA</th>
																<th>PROVINSI</th>

																<th>KODE POS</th>
																<th>EMAIL</th>
																<th>PENDIDIKAN</th>
																<th>PHOTO</th>
																<th>BIDANG & TUGAS</th>

																<th>KOMPETENSI</th>
																<th>PROFESI</th>
																<th>PROGRAM</th>
																<th>SUB PROGAM</th>
																<th>JENIS BANTUAN</th>

																<th>ASNAF</th>
																<th>SUMBER DANA</th>
																<th>JUMLAH BANTUAN</th>
																<th>PERIODE PENERIMA BANTUAN</th>
																<th>TOTAL PERIODE BANTUAN</th>

																<th>REKOMENDER</th>
																<th class="bg-white">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($individu as $data) {
															?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->tanggal_transaksi ?></td>
																	<td><?php echo ucwords($data->nama) ?></td>
																	<td><?php echo $data->nik ?></td>

																	<td><?php echo $data->nik ?></td>
																	<td><?php echo $data->jk ?></td>
																	<td><?php echo $data->tmpt_lahir ?></td>
																	<td><?php echo $data->tgl_lahir ?></td>
																	<td><?php echo $umur[$no - 1] ?></td>

																	<td><?php echo $data->alamat ?></td>
																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>
																	<td><?php echo $data->kota_kab ?></td>
																	<td><?php echo $data->provinsi ?></td>

																	<td><?php echo $data->kodepos ?></td>
																	<td><?php echo $data->email ?></td>
																	<td><?php echo $data->pendidikan ?></td>
																	<td><?php echo $data->photo ?></td>
																	<td><?php echo $data->bidang_tugas ?></td>

																	<td><?php echo $data->kopentensi ?></td>
																	<td><?php echo $data->profesi ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>

																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td> Rp.
																		<?php echo number_format($data->jumlah_bantuan) ?>
																	</td>

																	<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan)) ?>
																	</td>
																	<td><?php echo $data->total_periode ?></td>

																	<td><?php echo $data->nama_rekomender ?></td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('bsl/detail_konselor/' . $data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span> </a>
																		<a href="<?php echo base_url('bsl/update_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i></span></a>
																		<a href="<?php echo base_url('bsl/delete_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span></a>
																	</td>
																</tr>
															<?php
																$no += 1;
															} ?>
														</tbody>
													</table>
												</div>
											</div>

											<div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
												<div class="row">
													<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th>NO</th>
																<th>PETUGAS/USER</th>
																<th>TGL</th>
																<th>NAMA PETUGAS BIMROH</th>
																<th>JK</th>

																<th>NAMA LAPAS</th>
																<th>JUMLAH WARGA BINAAN</th>
																<th>PROGRAM</th>
																<th>SUB PROGAM</th>
																<th>JENIS BANTUAN</th>

																<th>ASNAF</th>
																<th>SUMBER DANA</th>
																<th>JUMLAH BANTUAN</th>
																<th>PERIODE PENERIMA BANTUAN</th>
																<th>TOTAL PERIODE BANTUAN</th>

																<th>REKOMENDER</th>
																<th>NAMA WARGA BINAAN</th>
																<th>JENIS PIDANA PASAL</th>
																<th>JENIS PIDANA KETERANGAN</th>
																<th>MASA HUKUMAN</th>

																<th>BLOK KAMAR</th>
																<th>ALAMAT</th>
																<th class="bg-white">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->tanggal_transaksi ?></td>
																	<td><?php echo $data->nama_penduduk ?></td>
																	<td><?php echo $data->jk ?></td>

																	<td><?php echo $data->nama_komunitas ?></td>
																	<td><?php echo $data->jumlah_pm ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>

																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td>Rp.
																		<?php echo number_format($data->jumlah_bantuan) ?>
																	</td>
																	<td>
																		<?php if ($data->periode_bantuan == '0000-00-00') {
																			echo "-";
																		} else {
																			echo date("d-m-Y", strtotime($data->periode_bantuan));
																		} ?>
																	</td>
																	<td><?php echo $data->total_periode ?></td>

																	<td><?php echo $data->nama_rekomender ?></td>
																	<td><?php echo $data->nama ?></td>
																	<td><?php echo $data->jenispidana_pasal ?></td>
																	<td><?php echo $data->jenispidana_keterangan ?></td>
																	<td><?php echo $data->masahukuman ?></td>

																	<td><?php echo $data->blokkamar ?></td>
																	<td><?php echo $data->alamat ?></td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('bsl/detail_konselor/' . $data->nik_transaksi) ?>" class="btn btn-primary btn-sm" title="Detail"> <span><i class="fa fa-eye"></i></span> </a>
																		<a href="<?php echo base_url('bsl/update_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i></span></a>
																		<a href="<?php echo base_url('bsl/delete_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i></span></a>
																	</td>
																</tr>
															<?php
																$no += 1;
															} ?>
														</tbody>
													</table>
												</div>
											</div>


										</div>

									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<br><br><br><br>
		</div>
	</div>
</div>

<div class="modal fade" id="tambah" role="dialog" aria-labelledby="tambah" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="tambahtitle">Data Penduduk</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<table id="penduduk" class="table-hover table-bordered nowrap" width="100%">
						<thead>
							<tr>
								<th width="5%" class="p-1">No KTP</th>
								<th class="p-1">Nama</th>
								<th class="p-1">Lokasi</th>
								<th width="5%" class="p-1">Manfaat</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($konselor as $data) { ?>
								<tr>
									<td class="p-1"><?php echo $data->nik ?></td>
									<td class="p-1"><?php echo $data->nama ?></td>
									<td class="p-1"><?php echo $data->desa_kelurahan ?></td>
									<td class="p-1">
										<a href="<?php echo base_url('bsl/create/') . $data->nik ?>" class="btn btn-sm btn-primary" title="Tambah Manfaat"><i class="fa fa-plus-circle"></i> Tambah</a>
									</td>
								</tr>
							<?php
								$no += 1;
							} ?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#penduduk').DataTable({
			"scrollX": true,
			"pageLength": 10,
			"fixedColumns": {
				left: '',
				right: 1
			},
			"columnDefs": [
				//{ className: "bg-white", "targets": [ 3 ] },
				{
					orderable: false,
					"targets": [0, 1, 2, 3]
				}
			]
		});

		$('#tabel-individu').DataTable({
			"scrollX": true,
			"pageLength": 10,
			"fixedColumns": {
				left: '',
				right: 1
			},
		});
		$('#tabel-komunitas').DataTable({
			"scrollX": true,
			"pageLength": 10,
			"fixedColumns": {
				left: '',
				right: 1
			},
		});
	});

	$(document).on('shown.bs.modal', function(e) {
		$.fn.dataTable.tables({
			visible: true,
			api: true
		}).columns.adjust();
	});
</script>