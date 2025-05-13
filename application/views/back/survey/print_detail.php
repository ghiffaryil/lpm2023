<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Survey</title>
    <link rel="icon" href="../assets/esurvey/dist/img/favicon.png">
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="../assets/esurvey/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/esurvey/plugins/fontawesome-free-5.15.4-web/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.css" />
    <link rel="stylesheet" href="../assets/esurvey/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../assets/esurvey/dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../assets/esurvey/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="../assets/esurvey/dist/css/custom/style.css">
    <link rel="stylesheet" href="../assets/esurvey/bower_components/select2/dist/css/select2.min.css">
    <script src="../assets/esurvey/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="../assets/esurvey/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="../assets/esurvey/bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <link rel="stylesheet" href="../assets/esurvey/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <link rel='stylesheet' href='//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <!-- Disable Back Browser -->
    <!--script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script-->

    <link rel="stylesheet" href="../assets/esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.css" />
    <link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">

    <!-- <style type="text/css">
        .container {
            padding: 50px 10%;
        }

        .box {
            position: relative;
            background: #ffffff;
            width: 100%;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }

        .box-tools {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .dropzone-wrapper {
            border: 2px dashed #91b0b3;
            color: #92b0b3;
            position: relative;
            height: 80px;
        }

        .dropzone-desc {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            text-align: center;
            width: 50%;
            top: 15px;
            font-size: 16px;
        }

        .dropzone,
        .dropzone:focus {
            position: absolute;
            outline: none !important;
            width: 100%;
            height: 80px;
            cursor: pointer;
            opacity: 0;
        }

        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
            background: #ecf0f5;
        }

        .preview-zone {
            text-align: center;
        }

        .preview-zone .box {
            box-shadow: none;
            border-radius: 0;
            margin-bottom: 0;
        }

        /* fixed select2 */
        .select2-container {
            width: 100% !important;
        }

        .select2-search--dropdown .select2-search__field {
            width: 98%;
        }
    </style> -->

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


    <!-- <style type="text/css">
        #data.dataTable.no-footer {
            border-bottom: unset;
        }

        #data tbody td {
            display: block;
            border: unset;
        }

        #data>tbody>tr>td {
            border-top: unset;
        }
    </style> -->

</head>

