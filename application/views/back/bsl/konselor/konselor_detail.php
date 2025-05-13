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
				<div class="row match-height">
					<div class="col-md-4">
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<?php if (empty($penduduk->photo)) { ?>
										<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
									<?php } else { ?>
										<div class="container-image">
											<img class="img-fluid image" src="<?php echo base_url('assets/photo/' . $penduduk->photo) ?>" width="100%" />
											<div class="middle">
												<div class="lihat">
													<a href="<?php echo base_url('assets/photo/' . $penduduk->photo) ?>" class="btn btn-success" target="_blank">Lihat</a>
												</div>
											</div>
										</div>
									<?php } ?>
								</div> <br>
								<ul class="list-group list-group-unbordered mb-3">
									<li class="list-group-item text-center text-uppercase bg-name">
										<?php echo $penduduk->nama ?>
									</li>
									<li class="list-group-item">
										<b>ID </b> <a class="float-right"><?php echo $penduduk->id_penduduk ?></a>
									</li>
									<li class="list-group-item">
										<b>No KTP</b> <a class="float-right"><?php echo $penduduk->nik ?></a>
									</li>
									<li class="list-group-item">
										<b>No KK</b> <a class="float-right"><?php echo $penduduk->no_kk ?></a>
									</li>
									<li class="list-group-item">
										<b>Tgl Daftar</b> <a class="float-right"><?php echo date('d-m-Y', strtotime($penduduk->created_at)) ?></a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<div class="col-md-8">
						<div class="card">
							<div class="card-header p-2" style="background-color: #EFEFEF">
								<ul class="nav nav-pills">
									<li class="nav-item">
										<a class="nav-link active" href="#identitas" data-toggle="tab">Identitas</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#alamat" data-toggle="tab">Alamat</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#kontak" data-toggle="tab">Kontak</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" href="#lampiran" data-toggle="tab">Lampiran</a>
									</li>
								</ul>
							</div>
							<div class="card-body">
								<div class="tab-content">
									<div class="tab-pane active text-capitalize" id="identitas">
										<ul class="list-group list-group-unbordered mb-3 table-hover">
											<li class="list-group-item">
												<b>Tempat Lahir</b> <span class="float-right"><?php echo $penduduk->tmpt_lahir ?></span>
											</li>
											<li class="list-group-item">
												<b>Tgl. Lahir</b> <span class="float-right"><?php echo date('d-m-Y', strtotime($penduduk->tgl_lahir)) ?></span>
											</li>
											<li class="list-group-item">
												<b>Pendidikan</b> <span class="float-right"><?php echo $penduduk->pendidikan ?></span>
											</li>
											<li class="list-group-item">
												<b>Status Perkawinan</b> <span class="float-right"><?php echo $penduduk->status_perkawinan ?></span>
											</li>
											<li class="list-group-item">
												<b>Jumlah Keluarga</b> <span class="float-right"><?php echo $penduduk->jum_individu ?> Orang</span>
											</li>
											<li class="list-group-item">
												<b>Kepala Keluarga</b> <span class="float-right"><?php echo $penduduk->nama_kk ?></span>
											</li>
											<li class="list-group-item">
												<b>Jenis Kelamin</b> <span class="float-right"><?php if ($penduduk->jk == 'L') {
																									echo "Laki-laki";
																								} else {
																									echo "Perempuan";
																								} ?></span>
											</li>
											<li class="list-group-item">
												<b>Agama</b> <a class="float-right"><?php echo $penduduk->agama ?></a>
											</li>
											<li class="list-group-item">
												<b>Pekerjaan</b> <span class="float-right"><?php echo $penduduk->pekerjaan ?></span>
											</li>
											<li class="list-group-item">
												<b>Kewarganegaraan</b> <span class="float-right"><?php echo $penduduk->kewaranegaraan ?></span>
											</li>
										</ul>
									</div>
									<div class="tab-pane" id="kontak">
										<ul class="list-group list-group-unbordered mb-3">
											<li class="list-group-item">
												<b>Telpon</b> <a href="tel:<?php echo $penduduk->no_hp ?>" class="float-right"><?php echo $penduduk->no_hp ?></a>
											</li>
											<li class="list-group-item">
												<b>Email</b> <a href="mailto:<?php echo $penduduk->email ?>" class="float-right text-lowcase"><?php echo $penduduk->email ?></a>
											</li>
										</ul>
									</div>
									<div class="tab-pane text-capitalize" id="alamat">
										<p>
										<h4>Alamat Identitas</h4>
										</p>
										<ul class="list-group list-group-unbordered mb-3">
											<li class="list-group-item">
												<b>Alamat</b> <span class="float-right"><?php echo $penduduk->alamat ?></span>
											</li>
											<li class="list-group-item">
												<b>Kelurahan</b>
												<span class="float-right">
													<?php foreach ($get_all_kelurahan as $row) {
														if ($penduduk->id_desa_kelurahan == $row->id_desa_kelurahan) {
															echo $row->desa_kelurahan;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Kecamatan</b>
												<span class="float-right">
													<?php foreach ($get_all_kecamatan as $row) {
														if ($penduduk->id_kecamatan == $row->id_kecamatan) {
															echo $row->kecamatan_name;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Kab/Kota</b>
												<span class="float-right">
													<?php foreach ($get_all_kabupaten as $row) {
														if ($penduduk->id_kota_kab == $row->id_kota_kab) {
															echo $row->kota_kab;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Provinsi</b>
												<span class="float-right">
													<?php foreach ($get_all_provinsi as $row) {
														if ($penduduk->id_provinsi == $row->id_provinsi) {
															echo $row->provinsi;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Negara</b>
												<span class="float-right">
													<?php echo $penduduk->negara; ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Kode Pos</b>
												<span class="float-right">
													<?php echo $penduduk->kodepos; ?>
												</span>
											</li>
										</ul>
										<p>
										<h4>Alamat Domisili</h4>
										</p>
										<ul class="list-group list-group-unbordered mb-3">
											<li class="list-group-item">
												<b>Alamat</b> <span class="float-right">
													<?php if (empty($penduduk->alamat_domisili)) {
														echo "Alamat domisili sama dengan alamat identitas.";
													} else {
														echo $penduduk->alamat_domisili;
													} ?></span>
											</li>
										</ul>
									</div>
									<div class="tab-pane" id="lampiran">
										<div class="row">
											<div class="col-xl-6 col-lg-6 col-md-6">
												<p>Scan KTP </p>
												<?php if (empty($penduduk->photo_ktp)) { ?>
													<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
												<?php } else { ?>
													<div class="container-image">
														<img class="img-fluid image" src="<?php echo base_url('assets/photo/' . $penduduk->photo_ktp) ?>" width="100%" />
														<div class="middle">
															<div class="lihat">
																<a href="<?php echo base_url('assets/photo/' . $penduduk->photo_ktp) ?>" class="btn btn-success" target="_blank">Lihat</a>
																<a href="<?php echo base_url('assets/photo/' . $penduduk->photo_ktp) ?>" class="btn btn-success" target="_blank" download>Download</a>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
											<div class="col-xl-6 col-lg-6 col-md-6">
												<p>Scan KK </p>
												<?php if (empty($penduduk->photo_kk)) { ?>
													<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png') ?>" width="100%" />
												<?php } else { ?>
													<div class="container-image">
														<img class="img-fluid image" src="<?php echo base_url('assets/photo/' . $penduduk->photo_kk) ?>" width="100%" />
														<div class="middle">
															<div class="lihat">
																<a href="<?php echo base_url('assets/photo/' . $penduduk->photo_kk) ?>" class="btn btn-success" target="_blank">Lihat</a>
																<a href="<?php echo base_url('assets/photo/' . $penduduk->photo_kk) ?>" class="btn btn-success" target="_blank" download>Download</a>
															</div>
														</div>
													</div>
												<?php } ?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<section class="basic-elements">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="table-responsive">
										<div class="col-md-12">
											<h4 class="card-title mb-2">Total Pengajuan </h4>
										</div>
										<div class="col-md-6">
											<table width="100%">
												<tbody>
													<tr>
														<th>Total Permohonan (Rp)</th>
														<td>Rp. <?php echo number_format(($data_individu[0]->jumlah_bantuan) + ($data_komunitas[0]->jumlah_bantuan)) ?></td>
													</tr>
													<tr>
														<th>Jumlah Pengajuan</th>
														<td><?php echo ($data_individu[0]->total_individu) + ($data_komunitas[0]->total_komunitas) ?> kali (Individu : <?= $data_individu[0]->total_individu ?> / Komunitas : <?= $data_komunitas[0]->total_komunitas ?>) </td>
													</tr>
												</tbody>
											</table>
										</div>
									</div>
								</div>
								<hr>
								<div class="row">
									<div class="col-md-12">
										<h4 class="card-title mb-3">Rincian Pengajuan</h4>
									</div>
									<div class="col-md-12">
										<ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Data Individu</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Data Komunitas</a>
											</li>
										</ul>
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
												<div class="row">
													<table class="table table-striped nowrap text-capitalize datatable" width="100%">
														<thead>
															<tr>
																<th width="5px">No</th>
																<th>Tanggal</th>
																<th>Sumber Dana</th>
																<th>Program</th>
																<th>Sub Program</th>
																<th>Asnaf</th>

																<th>Periode Bantuan</th>
																<th>Total Periode</th>

																<th>Jenis Bantuan</th>
																<th>Jumlah Bantuan</th>
																<th>Bidang Dan Tugas</th>
																<th>Profesi</th>
																<th>Kopetensi</th>
																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($detail_individu as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
																	<td><?php echo $data->sumber_dana ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan)) ?></td>
																	<td><?php echo $data->total_periode ?></td>

																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>

																	<td><?php echo $data->bidang_tugas ?></td>
																	<td><?php echo $data->profesi ?></td>
																	<td><?php echo $data->kopentensi  ?></td>
																	<td>
																		<?php if ($data->status == '0') { ?>
																			<a href="<?php echo base_url('bsl/update_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i> Edit</span></a>
																			<a href="<?php echo base_url('bsl/delete_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i> Delete</span></a>
																		<?php } else { ?>
																			<a class="btn btn-success btn-sm" disabled><span><i class="fa fa-pencil"></i> Edit</span></a>
																		<?php } ?>
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
																<th>No</th>
																<th>Tanggal</th>
																<th>Nama Lapas</th>
																<th>Program</th>
																<th>Sub Program</th>
																<th>Asnaf</th>
																<th>Periode Bantuan</th>
																<th>Total Periode</th>

																<th>Jenis Bantuan</th>
																<th>Jumlah Bantuan</th>
																<th>Jumlah PM</th>

																<th>Action</th>
															</tr>
														</thead>
														<tbody>
															<?php $no = 1;
															foreach ($detail_komunitas as $data) { ?>
																<tr>
																	<td><?php echo $no ?></td>
																	<td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
																	<td><?php echo strtolower($data->nama_komunitas) ?></td>
																	<td><?php echo strtolower($data->nama_program) ?></td>
																	<td><?php echo $data->nama_subprogram ?></td>
																	<td><?php echo $data->asnaf ?></td>
																	<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan)) ?></td>
																	<td><?php echo $data->total_periode ?></td>

																	<td><?php echo $data->jenis_bantuan ?></td>
																	<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>

																	<td><?php echo $data->jumlah_pm ?></td>


																	<td>
																		<?php if ($data->status == '0') { ?>
																			<a href="<?php echo base_url('bsl/update_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i> Edit</span></a>
																			<a href="<?php echo base_url('bsl/delete_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-danger btn-sm"><span><i class="fa fa-trash"></i> Delete</span></a>
																		<?php } else { ?>
																			<a class="btn btn-success btn-sm" disabled><span><i class="fa fa-pencil"></i> Edit</span></a>
																		<?php } ?>
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
			<?php echo $btn_back ?><br><br><br><br>
		</div>
	</div>
</div>

<?php $this->load->view('back/template/footer'); ?>