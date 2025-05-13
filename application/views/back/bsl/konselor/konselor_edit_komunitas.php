<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
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
                <div class="card-title text-uppercase">Edit Transaksi Komunitas</div>
              </div>
              <div class="card-content">
                <?php if ($this->session->flashdata('message')) {
                  echo $this->session->flashdata('message');
                } ?>
                <?php echo validation_errors(); ?>
                <div class="row">
                  <div class="col-md-12">
                    <div class="card-body">
                      <?php echo form_open_multipart($update_action_komunitas) ?>
                      <input type="hidden" name="id_komunitas" value="<?php echo $data->id_komunitas ?>">
                      <input type="hidden" name="id_transaksi_komunitas" value="<?php echo $data->id_transaksi_komunitas ?>">
                      <div class="form-body">
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
                                  <p>Nama Penanggung Jawab</p>
                                  <input type="text" id="nama" name="nama" value="<?php echo $data->nama ?>" class="form-control text-capitalize" aria-describedby="basic-addon4" readonly>
                                </fieldset>
                              </div>
                            </div>

                            <fieldset class="form-group">
                              <p>Nama Lapas</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" id="id_komunitas" name="id_komunitas">
                                <option value="" selected disabled>Pilih nama komunitas...</option>
                                <?php foreach ($komunitas as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>" <?php if ($data->id_komunitas == $row->id_komunitas) {
                                                                                                              echo "selected";
                                                                                                            } ?>>
                                    <?php echo $row->nama_komunitas ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>

                            <fieldset class="form-group">
                              <p>Rekomender</p>
                              <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan">
                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                <?php foreach ($rekomender as $row) { ?>
                                  <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>" <?php if ($data->info_bantuan == $row->id_rekomender) {
                                                                                                              echo "selected";
                                                                                                            } ?>>
                                    <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Jumlah Bantuan</p>
                              <div class="input-group">
                                <div class="input-group-prepend">
                                  <span id="basic-addon1" class="input-group-text">Rp</span>
                                </div>
                                <input type="text" oninput="formatValue('jumlah_permohonan')" id="jumlah_permohonan" name="jumlah_bantuan" value="<?php echo number_format($data->jumlah_bantuan) ?>" aria-describedby="basic-addon1" class="form-control">
                              </div>
                            </fieldset>
                            <div class="row">
                              <div class="col-md-6">
                                <fieldset class="form-group">
                                  <p>Periode Menerima Manfaat</p>
                                  <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan" value="<?php echo $data->periode_bantuan ?>">
                                </fieldset>
                              </div>
                              <div class="col-md-6">
                                <fieldset class="form-group ditolak">
                                  <p>Total Periode</p>
                                  <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="total_periode" id="total_periode" value="<?php echo $data->total_periode ?>" readonly>
                                </fieldset>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-6">
                            <fieldset class="form-group">
                              <p>Jumlah Penerima Manfaat</p>
                              <div class="input-group">
                                <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control" aria-describedby="basic-addon3" value="<?php echo number_format($data->jumlah_pm) ?>">
                                <div class="input-group-append">
                                  <span class="input-group-text" id="basic-addon3">Orang</span>
                                </div>
                              </div>
                            </fieldset>

                            <fieldset class="form-group" style="margin-top: -15.8px;">
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

                            <fieldset class="form-group" hidden>
                              <p>Nama Program</p>
                              <input type="hidden" id="uid" name="uid" value="<?php echo $data->id_program ?>">
                              <input type="hidden" class="form-control text-capitalize" id="id_program" name="id_program" value="<?php echo $data->id_program ?>">
                            </fieldset>

                            <fieldset class="form-group">
                              <p>Sub Program</p>
                              <select class="form-control selectpicker" name="id_subprogram">
                                <option selected disabled>Pilih sub program...</option>
                                <?php foreach ($subprogram as $row) { ?>
                                  <option value="<?php echo $row->id_subprogram ?>" <?php if ($data->id_subprogram == $data->id_subprogram) {
                                                                                      echo "selected";
                                                                                    } ?>>
                                    <?php echo $row->nama_subprogram ?>
                                  </option>
                                <?php } ?>
                              </select>
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Jenis Bantuan</p>
                              <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan" value="<?php echo $data->jenis_bantuan ?>">
                            </fieldset>
                            <fieldset class="form-group">
                              <p>Sumber Dana</p>
                              <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana" value="<?php echo $data->sumber_dana ?>">
                            </fieldset>
                          </div>
                          <div class="col-md-12">
                            <div class="card">

                              <h5 class="card-header">Input Data Warga Binaan</h5>

                              <!-- /.box-tools -->
                              <!-- /.box-header -->
                              <div class="card-body">
                                <div class="row">
                                  <div class="col-md-12 mb-1">
                                    <div class="row">
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Nama Warga Binaan</p>
                                          <input type="text" class="form-control text-capitalize" name="det_nama" id="det_nama" value="">
                                        </fieldset>
                                      </div>
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Jenis Kelamin</p>
                                          <?php echo form_dropdown('', $jk_value, '', $jk) ?>
                                        </fieldset>
                                      </div>
                                    </div>
                                    <div class="row">

                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Jenis Pidana Keterangan</p>
                                          <input type="text" class="form-control text-capitalize" name="det_pidana_keterangan" id="det_pidana_keterangan" value="">
                                        </fieldset>
                                      </div>
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>BLOK/KAMAR</p>
                                          <input type="text" class="form-control text-capitalize" name="det_blok" id="det_blok" value="">
                                        </fieldset>
                                      </div>
                                    </div>
                                    <div class="row">
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Masa Hukuman </p>
                                          <input type="text" class="form-control text-capitalize" id="det_masahukuman" name="det_masahukuman" value="">
                                        </fieldset>
                                      </div>
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Jenis Pidana Pasal </p>
                                          <input type="text" class="form-control text-capitalize" name="det_jenis_pasal" id="det_jenis_pasal">
                                        </fieldset>
                                      </div>
                                      <div class="col-md-6">
                                        <fieldset class="form-group">
                                          <p>Alamat</p>
                                          <textarea type="text" rows="1" class="form-control text-capitalize" id="det_alamat" name="det_alamat"></textarea>
                                        </fieldset>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                              </div>
                              <div class="form-actions">
                                <button type="button" class="btn btn-primary" id="tambahitem">Tambahkan
                                  penerima</button>
                              </div>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="card">
                              <!-- <div class="card-header"> -->
                              <br>

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
                                      <th>Pasal</th>
                                      <th>Pidana</th>
                                      <th>Masa Hukuman</th>
                                      <th>Blok</th>
                                      <th>Action </th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                    <?php foreach ($detail as $det) { ?>

                                      <tr role="row" id='tr-<?php echo $det->id_trans_komunitas_d ?>'>
                                        <input type='hidden' value='<?php echo $det->id_trans_komunitas_d ?>' name='unik[]' />
                                        <input type='hidden' value='<?php echo $det->nama_det ?>' name='unama[]' />
                                        <input type='hidden' value='<?php echo $det->jenispidana_pasal ?>' name='ujenispasal[]' />
                                        <input type='hidden' value='<?php echo $det->jenispidana_keterangan ?>' name='uketerangan[]' />
                                        <input type='hidden' value='<?php echo $det->masahukuman ?>' name='umasahukuman[]' />
                                        <input type='hidden' value='<?php echo $det->blokkamar ?>' name='ublok[]' />";
                                        <!-- <th><?php echo $det->id_trans_komunitas_d ?></th> -->
                                        <th><?php echo $det->nama_det ?></th>
                                        <th><?php echo $det->jenispidana_pasal ?></th>
                                        <th><?php echo $det->jenispidana_keterangan ?></th>
                                        <th><?php echo $det->masahukuman ?></th>
                                        <th><?php echo $det->blokkamar ?></th>
                                        <th><a class='delete-data' id='<?php echo $det->id_trans_komunitas_d ?>'><i class='ft ft-delete' data-toggle='tooltip' title='Hapus'></i></a></th>
                                      </tr>
                                    <?php } ?>
                                  </tbody>
                                </table>
                              </div>
                            </div>
                          </div>
                        </div>
                        <?php echo $btn_submit ?> <?php echo $btn_back ?>
                      </div>
                      <?php echo form_close() ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
