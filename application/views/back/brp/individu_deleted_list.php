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
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true"> Data Individu </a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false"> Data Komunitas </a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table id="tabel-individu" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th width="5px">NO</th> <!-- 0 -->
																<th>PETUGAS/USER</th>
																<th>TGL</th>
																<th>NAMA PM</th>
																<th>NO KTP</th>

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
																<th class="bg-white">ACTION</th>
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
																	</td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('brp/restore_individu/'.$data->id_transaksi_individu) ?>"
																		class="btn btn-sm btn-warning"
																		onClick="return confirm('Are you sure?');"><i
																			class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('brp/delete_permanent_individu/'.$data->id_transaksi_individu) ?>"
																			onClick="return confirm('Are you sure?');"
																			class="btn btn-sm btn-danger"><i
																				class="fa fa-remove"></i>
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
													<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th>NO</th>
																<th>PETUGAS/USER</th>
																<th>TGL</th>
																<th>NAMA PETUGAS BIMROH</th>
																<th>JK</th>

																<th>NAMA RUMAH SAKIT</th>
																<th>JUMLAH PASIEN</th>
																<th>PROGRAM</th>
																<th>SUB PROGAM</th>
																<th>JENIS BANTUAN</th>

																<th>ASNAF</th>
																<th>SUMBER DANA</th>
																<th>JUMLAH BANTUAN</th>
																<th>PERIODE PENERIMA BANTUAN</th>
																<th>TOTAL PERIODE BANTUAN</th>

																<th>REKOMENDER</th>
																<th>TGL KUNJUNGAN</th>
																<th>KUNJUNGAN KE</th>
																<th>NAMA PASIEN</th>
																<th>USIA</th>

																<th>JENIS PENYAKIT</th>
																<th>RUANG PERAWATAN</th>
																<th>KELAS</th>
																<th>ALAMAT RUMAH</th>
																<th>KELURAHAN</th> <!-- 9 -->
																<th>KECAMATAN</th> <!-- 10 -->
																<th>KABUPATEN/KOTA</th> <!-- 11 -->
																<th>PROVINSI</th> <!-- 12 -->
																<th>KESAN</th>
																<th class="bg-white">ACTION</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->tanggal_transaksi ?></td>
																	<td><?php echo ucwords($data->nama_penduduk) ?></td>
																	<td><?php echo $data->jk ?></td>

																	<td><?php echo ucwords($data->nama_komunitas) ?></td>
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
																	<td> <?php echo $data->rencana_bantuan ?> </td>
																	<td><?php echo $data->kunjungan ?></td>
																	<td><?php echo ucwords($data->nama_penduduk) ?></td>
																	<td><?php echo $umur_komunitas[$no - 1] ?></td>

																	<td><?php echo $data->penyakit ?></td>
																	<td> <?php echo $data->ruang_perawatan ?></td>
																	<td><?php echo $data->kls_kamar ?></td>
																	<td><?php echo $data->alamat ?></td>
																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>
																	<td><?php echo $data->kota_kab ?></td>
																	<td><?php echo $data->provinsi ?></td>
																	<td><?php echo $data->kesan ?></td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('brp/restore_komunitas/'.$data->id_transaksi_komunitas) ?>"
																		class="btn btn-sm btn-warning"
																		onClick="return confirm('Are you sure?');"><i
																			class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('brp/delete_permanent_komunitas/'.$data->id_transaksi_komunitas) ?>"
																			onClick="return confirm('Are you sure?');"
																			class="btn btn-sm btn-danger">
																			<i class="fa fa-remove"></i>
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

<script type="text/javascript" src="<?= base_url()?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
	$('#tabel-individu').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 10,
	    	"fixedColumns":   {
            left: '',
            right: 1
        },
	    });
	    $('#tabel-komunitas').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 10,
	    	"fixedColumns":   {
            left: '',
            right: 1
        },
	    });
</script>