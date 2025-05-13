<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<div class="main-panel">
<!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper">
        <section class="basic-elements">
          <div class="row">
            <div class="col-sm-12">
              <div class="content-header"><?php echo $page_title ?></div>
            </div>
          </div>
          <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                  </div>
                  <div class="card-content">
                    <div class="px-3">
                    <?php echo validation_errors() ?>
                    <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                    <?php echo form_open_multipart($action);?>
                      <form class="form">
                        <div class="form-body">
                          <div class="row">
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Nama</small></p>
                                <?php echo form_input($company_name, $company->company_name);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Deskripsi</small></p>
                                <?php echo form_textarea($company_desc, $company->company_desc);?>                              
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">No Telp Office</small></p>
                                <?php echo form_input($company_phone, $company->company_phone);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Mobil Phone</small></p>
                                <?php echo form_input($company_phone2, $company->company_phone2);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">No Fax</small></p>
                                <?php echo form_input($company_fax, $company->company_fax);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Office Email</small></p>
                                <?php echo form_input($company_email, $company->company_email);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Gmail</small></p>
                                <?php echo form_input($company_gmail, $company->company_gmail);?>

                              </fieldset>
                            </div>
                            <div class="col-xl-4 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Gmail Password</small></p>
                                <?php echo form_password($new_company_gmail_pass);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-12 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Alamat</small></p>
                                <?php echo form_textarea($company_address, $company->company_address);?>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Logo</small></p>
                                <img src="<?php echo base_url('assets/images/company/'.$company->company_photo_thumb.'') ?>"/>
                              </fieldset>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <fieldset class="form-group">
                                <p><small class="text-muted">Logo Pengganti</small></p>
                                <input type="file" class="form-control" name="photo" id="photo" onchange="photoPreview(this,'preview')"/>
                                <br><br><br>
                                <img id="preview" src="" alt="" width="250px"/>
                              </fieldset>
                            </div>
                            <?php echo form_input($id_company,$company->id_company);?>
                            <div class="col-xl-6 col-lg-6 col-md-12 mb-1">
                              <button type="submit" name="submit" class="btn btn-success"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                              <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-undo-alt"></i> <?php echo $btn_reset ?></button>
                            </div>
                          </div>
                        </div>
                      <?php echo form_close(); ?>
                    </div>
                  </div>
                </div>
              </div>
	        </section>
          <br><br><br><br>
        </div>
    </div>  
      
    </div>
</div>
<script type="text/javascript">
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
	  </script>

<?php $this->load->view('back/template/footer'); ?>

















