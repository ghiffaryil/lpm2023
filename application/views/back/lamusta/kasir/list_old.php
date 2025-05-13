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
													        <th>L/P</th>
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
											                <th>Action</th>
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($individu as $data){ ?>

											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo date("d-m-Y", strtotime($data->created_at)) ?></td>
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
											                <td class="text-center">
											                	<a href="<?php echo base_url('lamusta/detail_kasir_individu/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                	</a>
											                	<a href="<?php echo base_url('lamusta/update_kasir_individu/'.$data->id_transaksi_individu) ?>" class="btn btn-success btn-sm" title="Approve"><span><i class="fa fa-check"></i></span>
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
										                <th>Action</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($komunitas as $data){ ?>
										            <tr>
										                <td><?php echo $no ?></td>
										                <td><?php echo date("d-m-Y", strtotime($data->created_at)) ?></td>
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
											                <a href="<?php echo base_url('lamusta/detail_kasir_komunitas/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                </a> 
											                <a href="<?php echo base_url('lamusta/update_kasir_komunitas/'.$data->id_transaksi_komunitas) ?>" class="btn btn-success btn-sm" title="Edit"><span><i class="fa fa-check"></i></span>
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
