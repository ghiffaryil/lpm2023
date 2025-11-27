<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>E-Survey</title>
    <link rel="icon" href="../assets/esurvey/dist/img/favicon.png">
    <style type="text/css">
        body {
            font-size: 12px;
            font-family: 'Source Sans Pro', sans-serif; /* Asumsi font dari link Google Fonts */
        }

        .row {
            /* Simulasikan row */
            margin-left: -15px;
            margin-right: -15px;
            overflow: hidden; /* Untuk menahan float di dalam */
        }

        .col-md-12, .col-xs-12, .col-sm-12, .col-lg-12 {
            /* Simulasikan col-12, harus menggunakan lebar 100% dan padding/margin yang sama dengan row */
            width: 100%;
            float: left;
            padding-left: 15px;
            padding-right: 15px;
            box-sizing: border-box; /* Penting agar padding tidak menambah lebar */
        }

        .panel {
            /* Simulasikan panel */
            margin-bottom: 20px;
            background-color: #fff;
            border: 1px solid transparent;
            border-radius: 4px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .panel-body {
            /* Simulasikan padding panel-body */
            padding: 15px;
        }

        .text-left {
            text-align: left;
        }

        .text-bold {
            font-weight: bold;
        }

        .img-thumbnail {
            /* Simulasikan img-thumbnail */
            padding: 4px;
            line-height: 1.42857143;
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 4px;
            transition: all .2s ease-in-out;
            display: inline-block;
            max-width: 100%;
            height: auto;
        }

        /* Gaya untuk elemen 'd-flex' simulasi */
        .d-flex {
            display: flex;
            margin-bottom: 3px; /* Tambahkan sedikit jarak antar item */
        }

        .d-flex > div:first-child {
            /* Ini adalah div dengan lebar tetap (misalnya 185px atau 320px) */
            flex-shrink: 0;
        }

        .flex-fill {
            /* Ini adalah div yang akan mengisi ruang tersisa */
            flex-grow: 1;
            padding-left: 5px; /* Sedikit padding agar tidak terlalu dekat dengan ':' */
        }

        .text-capitalize {
            text-transform: capitalize;
        }

        .mt-5 {
            margin-top: 3rem !important; /* Nilai setara Bootstrap mt-5 */
        }

        /* Gaya lainnya yang ada di CSS bawaan */
        /* ... (Tambahkan gaya dari link CSS eksternal jika perlu, seperti custom/style.css) */
        /* Untuk tujuan ini, saya hanya fokus pada kelas Bootstrap */
    </style>
    </head>

<body>

    <div class="row" style="margin-left: -15px; margin-right: -15px;">
        <div class="col-md-12 col-xs-12 col-md-12 col-sm-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
            <div class="panel" style="margin-bottom: 20px; background-color: #fff; border: 1px solid transparent; border-radius: 4px; box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);">
                <div class="panel-body" style="padding: 15px;">

                <div style="
                    /* Meniru class 'row' */
                    margin-left: -15px;
                    margin-right: -15px;
                    overflow: hidden; /* Clearfix/Menampung float */
                ">
                    <div style="
                        /* Meniru class 'col-sm-6' */
                        width: 50%;
                        float: left;
                        padding-left: 15px;
                        padding-right: 15px;
                        box-sizing: border-box;
                    ">
                        <div class="content-header" style="
                            /* Gaya dasar untuk header konten, jika ada */
                            font-size: 24px;
                            font-weight: 600;
                        "><?php echo $page_title ?></div>
                    </div>
                    <div style="
                        /* Meniru class 'col-sm-6' */
                        width: 50%;
                        float: left;
                        padding-left: 15px;
                        padding-right: 15px;
                        box-sizing: border-box;
                        text-align: right; /* Asumsi kolom foto diletakkan di kanan */
                    ">
                        <img src="../assets/esurvey/foto/<?php echo $data['foto'] ?>" width="200px" style="
                            /* Meniru class 'img-thumbnail' */
                            padding: 4px;
                            line-height: 1.42857143;
                            background-color: #fff;
                            border: 1px solid #ddd;
                            border-radius: 4px;
                            display: inline-block;
                            max-width: 100%;
                            height: auto;
                        ">
                    </div>
                </div>

                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                    <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                        <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                            <strong style="font-weight: bold;"> I. IDENTITAS MUSTAHIK</strong>
                        </h5>

                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Nama</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['nama_mustahik'] ?>
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Jenis Kelamin</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['jenis_kelamin'] ?>
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Usia</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['usia'] ?> Tahun
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Nama Orang Tua</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['nama_kepala_keluarga'] ?>
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Alamat</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['alamat'] ?> Kel.
                                <?php echo @$nama_kel['desa_kelurahan'] ?> Kec.
                                <?php echo @$nama_kec['kecamatan_name'] ?> Kab./Kota.
                                <?php echo @$nama_kab['kota_kab'] ?> Prov.
                                <?php echo @$nama_prov['provinsi'] ?>
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:185px; flex-shrink: 0;">Penghasilan Keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                : <?php echo $data['penghasilan'] ?>
                            </div>
                        </div>
                        <br>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">1. Pendapatan per kapita</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                = <?php  if($data['no_1'] == '5'){ ?>
                                    &lt; Rp. 390.000
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
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">2. Status pernikahan Kepala Keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">3. Pendidikan terakhir kepala keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">4. Kondisi kepala keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                = <?php  if($data['no_4'] == '5'){ ?>
                                    Sakit menahun
                                    <?php }else if($data['no_4'] == '4'){?>
                                        Sakit - sakitan
                                    <?php }else if($data['no_4'] == '3'){?>
                                        Manula
                                    <?php }else if($data['no_4'] == '2'){?>
                                        Sehat bekerja
                                    <?php }else if($data['no_4'] == '1'){?>
                                        Sehat &amp; tidak bekerja
                                    <?php }else{?>
                                        -
                                    <?php }?>
                            </div>
                        </div>
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">5.Pekerjaan kepala keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                        <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                            <div style="width:320px; flex-shrink: 0;">6. Status mustahik dalam keluarga</div>
                            <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;"> II. PENGELUARAN RUTIN BULANAN</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">7. Kebutuhan Pokok Rumah Tangga</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_7'] == '5'){ ?>
                                      &gt; Rp.2.500.000
                                      <?php }else if($data['no_7'] == '4'){?>
                                          Rp 2.000.000 – Rp 2.500.000
                                      <?php }else if($data['no_7'] == '3'){?>
                                          Rp. 1.500.000 – Rp. 2.000.000
                                      <?php }else if($data['no_7'] == '2'){?>
                                          Rp. 1.000.000 – Rp. 1.500.000
                                      <?php }else if($data['no_7'] == '1'){?>
                                          &lt; Rp. 1.000.000
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">11. Total kebutuhan bulanan</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                   = RP <?php echo number_format($data['no_11'], 0, ',', '.'); ?>

                              </div>
                          </div>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">8. Biaya Sekolah</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">9. Kontrakan</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_9'] == '5'){ ?>
                                      &gt; Rp 500.000
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">10. Tagihan Listrik</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_10'] == '5'){ ?>
                                      &gt; Rp 300.000
                                      <?php }else if($data['no_10'] == '4'){?>
                                          Rp 200.000 – 250.000
                                      <?php }else if($data['no_10'] == '3'){?>
                                          Rp 150.000 – 200.000
                                      <?php }else if($data['no_10'] == '2'){?>
                                          Rp 100.000 – 150.000
                                      <?php }else if($data['no_10'] == '1'){?>
                                          &lt; Rp 100.000
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>

                      </div>
                  </div>

                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;"> III. POLA HIDUP</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">12. Intensitas mengkonsumsi makanan pokok</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">13. Intensitas mengkonsumsi daging</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">14. Intensitas pembelian pakaian baru</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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

                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;"> IV. INDEX RUMAH</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">15. Kepemilikan rumah</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">16. Luas rumah dan lantai</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_16'] == '5'){ ?>
                                      &lt; 12 m<sup>2</sup>
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">17. Dinding rumah</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">18. Lantai</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">19. Atap</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">20. Dapur</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_20'] == '5'){ ?>
                                      Tungku (kayu bakar)
                                      <?php }else if($data['no_20'] == '3'){?>
                                          Kompor minyak / gas 3 kg
                                      <?php }else if($data['no_20'] == '1'){?>
                                          Kompor gas &gt; 3 kg
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">21. Kursi</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">22. Sumber air</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">23. Tempat buang air (MCK)</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_23'] == '5'){ ?>
                                      Tidak ada / Bersama
                                      <?php }else if($data['no_23'] == '1'){?>
                                          Sendiri
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">24. Penerangan</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_24'] == '5'){ ?>
                                      450 Wat
                                      <?php }else if($data['no_24'] == '3'){?>
                                          900 Watt
                                      <?php }else if($data['no_24'] == '1'){?>
                                          &gt; 900 Watt
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">25. Lokasi rumah di</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">26. Jarak tempuh menuju ke Puskesmas</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_26'] == '5'){ ?>
                                      &gt; 7 Km
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

                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;">V. KEPEMILIKAN BARANG</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">27. Kendaraan</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">28. Elektronik</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_28'] == '5'){ ?>
                                      TV
                                      <?php }else if($data['no_28'] == '3'){?>
                                          TV &amp; kulkas
                                      <?php }else if($data['no_28'] == '1'){?>
                                          TV, kulkas &amp; mesin cuci
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">29. Barang berharga yang mudah dijual dengan nilai minimal Rp 500.000</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_29'] == '5'){ ?>
                                      HP
                                      <?php }else if($data['no_29'] == '3'){?>
                                          HP &amp; Emas
                                      <?php }else if($data['no_29'] == '1'){?>
                                          HP, Emas &amp; Motor
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                      </div>
                  </div>

                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;">VI. DATA KELUARGA</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">30. Jumlah tanggungan keluarga</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_30'] == '5'){ ?>
                                      &gt; 5 orang
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">31. Jumlah anak yang sekolah</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">32. Ada yang putus sekolah</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_32'] == '5'){ ?>
                                          Ada
                                      <?php }else if($data['no_32'] == '1'){?>
                                          Tidak ada
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">33. Memiliki BATITTA </div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_33'] == '5'){ ?>
                                          Ya
                                      <?php }else if($data['no_33'] == '1'){?>
                                          Tidak ada
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">34. Ibu atau Istri hamil atau tidak?</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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

                  <br>
                  <div class="row" style="margin-left: -15px; margin-right: -15px;">
                      <div class="col-md-12" style="width: 100%; float: left; padding-left: 15px; padding-right: 15px;">
                          <h5 class="text-left text-bold" style="font-weight:400; text-align: left;">
                              <strong style="font-weight: bold;">VII. INDIKATOR PERILAKU</strong>
                          </h5>

                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">35. Kebiasaan merokok anggota keluarga</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_35'] == '5'){ ?>
                                          Ada
                                      <?php }else if($data['no_35'] == '1'){?>
                                          Tidak
                                      <?php }else{?>
                                          -
                                      <?php }?>
                              </div>
                          </div>
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">36. Kebiasaan patologis pada anggota keluarga (Judi, Miras, Narkoba)</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">37. Pola Sholat pada anggota keluarga</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">38. Rajin mengikuti kajiaN</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">39. Istri dan anak remaja putri mengenakan jilbab</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">40. Jumlah alat sholat yang dimiliki (Mukena/ Sarung, dan Sajadah)</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_40'] == '5'){ ?>
                                      &gt;5
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
                          <div class="d-flex" style="display: flex; margin-bottom: 3px;">
                              <div style="width:320px; flex-shrink: 0;">41. Jumlah Al-Qur’an yang dimiliki</div>
                              <div class="flex-fill text-capitalize" style="flex-grow: 1; text-transform: capitalize; padding-left: 5px;">
                                  = <?php  if($data['no_41'] == '5'){ ?>
                                      &gt;3 bua
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



                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        window.addEventListener("load", window.print());
    </script>
</body>

</html>