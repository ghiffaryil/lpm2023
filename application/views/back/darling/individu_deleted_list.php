<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<div class="main-content">
		<div class="content-wrapper">
			<section class="basic-elements">
				<div class="row">
					<div class="col-sm-12">
						<div class="content-header"><?php echo $page_title ?></div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data
													Individu</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Data
													Komunitas</a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table class="table table-striped nowrap text-capitalize datatable" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th> <!-- 0 -->
																<th>PETUGAS/USER</th> <!-- 1 -->
																<th>TGL</th>
																<th>NAMA PM</th>
																<th>NO KTP</th>
																<th>JK</th>
																<th>TEMPAT LAHIR</th>
																<th>TANGGL LAHIR</th>
																<th>USIA</th>
																<th>ALAMAT</th>
																<th>KELURAHAN</th>
																<th>KECAMATAN</th>
																<th>KAB/KOTA</th>
																<th>PROVINSI</th>
																<th>KODE POS</th>
																<th>TELP</th>
																<th>PENDIDIKAN TERKAHIR</th>
																<th>PHOTO</th>
																<th>PROGRAM</th>
																<th>SUB PROGRAM</th>
																<th>JENIS BANTUAN</th>
																<th>ASNAF</th>
																<th>SUMBER DANA</th>
																<th>JUMLAH BANTUAN</th>
																<th>PERIODE PENERIMAAN BANTUAN</th>
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
																	<td><?php echo $data->pendidikan ?></td>
																	<td><?php echo $data->photo ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
																	<td>
																		<?php if ($data->periode_bantuan == '0000-00-00') {
																			echo "-";
																		} else {
																			echo date("d-m-Y", strtotime($data->periode_bantuan));
																		} ?>
																	</td>
																	<td><?php echo $data->total_periode ?></td>
																	<td> <?php echo $data->nama_rekomender ?></td>
																	<td>
																		<a href="<?php echo base_url('darling/restore_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-sm btn-warning" onClick="return confirm('Are you sure?');"><i class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('darling/delete_permanent_individu/' . $data->id_transaksi_individu) ?>" onClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i>
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
													<table id="datatable" class="table table-striped nowrap text-capitalize" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th>
																<th>Tanggal</th>
																<th>Komunitas</th>
																<th>Program</th>
																<th>Sub Program</th>
																<th>Asnaf</th>
																<th>Permohonan</th>
																<th>Rekomendasi</th>
																<th>Rencana</th>
																<th>Mekanisme</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo date("d-m-Y", strtotime($data->created_at)) ?>
																	</td>
																	<td><?php echo strtolower($data->nama_komunitas) ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td>Rp.
																		<?php echo number_format($data->jumlah_permohonan) ?>
																	</td>
																	<td><?php echo $data->rekomendasi_bantuan ?></td>
																	<td>
																		<?php if ($data->rencana_bantuan == '0000-00-00') {
																			echo "-";
																		} else {
																			echo date("d-m-Y", strtotime($data->rencana_bantuan));
																		} ?>
																	</td>
																	<td>
																		<?php if ($data->rekomendasi_bantuan == 'Ditolak') {
																			echo "-";
																		} else {
																			echo $data->mekanisme_bantuan;
																		} ?>
																	</td>
																	<td>
																		<a href="<?php echo base_url('lamusta/restore_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-sm btn-warning" onClick="return confirm('Are you sure?');"><i class="fa fa-refresh"></i>
																		</a>
																		<a href="<?php echo base_url('lamusta/delete_permanent_komunitas/' . $data->id_transaksi_komunitas) ?>" onClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger">
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
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer'); ?>