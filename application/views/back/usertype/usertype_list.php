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
							<div class="card-body">        
					<table id="datatable" class="table table-striped table-bordered nowrap" width="100%">
            <thead>
              <th style="text-align: center">No</th>
              <th style="text-align: center">Usertype Name</th>
              <th style="text-align: center">Action</th>
            </thead>  
            <tbody>
              <?php $no = 1; foreach ($get_all as $data):
              ?>
              <tr>
                <td style="text-align: center"><?php echo $no++ ?></td>
                <td style="text-align: left"><?php echo $data->usertype_name ?></td>
                <td style="text-align: center">
                  <a href="<?php echo base_url('usertype/update/'.$data->id_usertype) ?>" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>
                  <a href="<?php echo base_url('usertype/delete/'.$data->id_usertype) ?>" OnClick="return confirm('Are you sure?');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>
               </td>
              </tr>
              <?php endforeach;?>
            </tbody>
					</table>

	    </section>
          <br><br><br><br>
        </div>
    </div>      
    </div>
</div>

<?php $this->load->view('back/template/footer'); ?>