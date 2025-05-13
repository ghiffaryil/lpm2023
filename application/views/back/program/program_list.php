<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo base_url('app-assets/') ?>vendors/css/tables/datatable/datatables.min.css">
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
                  <div class="card-body"> 
                    <div class="row"> 
                      <table id="datatable" class="table table-striped table-bordered" width="100%">
                        <thead>
                          <th style="text-align: center">No</th>
                          <th style="text-align: center">Nama Program</th>
                          <th style="text-align: center">Deskripsi</th>
                          <th style="text-align: center">Direktorat</th>
                          <th style="text-align: center">Divisi</th>
                          <th style="text-align: center">Action</th>
                        </thead>  
                        <tbody>
                          <?php $no = 1; foreach ($get_all as $data):
                          ?>
                          <tr>
                            <td style="text-align: center"><?php echo $no++ ?></td>
                            <td style="text-align: left"><?php echo $data->nama_program ?></td>
                            <td style="text-align: left"><?php echo $data->deskripsi ?></td>
                            <td style="text-align: left"><?php echo $data->direktorat ?></td>
                            <td style="text-align: left"><?php echo $data->divisi ?></td>
                            <td style="text-align: center">
                              <a href="<?php echo base_url('program/update/'.$data->id_program) ?>" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                              <!--  <a href="<?php echo base_url('program/delete/'.$data->id_program) ?>" OnClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a> -->
                           </td>
                          </tr>
                          <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
           </section>
          <br><br><br><br>
        </div>
    </div> 
</div>

<?php $this->load->view('back/template/footer'); ?>