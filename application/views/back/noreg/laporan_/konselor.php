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

                                                    <table id="tabel-individu" class="table table-striped nowrap" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="5px">No</th>
                                                                <th>NAMA PENERIMA MANFAAT</th>
                                                                <th>NO KTP</th>
                                                                <th>NAMA KK</th>
                                                                <th>NO KK</th>

                                                                <th>NAMA PROGRAM </th>
                                                                <th>SUB PROGRAM </th>
                                                                <th>BENTUK MANFAAT </th>
                                                                <th>JENIS KELAMIN </th>
                                                                <th>ALAMAT</th>

                                                                <th>KELURAHAN/DESA</th>
                                                                <th>KECAMATAN</th>
                                                                <th>KABUPATEN/KOTA</th>
                                                                <th>PROVINSI</th>
                                                                <th>PEKERJAAN</th>

                                                                <th>NO TELP</th>
                                                                <th>ASNAF</th>
                                                                <th>SUMBER DANA</th>
                                                                <th>PERIODE PM</th>
                                                                <th>TOTAL PERIODE</th>

                                                                <th>JUMLAH BANTUAN</th>
                                                                <th>Action</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($individu as $data) { ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo ucwords($data->nama) ?></td>
                                                                    <td><?php echo $data->nik ?></td>
                                                                    <td>NAMA KK</td>
                                                                    <td>NO KK</td>

                                                                    <td><?php echo $data->nama_program ?></td>
                                                                    <td><?php echo $data->nama_subprogram ?></td>
                                                                    <td><?php echo $data->jenis_bantuan ?></td>
                                                                    <td><?php echo $data->jk ?></td>
                                                                    <td><?php echo $data->alamat ?></td>

                                                                    <td><?php echo $data->desa_kelurahan ?></td>
                                                                    <td><?php echo $data->kecamatan_name ?></td>
                                                                    <td><?php echo $data->kota_kab ?></td>
                                                                    <td><?php echo $data->provinsi ?></td>
                                                                    <td><?php echo $data->pekerjaan ?></td>

                                                                    <td><?php echo $data->no_hp ?></td>
                                                                    <td><?php echo $data->asnaf ?></td>
                                                                    <td><?php echo $data->sumber_dana ?></td>
                                                                    <td><?php echo date("d-m-Y", strtotime($data->periode_bantuan)) ?>
                                                                    </td>

                                                                    <td><?php echo $data->total_periode ?></td>
                                                                    <td> Rp.
                                                                        <?php echo number_format($data->jumlah_bantuan) ?>
                                                                    </td>

                                                                    <td class="text-center">
                                                                        <a href="<?php echo base_url('noreg/detail_laporan_individu/' . $data->nik) ?>" class="btn btn-primary btn-sm" title="Detail"><span><i class="fa fa-eye"></i></span> </a>
                                                                    </td>
                                                                </tr>
                                                            <?php
                                                                $no += 1;
                                                            } ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>


                                            <!-- KOMUNITAS -->
                                            <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">

                                                <div class="col-lg-12">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h5> Rekap Non Reguler (Pusat) - Komunitas </h5>
                                                            <table class="table table-bordered table-striped nowrap">
                                                                <thead>
                                                                    <tr>

                                                                        <th>No</th>
                                                                        <th>Tanggal Transaksi</th>
                                                                        <th>NAMA KOMUNITAS</th>
                                                                        <th>JUMLAH PM</th>
                                                                        <th>NAMA PROGRAM </th>

                                                                        <th>SUB PROGRAM </th>
                                                                        <th>BENTUK MANFAAT </th>
                                                                        <th>ASNAF</th>
                                                                        <th>SUMBER DANA</th>
                                                                        <th>JUMLAH BANTUAN</th>

                                                                        <th>PERIODE PM</th>
                                                                        <th>TOTAL PERIODE</th>
                                                                        <th>REKOMENDER </th>
                                                                        <th>Action</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <?php $no = 1;
                                                                    foreach ($komunitas as $data) { ?>
                                                                        <tr>
                                                                            <td><?php echo $no ?></td>
                                                                            <td><?php echo $data->tanggal_transaksi ?></td>
                                                                            <td><?php echo $data->nama_komunitas ?></td>
                                                                            <td><?php echo $data->jumlah_pm ?></td>
                                                                            <td><?php echo strtolower($data->nama_program) ?></td>

                                                                            <td><?php echo $data->nama_subprogram ?></td>
                                                                            <td><?php echo $data->jenis_bantuan ?></td>
                                                                            <td><?php echo $data->asnaf ?></td>
                                                                            <td><?php echo $data->sumber_dana ?></td>
                                                                            <td>Rp.
                                                                                <?php echo number_format($data->jumlah_bantuan) ?>
                                                                            </td>
                                                                            <td>
                                                                                <?php if ($data->periode_bantuan == '0000-00-00') {
                                                                                    echo "-";
                                                                                } else {
                                                                                    echo date("d-m-Y", strtotime($data->periode_bantuan));
                                                                                } ?>
                                                                            </td>
                                                                            <td><?php echo $data->total_periode ?></td>

                                                                            <td><?php echo $data->nama_rekomender ?></td>
                                                                            <td>
                                                                                <a href="<?php echo base_url('noreg/detail_laporan_komunitas/' . $data->nik_transaksi) ?>" class="btn btn-primary btn-sm" title="Detail"> <span><i class="fa fa-eye"></i></span> </a>
                                                                            </td>
                                                                        </tr>
                                                                    <?php
                                                                        $no += 1;
                                                                    } ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
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
                                                                <th>PERIODE BANTUAN</th>

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
                                                                    <td>
                                                                        <?php if ($data->periode_bantuan == '0000-00-00') {
                                                                            echo "-";
                                                                        } else {
                                                                            echo date("d-m-Y", strtotime($data->periode_bantuan));
                                                                        } ?>
                                                                    </td>
                                                                    
                                                                    <td>
                                                                        <a href="<?php echo base_url('noreg/detail_laporan_komunitas/' . $data->nik_transaksi) ?>" class="btn btn-primary btn-sm" title="Detail"> <span><i class="fa fa-eye"></i></span> </a>
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
                targets: [1, 5],
            }],
            "pageLength": 21,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            "language": {
                "lengthMenu": "_MENU_",
                "info": "Page _PAGE_ of _PAGES_",
                "infoFiltered": "(filtered from _MAX_ total records)"
            },
            "buttons": [{
                    extend: 'copy',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                    }
                },
                {
                    extend: 'csv',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                    }
                },
                {
                    extend: 'excel',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                    }
                },
                {
                    extend: 'print',
                    exportOptions: {
                        columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20]
                    },
                    customize: function(win) {

                        var last = null;
                        var current = null;
                        var bod = [];

                        var css = '@page { size: landscape; }',
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
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
            "pageLength": 13,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
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
                            head = win.document.head || win.document.getElementsByTagName('head')[0],
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

    });
</script>