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
								<table id="datatable" class="table table-striped table-bordered nowrap" width="100%">
									<thead>
										<th style="text-align: center">No</th>
										<th style="text-align: center">Name</th>
										<th style="text-align: center">Gender</th>
										<th style="text-align: center">Username</th>
										<th style="text-align: center">Email</th>
										<th style="text-align: center">Usertype</th>
										<th style="text-align: center">Status</th>
										<th style="text-align: center">Action</th>
									</thead>
									<tbody>
										<?php $no = 1;
										foreach ($get_all as $user) {
											// gender
											if ($user->gender == '1') {
												$gender = 'Male';
											} else {
												$gender = 'Female';
											}
											// status active
											if ($user->is_active == '1') {
												$is_active = '<a href="' . base_url('auth/deactivate/' . $user->id_users) . '" class="btn btn-sm btn-success">ACTIVE</a>';
											} else {
												$is_active = '<a href="' . base_url('auth/activate/' . $user->id_users) . '" class="btn btn-sm btn-danger">INACTIVE</a>';
											}
											// action
											$edit = '<a href="' . base_url('auth/update/' . $user->id_users) . '" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>';
											$delete = '<a href="' . base_url('auth/delete/' . $user->id_users) . '" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
										?>
											<tr>
												<td style="text-align: center"><?php echo $no++ ?></td>
												<td style="text-align: left"><?php echo $user->name ?></td>
												<td style="text-align: center"><?php echo $gender ?></td>
												<td style="text-align: center"><?php echo $user->username ?></td>
												<td style="text-align: center"><?php echo $user->email ?></td>
												<td style="text-align: center"><?php echo $user->usertype_name ?></td>
												<td style="text-align: center"><?php echo $is_active ?></td>
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