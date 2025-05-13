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
					<table id="datatable" class="table table-striped table-bordered" width="100%">
					<thead>
						<th style="text-align: center">No</th>
		                  <th style="text-align: center">Time</th>
		                  <th style="text-align: center">Process</th>
		                  <th style="text-align: center">Created By</th>
		                  <th style="text-align: center">IP Address</th>
		                  <th style="text-align: center">User Agent</th>
                    </thead>
                    <tbody>
							<?php $no = 1; foreach($get_all as $log){ ?>
			                  <tr>
			                    <td style="text-align: center"><?php echo $no++ ?></td>
			                    <td style="text-align: left"><?php echo $log->created_at ?></td>
			                    <td style="text-align: left"><?php echo $log->content ?></td>
			                    <td style="text-align: center"><?php echo $log->created_by ?></td>
			                    <td style="text-align: center"><?php echo $log->ip_address ?></td>
			                    <td style="text-align: center"><?php echo $log->user_agent ?></td>
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

















