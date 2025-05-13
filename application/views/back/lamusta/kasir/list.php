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
		                              		Approval Individu  &nbsp;
		                              		<span class="notification badge badge-pill badge-danger">
		                              			<?php echo $notif_individu->total_individu ?>
		                              		</span>
		                              	</a>
		                            </li>
		                            <li class="nav-item">
		                              	<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
		                              		Approval Komunitas &nbsp;
		                              		<span class="notification badge badge-pill badge-danger">
		                              			<?php echo $notif_komunitas->total_komunitas ?>
		                              		</span>
		                              	</a>
		                            </li>
		                        </ul>
	                          	<div class="tab-content mt-4">
		                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
		                            	<div class="row">
				                            	<table class="table table-striped nowrap text-capitalize" id="tabel-individu1" width="100%">
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
											                <th>Detail</th>
											                <th style="background-color: #FFFFFF;">Action</th>
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
												            	<a href="<?php echo base_url('lamusta/detail_kasir_individu/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                	</a>
												            </td>
											                <td class="text-center" style="background-color: #F2F2F2;">
											                	<button type="button" onclick="reject<?php echo $data->id_transaksi_individu ?>()" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>	
											                	<button type="button" onclick="approve<?php echo $data->id_transaksi_individu ?>()" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
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
			                            	<table class="table table-striped nowrap" id="tabel-komunitas1" width="100%">
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
										                <th>Detail</th>
										                <th style="background-color: #FFFFFF;">Action</th>
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
											                <a href="<?php echo base_url('lamusta/detail_kasir_komunitas/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                </a> 	
											            </td>
											            <td class="text-center" style="background-color: #F2F2F2;">
											                <button type="button" onclick="reject_komunitas<?php echo $data->id_transaksi_komunitas ?>()" class="btn btn-danger btn-sm"><i class="fa fa-times"></i></button>	
											                <button type="button" onclick="approve_komunitas<?php echo $data->id_transaksi_komunitas ?>()" class="btn btn-success btn-sm"><i class="fa fa-check"></i></button>
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

						<hr>

						<div class="row">
							<div class="col-md-12">
								<ul class="nav nav-tabs">
		                            <li class="nav-item">
		                              	<a class="nav-link active" id="base-tab3" data-toggle="tab" aria-controls="tab3" href="#tab3" aria-expanded="true">
		                              		Data Individu
		                              	</a>
		                            </li>
		                            <li class="nav-item">
		                              	<a class="nav-link" id="base-tab4" data-toggle="tab" aria-controls="tab4" href="#tab4" aria-expanded="false">
		                              		Data Komunitas
		                              	</a>
		                            </li>
		                        </ul>
	                          	<div class="tab-content mt-4">
		                            <div role="tabpanel" class="tab-pane active" id="tab3" aria-expanded="true" aria-labelledby="base-tab3">
		                            	<div class="row">
											<br>
				                            	<table id="tabel-individu2" class="table table-striped nowrap" width="100%">
													<thead>
														<tr>
											                <th width="5px">No</th> <!-- 0 -->
											                <th>Petugas/User</th> <!-- 1 -->
											                <th>Tanggal</th> <!-- 3 -->
											                <th>Nama Pemohon</th> <!-- 4 -->
															<th>No KTP</th> <!-- 5 -->
													        <th>Nama KK</th> <!-- 6 -->
													        <th>No KK</th> <!-- 7 -->
													        <th>JML Anggota Kel</th> <!-- 8 -->
													        <th>JK</th> <!-- 9 -->
													        <th>Tempat Lahir</th> <!-- 10 -->
													        <th>Tanggal Lahir</th> <!-- 11 -->
													        <th>Usia</th> <!-- 12 -->
													        <th>Alamat</th> <!-- 13 -->
											                <th>Kelurahan</th> <!-- 14 -->
											                <th>Kecamatan</th> <!-- 15 -->
											                <th>Kab/Kota</th> <!-- 16 -->
											                <th>Provinsi</th>	<!-- 17 -->			                
											                <th>Kode Pos</th> <!-- 18 -->
											                <th>No Telp</th> <!-- 19 -->
											                <th>Status Pernikahan</th> <!-- 20 -->
											                <th>Pendidikan Terakhir</th> <!-- 21 -->
											                <th>Pekerjaan</th> <!-- 22 -->
											                <th>Photo</th> <!-- 23 -->
											                <th>Status Tinggal</th> <!-- 24 -->
											                <th>Kasus/Masalah</th> <!-- 25 -->
											                <th>Program</th>
											                <th>Sub Program</th>
											                <th>Jenis Bantuan</th>
											                <th>Asnaf</th> 
											                <th>Sumber Dana</th>
											                <th>Jml Permohonan</th>
											                <th>Rekomender</th>
											                <th>Rekomendasi Bantuan</th>
											                <th>Tgl Rekomendasi</th> 
											                <th>Mekanisme Bantuan</th>
											                <th>Jumlah Bantuan</th>
											                <th>Periode Penerima Bantuan</th>
											                <th>Total Periode Bantuan</th>
											                <th>Penyalur</th>
											                <th style="background-color: #FFFFFF;">Action</th>
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($data_individu as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo $data->petugas ?></td>
											                <td><?php echo date("d-m-Y", strtotime($data->rencana_bantuan)) ?></td>
											                <td><?php echo ucwords(strtolower($data->nama)) ?></td>
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
															<td><?php echo ucwords($data->alamat) ?></td>
															<td><?php echo ucwords($data->desa_kelurahan) ?></td>
															<td><?php echo ucwords($data->kecamatan_name) ?></td>
															<td><?php echo ucwords($data->kota_kab)  ?></td>
															<td><?php echo ucwords($data->provinsi)  ?></td>
											                <td><?php echo $data->kodepos ?></td>
											                <td><?php echo $data->no_hp ?></td>	
											                <td><?php echo $data->status_perkawinan ?></td>
															<td><?php echo $data->pendidikan ?></td>
															<td><?php echo $data->pekerjaan ?></td>
											                <td>
											                	<?php if ($data->photo == NULL) { 
											                		echo '-';
											                	}else{ ?>
											                		<img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$data->photo); ?>" style="width: 50%;">
											                	<?php } ?>
											                </td>
															<td><?php echo $data->status_tinggal ?></td>
															<td><?php echo $data->kasus ?></td>
															<td><?php echo ucwords(strtolower($data->nama_program)) ?></td>
															<td><?php echo $data->nama_subprogram ?></td>
															<td><?php echo $data->jenis_bantuan ?></td>
															<td><?php echo $data->asnaf ?></td>
															<td><?php echo $data->sumber_dana ?></td>
															<td><?php echo number_format($data->jumlah_permohonan) ?></td>
															<td><?php echo ucwords($data->nama_rekomender) ?></td>
											                <td><?php echo $data->rekomendasi_bantuan ?></td>
											                <td>
											                	<?php if ($data->rencana_bantuan == '0000-00-00') {
												                	echo "-";
												                }else{
												                	echo date("Y-m-d", strtotime($data->rencana_bantuan	));
												                } ?>
											                </td>
											                <td>
											                	<?php if ($data->rekomendasi_bantuan == 'Ditolak') {
												                	echo "Ditolak";
												                }else{
												                	echo $data->mekanisme_bantuan;
												                } ?>
												            </td>
												            <td><?php echo number_format($data->jumlah_bantuan) ?></td>
												            <td><?php echo date("Y-m-d", strtotime($data->periode_bantuan)) ?></td>
												            <td><?php echo $data->total_periode ?></td>
												            <td>
												            	<?php if (empty($data->penyalur)) {
												                	echo "-";
												                }else{
												                	echo ucwords($data->penyalur);
												                } ?>
												            </td>
											                <td class="text-center" style="background-color: #F2F2F2;">
											                	<a href="<?php echo base_url('lamusta/detail_individu/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
											                	</a> 
											                	<button class="btn btn-primary btn-sm" onclick="print_individu(this.id)" id="<?php echo $data->id_transaksi_individu ?>" title="Print Invoice"><i class="fa fa-print"></i>
    															</button>
											                </td>
											            </tr>
														<?php 
															$no += 1;
														} ?>
								                    </tbody>
												</table>
										</div>
		                            </div>

		                            <div class="tab-pane" id="tab4" aria-labelledby="base-tab4">
		                            	<div class="row"><br>		                        
			                            	<table id="tabel-komunitas2" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th>No</th>
														<th>Petugas/User</th>
														<th>Tanggal</th>
														<th>Nama Komunitas</th>
														<th>Profil Komunitas</th>
														<th>Alamat</th>
														<th>Kelurahan</th> <!-- 14 -->
											            <th>Kecamatan</th> <!-- 15 -->
											            <th>Kab/Kota</th> <!-- 16 -->
											            <th>Provinsi</th>	<!-- 17 -->			                
											            <th>Kode Pos</th> <!-- 18 -->
														<th>No Telp</th>
														<th>Nama PJ</th>
														<th>NIK PJ</th>
														<th>PHoto Komunitas</th>
														<th>Program</th>
														<th>Sub program</th>
														<th>Jenis Bantuan</th>
														<th>Asnaf</th>
														<th>Jumlah Permohonan</th>
														<th>Jumlah PM</th>
														<th>Rekomender</th>
														<th>Rekomendasi Bantuan</th>
														<th>Tgl Rekomendasi</th>
														<th>Mekanisme Bantuan</th>
														<th>Jumlah Bantuan</th>
														<th>Sumber Dana</th>
														<th>Periode Penerima Bantuan</th>
														<th>Total Periode Bantuan</th>
														<th>Penyalur</th>
														<th style="background-color: #FFFFFF;">Action</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($data_komunitas as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo $data->petugas ?></td>
											                <td><?php echo $data->tanggal_transaksi ?></td>
															<td><?php echo $data->nama_komunitas ?></td>
															<td><?php echo $data->profil_komunitas ?></td>
															<td><?php echo ucwords($data->alamat) ?></td>
															<td><?php echo ucwords($data->desa_kelurahan) ?></td>
															<td><?php echo ucwords($data->kecamatan_name) ?></td>
															<td><?php echo ucwords($data->kota_kab) ?></td>
															<td><?php echo ucwords($data->provinsi) ?></td>
											                <td><?php echo $data->kodepos_komunitas ?></td>	
															<td><?php echo $data->no_telpon ?></td>
															<td><?php echo ucwords($data->nama) ?></td>	
											                <td><?php echo $data->nik ?></td>
											                <td>
											                	<?php if ($data->legalitas_1 == NULL) { 
											                		echo '-';
											                	}else{ ?>
											                		<img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$data->legalitas_1); ?>" style="width: 50%;">
											                	<?php } ?>
											                </td>	
											                <td><?php echo $data->nama_program ?></td>
															<td><?php echo $data->nama_subprogram ?></td>
															<td><?php echo $data->jenis_bantuan ?></td>
															<td><?php echo $data->asnaf ?></td>
											                <td>Rp. <?php echo number_format($data->jumlah_permohonan)?></td>
											                <td><?php echo $data->jumlah_pm ?></td>
											                <td><?php echo $data->nama_rekomender ?></td>
											                <td><?php echo $data->rekomendasi_bantuan ?></td>
											                <td><?php echo $data->rencana_bantuan ?></td>
											                <td><?php echo $data->mekanisme_bantuan ?></td>
											                <td><?php echo number_format($data->jumlah_bantuan) ?></td>
											                <td><?php echo $data->sumber_dana ?></td>
											                <td><?php echo $data->periode_bantuan ?></td>
											                <td><?php echo $data->total_periode ?></td>
											                <td><?php echo $data->penyalur ?></td>
													        <td style="background-color: #F2F2F2;">
												                <a href="<?php echo base_url('lamusta/detail_komunitas/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail">
												                	<span><i class="fa fa-eye"></i></span>
												                </a> 	
												                <button class="btn btn-primary btn-sm" onclick="print_komunitas(this.id)" id="<?php echo $data->id_transaksi_komunitas ?>" title="Print Invoice"><i class="fa fa-print"></i>
    															</button>
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

