<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper">
            <!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header"><?php echo $page_title ?></div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-uppercase">Edit Transaksi Individu</div>
                            </div>
                            <div class="card-content">
                                <?php if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                } ?>
                                <?php echo validation_errors(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <input type="hidden" name="id_individu" value="<?php echo $data->id_individu ?>">
                                            <input type="hidden" name="id_transaksi_individu" value="<?php echo $data->id_transaksi_individu ?>">
                                            <div class="form-body">
                                                <div class="row">

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama Donatur</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" id="nama_donatur" name="nama_donatur" required>
                                                                <option value="" selected disabled>Pilih...</option>
                                                                <?php foreach ($komunitas as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>" <?php if ($data->id_komunitas == $row->id_komunitas) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                                        <?php echo $row->nama_komunitas ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Jumlah Penerima Manfaat</p>
                                                            <div class="input-group">
                                                                <input type="number" id="jumlah_pm" name="jumlah_pm" value="<?= $data->jumlah_pm ?>" class="form-control" aria-describedby="basic-addon3" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3">Orang</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama PIC</p>
                                                            <input type="text" class="form-control text-capitalize" id="nama_pic" name="nama_pic" value="<?= $data->nama_pic ?>">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Lokasi Program</p>
                                                            <input type="text" class="form-control text-capitalize" id="lokasi_program" name="lokasi_program" value="<?= $data->lokasi_program ?>">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Sub Program</p>
                                                            <select class="form-control selectpicker" style="width: 100%" name="id_subprogram" required>
                                                                <option selected disabled>Pilih sub program...</option>
                                                                <?php foreach ($subprogram as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>" <?php if ($data->id_subprogram == $row->id_subprogram) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                                        <?php echo $row->nama_subprogram ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Jenis Bantuan</p>
                                                            <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan" value="<?= $data->jenis_bantuan ?>">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group mb-1">
                                                            <p>Info Bantuan</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                                                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                                                <?php foreach ($rekomender as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>" <?php if ($data->id_rekomender == $row->id_rekomender) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                                        <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Asnaf</p>
                                                            <select class="form-control selectpicker" name="asnaf" required>
                                                                <option value="" selected disabled>Pilih asnaf...</option>
                                                                <option value="Mualaf" <?php if ($data->asnaf == 'Mualaf') {
                                                                                            echo "selected";
                                                                                        } ?>>Mualaf
                                                                </option>
                                                                <option value="Ghorimin" <?php if ($data->asnaf == 'Ghorimin') {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                                    Ghorimin</option>
                                                                <option value="Fisabilillah" <?php if ($data->asnaf == 'Fisabilillah') {
                                                                                                    echo "selected";
                                                                                                } ?>>Fisabilillah</option>
                                                                <option value="Ibnu Sabil" <?php if ($data->asnaf == 'Ibnu Sabil') {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                                    Ibnu Sabil</option>
                                                                <option value="Fakir Miskin" <?php if ($data->asnaf == 'Fakir Miskin') {
                                                                                                    echo "selected";
                                                                                                } ?>>Fakir Miskin</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Sumber Dana</p>
                                                            <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana" value="<?= $data->sumber_dana ?>">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Periode Menerima Manfaat</p>
                                                            <input type="date" class="form-control text-capitalize periode_bantuan " name="periode_bantuan" id="periode_bantuan" value="<?php echo $data->periode_bantuan ?>">
                                                        </fieldset>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Total Periode</p>
                                                            <input type="number" class="form-control text-capitalize periode_bantuan " name="total_periode" id="total_periode" value="<?php echo $data->total_periode ?>">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Jumlah Bantuan</p>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span id="basic-addon1" class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" id="jumlah_bantuan" name="jumlah_bantuan" value="<?php echo $data->jumlah_bantuan ?>" aria-describedby="basic-addon1" class="form-control">
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <hr>


                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- <div class="card-header"> -->
                                                            <br>

                                                            <h5 class="card-header">Data Detail</h5>
                                                            <!-- /.box-tools -->
                                                            <!-- /.box-header -->
                                                            <div class="card-body" style="overflow-x:auto;">
                                                                <div class="form-body">
                                                                </div>
                                                                <table class="table" id="tabelisian">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nama</th>
                                                                            <th>Nik</th>
                                                                            <th>Nama Kepala Keluarga</th>
                                                                            <th>Jenis Kelamin</th>
                                                                            <th>Alamat</th>
                                                                            <th>Kelurahan</th>
                                                                            <th>Kecamatan</th>
                                                                            <th>Kota</th>
                                                                            <th>Provinsi</th>
                                                                            <th>No Telp</th>
                                                                            <th>Pekerjaan</th>
                                                                            <th>Asnaf</th>
                                                                            <th>Sumber Dana</th>
                                                                            <th>Periode Bantuan</th>
                                                                            <!-- <th>Action </th> -->
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <?php foreach ($res_pm as $det) { ?>
                                                                            <tr role="row" id='tr-<?php echo $det->id ?>'>
                                                                                <input type='hidden' value='<?php echo $det->nik_pm ?>' name='Nama[]' />
                                                                                <input type='hidden' value='<?php echo $det->nik_pm ?>' name='unik[]' />
                                                                                <input type='hidden' value='<?php echo $det->nama_pm ?>' name='unama[]' />
                                                                                <th><?php echo $det->nama_pm ?></th>
                                                                                <th><?php echo $det->nik_pm ?></th>
                                                                                <th><?php echo $det->nama_kk ?></th>
                                                                                <th><?php echo $det->jk ?></th>
                                                                                <th><?php echo $det->alamat ?></th>
                                                                                <th><?php echo $det->desa_kelurahan ?></th>
                                                                                <th><?php echo $det->kecamatan_name ?></th>
                                                                                <th><?php echo $det->kota_kab ?></th>
                                                                                <th><?php echo $det->provinsi ?></th>
                                                                                <th><?php echo $det->no_hp ?></th>
                                                                                <th><?php echo $det->pekerjaan ?></th>
                                                                                <th><?php echo $det->asnaf ?></th>
                                                                                <th><?php echo $det->sumber_dana ?></th>
                                                                                <th><?php echo $det->periode_bantuan ?></th>
                                                                                <!-- <th><a class='delete-data' id='<?php echo $det->id ?>'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></th> -->
                                                                            </tr>
                                                                        <?php } ?>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> <?php echo $btn_back ?>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </section>
            <!-- Basic Inputs end -->
        </div>
    </div>
</div>
<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
    $('.rekomendasi_bantuan').on('change', function() {
        if (this.value == 'Dibantu') {
            $('.ditolak').attr('hidden', false);
            $('.Dibantu').attr('hidden', false);
            $('.Disurvey').attr('hidden', true);
            $('.DatangKembali').attr('hidden', true);
            $('.LengkapiBerkas').attr('hidden', true);
            $('.rencana_bantuan').attr('disabled', false);
            $('.mekanisme_bantuan').attr('disabled', false);
        } else if (this.value == 'Disurvey') {
            $('.ditolak').attr('hidden', false);
            $('.Dibantu').attr('hidden', true);
            $('.Disurvey').attr('hidden', false);
            $('.DatangKembali').attr('hidden', true);
            $('.LengkapiBerkas').attr('hidden', true);
            $('.rencana_bantuan').attr('disabled', false);
            $('.mekanisme_bantuan').attr('disabled', false);
        } else if (this.value == 'Datang Kembali') {
            $('.ditolak').attr('hidden', false);
            $('.Dibantu').attr('hidden', true);
            $('.Disurvey').attr('hidden', true);
            $('.DatangKembali').attr('hidden', false);
            $('.LengkapiBerkas').attr('hidden', true);
            $('.rencana_bantuan').attr('disabled', false);
            $('.mekanisme_bantuan').attr('disabled', false);
        } else if (this.value == 'Lengkapi Berkas') {
            $('.ditolak').attr('hidden', false);
            $('.Dibantu').attr('hidden', true);
            $('.Disurvey').attr('hidden', true);
            $('.DatangKembali').attr('hidden', true);
            $('.LengkapiBerkas').attr('hidden', false);
            $('.rencana_bantuan').attr('disabled', false);
            $('.mekanisme_bantuan').attr('disabled', false);
        } else if (this.value == 'Ditolak') {
            $('.ditolak').attr('hidden', true);
            $('.Dibantu').attr('hidden', false);
            $('.Disurvey').attr('hidden', true);
            $('.DatangKembali').attr('hidden', true);
            $('.LengkapiBerkas').attr('hidden', true);
            $('.rencana_bantuan').attr('disabled', true);
            $('.mekanisme_bantuan').attr('disabled', true);
        }
    })

    var counts = 1;
    let jm_pm_lama = $("#jumlah_pm").val();
    $(document).on('change', '#pilih_pm', function(e) {
        var Nik = $('#pilih_pm').val();
        var Nama = $("#pilih_pm option:selected").text();
        console.log(Nik);
        console.log(Nama);
        $('#jumlah_pm').val(parseInt($('#jumlah_pm').val()) + 1);
        tempRow = "<tr id='tr-" + Nik + "'>";
        tempRow += "<input type='hidden' value='" + Nik + "' name='Nama[]'/>";
        tempRow += "<input type='hidden' value='" + Nik + "' name='unik[]'/>";
        tempRow += "<input type='hidden' value='" + Nama + "' name='unama[]'/>";
        // tempRow += "<input type='hidden' value='"+Jenis_bantuan+"' name='ujenisbantuan[]'/>";


        tempRow += "<td>" + Nama + "</td><td>" + Nik + "</td>";
        // tempRow += "<td>"+Komoditas+"</td><td>"+Nama+"</td><td>"+berat+"</td><td>"+Price_brt+"</td>";
        // tempRow += "<td>"+row.stock_awal+"</td><td>"+row.penggunaan+"</td><td>"+row.stock_akhir+"</td><td><input class='form-control input-sm qty-text' type='number' name='req[]' value='0'/></td>";
        tempRow += "<td><a class='delete-data' id='" + Nik +
            "'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></td></tr>";
        // alert(po_tujuan);



        // var qty = $("#txtQTY").val(); //check qty=
        $("#tabelisian tbody").append(tempRow).show('slow', function() {
            //  $('.qty-text:last').val(qty); //override qty
        });
        //reset input text and tempRow
        // $('#det_nik_pm').val('');
        // $('#det_nama_pm').val('');

        tempRow = '';
    })
    //delete row
    $(document).on('click', '.delete-data', function(e) {
        $('#jumlah_pm').val($('#jumlah_pm').val() - 1);
        console.log($('#jumlah_pm').val() - 1)
        var id = $(this).attr('id');
        console.log({
            idya: id
        });
        $('#tr-' + id).remove();
    })
</script>