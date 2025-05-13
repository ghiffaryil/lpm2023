<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<div class="main-content">
		<div class="content-wrapper">
			<section class="basic-elements">
				<div class="row">
					<div class="col-sm-12">
						<div class="content-header">Data <?= $header ?> Individu</div>
					</div>
				</div>
				<?php if ($this->session->flashdata('message')) {
					echo $this->session->flashdata('message');
				} ?>
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-body">
								<!-- <a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Data</a>  -->
								<hr>
								<table id="datatable" class="table table-striped text-capitalize" width="100%">
									<thead>
										<tr>
											<th width="5px">No</th>
											<th>No KTP</th>
											<th>Nama Jenazah</th>
											<th>Bentuk Layanan</th>
											<th>Sebab Kematian</th>
											<th width="75px" style="text-align: center">Detail</th>
										</tr>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($get_all as $data) {
											if ($data->is_active == '0') {
												$is_active = "";
											} else {
												$is_active = "";
											}
											// action
											$detail = '<a href="' . base_url('barzah/detail/' . $data->nik) . '" class="btn btn-primary btn-sm"><span>Lihat <i class="fa fa-arrow-right"></i></span></a>';
										?>

											<tr>
												<td><?php echo $no++ ?></td>
												<td><?php echo $data->nik ?></td>
												<td><?php echo $data->nama ?></td>
												<td><?php echo $data->bentuk_layanan ?></td>
												<td style="text-align: left"><?php echo $data->sebab_kematian ?></td>
												<td width="50" style="text-align: center"><?php echo $detail ?></td>
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