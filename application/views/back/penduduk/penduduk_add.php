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
                <div class="card">
                  <div class="card-header">
                    <h4 class="card-title mb-0">Identitas Penerima Manfaat</h4>
                    <br>
                  </div>
                  <div class="card-content">
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors() ?>
                    <div class="px-3">
                      <?php echo form_open_multipart($action,'id="penduduk"');?>
                        <div class="form-body">
                          <div class="row">  

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KTP</p>
                                <?php echo form_input($nik) ?>                                
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Lengkap</p>
                                <?php echo form_input($nama) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KK</p>
                                <?php echo form_input($no_kk) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Kepala Keluarga</p>
                                <?php echo form_input($nama_kk) ?>
                              </fieldset>
                            </div>
                            <div class="col-xl-3 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Tempat Lahir</p>
                                <select class="form-control selectpicker" id="tmpt_lahir"  name="tmpt_lahir">
                                  <option value="">Tidak ada keterangan</option>
                                  <?php foreach($get_all_kabupaten as $row){
                                    echo '<option value="'.$row->kota_kab.'">'.($row->kota_kab).'</option>';
                                  } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-3 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Tanggal Lahir</p>
                                <?php echo form_input($tgl_lahir) ?>
                              </fieldset>
                            </div>


                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jenis Kelamin</p>
                                <?php echo form_dropdown('', $jk_value, '', $jk) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kewarganegaraan</p>
                                <select class="form-control selectpicker" id="kewaranegaraan"  name="kewaranegaraan">
                                  <option value="">Tidak ada keterangan</option>
                                  <?php foreach($get_negara as $row){
                                    echo '<option value="'.$row->nama_negara.'">'.($row->nama_negara).'</option>';
                                  } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Telpon</p>
                                <?php echo form_input($no_hp) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Email</p>
                                <?php echo form_input($email) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Status Pernikahan</p>
                                <?php echo form_dropdown('', $status_perkawinan_value, '', $status_perkawinan) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jumlah Anggota Keluarga</p>
                                <?php echo form_input($jum_individu) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Agama</p>
                                <select class="form-control selectpicker" id="agama"  name="agama">
                                  <option value="">Pilih Agama</option>
                                  <?php foreach($get_agama as $row){
                                    echo '<option value="'.$row->nama_agama.'">'.($row->nama_agama).'</option>';
                                  } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Pendidikan Terakhir</p>
                                <select class="form-control selectpicker" id="pendidikan"  name="pendidikan">
                                  <option value="">Tidak ada keterangan</option>
                                  <option value="SD">SD</option>
                                  <option value="SMP">SMP</option>
                                  <option value="SMA/SMK">SMA/SMK</option>
                                  <option value="D3">D3</option>
                                  <option value="S1">S1</option>
                                  <option value="S2">S2</option>
                                  <option value="S3">S3</option>
                                  <option value="Tidak Sekolah">Tidak Sekolah</option>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Pekerjaan</p>
                                <?php echo form_input($pekerjaan) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Alamat Identitas</h4>
                                <p>Alamat sesuai tanda pengenal, contoh: KTP atau SIM</p>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Alamat Lengkap</p>
                                <textarea id="projectinput8" rows="4" class="form-control" name="alamat"></textarea>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Negara</p>
                                <select class="form-control selectpicker" id="negara"  name="negara">
                                  <option value="">Pilih Negara</option>
                                  <?php foreach($get_negara as $row){
                                    echo '<option value="'.$row->nama_negara.'">'.($row->nama_negara).'</option>';
                                  } ?>
                                </select>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Provinsi</p>
                                <select name="id_provinsi" class="form-control selectpicker" id="province"  name="id_provinsi">
                                  <option>Pilih Provinsi</option>
                                  <?php foreach($get_all_provinsi as $row){
                                    echo '<option value="'.$row->id_provinsi.'">'.($row->provinsi).'</option>';
                                  } ?>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kota/Kabupaten</p>
                                <select class="form-control selectpicker" id="kabupaten" name="id_kota_kab">
                                  <option>Pilih Kabupaten</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kecamatan</p>
                                <select class="form-control selectpicker" id="kecamatan" name="id_kecamatan">
                                  <option >Pilih Kecamatan</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Desa/Kelurahan</p>
                                <select class="form-control selectpicker" id="desa_kelurahan" name="id_desa_kelurahan">
                                <option >Pilih Desa/Kelurahan</option>
                                </select>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Kode Pos</p>
                                <?php echo form_input($kodepos) ?>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Alamat Domisili</h4>
                                <p>Alamat sesuai tempat tinggal saat ini</p>
                              </fieldset>
                            </div>

                            <div class="col-md-6 form-group">
                              <input name="check_domisili" type="checkbox" id="check_domisili" style="cursor: pointer;">
                              <label class="checkbox-label" for="check_domisili">
                                &nbsp; Apakah alamat domisili sama dengan alamat identitas?
                              </label>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Alamat Lengkap</p>
                                <textarea id="alamat_domisili" rows="4" class="form-control" name="alamat_domisili"></textarea>
                              </fieldset>
                            </div>

                            <div class="col-xl-12 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <hr>
                                <h4 class="card-title mb-0">Lampiran</h4>
                                <p>Silahkan sertakan berkas pendudung dibawah ini</p>
                              </fieldset>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                             <fieldset class="form-group">
                                <p>Photo</p>
                                  <p><img id="preview_photo" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo" id="photo" onchange="photoPreview(this,'preview_photo')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Scan KK</p>
                                  <p><img id="preview" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo_kk" id="photo_kk" onchange="photoPreview(this,'preview')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Scan KTP</p>
                                  <p><img id="preview_ktp" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="photo_ktp" id="photo_ktp" onchange="photoPreview(this,'preview_ktp')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>

                          </div>
                          <button type="submit" id="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                          <?php echo $btn_back ?>
                        </div>
                        <br>
                      <?php echo form_close() ?>
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
  $('#submit').on("click", function(e) {
    e.preventDefault();
    var data = new FormData($("#penduduk")[0]);
    $.ajax({
      url         : '<?php echo base_url("penduduk/create_action") ?>',
      type        : 'POST',
      data        : data,
      cache       : false,
      contentType : false,
      processData : false,
      success: function(data) {
        Swal.fire({
          title:"Berhasil!",
          html :"Data kamu telah disimpan.",
          icon :"success",
          showCancelButton: false,
          confirmButtonText: 'Oke',
        }).then((result) => {
          if (result.isConfirmed) {
            window.location.reload();
          }
        }) 
      },
      error: function(data){
        Swal.fire('Oops!','Data gagal disimpan.','error');           
      },
    });
  });
