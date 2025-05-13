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
						<?php echo $this->session->userdata('message') <> '' ? $this->session->userdata('message') : ''; ?>
                		<a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Data</a> 
						<hr>        
					<table id="datatable" class="table table-striped table-bordered nowrap" width="100%">
						<thead>
							<tr>
							<th style="text-align: center">No</th>
							<th style="text-align: center">Program</th>
							<th style="text-align: center">Sub Program</th>
							<th style="text-align: center">Action</th>
							</tr>
						</thead>
						<tbody>
						<?php $no = 1; foreach($get_all as $data){
			                  // action
			                  $edit = '<a href="'.base_url('subprogram/update/'.$data->id_subprogram).'" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>';
			                  $delete = '<a href="'.base_url('subprogram/delete/'.$data->id_subprogram).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
			                ?>
			                  <tr>
			                    <td style="text-align: center"><?php echo $no++ ?></td>
			                    <td style="text-align: left"><?php echo $data->nama_program ?></td>
								<td style="text-align: left"><?php echo $data->nama_subprogram ?></td>			                    
			                    <td style="text-align: center"><?php echo $edit ?> <?php echo $delete ?></td>
			                  </tr>
			                <?php } ?>

						</tbody>
					</table>
					
	    </section>
          <br><br><br><br>
        </div>
    </div>      
    </div>
</div>

<?php $this->load->view('back/template/footer'); ?>