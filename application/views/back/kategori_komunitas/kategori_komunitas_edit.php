<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

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
                                <?php if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                } ?>
                                <?php echo validation_errors(); ?>
                                <div class="px-3">
                                    <?php echo form_open_multipart($action) ?>
                                    <?php echo form_input($id_kategori_komunitas, $kategori_komunitas->id_kategori_komunitas) ?>
                                    <div class="form-body">
                                        <div class="row">



                                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                                                <fieldset class="form-group">
                                                    <p>Nama Kategori Komunitas</p>
                                                    <?php echo form_input($nama_kategori_komunitas, $kategori_komunitas->nama_kategori_komunitas) ?>
                                                </fieldset>

                                                <fieldset class="form-group">
                                                    <p>Is Aktif</p>
                                                    <select class="form-control" id="is_aktif" name="is_aktif">
                                                        <?php foreach ($is_aktif as $row) {
                                                            if ($kategori_komunitas->is_aktif == $row->id) {
                                                                echo '<option value="' . $row->id . '" selected >' . ($row->nama) . '</option>';
                                                            } else {
                                                                echo '<option value="' . $row->id . '" >' . ($row->nama) . '</option>';
                                                            }
                                                        } ?>
                                                    </select>
                                                </fieldset>
                                            </div>


                                        </div>
                                        <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?= $btn_submit ?></button>
                                        <?php echo form_close() ?>
                                        <button type="button" onclick="history.back()" class="btn btn-success"><?= $btn_back ?></button>
                                    </div>
                                    <br>
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

<script>
    function hanyaAngka(evt) {
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
</script>
<script>
    function photoPreview(photo, idpreview) {
        var gb = photo.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }

    function photoPreview(photo, idpreview) {
        var gb = photo.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview3 = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview3);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }

    function photoPreview(photo, idpreview) {
        var gb = photo.files;
        for (var i = 0; i < gb.length; i++) {
            var gbPreview = gb[i];
            var imageType = /image.*/;
            var preview2 = document.getElementById(idpreview);
            var reader = new FileReader();
            if (gbPreview.type.match(imageType)) {
                //jika tipe data sesuai
                preview.file = gbPreview;
                reader.onload = (function(element) {
                    return function(e) {
                        element.src = e.target.result;
                    };
                })(preview2);
                //membaca data URL gambar
                reader.readAsDataURL(gbPreview);
            } else {
                //jika tipe data tidak sesuai
                alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
            }
        }
    }
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#nik').on('change', function() {
            var nik = $(this).val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('komunitas/get_data_penduduk') ?>",
                dataType: "JSON",
                data: {
                    nik: nik
                },
                cache: false,
                success: function(data) {
                    $.each(data, function(nama) {
                        $('#nama').val(data.nama);
                    });
                }
            });
            return false;
        });
    });
</script>

<script type="text/javascript">
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
</script>
</body>

</html>