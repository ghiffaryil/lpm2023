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
				<a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Data</a> 
				<hr>         
                <table class="table table-bordered nowrap penduduk" width="100%">
					<thead>
						<tr>
			                <th align="center">Nama</th>
			                <th align="center">No KTP</th>
			                <th align="center">Kepala Keluarga</th>
			                <th align="center">No KK</th>
			                <th align="center">JK</th>
							<th align="center">Tempat</th>
							<th align="center">Tgl Lahir</th>
							<th align="center">Usia</th>
							<th align="center">Provinsi</th>
							<th align="center">Kota/Kab</th>
							<th align="center">Kecamatan</th>
							<th align="center">Desa/Kelurahan</th>
			                <th align="center">Aksi</th>
			            </tr>
                    </thead>
                    <tbody>
						<?php foreach($get_all as $data){
						if($data->is_active == '0'){ $is_active = "";}
						else{ $is_active = "";}
						// action
						$view = '<a href="'.base_url('penduduk/view/'.$data->nik).'" class="btn btn-primary btn-sm"><span><i class="fa fa-eye"></i></span></a>';
						$edit = '<a href="'.base_url('penduduk/update/'.$data->id_penduduk).'" class="btn btn-success btn-sm"><span><i class="fa fa-pencil"></i></span></a>';
						$delete = '<a href="'.base_url('penduduk/delete/'.$data->id_penduduk).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><span><i class="fa fa-trash"></i></span></a>';							
						?>

			            <tr>
			                <td style="text-align: left"><?php echo $data->nama ?></td>
			                <td style="text-align: left"><?php echo $data->nik ?></td>
			                <td style="text-align: left"><?php echo $data->nama_kk ?></td>
			                <td style="text-align: left"><?php echo $data->no_kk ?></td>
			                <td style="text-align: left"><?php echo $data->jk ?></td>
							<td style="text-align: left"><?php echo $data->tmpt_lahir ?></td>	
							<td style="text-align: left"><?php echo $data->tgl_lahir ?></td>	
							<td style="text-align: left">
								<?php 
									$lahir = new DateTime($data->tgl_lahir);
									$today = new DateTime();
									$umur  = $today->diff($lahir);
									echo $umur->y." Thn";
								?>
							</td>	
							<td style="text-align: left"><?php echo $data->provinsi  ?></td>
							<td style="text-align: left"><?php echo $data->kota_kab  ?></td>
							<td style="text-align: left"><?php echo $data->kecamatan_name ?></td>
							<td style="text-align: left"><?php echo $data->desa_kelurahan ?></td>
		                	<td>
		                		<?php echo $view ?> <?php echo $edit ?> <?php echo $delete ?>
							</td>
			            </tr>
						<?php } ?>		         
                    </tbody>
				</table>
	    	</section>
        </div>
    </div>      
    </div>
</div>

<?php $this->load->view('back/template/footer'); ?>
<script type="text/javascript" src="<?= base_url('app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function() {
	    var table = $('.penduduk').DataTable( {
	        scrollX		: true,
	        select		: true,
	        fixedColumns:   {
	            left : 1
	        }
	    } );
	} );
</script>











