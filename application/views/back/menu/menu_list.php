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
						<tr>
			                <th style="text-align: center">No</th>
			                <th style="text-align: center">Menu Name</th>
			                <th style="text-align: center">Slug</th>
			                <th style="text-align: center">URL</th>
			                <th style="text-align: center">Icon</th>
			                <th style="text-align: center">Order No</th>
			                <th style="text-align: center">Status</th>
			                <th style="text-align: center">Action</th>
			            </tr>
                    </thead>
                    <tbody>
						<?php $no = 1; foreach($get_all as $data){
			            if($data->is_active == '1'){ $is_active = "<a href='".base_url('menu/deactivate/'.$data->id_menu)."'><button class='btn btn-xs btn-success'><i class='fa fa-check'></i> ACTIVE</button></a> ";}
			            else{ $is_active = "<a href='".base_url('menu/activate/'.$data->id_menu)."'><button class='btn btn-xs btn-danger'><i class='fa fa-remove'></i> INACTIVE</button></a>";}
			            // action
			            $edit = '<a href="'.base_url('menu/update/'.$data->id_menu).'" class="btn btn-sm btn-warning"><i class="ft-edit"></i></a>';
			            $delete = '<a href="'.base_url('menu/delete/'.$data->id_menu).'" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i></a>';
			            ?>
			            <tr>
			                <td style="text-align: center"><?php echo $no++ ?></td>
			                <td style="text-align: left"><?php echo $data->menu_name ?></td>
			                <td style="text-align: center"><?php echo $data->menu_slug ?></td>
			                <td style="text-align: center"><?php echo $data->menu_url ?></td>
			                <td style="text-align: center"><i class="fa fa-2x <?php echo $data->menu_icon ?>"></i> </td>
			                <td style="text-align: center"><?php echo $data->order_no ?></td>
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
















