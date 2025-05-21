<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css"
href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css">
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
				<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
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
												<a class="nav-link active" id="base-tab1" data-toggle="tab"
												aria-controls="tab1" href="#tab1" aria-expanded="true">
												Laporan Individu
											</a>
										</li>
										<li class="nav-item">
											<a class="nav-link" id="base-tab2" data-toggle="tab"
											aria-controls="tab2" href="#tab2" aria-expanded="false">
											Laporan Komunitas
										</a>
									</li>
								</ul>
								<div class="tab-content mt-4">
									<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
									aria-labelledby="base-tab1">
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
														<select type="text"
														class="form-control selectpicker"
														id="cariindividu">
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

									<table id="tabel-individu" class="table table-striped nowrap display" width="100%">
									<thead>
										<tr>
											<th width="5px">No</th> <!-- 0 -->
											<th>PETUGAS/USER</th> <!-- 1 -->
											<th>TGL</th> <!-- 2 -->
											<th>NAMA PM</th> <!-- 3 -->
											<th>NO KTP</th> <!-- 4 -->

											<th>JK</th>
											<th>TEMPAT LAHIR</th>
											<th>TANGGL LAHIR</th>
											<th>USIA</th>
											<th>ALAMAT</th>

											<th>KELURAHAN</th> <!-- 9 -->
											<th>KECAMATAN</th> <!-- 10 -->
											<th>KABUPATEN/KOTA</th> <!-- 11 -->
											<th>PROVINSI</th> <!-- 12 -->
											<th>KODE POS</th> <!-- 12 -->

											<th>TELP</th> <!-- 12 -->
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
											<th>Action</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1; foreach($individu as $data){ ?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $data->created_by ?></td>
												<td><?php echo $data->tanggal_transaksi ?></td>
												<td><?php echo ucwords($data->nama) ?></td>
												<td><?php echo $data->nik ?></td>

												<td><?php echo $data->jk ?></td>
												<td><?php echo $data->tmpt_lahir ?></td>
												<td><?php echo $data->tgl_lahir ?></td>
												<td><?php echo $umur[$no-1] ?></td>
												<td><?php echo $data->alamat ?></td>

												<td><?php echo $data->desa_kelurahan ?></td>
												<td><?php echo $data->kecamatan_name ?></td>
												<td><?php echo $data->kota_kab ?></td>
												<td><?php echo $data->provinsi ?></td>
												<td><?php echo $data->kodepos ?></td>

												<td><?php echo $data->no_hp ?></td>
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
												<td>Rp.
													<?php echo number_format($data->jumlah_bantuan) ?>
												</td>
												<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan	)) ?></td>
												<td><?php echo $data->total_periode ?></td>


												<td><?php echo $data->nama_rekomender ?></td>
												<td class="text-center">
													<a href="<?php echo base_url('pdm/detail_laporan_individu/'.$data->nik) ?>"
														class="btn btn-primary btn-sm"
														title="Detail"><span><i
															class="fa fa-eye"></i></span>
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

									<table id="tabel-komunitas" class="table table-striped nowrap"
									width="100%">
									<thead>
										<tr>
											<th>NO</th>
											<th>PETUGAS/USER</th>
											<th>TGL</th>
											<th>NAMA PETUGAS BIMROH</th>
											<th>NAMA YAYASAN</th>
											<th>JUMLAH PENERIMA MANFAAT</th>

											<th>PROGRAM</th>
											<th>SUB PROGRAM</th>

											<th>JENIS BANTUAN</th>
											<th>ASNAF</th>
											<th>SUMBER DANA</th>

											<th>JUMLAH BANTUAN</th>
											<th>PERIODE PENERIMA BANTUAN</th>
											<th>TOTAL PERIODE BANTUAN</th>

											<th>REKOMENDER</th>

											<th>NIK PASIEN</th>
											<th>NAMA PASIEN</th>
											<th>USIA</th>
											<th>JK</th>

											<th>STATUS PERNIKAHAN</th>

											<th>TEMPAT LAHIR</th>
											<th>TANGGAL LAHIR</th>

											<th>ALAMAT RUMAH</th>
											<th>KELURAHAN</th>
											<th>KECAMATAN</th>
											<th>KOTA/KAB</th>
											<th>PROVINSI</th>

											<th>FAKTOR PENYEBAB</th>
											<th>PRA BIMROH</th>
											<th>PASCA BIMROH</th>
											<th>Action</th>
										</tr>
									</thead>
									<!-- VALUE NYA BELUM -->
									<tbody>
										<?php $no = 1; foreach($komunitas as $data){ ?>
											<tr>
												<td><?php echo $no ?></td>
												<td><?php echo $data->created_by ?></td>
												<td><?php echo $data->tanggal_transaksi ?></td>
												<td><?php echo $data->nama_penduduk ?></td>
												<td><?php echo $data->profil_komunitas ?></td>

												<td><?php echo $data->jumlah_pm ?> Orang</td>

												<td><?php echo strtolower($data->nama_program) ?></td>
												<td><?php echo $data->nama_subprogram ?></td>

												<td><?php echo $data->jenis_bantuan ?></td>
												<td><?php echo $data->asnaf ?></td>
												<td><?php echo $data->sumber_dana ?></td>


												<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>

												<td>
													<?php if ($data->periode_bantuan == '0000-00-00') {
														echo "-";
													}else{
														echo date("d-m-Y", strtotime($data->periode_bantuan	));
													} ?>
												</td>

												<td><?php echo $data->total_periode ?></td>
												<td><?php echo $data->nama_rekomender ?></td>


												<td><?php echo $data->nik_transaksi ?></td>
												<td><?php echo ucwords($data->nama_penduduk) ?></td>
												<td><?php echo strtolower('FOTO') ?></td>
												<td><?php echo $data->jk ?></td>

												<td><?php echo $data->status_perkawinan ?></td>

												<td><?php echo $data->tmpt_lahir ?></td>
												<td><?php echo $data->tgl_lahir ?></td>

												<td><?php echo $data->alamat ?></td>
												<td>
													<?php foreach($get_all_kelurahan as $row){
														if($data->id_desa_kelurahan_komunitas == $row->id_desa_kelurahan){
															echo $row->desa_kelurahan;
														}
													} ?>
												</td>
												<td>
													<?php foreach($get_all_kecamatan as $row){
														if($data->id_kecamatan_komunitas == $row->id_kecamatan){
															echo $row->kecamatan_name;
														}
													} ?>
												</td>
												<td>
													<?php foreach($get_all_kabupaten as $row){
														if($data->id_kota_kab_komunitas == $row->id_kota_kab){
															echo $row->kota_kab;
														}
													} ?>
												</td>
												<td>
													<?php foreach($get_all_provinsi as $row){
														if($data->id_provinsi_komunitas == $row->id_provinsi){
															echo $row->provinsi;
														}
													} ?>
												</td>

												<td><?php echo "-" #$data->faktor_penyebab ?></td>
												<td><?php echo "-" #$data->pra_bimroh ?></td>
												<td><?php echo "-" #$data->pasca_bimroh ?></td>

												<td>
													<a href="<?php echo base_url('pdm/detail_laporan_komunitas/'.$data->nik) ?>"
														class="btn btn-primary btn-sm" title="Detail">
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

<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js">
</script>
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
		function (settings, data, dataIndex) {
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
		function (settings, data, dataIndex) {
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

	$(document).ready(function () {

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
			scrollX: true,
			responsive: true,
			searchPanes: {
				cascadePanes: true
			},
			columnDefs: [{
				searchPanes: {
					show: true,
				},
				targets: [1, 5],
			}],
			pageLength: 31,
			dom: '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			language: {
				lengthMenu: "_MENU_",
				info: "Page _PAGE_ of _PAGES_",
				infoFiltered: "(filtered from _MAX_ total records)"
			},
			"buttons": [{
				extend: 'copy',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24, 25, 26, 27, 28, 29, 30, 31]
				}
			},
			{
				extend: 'csv',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24, 25, 26, 27, 28, 29, 30, 31]
				}
			},
			{
				extend: 'excel',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24, 25, 26, 27, 28, 29, 30, 31]
				}
			},
			{
				extend: 'print',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24, 25, 26, 27, 28, 29, 30, 31]
				},
				customize: function (win) {

					var last = null;
					var current = null;
					var bod = [];

					var css = '@page { size: landscape; }',
					head = win.document.head || win.document.getElementsByTagName('head')[
						0],
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
			"pageLength": 25,
			"dom"    	: '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rtt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			// "dom": '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
			"language": {
				"lengthMenu": "_MENU_",
				"info": "Page _PAGE_ of _PAGES_",
				"infoFiltered": "(filtered from _MAX_ total records)"
			},
			"buttons": [{
				extend: 'copy',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
						20, 21, 22
						]
				}
			},
			{
				extend: 'csv',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
						20, 21, 22
						]
				}
			},
			{
				extend: 'excel',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
						20, 21, 22
						]
				}
			},
			{
				extend: 'print',
				exportOptions: {
					columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19,
						20, 21, 22
						]
				},
				customize: function (win) {

					var last = null;
					var current = null;
					var bod = [];

					var css = '@page { size: landscape; }',
					head = win.document.head || win.document.getElementsByTagName('head')[
						0],
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

		$('#min, #max').on('change', function () {
			table.draw();
		});

		$('#minKom, #maxKom').on('change', function () {
			table2.draw();
		});

		$('#cariindividu').change(function () {
			table.search($(this).val()).draw();
		})

		$('#carikomunitas').change(function () {
			table2.search($(this).val()).draw();
		})

		var chart = Highcharts.chart('chart1', {
			chart: {
				type: 'pie',
			},
			title: {
				text: 'Asnaf',
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
				text: 'Rekomendasi',
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
				text: 'Asnaf',
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
				text: 'Sub Program',
			},
			series: [{
				data: chartDatas2(table2),
			}, ],
		});

		table.on('draw', function () {
			chart.series[0].setData(chartData(table));
		});

		table.on('draw', function () {
			charts.series[0].setData(chartDatas(table));
		});

		table2.on('draw', function () {
			chart2.series[0].setData(chartData2(table2));
		});

		table2.on('draw', function () {
			charts2.series[0].setData(chartDatas2(table2));
		});
	});

