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

    <style type="text/css">
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
    </style>

    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />


    <style type="text/css">
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
    </style>

</head>

<body style="font-size: 12px;">

    <div class="row">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-body">

                    <center>
                        <img src="../assets/esurvey/img/logo-login.png" width="30%">
                    </center>
                    <h4 class="text-center text-bold">LAPORAN HASIL VERIFIKASI KELUARGA MUSTAHIK<br> LPM DOMPET DHUAFA</h4>
                    <p><b>Keterangan :</b><br>
                        1. Interval scoring dari 5, 4, 3, 2, 1</br>
                        2. Skor 5 item Positif (yang diharapkan) dan skor 1 untuk item negatif (tidak diharapkan)</p>
                    <hr>

                    <div class="row">
                        <div class="col-sm-12">
                            <h4 class="text-left text-bold">I. DATA MASUK LPM</h4>
                            <div class="col-sm-3 col-xs-3">a. Hari, Tgl</div>
                            <div class="col-sm-9 col-xs-9">: <?php echo $hari[date('D', strtotime($data['tanggal_masuk']))] . ', ' . date('d-m-Y', strtotime($data['tanggal_masuk'])) ?></div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-3 col-xs-3">b. Petugas Konseling</div>
                            <div class="col-sm-9 col-xs-9">: <?php echo $data['petugas_konseling'] ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">II. PELAKSANAAN SURVEY</h4>
                            <div class="col-sm-3 col-xs-3">a. Hari, Tgl</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $hari[date('D', strtotime($data['created_at']))] . ', ' . date('d-m-Y', strtotime($data['created_at'])) ?></div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">-Tanggal Masuk Ajuan</div>
                                    <div class="col-md-12">
                                        <div class="col-sm-4 col-xs-4">
                                            <?php if ($data['pekan'] == '5') {
                                                echo "❎";
                                            } else {
                                                echo "a.";
                                            } ?> < 1 Pekan (5)<br>
                                                <?php if ($data['pekan'] == '4') {
                                                    echo "❎";
                                                } else {
                                                    echo "b.";
                                                } ?> 2 Pekan (4)
                                        </div>
                                        <div class="col-sm-4 col-xs-4">
                                            <?php if ($data['pekan'] == '3') {
                                                echo "❎";
                                            } else {
                                                echo "c.";
                                            } ?> 3 Pekan (3)<br>
                                            <?php if ($data['pekan'] == '2') {
                                                echo "❎";
                                            } else {
                                                echo "d.";
                                            } ?> 4 Pekan (2)
                                        </div>
                                        <div class="col-sm-4 col-xs-4">
                                            <?php if ($data['pekan'] == '1') {
                                                echo "❎";
                                            } else {
                                                echo "e.";
                                            } ?> 5 Pekan (1)
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="col-sm-3 col-xs-3">b. Petugas Survey</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['petugas_survey'] ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">III. IDENTITAS MUSTAHIK</h4>
                            <div class="col-sm-3 col-xs-3">Nama</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['nama_mustahik'] ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Alamat</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['alamat'] ?></div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3"></div>
                            <div class="col-sm-5 col-xs-5 text-capitalize">&nbsp; Kel.
                                <?php echo @$nama_kel['desa_kelurahan'] ?>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-capitalize">&nbsp; Kec.
                                <?php echo @$nama_kec['kecamatan_name'] ?>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3"></div>
                            <div class="col-sm-5 col-xs-5 text-capitalize">&nbsp; Kab./Kota.
                                <?php echo @$nama_kab['kota_kab'] ?>
                            </div>
                            <div class="col-sm-3 col-xs-3 text-capitalize">&nbsp; Prov.
                                <?php echo @$nama_prov['provinsi'] ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Jenis Kelamin</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['jenis_kelamin'] ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Usia</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['usia'] ?> Th</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Pekerjaan</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['pekerjaan'] ?></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Penghasilan</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: Rp. <?php echo $data['penghasilan'] ?>,-</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-3 col-xs-3">Jumlah Tanggungan</div>
                            <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['jumlah_tanggungan'] ?> Orang</div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">IV. IDENTITAS MUSTAHIK : 6-30</h4>
                            <div class="col-md-12">1. Pendapatan keluarga = jumlah penghasilan dibagi (:) jumlah tanggungan perbulan dengan asumsi Kurs 1 USD = IDR 13.250</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_1'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> > Rp.1.000.000 (5)<br>
                                    <?php if ($data['no_1'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Rp.1.000.000-1.500.000(4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_1'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Rp.1.500.000-2.000.000(3)<br>
                                    <?php if ($data['no_1'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Rp.2.000.000 (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">2. Status pernikahan mustahik</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_2'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Janda (5)<br>
                                    <?php if ($data['no_2'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Duda (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_2'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Nikah (3)<br>
                                    <?php if ($data['no_2'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Lajang (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">3. Pendidikan terakhir kepala keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_3'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak sekolah/SD (5)<br>
                                    <?php if ($data['no_3'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> SMP/Sederajat (4)
                                </div>
                                <div class="col-sm-4 col-xs-8">
                                    <?php if ($data['no_3'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> SMA/Sederajat (3)<br>
                                    <?php if ($data['no_3'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> PT (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">4. Kondisi kepala keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_4'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Sakit menahun (5)<br>
                                    <?php if ($data['no_4'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Sakit - sakitan (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_4'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Manula (3)<br>
                                    <?php if ($data['no_4'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Sehat bekerja (2)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_4'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "e.";
                                    } ?> Sehat & tidak bekerja (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">5. Pekerjaan kepala keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_5'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Menganggur (5)<br>
                                    <?php if ($data['no_5'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Buruh serabutan (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_5'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Karyawan rendahan (3)<br>
                                    <?php if ($data['no_5'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Pedagang kecil (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">6. Status mustahik dalam keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_6'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> suami (5)<br>
                                    <?php if ($data['no_6'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Istri (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_6'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Anak (3)<br>
                                    <?php if ($data['no_6'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Saudara (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">V. POLA HIDUP : 5-15</h4>
                            <div class="col-md-12">7. Intensitas mengkonsumsi makanan pokok</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_7'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> 1 / 2x sehari (5)<br>
                                    <?php if ($data['no_7'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 3x sehari (3)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">8. Intensitas mengkonsumsi daging</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_8'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> 1 bulan sekali (5)<br>
                                    <?php if ($data['no_8'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 3 minggu sekali (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_8'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 2 minggu sekali (3)<br>
                                    <?php if ($data['no_8'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Seminggu sekali (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">9. Intensitas pembelian pakaian baru</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_9'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> 1 tahun sekali (5)<br>
                                    <?php if ($data['no_9'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 6 bulan sekali (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_9'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 3 bulan sekali (3)<br>
                                    <?php if ($data['no_9'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> 2 bulan sekali (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">VI. INDEX RUMAH: 12-60</h4>
                            <div class="col-md-12">10. Kepemilikan rumah</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_10'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Mengontrak (5)<br>
                                    <?php if ($data['no_10'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Menumpang (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_10'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Sendiri (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">11. Luas rumah dan lantai</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_11'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> < 10 M<sup>2</sup> (5)<br>
                                        <?php if ($data['no_11'] == '4') {
                                            echo "❎";
                                        } else {
                                            echo "b.";
                                        } ?> 12 M<sup>2</sup> (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_11'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 14 M<sup>2</sup> (3)<br>
                                    <?php if ($data['no_11'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> > 15 M<sup>2</sup> (2)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">12. Dinding rumah</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_12'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Bilik bambu / Triplek / Seng (5)<br>
                                    <?php if ($data['no_12'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Semi permanen (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_12'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Tembok (1)<br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">13. Lantai</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_13'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tanah (5)<br>
                                    <?php if ($data['no_13'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Panggung (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_13'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Semen (2)<br>
                                    <?php if ($data['no_13'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Keramik (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">14. Atap</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_14'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Atep / Seng (5)<br>
                                    <?php if ($data['no_14'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Asbes / Genteng (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_14'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Baja ringan (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">15. Dapur</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_15'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tungku (kayu bakar) (5)<br>
                                    <?php if ($data['no_15'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Kompor minyak / gas 3 kg(3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_15'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Kompor gas > 3 kg (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">16. Kursi</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_16'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Lesehan / Balai bambu (5)<br>
                                    <?php if ($data['no_16'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Kursi kayu / plastik (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_16'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Sofa (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">17. Sumber air</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_17'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Bersama (5)<br>
                                    <?php if ($data['no_17'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> PDAM (2)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_17'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Sendiri (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">18. Tempat buang air (MCK)</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_18'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak ada / Bersama (5)<br>
                                    <?php if ($data['no_18'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Sendiri (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">19. Penerangan</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_19'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak ada listrik / bersama (5)<br>
                                    <?php if ($data['no_19'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 450 watt (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_19'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 900 Watt (2)<br>
                                    <?php if ($data['no_19'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> > 900 Watt (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">20. Lokasi rumah di</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_20'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Bantaran kali (5)<br>
                                    <?php if ($data['no_20'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Daerah kumuh (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_20'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Perkampungan biasa (2)<br>
                                    <?php if ($data['no_20'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> Komplek perumahan (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">21. Jarak tempuh menuju ke Puskesmas</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_21'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> > 7 Km (5)<br>
                                    <?php if ($data['no_21'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 5 -7 Km (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_21'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 3 - 5 Km (3)<br>
                                    <?php if ($data['no_21'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "d.";
                                    } ?> 1 - 3 Km (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">VII. KEPEMILIKAN BARANG : 3 - 15</h4>
                            <div class="col-md-12">22. Kendaraan</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_22'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak ada / Sepeda (5)<br>
                                    <?php if ($data['no_22'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Sepeda motor kredit (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_22'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Sepeda motor lunas (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">23. Elektronik</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_23'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> TV & tape recorder (5)<br>
                                    <?php if ($data['no_23'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> TV, tape recorder & kulkas (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_23'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> TV, tape recorder, kulkas & mesin cuci (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">23. Elektronik</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_23'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> TV & tape recorder (5)<br>
                                    <?php if ($data['no_23'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> TV, tape recorder & kulkas (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_23'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> TV, tape recorder, kulkas & mesin cuci (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">24. Simpanan barang berharga yang mudah dijual dengan nilai min. Rp. 500.000</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_24'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> HP (5)<br>
                                    <?php if ($data['no_24'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> HP & Emas (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_24'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> HP, Emas & Motor (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">VIII. DATA KELUARGA : 5 - 25</h4>
                            <div class="col-md-12">25. Jumlah tanggungan keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_25'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> > 6 (5)<br>
                                    <?php if ($data['no_25'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 4 - 5 (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_25'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 2 - 3 (3)<br>
                                    <?php if ($data['no_25'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 1 (2)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_25'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Tidak ada tanggungan (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">26. Jumlah anak yang sekolah</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_26'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> 4 anak (5)<br>
                                    <?php if ($data['no_26'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 3 anak (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_26'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> 2 anak (3)<br>
                                    <?php if ($data['no_26'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> 1 anak (2)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_26'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "c.";
                                    } ?> Tidak ada (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">27. Ada yang putus sekolah</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_27'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Ada (5)<br>
                                    <?php if ($data['no_27'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak ada (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">28. Memiliki BATITTA (bayi dibawah 3 tahun)</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_28'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Ya (5)<br>
                                    <?php if ($data['no_28'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak ada (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">29. Keluarga dalam satu rumah ada yang hamil</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_29'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Ada (5)<br>
                                    <?php if ($data['no_29'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak ada (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">29. Keluarga dalam satu rumah ada yang hamil</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_29'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Ada (5)<br>
                                    <?php if ($data['no_29'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak ada (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">IX. INDIKATOR PRILAKU : 5 - 25</h4>
                            <div class="col-md-12">30. Kebiasaan merokok</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_30'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak (5)<br>
                                    <?php if ($data['no_30'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Ya (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">31. Kebiasaan patologis pada anggota keluarga (Judi, Miras, Zina, Narkoba)</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_31'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Tidak pernah (5)<br>
                                    <?php if ($data['no_31'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Pernah (2)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_31'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Kadang - kadang (1)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">32. Pola Sholat anggota keluarga</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_32'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Berjamaah 5 waktu (5)<br>
                                    <?php if ($data['no_32'] == '3') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Teratur tapi tidak berjamaah (3)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_32'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Jarang Sholat (2)<br>
                                    <?php if ($data['no_32'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak pernah (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">33. Rajin mengikuti kajian</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_33'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Menjadi pembicara (5)<br>
                                    <?php if ($data['no_33'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Menjadi pengurus (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_33'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Aktif jadi anggota (2)<br>
                                    <?php if ($data['no_33'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Jarang hadir (1)
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">34. Istri dan anak remaja putri mengenakan jilbab</div>
                            <div class="col-md-12">
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_34'] == '5') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Ya selalu (5)<br>
                                    <?php if ($data['no_34'] == '4') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Ya, jika keluar rumah (4)
                                </div>
                                <div class="col-sm-4 col-xs-4">
                                    <?php if ($data['no_34'] == '2') {
                                        echo "❎";
                                    } else {
                                        echo "a.";
                                    } ?> Kadang - kadang (2)<br>
                                    <?php if ($data['no_34'] == '1') {
                                        echo "❎";
                                    } else {
                                        echo "b.";
                                    } ?> Tidak pernah (1)
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="text-left text-bold">HASIL SCORING</h4>
                        </div>
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <td>Total Nilai</td>
                                        <td colspan="3"><?php echo $data['hasil_scoring'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Rekomendasi Scoring</td>
                                        <td colspan="3"><?php echo $data['rekomendasi_skoring'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Jenis Permohonan</td>
                                        <td colspan="3"><?php echo $data['jenis_permohonan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Asnaf</td>
                                        <td colspan="3">
                                            <?php if ($data['asnaf'] == 'Fakir miskin') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Fakir Miskin &nbsp; &nbsp;
                                            <?php if ($data['asnaf'] == 'Muallaf') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Muallaf &nbsp; &nbsp;
                                            <?php if ($data['asnaf'] == 'Ghorim') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Ghorim &nbsp; &nbsp;
                                            <?php if ($data['asnaf'] == 'Ibnu sabil') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Ibnu Sabil &nbsp; &nbsp;
                                            <?php if ($data['asnaf'] == 'Fisabilillah') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Fisabilillah
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Kelayakan Permohonan</td>
                                        <td><?php if ($data['kelayakan'] == 'Perlu perhatian khusus') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Perlu perhatian khusus</td>
                                        <td><?php if ($data['kelayakan'] == 'Layak dibantu') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Layak dibantu</td>
                                        <td><?php if ($data['kelayakan'] == 'Tidak layak dibantu') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Tidak layak dibantu</td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" height="150px">
                                            Alasan : <br>
                                            <?php echo $data['alasan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" height="100px">
                                            Catatan : <br>
                                            <?php echo $data['catatan'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="4" height="100px">
                                            Rekomendasi LPM : <br>
                                            <?php echo $data['rekomendasi_lpm'] ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Bentuk Bantuan</td>
                                        <td colspan="3">
                                            <?php if ($data['bentuk_bantuan'] == 'Uang') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Uang &nbsp; &nbsp; &nbsp; &nbsp;
                                            <?php if ($data['bentuk_bantuan'] == 'Barang') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Barang
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Sifat Bantuan</td>
                                        <td colspan="3">
                                            <?php if ($data['sifat_bantuan'] == 'Rutin') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Rutin &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                            <?php if ($data['sifat_bantuan'] == 'Insidental') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Insidental &nbsp; &nbsp; &nbsp; &nbsp;
                                            <?php if ($data['sifat_bantuan'] == 'Pemberdayaan') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Pemberdayaan &nbsp; &nbsp; &nbsp; &nbsp;
                                            <?php if ($data['sifat_bantuan'] == 'Biasa') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Biasa
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Tindak Lanjut</td>
                                        <td colspan="3">
                                            <?php if ($data['tindak_lanjut'] == 'Monitoring') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Monitoring &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                            <?php if ($data['tindak_lanjut'] == 'Tidak') {
                                                echo "✅";
                                            } else {
                                                echo "☐";
                                            } ?> Tidak
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Rekomendasi Tgl</td>
                                        <td colspan="3">
                                            <?php echo $hari[date('D', strtotime($data['tanggal_rekomendasi']))] . ', ' . date('d-m-Y', strtotime($data['tanggal_rekomendasi'])) ?>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 text-right">Ciputat, <?php echo date('d-m-Y', strtotime($data['tanggal_rekomendasi'])) ?> </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 pull-left">
                                <b>Keterangan</b><br>
                                1. Total Nilai 131 - 170 : Perlu mendapat perhatian khusus<br>
                                2. Total Nilai 71 - 130 : Layak dibantu<br>
                                3. Total Nilai 37 - 70 : Tidak layak dibantu
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12 text-right">
                                ( <u><?php echo $data['petugas_survey'] ?></u> )<br>
                                Manager Area
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-12">
                                <h4 class="text-left text-bold">LAMPIRAN</h4>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-sm-6 col-xs-12">
                                <img src="../assets/esurvey/foto/<?php echo $data['foto'] ?>" class="img-thumbnail" width="100%">
                            </div>
                            <div class="col-sm-6 col-xs-12">
                                <iframe src='https://maps.google.com/maps?q="<?php echo $data['maps']; ?>"&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' style='width: 100%; height: 240px;' class="img-thumbnail"></iframe>
                            </div>
                            <div class="col-sm-6 col-xs-12 visible-lg">
                                <p class="img-thumbnail text-center">
                                    <canvas id="qrcode"></canvas><br>
                                    <b style="margin-top: -120px;">Scan Maps</b>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        window.onload = function() {
            var url = 'https://maps.google.com/maps?q="<?php echo $data['maps']; ?>"&t=&z=13';
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
        window.addEventListener("load", window.print());
    </script>
</body>

</html>