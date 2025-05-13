<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
        <section class="basic-elements">
          <div class="row">
            <div class="col-sm-12">
              <div class="content-header">Data <?= $header ?></div>
            </div>
          </div>
		  <?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
          <div class="row">
			<div class="col-md-12">
				<div class="card">
					<div class="card-body">  
						<a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Data</a> 
						<hr>
						<table id="datatable" class="table table-striped text-capitalize nowrap" width="100%">
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
								<?php $no = 1; foreach($get_all as $data){
								// action
								$update = '<a href="'.base_url('rekomender/update/'.$data->id_rekomender).'" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i></span></a>';
								$delete = '<a href="'.base_url('rekomender/delete/'.$data->id_rekomender).'" class="btn btn-danger btn-sm" onClick="return confirm(\'Are you sure?\');"><span><i class="fa fa-trash"></i></span></a>';
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
					                <td width="50" style="text-align: center">
					                	<?php echo $update ?> <?php echo $delete ?>
					                </td>
					            </tr>
								<?php } ?>
		                    </tbody>
						</table>
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