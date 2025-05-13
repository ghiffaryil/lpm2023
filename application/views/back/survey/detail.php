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
                        <!-- <div class="content-header"><?php echo $page_title ?></div> -->
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } ?>

                <div class="content-wrapper">
                    <section class="content">

                        <div class="row">
                            <div class="col-lg-4">
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
                            <div class="col-lg-8">
                                <iframe src='https://maps.google.com/maps?q="<?php echo $detail['maps']; ?>"&t=&z=13&ie=UTF8&iwloc=&output=embed' style='width: 100%; height: 212px;' class="img-thumbnail"></iframe>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6">
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
                                    <div class="col-lg-6">
                                        <p class="img-thumbnail text-center">
                                            <canvas id="qrcode"></canvas><br>
                                            <b style="margin-top: -120px;">Scan Maps</b>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">

                                    <div class="panel-body">

                                        <div class="row mt-5">
                                            <div class="col-lg-12">
                                                <h2> <strong> HASIL SURVEY</strong></h2>
                                                <hr>
                                            </div>

                                            <div class="col-lg-4">
                                                <center>
                                                    <address>
                                                        <img src="../assets/esurvey/foto/<?php echo $detail['foto']; ?>" class="img-thumbnail">
                                                    </address>

                                                </center>
                                            </div>

                                            <div class="col-lg-4 ">
                                                <div class=" row small-box bg-aqua " style="background-color: #00c0ef; color:white; padding:5px; padding-left:10px; border-radius: 10px;">
                                                    <div class="col-lg-8">
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
                                                    <div class="col-lg-4">
                                                        <div>
                                                            <svg xmlns="http://www.w3.org/2000/svg" width="90px" height="90px" viewBox="0 0 512 512">
                                                                <path fill="currentColor" d="M439.91 112h-23.82a.09.09 0 0 0-.09.09V416a32 32 0 0 0 32 32a32 32 0 0 0 32-32V152.09A40.09 40.09 0 0 0 439.91 112Z" />
                                                                <path fill="currentColor" d="M384 416V72a40 40 0 0 0-40-40H72a40 40 0 0 0-40 40v352a56 56 0 0 0 56 56h342.85a1.14 1.14 0 0 0 1.15-1.15a1.14 1.14 0 0 0-.85-1.1A64.11 64.11 0 0 1 384 416ZM96 128a16 16 0 0 1 16-16h64a16 16 0 0 1 16 16v64a16 16 0 0 1-16 16h-64a16 16 0 0 1-16-16Zm208 272H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 368h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 400Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 304h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 336Zm0-64H112.45c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 112 240h191.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 272Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 176h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 208Zm0-64h-63.55c-8.61 0-16-6.62-16.43-15.23A16 16 0 0 1 240 112h63.55c8.61 0 16 6.62 16.43 15.23A16 16 0 0 1 304 144Z" />
                                                            </svg>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-lg-4">

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
                                            <div class="col-sm-6 visible-lg">

                                            </div>
                                            <br>

                                            <div class="col-xs-12 col-sm-6 text-right visible-lg">
                                                <button type="button" class="btn btn-secondary" onclick="history.back()">
                                                    <i class="fa fa-angle-left"></i> Kembali
                                                </button>
                                                <a onclick="PopupCenter('print_detail?id=<?php echo $detail['id'] ?>','myPop1',800,800);" href="javascript:void(0);" class="btn btn-warning "><i class="fa fw fa-print"></i> Cetak</a>
                                                <a href="detail_scoring?id=<?php echo $detail['id']; ?>" class="btn btn-primary">
                                                    Lihat Scoring
                                                </a>
                                                <?php if ($detail['approve'] == '0') {
                                                    echo '<button type="button" class="btn btn-success approve"><i class="fa fa-check-circle"></i> Setuju</button>';
                                                } else {
                                                    echo '<button type="button" class="btn btn-danger unapproved"><i class="fa fa-times-circle"></i> Tidak Setuju</button>';
                                                } ?>
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
        var url = 'https://maps.google.com/maps?q="<?php echo $detail['maps']; ?>"&t=&z=13';
        QRCode.toCanvas(document.getElementById("qrcode"), url, function(error) {
            if (error) console.error(error);
        });
    };
</script>
<script src="../assets/esurvey/js/qrcode.min.js"></script>
<script type="text/javascript">
    $(document).delegate('.approve', 'click', function() {
        if (confirm('Apa kamu yakin? Hasil survey akan di setujui !')) {
            var data = new FormData();
            var id = "<?php echo $detail['id']; ?>";
            data.append("id", id);
            $.ajax({
                type: 'POST',
                url: `<?= site_url() ?>Survey/approved`,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    Swal.fire({
                        title: 'Berhasil',
                        text: "Berhasil di setujui",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })

                },
                error: function() {
                    alert('Gagal!', 'Data kamu gagal dihapus.', 'error');
                }
            });
        }
    });

    $(document).delegate('.unapproved', 'click', function() {
        if (confirm('Apa kamu yakin? Hasil survey tidak disetujui !')) {
            var data = new FormData();
            var id = "<?php echo $detail['id']; ?>";
            data.append("id", id);
            $.ajax({
                type: 'POST',
                url: `<?= site_url() ?>Survey/unapproved`,
                data: data,
                cache: false,
                contentType: false,
                processData: false,
                success: function() {
                    Swal.fire({
                        title: 'Berhasil',
                        text: "Berhasil tidak setujui",
                        icon: 'success',
                        showCancelButton: false,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Iya'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload();
                        }
                    })
                },
                error: function() {
                    alert('Gagal!', 'Data kamu gagal dihapus.', 'error');
                }
            });
        }
    });
</script>

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