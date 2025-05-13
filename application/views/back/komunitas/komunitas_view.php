<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
        <!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper"><!-- Basic Elements start -->
          <section class="content">
            <div class="row">
                <div class="col-sm-12">
                  <div class="content-header text-capitalize"><?php echo $page_title." ".$komunitas->nama ?> </div>
                </div>
            </div>
            <div class="row match-height">
              <div class="col-md-4">
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                  <?php if (empty($komunitas->photo)) {?>
                      <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>
                  <?php }else{?>
                    <div class="container-image">
                      <img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$komunitas->photo) ?>" width="100%"/>
                      <div class="middle">
                        <div class="lihat">
                          <a href="<?php echo base_url('assets/photo/'.$komunitas->photo) ?>" class="btn btn-success" target="_blank">Lihat</a>
                        </div>
                      </div>
                    </div>  
                  <?php }?>
              </div>  <br>
              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item text-center text-uppercase bg-name">
                  <?php echo $komunitas->nama ?>
                </li>
                <li class="list-group-item">
                  <b>ID </b> <span class="float-right"><?php echo $komunitas->id_komunitas ?></span>
                </li>
                <li class="list-group-item">
                  <b>No KTP</b> <span class="float-right"><?php echo $komunitas->nik ?></span>
                </li>
                <li class="list-group-item">
                  <b>No KK</b> <span class="float-right"><?php echo $komunitas->no_kk ?></span>
                </li>
                <li class="list-group-item">
                  <b>Tgl Daftar</b> <span class="float-right"><?php echo date('d-m-Y', strtotime($komunitas->created_at)) ?></span>
                </li>
              </ul>
            </div>
          </div>
        </div>
              <div class="col-md-8">
          <div class="card">
            <div class="card-header p-2" style="background-color: #EFEFEF">
              <ul class="nav nav-pills">
                <li class="nav-item">
                  <a class="nav-link active" href="#identitas" data-toggle="tab">Identitas</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#alamat" data-toggle="tab">Alamat</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#kontak" data-toggle="tab">Kontak</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#lampiran" data-toggle="tab">Lampiran</a>
                </li>
              </ul>
            </div>
            <div class="card-body">
              <div class="tab-content">
                <div class="tab-pane active text-capitalize" id="identitas">
                  <ul class="list-group list-group-unbordered mb-3 table-hover">
                    <li class="list-group-item">
                      <b>Tempat Lahir</b> <span class="float-right"><?php echo $komunitas->tmpt_lahir ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Tgl. Lahir</b> <span class="float-right"><?php echo date('d-m-Y', strtotime($komunitas->tgl_lahir)) ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Pendidikan</b> <span class="float-right"><?php echo $komunitas->pendidikan ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Status Perkawinan</b> <span class="float-right"><?php echo $komunitas->status_perkawinan ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Jumlah Keluarga</b> <span class="float-right"><?php echo $komunitas->jum_individu ?> Orang</span>
                    </li>
                    <li class="list-group-item">
                      <b>Kepala Keluarga</b> <span class="float-right"><?php echo $komunitas->nama_kk ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Jenis Kelamin</b> <span class="float-right"><?php if ($komunitas->jk == 'L') {echo "Laki-laki";}else{echo "Perempuan";} ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Agama</b> <a class="float-right"><?php echo $komunitas->agama ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Pekerjaan</b> <span class="float-right"><?php echo $komunitas->pekerjaan ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Kewarganegaraan</b> <span class="float-right"><?php echo $komunitas->kewaranegaraan ?></span>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane" id="kontak">
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Telpon</b> <a href="tel:<?php echo $komunitas->no_hp ?>" class="float-right"><?php echo $komunitas->no_hp ?></a>
                    </li>
                    <li class="list-group-item">
                      <b>Email</b> <a href="mailto:<?php echo $komunitas->email ?>" class="float-right text-lowcase"><?php echo $komunitas->email ?></a>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane text-capitalize" id="alamat">
                  <p><h4>Alamat Identitas</h4></p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Alamat</b> <span class="float-right"><?php echo $komunitas->alamat ?></span>
                    </li>
                    <li class="list-group-item">
                      <b>Kelurahan</b>
                      <span class="float-right">
                        <?php foreach($get_all_kelurahan as $row){
                          if($komunitas->id_desa_kelurahan == $row->id_desa_kelurahan){
                                              echo $row->desa_kelurahan;
                                            }
                                        } ?>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <b>Kecamatan</b>
                      <span class="float-right">
                        <?php foreach($get_all_kecamatan as $row){
                          if($komunitas->id_kecamatan == $row->id_kecamatan){
                                              echo $row->kecamatan_name;
                                            }
                                        } ?>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <b>Kab/Kota</b>
                      <span class="float-right">
                        <?php foreach($get_all_kabupaten as $row){
                          if($komunitas->id_kota_kab == $row->id_kota_kab){
                                              echo $row->kota_kab;
                                            }
                                        } ?>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <b>Provinsi</b>
                      <span class="float-right">
                        <?php foreach($get_all_provinsi as $row){
                          if($komunitas->id_provinsi == $row->id_provinsi){
                                              echo $row->provinsi;
                                            }
                                        } ?>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <b>Negara</b>
                      <span class="float-right">
                        <?php echo $komunitas->negara; ?>
                      </span>
                    </li>
                    <li class="list-group-item">
                      <b>Kode Pos</b>
                      <span class="float-right">
                        <?php echo $komunitas->kodepos; ?>
                      </span>
                    </li>
                  </ul>
                  <p><h4>Alamat Domisili</h4></p>
                  <ul class="list-group list-group-unbordered mb-3">
                    <li class="list-group-item">
                      <b>Alamat</b> <span class="float-right">
                        <?php if (empty($komunitas->alamat_domisili)) {
                          echo "Alamat domisili sama dengan alamat identitas.";
                        }else{
                          echo $komunitas->alamat_domisili;
                        }?></span>
                    </li>
                  </ul>
                </div>
                <div class="tab-pane" id="lampiran">
                  <div class="row">                 
                                  <div class="col-xl-6 col-lg-6 col-md-6">
                                      <p>Scan KTP </p>
                                      <?php if (empty($komunitas->photo_ktp)) {?>
                        <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>
                      <?php }else{?>
                        <div class="container-image">
                          <img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$komunitas->photo_ktp) ?>" width="100%"/>
                            <div class="middle">
                              <div class="lihat">
                              <a href="<?php echo base_url('assets/photo/'.$komunitas->photo_ktp) ?>" class="btn btn-success" target="_blank">Lihat</a>
                              <a href="<?php echo base_url('assets/photo/'.$komunitas->photo_ktp) ?>" class="btn btn-success" target="_blank" download>Download</a>
                              </div>
                            </div>
                        </div>  
                      <?php }?>
                                  </div>
                    <div class="col-xl-6 col-lg-6 col-md-6">
                                      <p>Scan KK </p> 
                                      <?php if (empty($komunitas->photo_kk)) {?>
                        <img class="img-fluid image" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/>
                      <?php }else{?>
                        <div class="container-image">
                          <img class="img-fluid image" src="<?php echo base_url('assets/photo/'.$komunitas->photo_kk) ?>" width="100%"/>
                          <div class="middle">
                              <div class="lihat">
                                <a href="<?php echo base_url('assets/photo/'.$komunitas->photo_kk) ?>" class="btn btn-success" target="_blank">Lihat</a>
                                <a href="<?php echo base_url('assets/photo/'.$komunitas->photo_kk) ?>" class="btn btn-success" target="_blank" download>Download</a>
                              </div>
                          </div>
                        </div>  
                      <?php }?>                     
                    </div>
                                </div>
                </div>
              </div>
            </div>
            <div class="card-footer">
              <button class="btn btn-success" onclick="history.back()">Kembali</button>
            </div>
          </div>          
        </div>

          </section>
        </div>
    </div>
</div>

<!-- Datatables -->
<script src="<?php echo base_url('assets/template/backend/') ?>js/plugin/datatables/datatables.min.js"></script>
<script src="<?php echo base_url('app-assets/js/data-tables/') ?>datatable-basic.js"></script>

<!-- Select2 -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2.min.css"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>select2/dist/css/select2-flat-theme.min.css"></script>
<script src="<?php echo base_url('assets/plugins/') ?>select2/dist/js/select2.full.min.js"></script>

<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css"></script>
<script src="<?php echo base_url('assets/plugins/') ?>bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>


<script>
    $(document).ready(function() {
        $("#province").change(function() {
          let id_provinsi =  $("#province").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">-Pilih Kabupaten-</option>'
                    for(const row of response){
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
          let id_kota_kab =  $("#kabupaten").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKecamatan?id_kota_kab=${id_kota_kab}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">-Pilih Kecamatan-</option>'
                    for(const row of response){
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
          let id_kecamatan =  $("#kecamatan").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getDesa_kelurahan?id_kecamatan=${id_kecamatan}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">-Pilih Desa/Kelurahan-</option>'
                    for(const row of response){
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


<?php $this->load->view('back/template/footer'); ?>