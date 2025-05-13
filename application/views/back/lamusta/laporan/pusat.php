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
				                                              <p>NAMA PM</p>
				                                              <select type="text" style="width: 100%;" class="form-control selectpicker nama-individu">
				                                              	<option value="">Silahkan Pilih...</option>
				                                              	<?php foreach ($penduduk as $row) { ?>
				                                              		<option value="<?php echo ucwords(strtolower($row->nama)) ?>"><?php echo ucwords(strtolower($row->nama)) ?></option>
				                                              	<?php } ?>
				                                              </select>
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>PERIODE</p>
				                                              <input type="month" class="form-control month-individu">
				                                            </fieldset>
					                            		</div>
					                            	</div>
					                        	</div>
				                            	<table id="tabel-individu" class="table table-striped nowrap" width="100%">
													<thead>
														<tr>
											                <th width="5px">NO</th> <!-- 0 -->
											                <th>NAMA PENERIMA MANFAAT</th> <!-- 1 -->
											                <th>NO. KTP</th> <!-- 3 -->
											                <th>NAMA KK</th> <!-- 3 -->
															<th>NO. KK</th> <!-- 5 -->
													        <th>NAMA PROGRAM</th> <!-- 6 -->
													        <th>JENIS PROGRAM</th> <!-- 7 -->
													        <th>BENTUK MANFAAT/KEGIATAN</th> <!-- 8 -->
													        <th>JUMLAH INDIVIDU</th> <!-- 9 -->
													        <th>JENIS KELAMIN</th> <!-- 10 -->
													        <th>TEMPAT LAHIR</th> <!-- 11 -->
													        <th>TANGGAL LAHIR</th> <!-- 12 -->
													        <th>NO. HP</th> <!-- 13 -->
											                <th>ALAMAT</th> <!-- 14 -->
											                <th>DESA</th> <!-- 15 -->
											                <th>KECAMATAN</th> <!-- 16 -->
											                <th>KOTA/KAB.</th>	<!-- 17 -->				                
											                <th>PROVINSI</th> <!-- 18 -->
											                <th>ASNAF</th> <!-- 19 -->
											                <th>SUMBER DANA</th> <!-- 20 -->
											                <th>PERIODE MENERIMA MANFAAT</th>
											                <th>TOTAL PERIODE</th> <!-- 21 -->
											                <th>JUMLAH BANTUAN (RP)</th> <!-- 22 -->
											                <th>DETAIL</th> 
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($individu as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
								        					<td><?php echo ucwords($data->nama) ?></td>
											                <td style="mso-number-format:\@;"><?php echo $data->nik ?></td>
								        					<td><?php echo ucwords($data->nama_kk) ?></td>
															<td style="mso-number-format:\@;"><?php echo $data->no_kk ?></td>
															<td align="center"><?php echo ucwords(strtolower($data->nama_program)) ?></td>														
															<td><?php echo $data->nama_subprogram ?></td>
															<td><?php echo $data->jenis_bantuan ?></td>
															<td align="center"><?php echo $data->jum_individu ?></td>
															<td align="center">
																<?php if ($data->jk == 'L') {
																	echo "Laki-laki";
																}else{
																	echo "Perempuan";
																}  ?>
															</td>
															<td><?php echo ucwords(strtolower($data->tmpt_lahir)) ?></td>
															<td align="center"><?php echo $data->tgl_lahir ?></td>
											                <td><?php echo $data->no_hp ?></td>
															<td><?php echo ucwords(strtolower($data->alamat)) ?></td>
															<td><?php echo $data->desa_kelurahan ?></td>
															<td><?php echo $data->kecamatan_name ?></td>
															<td><?php echo $data->kota_kab ?></td>
															<td><?php echo $data->provinsi ?></td>
															<td><?php echo $data->asnaf ?></td>
											                <td><?php echo $data->sumber_dana ?></td>
											                <td><?php echo date('F Y', strtotime($data->periode_bantuan))?></td>
											                <td align="center"><?php echo $data->total_periode ?></td>
															<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
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
		                            		
		                            		<div class="col-lg-12 col-xs-12">
			                            			<div class="row">	
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>NAMA KOMUNITAS</p>
				                                              <select type="text" style="width: 100%;" class="form-control selectpicker nama-komunitas">
				                                              	<option value="">Silahkan Pilih...</option>
				                                              	<?php foreach ($komunitas as $row) { ?>
				                                              		<option value="<?php echo ucwords(strtolower($row->nama_komunitas)) ?>"><?php echo ucwords(strtolower($row->nama_komunitas)) ?></option>
				                                              	<?php } ?>
				                                              </select>
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-4">
					                            			<fieldset class="form-group">
				                                              <p>PERIODE</p>
				                                              <input type="month" class="form-control month-komunitas">
				                                            </fieldset>
					                            		</div>
					                            	</div>
					                        	</div>				                        
			                            	<table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th>NO</th>
														<th>NAMA KOMUNITAS</th>
														<th>NAMA PROGRAM</th>
														<th>JENIS PROGRAM</th>
														<th>BENTUK MANFAAT/KEGIATAN</th>
														<th>JUMLAH INDIVIDU</th>
														<th>ALAMAT</th>
														<th>DESA</th>
														<th>KECAMATAN</th>
														<th>KOTA/KAB.</th>
														<th>PROVINSI</th>
														<th>ASNAF</th>
														<th>SUMBER DANA</th>
														<th>PERIODE MENERIMA MANFAAT</th>
														<th>TOTAL PERIODE</th>
														<th>JUMLAH BANTUAN (RP)</th>
														<th>ACTION</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($komunitas as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
															<td><?php echo ucwords(strtolower($data->nama_komunitas)) ?></td>
															<td align="center"><?php echo ucwords(strtolower($data->nama_program)) ?></td>
															<td><?php echo $data->nama_subprogram ?></td>
								        					<td><?php echo ucwords($data->jenis_bantuan) ?></td>
															<td><?php echo $data->jumlah_pm ?> Orang</td>
															<td><?php echo $data->alamat ?></td>
															<td><?php echo $data->desa_kelurahan ?></td>
															<td><?php echo $data->kecamatan_name ?></td>
															<td><?php echo $data->kota_kab ?></td>
															<td><?php echo $data->provinsi ?></td>
															<td><?php echo $data->asnaf ?></td>
															<td><?php echo $data->sumber_dana ?></td>
											                <td><?php echo date('F Y', strtotime($data->periode_bantuan))?></td>
											                <td align="center"><?php echo $data->total_periode ?></td>
															<td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
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
	$(document).ready(function() { 
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
	    	"language"  : {
	            "lengthMenu"  : "_MENU_",
	            "info"  	  : "Page _PAGE_ of _PAGES_",
	            "infoFiltered": "(filtered from _MAX_ total records)"
	        },
	    	"buttons" : [ 
	    		{
                    extend: 'copy',
                    exportOptions: {
                        columns  : [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                        format   : {
			                body : function (data, row, column, node ) {
			                    return column === 2,4 ? "\0" + data : data;
			                }
			            }
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns  : [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                        format   : {
			                body : function (data, row, column, node ) {
			                    return column === 2,4 ? "\0" + data : data;
			                }
			            }
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22],
                        format: {
			                body: function (data, row, column, node ) {
			                    return column === 2,4 ? "\0" + data : data;
			                }
			            }
                    }
                }, 
	    		{
                    extend: 'print',
                    exportOptions: {
                        columns  : [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22]
                    },
                    customize: function(win){
		 
		                var last    = null;
		                var current = null;
		                var bod     = [];
		                var css     = '@page { size: landscape; }',
		                    head    = win.document.head || win.document.getElementsByTagName('head')[0],
		                    style   = win.document.createElement('style');

		                style.type  = 'text/css';
		                style.media = 'print';
		 
		                if (style.styleSheet){
		                  	style.styleSheet.cssText = css;
		                } else {
		                  	style.appendChild(win.document.createTextNode(css));
		                }
		 
		                head.appendChild(style);
		         	}
                } 
	    	]
	    });

	    $('.month-individu').change(function(){
		    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    		var d = new Date($('.month-individu').val());
    		var serachVal = month[d.getMonth()]+' '+d.getFullYear();
    		table.column(20).search(serachVal).draw();
		});

		$(".nama-individu").on("change", function(){
    		var nama = $('.nama-individu').val();
    		table.column(1).search(nama).draw();
  		});


	    var table2 = $('#tabel-komunitas').DataTable({
	    	"scrollX"	: true,
	    	"pageLength": 25,
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
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15]
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

	    $('.month-komunitas').change(function(){
		    const month = ["January","February","March","April","May","June","July","August","September","October","November","December"];
    		var d = new Date($('.month-komunitas').val());
    		var serachVal = month[d.getMonth()]+' '+d.getFullYear();
    		table2.column(13).search(serachVal).draw();
		});

  		$(".nama-komunitas").on("change", function(){
    		var nama = $('.nama-komunitas').val();
    		table2.column(1).search(nama).draw();
  		});

		$('#cariindividu').change(function(){
		    table.search($(this).val()).draw() ;
		})

		$('#carikomunitas').change(function(){
		    table2.search($(this).val()).draw() ;
		})
 
	});

</script>