<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section class="basic-elements">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header">Data Kategori Komunitas</div>
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <a href="<?php echo $add_action ?>" class="btn btn-primary"><i class="fa fa-plus-circle"></i> Add New Data</a>
                                <hr>
                                <table id="datatable" class="table table-striped text-capitalize" width="100%">
                                    <thead>
                                        <tr>
                                            <th width="5px">No</th>
                                            <th>Nama Kategori Komunitas</th>
                                            <th>Is Aktif</th>
                                            <th>Created at</th>
                                            <th>Created by</th>
                                            <th>Updated at</th>
                                            <th>Updated by</th>
                                            <th width="75px" style="text-align: center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1;
                                        foreach ($get_all as $data) {
                                            // action

                                            $edit = '<a href="' . base_url('kategori_komunitas/update/' . $data->id_kategori_komunitas) . '" class="btn btn-sm btn-success" title="Ubah"><span><i class="fa fa-pencil">
							            	</i></span></a>';
                                            $delete = '<a href="' . base_url('kategori_komunitas/delete/' . $data->id_kategori_komunitas) . '" onClick="return confirm(\'Are you sure?\');" class="btn btn-sm btn-danger" title="Hapus"><span><i class="fa fa-trash"></i></span></a>';
                                        ?>

                                            <tr>
                                                <td><?php echo $no++ ?></td>
                                                <td><?php echo $data->nama_kategori_komunitas ?></td>
                                                <td><?php echo $data->is_aktif ?></td>
                                                <td><?php echo $data->created_at ?></td>
                                                <td><?php echo $data->created_by ?></td>
                                                <td><?php echo $data->updated_at ?></td>
                                                <td><?php echo $data->updated_by ?></td>
                                                <td width="50" style="text-align: center">
                                                    <?php echo $edit ?> <?php echo $delete ?>
                                                </td>
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