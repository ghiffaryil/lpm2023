<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar', $header); ?>

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
            <div class="card"><br>
              <div class="card-content">
                <?php if ($this->session->flashdata('message')) {
                  echo $this->session->flashdata('message');
                } ?>
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <!-- <ul class="nav nav-tabs">
                        <li class="nav-item">
                          <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1"
                            aria-expanded="true">Individu</a>
                        </li>
                      </ul> -->
                      <div class="tab-content mt-4">
                        <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                          <?php echo form_open_multipart($action_individu) ?>
                          <input type="hidden" class="form-control text-capitalize" id="id_individu" name="id_individu" value="<?php echo $data->id_individu ?>" readonly>
                          <div class="form-body">
                            <div class="row">
                              <div class="col-md-12">
                                <?php if ($cek_individu == 0) { ?>
                                  <div class="alert alert-success alert-dismissible mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Warning!</strong> Nama tersebut merupakan mustahik baru.
                                  </div>
                                <?php } else { ?>
                                  <div class="alert alert-danger alert-dismissible mb-4" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                      <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>Warning!</strong> Nama tersebut merupakan mustahik lama, sudah pernah
                                    mengajukan bantuan pada
                                    <?php echo date('d-m-Y H:i:s', strtotime($notif_individu[0]->created_at)) ?>.
                                  </div>
                                <?php } ?>
                              </div>
                            </div>
                            <div class="row">
                              <div class="col-md-6 mb-2">
                                <div class="row">
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>No KTP</p>
                                      <input type="text" class="form-control text-capitalize" id="nik" name="nik" value="<?php echo $data->nik ?>" readonly>
                                    </fieldset>
                                  </div>
                                  <div class="col-md-6">
                                    <fieldset class="form-group">
                                      <p>Nama</p>
                                      <input type="text" id="nama" name="nama" value="<?php echo $data->nama ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                    </fieldset>
                                  </div>
                                </div>
                                <fieldset class="form-group">
                                  <p>Info Bantuan</p>
                                  <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan">
                                    <option value="" selected disabled>Pilih nama rekomender...</option>
                                    <?php foreach ($rekomender as $row) { ?>
                                      <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>">
                                        <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                      </option>
                                    <?php } ?>
                                  </select>
                                </fieldset>

                                <fieldset class="form-group" hidden>
                                  <p>Sifat Bantuan</p>
                                  <input type="text" class="form-control" name="sifat_bantuan" <?php if ($cek_individu == 0) {
                                                                                                  echo "value='Baru'";
                                                                                                } else {
                                                                                                  echo "value='Lama'";
                                                                                                } ?> readonly>
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Sumber Dana</p>
                                  <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana">
                                </fieldset>
                                <fieldset class="form-group">
                                  <p>Penyalur</p>
                                  <input type="text" class="form-control text-capitalize" id="penyalur" name="penyalur">
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
                                      <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="total_periode" id="total_periode" value="<?php echo (int)$cek_individu + 1 ?>" readonly>
                                    </fieldset>
                                  </div>
                                </div>

                              </div>

                              <div class="col-md-6">

                                <fieldset class="form-group mb-1">
                                  <p>Jumlah Bantuan</p>
                                  <div class="input-group">
                                    <div class="input-group-prepend">
                                      <span id="jumlah_bantuan" class="input-group-text">Rp</span>
                                    </div>
                                    <input type="text" oninput="formatValue('jumlah_bantuan')" id="jumlah_bantuan" name="jumlah_bantuan" value="0" aria-describedby="jumlah_bantuan" class="form-control">
                                  </div>
                                </fieldset>

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

                                <fieldset class="form-group" hidden>
                                  <p>Nama Program</p>
                                  <input type="text" class="form-control text-capitalize" value="<?php echo $program->nama_program ?>" readonly>
                                  <input type="hidden" class="form-control text-capitalize" id="id_program" name="id_program" value="<?php echo $program->id_program ?>">
                                </fieldset>

                                <fieldset class="form-group">
                                  <p>Sub Program</p>
                                  <select class="form-control selectpicker" name="id_subprogram" id="id_subprogram">
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
                                <fieldset class="form-group" id="fieldsetKasus" style="display:none">
                                  <p>Nama Sekolah</p>
                                  <input type="text" class="form-control text-capitalize" id="kasus" name="kasus">
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
  $("#det_ktp").change(function() {
    var ambilnama = $("#peng-" + this.value).data('nama');
    $("#det_nama").val(ambilnama);
  });
  $(document).on('click', '#tambahitem', function(e) {
    var nik = $('#det_ktp').val();
    var Nama = $('#det_nama').val();
    var JenisPasal = $('#det_jenis_pasal').val();
    var PidanaKeterangan = $('#det_pidana_keterangan').val();
    var Masahukuman = $('#det_masahukuman').val();
    var Blok = $('#det_blok').val();

    console.log(nik);
    // var status_pengeriman = $('#id').val();

    tempRow = "<tr id='tr-" + nik + "'>";
    tempRow += "<input type='hidden' value='" + nik + "' name='unik[]'/>";
    // tempRow += "<input type='hidden' value='"+id+"' name='item_id[]'/>";
    // tempRow += "<input type='hidden' value='"+pengiriman+"' name='pengiriman[]'/>";
    tempRow += "<input type='hidden' value='" + Nama + "' name='unama[]'/>";
    tempRow += "<input type='hidden' value='" + JenisPasal + "' name='ujenispasal[]'/>";
    tempRow += "<input type='hidden' value='" + PidanaKeterangan + "' name='uketerangan[]'/>";
    tempRow += "<input type='hidden' value='" + Masahukuman + "' name='umasahukuman[]'/>";
    tempRow += "<input type='hidden' value='" + Blok + "' name='ublok[]'/>";


    tempRow += "<td>" + nik + "</td><td>" + Nama + "</td><td>" + JenisPasal + "</td>";
    // tempRow += "<td>"+Komoditas+"</td><td>"+Nama+"</td><td>"+berat+"</td><td>"+Price_brt+"</td>";
    // tempRow += "<td>"+row.stock_awal+"</td><td>"+row.penggunaan+"</td><td>"+row.stock_akhir+"</td><td><input class='form-control input-sm qty-text' type='number' name='req[]' value='0'/></td>";
    tempRow += "<td><a class='delete-data' id='" + nik +
      "'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></td></tr>";
    // alert(po_tujuan);



    // var qty = $("#txtQTY").val(); //check qty=
    $("#tabelisian tbody").append(tempRow).show('slow', function() {
      //  $('.qty-text:last').val(qty); //override qty
    });
    //reset input text and tempRow
    $('#det_ktp').val('');
    $('#det_nama').val('');
    $('#det_jenis_pasal').val('');
    $('#det_pidana_keterangan').val('');
    $('#det_masahukuman').val('');
    $('#det_blok').val('');

    tempRow = '';
  })
  //delete row
  $(document).on('click', '.delete-data', function(e) {
    var id = $(this).attr('id');
    $('#tr-' + id).remove();
  })

  $("#id_subprogram").change(function() {

    if (this.value == 5) {
      document.getElementById("fieldsetKasus").style.display = "block"
    } else {
      document.getElementById("fieldsetKasus").style.display = "none"
    }
  });
</script>