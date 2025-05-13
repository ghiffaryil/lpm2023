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
						


					<?php $no = 1; foreach($get_all_deleted as $data){
                  // action
                  $restore = '<a href="'.base_url('subprogram/restore/'.$data->id_subprogram ).'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
                  $delete = '<a href="'.base_url('subprogram/delete_permanent/'.$data->id_subprogram ).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
                ?>
			            <tr>
			                <td style="text-align: center"><?php echo $no++ ?></td>
			                <td style="text-align: left"><?php echo $data->nama_program ?></td>
			                <td style="text-align: center"><?php echo $data->nama_subprogram ?></td>
			                <td style="text-align: center"><?php echo $restore ?> <?php echo $delete ?></td>
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

