<?php foreach($individu as $row){ ?>
	<script type="text/javascript">
		function approve<?php echo $row->id_transaksi_individu ?> (){
			Swal.fire({
	            title:"Question!",
	            html :"Are you sure you agree with the data?",
	            icon :"question",
	            showCancelButton: true,
	            confirmButtonText: 'Oke',
	         }).then((result) => {
	            if (result.isConfirmed) {
	              window.location.href="<?php echo base_url('lamusta/action_kasir_individu?id_transaksi_individu='.$row->id_transaksi_individu.'&status=3')?>";
	            }
	        }) 
		}
		function reject<?php echo $row->id_transaksi_individu ?> (){
			Swal.fire({
	            title:"Question!",
	            html :"Are you sure you want to reject the data?",
	            icon :"question",
	            showCancelButton: true,
	            confirmButtonText: 'Oke',
	         }).then((result) => {
	            if (result.isConfirmed) {
	              window.location.href="<?php echo base_url('lamusta/action_kasir_individu?id_transaksi_individu='.$row->id_transaksi_individu.'&status=4')?>";
	            }
	        }) 
		}
	</script> 
<?php } ?>

<?php foreach($komunitas as $row){ ?>
	<script type="text/javascript">
		function approve_komunitas<?php echo $row->id_transaksi_komunitas ?> (){
			Swal.fire({
	            title:"Question!",
	            html :"Are you sure you agree with the data?",
	            icon :"question",
	            showCancelButton: true,
	            confirmButtonText: 'Oke',
	         }).then((result) => {
	            if (result.isConfirmed) {
	              window.location.href="<?php echo base_url('lamusta/action_kasir_komunitas?id_transaksi_komunitas='.$row->id_transaksi_komunitas.'&status=3')?>";
	            }
	        }) 
		}
		function reject_komunitas<?php echo $row->id_transaksi_komunitas ?> (){
			Swal.fire({
	            title:"Question!",
	            html :"Are you sure you want to reject the data?",
	            icon :"question",
	            showCancelButton: true,
	            confirmButtonText: 'Oke',
	         }).then((result) => {
	            if (result.isConfirmed) {
	              window.location.href="<?php echo base_url('lamusta/action_kasir_komunitas?id_transaksi_komunitas='.$row->id_transaksi_komunitas.'&status=4')?>";
	            }
	        }) 
		}
	</script> 
<?php } ?>

