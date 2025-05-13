<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

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

                <div class="content-wrapper">
                    <section class="content">

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
                                                <div class="col-sm-3 col-xs-3">a. Hari, Tanggal</div>
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
                                                <div class="col-sm-3 col-xs-3">a. Hari/ Tanggal</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $hari[date('D', strtotime($data['created_at']))] . ', ' . date('d-m-Y', strtotime($data['created_at'])) ?></div>
                                            </div>
                                        </div>

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

                                        <!-- <div class="row">
                                            <div class="col-sm-12">
                                                <div class="col-sm-3 col-xs-3">b. Petugas Survey</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['petugas_survey'] ?></div>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-left text-bold">III. IDENTITAS MUSTAHIK</h4>
                                                <div class="col-sm-3 col-xs-3">Nama</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['nama_mustahik'] ?></div>
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
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['usia'] ?> Tahun</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-3 col-xs-3">Nama Orang Tua</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['nama_kepala_keluarga'] ?></div>
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
                                                <div class="col-sm-3 col-xs-3">Penghasilan Keluarga</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['penghasilan'] ?></div>
                                            </div>
                                        </div>
                                        <!--
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-3 col-xs-3">Pekerjaan</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['pekerjaan'] ?></div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-3 col-xs-3">Penghasilan</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: Rp. <?php echo number_format($data['penghasilan']) ?>,-</div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-sm-3 col-xs-3">Jumlah Tanggungan</div>
                                                <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['jumlah_tanggungan'] ?> Orang</div>
                                            </div>
                                        </div> -->

                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-left text-bold">IV. IDENTITAS MUSTAHIK : 6-30</h4>
                                                <div class="col-md-12">1. Pendapatan per kapita = jumlah penghasilan dibagi (:) jumlah tanggungan per bulan (Kurs 1 US$ = IDR 13.000 pada tahun 2016)</div>
                                                <div class="col-md-12">
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_1'] == '5') {
                                                            echo "❎";
                                                        } else {
                                                            echo "a.";
                                                        } ?> < Rp. 390.000 (5)<br>
                                                            <?php if ($data['no_1'] == '4') {
                                                                echo "❎";
                                                            } else {
                                                                echo "b.";
                                                            } ?> Rp. Rp 390.000 – Rp 700.000 (4)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_1'] == '2') {
                                                            echo "❎";
                                                        } else {
                                                            echo "c.";
                                                        } ?> > Rp. 700.000 – 1.000.000 (2)<br>
                                                        <?php if ($data['no_1'] == '1') {
                                                            echo "❎";
                                                        } else {
                                                            echo "d.";
                                                        } ?> > Rp. 1.000.000 (1)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="col-md-12">2. Status pernikahan Kepala Keluarga</div>
                                                <div class="col-md-12">
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_2'] == '5') {
                                                            echo "❎";
                                                        } else {
                                                            echo "a.";
                                                        } ?> Janda (5)<br>
                                                        <?php if ($data['no_2'] == '3') {
                                                            echo "❎";
                                                        } else {
                                                            echo "b.";
                                                        } ?> Duda (3)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_2'] == '1') {
                                                            echo "❎";
                                                        } else {
                                                            echo "c.";
                                                        } ?> Nikah (1)<br>
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
                                                        } ?> Tidak sekolah (5)<br>
                                                        <?php if ($data['no_3'] == '4') {
                                                            echo "❎";
                                                        } else {
                                                            echo "b.";
                                                        } ?> SD/ Sederajat (4)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-8">
                                                        <?php if ($data['no_3'] == '3') {
                                                            echo "❎";
                                                        } else {
                                                            echo "c.";
                                                        } ?> SMP/ Sederajat (3)<br>
                                                        <?php if ($data['no_3'] == '2') {
                                                            echo "❎";
                                                        } else {
                                                            echo "d.";
                                                        } ?> SMA (2)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-8">
                                                        <?php if ($data['no_3'] == '1') {
                                                            echo "❎";
                                                        } else {
                                                            echo "e.";
                                                        } ?> PERTI (1)
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
                                                <div class="col-md-12">5. Pekerjaan kepala keluarga Mustahik</div>
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
                                                        } ?> Buruh Pabrik (3)<br>
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
                                                        <?php if ($data['no_6'] == '3') {
                                                            echo "❎";
                                                        } else {
                                                            echo "b.";
                                                        } ?> Istri (3)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_6'] == '1') {
                                                            echo "❎";
                                                        } else {
                                                            echo "c.";
                                                        } ?> Anak (1)
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <h4 class="text-left text-bold">V. PENGELUARAN RUTIN BULANAN : 4-20</h4>
                                                <div class="col-md-12">7. Kebutuhan Pokok Rumah Tangga (Belanja Dapur)</div>
                                                <div class="col-md-12">
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_7'] == '5') {
                                                            echo "❎";
                                                        } else {
                                                            echo "a.";
                                                        } ?> >Rp.2.500.000 (5))<br>
                                                        <?php if ($data['no_7'] == '4') {
                                                            echo "❎";
                                                        } else {
                                                            echo "b.";
                                                        } ?> Rp 2.000.000 – Rp 2.500.000 (4)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_7'] == '3') {
                                                            echo "❎";
                                                        } else {
                                                            echo "c.";
                                                        } ?> Rp. 1.500.000 – Rp. 2.000.000 (3)<br>
                                                        <?php if ($data['no_7'] == '2') {
                                                            echo "❎";
                                                        } else {
                                                            echo "d.";
                                                        } ?> Rp. 1.000.000 – Rp. 1.500.000 (2)
                                                    </div>
                                                    <div class="col-sm-4 col-xs-4">
                                                        <?php if ($data['no_7'] == '1') {
                                                            echo "❎";
                                                        } else {
                                                            echo "e.";
                                                        } ?> < Rp. 1.000.000 (1) </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">8. Biaya Sekolah (SPP, Uang Jajan & Transportasi)</div>
                                                    <div class="col-md-12">
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_8'] == '5') {
                                                                echo "❎";
                                                            } else {
                                                                echo "a.";
                                                            } ?> Rp 400.000 (5)<br>
                                                            <?php if ($data['no_8'] == '4') {
                                                                echo "❎";
                                                            } else {
                                                                echo "b.";
                                                            } ?> Rp 350.000 – Rp 400.000 (4)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_8'] == '3') {
                                                                echo "❎";
                                                            } else {
                                                                echo "c.";
                                                            } ?> Rp 300.000 - Rp350.000 (3)<br>
                                                            <?php if ($data['no_8'] == '2') {
                                                                echo "❎";
                                                            } else {
                                                                echo "d.";
                                                            } ?> Rp 250.000 – Rp 300.000 (2)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_8'] == '1') {
                                                                echo "❎";
                                                            } else {
                                                                echo "e.";
                                                            } ?> Rp 0 – Rp 250.000 (1)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">9. Kontrakan</div>
                                                    <div class="col-md-12">
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_9'] == '5') {
                                                                echo "❎";
                                                            } else {
                                                                echo "a.";
                                                            } ?> > Rp 500.000 (5)<br>
                                                            <?php if ($data['no_9'] == '4') {
                                                                echo "❎";
                                                            } else {
                                                                echo "b.";
                                                            } ?> Rp 450.000 – Rp 500.000 (4)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_9'] == '3') {
                                                                echo "❎";
                                                            } else {
                                                                echo "c.";
                                                            } ?> Rp 400.000 – 450.000 (3)<br>
                                                            <?php if ($data['no_9'] == '2') {
                                                                echo "❎";
                                                            } else {
                                                                echo "d.";
                                                            } ?> Rp 350.000 – Rp 400.000 (2)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_9'] == '1') {
                                                                echo "❎";
                                                            } else {
                                                                echo "e.";
                                                            } ?> Rp 0 – Rp 350.000 (1)
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="col-md-12">10. Tagihan Listrik</div>
                                                    <div class="col-md-12">
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_10'] == '5') {
                                                                echo "❎";
                                                            } else {
                                                                echo "a.";
                                                            } ?> >Rp 300.000 (5)<br>
                                                            <?php if ($data['no_10'] == '4') {
                                                                echo "❎";
                                                            } else {
                                                                echo "b.";
                                                            } ?> Rp 200.000 – 250.000 (4)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_10'] == '3') {
                                                                echo "❎";
                                                            } else {
                                                                echo "c.";
                                                            } ?> Rp 150.000 – 200.000 (3)<br>
                                                            <?php if ($data['no_10'] == '2') {
                                                                echo "❎";
                                                            } else {
                                                                echo "d.";
                                                            } ?> Rp 100.000 – 150.000 (2)
                                                        </div>
                                                        <div class="col-sm-4 col-xs-4">
                                                            <?php if ($data['no_10'] == '1') {
                                                                echo "❎";
                                                            } else {
                                                                echo "e.";
                                                            } ?> < Rp 100.000 (1) </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-sm-3 col-xs-3">11. Total kebutuhan bulanan </div>
                                                        <div class="col-sm-9 col-xs-9 text-capitalize">: <?php echo $data['no_11'] ?></div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="text-left text-bold">VI. POLA HIDUP : 5-15</h4>
                                                        <div class="col-md-12">12. Intensitas mengkonsumsi makanan pokok</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_12'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> 1 x sehari (5)<br>
                                                                <?php if ($data['no_12'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 2x Sehari (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_12'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 3x sehari (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">13. Intensitas mengkonsumsi daging</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_13'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> 1 bulan sekali (5)<br>
                                                                <?php if ($data['no_13'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 3 minggu sekali (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_13'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 2 minggu sekali (3)<br>
                                                                <?php if ($data['no_13'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 1 minggu sekali (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">14. Intensitas pembelian pakaian baru</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_14'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> 1 tahun sekali (5)<br>
                                                                <?php if ($data['no_14'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 6 bulan sekali (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_14'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 3 bulan sekali (3)<br>
                                                                <?php if ($data['no_14'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 2 bulan (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_14'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> 1 bulan (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="text-left text-bold">VII. INDEX RUMAH: 12-60</h4>
                                                        <div class="col-md-12">15. Kepemilikan rumah</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_15'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Mengontrak (5)<br>
                                                                <?php if ($data['no_15'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Menumpang (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_15'] == '1') {
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
                                                        <div class="col-md-12">16. Luas rumah dan lantai</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_16'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?>< 12 m<sup>2</sup> (5)<br>
                                                                    <?php if ($data['no_16'] == '4') {
                                                                        echo "❎";
                                                                    } else {
                                                                        echo "b.";
                                                                    } ?> 15 m<sup>2</sup> (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_16'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 18 m<sup>2</sup> (3)<br>
                                                                <?php if ($data['no_16'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 20 m<sup>2</sup> (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_16'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> 25 m<sup>2</sup> (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">17. Dinding rumah</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_17'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Bilik bambu / Triplek / Seng (5)<br>
                                                                <?php if ($data['no_17'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Semi permanen (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_17'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> Tembok (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>




                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">18. Lantai</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_18'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Tanah (5)<br>
                                                                <?php if ($data['no_18'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Panggung (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_18'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> Semen (3)<br>
                                                                <?php if ($data['no_18'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> Keramik (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_18'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> Marmer (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">19. Atap</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_19'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Jerami (5)<br>
                                                                <?php if ($data['no_19'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?>Seng (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_19'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> Asbes (3)<br>
                                                                <?php if ($data['no_19'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?>Genteng (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_19'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> Baja ringan (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">20. Dapur</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_20'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Tungku (kayu bakar) (5)<br>
                                                                <?php if ($data['no_20'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Kompor minyak / gas 3 kg(3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_20'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> Kompor gas > 3 kg (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!-- ////////////baru sampe sini//////////// -->
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">21. Kursi</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_21'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Lesehan / Balai bambu (5)<br>
                                                                <?php if ($data['no_21'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Kursi kayu / plastik (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_21'] == '1') {
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
                                                        <div class="col-md-12">22. Sumber air</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_22'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Bersama (5)<br>
                                                                <?php if ($data['no_22'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> PDAM (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_22'] == '1') {
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
                                                        <div class="col-md-12">23. Tempat buang air (MCK)</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_23'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Tidak ada / Bersama (5)<br>
                                                                <?php if ($data['no_23'] == '1') {
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
                                                        <div class="col-md-12">24. Penerangan</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_24'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> 450 Watt (5)<br>
                                                                <?php if ($data['no_24'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 900 Watt (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_24'] == '1') {
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
                                                        <div class="col-md-12">25. Lokasi rumah di</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_25'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Bantaran kali (5)<br>
                                                                <?php if ($data['no_25'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Daerah kumuh (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_25'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> Perkampungan (2)<br>
                                                                <?php if ($data['no_25'] == '1') {
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
                                                        <div class="col-md-12">26. Jarak tempuh menuju ke Puskesmas</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_26'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> > 7 Km (5)<br>
                                                                <?php if ($data['no_26'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 5 -7 Km (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_26'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 3 - 5 Km (3)<br>
                                                                <?php if ($data['no_26'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 1 - 3 Km (1)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_26'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> 0-1 km (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4 class="text-left text-bold">VIII. KEPEMILIKAN BARANG : 3-15</h4>
                                                        <div class="col-md-12">27. Kendaraan</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_27'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Tidak ada / Sepeda (5)<br>
                                                                <?php if ($data['no_27'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Sepeda motor kredit (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_27'] == '1') {
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
                                                        <div class="col-md-12">28. Elektronik</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_28'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> TV (5)<br>
                                                                <?php if ($data['no_28'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> TV & kulkas (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_28'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> TV, kulkas & mesin cuci (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">29. Barang berharga yang mudah dijual dengan nilai minimal Rp 500.000,-</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_29'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> HP (5)<br>
                                                                <?php if ($data['no_29'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> HP & Emas (3)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_29'] == '1') {
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
                                                        <h4 class="text-left text-bold">IX. DATA KELUARGA : 5-25</h4>
                                                        <div class="col-md-12">30. Jumlah tanggungan keluarga</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_30'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> >5 orang (5)<br>
                                                                <?php if ($data['no_30'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 3-4 orang (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_30'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 2 orang (3)<br>
                                                                <?php if ($data['no_30'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 1 orang (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_30'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> Tidak ada (1)
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">31. Jumlah anak yang sekolah</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_31'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> 4 anak (5)<br>
                                                                <?php if ($data['no_31'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 3 anak (4)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_31'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 2 anak (3)<br>
                                                                <?php if ($data['no_31'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 1 anak (2)
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_31'] == '1') {
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
                                                        <div class="col-md-12">32. Ada yang putus sekolah</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_32'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Ada (5)<br>
                                                                <?php if ($data['no_32'] == '1') {
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
                                                        <div class="col-md-12">33. Memiliki BATITTA (bayi dibawah 3 tahun)</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_33'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Ya (5)<br>
                                                                <?php if ($data['no_33'] == '1') {
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
                                                        <div class="col-md-12">34. Ibu atau Istri hamil atau tidak?</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_34'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Ya (5)<br>
                                                                <?php if ($data['no_34'] == '1') {
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
                                                        <h4 class="text-left text-bold">X. INDIKATOR PERILAKU</h4>
                                                        <div class="col-md-12">35. Kebiasaan merokok anggota keluarga</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_35'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Ada<br>
                                                                <?php if ($data['no_35'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Tidak
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">36. Kebiasaan patologis pada anggota keluarga (Judi, Miras, Narkoba)</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_36'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Tidak pernah <br>
                                                                <?php if ($data['no_36'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Pernah
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_36'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Kadang - kadang
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">37. Pola Sholat pada anggota keluarga</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_37'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Berjamaah 5 waktu<br>
                                                                <?php if ($data['no_37'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Teratur tapi tidak berjamaah
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_37'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Jarang Sholat<br>
                                                                <?php if ($data['no_37'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Tidak pernah
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">38. Rajin mengikuti kajian</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_38'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Menjadi pembicara<br>
                                                                <?php if ($data['no_38'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Menjadi pengurus
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_38'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Aktif jadi anggota<br>
                                                                <?php if ($data['no_38'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Jarang hadir
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">39. Istri dan anak remaja putri mengenakan jilbab</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_39'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Ya selalu<br>
                                                                <?php if ($data['no_39'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Ya, jika keluar rumah
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_39'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> Kadang - kadang<br>
                                                                <?php if ($data['no_39'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> Tidak pernah
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">40. Jumlah alat sholat yang dimiliki (Mukena/ Sarung, dan Sajadah)</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_40'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> >5 <br>
                                                                <?php if ($data['no_40'] == '4') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 4
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_40'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 3<br>
                                                                <?php if ($data['no_40'] == '2') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "d.";
                                                                } ?> 2
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_40'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "e.";
                                                                } ?> 1
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="col-md-12">41. Jumlah Al-Qur’an yang dimiliki</div>
                                                        <div class="col-md-12">
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_41'] == '5') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "a.";
                                                                } ?> >3 buah <br>
                                                                <?php if ($data['no_41'] == '3') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "b.";
                                                                } ?> 2 buah
                                                            </div>
                                                            <div class="col-sm-4 col-xs-4">
                                                                <?php if ($data['no_41'] == '1') {
                                                                    echo "❎";
                                                                } else {
                                                                    echo "c.";
                                                                } ?> 1 buah
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
                                                                            Rekomendasi LPM DD: <br>
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
                                                                            } ?> Uang
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
                                                                    <!-- <tr>
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
                                                                    </tr> -->
                                                                    <tr>
                                                                        <td>Rekomendasi Tanggal</td>
                                                                        <td colspan="3">
                                                                            <?php echo $hari[date('D', strtotime($data['tanggal_rekomendasi']))] . ', ' . date('d-m-Y', strtotime($data['tanggal_rekomendasi'])) ?>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>

                                                    <div class="row col-lg-12">
                                                        <div class="col-lg-6">
                                                            <div class="col-lg-12 pull-left">
                                                                <b>Keterangan</b><br>
                                                                1. Total Nilai 131 - 170 : Perlu mendapat perhatian khusus<br>
                                                                2. Total Nilai 71 - 130 : Layak dibantu<br>
                                                                3. Total Nilai 37 - 70 : Tidak layak dibantu
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="col-md-12 text-right">Ciputat, <?php echo date('d-m-Y', strtotime($data['tanggal_rekomendasi'])) ?> </div>
                                                            <div class="col-md-12 text-right">
                                                                ( <u><?php echo $data['petugas_survey'] ?></u> )<br>
                                                                Manager Area
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <br>
                                                    <br>
                                                    <hr>
                                                    <h4 class="text-left text-bold mt-5">LAMPIRAN</h4>
                                                    <div class="row  col-lg-12">
                                                        <div class="col-lg-4">
                                                            <div class="col-sm-6 col-xs-12">
                                                                <img src="../assets/esurvey/foto/<?php echo $data['foto'] ?>" class="img-thumbnail" width="100%">
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <iframe src='https://maps.google.com/maps?q="<?php echo $data['maps']; ?>"&t=&z=13&ie=UTF8&iwloc=&output=embed' frameborder='0' style='width: 100%; height: 240px;' class="img-thumbnail"></iframe>
                                                        </div>
                                                        <div class="col-lg-4">
                                                            <p class="img-thumbnail text-center">
                                                                <canvas id="qrcode"></canvas><br>
                                                                <b style="margin-top: -120px;">Scan Maps</b>
                                                            </p>
                                                        </div>
                                                    </div>



                                                    <div class="row no-print mt-5">
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-default" onclick="history.back()">
                                                                Kembali
                                                            </button>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <span class="visible-lg"><a onclick="PopupCenter('print?id=<?php echo $data['id'] ?>','myPop1',800,800);" href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fa fw fa-print"></i> Cetak</a> </span>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                    </section>
                </div>

            </section>

            <section class="basic-elements">

            </section>
            <br><br><br><br>
        </div>
    </div>
</div>


<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>

<script type="text/javascript">
    window.onload = function() {
        var url = 'https://maps.google.com/maps?q="<?php echo $data['maps']; ?>"&t=&z=13';
        QRCode.toCanvas(document.getElementById("qrcode"), url, function(error) {
            if (error) console.error(error);
        });
    };
</script>
<script src="../assets/esurvey/js/qrcode.min.js"></script>
<!-- jQuery 3 -->
<!-- <script src="../assets/esurvey/bower_components/jquery/dist/jquery.min.js"></script> -->
<!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> -->
<!-- Bootstrap 3.3.7 -->
<script src="../assets/esurvey/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../assets/esurvey/dist/js/adminlte.min.js"></script>
<!-- font Awesome-->
<link rel="stylesheet" href="../assets/esurvey/plugins/fontawesome-free-5.15.4-web/js/all.min.js">
<!-- AdminLTE for demo purposes -->
<script src="../assets/esurvey/dist/js/demo1.js"></script>
<!-- daterangepicker -->
<script src="../assets/esurvey/bower_components/moment/min/moment.min.js"></script>
<script type="text/javascript" src="../assets/esurvey/bower_components/jquery-ui/jquery-ui.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<script src="../assets/esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.js"></script>
<script src="../assets/esurvey/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../assets/esurvey/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" src="../assets/esurvey/dist/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="../assets/esurvey/dist/js/dataTables.bootstrap.min.js"></script>
<script src="../assets/esurvey/dist/js/bootstrap-select.min.js"></script>
<!-- Select2 -->
<script src="../assets/esurvey/bower_components/select2/dist/js/select2.full.min.js"></script>
<script>
    $(function() {
        $('.select2').select2()
    });
</script>

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

<!--script src="../assets/esurvey/dist/js/jquery.idle.js" type="text/javascript"></script>
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