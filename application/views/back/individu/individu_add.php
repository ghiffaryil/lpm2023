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
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo validation_errors(); ?>
                    <div class="px-3">
                      <?php echo form_open_multipart($action,'id="individu"');?>
                        <div class="form-body">
                          <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>No KTP</p>
                                <select class="form-control selectpicker" id="nik" name="nik" required>
                                  <option value="" selected>Pilih penerima manfaat</option>
                                  <?php foreach($get_penduduk as $row){
                                    echo '<option class="text-capitalize" value="'.$row->nik.'">'.($row->nik).' - '.($row->nama).'</option>';
                                  }?>
                                </select>
                              </fieldset>
                            </div>
                          </div>
                          <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Nama Lengkap</p>
                                <input type="text" class="form-control text-capitalize" id="nama" name="nama" readonly>
                              </fieldset>
                            </div>

                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Jumlah Penghasilan</p>
                                <input type="text" class="form-control" id="jumlah_penghasilan" data-type="currency" name="jumlah_penghasilan">
                              </fieldset>
                            </div>

                            <div class="col-lg-12 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Profil Individu</p>
                                <textarea type="text" class="form-control" rows="4" id="profil_individu" name="profil_individu" required></textarea>
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
                                <p>Lampiran 1</p>
                                  <p><img id="preview" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_1" id="lamp_1" onchange="photoPreview(this,'preview')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                             <fieldset class="form-group">
                                <p>Lampiran 2</p>
                                  <p><img id="preview2" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>
                                
                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_2" id="lamp_2" onchange="photoPreview(this,'preview2')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p>Lampiran 3</p>
                                  <p><img id="preview3" src="<?= base_url('app-assets/img/bg.png')?>" width="100%"/></p>

                                <div class="custom-file">
                                  <input type="file" class="custom-file-input" name="lamp_3" id="lamp_3" onchange="photoPreview(this,'preview3')">
                                  <small class="help-block">Maximum file size is 2Mb</small>
                                  <label class="custom-file-label" for="inputGroupFile01">Pilih File</label>  
                                </div>
                              </fieldset>
                            </div>

                          </div>
                          <button type="submit" name="button" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                          <button type="reset" name="button" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
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
  $('#individu').submit(function(e) {
    e.preventDefault();
    var data = new FormData($("#individu")[0]);
    $.ajax({
      url         : '<?php echo base_url("individu/create_action") ?>',
      type        : 'post',
      data        : data,
      cache       : false,
      contentType : false,
      processData : false,
      success: function(data) {
        if (data === 'exist') {
          Swal.fire({
            title:"Oops!",
            html :"Data already exists.",
            icon :"error",
            showCancelButton: false,
            confirmButtonText: 'Oke',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })  
        }else{
          Swal.fire({
            title:"Yeah!",
            html :"Your data has been saved.",
            icon :"success",
            showCancelButton: false,
            confirmButtonText: 'Oke',
          }).then((result) => {
            if (result.isConfirmed) {
              window.location.reload();
            }
          })   
        }     
      },
      error: function(data){
        Swal.fire('Oops!','Data failed to save.','error');
      },
    });
  });
</script>

<script>

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
        var preview3=document.getElementById(idpreview);
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
          })(preview3);
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
        var preview2=document.getElementById(idpreview);
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
          })(preview2);
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
</script>

<script type="text/javascript">
    $(document).ready(function(){
       $('#nik').on('change',function(){
                var nik = $(this).val();
                $.ajax({
                    type : "GET",
                    url  : "<?= base_url('individu/get_data_penduduk')?>",
                    dataType : "JSON",
                    data : {nik: nik},
                    cache:false,
                    success: function(data){
                        $.each(data,function(nama){
                            $('#nama').val(data.nama);    
                            $('#jumlah_penghasilan').val(data.jumlah_penghasilan);                              
                            $('#profil_individu').val(data.profil_individu);                  
                        });
                        
                    }
                });
                return false;
           });

    });
  </script>
</body>
</html>