<body style="font-size: 12px;">

    <div class="row">
        <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
            <div class="panel">
                <div class="panel-body">
                    <section class="content">

                        <div class="row">
                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
                                <h4> <strong> IDENTITAS MUSTAHIK </strong> </h4>
                                <hr>
                                <address class="text-capitalize">
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Nama</strong>
                                        <span class="pull-right"><?php echo $detail['nama_mustahik']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Nama Kepala Keluarga</strong>
                                        <span class="pull-right"><?php echo $detail['nama_kepala_keluarga']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">No Telp</strong>
                                        <span class="pull-right"><?php echo $detail['no_telp']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Alamat</strong>
                                        <span class="pull-right"><?php echo $detail['alamat']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Kelurahan</strong>
                                        <span class="pull-right"><?php echo @$nama_kel['desa_kelurahan']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Kecamatan</strong>
                                        <span class="pull-right"><?php echo @$nama_kec['kecamatan_name'] ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Kabupaten</strong>
                                        <span class="pull-right"><?php echo @$nama_kab['kota_kab'] ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Provinsi</strong>
                                        <span class="pull-right"><?php echo @$nama_prov['provinsi'] ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Jenis Kelamin</strong>
                                        <span class="pull-right"><?php echo $detail['jenis_kelamin']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Usia</strong>
                                        <span class="pull-right"><?php echo $detail['usia']; ?> Tahun</span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Pekerjaan</strong>
                                        <span class="pull-right"><?php echo $detail['pekerjaan']; ?></span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Penghasilan</strong>
                                        <span class="pull-right">Rp.<?php echo $detail['penghasilan']; ?>,-</span>
                                    </p>
                                    <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                        <strong style="font-weight: bold;">Jumlah Tanggungan</strong>
                                        <span class="pull-right"><?php echo $detail['jumlah_tanggungan']; ?> Orang</span>
                                    </p>
                                </address>
                            </div>
                            <div class="col-xs-8 col-lg-8 col-md-8 col-sm-8">
                                <iframe src='https://maps.google.com/maps?q="<?php echo $detail['maps']; ?>"&t=&z=13&ie=UTF8&iwloc=&output=embed' style='width: 100%; height: 212px;' class="img-thumbnail"></iframe>
                                <br>
                                <div class="row">
                                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                        <address class="text-capitalize">
                                            <h4> <strong> DATA MASUK LPM </strong> </h4>
                                            <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                <strong style="font-weight: bold;">Tanggal Pengajuan</strong>
                                                <span class="pull-right"><?php echo date('d-m-Y', strtotime($detail['tanggal_masuk'])); ?></span>
                                            </p>
                                            <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                <strong style="font-weight: bold;">Petugas Konseling</strong>
                                                <span class="pull-right"><?php echo $detail['petugas_konseling']; ?></span>
                                            </p>
                                            <h4> <strong> PELAKSANAAN SURVEY </strong> </h4>
                                            <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                <strong style="font-weight: bold;">Tanggal Survey</strong>
                                                <span class="pull-right"><?php echo date('d-m-Y', strtotime($detail['created_at'])); ?></span>
                                            </p>
                                            <p class="border-botom" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                <strong style="font-weight: bold;">Petugas Survey</strong>
                                                <span class="pull-right">0<?php echo $detail['petugas_survey']; ?></span>
                                            </p>
                                        </address>
                                    </div>
                                    <div class="col-xs-6 col-lg-6 col-md-6 col-sm-6">
                                        <p class="img-thumbnail text-center">
                                            <canvas id="qrcode"></canvas><br>
                                            <b style="margin-top: -120px;">Scan Maps</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                <div class="panel panel-default">

                                    <div class="panel-body">

                                        <div class="row mt-5">
                                            <div class="col-xs-12 col-lg-12 col-md-12 col-sm-12">
                                                <h2> <strong> HASIL SURVEY</strong></h2>
                                                <hr>
                                            </div>

                                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
                                                <center>
                                                    <address>
                                                        <img src="../assets/esurvey/foto/<?php echo $detail['foto']; ?>" class="img-thumbnail" width="200px">
                                                    </address>

                                                </center>
                                            </div>

                                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
                                                <div class=" row small-box bg-aqua " style="background-color: #00c0ef; color:white; padding:5px; padding-left:10px; border-radius: 10px;">
                                                    <div class="col-xs-8 col-lg-8 col-md-8 col-sm-8">
                                                        <h1 style="font-weight: 800;"> <?php echo $detail['hasil_scoring']; ?></h1>
                                                        <p>Total Scoring</p>
                                                        <p><strong style="font-weight: 600;">Rekomendasi Scoring :</strong></br><?php echo $detail['rekomendasi_skoring']; ?></p>
                                                        <p><strong style="font-weight: 600;">Keterangan :</strong></br>
                                                            <?php if ($detail['kelayakan'] == 'undefined') {
                                                                echo "-";
                                                            } else {
                                                                echo $detail['kelayakan'];
                                                            } ?></p>
                                                    </div>
                                                    <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="40px" height="90px" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M439.91 112h-23.82a.09.09 0 0 0-.09.09V416a32 32 0 0 0 32 32a32 32 0 0 0 32-32V152.09A40.09 40.09 0 0 0 439.91 112Z" />
                                                                <path fill="currentColor" d="M384 416V72a40 40 0 0 0-40-40H72a40 40 0 0 0-40 40v352a56 56 0 0 0 56 56h342.85a1.14 1.14 0 0 0 1.15-1.15a1.14 1.14 0 0 0-.85-1.1A64.11 64.11 0 0 1 384 416ZM96 128a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v64a16 16 0 0 1-16 16h-64a16 16 0 0 1-16-16Zm208 272H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 368h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 400Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 304h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 336Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 240h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 272Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 176h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 208Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 112h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 144Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-xs-4 col-lg-4 col-md-4 col-sm-4">

                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Jenis Permohonan</strong>
                                                    <span class="pull-right"><?php echo $detail['jenis_permohonan']; ?></span>
                                                </div>
                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Asnaf</strong>
                                                    <span class="pull-right"><?php echo $detail['asnaf']; ?></span>
                                                </div>
                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Bentuk Bantuan</strong>
                                                    <span class="pull-right"><?php echo $detail['bentuk_bantuan']; ?></span>
                                                </div>
                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Sifat Bantuan</strong>
                                                    <span class="pull-right"><?php echo $detail['sifat_bantuan']; ?></span>
                                                </div>
                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Tindak Lanjut</strong>
                                                    <span class="pull-right">
                                                        <?php if ($detail['tindak_lanjut'] == 'undefined') {
                                                            echo "-";
                                                        } else {
                                                            echo $detail['tindak_lanjut'];
                                                        } ?>
                                                    </span>
                                                </div>
                                                <div class="border-botom mb-2" style="border-width: 2px;  border-bottom: 1px solid #ccc;">
                                                    <strong style="font-weight: bold;">Tanggal Rekomendasi</strong>
                                                    <span class="pull-right"><?php echo date('d-m-Y', strtotime($detail['tanggal_rekomendasi'])); ?></span>
                                                </div>

                                                <p><strong style="font-weight: bold;">Alasan :</strong><br>
                                                    <?php if (!empty($detail['alasan'])) {
                                                        echo $detail['alasan'];
                                                    } else {
                                                        echo "Tidak ada alasan.";
                                                    } ?>
                                                </p>
                                                <p><strong style="font-weight: bold;">Catatan :</strong><br>
                                                    <?php if (!empty($detail['catatan'])) {
                                                        echo $detail['catatan'];
                                                    } else {
                                                        echo "Tidak ada catatan.";
                                                    } ?>
                                                </p>
                                                <p><strong style="font-weight: bold;">Rekomendasi LPM :</strong><br>
                                                    <?php if (!empty($detail['rekomendasi_lpm'])) {
                                                        echo $detail['rekomendasi_lpm'];
                                                    } else {
                                                        echo "Tidak ada catatan.";
                                                    } ?>
                                                </p>
                                            </div>
                                        </div>

                                        <div class="row no-print">
                                            <div class="col-xs-6 col-lg-6 col-sm-6 visible-lg">

                                            </div>
                                            <br>


                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <?php $this->load->view('back/template/footer'); ?>

                <script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
                <script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
                <script type="text/javascript">
                    alert('bismillah')
                    window.onload = function() {
                        let url = 'https://maps.google.com/maps?q="<?php echo $detail['maps']; ?>"&t=&z=13';
                        alert(url)
                        QRCode.toCanvas(document.getElementById("qrcode"), url, function(error) {
                            if (error) console.error(error);
                        });
                    };
                </script>
                <script src="../assets/esurvey/js/qrcode.min.js"></script>
                <script src="../assets/esurvey/bower_components/jquery/dist/jquery.min.js"></script>
                <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                <script src="../assets/esurvey/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
                <script src="../assets/esurvey/dist/js/adminlte.min.js"></script>
                <link rel="stylesheet" href="../assets/esurvey/plugins/fontawesome-free-5.15.4-web/js/all.min.js">
                <script src="../assets/esurvey/dist/js/demo1.js"></script>
                <script src="../assets/esurvey/bower_components/moment/min/moment.min.js"></script>
                <script type="text/javascript" src="../assets/esurvey/bower_components/jquery-ui/jquery-ui.js"></script>
                <script src="//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
                <script src="../assets/esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.js"></script>
                <script src="../assets/esurvey/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
                <script src="../assets/esurvey/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
                <script type="text/javascript" src="../assets/esurvey/dist/js/jquery.dataTables.min.js"></script>
                <script type="text/javascript" src="../assets/esurvey/dist/js/dataTables.bootstrap.min.js"></script>
                <script src="../assets/esurvey/dist/js/bootstrap-select.min.js"></script>
                <script src="../assets/esurvey/bower_components/select2/dist/js/select2.full.min.js"></script>
                <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

                <script type="text/javascript">
                    alert('dd')

                    window.addEventListener("load", window.print());
                </script>
</body>

</html>