<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.2/js/dataTables.fixedColumns.min.js"></script>

<script type="text/javascript">
	$('#tabel-individu1').DataTable({
	    "scrollX"       : true,
        "scrollCollapse": true,
	    "fixedColumns"  : {
            left : 0,
            right: 1
        }
	})
	$('#tabel-komunitas1').DataTable({
	    "scrollX"       : true,
        "scrollCollapse": true,
	    "fixedColumns"  : {
	    	left : 0,
            right: 1
        }
	})
	$('#tabel-individu2').DataTable({
	    "scrollX"       : true,
        "scrollCollapse": true,
	    "fixedColumns"  : {
            left : 0,
            right: 1
        }
	})
	$('#tabel-komunitas2').DataTable({
	    "scrollX"       : true,
        "scrollCollapse": true,
	    "fixedColumns"  : {
	    	left : 0,
            right: 1
        }
	})
</script>

<script type="text/javascript">
	function print_individu(id){ 
   		cetak('<?php echo base_url() ?>Lamusta/kwitansi_individu/' + id, 'Print',800,800);
  	}
  	function print_komunitas(id){ 
   		cetak('<?php echo base_url() ?>Lamusta/kwitansi_komunitas/' + id, 'Print',800,800);
  	}
    function cetak(pageURL, title, w, h) {
        var left = (screen.width/2)-(w/2);
        var top = (screen.height/2)-(h/2);
        var targetWin = window.open (pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width='+w+', height='+h+', top='+top+', left='+left);
    }
</script>