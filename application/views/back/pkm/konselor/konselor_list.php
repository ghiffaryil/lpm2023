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
										<div class="row">
											<table id="tabel-individu" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
														<th class="text-center" width="5px">No</th> <!-- 0 -->
														<th>PETUGAS</th> <!-- 1 -->
														<th>TGL</th> <!-- 1 -->
														<th>NAMA PM</th> <!-- 6 -->
														<th>NO KTP</th> <!-- 6 -->
														<th>NAMA KK</th> <!-- 5 -->
														<th>NO KK</th> <!-- 3 -->
														<th>JML ANGGOTA KEL</th> <!-- 6 -->
														<th>JK</th> <!-- 7 -->
														<th>TEMPAT LAHIR</th> <!-- 7 -->
														<th>TGL LAHIR</th> <!-- 7 -->
														<th>USIA</th> <!-- 7 -->
														<th>ALAMAT</th> <!-- 8 -->
														<th>KELURAHAN</th> <!-- 9 -->
														<th>KECAMATAN</th> <!-- 10 -->
														<th>KABUPATEN/KOTA</th> <!-- 11 -->
														<th>PROVINSI</th> <!-- 12 -->
														<th>KODE POS</th> <!-- 12 -->
														<th>TELP</th> <!-- 12 -->
														<th>STATUS PERNIKANAH</th> <!-- 12 -->
														<th>Pendidikan Terakhir</th> <!-- 12 -->
														<th>PEKERJAAN</th> <!-- 12 -->
														<th>PHOTO</th> <!-- 12 -->
														<th>PROGRAM</th> <!-- 13 -->
														<th>SUB PROGRAM</th> <!-- 14 -->
														<th>JENIS BANTUAN</th> <!-- 14 -->
														<th>ASNAF</th> <!-- 17 -->
														<th>SUMBER DANA</th> <!-- 16 -->
														<th>JUMLAH BANTUAN</th> <!-- 20 -->
														<th>PERIODE PENERIMA BANTUAN</th> <!-- 20 -->
														<th>TOTAL PERIODE BANTUAN</th> <!-- 20 -->
														<th>PENYALUR</th> <!-- 18 -->
														<th>REKOMENDER</th> <!-- 16 -->
														<!-- <th>KETERANGAN</th> 16 -->
														<th class="bg-white">Action</th>
													</tr>
												</thead>
												<tbody>
													<?php $no = 1;
													foreach ($individu as $data) { ?>
														<tr>
															<td class="text-center"><?php echo $no ?></td>
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
															<td>
																<?php
																	$lahir = new DateTime($data->tgl_lahir);
																	$today = new DateTime();
																	$umur  = $today->diff($lahir);
																	echo $umur->y." Thn";
																?>
															</td>
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
															<td> Rp.
																<?php echo number_format($data->jumlah_bantuan) ?>
															</td>

															<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan)) ?></td>


															<td><?php echo $data->total_periode ?></td>
															<td><?php echo $data->penyalur ?></td>
															<td><?php echo $data->nama_rekomender ?></td>
															<td class="text-center bg-white">
																<a href="<?php echo base_url('pkm/detail_konselor/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
																<a href="<?php echo base_url('pkm/update_individu/'.$data->id_transaksi_individu) ?>" class="btn btn-success btn-sm" title="Edit"><span><i class="fa fa-pencil"></i></span></a>
																<a href="<?php echo base_url('pkm/delete/').$data->id_transaksi_individu ?>" class="btn btn-sm btn-danger" title="Delete" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>
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
												<table id="penduduk" class="table-bordered table-hover nowrap" width="100%">
														<thead>
															<tr>
														        <th class="p-1" width="5%">No KTP</th>
														        <th class="p-1">Nama</th>
														        <th class="p-1">Lokasi</th>
														        <th class="p-1" width="5%">Manfaat</th>
														    </tr>
											           </thead>
									        			<tbody>
															<?php foreach($konselor as $data) { ?>
															     <tr>
															        <td class="p-1"><?php echo $data->nik ?></td>
															        <td class="p-1"><?php echo $data->nama ?></td>
																	<td class="p-1"><?php echo $data->desa_kelurahan ?></td>
															        <td class="p-1">
															          <a href="<?php echo base_url('pkm/create/').$data->nik ?>" class="btn btn-sm btn-primary" title="Tambah Manfaat"><i class="fa fa-plus-circle"></i> Tambah</a>
															        </td>
															     </tr>
															<?php } ?>
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

<script type="text/javascript" src="<?= base_url()?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    $('#tabel-individu').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 10,
	    	"fixedColumns":   {
	            left: '',
	            right: 1
	        },
	    });

	    $('#penduduk').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 10,
	    	"fixedColumns":   {
	            left: '',
	            right: 1
	        },
	    });
	});

	$(document).on('shown.bs.modal', function (e) {
      $.fn.dataTable.tables( {visible: true, api: true} ).columns.adjust();
	});

	function warning(){
		Swal.fire({
			title: 'Warning',
			html: 'Data tidak dapat diubah.',
			icon: 'warning',
		})
	}
</script>