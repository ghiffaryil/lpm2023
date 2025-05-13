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
				<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>

				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-12">
										<!-- <ul class="nav nav-tabs">
											<li class="nav-item">
												<a class="nav-link active" id="base-tab1" data-toggle="tab"
													aria-controls="tab1" href="#tab1" aria-expanded="true">Data
													Individu</a>
											</li>
											<li class="nav-item">
												<a class="nav-link" id="base-tab2" data-toggle="tab"
													aria-controls="tab2" href="#tab2" aria-expanded="false">Data
													Komunitas</a>
											</li>
										</ul> -->
										<div class="tab-content mt-4">
											<div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true"
												aria-labelledby="base-tab1">
												<div class="row">
													<table class="table table-striped nowrap" id="tabel-individu" width="100%">
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
															<?php $no = 1; foreach($individu as $data){ ?>
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
																	<a href="<?php echo base_url('shelter/restore/'.$data->id_transaksi_individu) ?>"
																		class="btn btn-sm btn-warning"
																		onClick="return confirm('Are you sure?');"><i
																			class="fa fa-refresh"></i>
																	</a>
																	<a href="<?php echo base_url('shelter/delete_permanent/'.$data->id_transaksi_individu) ?>"
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
</script>