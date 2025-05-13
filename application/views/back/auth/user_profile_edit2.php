<?php $this->load->view('back/meta'); ?>
<?php $this->load->view('back/navbar'); ?>
<?php $this->load->view('back/sidebar'); ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1><?php echo $page_title ?></h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#"></a><?php echo $module ?></li>
        <li class="active"><?php echo $page_title ?></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <?php echo validation_errors() ?>
        <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
        <?php echo form_open_multipart($action);?>
          <div class="col-lg-12">
            <!-- Custom Tabs -->
            <div class="nav-tabs-custom">
              <ul class="nav nav-tabs">
                <li class="active"><a href="#personal" data-toggle="tab">Personal</a></li>
                <li><a href="#auth" data-toggle="tab">Auth</a></li>
              </ul>
              <div class="tab-content">
                <div class="tab-pane active" id="personal">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"><label>Name</label>
                        <?php echo form_input($name, $user->name);?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"><label>Phone</label>
                        <?php echo form_input($phone, $user->phone);?>
                      </div>
                    </div>
                  </div>
                  <div class="form-group"><label>Address</label>
                    <?php echo form_textarea($address, $user->address);?>
                  </div>
                  <div class="form-group"><label>Current Photo</label><br>
                    <img src="<?php echo base_url('assets/images/user/'.$user->photo) ?>" width="200px"/>
                  </div>
                  <div class="form-group"><label>Photo</label>
                    <input type="file" class="form-control" name="photo" id="photo" onchange="tampilkanPreview(this,'preview')"/>
                    <br><p><b>Preview Gambar</b><br>
                    <img id="preview" src="" alt="" width="150px"/>
                  </div>
                  <hr>
                  <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                  <button type="submit" name="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
                </div>
                <!-- /.tab-pane -->

                <div class="tab-pane" id="auth">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"><label>Username</label>
                        <?php echo form_input($username, $user->username);?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"><label>Email</label>
                        <?php echo form_input($email, $user->email);?>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group"><label>Password</label>
                        <?php echo form_password($password);?>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group"><label>Password Confirmation</label>
                        <?php echo form_password($password_confirm);?>
                      </div>
                    </div>
                  </div>
                  <hr>
                  <input type="hidden" name="usertype" value="<?php echo $user->usertype ?>">
                  <input type="hidden" name="access" value="<?php echo $user->access ?>">
                  <?php echo form_input($id_users, $user->id_users) ?>
                  <button type="submit" name="submit" class="btn btn-primary"><i class="fa fa-save"></i> <?php echo $btn_submit ?></button>
                  <button type="reset" name="reset" class="btn btn-danger"><i class="fa fa-refresh"></i> <?php echo $btn_reset ?></button>
                </div>
                <!-- /.tab-pane -->
              </div>
              <!-- /.tab-content -->
            </div>
            <!-- nav-tabs-custom -->
          </div>
        <?php echo form_close() ?>
      </div>
    </section>
    <!-- /.content -->
  </div>
<?php $this->load->view('back/template/footer'); ?>

  <!-- iCheck 1.0.1 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/plugins/') ?>icheck/all.css">
  <script src="<?php echo base_url('assets/plugins/') ?>icheck/icheck.min.js"></script>
  <!-- End Wrapper -->
  <script type="text/javascript">
    $(document).ready(function(){
      $('input').iCheck({
        checkboxClass: 'icheckbox_square',
        radioClass: 'iradio_square',
        increaseArea: '20%' // optional
      });
    });

    function tampilkanPreview(photo,idpreview)
    { //membuat objek gambar
      var gb = photo.files;
      //loop untuk merender gambar
      for (var i = 0; i < gb.length; i++)
      { //bikin variabel
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview=document.getElementById(idpreview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType))
        { //jika tipe data sesuai
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
        { //jika tipe data tidak sesuai
          alert("Tipe file tidak sesuai. Gambar harus bertipe .png, .gif atau .jpg.");
        }
      }
    }
  </script>
</div>
