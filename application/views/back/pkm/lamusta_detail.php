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
				<div class="row match-height">
					<div class="col-md-4">
						<div class="card card-primary card-outline">
							<div class="card-body box-profile">
								<div class="text-center">
									<?php if (empty($penduduk->photo)) {?>
										<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>						
									<?php }else{?>
										<div class="container-image">
											<img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$penduduk->photo) ?>" width="100%"/>
											<div class="middle">
												<div class="lihat">
													<a href="<?php echo base_url('assets/photo/'.$penduduk->photo) ?>" class="btn btn-success" target="_blank">Lihat</a>
												</div>
											</div>
										</div>	
									<?php }?>
								</div>	<br>
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
												<b>Jenis Kelamin</b> <span class="float-right"><?php if ($penduduk->jk == 'L') {echo "Laki-laki";}else{echo "Perempuan";} ?></span>
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
										<p><h4>Alamat Identitas</h4></p>
										<ul class="list-group list-group-unbordered mb-3">
											<li class="list-group-item">
												<b>Alamat</b> <span class="float-right"><?php echo $penduduk->alamat ?></span>
											</li>
											<li class="list-group-item">
												<b>Kelurahan</b>
												<span class="float-right">
													<?php foreach($get_all_kelurahan as $row){
														if($penduduk->id_desa_kelurahan == $row->id_desa_kelurahan){
															echo $row->desa_kelurahan;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Kecamatan</b>
												<span class="float-right">
													<?php foreach($get_all_kecamatan as $row){
														if($penduduk->id_kecamatan == $row->id_kecamatan){
															echo $row->kecamatan_name;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Kab/Kota</b>
												<span class="float-right">
													<?php foreach($get_all_kabupaten as $row){
														if($penduduk->id_kota_kab == $row->id_kota_kab){
															echo $row->kota_kab;
														}
													} ?>
												</span>
											</li>
											<li class="list-group-item">
												<b>Provinsi</b>
												<span class="float-right">
													<?php foreach($get_all_provinsi as $row){
														if($penduduk->id_provinsi == $row->id_provinsi){
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
										<p><h4>Alamat Domisili</h4></p>
										<ul class="list-group list-group-unbordered mb-3">
											<li class="list-group-item">
												<b>Alamat</b> <span class="float-right">
													<?php if (empty($penduduk->alamat_domisili)) {
														echo "Alamat domisili sama dengan alamat identitas.";
													}else{
														echo $penduduk->alamat_domisili;
													}?></span>
												</li>
											</ul>
										</div>
										<div class="tab-pane" id="lampiran">
											<div class="row">									
												<div class="col-xl-6 col-lg-6 col-md-6">
													<p>Scan KTP </p>
													<?php if (empty($penduduk->photo_ktp)) {?>
														<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>
													<?php }else{?>
														<div class="container-image">
															<img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$penduduk->photo_ktp) ?>" width="100%"/>
															<div class="middle">
																<div class="lihat">
																	<a href="<?php echo base_url('assets/photo/'.$penduduk->photo_ktp) ?>" class="btn btn-success" target="_blank">Lihat</a>
																	<a href="<?php echo base_url('assets/photo/'.$penduduk->photo_ktp) ?>" class="btn btn-success" target="_blank" download>Download</a>
																</div>
															</div>
														</div>	
													<?php }?>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6">
													<p>Scan KK </p> 
													<?php if (empty($penduduk->photo_kk)) {?>
														<img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>
													<?php }else{?>
														<div class="container-image">
															<img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$penduduk->photo_kk) ?>" width="100%"/>
															<div class="middle">
																<div class="lihat">
																	<a href="<?php echo base_url('assets/photo/'.$penduduk->photo_kk) ?>" class="btn btn-success" target="_blank">Lihat</a>
																	<a href="<?php echo base_url('assets/photo/'.$penduduk->photo_kk) ?>" class="btn btn-success" target="_blank" download>Download</a>
																</div>
															</div>
														</div>	
													<?php }?>											
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
					<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-body">  
									<div class="row">
										<div class="table-responsive">
											<div class="col-md-12">
												<h4 class="card-title mb-2">Total Manfaat Tersalur</h4>
											</div>
											<div class="col-md-6">
												<table width="100%">
													<tbody>
														<tr>
															<th>Total Manfaat (Rp)</th>
															<td>Rp. <?php echo number_format(($data_individu[0]->rincian_individu)+($data_komunitas[0]->rincian_komunitas)) ?></td>
														</tr>
														<tr>
															<th>Jumlah Layanan Diterima</th>
															<td><?php echo ($data_individu[0]->total_individu)+($data_komunitas[0]->total_komunitas) ?> kali</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
									<hr>
									<div class="row">
										<div class="col-md-12">
											<h4 class="card-title mb-3">Manfaat yang Didapat</h4>
										</div>
										<div class="table-responsive">
											<table id="datatable" class="table table-striped nowrap text-capitalize" width="100%">
												<thead>
													<tr>
														<th width="5px">No</th>
														<th>Tanggal</th>
														<th>Kategori</th>
														<th>Nama PM</th>					                
														<th>Desa / Kelurahan</th>
														<th width="75px" style="text-align: center">Detail</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1; foreach($data_detail as $data){
														if($data->is_active == '0'){ $is_active = "";}else{ $is_active = "";}// action
														$detail = '<a href="'.base_url('lamusta/detail/'.$data->nik ).'" class="btn btn-primary btn-sm" title="Detail"><span><i class="ft ft-eye"></i></span></a>';
														?>

														<tr>
															<td><?php echo $no ?></td>
															<td><?php echo $data->created_at ?></td>
															<td><?php echo $data->kategori ?></td>
															<td><?php echo $data->nama ?></td>
															<td style="text-align: left"><?php echo $data->desa_kelurahan ?></td>
															<td style="text-align: center">
																<?php echo $detail ?> 
																<a href="<?php echo base_url('lamusta/create/'.$data->id_individu )?>" class="btn btn-sm btn-success" title="Tambah Manfaat">
																	<i class="ft ft-plus-circle"></i>
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
				</section>
				<br><br><br><br>
			</div>
		</div> 
	</div>

	<?php $this->load->view('back/template/footer'); ?>
