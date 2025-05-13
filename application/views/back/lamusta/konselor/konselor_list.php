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
							<div class="col-lg-12">
								<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#tambah">
                            <i class="fa fa-plus-circle"></i> Tambah Manfaat
                </button>
                					<hr>		
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
		                            <li class="nav-item">
		                              	<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
		                              		Data Individu
		                              	</a>
		                            </li>
		                            <li class="nav-item">
		                              	<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
		                              		Data Komunitas
		                              	</a>
		                            </li>
		                        </ul>
	                          	<div class="tab-content mt-4">
		                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
		                            	<div class="row">

				                            	<table id="tabel-individu" class="table table-striped nowrap" width="100%">
													<thead>
														<tr>
											                <th width="5px">No</th>
											                <th>Tanggal</th>
											                <th>No KTP</th>
											                <th>Nama Pemohon</th>
											                <th>Jenis Bantuan</th>
															<th>Program</th>
											                <th>Sub Program</th>
											                <th>Asnaf</th>					                
											                <th>Permohonan</th>
											                <th>Rekomendasi</th>
											                <th>Rencana</th>
											                <th>Mekanisme</th>
											                <th>Status</th>
											                <th class="bg-white">Action</th>
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($data_individu as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
											                <td><?php echo $data->nik ?></td>
											                <td><?php echo $data->nama ?></td>
											                <td><?php echo $data->jenis_bantuan ?></td>
															<td><?php echo strtolower($data->nama_program) ?></td>
											                <td><?php echo $data->nama_subprogram ?></td>
															<td><?php echo $data->asnaf ?></td>
											                <td> Rp. <?php echo number_format($data->jumlah_permohonan) ?></td>
											                <td><?php echo $data->rekomendasi_bantuan ?></td>
											                <td>
											                	<?php if ($data->rencana_bantuan == '0000-00-00') {
												                	echo "-";
												                }else{
												                	echo date("d-m-Y", strtotime($data->rencana_bantuan	));
												                } ?>
											                </td>
											                <td>
											                	<?php if ($data->rekomendasi_bantuan == 'Ditolak') {
												                	echo "-";
												                }else{
												                	echo $data->mekanisme_bantuan;
												                } ?>
												            </td>
												            <td>
													        	<?php if ($data->status == '0' && $data->rekomendasi_bantuan == 'Dibantu' || $data->status == '0' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '1' && $data->rekomendasi_bantuan == 'Disurvey'|| $data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey') { ?>
													        		<span class="badge badge-info">Proses</span>
													        	<?php }elseif ($data->status == '0' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '0' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Dipending</span>
													        	<?php }elseif ($data->status == '1' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '1' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif($data->status == '0' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '1' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '2' && $data->rekomendasi_bantuan == 'Ditolak'  || $data->status == '4'){ ?>
													        		<span class="badge badge-danger">Ditolak</span>
													        	<?php }elseif($data->status == '1' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-success">Diajukan</span>
													        	<?php }elseif($data->status == '2' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-primary">Disetujui</span>
													        	<?php }elseif($data->status == '3' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-primary">Dibayar</span>
													        	<?php } ?>
													        </td>
											                <td class="bg-white">
											                	<a href="<?php echo base_url('lamusta/detail_konselor/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
											                	<?php if ($data->status == '0' || $data->status == '1') { ?>
											                		<a href="<?php echo base_url('lamusta/update_individu/'.$data->id_transaksi_individu) ?>" class="btn btn-success btn-sm">
											                			<span><i class="fa fa-pencil"></i></span>
											                		</a>
											                		<a href="<?php echo base_url('lamusta/delete_individu/').$data->id_transaksi_individu ?>" class="btn btn-sm btn-danger" title="Hapus" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i>
											                		</a>
											                	<?php }elseif ($data->status == '2' || $data->status == '3'){ ?>
											                		<a class="btn btn-success btn-sm" onclick="warning()" disabled><span><i class="fa fa-pencil"></i></span></a>
											                		<a class="btn btn-sm btn-danger" onclick="warning()" disabled><i class="fa fa-trash"></i></a>
											                	<?php } else if ($data->status == '4'){ ?>
												                	<a class="btn btn-danger btn-sm" title="Ditolak"><span><i class="fa fa-times"></i></span>
												                	</a>  	
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
			                            	<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th width="5px">No</th>
										                <th>Tanggal</th>
										                <th>No KTP</th>
											            <th>Nama PJ</th>
										                <th>Komunitas</th>
														<th>Program</th>
										                <th>Sub Program</th>	
										                <th>Asnaf</th>				                
										                <th>Permohonan</th>
										                <th>Rekomendasi</th>
										                <th>Rencana</th>
										                <th>Mekanisme</th>
										                <th>Status</th>
										                <th class="bg-white">Action</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($data_komunitas as $data){ ?>
											            <tr>
											            <td><?php echo $no ?></td>
										                <td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
										                <td><?php echo $data->nik ?></td>
										                <td><?php echo $data->nama ?></td>
										                <td><?php echo strtolower($data->nama_komunitas) ?></td>
														<td><?php echo strtolower($data->nama_program) ?></td>
										                <td><?php echo $data->nama_subprogram ?></td>
										                <td><?php echo $data->asnaf ?></td>
										                <td>Rp. <?php echo number_format($data->jumlah_permohonan) ?></td>
														<td><?php echo $data->rekomendasi_bantuan ?></td>
														<td>
															<?php if ($data->rencana_bantuan == '0000-00-00') {
												                echo "-";
												            }else{
												                echo date("d-m-Y", strtotime($data->rencana_bantuan	));
												            } ?>
														</td>
														<td>
											               	<?php if ($data->rekomendasi_bantuan == 'Ditolak') {
												               	echo "-";
												            }else{
												               	echo $data->mekanisme_bantuan;
												            } ?>
												        </td>
												        <td>
												        	<?php if ($data->status == '0' && $data->rekomendasi_bantuan == 'Dibantu' || $data->status == '0' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '1' && $data->rekomendasi_bantuan == 'Disurvey'|| $data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey') { ?>
													        		<span class="badge badge-info">Proses</span>
													        	<?php }elseif ($data->status == '0' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '0' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Dipending</span>
													        	<?php }elseif ($data->status == '1' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '1' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif($data->status == '0' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '1' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '2' && $data->rekomendasi_bantuan == 'Ditolak'  || $data->status == '4'){ ?>
													        		<span class="badge badge-danger">Ditolak</span>
													        	<?php }elseif($data->status == '1' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-success">Diajukan</span>
													        	<?php }elseif($data->status == '2' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-primary">Disetujui</span>
													        	<?php }elseif($data->status == '3' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
													        		<span class="badge badge-primary">Dibayar</span>
													        	<?php } ?>
												        </td>
												        <td class="bg-white">	<a href="<?php echo base_url('lamusta/detail_konselor/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><i class="fa fa-eye"></i></a>
											                <?php if ($data->status == '0') { ?>
											                	<a href="<?php echo base_url('lamusta/update_komunitas/'.$data->id_transaksi_komunitas) ?>" class="btn btn-success btn-sm">
											                		<span><i class="fa fa-pencil"></i></span>
											                	</a>
								          						<a href="<?php echo base_url('lamusta/delete_komunitas/').$data->id_transaksi_komunitas ?>" class="btn btn-sm btn-danger" title="Hapus" onClick="return confirm('Are you sure?');"><i class="fa fa-trash"></i></a>
											               	<?php } else if ($data->status == '4'){ ?>
											                	<a class="btn btn-danger btn-sm" title="Ditolak"><span><i class="fa fa-times"></i></span>
											                	</a>  	
											                <?php }else{ ?>
											                	<a class="btn btn-success btn-sm" onclick="warning()" disabled><span><i class="fa fa-pencil"></i></span></a>
											                	<a class="btn btn-sm btn-danger" onclick="warning()" disabled><i class="fa fa-trash"></i></a>
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
													<table id="datatable" class="table-bordered table-hover display nowrap" width="100%">
														<thead>
															<tr>
												        <th width="5%" class="p-1">No KTP</th>
												        <th class="p-1">Nama</th>	
												        <th class="p-1">Lokasi</th>
												        <th width="5%" class="p-1">Manfaat</th>
												      </tr>
									          </thead>
									        	<tbody>
															<?php $no = 1; foreach($konselor as $data) { ?>
												      <tr>
												        <td class="p-1"><?php echo $data->nik ?></td>
												        <td class="p-1"><?php echo $data->nama ?></td>
														<td class="p-1"><?php echo $data->desa_kelurahan ?></td>
												        <td class="p-1">
												          <a href="<?php echo base_url('lamusta/create/').$data->nik ?>" class="btn btn-sm btn-primary" title="Tambah Manfaat"><i class="fa fa-plus-circle"></i> Tambah </a> 
												        </td>
												      </tr>
															<?php 
																$no += 1;
															} ?>
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

	    $('#tabel-komunitas').DataTable({
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