</div>
<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript">
  var counts = 1;
  $(document).on('click', '#tambahitem', function(e) {
    var nik = $('#det_ktp').val();
    var Nama = $('#det_nama').val();
    var JenisPasal = $('#det_jenis_pasal').val();
    var PidanaKeterangan = $('#det_pidana_keterangan').val();
    var Masahukuman = $('#det_masahukuman').val();
    var Blok = $('#det_blok').val();
    $('#jumlah_pm').val(counts++);
    console.log(nik);
    tempRow = "<tr id='tr-" + Nama + "'>";
    tempRow += "<input type='hidden' value='" + Nama + "' name='Nama[]'/>";
    tempRow += "<input type='hidden' value='" + Nama + "' name='unama[]'/>";
    tempRow += "<input type='hidden' value='" + JenisPasal + "' name='ujenispasal[]'/>";
    tempRow += "<input type='hidden' value='" + PidanaKeterangan + "' name='uketerangan[]'/>";
    tempRow += "<input type='hidden' value='" + Masahukuman + "' name='umasahukuman[]'/>";
    tempRow += "<input type='hidden' value='" + Blok + "' name='ublok[]'/>";
    // tempRow += "<input type='hidden' value='"+Jenis_bantuan+"' name='ujenisbantuan[]'/>";


    tempRow += "<td>" + Nama + "</td><td>" + JenisPasal + "</td><td>" + PidanaKeterangan + "</td><td>" +
      Masahukuman + "</td><td>" + Blok + "</td>";
    // tempRow += "<td>"+Komoditas+"</td><td>"+Nama+"</td><td>"+berat+"</td><td>"+Price_brt+"</td>";
    // tempRow += "<td>"+row.stock_awal+"</td><td>"+row.penggunaan+"</td><td>"+row.stock_akhir+"</td><td><input class='form-control input-sm qty-text' type='number' name='req[]' value='0'/></td>";
    tempRow += "<td><a class='delete-data' id='" + Nama +
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
    $('#jk').val('');
    $('#det_alamat').val('');
    // $('#det_jenis_bantuan').val('');

    tempRow = '';
  })
  //delete row
  $(document).on('click', '.delete-data', function(e) {
    var id = $(this).attr('id');
    $('#tr-' + id).remove();
  })
</script>