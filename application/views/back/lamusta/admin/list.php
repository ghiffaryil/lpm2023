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
								<ul class="nav nav-tabs">
		                            <li class="nav-item">
		                              	<a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
		                              		Data Individu  &nbsp;
		                              		<span class="notification badge badge-pill badge-danger">
		                              			<?php echo $notif_individu->total_individu ?>
		                              		</span>
		                              	</a>
		                            </li>
		                            <li class="nav-item">
		                              	<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
		                              		Data Komunitas &nbsp;
		                              		<span class="notification badge badge-pill badge-danger">
		                              			<?php echo $notif_komunitas->total_komunitas ?>
		                              		</span>
		                              	</a>
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
											                <th>No KTP</th>
															<th>No KK</th>
													        <th>Nama</th>	
													        <th>Alamat</th>
													        <th>JK</th>
											                <th>Jenis Bantuan</th>
															<th>Program</th>
											                <th>Sub Program</th>
											                <th>Asnaf</th>					                
											                <th>Permohonan</th>
											                <th>Rekomendasi</th>
											                <th>Jumlah Bantuan</th>
											                <th>Rencana</th>
											                <th>Mekanisme</th>
											                <th>Penyalur</th>
											                <th>Status</th>
											                <th>Action</th>
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($individu as $data){ ?>

											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
											                <td><?php echo $data->nik ?></td>
															<td><?php echo $data->no_kk ?></td>
								        					<td><?php echo ucwords($data->nama) ?></td>
															<td><?php echo $data->desa_kelurahan ?></td>
															<td><?php echo $data->jk ?></td>
											                <td><?php echo $data->jenis_bantuan ?></td>
															<td><?php echo strtolower($data->nama_program) ?></td>
											                <td><?php echo $data->nama_subprogram ?></td>
															<td><?php echo $data->asnaf ?></td>
											                <td> Rp. <?php echo number_format($data->jumlah_permohonan) ?></td>
											                <td><?php echo $data->rekomendasi_bantuan ?></td>
															<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
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
												            	<?php if (empty($data->penyalur)) {
												                	echo "-";
												                }else{
												                	echo ucwords($data->penyalur);
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
											                <td class="text-center">
											                	<a href="<?php echo base_url('lamusta/detail_admin_individu/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                	</a> 
											                	<?php if ($data->status == '0' || $data->status == '1') { ?>
											                	<a href="<?php echo base_url('lamusta/update_admin_individu/'.$data->id_transaksi_individu) ?>" class="btn btn-success btn-sm" title="Edit"><span><i class="fa fa-check"></i></span>
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
			                            	<table class="table datatable table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th width="5px">No</th>
										                <th>Tanggal</th>
										                <th>No KTP</th>
														<th>No KK</th>
													    <th>Nama</th>	
													    <th>Alamat</th>
													    <th>L/P</th>
										                <th>Komunitas</th>
														<th>Program</th>
										                <th>Sub Program</th>	
										                <th>Asnaf</th>				                
										                <th>Permohonan</th>
										                <th>Rekomendasi</th>
										                <th>Jumlah Bantuan</th>
										                <th>Rencana</th>
										                <th>Mekanisme</th>
										                <th>Penyalur</th>
										                <th>Status</th>
										                <th>Action</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($komunitas as $data){ ?>
										            <tr>
										                <td><?php echo $no ?></td>
										                <td><?php echo date("d-m-Y", strtotime($data->tanggal_transaksi)) ?></td>
										                <td><?php echo $data->nik ?></td>
														<td><?php echo $data->no_kk ?></td>
								        				<td><?php echo ucwords($data->nama) ?></td>
														<td><?php echo $data->desa_kelurahan ?></td>
														<td><?php echo $data->jk ?></td>
										                <td><?php echo strtolower($data->nama_komunitas) ?></td>
														<td><?php echo strtolower($data->nama_program) ?></td>
										                <td><?php echo $data->nama_subprogram ?></td>
										                <td><?php echo $data->asnaf ?></td>
										                <td>Rp. <?php echo number_format($data->jumlah_permohonan) ?></td>
														<td><?php echo $data->rekomendasi_bantuan ?></td>
														<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
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
												         	<?php if (empty($data->penyalur)) {
												             	echo "-";
												            }else{
												             	echo ucwords($data->penyalur);
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
												        <td>
											                <a href="<?php echo base_url('lamusta/detail_admin_komunitas/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail">
											                	<span><i class="fa fa-eye"></i></span>
											                </a> 
											                <?php if ($data->status == '0' || $data->status == '1') { ?>
											                	<a href="<?php echo base_url('lamusta/update_admin_komunitas/'.$data->id_transaksi_komunitas) ?>" class="btn btn-success btn-sm" title="Edit"><span><i class="fa fa-pencil"></i></span>
											                	</a>  	
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
