<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

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
		                              		Laporan Individu
		                              	</a>
		                            </li>
		                            <li class="nav-item">
		                              	<a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
		                              		Laporan Komunitas
		                              	</a>
		                            </li>
		                        </ul>
	                          	<div class="tab-content mt-4">
		                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
		                            	<div class="row">

		                            			<div class="col-lg-12 col-xs-12">
			                            			<div class="row">
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>Tanggal Awal</p>
				                                              <input type="text" class="form-control" id="min">
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>Tanggal Akhir</p>
				                                              <input type="text" class="form-control" id="max">
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>Filter Status</p>
				                                              <select type="text" class="form-control selectpicker" id="cariindividu">
				                                              	<option >&nbsp;</option>
				                                              	<option value="Proses">Proses</option>
				                                              	<option value="Diajukan">Diajukan</option>
				                                              	<option value="Disetujui">Disetujui</option>
				                                              	<option value="Dibayar">Dibayar</option>
				                                              	<option value="Dipending">Dipending</option>
				                                              	<option value="Ditolak">Ditolak</option>
				                                              </select>
				                                            </fieldset>
					                            		</div>
					                            	</div>
					                        	</div>
				                            	<table id="tabel-individu" class="table table-striped nowrap" width="100%">
													<thead>
														<tr>
											                <th width="5px">No</th> <!-- 0 -->
											                <th>Tanggal</th> <!-- 1 -->
											                <th>No KTP</th> <!-- 3 -->
											                <th>No KK</th> <!-- 3 -->
															<th>Nama KK</th> <!-- 5 -->
													        <th>Nama Pengaju</th> <!-- 6 -->
													        <th>L/P</th> <!-- 7 -->
													        <th>Alamat</th> <!-- 8 -->
													        <th>Kelurahan</th> <!-- 9 -->
													        <th>Kecamatan</th> <!-- 10 -->
													        <th>Kabupaten/Kota</th> <!-- 11 -->
													        <th>Provinsi</th> <!-- 12 -->
													        <th>Program</th> <!-- 13 -->
											                <th>Sub Program</th> <!-- 14 -->
											                <th>Bentuk Manfaat</th> <!-- 15 -->
											                <th>Rekomender</th> <!-- 16 -->
											                <th>Asnaf</th>	<!-- 17 -->				                
											                <th>Permohonan</th> <!-- 18 -->
											                <th>Rekomendasi</th> <!-- 19 -->
											                <th>Jumlah Bantuan</th> <!-- 20 -->
											                <th>Rencana</th> <!-- 21 -->
											                <th>Mekanisme</th> <!-- 22 -->
											                <th>Penyalur</th> <!-- 23 -->
											                <th>Keterangan</th> <!-- 24 -->
											                <th>Status</th> <!-- 25 -->
											                <th>Action</th> 
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($individu as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo $data->tanggal_transaksi ?></td>
											                <td><?php echo $data->nik ?></td>
															<td><?php echo $data->no_kk ?></td>
								        					<td><?php echo ucwords($data->nama_kk) ?></td>
								        					<td><?php echo ucwords($data->nama) ?></td>
															<td><?php echo $data->jk ?></td>
															<td><?php echo $data->alamat ?></td>
															<td><?php echo $data->desa_kelurahan ?></td>
															<td><?php echo $data->kecamatan_name ?></td>
															<td><?php echo $data->kota_kab ?></td>
															<td><?php echo $data->provinsi ?></td>
															<td><?php echo strtolower($data->nama_program) ?></td>
											                <td><?php echo $data->nama_subprogram ?></td>
											                <td><?php echo $data->bentuk_manfaat ?></td>	
											                <td><?php echo $data->nama_rekomender ?></td>
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
													         	<?php if (empty($data->keterangan)) {
													             	echo "-";
													            }else{
													             	echo ucwords($data->keterangan);
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
											                	<a href="<?php echo base_url('lamusta/detail_individu/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
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
		                            		
		                            		<div class="col-lg-12">
			                            		<div class="row">
					                            	<div class="col-lg-4">
					                            		<fieldset class="form-group">
				                                            <p>Tanggal Awal</p>
				                                            <input type="text" class="form-control" id="minKom">
				                                        </fieldset>
					                            	</div>
					                            	<div class="col-lg-4">
					                            		<fieldset class="form-group">
				                                            <p>Tanggal Akhir</p>
				                                            <input type="text" class="form-control" id="maxKom">
				                                        </fieldset>
					                            	</div>
					                            	<div class="col-lg-4">
					                            		<fieldset class="form-group">
				                                            <p>Filter Status</p>
				                                            <select type="text" class="form-control selectpicker" id="carikomunitas" style="width:100%">
				                                              	<option >&nbsp;</option>
				                                              	<option value="Proses">Proses</option>
				                                              	<option value="Diajukan">Diajukan</option>
				                                              	<option value="Disetujui">Disetujui</option>
				                                              	<option value="Dibayar">Dibayar</option>
				                                              	<option value="Dipending">Dipending</option>
				                                              	<option value="Ditolak">Ditolak</option>
				                                            </select>
				                                        </fieldset>
					                            	</div>
					                            </div>
					                        </div>					                        
			                            	<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th>No</th>
														<th>Tanggal</th>
														<th>No KTP</th>
														<th>Nama Pengaju</th>
														<th>Nama Komunitas</th>
														<th>Jamlah Anggota Komunitas</th>
														<th>Alamat Komunitas</th>
														<th>Kelurahan</th>
														<th>Kecamatan</th>
														<th>Kab/kota</th>
														<th>Provinsi</th>
														<th>Kode pos</th>
														<th>Program</th>
														<th>Sub Program</th>
														<th>Bentuk manfaat</th>
														<th>Rekomender</th>
														<th>Asnaf</th>
														<th>Jumlah permohonan</th>
														<th>Jumlah bantuan</th>
														<th>Rencana</th>
														<th>Mekanisme</th>
														<th>Penyalur</th>
														<th>Keterangan</th>
														<th>status</th>
														<th>Action</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($komunitas as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo $data->tanggal_transaksi ?></td>
											                <td><?php echo $data->nik ?></td>
								        					<td><?php echo ucwords($data->nama) ?></td>
															<td><?php echo $data->nama_komunitas ?></td>
															<td><?php echo $data->jumlah_pm ?> Orang</td>
															<td><?php echo $data->alamat ?></td>
															<td>
																<?php foreach($get_all_kelurahan as $row){
																	if($data->id_desa_kelurahan_komunitas == $row->id_desa_kelurahan){
								                                      echo $row->desa_kelurahan;
								                                    }
								                                } ?>
															</td>
															<td>
																<?php foreach($get_all_kecamatan as $row){
																	if($data->id_kecamatan_komunitas == $row->id_kecamatan){
								                                      echo $row->kecamatan_name;
								                                    }
								                                } ?>
															</td>
															<td>
																<?php foreach($get_all_kabupaten as $row){
																	if($data->id_kota_kab_komunitas == $row->id_kota_kab){
								                                      echo $row->kota_kab;
								                                    }
								                                } ?>
															</td>
															<td>
																<?php foreach($get_all_provinsi as $row){
																	if($data->id_provinsi_komunitas == $row->id_provinsi){
								                                      echo $row->provinsi;
								                                    }
								                                } ?>
															</td>
															<td><?php echo $data->kodepos_komunitas ?></td>
															<td><?php echo strtolower($data->nama_program) ?></td>	
											                <td><?php echo $data->nama_subprogram ?></td>
											                <td><?php echo $data->bentuk_manfaat ?></td>	
											                <td><?php echo $data->nama_rekomender ?></td>
															<td><?php echo $data->asnaf ?></td>
											                <td>Rp. <?php echo number_format($data->jumlah_permohonan)?></td>
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
													         	<?php if (empty($data->keterangan)) {
													             	echo "-";
													            }else{
													             	echo ucwords($data->keterangan);
													            } ?>
													        </td>
												            <td>
													        	<?php if ($data->status == '0' && $data->rekomendasi_bantuan == 'Dibantu' || $data->status == '0' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '1' && $data->rekomendasi_bantuan == 'Disurvey'|| $data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey') { ?>
													        		<span class="badge badge-info">Proses</span>
													        	<?php }elseif ($data->status == '0' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '0' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Dipending</span>
													        	<?php }elseif ($data->status == '1' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '1' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Dipending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Pending</span>
													        	<?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
													        		<span class="badge badge-warning">Dipending</span>
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
												                <a href="<?php echo base_url('lamusta/detail_komunitas/'.$data->nik) ?>" class="btn btn-primary btn-sm" title="Detail">
												                	<span><i class="fa fa-eye"></i></span>
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

<script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>

<script src="<?php echo base_url('assets/vendors/js/') ?>dataTables.buttons.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>buttons.print.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>vfs_fonts.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>pdfmake.min.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/vendors/js/') ?>jszip.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.2/moment.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<script type="text/javascript">
	var minDate, maxDate, minDate2, maxDate2;
 
	$.fn.dataTable.ext.search.push(
	    function( settings, data, dataIndex ) {
	        var min = minDate.val();
	        var max = maxDate.val();
	        var date = new Date( data[1] );
	 
	        if (
	            ( min === null && max === null ) ||
	            ( min === null && date <= max ) ||
	            ( min <= date  && max === null ) ||
	            ( min <= date  && date <= max ) 
	        ) {
	            return true;
	        }
	        return false;
	    }
	);

	$.fn.dataTable.ext.search.push(
	    function( settings, data, dataIndex ) {
	        var min2 = minDate2.val();
	        var max2 = maxDate2.val();
	        var date2 = new Date( data[1] );
	 
	        if (
	            ( min2 === null && max2 === null ) ||
	            ( min2 === null && date2 <= max2 ) ||
	            ( min2 <= date2  && max2 === null ) ||
	            ( min2 <= date2  && date2 <= max2 )
	        ) {
	            return true;
	        }
	        return false;
	    }
	);
	 
	$(document).ready(function() {

	    minDate = new DateTime($('#min'), {
	        format: 'YYYY-MM-DD'
	    });
	    maxDate = new DateTime($('#max'), {
	        format: 'YYYY-MM-DD'
	    });

	    minDate2 = new DateTime($('#minKom'), {
	        format: 'YYYY-MM-DD'
	    });
	    maxDate2 = new DateTime($('#maxKom'), {
	        format: 'YYYY-MM-DD'
	    });
	 
	    var table = $('#tabel-individu').DataTable({
	    	"scrollX"	: true,
	    	"searchPanes" :{
                cascadePanes: true,
            },
            "searchPanes": true,
            "columnDefs" :[
            	{
	                searchPanes:{
	                    show: true,
	                },
	                targets: [1,5],
            	}
            ],
	    	"pageLength": 25,
	    	"dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
	    	"language": {
	            "lengthMenu": "_MENU_",
	            "info": "Page _PAGE_ of _PAGES_",
	            "infoFiltered": "(filtered from _MAX_ total records)"
	        },
	    	"buttons"	: [ 
	    		{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24]
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24]
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24]
                    }
                }, 
	    		{
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 14, 15, 19, 20, 21, 24]
                    },
                    customize: function(win){
		 
		                var last = null;
		                var current = null;
		                var bod = [];
		 
		                var css = '@page { size: landscape; }',
		                    head = win.document.head || win.document.getElementsByTagName('head')[0],
		                    style = win.document.createElement('style');
		 
		                style.type = 'text/css';
		                style.media = 'print';
		 
		                if (style.styleSheet)
		                {
		                  style.styleSheet.cssText = css;
		                }
		                else
		                {
		                  style.appendChild(win.document.createTextNode(css));
		                }
		 
		                head.appendChild(style);
		         	}
                } 
	    	]
	    });

	    var table2 = $('#tabel-komunitas').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 25,
	    	"dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
	    	"language": {
	            "lengthMenu": "_MENU_",
	            "info": "Page _PAGE_ of _PAGES_",
	            "infoFiltered": "(filtered from _MAX_ total records)"
	        },
	    	"buttons"	: [ 
	    		{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                    },
                    customize: function(win){
		 
		                var last = null;
		                var current = null;
		                var bod = [];
		 
		                var css = '@page { size: landscape; }',
		                    head = win.document.head || win.document.getElementsByTagName('head')[0],
		                    style = win.document.createElement('style');
		 
		                style.type = 'text/css';
		                style.media = 'print';
		 
		                if (style.styleSheet)
		                {
		                  style.styleSheet.cssText = css;
		                }
		                else
		                {
		                  style.appendChild(win.document.createTextNode(css));
		                }
		 
		                head.appendChild(style);
		         	}
                } 
	    	]
	    });
	 
	    $('#min, #max').on('change', function () {
	        table.draw();
	    });

	    $('#minKom, #maxKom').on('change', function () {
	        table2.draw();
	    });

		$('#cariindividu').change(function(){
		    table.search($(this).val()).draw() ;
		})

		$('#carikomunitas').change(function(){
		    table2.search($(this).val()).draw() ;
		})
 
	});

</script>