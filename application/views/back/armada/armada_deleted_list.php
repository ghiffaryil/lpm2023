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
					                <th>Jenis Armada</th>
									<th>Merk</th>
					                <th>No Polisi</th>					                
					                <th>No Rangka</th>
					                <th>No Mesin</th>
					                <th>Tahun</th>
					                <th>Posko Armada</th>
					                <th>Petugas 1</th>
					                <th>Petugas 2</th>
					                <th width="75px" style="text-align: center">Action</th>
			            </tr>
                    </thead>
                    <tbody>
						


					<?php $no = 1; foreach($get_all_deleted as $data){
                  if($data->is_active== '0'){ $is_active = "<button class='btn btn-xs btn-success'><i class='fa fa-check'></i> ADA</button> ";}
                  else{ $is_available = "<button class='btn btn-xs btn-danger'><i class='fa fa-remove'></i> DIPINJAM</button>";}
                  // action
                  $restore = '<a href="'.base_url('armada/restore/'.$data->id_armada).'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
                  $delete = '<a href="'.base_url('armada/delete_permanent/'.$data->id_armada).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
                ?>
			            <tr>
			                <td><?php echo $no++ ?></td>
					                <td><?php echo $data->jenis_armada ?></td>
					                <td><?php echo $data->merk_armada ?></td>					                
									<td><?php echo $data->no_polisi ?></td>						                
									<td><?php echo $data->no_rangka ?></td>						                
									<td><?php echo $data->no_mesin ?></td>						                
									<td><?php echo $data->tahun ?></td>						                
									<td><?php echo $data->lokasi_armada ?></td>						                
									<td><?php echo $data->nama_1 ?></td>
									<td><?php echo $data->nama_2 ?></td>	
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