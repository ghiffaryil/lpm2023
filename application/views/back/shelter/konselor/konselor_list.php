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
										<div class="tab-content">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table id="tabel-individu" class="table table-hover nowrap" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th>
																<th>Petugas</th>
																<th>Tgl</th>
																<th>Nama Pemohon</th>
																<th>No KTP</th>
																<th>Nama KK</th>
																<th>No KK</th>
																<th>Jml Anggota Kel.</th>
																<th>JK</th>
																<th>Tempat Lahir</th>
																<th>Tgl Lahir</th>
																<th>Usia</th>
																<th>Alamat</th>
																<th>Kelurahan</th>
																<th>Kecamatan</th>
																<th>Kab./Kota</th>
																<th>Provinsi</th>
																<th>Kode Pos</th>
																<th>Telp</th>
																<th>Status Pernikahan</th>
																<th>Pendidikan</th>
																<th>Pekerjaan</th>
																<th>Photo</th>
																<th>Program</th>
																<th>Sub Program</th>
																<th>Jenis Bantuan</th>
																<th>Asnaf</th>
																<th>Sumber Dana</th>
																<th>Periode Bantuan</th>
																<th>Total Periode</th>
																<th>Rekomender</th>
																<th>Pendamping 1</th>
																<th>Pendamping 2</th>
																<th>Jml Pendamping</th>
																<th>Lama Inap</th>
																<th>Penyakit</th>
																<th class="bg-white">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($individu as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->tanggal_transaksi ?></td>
																	<td><?php echo ucwords($data->nama) ?></td>
																	<td><?php echo $data->nik ?></td>
																	<td><?php echo ucwords($data->nama_kk) ?></td>
																	<td><?php echo $data->no_kk ?></td>
																	<td><?php echo $data->jum_individu ?></td>
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
																	<td><?php echo $data->no_hp ?></td>
																	<td><?php echo $data->status_perkawinan ?></td>
																	<td><?php echo $data->pendidikan ?></td>
																	<td><?php echo $data->pekerjaan ?></td>
																	<td><?php echo $data->photo ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td><?php echo $data->periode_bantuan ?></td>
																	<td><?php echo $data->total_periode ?></td>
																	<td><?php echo $data->nama_rekomender ?></td>
																	<td><?php echo $detail_pendamping1[$no - 1] ?></td>
																	<td><?php echo $detail_pendamping2[$no - 1] ?></td>
																	<td><?php echo $data->total_pendamping ?></td>
																	<td><?php echo $data->lama_inap ?></td>
																	<td><?php echo $data->penyakit ?></td>
																	<td class="text-center bg-white">
																		<a href="<?php echo base_url('shelter/detail_konselor/' . $data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
																		<a href="<?php echo base_url('shelter/update_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-success btn-sm" title="Edit"><span><i class="fa fa-pencil"></i></span></a>
																		<a href="<?php echo base_url('shelter/delete/' . $data->id_transaksi_individu) ?>" class="btn btn-danger btn-sm" title="Delete"><span><i class="fa fa-trash"></i></span></a>
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
								<th class="p-1" width="5%">NO KTP</th>
								<th class="p-1">NAMA</th>
								<th class="p-1">LOKASI</th>
								<th class="p-1" width="5%">MANFAAT</th>
							</tr>
						</thead>
						<tbody>
							<?php $no = 1;
							foreach ($konselor as $data) { ?>
								<tr>
									<td class="p-1"><?php echo $data->nik ?></td>
									<td class="p-1"><?php echo strtoupper(strtolower($data->nama)) ?></td>
									<td class="p-1"><?php echo $data->desa_kelurahan ?></td>
									<td class="p-1">
										<a href="<?php echo base_url('shelter/create/') . $data->nik ?>" class="btn btn-sm btn-primary" title="Tambah Manfaat"><i class="fa fa-plus-circle"></i> Tambah</a>
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
			"columnDefs": [{
				className: "bg-white",
				"targets": [27]
			}]
		});

		$('#tabel-komunitas').DataTable({
			"scrollX": true,
			"pageLength": 10,
			"fixedColumns": {
				left: '',
				right: 1
			},
			"columnDefs": [{
				className: "bg-white",
				"targets": [25]
			}]
		});
	});

	$(document).on('shown.bs.modal', function(e) {
		$.fn.dataTable.tables({
			visible: true,
			api: true
		}).columns.adjust();
	});

	function warning() {
		Swal.fire({
			title: 'Warning',
			html: 'Data tidak dapat diubah.',
			icon: 'warning',
		})
	}
</script>