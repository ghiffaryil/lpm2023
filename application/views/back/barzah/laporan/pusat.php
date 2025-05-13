<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

<style type="text/css">
	.highcharts-figure,
	.highcharts-data-table table {
		min-width: 320px;
		max-width: 660px;
		margin: 1em auto;
	}

	.highcharts-data-table table {
		font-family: Verdana, sans-serif;
		border-collapse: collapse;
		border: 1px solid #ebebeb;
		margin: 10px auto;
		text-align: center;
		width: 100%;
		max-width: 500px;
	}

	.highcharts-data-table caption {
		padding: 1em 0;
		font-size: 1.2em;
		color: #555;
	}

	.highcharts-data-table th {
		font-weight: 600;
		padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
		padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
		background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
		background: #f1f7ff;
	}
</style>

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
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
													Laporan Individu
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
													Laporan Komunitas
												</a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">

													<div class="col-lg-12" style="z-index: 9;">
														<div class="row">
															<div class="col-lg-6">
																<figure class="highcharts-figure">
																	<div id="chart1"></div>
																</figure>
															</div>
															<div class="col-lg-6">
																<figure class="highcharts-figure">
																	<div id="chart2"></div>
																</figure>
															</div>
														</div>
														<hr>
													</div>

													<div class="col-lg-12 col-xs-12">
														<div class="row">
															<div class="col-xs-12 col-lg-4">
																<fieldset class="form-group">
																	<p>Tanggal Awal</p>
																	<input type="text" class="form-control" id="min">
																</fieldset>
															</div>
															<div class="col-xs-12 col-lg-4">
																<fieldset class="form-group">
																	<p>Tanggal Akhir</p>
																	<input type="text" class="form-control" id="max">
																</fieldset>
															</div>
															<div class="col-xs-12 col-lg-4 d-none">
																<fieldset class="form-group">
																	<p>Filter Status</p>
																	<select type="text" class="form-control selectpicker" id="cariindividu">
																		<option>&nbsp;</option>
																		<option value="Proses">Proses</option>
																		<option value="Diajukan">Diajukan</option>
																		<option value="Disetujui">Disetujui</option>
																		<option value="Dibayar">Dibayar</option>
																		<option value="Dipending">Dipending</option>
																		<option value="Ditolak">Ditolak</option>
																	</select>
																</fieldset>
															</div>
														</div>
													</div>
													<div class="col-lg-6">
														<h5>Rekap berdasarkan Posko</h5>
														<table class="table table-bordered table-striped nowrap">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Nama Posko</th>
																	<th>Jumlah Layanan </th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1;
																foreach ($total_sub_program as $row) : ?>
																	<tr>
																		<td><?= $i; ?></td>
																		<td><?= $row['sub_program'] ?></td>
																		<td><?= $row['jumlah_pm']  ?></td>
																	</tr>
																<?php $i++;
																endforeach; ?>
															</tbody>
														</table>
													</div>

													<div class="col-lg-6">
														<h5>Rekap berdasarkan Kota/kab Tujuan layanan</h5>
														<table class="table table-bordered table-striped nowrap">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Kota/kab</th>
																	<th>Jumlah Layanan </th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1;
																foreach ($total_kab_kota_individu as $row) : ?>
																	<tr>
																		<td><?= $i; ?></td>
																		<td><?= $row['kota_kab'] ?></td>
																		<td><?= $row['jumlah_pm']  ?></td>
																	</tr>
																<?php $i++;
																endforeach; ?>
															</tbody>
														</table>
													</div>

													<div class="col-lg-6">
														<h5>Rekap berdasarkan sebab kematian</h5>
														<table class="table table-bordered table-striped nowrap">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Sakit</th>
																	<th>Jumlah </th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1;
																foreach ($total_sebab_kematian_individu as $row) : ?>
																	<tr>
																		<td><?= $i; ?></td>
																		<td><?= $row['sebab_kematian'] ?></td>
																		<td><?= $row['jumlah_pm']  ?></td>
																	</tr>
																<?php $i++;
																endforeach; ?>
															</tbody>
														</table>
													</div>

													<table id="tabel-individu" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th> <!-- 0 -->
																<th>Nama Penerima Manfaat</th> <!-- 1 -->
																<th>No. KTP</th> <!-- 1 -->
																<th>Nama KK </th> <!-- 7 -->
																<th>No. KK</th> <!-- 7 -->

																<th>Nama Program</th> <!-- 3 -->
																<th>Sub Program</th> <!-- 3 -->
																<th>Bentuk Manfaat/Kegiatan</th> <!-- 3 -->
																<th>Jml Anggota Keluarga</th> <!-- 3 -->
																<th>Jumlah Penghasilan per Bulan (Awal)</th> <!-- 3 -->


																<th>Jenis Kelamin</th> <!-- 3 -->
																<th>Tempat Lahir</th> <!-- 6 -->
																<th>Tgl Lahir</th> <!-- 6 -->
																<th>No Hp </th> <!-- 3 -->
																<th>Alamat</th> <!-- 5 -->

																<th>Provinsi</th> <!-- 5 -->
																<th>Kota/Kabupaten</th> <!-- 5 -->
																<th>Kecamatan</th> <!-- 5 -->
																<th>Kelurahan / Desa</th> <!-- 5 -->
																<th>Asnaf</th> <!-- 5 -->

																<th>Sumber Dana</th> <!-- 5 -->
																<th>Periode Menerima Manfaat</th> <!-- 5 -->
																<th>Total Periode</th> <!-- 5 -->
																<th>Jumlah Bantuan (Rp)</th> <!-- 5 -->
																<th>Jumlah Penghasilan Setalah Program Berjalan</th> <!-- 5 -->

																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($individu as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo ucwords($data->nama) ?></td>
																	<td><?php echo $data->nik ?></td>
																	<td><?php echo $data->no_kk ?></td>
																	<td><?php echo $data->nama_kk ?></td>

																	<td><?php echo $data->nama_program ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td><?php echo $data->jum_individu ?></td>
																	<td><?php echo $data->jumlah_penghasilan ?></td>

																	<td><?php echo $data->jk ?></td>
																	<td><?php echo $data->tmpt_lahir ?></td>
																	<td><?php echo $data->tgl_lahir ?></td>
																	<td><?php echo $data->no_hp ?></td>
																	<td><?php echo $data->alamat ?></td>

																	<td><?php echo $data->provinsi ?></td>
																	<td><?php echo $data->kota_kab ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>
																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->asnaf ?></td>

																	<td><?php echo $data->sumber_dana ?></td>
																	<td><?php echo $data->periode_bantuan ?></td>
																	<td><?php echo $data->total_periode ?></td>
																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
																	<?php if ($data->penghasilan_bulan == NULL) { ?>
																		<td>Rp. <?php echo $data->penghasilan_bulan ?></td>
																	<?php } else { ?>
																		<td>Rp. <?php echo number_format($data->penghasilan_bulan) ?></td>
																	<?php } ?>

																	<td class="text-center">
																		<a href="<?php echo base_url('barzah/detail_laporan_individu/' . $data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
																		</a>
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
													<div class="col-lg-12" style="z-index: 9;">
														<div class="row">
															<div class="col-lg-6">
																<figure class="highcharts-figure">
																	<div id="chart3"></div>
																</figure>
															</div>
															<div class="col-lg-6">
																<figure class="highcharts-figure">
																	<div id="chart4"></div>
																</figure>
															</div>
														</div>
														<hr>
													</div>
													<div class="col-lg-12">
														<div class="row">
															<div class="col-lg-4">
																<fieldset class="form-group">
																	<p>Tanggal Awal</p>
																	<input type="text" class="form-control" id="minKom">
																</fieldset>
															</div>
															<div class="col-lg-4">
																<fieldset class="form-group">
																	<p>Tanggal Akhir</p>
																	<input type="text" class="form-control" id="maxKom">
																</fieldset>
															</div>
															<div class="col-lg-4 d-none">
																<fieldset class="form-group">
																	<p>Filter Status</p>
																	<select type="text" class="form-control selectpicker" id="carikomunitas" style="width:100%">
																		<option>&nbsp;</option>
																		<option value="Proses">Proses</option>
																		<option value="Diajukan">Diajukan</option>
																		<option value="Disetujui">Disetujui</option>
																		<option value="Dibayar">Dibayar</option>
																		<option value="Dipending">Dipending</option>
																		<option value="Ditolak">Ditolak</option>
																	</select>
																</fieldset>
															</div>
														</div>
													</div>

													<div class="col-lg-6">
														<h5>Penghuni Shelter berdasarkan Wilayah</h5>
														<table class="table table-bordered table-striped nowrap">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Provinsi</th>
																	<th>Kota/Kab</th>
																	<th>Jumlah Pelaksanaan</th>
																	<th>Pasien</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>&nbsp;</td>
																	<td><?= $total_provinsi; ?></td>
																	<td><?= $total_kab_kota; ?></td>
																	<td><?= $total_pendamping ?></td>
																	<td><?= $total_pm ?></td>
																</tr>
															</tbody>
														</table>
													</div>

													<div class="col-lg-6">
														<h5>Rekap PM Berdasarkan Jenis Kelamin</h5>
														<table class="table table-bordered table-striped nowrap">
															<thead>
																<tr>
																	<th>No</th>
																	<th>Jenis Kelamin</th>
																	<th>Jumlah PM</th>
																</tr>
															</thead>
															<tbody>
																<?php $i = 1;
																foreach ($total_jk as $row) : ?>
																	<tr>
																		<td><?= $i; ?></td>
																		<td><?php echo $row['jk'] == "L" ? "Laki-laki" : "Perempuan" ?></td>
																		<td><?= $row['jumlah_pm']  ?></td>
																	</tr>
																<?php $i++;
																endforeach; ?>
															</tbody>
														</table>
													</div>

													<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th>NO</th>
																<th>Nama Komunitas</th>
																<th>Nama Program</th>
																<th>Sub Program </th>
																<th>Bentuk Manfaat/Kegiatan</th>

																<th>Jml Individu</th>
																<th>Alamat / Lokasi </th>
																<th>Provinsi</th>
																<th>Kota/Kabupaten</th>
																<th>Kecamatan</th>

																<th>Desa</th>
																<th>Asnaf</th>
																<th>Sumber Dana</th>
																<th>Periode Menerima Manfaat</th>
																<th>Total Periode</th>

																<th>Jumlah Bantuan (Rp)</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->nama_komunitas ?></td>
																	<td><?php echo $data->nama_program ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->bentuk_manfaat ?></td>

																	<td><?php echo $data->jum_individu ?></td>
																	<td><?php echo $data->alamat ?></td>
																	<td><?php echo $data->provinsi ?></td>
																	<td><?php echo $data->kota_kab ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>

																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td><?php echo $data->periode_bantuan ?></td>
																	<td><?php echo $data->total_periode ?></td>

																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
																	<td>
																		<a href="<?php echo base_url('barzah/detail_laporan_komunitas/' . $data->nik_transaksi) ?>" class="btn btn-primary btn-sm" title="Detail">
																			<span><i class="fa fa-eye"></i></span>
																		</a>
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

<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- script src="https://code.highcharts.com/modules/exporting.js"></script -->
<!-- script src="https://code.highcharts.com/modules/export-data.js"></script -->
<!-- script src="https://code.highcharts.com/modules/accessibility.js"></script -->

<script src="<?php echo base_url('assets/vendors/js/') ?>dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>buttons.print.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<script type="text/javascript">
	var minDate, maxDate, minDate2, maxDate2;

	$.fn.dataTable.ext.search.push(
		function(settings, data, dataIndex) {
			var min = minDate.val();
			var max = maxDate.val();
			var date = new Date(data[1]);

			if (
				(min === null && max === null) ||
				(min === null && date <= max) ||
				(min <= date && max === null) ||
				(min <= date && date <= max) ||
				(min == date && date == max) ||
				(min == date && date === null) ||
				(min === null && date == max)
			) {
				return true;
			}
			return false;
		}
	);

	$.fn.dataTable.ext.search.push(
		function(settings, data, dataIndex) {
			var min2 = minDate2.val();
			var max2 = maxDate2.val();
			var date2 = new Date(data[1]);

			if (
				(min2 === null && max2 === null) ||
				(min2 === null && date2 <= max2) ||
				(min2 <= date2 && max2 === null) ||
				(min2 <= date2 && date2 <= max2)
			) {
				return true;
			}
			return false;
		}
	);

	$(document).ready(function() {

		minDate = new DateTime($('#min'), {
			format: 'YYYY-MM-DD'
		});
		maxDate = new DateTime($('#max'), {
			format: 'YYYY-MM-DD'
		});

		minDate2 = new DateTime($('#minKom'), {
			format: 'YYYY-MM-DD'
		});
		maxDate2 = new DateTime($('#maxKom'), {
			format: 'YYYY-MM-DD'
		});

		var table = $('#tabel-individu').DataTable({
			"scrollX": true,
			"searchPanes": {
				cascadePanes: true
			},
			"searchPanes": true,
			"columnDefs": [{
				searchPanes: {
					show: true,
				},
				targets: [1, 5],
			}],
			"pageLength": 26,
			"dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			// "dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			"language": {
				"lengthMenu": "_MENU_",
				"info": "Page _PAGE_ of _PAGES_",
				"infoFiltered": "(filtered from _MAX_ total records)"
			},
			"buttons": [{
					extend: 'copy',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]
					}
				},
				{
					extend: 'csv',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]
					}
				},
				{
					extend: 'excel',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25]
					},
					customize: function(win) {

						var last = null;
						var current = null;
						var bod = [];

						var css = '@page { size: landscape; }',
							head = win.document.head || win.document.getElementsByTagName('head')[0],
							style = win.document.createElement('style');

						style.type = 'text/css';
						style.media = 'print';

						if (style.styleSheet) {
							style.styleSheet.cssText = css;
						} else {
							style.appendChild(win.document.createTextNode(css));
						}

						head.appendChild(style);
					}
				}
			]
		});

		var table2 = $('#tabel-komunitas').DataTable({
			"scrollX": true,
			"searchPanes": {
				cascadePanes: true
			},
			"searchPanes": true,
			"columnDefs": [{
				searchPanes: {
					show: true,
				},
				targets: [1],
			}],
			"pageLength": 17,
			"dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			// "dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			"language": {
				"lengthMenu": "_MENU_",
				"info": "Page _PAGE_ of _PAGES_",
				"infoFiltered": "(filtered from _MAX_ total records)"
			},
			"buttons": [{
					extend: 'copy',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
					}
				},
				{
					extend: 'csv',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
					}
				},
				{
					extend: 'excel',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
					}
				},
				{
					extend: 'print',
					exportOptions: {
						columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16]
					},
					customize: function(win) {

						var last = null;
						var current = null;
						var bod = [];

						var css = '@page { size: landscape; }',
							head = win.document.head || win.document.getElementsByTagName('head')[0],
							style = win.document.createElement('style');

						style.type = 'text/css';
						style.media = 'print';

						if (style.styleSheet) {
							style.styleSheet.cssText = css;
						} else {
							style.appendChild(win.document.createTextNode(css));
						}

						head.appendChild(style);
					}
				}
			]
		}).searchPanes.rebuildPane();

		$('#min, #max').on('change', function() {
			table.draw();
		});

		$('#minKom, #maxKom').on('change', function() {
			table2.draw();
		});

		$('#cariindividu').change(function() {
			table.search($(this).val()).draw();
		})

		$('#carikomunitas').change(function() {
			table2.search($(this).val()).draw();
		})

		var chart = Highcharts.chart('chart1', {
			chart: {
				type: 'pie',
			},
			title: {
				text: 'Jenis Bantuan',
			},
			series: [{
				data: chartData(table),
			}, ],
		});

		var charts = Highcharts.chart('chart2', {
			chart: {
				type: 'pie'
			},
			title: {
				text: 'Sumber Dana',
			},
			series: [{
				data: chartDatas(table),
			}, ],
		});

		var chart2 = Highcharts.chart('chart3', {
			chart: {
				type: 'pie',
			},
			title: {
				text: 'Nama Komunitas',
			},
			series: [{
				data: chartData2(table2),
			}, ],
		});

		var charts2 = Highcharts.chart('chart4', {
			chart: {
				type: 'pie'
			},
			title: {
				text: 'Bentuk Manfaat',
			},
			series: [{
				data: chartDatas2(table2),
			}, ],
		});

		table.on('draw', function() {
			chart.series[0].setData(chartData(table));
		});

		table.on('draw', function() {
			charts.series[0].setData(chartDatas(table));
		});

		table2.on('draw', function() {
			chart2.series[0].setData(chartData2(table2));
		});

		table2.on('draw', function() {
			charts2.series[0].setData(chartDatas2(table2));
		});
	});

	function chartData(table) {
		var counts = {};

		table
			.column(7, {
				search: 'applied'
			})
			.data()
			.each(function(val) {
				if (counts[val]) {
					counts[val] += 1;
				} else {
					counts[val] = 1;
				}
			});

		return $.map(counts, function(val, key) {
			return {
				name: key,
				y: val,
				sliced: true,
			};
		});
	}

	function chartDatas(table) {
		var count = {};

		table
			.column(20, {
				search: 'applied'
			})
			.data()
			.each(function(val) {
				if (count[val]) {
					count[val] += 1;
				} else {
					count[val] = 1;
				}
			});

		return $.map(count, function(val, key) {
			return {
				name: key,
				colorByPoint: true,
				y: val,
				sliced: true,
				// selected: true
			};
		});
	}

	function chartData2(table2) {
		var counts2 = {};

		table2
			.column(1, {
				search: 'applied'
			})
			.data()
			.each(function(val) {
				if (counts2[val]) {
					counts2[val] += 1;
				} else {
					counts2[val] = 1;
				}
			});

		return $.map(counts2, function(val, key) {
			return {
				name: key,
				y: val,
				sliced: true,
			};
		});
	}

	function chartDatas2(table2) {
		var count2 = {};

		table2
			.column(4, {
				search: 'applied'
			})
			.data()
			.each(function(val) {
				if (count2[val]) {
					count2[val] += 1;
				} else {
					count2[val] = 1;
				}
			});

		return $.map(count2, function(val, key) {
			return {
				name: key,
				colorByPoint: true,
				y: val,
				sliced: true,
				// selected: true
			};
		});
	}
</script>