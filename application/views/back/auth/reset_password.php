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
								<div class="form-group">
									<?php echo form_password($new_password) ?>
								</div>
							</div>
							<?php echo form_input($code_forgotten) ?>
							<div class="card-footer" align="center">
								<button type="submit" name="submit" class="btn btn-success"><i class="fa fa-paper-plane"></i> Create New Password</button>
							</div>
						<?php echo form_close() ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
