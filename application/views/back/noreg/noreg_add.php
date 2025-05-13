<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar', $header); ?>

<div class="main-panel">
    <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper"><!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header"><?php echo $page_title ?></div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card"><br>
                            <div class="card-content">

                                <div class="col-lg-12">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item">
                                            <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">Individu</a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">Komunitas</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-4">
                                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                            <?php if ($this->session->flashdata('message')) {
                                                echo $this->session->flashdata('message');
                                            } ?>
                                            <?php echo validation_errors(); ?>
                                            <?php echo form_open_multipart($action_individu) ?>
                                            <div class="form-body">
                                                <div class="row">
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama Donatur</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" id="nama_donatur" name="nama_donatur" required>
                                                                <option value="" selected disabled>Pilih...</option>
                                                                <?php foreach ($komunitas as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>">
                                                                        <?php echo $row->nama_komunitas ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <!-- <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama Penerima</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" id="nama_komunitas" name="nama_komunitas" required>
                                                                <option value="" selected disabled>Pilih...</option>
                                                                < ?php foreach ($komunitas as $row) { ?>
                                                                    <option class="text-capitalize" value="< ?php echo $row->id_komunitas ?>">
                                                                        < ?php echo $row->nama_komunitas ?>
                                                                    </option>
                                                                < ?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div> -->

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Jumlah Penerima Manfaat</p>
                                                            <div class="input-group">
                                                                <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control" aria-describedby="basic-addon3" readonly>
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3">Orang</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama PIC</p>
                                                            <input type="text" class="form-control text-capitalize" id="nama_pic" name="nama_pic">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Lokasi Program</p>
                                                            <input type="text" class="form-control text-capitalize" id="lokasi_program" name="lokasi_program">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Sub Program</p>
                                                            <select class="form-control selectpicker" style="width: 100%" name="id_subprogram" required>
                                                                <option selected disabled>Pilih sub program...</option>
                                                                <?php foreach ($subprogram as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                                                        <?php echo $row->nama_subprogram ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Jenis Bantuan</p>
                                                            <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group mb-1">
                                                            <p>Info Bantuan</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan" required>
                                                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                                                <?php foreach ($rekomender as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
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
                                                                <option value="Mualaf">Mualaf</option>
                                                                <option value="Ghorimin">Ghorimin</option>
                                                                <option value="Fisabilillah">Fisabilillah</option>
                                                                <option value="Ibnu Sabil">Ibnu Sabil</option>
                                                                <option value="Fakir Miskin">Fakir Miskin</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Sumber Dana</p>
                                                            <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Periode Menerima Manfaat</p>
                                                            <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan">
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Total Periode</p>
                                                            <!-- <input type="number" class="form-control" name="total_periode" id="total_periode" value="<?php echo (int)$cek_individu + 1 ?>" readonly> -->
                                                            <input type="number" class="form-control" name="total_periode" id="total_periode">
                                                        </fieldset>
                                                    </div>


                                                    <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                        <fieldset class="form-group">
                                                            <p>Jumlah Bantuan</p>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span id="basic-addon1" class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" id="jumlah_bantuan" name="jumlah_bantuan" aria-describedby="basic-addon1" class="form-control">
                                                            </div>
                                                        </fieldset>
                                                    </div>

                                                    <hr>
                                                    <div class="col-md-12">
                                                        <h5 class="card-header">Input PM</h5>

                                                        <!-- /.box-tools -->
                                                        <!-- /.box-header -->
                                                        <div class="card-body">
                                                            <div class="row">
                                                                <div class="col-md-12 mb-1">
                                                                    <div class="row">
                                                                        <div class="col-md-6">
                                                                            <fieldset class="form-group">
                                                                                <p>Pilih Penerima Manfaat</p>
                                                                                <select type="text" class="form-control selectpicker" style="width: 100%" id="pilih_pm" name="pilih_pm">
                                                                                    <option value="" selected disabled>Pilih...</option>
                                                                                    <?php foreach ($konselor as $row) { ?>
                                                                                        <option class="text-capitalize" value="<?php echo $row->nik ?>">
                                                                                            <?php echo $row->nama ?>
                                                                                        </option>
                                                                                    <?php } ?>
                                                                                </select>
                                                                            </fieldset>
                                                                        </div>


                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-12">
                                                        <div class="card">
                                                            <!-- <div class="card-header"> -->

                                                            <h5 class="card-header">Data Detail</h5>
                                                            <!-- /.box-tools -->
                                                            <!-- /.box-header -->
                                                            <div class="card-body">
                                                                <div class="form-body">
                                                                </div>
                                                                <table class="table" id="tabelisian">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>Nama</th>
                                                                            <th>Nik</th>
                                                                            <th>Action </th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="row">
                                                    <div class="col-xl-12 col-lg-12 col-md-12">
                                                        <fieldset class="form-group">
                                                            <?= $btn_submit . ' ' . form_close() . ' ' . $btn_back ?>
                                                        </fieldset>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                            <?php echo form_open_multipart($action_komunitas) ?>
                                            <!-- <input type="hidden" class="form-control text-capitalize" id="id_individu" name="id_individu" value="<?php echo $data->id_individu ?>" readonly> -->
                                            <div class="form-body">
                                                <!-- <div class="row">
                                                    <div class="col-md-12">
                                                        <?php if ($cek_komunitas == 0) { ?>
                                                            <div class="alert alert-success alert-dismissible mb-4" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>Warning!</strong> Nama tersebut merupakan mustahik baru.
                                                            </div>
                                                        <?php } else { ?>
                                                            <div class="alert alert-warning alert-dismissible mb-4" role="alert">
                                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                    <span aria-hidden="true">×</span>
                                                                </button>
                                                                <strong>Warning!</strong> Nama tersebut merupakan mustahik lama, sudah pernah
                                                                mengajukan bantuan pada
                                                                <?php echo date('d-m-Y H:i:s', strtotime($notif_komunitas[0]->created_at)) ?>.
                                                            </div>
                                                        <?php } ?>
                                                    </div>
                                                </div> -->

                                                <div class="row">
                                                    <div class="col-md-6 mb-1">
                                                        <div class="row">
                                                            <!-- <input type="hidden" class="form-control text-capitalize" id="nik" name="nik" value="<?php echo $data->nik ?>" readonly> -->

                                                            <div class="col-md-12">
                                                                <fieldset class="form-group">
                                                                    <p>Nama Donatur</p>
                                                                    <select type="text" class="form-control selectpicker" style="width: 100%" id="nama_donatur_komunitas" name="nama_donatur" required>
                                                                        <option value="" selected disabled>Pilih...</option>
                                                                        <?php foreach ($komunitas as $row) { ?>
                                                                            <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>">
                                                                                <?php echo $row->nama_pemilik ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </fieldset>

                                                                <fieldset class="form-group">
                                                                    <p>Nama Lembaga</p>
                                                                    <select type="text" class="form-control selectpicker" style="width: 100%" id="nama_donatur_komunitas" name="nama_komunitas" required>
                                                                        <option value="" selected disabled>Pilih...</option>
                                                                        <?php foreach ($komunitas as $row) { ?>
                                                                            <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>">
                                                                                <?php echo $row->nama_komunitas ?>
                                                                            </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </fieldset>                                                              
                                                                

                                                            </div>
                                                        </div>

                                                        <fieldset class="form-group">
                                                            <p>Rekomender</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan">
                                                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                                                <?php foreach ($rekomender as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                                                        <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>

                                                        <fieldset class="form-group mb-1">
                                                            <p>Nominal Bantuan</p>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span id="basic-addon1" class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" name="jumlah_bantuan" aria-describedby="basic-addon1" class="form-control">
                                                            </div>
                                                        </fieldset>

                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <p>Periode Menerima Manfaat</p>
                                                                    <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group ditolak">
                                                                    <p>Total Periode</p>
                                                                    <!-- <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="total_periode" id="total_periode" value="<?php echo (int)$cek_komunitas + 1 ?>" readonly> -->
                                                                    <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="total_periode" id="total_periode">
                                                                </fieldset>
                                                            </div>
                                                        </div>

                                                        <fieldset class="form-group">
                                                            <p>Nama PIC</p>
                                                            <input type="text" class="form-control text-capitalize" id="nama_pic" name="nama_pic">
                                                        </fieldset>

                                                    </div>

                                                    <div class="col-md-6">


                                                        <fieldset class="form-group">
                                                            <p>Jumlah Penerima Manfaat</p>
                                                            <div class="input-group">
                                                                <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control" aria-describedby="basic-addon3">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3">Orang</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>

                                                        <fieldset class="form-group" style="margin-top: -15.8px;">
                                                            <p>Asnaf</p>
                                                            <select class="form-control selectpicker" style="width: 100%" name="asnaf" required>
                                                                <option value="" selected disabled>Pilih asnaf...</option>
                                                                <option value="Mualaf">Mualaf</option>
                                                                <option value="Ghorimin">Ghorimin</option>
                                                                <option value="Fisabilillah">Fisabilillah</option>
                                                                <option value="Ibnu Sabil">Ibnu Sabil</option>
                                                                <option value="Fakir Miskin">Fakir Miskin</option>
                                                            </select>
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <p>Sub Program</p>
                                                            <select class="form-control selectpicker" style="width: 100%" name="id_subprogram">
                                                                <option selected disabled>Pilih sub program...</option>
                                                                <?php foreach ($subprogram as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_subprogram ?>">
                                                                        <?php echo $row->nama_subprogram ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <p>Jenis Bantuan</p>
                                                            <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan">
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <p>Sumber Dana</p>
                                                            <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                                                        </fieldset>
                                                        <fieldset class="form-group">
                                                            <p>Lokasi Program</p>
                                                            <input type="text" class="form-control text-capitalize" id="lokasi_program" name="lokasi_program">
                                                        </fieldset>

                                                    </div>



                                                </div>
                                                <?php echo $btn_submit ?> <?php echo $btn_back ?>
                                            </div>
                                            <br>
                                            <?php echo form_close() ?>
                                        </div>

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
    $(document).ready(function() {
        $('#nik').on('change', function() {
            var nik = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('noreg/get_data_penduduk') ?>",
                dataType: "JSON",
                data: {
                    nik: nik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nama) {
                        $('#nama').val(data.nama);
                        $('#id_individu').val(data.id_individu);
                    });
                }
            });
            return false;
        });
    });
    $(document).ready(function() {
        $('#nik_komunitas').on('change', function() {
            var nik = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('noreg/get_data_penduduk') ?>",
                dataType: "JSON",
                data: {
                    nik: nik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nama) {
                        $('#nama_komunitas').val(data.nama);
                        $('#id_individu_komunitas').val(data.id_individu);
                    });
                }
            });
            return false;
        });
    });

    $(document).ready(function() {
        $("#province").change(function() {
            let id_provinsi = $("#province").val()
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                    response = JSON.parse(response)
                    console.log(response)
                    let option = '<option value="">Pilih Kabupaten</option>'
                    for (const row of response) {
                        option += `<option value="${row.id_kota_kab}">${row.kota_kab}</option>`
                    }
                    $('#kabupaten').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
        $("#kabupaten").change(function() {
            let id_kota_kab = $("#kabupaten").val()
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKecamatan?id_kota_kab=${id_kota_kab}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                    response = JSON.parse(response)
                    console.log(response)
                    let option = '<option value="">Pilih Kecamatan</option>'
                    for (const row of response) {
                        option += `<option value="${row.id_kecamatan}">${row.kecamatan_name}</option>`
                    }
                    $('#kecamatan').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
        $("#kecamatan").change(function() {
            let id_kecamatan = $("#kecamatan").val()
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getDesa_kelurahan?id_kecamatan=${id_kecamatan}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                    response = JSON.parse(response)
                    console.log(response)
                    let option = '<option value="">Pilih Desa/Kelurahan</option>'
                    for (const row of response) {
                        option += `<option value="${row.id_desa_kelurahan}">${row.desa_kelurahan}</option>`
                    }
                    $('#desa_kelurahan').html(option);
                },
                error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
                    alert(thrownError); // Munculkan alert error
                }
            });
        });
    });






    var counts = 1;
    $(document).on('change', '#pilih_pm', function(e) {
        var Nik = $('#pilih_pm').val();
        var Nama = $("#pilih_pm option:selected").text();
        console.log(Nik);
        console.log(Nama);
        $('#jumlah_pm').val(counts++);
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

<script>
    $(document).ready(function() {
        $('#nama_donatur_komunitas').change(function() {

            var selectedKomunitasId = $(this).val(); // Get the selected komunitas ID

            // alert(selectedKomunitasId);

            // Perform AJAX request to fetch owner's name
            $.ajax({
                url: '<?php echo base_url('application/controllers/Noreg.php'); ?>',
                type: 'POST',
                data: {
                    komunitas_id: selectedKomunitasId
                },
                dataType: 'json',
                success: function(response) {
                    $('#nama_pemilik_komunitas').val(response.nama_pemilik); // Update input field with owner's name
                },
                error: function(xhr, status, error) {
                    console.error(error);
                }
            });
        });
    });
</script>

</body>

</html>