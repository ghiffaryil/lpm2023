<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<?php $this->load->view('back/survey/top'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

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

            <div class="content-wrapper">
                <section class="content">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-body">

                                    <div class="wizard">
                                        <div class="wizard-inner hidden">
                                            <div class="connecting-line"></div>
                                            <ul class="nav nav-tabs" hidden role="tablist">
                                                <li role="presentation" class="active">
                                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab">1</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab">2</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab">3</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab">4</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step5" data-toggle="tab" aria-controls="step5" role="tab"><span class="round-tab">5</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step6" data-toggle="tab" aria-controls="step6" role="tab"><span class="round-tab">6</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step7" data-toggle="tab" aria-controls="step7" role="tab"><span class="round-tab">7</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step8" data-toggle="tab" aria-controls="step8" role="tab"><span class="round-tab">8</span></a>
                                                </li>
                                                <li role="presentation" class="disabled">
                                                    <a href="#step9" data-toggle="tab" aria-controls="step9" role="tab"><span class="round-tab">9</span></a>
                                                </li>
                                            </ul>
                                        </div>

                                        <form method="POST" role="form" enctype="multipart/form-data" id="formScoring">
                                            <div class="tab-content" id="main_form">
                                                <div class="tab-pane active" role="tabpanel" id="step1">
                                                    <center>
                                                        <img src="<?php echo base_url('assets/esurvey/') ?>dist/img/dompet-dhuafa.png" width="100px">
                                                    </center>
                                                    <h4 class="text-center text-bold">LAPORAN HASIL VERIFIKASI KELUARGA MUSTAHIK<br> LPM DOMPET DHUAFA</h4>
                                                    <p><b>Keterangan :</b><br>
                                                        1. Interval scoring dari 5, 4, 3, 2, dan 1</br>
                                                        2. Skor 5 untuk item Positif (yang diharapkan) dan skor 1 untuk item negatif (tidak diharapkan)</p>
                                                    <hr>
                                                    <h4 class="text-center text-bold">DATA MASUK LPM</h4>
                                                    <div class="row">

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Lokasi Survey</label>
                                                                <iframe src='https://maps.google.com/maps?q="<?php echo $data[0]['maps']; ?>"&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' style='width: 100%; height: 108px;'></iframe>
                                                                <textarea class="maps " name="maps" hidden></textarea>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6 row">
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Tanggal Pengajuan</label>
                                                                    <input class="form-control datepicker tanggal_masuk text-lowcase" type="date" name="tanggal_masuk" value="<?php echo $data[0]['tanggal_masuk'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label>Petugas Konseling</label>
                                                                    <input class="form-control petugas_konseling required" type="text" name="petugas_konseling" value="<?php echo $data[0]['petugas_konseling'] ?>">
                                                                </div>
                                                            </div>

                                                            <div class="col-md-12">
                                                                <div class="form-group">
                                                                    <label>Petugas Survey</label>
                                                                    <input class="form-control petugas_survey" type="text" name="petugas_survey" value="<?php echo $data[0]['petugas_survey'] ?>">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                    <h4 class="text-center text-bold">PELAKSANAAN SURVEY</h4>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group">
                                                                <label>Hari/Tanggal</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="kurang1pekan" value="5" class="pekan score" name="pekan" <?php if ($data[0]['pekan'] == '5') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="kurang1pekan">
                                                                        < 1 Pekan (5) </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="2pekan" value="4" class="pekan score" name="pekan" <?php if ($data[0]['pekan'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="2pekan">
                                                                        2 Pekan (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="3pekan" value="3" class="pekan score" name="pekan" <?php if ($data[0]['pekan'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="3pekan">
                                                                        3 Pekan (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="4pekan" value="2" class="pekan score" name="pekan" <?php if ($data[0]['pekan'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="4pekan">
                                                                        4 Pekan (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="5pekan" value="1" class="pekan score" name="pekan" <?php if ($data[0]['pekan'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="5pekan">
                                                                        5 Pekan (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <button type="button" class="btn btn-default" onclick="history.back()">
                                                                <i class="fa fa-angle-left"></i> Kembali
                                                            </button>
                                                            <button type="button" class="btn btn-primary next-1">
                                                                Lanjut <i class="fa fa-angle-right"></i>
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step2">
                                                    <h4 class="text-center text-bold">IDENTITAS MUSTAHIK</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Nama</label>
                                                                <select class="form-control select2 nama_mustahik" style="width: 100%" name="nama_mustahik" id="nama_mustahik" required>
                                                                    <option value="">Pilih </option>
                                                                    <?php foreach ($data_penduduk as $row) : ?>
                                                                        <?= $selected = $row->nama == $data[0]['nama_mustahik'] ? "selected" : " "   ?>
                                                                        <option <?= $selected ?> value="<?= $row->nama ?>"><?= $row->nik ?> - <?= $row->nama ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Jenis Kelamin</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="radioPrimary2" value="Perempuan" name="jenis_kelamin" class="jenis_kelamin" <?php if ($data[0]['jenis_kelamin'] == 'Perempuan') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="radioPrimary2">
                                                                        Perempuan
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="radioPrimary3" value="Laki-laki" name="jenis_kelamin" class="jenis_kelamin" <?php if ($data[0]['jenis_kelamin'] == 'Laki-laki') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="radioPrimary3">
                                                                        Laki-laki
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Usia</label>
                                                                <input class="form-control usia" type="number" name="usia" value="<?php echo $data[0]['usia'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>>Nama Orang Tua (Jika Anak)</label>
                                                                <input class="form-control nama_kepala_keluarga" type="text" name="nama_kepala_keluarga" id="nama_kepala_keluarga" value="<?php echo $data[0]['nama_kepala_keluarga'] ?>" required>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Pekerjaan</label>
                                                                <input class="form-control pekerjaan" type="text" name="pekerjaan" value="<?php echo $data[0]['pekerjaan'] ?>">
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Total semua Penghasilan Keluarga</label>
                                                                <input class="form-control penghasilan" type="text" name="penghasilan" value="<?php echo $data[0]['penghasilan'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Jumlah Tanggungan</label>
                                                                <input class="form-control jumlah_tanggungan" type="number" name="jumlah_tanggungan" value="<?php echo $data[0]['jumlah_tanggungan'] ?>">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label>Alamat</label>
                                                                <input class="form-control alamat" type="text" name="alamat" value="<?php echo $data[0]['alamat'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Provinsi</label>
                                                                <select class="form-control select2 provinsi" style="width: 100%" name="provinsi" id="prop" onchange="ajaxkota(this.value)" required>
                                                                    <option value="">Pilih Provinsi</option>
                                                                    <?php foreach ($data_provinsi as $row) : ?>
                                                                        <?php $p = $data[0]['provinsi'] == $row->id_provinsi ? "selected" : "" ?>
                                                                        <option value="<?= $row->id_provinsi ?>" <?= $p ?>><?= $row->provinsi ?></option>
                                                                    <?php endforeach; ?>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Kabupaten/Kota</label>
                                                                <select class="form-control select2 kabupaten" name="kabupaten" id="kota" style="width: 100%" onchange="ajaxkec(this.value)" required disabled>
                                                                    <option value="<?= $data_kab_kota->id_kota_kab ?>"><?= $data_kab_kota->kota_kab ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Kecamatan</label>
                                                                <select class="form-control select2 kecamatan" name="kecamatan" id="kec" style="width: 100%" onchange="ajaxkel(this.value)" required disabled>
                                                                    <option value="<?= $data_kec == null ? "" : $data_kec->id_kecamatan ?>"><?= $data_kec == null ? "" : $data_kec->kecamatan_name ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Kelurahan / Desa</label>
                                                                <select class="form-control select2 kelurahan" name="kelurahan" id="kel" style="width: 100%" required disabled>
                                                                    <option value="<?= $data_desa == null ? "" : $data_desa->id_desa_kelurahan ?>"><?= $data_desa == null ? "" : $data_desa->desa_kelurahan ?></option>
                                                                </select>
                                                            </div>

                                                            <div class="form-group">
                                                                <label class="control-label">Upload Foto</label>
                                                                <div class="preview-zone">
                                                                    <div class="box box-solid">
                                                                        <div class="box-header"><b>Pratinjau</b></div>
                                                                        <div class="box-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-xs-6">
                                                                                    <img class="img-thumbnail" src="<?php echo base_url('assets/esurvey/') ?>foto/<?php echo $data[0]['foto'] ?>" width="200">
                                                                                    <br>
                                                                                    <center>Foto Lama</center>
                                                                                </div>
                                                                                <div class="col-md-6 col-xs-6">
                                                                                    <div class="gambar"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="dropzone-wrapper">
                                                                    <div class="dropzone-desc">
                                                                        <i class="glyphicon glyphicon-download-alt"></i>
                                                                        <p>Drag and drop image.</p>
                                                                    </div>
                                                                    <input type="file" name="foto" class="dropzone foto">
                                                                </div>
                                                            </div>


                                                            <div class="form-group">
                                                                <label>No Telp</label>
                                                                <input class="form-control no_telp" type="text" name="no_telp" id="no_telp" value="<?php echo $data[0]['no_telp'] ?>" required>
                                                            </div>
                                                        </div>



                                                    </div>

                                                    <ul class="list-inline pull-right">
                                                        <div class="col-md-12 row">
                                                            <div class=" col-md-6">
                                                                <li><button type="button" class="btn btn-default text-left prev-2"> Kembali</button></li>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <li><button type="button" class="btn btn-primary next-2">Lanjut</button></li>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step3">
                                                    <h4 class="text-center text-bold">IV. IDENTITAS MUSTAHIK : 6-30</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">1. Pendapatan per kapita = jumlah penghasilan dibagi (:) jumlah tanggungan per bulan (Kurs 1 US$ = IDR 13.000 pada tahun 2016)</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="kurangRp1juta" value="5" class="no_1 score" name="no_1" <?php if ($data[0]['no_1'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="kurangRp1juta">
                                                                        < Rp. 390.000 (5) </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="1jt15jt" value="4" class="no_1 score" name="no_1" <?php if ($data[0]['no_1'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="1jt15jt">
                                                                        Rp. Rp 390.000 – Rp 700.000 (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="1jt2jt" value="2" class="no_1 score" name="no_1" <?php if ($data[0]['no_1'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="1jt2jt">
                                                                        > Rp. 700.000 – 1.000.000 (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="2jtan" value="1" class="no_1 score" name="no_1" <?php if ($data[0]['no_1'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="2jtan">
                                                                        > Rp. 1.000.000 (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">2. Status pernikahan Kepala Keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="janda" value="5" class="no_2 score" name="no_2" <?php if ($data[0]['no_2'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="janda">
                                                                        Janda (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="duda" value="3" class="no_2 score" name="no_2" <?php if ($data[0]['no_2'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="duda">
                                                                        Duda (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="nikah" value="1" class="no_2 score" name="no_2" <?php if ($data[0]['no_2'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="nikah">
                                                                        Nikah (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">3. Pendidikan terakhir kepala keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidak_sekolah" value="5" class="no_3 score" name="no_3" <?php if ($data[0]['no_3'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tidak_sekolah">
                                                                        Tidak sekolah (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sd" value="4" class="no_3 score" name="no_3" <?php if ($data[0]['no_3'] == '4') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="sd">
                                                                        SD/ Sederajat (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="smp" value="3" class="no_3 score" name="no_3" <?php if ($data[0]['no_3'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="smp">
                                                                        SMP/ Sederajat (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sma" value="2" class="no_3 score" name="no_3" <?php if ($data[0]['no_3'] == '2') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="sma">
                                                                        SMA (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="perti" value="1" class="no_3 score" name="no_3" <?php if ($data[0]['no_3'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="perti">
                                                                        PERTI (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">4. Kondisi kepala keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sakit_menahun" value="5" class="no_4 score" name="no_4" <?php if ($data[0]['no_4'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="sakit_menahun">
                                                                        Sakit menahun (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sakit_sakitan" value="4" class="no_4 score" name="no_4" <?php if ($data[0]['no_4'] == '4') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="sakit_sakitan">
                                                                        Sakit - sakitan (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="manula" value="3" class="no_4 score" name="no_4" <?php if ($data[0]['no_4'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="manula">
                                                                        Manula (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sehat_bekerja" value="2" class="no_4 score" name="no_4" <?php if ($data[0]['no_4'] == '4') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="sehat_bekerja">
                                                                        Sehat bekerja (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidak_bekerja" value="1" class="no_4 score" name="no_4" <?php if ($data[0]['no_4'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tidak_bekerja">
                                                                        Sehat & tidak bekerja (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">5. Pekerjaan Kepala Keluarga Mustahik</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="menganggur" value="5" class="no_5 score" name="no_5" <?php if ($data[0]['no_5'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="menganggur">
                                                                        Menganggur (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="buruh" value="4" class="no_5 score" name="no_5" <?php if ($data[0]['no_5'] == '4') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="buruh">
                                                                        Buruh serabutan (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="karyawan" value="3" class="no_5 score" name="no_5" <?php if ($data[0]['no_5'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="karyawan">
                                                                        Buruh Pabrik (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="pedagang" value="1" class="no_5 score" name="no_5" <?php if ($data[0]['no_5'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="pedagang">
                                                                        Pedagang kecil (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">6. Status mustahik dalam keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="suami" value="5" class="no_6 score" name="no_6" <?php if ($data[0]['no_6'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="suami">
                                                                        suami (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="istri" value="3" class="no_6 score" name="no_6" <?php if ($data[0]['no_6'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="istri">
                                                                        Istri (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="anak" value="1" class="no_6 score" name="no_6" <?php if ($data[0]['no_6'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="anak">
                                                                        Anak (1)
                                                                    </label>
                                                                </div>

                                                            </div>
                                                        </div>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <div class="col-md-12 row">
                                                            <div class=" col-md-6">
                                                                <li><button type="button" class="btn btn-default text-left prev-3"> Kembali</button></li>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <li><button type="button" class="btn btn-primary next-3">Lanjut</button></li>
                                                            </div>
                                                        </div>
                                                    </ul>
                                                </div>


                                                <div class="tab-pane" role="tabpanel" id="step4">
                                                    <h4 class="text-center text-bold">V. PENGELUARAN RUTIN BULANAN : 4-20</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">7. Kebutuhan Pokok Rumah Tangga (Belanja Dapur)</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_7_5" value="5" class="no_7 score" name="no_7" <?php if ($data[0]['no_5'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_7_5">
                                                                        >Rp.2.500.000 (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_7_4" type="radio" value="4" class="no_7 score" name="no_7" <?php if ($data[0]['no_5'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_7_4">
                                                                        Rp 2.000.000 – Rp 2.500.000 (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_7_3" type="radio" value="3" class="no_7 score" name="no_7" <?php if ($data[0]['no_5'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_7_3">
                                                                        Rp. 1.500.000 – Rp. 2.000.000 (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_7_2" type="radio" value="2" class="no_7 score" name="no_7" <?php if ($data[0]['no_5'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_7_2">
                                                                        Rp. 1.000.000 – Rp. 1.500.000 (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_7_1" type="radio" value="1" class="no_7 score" name="no_7" <?php if ($data[0]['no_5'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_7_1">
                                                                        < Rp. 1.000.000 (1) </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">8. Biaya Sekolah (SPP, Uang Jajan & Transportasi)</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_8_5" type="radio" value="5" class="no_8 score" name="no_8" <?php if ($data[0]['no_8'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_8_5">
                                                                        Rp 400.000 (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_8_4" type="radio" value="4" class="no_8 score" name="no_8" <?php if ($data[0]['no_8'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_8_4">
                                                                        Rp 350.000 – Rp 400.000 (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_8_3" type="radio" value="3" class="no_8 score" name="no_8" <?php if ($data[0]['no_8'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_8_3">
                                                                        Rp 300.000 - Rp350.000 (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_8_2" type="radio" value="2" class="no_8 score" name="no_8" <?php if ($data[0]['no_8'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_8_2">
                                                                        Rp 250.000 – Rp 300.000 (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_8_1" type="radio" value="1" class="no_8 score" name="no_8" <?php if ($data[0]['no_8'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_8_1">
                                                                        Rp 0 – Rp 250.000 (1)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">9. Kontrakan</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_9_5" type="radio" value="5" class="no_9 score" name="no_9" <?php if ($data[0]['no_9'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_9_5">
                                                                        > Rp 500.000 (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_9_4" type="radio" value="4" class="no_9 score" name="no_9" <?php if ($data[0]['no_9'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_9_4">
                                                                        Rp 450.000 – Rp 500.000 (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_9_3" type="radio" value="3" class="no_9 score" name="no_9" <?php if ($data[0]['no_9'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_9_3">
                                                                        Rp 400.000 – 450.000 (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_9_2" type="radio" value="2" class="no_9 score" name="no_9" <?php if ($data[0]['no_9'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_9_2">
                                                                        Rp 350.000 – Rp 400.000 (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_9_1" type="radio" value="1" class="no_9 score" name="no_9" <?php if ($data[0]['no_9'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_9_1">
                                                                        Rp 0 – Rp 350.000 (1)
                                                                    </label>
                                                                </div>
                                                                <div class="visible-lg"></div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">10. Tagihan Listrik</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_10_5" type="radio" value="5" class="no_10 score" name="no_10" <?php if ($data[0]['no_10'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_10_5">
                                                                        >Rp 300.000 (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_10_4" type="radio" value="4" class="no_10 score" name="no_10" <?php if ($data[0]['no_10'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_10_4">
                                                                        Rp 200.000 – 250.000 (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_10_3" type="radio" value="3" class="no_10 score" name="no_10" <?php if ($data[0]['no_10'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_10_3">
                                                                        Rp 150.000 – 200.000 (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_10_2" type="radio" value="2" class="no_10 score" name="no_10" <?php if ($data[0]['no_10'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_10_2">
                                                                        Rp 100.000 – 150.000 (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_10_1" type="radio" value="1" class="no_10 score" name="no_10" <?php if ($data[0]['no_10'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_10_1">
                                                                        < Rp 100.000 (1) </label>
                                                                </div>
                                                                <div class="visible-lg"></div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">11. Total kebutuhan bulanan Rp.......</label>
                                                                <input type="number" class="no_11 form-control" name="no_11" value="<?= $data[0]['no_11'] ?>">
                                                            </div>
                                                        </div>

                                                    </div>

                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-4"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-4">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step5">
                                                    <h4 class="text-center text-bold">VI. POLA HIDUP : 5-15</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">12. Intensitas mengkonsumsi makanan pokok</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_12_5" type="radio" value="5" class="no_12 score" name="no_12" <?php if ($data[0]['no_12'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_12_5">
                                                                        1 x sehari (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_12_3" type="radio" value="3" class="no_12 score" name="no_12" <?php if ($data[0]['no_12'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_12_3">
                                                                        2x Sehari (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_12_1" type="radio" value="1" class="no_12 score" name="no_12" <?php if ($data[0]['no_12'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_12_1">
                                                                        3x sehari (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">13. Intensitas mengkonsumsi daging</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_13_5" type="radio" value="5" class="no_13 score" name="no_13" <?php if ($data[0]['no_13'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_13_5">
                                                                        1 bulan sekali (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_13_4" type="radio" value="4" class="no_13 score" name="no_13" <?php if ($data[0]['no_13'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_13_4">
                                                                        3 minggu sekali (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_13_3" type="radio" value="3" class="no_13 score" name="no_13" <?php if ($data[0]['no_13'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_13_3">
                                                                        2 minggu sekali (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_13_1" type="radio" value="1" class="no_13 score" name="no_13" <?php if ($data[0]['no_13'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_13_1">
                                                                        1 minggu sekali (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">14. Intensitas pembelian pakaian baru</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_14_5" type="radio" value="5" class="no_14 score" name="no_14" <?php if ($data[0]['no_14'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_14_5">
                                                                        1 tahun sekali (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_14_4" type="radio" value="4" class="no_14 score" name="no_14" <?php if ($data[0]['no_14'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_14_4">
                                                                        6 bulan sekali (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_14_3" type="radio" value="3" class="no_14 score" name="no_14" <?php if ($data[0]['no_14'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_14_3">
                                                                        3 bulan sekali (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_14_2" type="radio" value="2" class="no_14 score" name="no_14" <?php if ($data[0]['no_14'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label id="no_14_2">
                                                                        2 bulan (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_14_1" type="radio" value="1" class="no_14 score" name="no_14" <?php if ($data[0]['no_14'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_14_1">
                                                                        1 bulan (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-5"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-5">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step6">
                                                    <h4 class="text-center text-bold">VII. INDEX RUMAH: 12-60</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">15. Kepemilikan rumah</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_15_5" value="5" class="no_15 score" name="no_15" <?php if ($data[0]['no_15'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_15_5">
                                                                        Mengontrak (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_15_3" value="3" class="no_15 score" name="no_15" <?php if ($data[0]['no_15'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_15_3">
                                                                        Menumpang (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_15_1" value="1" class="no_15 score" name="no_15" <?php if ($data[0]['no_15'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_15_1">
                                                                        Sendiri (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">16. Luas rumah dan lantai</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_16_5" type="radio" value="5" class="no_16 score" name="no_16" <?php if ($data[0]['no_16'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_16_5">
                                                                        < 12 m<sup>2</sup> (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_16_4" type="radio" value="4" class="no_16 score" name="no_16" <?php if ($data[0]['no_16'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_16_4">
                                                                        15 m<sup>2</sup> (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_16_3" type="radio" value="3" class="no_16 score" name="no_16" <?php if ($data[0]['no_16'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_16_3">
                                                                        18 m<sup>2</sup> (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_16_2" type="radio" value="2" class="no_16 score" name="no_16" <?php if ($data[0]['no_16'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_16_2">
                                                                        20 m<sup>2</sup> (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_16_1" type="radio" value="1" class="no_16 score" name="no_16" <?php if ($data[0]['no_16'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_16_1">
                                                                        25 m<sup>2</sup> (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">17. Dinding rumah</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_17_5" value="5" class="no_17 score" name="no_17" <?php if ($data[0]['no_17'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_17_5">
                                                                        Bilik bambu / Triplek / Seng (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_17_3" value="3" class="no_17 score" name="no_17" <?php if ($data[0]['no_17'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_17_3">
                                                                        Semi permanen (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_17_1" value="1" class="no_17 score" name="no_17" <?php if ($data[0]['no_17'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_17_1">
                                                                        Tembok (1)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">18. Lantai</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_18_5" value="5" class="no_18 score" name="no_18" <?php if ($data[0]['no_18'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_18_5">
                                                                        Tanah (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_18_4" value="4" class="no_18 score" name="no_18" <?php if ($data[0]['no_18'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_18_4">
                                                                        Panggung (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_18_3" value="3" class="no_18 score" name="no_18" <?php if ($data[0]['no_18'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_18_3">
                                                                        Semen (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_18_2" value="2" class="no_18 score" name="no_18" <?php if ($data[0]['no_18'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_18_2">
                                                                        Keramik (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_18_1" value="1" class="no_18 score" name="no_18" <?php if ($data[0]['no_18'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_18_1">
                                                                        Marmer (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">19. Atap</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_19_5" value="5" class="no_19 score" name="no_19" <?php if ($data[0]['no_19'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_19_5">
                                                                        Jerami (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_19_4" value="4" class="no_19 score" name="no_19" <?php if ($data[0]['no_19'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_19_4">
                                                                        Seng (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_19_3" value="3" class="no_19 score" name="no_19" <?php if ($data[0]['no_19'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_19_3">
                                                                        Asbes (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_19_2" value="2" class="no_19 score" name="no_19" <?php if ($data[0]['no_19'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_19_2">
                                                                        Genteng (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_19_1" value="1" class="no_19 score" name="no_19" <?php if ($data[0]['no_19'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_19_1">
                                                                        Baja ringan (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">20. Dapur</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_20_5" value="5" class="no_20 score" name="no_20" <?php if ($data[0]['no_20'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_20_5">
                                                                        Tungku (kayu bakar) (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_20_2" value="3" class="no_20 score" name="no_20" <?php if ($data[0]['no_20'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_20_2">
                                                                        Kompor minyak / gas 3 kg(3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_20_1" value="1" class="no_20 score" name="no_20" <?php if ($data[0]['no_20'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_20_1">
                                                                        Kompor gas > 3 kg (1)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">21. Kursi</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_21_5" value="5" class="no_21 score" name="no_21" <?php if ($data[0]['no_21'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_21_5">
                                                                        Lesehan / Balai bambu (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_21_3" value="3" class="no_21 score" name="no_21" <?php if ($data[0]['no_21'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_21_3">
                                                                        Kursi kayu / plastik (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_21_1" value="1" class="no_21 score" name="no_21" <?php if ($data[0]['no_21'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_21_1">
                                                                        Sofa (1)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">22. Sumber air</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_22_5" value="5" class="no_22 score" name="no_22" <?php if ($data[0]['no_22'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_22_5">
                                                                        Bersama (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_22_2" value="2" class="no_22 score" name="no_22" <?php if ($data[0]['no_22'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_22_2">
                                                                        PDAM (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_22_1" value="1" class="no_22 score" name="no_22" <?php if ($data[0]['no_22'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_22_1">
                                                                        Sendiri (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">23. Tempat buang air (MCK)</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_23_5" value="5" class="no_23 score" name="no_23" <?php if ($data[0]['no_23'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_23_5">
                                                                        Tidak ada / Bersama (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_23_1" value="1" class="no_23 score" name="no_23" <?php if ($data[0]['no_23'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_23_1">
                                                                        Sendiri (1)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">24. Penerangan</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_24_5" value="5" class="no_24 score" name="no_24" <?php if ($data[0]['no_24'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_24_5">
                                                                        450 Watt (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_24_3" value="3" class="no_24 score" name="no_24" <?php if ($data[0]['no_24'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_24_3">
                                                                        900 Watt (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_24_1" value="1" class="no_24 score" name="no_24" <?php if ($data[0]['no_24'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_24_1">
                                                                        >900 Watt (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">25. Lokasi Rumah di</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_25_5" value="5" class="no_25 score" name="no_25" <?php if ($data[0]['no_25'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_25_5">
                                                                        Bantaran kali (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_25_4" value="4" class="no_25 score" name="no_25" <?php if ($data[0]['no_25'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_25_4">
                                                                        Daerah kumuh (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_25_2" value="2" class="no_25 score" name="no_25" <?php if ($data[0]['no_25'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_25_2">
                                                                        Perkampungan (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_25_1" value="1" class="no_25 score" name="no_25" <?php if ($data[0]['no_25'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_25_1">
                                                                        Komplek perumahan (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">26. Jarak tempuh menuju ke Puskesmas</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_26_5" value="5" class="no_26 score" name="no_26" <?php if ($data[0]['no_26'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_26_5">
                                                                        > 7 Km (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_26_4" value="4" class="no_26 score" name="no_26" <?php if ($data[0]['no_26'] == '4') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_26_4">
                                                                        5 -7 Km (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_26_3" value="3" class="no_26 score" name="no_26" <?php if ($data[0]['no_26'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_26_3">
                                                                        3 - 5 Km (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_26_2" value="2" class="no_26 score" name="no_26" <?php if ($data[0]['no_26'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_26_2">
                                                                        1 - 3 Km (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="no_26_1" value="1" class="no_26 score" name="no_26" <?php if ($data[0]['no_26'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_26_1">
                                                                        0-1 km (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-6"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-6">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step7">
                                                    <h4 class="text-center text-bold">VIII. KEPEMILIKAN BARANG : 3-15</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">27. Kendaraan</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sepeda" value="5" class="no_27 score" name="no_27" <?php if ($data[0]['no_27'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="sepeda">
                                                                        Tidak ada / Sepeda (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="motorkredit" value="3" class="no_27 score" name="no_27" <?php if ($data[0]['no_27'] == '3') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="motorkredit">
                                                                        Sepeda motor kredit (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="motorlunas" value="1" class="no_27 score" name="no_27" <?php if ($data[0]['no_27'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="motorlunas">
                                                                        Sepeda motor lunas (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">28. Elektronik</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tv" value="5" class="no_28 score" name="no_28" <?php if ($data[0]['no_28'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="tv">
                                                                        TV (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tvkulkas" value="3" class="no_28 score" name="no_28" <?php if ($data[0]['no_28'] == '3') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tvkulkas">
                                                                        TV & Kulkas (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tckulkasmc" value="1" class="no_28 score" name="no_28" <?php if ($data[0]['no_28'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tckulkasmc">
                                                                        TV, Kulkas, & Mesin Cuci (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">29. Barang berharga yang mudah dijual dengan nilai minimal Rp 500.000,-</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="hp" value="5" class="no_29 score" name="no_29" <?php if ($data[0]['no_29'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="hp">
                                                                        HP (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="hpemas" value="3" class="no_29 score" name="no_29" <?php if ($data[0]['no_29'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="hpemas">
                                                                        HP & Emas (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="hpemasmotor" value="1" class="no_29 score" name="no_29" <?php if ($data[0]['no_29'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="hpemasmotor">
                                                                        HP, Emas & Motor (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-7"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-7">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step8">
                                                    <h4 class="text-center text-bold">IX. DATA KELUARGA : 5-25</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">30. Jumlah tanggungan keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="lebihdari6" value="5" class="no_30 score" name="no_30" <?php if ($data[0]['no_30'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="lebihdari6">
                                                                        >5 orang (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="4sampai5" value="4" class="no_30 score" name="no_30" <?php if ($data[0]['no_30'] == '4') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="4sampai5">
                                                                        3-4 orang (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="duasampaitiga" value="3" class="no_30 score" name="no_30" <?php if ($data[0]['no_30'] == '3') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="duasampaitiga">
                                                                        2 orang (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="satuaja" value="2" class="no_30 score" name="no_30" <?php if ($data[0]['no_30'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="satuaja">
                                                                        1 orang (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakadatanggungan" value="1" class="no_30 score" name="no_30" <?php if ($data[0]['no_30'] == '1') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } else {
                                                                                                                                                                echo "";
                                                                                                                                                            } ?>>
                                                                    <label for="tidakadatanggungan">
                                                                        Tidak ada (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">31. Jumlah anak yang sekolah</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="4anak" value="5" class="no_31 score" name="no_31" <?php if ($data[0]['no_31'] == '5') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="4anak">
                                                                        4 anak (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tigaanak" value="4" class="no_31 score" name="no_31" <?php if ($data[0]['no_31'] == '4') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tigaanak">
                                                                        3 anak (4)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="duaanak" value="3" class="no_31 score" name="no_31" <?php if ($data[0]['no_31'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="duaanak">
                                                                        2 anak (3)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="1anak" value="2" class="no_31 score" name="no_31" <?php if ($data[0]['no_31'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="1anak">
                                                                        1 anak (2)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakadaanak" value="1" class="no_31 score" name="no_31" <?php if ($data[0]['no_31'] == '1') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="tidakadaanak">
                                                                        Tidak ada (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">32. Ada yang putus sekolah</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="adaygputus" value="5" class="no_32 score" name="no_32" <?php if ($data[0]['no_32'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="adaygputus">
                                                                        Ada (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakadaygputus" value="1" class="no_32 score" name="no_32" <?php if ($data[0]['no_32'] == '1') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="tidakadaygputus">
                                                                        Tidak ada (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">33. Memiliki BATITTA (bayi dibawah 3 tahun)</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="adabatita" value="5" class="no_33 score" name="no_33" <?php if ($data[0]['no_33'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="adabatita">
                                                                        Ya (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakadabatita" value="1" class="no_33 score" name="no_33" <?php if ($data[0]['no_33'] == '1') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="tidakadabatita">
                                                                        Tidak ada (1)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">34. Ibu atau Istri hamil atau tidak?</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="adayanghamil" value="5" class="no_34 score" name="no_34" <?php if ($data[0]['no_34'] == '5') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="adayanghamil">
                                                                        Ya (5)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakadayanghamil" value="1" class="no_34 score" name="no_34" <?php if ($data[0]['no_34'] == '1') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } else {
                                                                                                                                                                echo "";
                                                                                                                                                            } ?>>
                                                                    <label for="tidakadayanghamil">
                                                                        Tidak ada (1)
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-8"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-8">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step9">
                                                    <h4 class="text-center text-bold">X. INDIKATOR PERILAKU</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">35. Kebiasaan merokok anggota keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_35_ada" type="radio" value="5" class="no_35" name="no_35" <?php if ($data[0]['no_35'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_35_ada">
                                                                        Ada
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_35_tidakada" type="radio" value="1" class="no_35" name="no_35" <?php if ($data[0]['no_35'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="no_35_tidakada">
                                                                        Tidak
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                                <div class="icheck-primary visible-lg"></div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">36. Kebiasaan patologis pada anggota keluarga (Judi, Miras, Narkoba)</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_36_tidakpernah" type="radio" value="5" class="no_36" name="no_36" <?php if ($data[0]['no_36'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="no_36_tidakpernah">
                                                                        Tidak pernah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_36_pernah" type="radio" value="3" class="no_36" name="no_36" <?php if ($data[0]['no_36'] == '3') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_36_pernah">
                                                                        Pernah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_36_kadang" type="radio" value="1" class="no_36" name="no_36" <?php if ($data[0]['no_36'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="no_36_kadang">
                                                                        Kadang - kadang
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">37. Pola Sholat pada anggota keluarga</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="berjamaah5waktu" value="5" class="no_37" name="no_37" <?php if ($data[0]['no_37'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="berjamaah5waktu">
                                                                        Berjamaah 5 waktu
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="teratur" value="3" class="no_37" name="no_37" <?php if ($data[0]['no_37'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="teratur">
                                                                        Teratur tapi tidak berjamaah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="jarang" value="2" class="no_37" name="no_37" <?php if ($data[0]['no_37'] == '2') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="jarang">
                                                                        Jarang Sholat
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakpernahsholat" value="1" class="no_37" name="no_37" <?php if ($data[0]['no_37'] == '1') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="tidakpernahsholat">
                                                                        Tidak pernah
                                                                    </label>
                                                                </div>
                                                            </div>


                                                        </div>

                                                        <div class="col-md-4">

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">38. Rajin mengikuti kajian</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="menjadipembicara" value="5" class="no_38" name="no_38" <?php if ($data[0]['no_38'] == '5') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="menjadipembicara">
                                                                        Menjadi pembicara (0)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="menjadipengurus" value="3" class="no_38" name="no_38" <?php if ($data[0]['no_38'] == '3') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="menjadipengurus">
                                                                        Menjadi pengurus (0)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="jadianggota" value="2" class="no_38" name="no_38" <?php if ($data[0]['no_38'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="jadianggota">
                                                                        Aktif jadi anggota (0)
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="jaranghadir" value="1" class="no_38" name="no_38" <?php if ($data[0]['no_38'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="jaranghadir">
                                                                        Jarang hadir (0)
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">39. Istri dan anak remaja putri mengenakan jilbab</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="yaselalu" value="5" class="no_39" name="no_39" <?php if ($data[0]['no_39'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="yaselalu">
                                                                        Ya, selalu
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="yajikakeluarrumah" value="3" class="no_39" name="no_39" <?php if ($data[0]['no_39'] == '3') {
                                                                                                                                                        echo "checked";
                                                                                                                                                    } else {
                                                                                                                                                        echo "";
                                                                                                                                                    } ?>>
                                                                    <label for="yajikakeluarrumah">
                                                                        Ya, jika keluar rumah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="kadangkadang" value="2" class="no_39" name="no_39" <?php if ($data[0]['no_39'] == '2') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="kadangkadang">
                                                                        Kadang - kadang
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tidakpernah_1" value="1" class="no_39" name="no_39" <?php if ($data[0]['no_39'] == '1') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="tidakpernah_1">
                                                                        Tidak pernah
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-md-4">
                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">40. Jumlah alat sholat yang dimiliki (Mukena/ Sarung, dan Sajadah)</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_40_5" type="radio" value="5" class="no_40" name="no_40" <?php if ($data[0]['no_40'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_40_5">
                                                                        >5
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_40_4" type="radio" value="4" class="no_40" name="no_40" <?php if ($data[0]['no_40'] == '4') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_40_4">
                                                                        4
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_40_3" type="radio" value="3" class="no_40" name="no_40" <?php if ($data[0]['no_40'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_40_3">
                                                                        3
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_40_2" type="radio" value="2" class="no_40" name="no_40" <?php if ($data[0]['no_40'] == '2') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_40_2">
                                                                        2
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_40_1" type="radio" value="1" class="no_40" name="no_40" <?php if ($data[0]['no_40'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_40_1">
                                                                        1
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">41. Jumlah Al-Qur’an yang dimiliki</label>
                                                                <div class="icheck-primary">
                                                                    <input id="no_41_3" type="radio" value="5" class="no_41" name="no_41" <?php if ($data[0]['no_41'] == '5') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_41_3">
                                                                        >3 buah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_41_2" type="radio" value="3" class="no_41" name="no_41" <?php if ($data[0]['no_41'] == '3') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_41_2">
                                                                        2 buah
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input id="no_41_1" type="radio" value="1" class="no_41" name="no_41" <?php if ($data[0]['no_41'] == '1') {
                                                                                                                                                echo "checked";
                                                                                                                                            } else {
                                                                                                                                                echo "";
                                                                                                                                            } ?>>
                                                                    <label for="no_41_1">
                                                                        1 buah
                                                                    </label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-9"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-9">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step10">
                                                    <h4 class="text-center text-bold">HASIL SCORING</h4>
                                                    <hr>
                                                    <div class="row">

                                                        <div class="row col-lg-3" style="background-color: #00c0ef; color:white; padding:5px; padding-left:10=px; border-radius: 10px; height:250px;">
                                                            <div class="col-lg-8">
                                                                <h1 class="total" style="font-weight: 800;"><?php echo $data[0]['hasil_scoring'] ?></h1>
                                                                <p>Total Scoring</p>
                                                                <textarea class="hasil_scoring total hidden" hidden><?php echo $data[0]['hasil_scoring'] ?></textarea>
                                                                <p> <strong style="font-weight: 600;">Rekomendasi Scoring :<?php echo $data[0]['rekomendasi_skoring'] ?> </strong></p>
                                                                <p> <strong style="font-weight: 600;" class="keterangan"><?php echo $data[0]['kelayakan'] ?></strong></p>
                                                            </div>
                                                            <div class="icon col-lg-4">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="90px" height="90px" viewBox="0 0 512 512">
                                                                    <path fill="currentColor" d="M439.91 112h-23.82a.09.09 0 0 0-.09.09V416a32 32 0 0 0 32 32a32 32 0 0 0 32-32V152.09A40.09 40.09 0 0 0 439.91 112Z" />
                                                                    <path fill="currentColor" d="M384 416V72a40 40 0 0 0-40-40H72a40 40 0 0 0-40 40v352a56 56 0 0 0 56 56h342.85a1.14 1.14 0 0 0 1.15-1.15a1.14 1.14 0 0 0-.85-1.1A64.11 64.11 0 0 1 384 416ZM96 128a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v64a16 16 0 0 1-16 16h-64a16 16 0 0 1-16-16Zm208 272H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 368h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 400Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 304h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 336Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 240h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 272Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 176h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 208Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 112h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 144Z" />
                                                                </svg>
                                                            </div>
                                                        </div>




                                                        <div class="col-md-3 col-xs-12 ml-3">
                                                            <div class="form-group hidden">
                                                                <label>Rekomendasi Scoring</label>
                                                                <textarea type="text" class="rekomendasi_skoring rekomendasi_value form-control" hidden name="rekomendasi_skoring"><?php echo $data[0]['rekomendasi_skoring'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Asnaf</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="fakir_miskin" value="Fakir miskin" class="asnaf" name="asnaf" <?php if ($data[0]['asnaf'] == 'Fakir miskin') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } else {
                                                                                                                                                                echo "";
                                                                                                                                                            } ?>>
                                                                    <label for="fakir_miskin">
                                                                        Fakir miskin
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="muallaf" value="Muallaf" class="asnaf" name="asnaf" <?php if ($data[0]['asnaf'] == 'Muallaf') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="muallaf">
                                                                        Muallaf
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="gharim" value="Gharim" class="asnaf" name="asnaf" <?php if ($data[0]['asnaf'] == 'Gharim') {
                                                                                                                                                    echo "checked";
                                                                                                                                                } else {
                                                                                                                                                    echo "";
                                                                                                                                                } ?>>
                                                                    <label for="gharim">
                                                                        Gharim
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="ibnu_sabil" value="Ibnu sabil" class="asnaf" name="asnaf" <?php if ($data[0]['asnaf'] == 'Ibnu sabil') {
                                                                                                                                                            echo "checked";
                                                                                                                                                        } else {
                                                                                                                                                            echo "";
                                                                                                                                                        } ?>>
                                                                    <label for="ibnu_sabil">
                                                                        Ibnu sabil
                                                                    </label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="fisabilillah" value="Fisabilillah" class="asnaf" name="asnaf" <?php if ($data[0]['asnaf'] == 'Fisabilillah') {
                                                                                                                                                                echo "checked";
                                                                                                                                                            } else {
                                                                                                                                                                echo "";
                                                                                                                                                            } ?>>
                                                                    <label for="fisabilillah">
                                                                        Fisabilillah
                                                                    </label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Bentuk Bantuan</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="bentuk_bantuan1" value="Uang" name="bentuk_bantuan" class="bentuk_bantuan" <?php if ($data[0]['bentuk_bantuan'] == 'Uang') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="bentuk_bantuan1">Uang</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="bentuk_bantuan2" value="Barang" name="bentuk_bantuan" class="bentuk_bantuan" <?php if ($data[0]['bentuk_bantuan'] == 'Barang') {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            } ?>>
                                                                    <label for="bentuk_bantuan2">Barang</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Sifat Bantuan</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sifat_bantuan1" class="sifat_bantuan" value="Rutin" name="sifat_bantuan" <?php if ($data[0]['sifat_bantuan'] == 'Rutin') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="sifat_bantuan1">Rutin</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sifat_bantuan2" class="sifat_bantuan" value="Insidental" name="sifat_bantuan" <?php if ($data[0]['sifat_bantuan'] == 'Insidental') {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            } ?>>
                                                                    <label for="sifat_bantuan2">Insidental</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sifat_bantuan3" class="sifat_bantuan" value="Pemberdayaan" name="sifat_bantuan" <?php if ($data[0]['sifat_bantuan'] == 'Pemberdayaan') {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            } ?>>
                                                                    <label for="sifat_bantuan3">Pemberdayaan</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="sifat_bantuan4" class="sifat_bantuan" value="Biasa" name="sifat_bantuan" <?php if ($data[0]['sifat_bantuan'] == 'Biasa') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="sifat_bantuan4">Biasa</label>
                                                                </div>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Tindak Lanjut</label>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tindak_lanjut1" value="Monitoring" class="tindak_lanjut" name="tindak_lanjut" <?php if ($data[0]['tindak_lanjut'] == 'Monitoring') {
                                                                                                                                                                                echo "checked";
                                                                                                                                                                            } else {
                                                                                                                                                                                echo "";
                                                                                                                                                                            } ?>>
                                                                    <label for="tindak_lanjut1">Monitoring</label>
                                                                </div>
                                                                <div class="icheck-primary">
                                                                    <input type="radio" id="tindak_lanjut2" value="Tidak" class="tindak_lanjut" name="tindak_lanjut" <?php if ($data[0]['tindak_lanjut'] == 'Tidak') {
                                                                                                                                                                            echo "checked";
                                                                                                                                                                        } else {
                                                                                                                                                                            echo "";
                                                                                                                                                                        } ?>>
                                                                    <label for="tindak_lanjut2">Tidak</label>
                                                                </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li><button type="button" class="btn btn-default text-left prev-step prev-10"><i class="fa fa-angle-left"></i> Kembali</button></li>
                                                        <li><button type="button" class="btn btn-warning next-10">Lanjut <i class="fa fa-angle-right"></i></button></li>
                                                    </ul>

                                                    <!-- <div class="col-md-6">
                                                        <div class="form-group hidden">
                                                            <label>Kelayakan Permohonan</label>
                                                            <textarea type="text" class="kelayakan keterangan_value" hidden name="kelayakan"><?php echo $data[0]['kelayakan'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Jenis Permohonan</label>
                                                            <textarea type="text" class="form-control jenis_permohonan" name="jenis_permohonan" rows="2"><?php echo $data[0]['jenis_permohonan'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Alasan</label>
                                                            <textarea type="text" class="form-control alasan" name="alasan" rows="2"><?php echo $data[0]['alasan'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Catatan</label>
                                                            <textarea type="text" class="form-control catatan" name="catatan" rows="2"><?php echo $data[0]['catatan'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Rekomendasi LPM</label>
                                                            <textarea type="text" class="form-control rekomendasi_lpm" name="rekomendasi_lpm" rows="2"><?php echo $data[0]['rekomendasi_lpm'] ?></textarea>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Tanggal Rekomendasi</label>
                                                            <input type="date" class="form-control tanggal_rekomendasi" name="tanggal_rekomendasi" value="<?php echo $data[0]['tanggal_rekomendasi'] ?>">
                                                        </div>

                                                        <div class="form-group">
                                                            <label style="text-transform: lowercase;">Tanda Tangan Surveyor</label>
                                                            <div class="preview-zone">
                                                                <div class="box box-solid">
                                                                    <div class="box-header"><b>Pratinjau</b></div>
                                                                    <div class="box-body">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <img class="img-thumbnail" src="<?php echo base_url('assets/esurvey/') ?>foto/<?php echo $data[0]['tanda_tangan_surveyor'] ?>" width="200">
                                                                                <br>
                                                                                <center>Ttd Surveyor</center>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-6">
                                                                                <div class="gambar"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="dropzone-wrapper">
                                                                <input type="file" name="tanda_tangan_surveyor" class="dropzone tanda_tangan_surveyor">
                                                            </div>
                                                        </div>



                                                    </div>


                                                     -->
                                                </div>

                                                <div class="tab-pane" role="tabpanel" id="step11">
                                                    <h4 class="text-center text-bold">INFO TAMBAHAN</h4>
                                                    <hr>
                                                    <div class="row">
                                                        <div class="col-md-3 d-xs-none"></div>
                                                        <div class="col-md-6">
                                                            <div class="form-group hidden">
                                                                <label>Kelayakan Permohonan</label>
                                                                <textarea type="text" class="kelayakan keterangan_value" hidden name="kelayakan"><?php echo $data[0]['kelayakan'] ?></textarea>
                                                            </div>
                                                            <div class="form-group">
                                                                <label>Jenis Permohonan</label>
                                                                <textarea type="text" class="form-control jenis_permohonan" name="jenis_permohonan" rows="2"><?php echo $data[0]['jenis_permohonan'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Alasan</label>
                                                                <textarea type="text" class="form-control alasan" name="alasan" rows="2"><?php echo $data[0]['alasan'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Catatan</label>
                                                                <textarea type="text" class="form-control catatan" name="catatan" rows="2"><?php echo $data[0]['catatan'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Rekomendasi LPM</label>
                                                                <textarea type="text" class="form-control rekomendasi_lpm" name="rekomendasi_lpm" rows="2"><?php echo $data[0]['rekomendasi_lpm'] ?></textarea>
                                                            </div>

                                                            <div class="form-group">
                                                                <label>Tanggal Rekomendasi</label>
                                                                <input type="date" class="form-control tanggal_rekomendasi" name="tanggal_rekomendasi" value="<?php echo $data[0]['tanggal_rekomendasi'] ?>">
                                                            </div>

                                                            <div class="form-group">
                                                                <label style="text-transform: lowercase;">Tanda Tangan Surveyor</label>
                                                                <div class="preview-zone">
                                                                    <div class="box box-solid">
                                                                        <div class="box-header"><b>Pratinjau</b></div>
                                                                        <div class="box-body">
                                                                            <div class="row">
                                                                                <div class="col-md-6 col-xs-6">
                                                                                    <img class="img-thumbnail" src="<?php echo base_url('assets/esurvey/') ?>foto/<?php echo $data[0]['tanda_tangan_surveyor'] ?>" width="200">
                                                                                    <br>
                                                                                    <center>Ttd Surveyor</center>
                                                                                </div>
                                                                                <div class="col-md-6 col-xs-6">
                                                                                    <div class="gambar"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                                <div class="dropzone-wrapper">
                                                                    <input type="file" name="tanda_tangan_surveyor" class="dropzone tanda_tangan_surveyor">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 d-xs-none"></div>
                                                    </div>
                                                    <ul class="list-inline pull-right">
                                                        <li>
                                                            <button type="button" class="btn btn-default text-left prev-step  prev-11">
                                                                <i class="fa fa-angle-left"></i> Kembali
                                                            </button>
                                                        </li>
                                                        <li>
                                                            <input type="hidden" class="id" name="id" value="<?php echo $data[0]['id'] ?>">
                                                            <input type="button" class="btn btn-primary next-11" value="Submit">
                                                        </li>
                                                    </ul>
                                                </div>

                                                <div class="clearfix"></div>
                                            </div>

                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

            </div>
            <br><br><br><br>
        </div>
    </div>
</div>


<?php $this->load->view('back/template/footer'); ?>

<!-- jQuery 3 -->
<!-- <script src="<?php echo base_url('assets/esurvey/') ?>bower_components/jquery/dist/jquery.min.js"></script> -->
<!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<!-- <script src="<?php echo base_url('assets/esurvey/') ?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/esurvey/') ?>dist/js/adminlte.min.js"></script>
<!-- font Awesome-->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey/') ?>plugins/fontawesome-free-5.15.4-web/js/all.min.js">
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/esurvey/') ?>dist/js/demo1.js"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/esurvey/') ?>bower_components/moment/min/moment.min.js"></script>
<!-- <script type="text/javascript" src="<?php echo base_url('assets/esurvey/') ?>bower_components/jquery-ui/jquery-ui.js"></script> -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url('assets/esurvey/') ?>sweet_modal/dist/min/jquery.sweet-modal.min.js"></script>
<script src="<?php echo base_url('assets/esurvey/') ?>bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/esurvey/') ?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="<?php echo base_url('assets/esurvey/') ?>dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/esurvey/') ?>dist/js/dataTables.bootstrap.min.js"></script>
<script src="<?php echo base_url('assets/esurvey/') ?>dist/js/bootstrap-select.min.js"></script>
<!-- Select2 -->
<script src="<?php echo base_url('assets/esurvey/') ?>bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script> -->

<!-- popover -->
<script>
    $(document).ready(function() {
        $('[data-toggle="popover"]').popover();
    });
</script>

<script type="text/javascript">
    //popup window
    function PopupCenter(pageURL, title, w, h) {
        var left = (screen.width / 2) - (w / 2);
        var top = (screen.height / 2) - (h / 2);
        var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=0, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
    }
</script>

<!-- Auto complate off --->
<script type="text/javascript">
    $('input').on('focus', function() {
        $(this).attr('autocomplete', 'off')
    });
</script>

<!--script src="<?php echo base_url('assets/esurvey/') ?>dist/js/jquery.idle.js" type="text/javascript"></script>
  <script>
      $(document).idle({
          onIdle: function(){
              window.location="../../pages/login/logout.php";
          },
          idle: 50000
      });
  </script-->

<script>
    //image preview before uploaded
    var viewImageEdit = function(event) {
        var preview = document.getElementById('preview-edit');
        preview.src = URL.createObjectURL(event.target.files[0]);
    };

    var viewImageTambah = function(event) {
        var preview = document.getElementById('preview-tambah');
        preview.src = URL.createObjectURL(event.target.files[0]);
    };
</script>




<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/esurvey/') ?>ajax_daerah.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/esurvey/') ?>edit.js"></script>

<script type="text/javascript" src="<?= base_url() ?>/app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#nama_mustahik").change(function() {
            let valNamaMustahik = $("#nama_mustahik").val();
            var data = new FormData();
            var nama_mustahik = $("#nama_mustahik").val();

            data.append("nama_mustahik", nama_mustahik);
            $.ajax({
                type: "POST",
                url: "getPenduduk",
                data: data,
                dataType: "JSON",
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
                    $("#prop").val(data.id_provinsi).trigger("change");
                    ajaxkota(data.id_provinsi)
                    setTimeout(function() {
                        $("#kota").val(data.id_kota_kab).trigger("change");
                        ajaxkec(data.id_kota_kab)
                        setTimeout(function() {
                            $("#kec").val(data.id_kecamatan).trigger("change");
                            ajaxkel(data.id_kecamatan)
                            setTimeout(function() {
                                $("#kel").val(data.id_desa_kelurahan).trigger("change");
                            }, 500);
                        }, 500);
                    }, 500);

                    $("#pekerjaan").val(data.pekerjaan);
                    $("#alamat").val(data.alamat);
                    if (data.jk == "L") {
                        let valJk = "Laki-laki";
                        $("#radioPrimary3").prop("checked", true);
                    } else if (data.jk == "P") {
                        let valJk = "Perempuan";
                        $("#radioPrimary2").prop("checked", true);
                    }

                    //hitung umur
                    var today = new Date();
                    var birthday = new Date(data.tgl_lahir);
                    var year = 0;
                    if (today.getMonth() < birthday.getMonth()) {
                        year = 1;
                    } else if ((today.getMonth() == birthday.getMonth()) && today.getDate() < birthday.getDate()) {
                        year = 1;
                    }
                    var age = today.getFullYear() - birthday.getFullYear() - year;

                    if (age < 0) {
                        age = 0;
                    }
                    $("#usia").val(age)

                    $("#nama_kepala_keluarga").val(data.nama_kk);
                    $("#no_telp").val(data.no_hp);
                    $("#jumlah_tanggungan").val(data.jum_individu);
                },
                error: function(data) {
                    swal("Gagal!", "gagal mengambil data penduduk", "error");
                },
            });
        })

    });
</script>