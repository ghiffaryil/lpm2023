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
			                <th style="text-align: center">Tanggal</th>
					        <th style="text-align: center">NIK</th>
					        <th style="text-align: center">Nama</th>					                
					        <th style="text-align: center">Desa/Kelurahan</th>
							<th style="text-align: center">Penghasilan</th>
							<th style="text-align: center">Profil</th>
					        <th width="75px" style="text-align: center">Aksi</th>
			            </tr>
                    </thead>
                    <tbody>
						


					<?php $no = 1; foreach($get_all_deleted as $data){
                  if($data->is_active== '0'){ $is_active = "<button class='btn btn-xs btn-success'><i class='fa fa-check'></i> ADA</button> ";}
                  else{ $is_available = "<button class='btn btn-xs btn-danger'><i class='fa fa-remove'></i> DIPINJAM</button>";}
                  // action
                  $restore = '<a href="'.base_url('individu/restore/'.$data->id_individu).'" class="btn btn-sm btn-warning"><i class="fa fa-refresh"></i></a>';
                  $delete = '<a href="'.base_url('individu/delete_permanent/'.$data->id_individu).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-remove"></i></a>';
                ?>
			            <tr>
			                <td align="center"><?php echo date('d-m-Y', strtotime($data->created_at)) ?></td>
					        <td align="left"><?php echo $data->nik ?></td>
					        <td align="left"><?php echo $data->nama ?></td>
							<td align="left"><?php echo $data->desa_kelurahan ?></td>	
							<td align="left"><?php echo $data->jumlah_penghasilan ?></td>
							<td align="left"><?php echo $data->profil_individu ?></td>
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