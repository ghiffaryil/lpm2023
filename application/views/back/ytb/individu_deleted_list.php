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
				<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
			</section>

			<section class="basic-elements">
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">

								<div class="row">
									<div class="col-md-12">
											<div class="row">
											<table id="tabel-individu" class="table table-striped nowrap" width="100%">
											<thead>
												<tr>
													<th width="5px">NO</th> <!-- 0 -->
													<th>PETUGAS/USER</th> <!-- 1 -->
													<th>TGL</th> <!-- 1 -->
													<th>NAMA PM</th> <!-- 6 -->
													<th>NO KTP</th> <!-- 6 -->

													<th>NAMA KK</th> <!-- 5 -->
													<th>NO KK</th> <!-- 3 -->
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
													<th>PENDIDIKAN</th> <!-- 12 -->
													<th>PHOTO</th> <!-- 12 -->

													<th>NAMA SEKOLAH</th>
													<th>ALAMAT SEKOLAH</th>
													<th>PROGRAM</th>
													<th>SUB PROGAM</th>
													<th>JENIS BANTUAN</th>

													<th>ASNAF</th>
													<th>SUMBER DANA</th>
													<th>JUMLAH BANTUAN</th>
													<th>PERIODE PENERIMA BANTUAN</th>
													<th>TOTAL PERIODE BANTUAN</th>

													<th>PENYALUR</th>
													<th>REKOMENDER</th>
													<th>KETERANGAN</th>
													<th class="bg-white">ACTION</th>
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
														<td><?php echo $data->pendidikan ?></td>
														<td><?php echo $data->photo ?></td>

														<td><?php echo $data->sekolah_nama ?></td>
														<td><?php echo $data->sekolah_alamat ?></td>
														<td><?php echo strtolower($data->nama_program)  ?></td>
														<td><?php echo $data->nama_subprogram ?></td>
														<td><?php echo $data->jenis_bantuan ?></td>

														<td><?php echo $data->asnaf ?></td>
														<td><?php echo $data->sumber_dana ?></td>
														<td> Rp.
															<?php echo number_format($data->jumlah_bantuan) ?>
														</td>
														<td><?php echo date("d-m-Y", strtotime($data->periode_bantuan	)) ?>
													</td>
													<td><?php echo $data->total_periode ?></td>

													<td><?php echo $data->penyalur ?></td> 
													<td><?php echo $data->nama_rekomender ?></td>
													<td><?php echo $data->keterangan ?></td>
													<td class="bg-white">							
												        <a href="<?php echo base_url('ytb/restore/'.$data->id_transaksi_individu) ?>"
																		class="btn btn-sm btn-warning"
																		onClick="return confirm('Are you sure?');"><i
																			class="fa fa-refresh"></i>
																	</a>
																	<a href="<?php echo base_url('ytb/delete_permanent/'.$data->id_transaksi_individu) ?>"
																		onClick="return confirm('Are you sure?');"
																		class="btn btn-sm btn-danger"><i
																			class="fa fa-remove"></i>
																	</a>
																	</td>
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
	});
</script>
