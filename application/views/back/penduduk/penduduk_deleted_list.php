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
				<table id="datatable" class="table table-striped nowrap table-bordered" width="100%">
					<thead>
						<tr>
			                <th style="text-align: center">No</th>
			                <th style="text-align: center">No KTP</th>
			                <th style="text-align: center">Nama</th>
			                <th style="text-align: center">No KK</th>
			                <th style="text-align: center">Kepala Keluarga</th>
			                <th style="text-align: center">JK</th>
							<th style="text-align: center">Tempat</th>
							<th style="text-align: center">Tgl Lahir</th>
							<th style="text-align: center">Usia</th>
							<th style="text-align: center">Provinsi</th>
							<th style="text-align: center">Kota/Kab</th>
							<th style="text-align: center">Kecamatan</th>
							<th style="text-align: center">Desa/Kelurahan</th>
			                <th style="text-align: center">Action</th>
			            </tr>
                    </thead>
                    <tbody>

					<?php $no = 1; foreach($get_all_deleted as $data){
                  		if($data->is_active== '0'){ $is_active = "<button class='btn btn-xs btn-success'><i class='fa fa-check'></i> ADA</button> ";}
                 		else{ $is_available = "<button class='btn btn-xs btn-danger'><i class='fa fa-remove'></i> DIPINJAM</button>";}
	                  // action
	                  $restore = '<a href="'.base_url('penduduk/restore/'.$data->id_penduduk).'" class="btn btn-sm btn-primary"><i class="fa fa-refresh"></i></a>';
	                  $delete = '<a href="'.base_url('penduduk/delete_permanent/'.$data->id_penduduk).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
	                ?>
			            <tr>
			                <td style="text-align: center"><?php echo $no++ ?></td>
			                <td style="text-align: left"><?php echo $data->nik ?></td>
			                <td style="text-align: center"><?php echo $data->nama ?></td>
			                <td style="text-align: center"><?php echo $data->no_kk ?></td>
			                <td style="text-align: center"><?php echo $data->nama_kk ?></td>
			                <td style="text-align: center"><?php echo $data->jk ?></td>
							<td style="text-align: center"><?php echo $data->tmpt_lahir ?></td>	
							<td style="text-align: center"><?php echo $data->tgl_lahir ?></td>
							<td style="text-align: left">
								<?php 
									$lahir = new DateTime($data->tgl_lahir);
									$today = new DateTime();
									$umur  = $today->diff($lahir);
									echo $umur->y." Thn";
								?>
							</td>	
							<td style="text-align: center"><?php echo $data->provinsi  ?></td>
							<td style="text-align: center"><?php echo $data->kota_kab  ?></td>
							<td style="text-align: center"><?php echo $data->kecamatan_name ?></td>
							<td style="text-align: center"><?php echo $data->desa_kelurahan ?></td>
			                <td style="text-align: center">
			                	<div class="btn-group" role="group" aria-label="">
			                	<?php echo $restore ?> <?php echo $delete ?>
						    	</div>
						    </td>
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

















