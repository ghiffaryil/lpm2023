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
					        <th>Jenis Rekomender</th>
							<th>Nama</th>
					        <th>No Telpon</th>					                
					        <th>Status Hubungan</th>
					        <th>Alamat</th>
					        <th width="75px" style="text-align: center">Action</th>
			            </tr>
                    </thead>
                    <tbody>

					<?php $no = 1; foreach($get_all_deleted as $data){
                  // action
                  $restore = '<a href="'.base_url('rekomender/restore/'.$data->id_rekomender).'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
                  $delete = '<a href="'.base_url('rekomender/delete_permanent/'.$data->id_rekomender).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
                ?>
			            <tr>
					        <td><?php echo $no++ ?></td>
					        <td><?php echo $data->jenis_rekomender ?></td>
					        <td><?php echo $data->nama_rekomender ?></td>					                
							<td><?php echo $data->no_telpon ?></td>						                
							<td><?php if (empty($data->status_hubungan)) {
								echo "-";
							}else{
								echo $data->status_hubungan;
							} ?></td>						                
							<td><?php echo $data->alamat_rekomender ?></td>	
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