</script>

<script type="text/javascript">
  $(document).ready(function(){
    $('#nik').on('keyup',function(){
      var nik = $(this).val();
      $.ajax({
        type     : "GET",
        url      : "<?= base_url('penduduk/cek_nik/')?>"+nik,
        cache    : false,
        dataType : "JSON",
        success  : function(data){
          Swal.fire({
            title:'Oops!',
            html :'Data dengan nik '+data.nik+' <br> a.n '+data.nama+' telah ada.',
            icon :'error',
            showCancelButton: true,
            confirmButtonText: 'Detail',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location = "<?= base_url('penduduk/view/')?>"+data.nik;
            }else{
              $('#penduduk')[0].reset();
            }
          }) 
        }
      });
      return false;
    });
  });
</script>

<script>
    $('#tgl_lahir').datepicker({
        autoclose: true,
        zIndexOffset: 9999
    });

    function hanyaAngka(evt) {
      var charCode = (evt.which) ? evt.which : event.keyCode
      if (charCode > 31 && (charCode < 48 || charCode > 57))
      return false;
      return true;
    }  

    $('input[name=check_domisili]').on('change', function(){
      if($(this).is(':checked')) {
        $('#alamat_domisili').val('Alamat domisili sama dengan alamat identitas.')
        $('#alamat_domisili').attr('readonly', true)
      } else {
        $('#alamat_domisili').val('')
        $('#alamat_domisili').attr('readonly', false)
      }
    })
    
    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
          else
          {
            //jika tipe data tidak sesuai
            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
          }
      }
    } 

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview_ktp=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview_ktp);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
          else
          {
            //jika tipe data tidak sesuai
            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
          }
      }
    } 

    function photoPreview(photo,idpreview)
    {
      var gb = photo.files;
      for (var i = 0; i < gb.length; i++)
      {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview_photo=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        {
          //jika tipe data sesuai
          preview.file = gbPreview;
          reader.onload = (function(element)
          {
            return function(e)
            {
              element.src = e.target.result;
            };
          })(preview_photo);
          //membaca data URL gambar
          reader.readAsDataURL(gbPreview);
        }
          else
          {
            //jika tipe data tidak sesuai
            alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
          }
      }
    } 

    $(document).ready(function() {
        $("#province").change(function() {
          let id_provinsi =  $("#province").val() 
            $.ajax({
                type: "GET", // Method pengiriman data bisa dengan GET atau POST
                url: `<?= site_url() ?>AjaxApi/getKabupaten?id_provinsi=${id_provinsi}`, // Isi dengan url/path file php yang dituju
                success: function(response) {
                  response = JSON.parse(response)
                  console.log(response)
                    let option = '<option value="">Pilih Kabupaten</option>'
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
                    let option = '<option value="">Pilih Kecamatan</option>'
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
                    let option = '<option value="">Pilih Desa/Kelurahan</option>'
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

    function isCapsLock(e){

        e = (e) ? e : window.event;

        var charCode = false;
        if (e.which) {
            charCode = e.which;
        } else if (e.keyCode) {
            charCode = e.keyCode;
        }

        var shifton = false;
        if (e.shiftKey) {
            shifton = e.shiftKey;
        } else if (e.modifiers) {
            shifton = !!(e.modifiers & 4);
        }

        if (charCode >= 97 && charCode <= 122 && shifton) {
            return true;
        }

        if (charCode >= 65 && charCode <= 90 && !shifton) {
            return true;
        }

        return false;

    }

    document.getElementById("nama").addEventListener("keypress",function(e){
      if(isCapsLock(e)){
          Swal.fire({
            title: 'Perhatian!',
            text : "Tombol Caps Locks Aktif, Silahkan Non-Aktifkan Terlebih Dahulu.",
            icon : 'info',
            confirmButtonText : 'Tutup'
          })
         $('#nama').val("");
      }
    },false);
</script>

