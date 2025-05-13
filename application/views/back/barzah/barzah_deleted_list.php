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
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
													Individu
												</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
													Komunitas
												</a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table id="tabel-individu" class="table table-striped nowrap" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th> <!-- 0 -->
																<th>PETUGAS/USER</th> <!-- 1 -->
																<th>TGL</th> <!-- 1 -->
																<th>NAMA PM </th> <!-- 7 -->
																<th>NO KTP</th> <!-- 7 -->

																<th>NAMA KK</th> <!-- 1 -->
																<th>NO KK</th> <!-- 1 -->
																<th>JML ANGGOTA KEL</th> <!-- 1 -->
																<th>JK</th> <!-- 1 -->
																<th>TEMPAT LAHIR</th> <!-- 1 -->

																<th>USIA</th> <!-- 1 -->
																<th>ALAMAT</th> <!-- 1 -->
																<th>KELURAHAN</th> <!-- 1 -->
																<th>KECAMATAN</th> <!-- 1 -->
																<th>KAB/KOTA</th> <!-- 1 -->

																<th>PROVINSI</th> <!-- 1 -->
																<th>KODE POS</th> <!-- 1 -->
																<th>TELP</th> <!-- 1 -->
																<th>PENDIDIKAN</th> <!-- 1 -->
																<th>PHOTO</th> <!-- 1 -->

																<th>PROGRAM</th> <!-- 1 -->
																<th>SUB PROGAM</th> <!-- 1 -->
																<th>JENIS BANTUAN</th> <!-- 1 -->
																<th>ASNAF</th> <!-- 1 -->
																<th>SUMBER DANA</th> <!-- 1 -->

																<th>PERIODE PENERIMA BANTUAN</th> <!-- 1 -->
																<th>TOTAL PERIODE</th> <!-- 1 -->
																<th>REKOMENDER</th> <!-- 1 -->
																<th>SEBAB KEMATIAN</th> <!-- 1 -->

																<th>TEMPAT MENINGGAL</th> <!-- 3 -->
																<th>MENINGGALKAN</th> <!-- 3 -->
																<th class="bg-white">Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($individu as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->created_at ?></td>
																	<td><?php echo $data->nama ?></td>
																	<td><?php echo $data->nik ?></td>

																	<td><?php echo $data->nama_kk ?></td>
																	<td><?php echo $data->no_kk ?></td>
																	<td><?php echo $data->jum_individu ?></td>
																	<td><?php echo $data->jk ?></td>
																	<td><?php echo $data->tmpt_lahir ?></td>

																	<td>
																		<?php
																		$lahir = new DateTime($data->tgl_lahir);
																		$today = new DateTime();
																		$umur  = $today->diff($lahir);
																		echo $umur->y . " Thn";
																		?>
																	</td>
																	<td><?php echo $data->alamat ?></td>
																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>
																	<td><?php echo $data->kota_kab ?></td>

																	<td><?php echo $data->provinsi ?></td>
																	<td><?php echo $data->kodepos ?></td>
																	<td><?php echo $data->no_hp ?></td>
																	<td><?php echo $data->pendidikan ?></td>
																	<td><?php echo $data->photo ?></td>

																	<td><?php echo $data->nama_program ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>

																	<td><?php echo $data->periode_bantuan ?></td>
																	<td><?php echo $data->total_periode ?></td>
																	<td><?php echo $data->nama_rekomender ?></td>
																	<td><?php echo $data->sebab_kematian ?></td>

																	<td><?php echo $data->tempat_meninggal ?></td>
																	<td><?php echo $data->meninggalkan ?></td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('barzah/restore_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-sm btn-warning" onClick="return confirm('Are you sure?');"><i class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('barzah/delete_permanent_individu/' . $data->id_transaksi_individu) ?>" onClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>
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
																<th>NAMA KOMUNITAS </th>
																<th>PROFIL KOMUNITAS</th>

																<th>ALAMAT</th>
																<th>KELURAHAN</th>
																<th>KECAMATAN</th>
																<th>KAB/KOTA</th>
																<th>PROVINSI</th>

																<th>KODE POS</th>
																<th>NO TELP</th>
																<th>NAMA PJ</th>
																<th>NIK PJ</th>
																<th>PHOTO KOMUNITAS</th>

																<th>PROGRAM</th>
																<th>SUB PROGAM</th>
																<th>JENIS BANTUAN</th>
																<th>ASNAF</th>
																<th>SUMBER DANA</th>

																<th>JUMLAH BANTUAN</th>
																<th>PERIODE PENERIMA BANTUAN</th>
																<th>TOTAL PERIODE BANTUAN</th>
																<th>JUMLAH PM</th>
																<th>REKOMENDER</th>

																<th class="bg-white">ACTION</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo $data->created_by ?></td>
																	<td><?php echo $data->created_at ?></td>
																	<td><?php echo $data->nama_komunitas ?></td>
																	<td><?php echo $data->profil_komunitas ?></td>

																	<td><?php echo $data->alamat ?></td>
																	<td><?php echo $data->desa_kelurahan ?></td>
																	<td><?php echo $data->kecamatan_name ?></td>
																	<td><?php echo $data->kota_kab ?></td>
																	<td><?php echo $data->provinsi ?></td>

																	<td><?php echo $data->kodepos ?></td>
																	<td><?php echo $data->no_hp ?></td>
																	<td><?php echo $data->nama ?></td>
																	<td><?php echo $data->nik ?></td>
																	<td><?php echo $data->legalitas_1 ?></td>


																	<td><?php echo $data->nama_program ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>

																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
																	<td><?php echo $data->periode_bantuan ?></td>
																	<td><?php echo $data->total_periode ?></td>
																	<td><?php echo $data->jumlah_pm ?></td>
																	<td><?php echo $data->nama_rekomender ?></td>
																	<td class="bg-white">
																		<a href="<?php echo base_url('barzah/restore_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-sm btn-warning" onClick="return confirm('Are you sure?');"><i class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('barzah/delete_permanent_komunitas/' . $data->id_transaksi_komunitas) ?>" onClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">
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

<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {

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
</script>