<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css">

<style type="text/css">
	.highcharts-figure,
	.highcharts-data-table table {
	    min-width: 320px;
	    max-width: 660px;
	    margin: 1em auto;
	}

	.highcharts-data-table table {
	    font-family: Verdana, sans-serif;
	    border-collapse: collapse;
	    border: 1px solid #ebebeb;
	    margin: 10px auto;
	    text-align: center;
	    width: 100%;
	    max-width: 500px;
	}

	.highcharts-data-table caption {
	    padding: 1em 0;
	    font-size: 1.2em;
	    color: #555;
	}

	.highcharts-data-table th {
	    font-weight: 600;
	    padding: 0.5em;
	}

	.highcharts-data-table td,
	.highcharts-data-table th,
	.highcharts-data-table caption {
	    padding: 0.5em;
	}

	.highcharts-data-table thead tr,
	.highcharts-data-table tr:nth-child(even) {
	    background: #f8f8f8;
	}

	.highcharts-data-table tr:hover {
	    background: #f1f7ff;
	}

</style>

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

					                        	<div class="col-lg-12" style="z-index: 9;">
			                            			<div class="row">
					                            		<div class="col-lg-6">
					                            			<figure class="highcharts-figure">
															    <div id="chart1"></div>
															</figure>
					                            		</div>
					                            		<div class="col-lg-6">
					                            			<figure class="highcharts-figure">
															    <div id="chart2"></div>
															</figure>
					                            		</div>
					                            	</div>
					                        		<hr>
					                            </div>

		                            			<div class="col-lg-12 col-xs-12">
			                            			<div class="row">
					                            		<div class="col-xs-12 col-lg-6">
					                            			<fieldset class="form-group">
				                                              <p>Tanggal Awal</p>
				                                              <input type="text" class="form-control" id="min">
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-6">
					                            			<fieldset class="form-group">
				                                              <p>Tanggal Akhir</p>
				                                              <input type="text" class="form-control" id="max">
				                                            </fieldset>
					                            		</div>
					                            		<div class="col-xs-12 col-lg-4" hidden>
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
											                <th width="5px">NO.</th> <!-- 0 -->
											                <th>PETUGAS/USER</th>
											                <th>TGL</th> <!-- 1 -->
											                <th>NAMA PEMOHON</th> <!-- 3 -->
											                <th>NO KTP</th> <!-- 3 -->
															<th>NAMA KK</th> <!-- 5 -->
													        <th>NO KK</th> <!-- 6 -->
													        <th>JML ANGGOTA KEL</th> <!-- 7 -->
													        <th>JK</th> <!-- 8 -->
													        <th>TEMPAT LAHIR</th> <!-- 9 -->
													        <th>TANGGL LAHIR</th> <!-- 10 -->
													        <th>USIA</th> <!-- 11 -->
													        <th>ALAMAT</th> <!-- 12 -->
													        <th>KELURAHAN</th> <!-- 13 -->
											                <th>KECAMATAN</th> <!-- 14 -->
											                <th>KAB/KOTA</th> <!-- 15 -->
											                <th>PROVINSI</th> <!-- 16 -->
											                <th>KODE POS</th>	<!-- 17 -->				        
											                <th>TELP</th> <!-- 18 -->
											                <th>STATUS PERNIKAHAN</th> <!-- 19 -->
											                <th>PENDIDIKAN TERKAHIR</th> <!-- 20 -->
											                <th>PEKERJAAN</th> <!-- 21 -->
											                <th>PHOTO</th> <!-- 22 -->
											                <th>ACTION</th> 
											            </tr>
								                    </thead>
								                    <tbody>
														<?php $no = 1; foreach($individu as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <td><?php echo ucwords($data->petugas) ?></td>
											                <td><?php echo date('Y-m-d', strtotime($data->tanggal_transaksi)) ?></td>
															<td><?php echo ucwords($data->nama) ?></td>
															<td><?php echo $data->nik ?></td>
								        					<td><?php echo ucwords($data->nama_kk) ?></td>
								        					<td><?php echo $data->no_kk ?></td>
															<td align="center"><?php echo $data->jum_individu ?></td>
															<td align="center"><?php echo $data->jk ?></td>
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
															<td><?php echo $data->kota_kab  ?></td>
															<td><?php echo $data->provinsi  ?></td>
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
											                <td class="text-center">
											                	<a href="<?php echo base_url().'lamusta/detail_individu/'.$data->nik ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span>
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
		                            		<div class="col-lg-12" style="z-index: 9;">
					                            <div class="row">
							                        <div class="col-lg-6">
							                            <figure class="highcharts-figure">
															<div id="chart3"></div>
														</figure>
							                        </div>
							                        <div class="col-lg-6">
							                            <figure class="highcharts-figure">
															<div id="chart4"></div>
														</figure>
							                        </div>
							                    </div>
							                    <hr>
							                </div>
		                            		<div class="col-lg-12">
			                            		<div class="row">
					                            	<div class="col-lg-6">
					                            		<fieldset class="form-group">
				                                            <p>Tanggal Awal</p>
				                                            <input type="text" class="form-control" id="minKom">
				                                        </fieldset>
					                            	</div>
					                            	<div class="col-lg-6">
					                            		<fieldset class="form-group">
				                                            <p>Tanggal Akhir</p>
				                                            <input type="text" class="form-control" id="maxKom">
				                                        </fieldset>
					                            	</div>
					                            	<div class="col-lg-4" hidden>
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
			                            	<table id="tabelkomunitas" class="table table-striped nowrap" width="100%">
												<thead>
													<tr>
										                <th>NO</th>
														<th>PETUGAS/USER</th>
														<th>TGL</th>
														<th>NAMA KOMUNITAS</th>
														<th>PROFIL KOMUNITAS</th>
														<th>ALAMAT</th>
														<th>KELURAHAN</th>
														<th>KECAMATAN</th>
														<th>KAB/KOTA</th>
														<th>PROVINSI</th>
														<th>KODE POS</th>
														<th>NO TELP</th>
														<th>NAMA PJ</th>
														<th>NIK PJ</th>
														<th>PHOTO KOMUNITAS</th>
														<th>ACTION</th>
										            </tr>
							                    </thead>
							                    <tbody>
													<?php $no = 1; foreach($komunitas as $data){ ?>
											            <tr>
											                <td><?php echo $no ?></td>
											                <th><?php echo ucwords($data->petugas) ?></th>
											                <td><?php echo $data->tanggal_transaksi ?></td>
															<td><?php echo ucwords($data->nama_komunitas) ?></td>
											                <td><?php echo ucwords($data->profil_komunitas) ?></td>
															<td><?php echo ucwords($data->alamat) ?></td>
															<td><?php echo ucwords($data->desa_kelurahan) ?></td>
															<td><?php echo ucwords($data->kecamatan_name) ?></td>
															<td><?php echo ucwords($data->kota_kab)  ?></td>
															<td><?php echo ucwords($data->provinsi)  ?></td>
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

<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<!-- script src="https://code.highcharts.com/modules/exporting.js"></script -->
<!-- script src="https://code.highcharts.com/modules/export-data.js"></script -->
<!-- script src="https://code.highcharts.com/modules/accessibility.js"></script -->

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
	        var date = new Date( data[2] );
	 
	        if (
	            ( min === null && max === null ) ||
	            ( min === null && date <= max ) ||
	            ( min <= date  && max === null ) ||
	            ( min <= date  && date <= max ) ||
	            ( min == date  && date == max ) ||
	            ( min == date  && date === null ) ||
	            ( min === null  && date == max )
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
	        var date2 = new Date( data[2] );
	 
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
                layout: 'columns-4',
	            collapse: false
            },
            "columnDefs" :[
            	{
	                searchPanes:{
	                    show: true,
	                },
	                targets: [2,3,15,16],
            	}
            ],
	    	"pageLength": 25,
	    	"dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
	    	"buttons"	: [ 
	    		{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
                    }
                }, 
	    		{
                    extend: 'print',
                    exportOptions: {
                        columns: [0,1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22]
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

	    var table2 = $('#tabelkomunitas').DataTable({
	    	"scrollX"	: true,
	    	"searchPanes" :{
                cascadePanes: true,
                layout: 'columns-4',
	            collapse: false
            },
            "columnDefs" :[
            	{
	                searchPanes:{
	                    show: true,
	                },
	                targets: [2,3,8,9],
            	}
            ],
	    	"pageLength": 25,
	    	"dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
	    	"buttons"	: [ 
	    		{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },  
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                }, 
	    		{
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14]
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
	    }).searchPanes.rebuildPane();
	 
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
 
	    var chart = Highcharts.chart('chart1', {
	        chart: {
	            type: 'pie',
	        },
	        title: {
	            text: 'Provinsi',
	        },
	        series: [
	            {
	                data: chartData(table),
	            },
	        ],
	    });

	    var charts = Highcharts.chart('chart2', {
	        chart: {
		        type: 'pie'
	        },
	        title: {
	            text: 'Kota/Kabupaten',
	        },
	        series: [
	            {	
	                data: chartDatas(table),
	            },
	        ],
	    });

	    var chart2 = Highcharts.chart('chart3', {
	        chart: {
	            type: 'pie',
	        },
	        title: {
	            text: 'Provinsi',
	        },
	        series: [
	            {
	                data: chartData2(table2),
	            },
	        ],
	    });

	    var charts2 = Highcharts.chart('chart4', {
	        chart: {
		        type: 'pie'
	        },
	        title: {
	            text: 'Kota/Kabupaten',
	        },
	        series: [
	            {	
	                data: chartDatas2(table2),
	            },
	        ],
	    });
	 
	    table.on('draw', function () {
	        chart.series[0].setData(chartData(table));
	    });

	    table.on('draw', function () {
	        charts.series[0].setData(chartDatas(table));
	    });

	    table2.on('draw', function () {
	        chart2.series[0].setData(chartData2(table2));
	    });

	    table2.on('draw', function () {
	        charts2.series[0].setData(chartDatas2(table2));
	    });
	});

	function chartData(table) {
	    var counts = {};

	    table
	        .column(16, { search: 'applied' })
	        .data()
	        .each(function (val) {
	            if (counts[val]) {
	                counts[val] += 1;
	            } else {
	                counts[val] = 1;
	            }
	        });
	 
	    return $.map(counts, function (val, key) {
	        return {
	            name: key,
	            y: val,
	        };
	    });
	}

	function chartDatas(table) {
	    var count = {};

	    table
	        .column(15, { search: 'applied' })
	        .data()
	        .each(function (val) {
	            if (count[val]) {
	                count[val] += 1;
	            } else {
	                count[val] = 1;
	            }
	        });
	 
	    return $.map(count, function (val, key) {
	        return {
	            name: key,
	            colorByPoint: true,
	            y: val,
	            sliced: true,
            	selected: true
	        };
	    });
	}

	function chartData2(table2) {
	    var counts2 = {};

	    table2
	        .column(9, { search: 'applied' })
	        .data()
	        .each(function (val) {
	            if (counts2[val]) {
	                counts2[val] += 1;
	            } else {
	                counts2[val] = 1;
	            }
	        });
	 
	    return $.map(counts2, function (val, key) {
	        return {
	            name: key,
	            y: val,
	        };
	    });
	}

	function chartDatas2(table2) {
	    var count2 = {};

	    table2
	        .column(8, { search: 'applied' })
	        .data()
	        .each(function (val) {
	            if (count2[val]) {
	                count2[val] += 1;
	            } else {
	                count2[val] = 1;
	            }
	        });
	 
	    return $.map(count2, function (val, key) {
	        return {
	            name: key,
	            colorByPoint: true,
	            y: val,
	            sliced: true,
            	selected: true
	        };
	    });
	}

</script>