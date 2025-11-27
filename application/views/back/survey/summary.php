<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section class="content">

                <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } ?>

                <div class="content-wrapper">
                    <section class="content">

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="content-header"><?php echo $page_title ?></div>
                        </div>
                        <div class="col-sm-6">
                                <img src="../assets/esurvey/foto/<?php echo $data['foto'] ?>" class="img-thumbnail" width="200px">
                        </div>
                    </div>



                        <div class="row mt-5">
                            <div class="col-md-12">
                                <div class="panel">
                                    <div class="panel-body">

                                    <!-- 1. IDENTITAS MUSTAHIK -->
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong> I. IDENTITAS MUSTAHIK</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:185px;">Nama</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['nama_mustahik'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:185px;">Jenis Kelamin</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['jenis_kelamin'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:185px;">Usia</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['usia'] ?> Tahun
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:185px;">Nama Orang Tua</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['nama_kepala_keluarga'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:185px;">Alamat</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['alamat'] ?>  Kel.
                                                    <?php echo @$nama_kel['desa_kelurahan'] ?>  Kec.
                                                    <?php echo @$nama_kec['kecamatan_name'] ?>  Kab./Kota.
                                                    <?php echo @$nama_kab['kota_kab'] ?>  Prov.
                                                    <?php echo @$nama_prov['provinsi'] ?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:185px;">Penghasilan Keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    : <?php echo $data['penghasilan'] ?>
                                                </div>
                                            </div>
                                            <br>
                                            <div class="d-flex">
                                                <div style="width:320px;">1. Pendapatan per kapita</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_1'] == '5'){ ?>
                                                        < Rp. 390.000
                                                        <?php }else if($data['no_1'] == '4'){?>
                                                        Rp. Rp 390.000 – Rp 700.000
                                                        <?php }else if($data['no_1'] == '2'){?>
                                                            Rp. 700.000 – 1.000.000
                                                        <?php }else if($data['no_1'] == '1'){?>
                                                            Rp. 1.000.000
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">2. Status pernikahan Kepala Keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_2'] == '5'){ ?>
                                                            Janda
                                                        <?php }else if($data['no_2'] == '3'){?>
                                                            Duda
                                                        <?php }else if($data['no_2'] == '1'){?>
                                                            Nikah
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">3. Pendidikan terakhir kepala keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_3'] == '5'){ ?>
                                                            Tidak sekolah
                                                        <?php }else if($data['no_3'] == '4'){?>
                                                            SD/ Sederajat
                                                        <?php }else if($data['no_3'] == '3'){?>
                                                            SMP/ Sederajat
                                                        <?php }else if($data['no_3'] == '2'){?>
                                                            SMA
                                                        <?php }else if($data['no_3'] == '1'){?>
                                                            PERTI
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">4. Kondisi kepala keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_4'] == '5'){ ?>
                                                        Sakit menahun
                                                        <?php }else if($data['no_4'] == '4'){?>
                                                            Sakit - sakitan
                                                        <?php }else if($data['no_4'] == '3'){?>
                                                            Manula
                                                        <?php }else if($data['no_4'] == '2'){?>
                                                            Sehat bekerja
                                                        <?php }else if($data['no_4'] == '1'){?>
                                                            Sehat & tidak bekerja
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">5.Pekerjaan kepala keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    =   <?php  if($data['no_5'] == '5'){ ?>
                                                        Menganggur
                                                        <?php }else if($data['no_5'] == '4'){?>
                                                            Buruh serabutan
                                                        <?php }else if($data['no_5'] == '3'){?>
                                                            Buruh Pabrik
                                                        <?php }else if($data['no_5'] == '1'){?>
                                                            Pedagang kecil
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">6. Status mustahik dalam keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    =   <?php  if($data['no_6'] == '5'){ ?>
                                                        suami
                                                        <?php }else if($data['no_6'] == '3'){?>
                                                            Istri
                                                        <?php }else if($data['no_6'] == '1'){?>
                                                            Anak
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- 2. PENGELUARAN RUTIN BULANAN -->
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong> II. PENGELUARAN RUTIN BULANAN</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">7. Kebutuhan Pokok Rumah Tangga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_7'] == '5'){ ?>
                                                        > Rp.2.500.000
                                                        <?php }else if($data['no_7'] == '4'){?>
                                                            Rp 2.000.000 – Rp 2.500.000
                                                        <?php }else if($data['no_7'] == '3'){?>
                                                            Rp. 1.500.000 – Rp. 2.000.000
                                                        <?php }else if($data['no_7'] == '2'){?>
                                                            Rp. 1.000.000 – Rp. 1.500.000
                                                        <?php }else if($data['no_7'] == '1'){?>
                                                            < Rp. 1.000.000
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">8. Biaya Sekolah</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_8'] == '5'){ ?>
                                                        Rp 400.000
                                                        <?php }else if($data['no_8'] == '4'){?>
                                                            Rp 350.000 – Rp 400.000
                                                        <?php }else if($data['no_8'] == '3'){?>
                                                            Rp 300.000 - Rp350.000
                                                        <?php }else if($data['no_8'] == '2'){?>
                                                            Rp 250.000 – Rp 300.000
                                                        <?php }else if($data['no_8'] == '1'){?>
                                                            Rp 0 – Rp 250.000
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">9. Kontrakan</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_9'] == '5'){ ?>
                                                        > Rp 500.000
                                                        <?php }else if($data['no_9'] == '4'){?>
                                                            Rp 450.000 – Rp 500.000
                                                        <?php }else if($data['no_9'] == '3'){?>
                                                            Rp 400.000 – 450.000
                                                        <?php }else if($data['no_9'] == '2'){?>
                                                            Rp 350.000 – Rp 400.000
                                                        <?php }else if($data['no_9'] == '1'){?>
                                                            Rp 0 – Rp 350.000
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">10. Tagihan Listrik</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_10'] == '5'){ ?>
                                                        > Rp 300.000
                                                        <?php }else if($data['no_10'] == '4'){?>
                                                            Rp 200.000 – 250.000
                                                        <?php }else if($data['no_10'] == '3'){?>
                                                            Rp 150.000 – 200.000
                                                        <?php }else if($data['no_10'] == '2'){?>
                                                            Rp 100.000 – 150.000
                                                        <?php }else if($data['no_10'] == '1'){?>
                                                            < Rp 100.000
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">11. Total kebutuhan bulanan</div>
                                                <div class="flex-fill text-capitalize">
                                                     = RP <?php echo number_format($data['no_11'], 0, ',', '.'); ?>

                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                    <!-- 3.POLA HIDUP -->
                                    <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong> III. POLA HIDUP</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">12. Intensitas mengkonsumsi makanan pokok</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_12'] == '5'){ ?>
                                                        1 x sehari
                                                        <?php }else if($data['no_12'] == '3'){?>
                                                            2x Sehari
                                                        <?php }else if($data['no_12'] == '1'){?>
                                                            3x Sehari
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">13. Intensitas mengkonsumsi daging</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_13'] == '5'){ ?>
                                                        1 bulan sekali
                                                        <?php  }else if($data['no_13'] == '4'){ ?>
                                                            3 minggu sekali
                                                        <?php }else if($data['no_13'] == '3'){?>
                                                            2 minggu sekali
                                                        <?php }else if($data['no_13'] == '1'){?>
                                                            1 minggu sekali
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">14. Intensitas pembelian pakaian baru</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_14'] == '5'){ ?>
                                                        1 tahun sekali
                                                        <?php  }else if($data['no_14'] == '4'){ ?>
                                                            6 bulan sekali
                                                        <?php }else if($data['no_14'] == '3'){?>
                                                            3 bulan sekali
                                                        <?php }else if($data['no_14'] == '2'){?>
                                                            2 bulan
                                                        <?php }else if($data['no_14'] == '1'){?>
                                                            1 bulan
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                     <!-- IV.INDEX RUMAH -->
                                     <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong> IV. INDEX RUMAH</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">15. Kepemilikan rumah</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_15'] == '5'){ ?>
                                                        Mengontrak
                                                        <?php }else if($data['no_15'] == '3'){?>
                                                            Menumpang
                                                        <?php }else if($data['no_15'] == '1'){?>
                                                            Sendiri
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">16. Luas rumah dan lantai</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_16'] == '5'){ ?>
                                                        < 12 m<sup>2</sup>
                                                        <?php }else if($data['no_16'] == '4'){?>
                                                            15 m<sup>2</sup>
                                                        <?php }else if($data['no_16'] == '3'){?>
                                                            18 m<sup>2</sup>
                                                        <?php }else if($data['no_16'] == '2'){?>
                                                            20 m<sup>2</sup>
                                                        <?php }else if($data['no_16'] == '1'){?>
                                                            25 m<sup>2</sup>
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">17. Dinding rumah</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_17'] == '5'){ ?>
                                                        Bilik bambu / Triplek / Seng
                                                        <?php }else if($data['no_17'] == '3'){?>
                                                            Semi permanen
                                                        <?php }else if($data['no_17'] == '1'){?>
                                                            Tembok
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">18. Lantai</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_18'] == '5'){ ?>
                                                        Tanah
                                                        <?php }else if($data['no_18'] == '4'){?>
                                                            Panggung
                                                        <?php }else if($data['no_18'] == '3'){?>
                                                            Semen
                                                        <?php }else if($data['no_18'] == '2'){?>
                                                            Keramik
                                                        <?php }else if($data['no_18'] == '1'){?>
                                                            Marmer
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">19. Atap</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_19'] == '5'){ ?>
                                                        Jerami
                                                        <?php }else if($data['no_19'] == '4'){?>
                                                            Seng
                                                        <?php }else if($data['no_19'] == '3'){?>
                                                            Asbes
                                                        <?php }else if($data['no_19'] == '2'){?>
                                                            Genteng
                                                        <?php }else if($data['no_19'] == '1'){?>
                                                            Baja ringan
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">20. Dapur</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_20'] == '5'){ ?>
                                                        Tungku (kayu bakar)
                                                        <?php }else if($data['no_20'] == '3'){?>
                                                            Kompor minyak / gas 3 kg
                                                        <?php }else if($data['no_20'] == '1'){?>
                                                            Kompor gas > 3 kg
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">21. Kursi</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_21'] == '5'){ ?>
                                                        Lesehan / Balai bambu
                                                        <?php }else if($data['no_21'] == '3'){?>
                                                            Kursi kayu / plastik
                                                        <?php }else if($data['no_21'] == '1'){?>
                                                            Sofa
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">22. Sumber air</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_22'] == '5'){ ?>
                                                        Bersama
                                                        <?php }else if($data['no_22'] == '2'){?>
                                                            PDAM
                                                        <?php }else if($data['no_22'] == '1'){?>
                                                            Sendiri
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">23. Tempat buang air (MCK)</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_23'] == '5'){ ?>
                                                        Tidak ada / Bersama
                                                        <?php }else if($data['no_23'] == '1'){?>
                                                            Sendiri
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">24. Penerangan</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_24'] == '5'){ ?>
                                                        450 Wat
                                                        <?php }else if($data['no_24'] == '3'){?>
                                                            900 Watt
                                                        <?php }else if($data['no_24'] == '1'){?>
                                                            > 900 Watt
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">25. Lokasi rumah di</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_25'] == '5'){ ?>
                                                        Bantaran kali
                                                        <?php }else if($data['no_25'] == '4'){?>
                                                            Daerah kumuh
                                                        <?php }else if($data['no_25'] == '2'){?>
                                                            Perkampungan
                                                        <?php }else if($data['no_25'] == '1'){?>
                                                            Komplek perumahan
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">26. Jarak tempuh menuju ke Puskesmas</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_26'] == '5'){ ?>
                                                        > 7 Km
                                                        <?php }else if($data['no_26'] == '4'){?>
                                                            5 -7 Km
                                                        <?php }else if($data['no_26'] == '3'){?>
                                                            3 - 5 Km
                                                        <?php }else if($data['no_26'] == '2'){?>
                                                            1 - 3 Km
                                                        <?php }else if($data['no_26'] == '1'){?>
                                                            0-1 km
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>


                                        </div>
                                    </div>

                                     <!-- V. KEPEMILIKAN BARANG -->
                                     <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong>V. KEPEMILIKAN BARANG</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">27. Kendaraan</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_27'] == '5'){ ?>
                                                        Tidak ada / Sepeda
                                                        <?php }else if($data['no_27'] == '3'){?>
                                                            Sepeda motor kredit
                                                        <?php }else if($data['no_27'] == '1'){?>
                                                            Sepeda motor lunas
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">28. Elektronik</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_28'] == '5'){ ?>
                                                        TV
                                                        <?php }else if($data['no_28'] == '3'){?>
                                                            TV & kulkas
                                                        <?php }else if($data['no_28'] == '1'){?>
                                                            TV, kulkas & mesin cuci
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">29. Barang berharga yang mudah dijual dengan nilai minimal Rp 500.000</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_29'] == '5'){ ?>
                                                        HP
                                                        <?php }else if($data['no_29'] == '3'){?>
                                                            HP & Emas
                                                        <?php }else if($data['no_29'] == '1'){?>
                                                            HP, Emas & Motor
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- VI. DATA KELUARGA -->
                                     <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong>VI. DATA KELUARGA</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">30. Jumlah tanggungan keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_30'] == '5'){ ?>
                                                        > 5 orang
                                                        <?php }else if($data['no_30'] == '4'){?>
                                                            3-4 orang
                                                        <?php }else if($data['no_30'] == '3'){?>
                                                            2 orang
                                                        <?php }else if($data['no_30'] == '2'){?>
                                                            1 orang
                                                        <?php }else if($data['no_30'] == '1'){?>
                                                            Tidak ada
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">31. Jumlah anak yang sekolah</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_31'] == '5'){ ?>
                                                        4 anak
                                                        <?php }else if($data['no_31'] == '4'){?>
                                                            3 anak
                                                        <?php }else if($data['no_31'] == '3'){?>
                                                            2 anak
                                                        <?php }else if($data['no_31'] == '2'){?>
                                                            1 anak
                                                        <?php }else if($data['no_31'] == '1'){?>
                                                            Tidak ada
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">32. Ada yang putus sekolah</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_32'] == '5'){ ?>
                                                            Ada
                                                        <?php }else if($data['no_32'] == '1'){?>
                                                            Tidak ada
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">33. Memiliki BATITTA </div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_33'] == '5'){ ?>
                                                            Ya
                                                        <?php }else if($data['no_33'] == '1'){?>
                                                            Tidak ada
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">34. Ibu atau Istri hamil atau tidak?</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_34'] == '5'){ ?>
                                                            Ya
                                                        <?php }else if($data['no_34'] == '1'){?>
                                                            Tidak ada
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>

                                        </div>
                                    </div>

                                     <!-- VII. INDIKATOR PERILAKU -->
                                     <br>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h5 class="text-left text-bold" style="font-weight:400" > <strong>VII. INDIKATOR PERILAKU</strong></h5>

                                            <div class="d-flex">
                                                <div style="width:320px;">35. Kebiasaan merokok anggota keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_35'] == '5'){ ?>
                                                            Ada
                                                        <?php }else if($data['no_35'] == '1'){?>
                                                            Tidak
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">36. Kebiasaan patologis pada anggota keluarga (Judi, Miras, Narkoba)</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_36'] == '5'){ ?>
                                                        Tidak pernah
                                                        <?php }else if($data['no_36'] == '3'){?>
                                                            Pernah
                                                        <?php }else if($data['no_36'] == '1'){?>
                                                            Kadang - kadang
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">37. Pola Sholat pada anggota keluarga</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_37'] == '5'){ ?>
                                                        Berjamaah 5 waktu
                                                        <?php }else if($data['no_37'] == '3'){?>
                                                            Teratur tapi tidak berjamaah
                                                        <?php }else if($data['no_37'] == '2'){?>
                                                            Jarang Sholat
                                                        <?php }else if($data['no_37'] == '1'){?>
                                                            Tidak pernah
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">38. Rajin mengikuti kajiaN</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_38'] == '5'){ ?>
                                                        Menjadi pembicara
                                                        <?php }else if($data['no_38'] == '3'){?>
                                                            Menjadi pengurus
                                                        <?php }else if($data['no_38'] == '2'){?>
                                                            Aktif jadi anggota
                                                        <?php }else if($data['no_38'] == '1'){?>
                                                            Jarang hadir
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">39. Istri dan anak remaja putri mengenakan jilbab</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_39'] == '5'){ ?>
                                                        Ya selalu
                                                        <?php }else if($data['no_39'] == '3'){?>
                                                            Ya, jika keluar rumah
                                                        <?php }else if($data['no_39'] == '2'){?>
                                                            Kadang - kadang
                                                        <?php }else if($data['no_39'] == '1'){?>
                                                            Tidak pernah
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">40. Jumlah alat sholat yang dimiliki (Mukena/ Sarung, dan Sajadah)</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_40'] == '5'){ ?>
                                                        >5
                                                        <?php }else if($data['no_40'] == '4'){?>
                                                            4
                                                        <?php }else if($data['no_40'] == '3'){?>
                                                            3
                                                        <?php }else if($data['no_40'] == '2'){?>
                                                            2
                                                        <?php }else if($data['no_40'] == '1'){?>
                                                            1
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                            <div class="d-flex">
                                                <div style="width:320px;">41. Jumlah Al-Qur’an yang dimiliki</div>
                                                <div class="flex-fill text-capitalize">
                                                    = <?php  if($data['no_41'] == '5'){ ?>
                                                        >3 bua
                                                        <?php }else if($data['no_41'] == '3'){?>
                                                            2 buah
                                                        <?php }else if($data['no_41'] == '1'){?>
                                                            1 buah
                                                        <?php }else{?>
                                                            -
                                                        <?php }?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>




                                                    <div class="row no-print mt-5">
                                                        <div class="col-lg-6">
                                                            <button type="button" class="btn btn-default" onclick="history.back()">
                                                                Kembali
                                                            </button>
                                                            <span class="visible-lg"><a onclick="PopupCenter('print_summary?id=<?php echo $data['id'] ?>','myPop1',800,800);" href="javascript:void(0);" class="btn btn-primary btn-sm"><i class="fa fw fa-print"></i> Cetak</a> </span>
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