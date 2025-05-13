<?php $this->load->view('back/template/meta'); ?>
	<div class="wrapper">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-xs-6 col-sm-6 col-md-7 col-lg-5 mt-5">
					<div class="card">
						<div class="card-header bg-primary text-white"><h1 align="center">LOGIN</h1></div>
						<?php echo form_open($action) ?>
							<div class="card-body">
								<?php echo validation_errors() ?>
								<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
                <p align="center">Please insert your email to reset your password</p>
								<div class="form-group"><label>Email</label>
									<?php echo form_input($email) ?>
								</div>
							</div>
							<div class="card-footer">
								<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Reset</button>
								<a href="<?php echo base_url('auth/reset_password') ?>" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Back to Login Form</a>
							</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
