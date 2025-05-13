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

                                                    <table id="tabel-individu-simple" class="table table-striped nowrap" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="5px">No</th> <!-- 0 -->
                                                                <th>Nama Donatur</th> <!-- 1 -->
                                                                <th>Jenis Bantuan</th> <!-- 1 -->
                                                                <th>Jumlah PM</th> <!-- 1 -->
                                                                <th>Lokasi Program</th> <!-- 7 -->
                                                                <th>Jumlah Bantuan</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($individu as $data) { ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo $data->nama_komunitas ?></td>
                                                                    <td><?php echo $data->jenis_bantuan ?></td>
                                                                    <td><?php echo $data->jumlah_pm ?></td>
                                                                    <td><?php echo $data->lokasi_program ?></td>
                                                                    <td><?php echo $data->jumlah_bantuan ?></td>

                                                                </tr>
                                                            <?php
                                                                $no += 1;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <hr>
                                                <div class="row">

                                                    <table id="tabel-individu" class="table table-bordered" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th>NO</th>
                                                                <th>NIK</th>
                                                                <th>NAMA</th>
                                                                <th>NAMA KEPALA KELUARGA</th>
                                                                <th>JENIS KELAMIN</th>
                                                                <th>ALAMAT</th>
                                                                <th>KELURAHAN</th>
                                                                <th>KECAMATAN</th>
                                                                <th>KOTA</th>
                                                                <th>PROVINSI</th>
                                                                <th>NO HP</th>
                                                                <th>ASNAF</th>
                                                                <th>PERIODE BANTUAN</th>
                                                                <th class="bg-white">ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($individu_bawah as $data) { ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo $data->nik ?></td>
                                                                    <td><?php echo $data->nama ?></td>
                                                                    <td><?php echo $data->nama_kk ?></td>
                                                                    <td><?php echo $data->jk ?></td>
                                                                    <td><?php echo $data->alamat ?></td>
                                                                    <td><?php echo $data->desa_kelurahan ?></td>
                                                                    <td><?php echo $data->kecamatan_name ?></td>
                                                                    <td><?php echo $data->kota_kab ?></td>
                                                                    <td><?php echo $data->provinsi ?></td>
                                                                    <td><?php echo $data->no_hp ?></td>
                                                                    <td><?php echo $data->asnaf ?></td>
                                                                    <td>
                                                                        <?php if ($data->periode_bantuan == '0000-00-00') {
                                                                            echo "-";
                                                                        } else {
                                                                            echo date("d-m-Y", strtotime($data->periode_bantuan));
                                                                        } ?>
                                                                    </td>
                                                                    <td class="bg-white">
                                                                        <a href="<?php echo base_url('noreg/detail_laporan_individu/' . $data->id_transaksi_individu) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span> </a>
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
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <table class="table table-bordered">
                                                            <thead>
                                                                <tr>
                                                                    <th>NO</th>
                                                                    <th>NAMA DONATUR </th>
                                                                    <th>JENIS BANTUAN</th>
                                                                    <th>JUMLAH PM</th>
                                                                    <th>LOKASI PROGRAM</th>
                                                                    <th>PENERIMA (NAMA KOMUNITAS)</th>
                                                                    <th>JUMLAH BANTUAN</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <?php $no = 1;
                                                                foreach ($komunitas as $data1) { ?>
                                                                    <tr>
                                                                        <td><?php echo $no ?></td>
                                                                        <td><?php echo $data1->nama ?></td>
                                                                        <td><?php echo $data1->jenis_bantuan ?></td>
                                                                        <td><?php echo $data1->jumlah_pm ?></td>
                                                                        <td><?php echo $data1->lokasi_program ?></td>
                                                                        <td><?php echo $data1->nama_komunitas ?></td>
                                                                        <td>Rp. <?php echo number_format($data1->jumlah_bantuan) ?></td>

                                                                    </tr>
                                                                <?php
                                                                    $no += 1;
                                                                } ?>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                    <hr>
                                                </div>

                                                <div class="row">
                                                    <table id="tabel-komunitas" class="table table-striped nowrap" width="100%">
                                                        <thead>
                                                            <tr>

                                                                <th>No</th>
                                                                <th>NAMA DONATUR</th>
                                                                <th>PENERIMA</th>

                                                                <th>NOMINAL BANTUAN</th>
                                                                <th>NAMA SUB PROGRAM </th>
                                                                <th>DESKRIPSI / JENIS BANTUAN </th>

                                                                <th>JUMLAH PM</th>
                                                                <th>LOKASI PROGRAM</th>
                                                                <th>NAMA PIC</th>

                                                                <th>ASNAF</th>
                                                                <th>SUMBER DANA</th>
                                                                <th>PERIODE BANTUAN</th>
                                                                <th>TOTAL PERIODE</th>

                                                                <th>ACTION</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($komunitas as $data) { ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo ucwords($data->nama) ?></td>
                                                                    <td><?php echo $data->nama_komunitas ?></td>

                                                                    <td>Rp. <?php echo number_format($data->jumlah_bantuan) ?> </td>
                                                                    <td><?php echo $data->nama_subprogram ?></td>
                                                                    <td><?php echo $data->jenis_bantuan ?></td>

                                                                    <td><?php echo $data->jumlah_pm ?></td>
                                                                    <td><?php echo $data->lokasi_program ?></td>
                                                                    <td><?php echo $data->nama_pic ?></td>

                                                                    <td><?php echo $data->asnaf ?></td>
                                                                    <td><?php echo $data->sumber_dana ?></td>
                                                                    <td>
                                                                        <?php if ($data->periode_bantuan == '0000-00-00') {
                                                                            echo "-";
                                                                        } else {
                                                                            echo date("d-m-Y", strtotime($data->periode_bantuan));
                                                                        } ?>
                                                                    </td>
                                                                    <td><?php echo $data->total_periode ?></td>

                                                                    <td class="bg-white">
                                                                        <a href="<?php echo base_url('noreg/detail_laporan_komunitas/' . $data->id_transaksi_komunitas) ?>" class="btn btn-primary btn-sm" title="Detail"> <span><i class="fa fa-eye"></i></span> </a>
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

<script type="text/javascript" src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js">
</script>
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
    $(document).ready(function() {

        var table = $('#tabel-individu').DataTable({
            "scrollX": true,
            "searchPanes": {
                cascadePanes: true
            },
            "searchPanes": true,
            "columnDefs": [{
                searchPanes: {
                    show: true,
                },
                targets: [1, 6],
            }],
            "pageLength": 6,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom": '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            "language": {
                "lengthMenu": "_MENU_",
                "info": "Page _PAGE_ of _PAGES_",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5]
                    },
                    customize: function(win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[
                                0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                }
            ]
        });

        var tabelindividusimple = $('#tabel-individu-simple').DataTable({
            "scrollX": true,
            "searchPanes": {
                cascadePanes: false
            },
            "searchPanes": true,
            "columnDefs": [{
                searchPanes: {
                    show: false,
                },
                targets: [1, 5],
            }],
            "pageLength": 5,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>t<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom": '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            "language": {
                "lengthMenu": "_MENU_",
                "info": "Page _PAGE_ of _PAGES_",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "buttons": [],
            "bFilter": false

        });

        var table2 = $('#tabel-komunitas').DataTable({
            "scrollX": true,
            "searchPanes": {
                cascadePanes: true
            },
            "searchPanes": true,
            "columnDefs": [{
                searchPanes: {
                    show: true,
                },
                targets: [1],
            }],
            "pageLength": 12,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom": '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            "language": {
                "lengthMenu": "_MENU_",
                "info": "Page _PAGE_ of _PAGES_",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    },
                    customize: function(win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[
                                0],
                            style = win.document.createElement('style');

                        style.type = 'text/css';
                        style.media = 'print';

                        if (style.styleSheet) {
                            style.styleSheet.cssText = css;
                        } else {
                            style.appendChild(win.document.createTextNode(css));
                        }

                        head.appendChild(style);
                    }
                }
            ]
        }).searchPanes.rebuildPane();

        var chart = Highcharts.chart('chart1', {
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Nama Donatur/Komunitas',
            },
            series: [{
                data: chartData(tabelindividusimple),
            }, ],
        });

        var charts = Highcharts.chart('chart2', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Jenis Bantuan',
            },
            series: [{
                data: chartDatas(tabelindividusimple),
            }, ],
        });

        var chart2 = Highcharts.chart('chart3', {
            chart: {
                type: 'pie',
            },
            title: {
                text: 'Nama Sub Program',
            },
            series: [{
                data: chartData2(table2),
            }, ],
        });

        var charts2 = Highcharts.chart('chart4', {
            chart: {
                type: 'pie'
            },
            title: {
                text: 'Donatur',
            },
            series: [{
                data: chartDatas2(table2),
            }, ],
        });

    });



    function chartData(table) {
        var counts = {};

        table
            .column(1, {
                search: 'applied'
            })
            .data()
            .each(function(val) {
                if (counts[val]) {
                    counts[val] += 1;
                } else {
                    counts[val] = 1;
                }
            });

        return $.map(counts, function(val, key) {
            return {
                name: key,
                y: val,
                sliced: true,
            };
        });
    }

    function chartDatas(table) {
        var count = {};
        table
            .column(2, {
                search: 'applied'
            })
            .data()
            .each(function(val) {
                if (count[val]) {
                    count[val] += 1;
                } else {
                    count[val] = 1;
                }
            });

        return $.map(count, function(val, key) {
            return {
                name: key,
                colorByPoint: true,
                y: val,
                sliced: true,
                // selected: true
            };
        });
    }

    function chartData2(table2) {
        var counts2 = {};

        table2.column(4, {
                search: 'applied'
            })
            .data()
            .each(function(val) {
                if (counts2[val]) {
                    counts2[val] += 1;
                } else {
                    counts2[val] = 1;
                }
            });

        return $.map(counts2, function(val, key) {
            return {
                name: key,
                y: val,
                sliced: true,
            };
        });
    }

    function chartDatas2(table2) {
        var count2 = {};

        table2.column(1, {
                search: 'applied'
            })
            .data()
            .each(function(val) {
                if (count2[val]) {
                    count2[val] += 1;
                } else {
                    count2[val] = 1;
                }
            });

        return $.map(count2, function(val, key) {
            return {
                name: key,
                colorByPoint: true,
                y: val,
                sliced: true,
                // selected: true
            };
        });
    }
</script>