function chartData(table) {
	var counts = {};

	table
	.column(25, {
		search: 'applied'
	})
	.data()
	.each(function (val) {
		if (counts[val]) {
			counts[val] += 1;
		} else {
			counts[val] = 1;
		}
	});

	return $.map(counts, function (val, key) {
		return {
			name: key,
			y: val,
		};
	});
}

function chartDatas(table) {
	var count = {};

	table
	.column(30, {
		search: 'applied'
	})
	.data()
	.each(function (val) {
		if (count[val]) {
			count[val] += 1;
		} else {
			count[val] = 1;
		}
	});

	return $.map(count, function (val, key) {
		return {
			name: key,
			colorByPoint: true,
			y: val,
			sliced: true,
			selected: true
		};
	});
}

function chartData2(table2) {
	var counts2 = {};

	table2
	.column(16, {
		search: 'applied'
	})
	.data()
	.each(function (val) {
		if (counts2[val]) {
			counts2[val] += 1;
		} else {
			counts2[val] = 1;
		}
	});

	return $.map(counts2, function (val, key) {
		return {
			name: key,
			y: val,
		};
	});
}

function chartDatas2(table2) {
	var count2 = {};

	table2
	.column(13, {
		search: 'applied'
	})
	.data()
	.each(function (val) {
		if (count2[val]) {
			count2[val] += 1;
		} else {
			count2[val] = 1;
		}
	});

	return $.map(count2, function (val, key) {
		return {
			name: key,
			colorByPoint: true,
			y: val,
			sliced: true,
			selected: true
		};
	});
}
</script>