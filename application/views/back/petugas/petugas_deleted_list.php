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
		  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
          <div class="row">
				<div class="col-md-12">
						<div class="card">
							<div class="card-body">                
                <div class="table-responsive">
					<table id="datatable" class="table table-striped table-bordered nowrap" width="100%">
					<thead>
						<tr>
			                <th width="5px">No</th>
							<th>Patugas 1</th>
							<th>Patugas 2</th>	
							<th>No Telpon</th>				                
					        <th>Status</th>
					        <th width="75px" style="text-align: center">Action</th>
			            </tr>
                    </thead>
                    <tbody>

					<?php $no = 1; foreach($get_all_deleted as $data){
	                  // status active
				      if($data->is_active == '1'){$is_active = '<button class="btn btn-sm btn-success" disabled>ACTIVE</button>';}
				      else{$is_active = '<button class="btn btn-sm btn-danger" disabled>INACTIVE</button>';}
	                  // action
	                  $restore = '<a href="'.base_url('petugas/restore/'.$data->id_petugas).'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
	                  $delete = '<a href="'.base_url('petugas/delete_permanent/'.$data->id_petugas).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
	                ?>
			            <tr>
			                <td><?php echo $no++ ?></td>
					        <td><?php echo $data->nama_1 ?></td>
					        <td><?php echo $data->nama_2 ?></td>					                
							<td><?php echo $data->no_telpon ?></td>
							<td><?php echo $is_active ?></td>	
			                <td align="center"><?php echo $restore ?> <?php echo $delete ?></td>
			            </tr>
						<?php } ?>
                    </tbody>
					</table>
				</div>	

	    </section>
          <br><br><br><br>
        </div>
    </div>      
    </div>
</div>

<?php $this->load->view('back/template/footer'); ?>