<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <!-- Basic Elements start -->
            <section class="basic-elements">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header"><?php echo $page_title ?></div>
                    </div>
                </div>
                <div class="row match-height">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title text-uppercase">Edit Transaksi Komunitas</div>
                            </div>
                            <div class="card-content">
                                <?php if ($this->session->flashdata('message')) {
                                    echo $this->session->flashdata('message');
                                } ?>
                                <?php echo validation_errors(); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="card-body">
                                            <?php echo form_open_multipart($update_action_komunitas) ?>
                                            <input type="hidden" name="id_komunitas" value="<?php echo $data->id_komunitas ?>">
                                            <input type="hidden" name="id_transaksi_komunitas" value="<?php echo $data->id_transaksi_komunitas ?>">
                                            <div class="form-body">
                                                <div class="row">


                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama Donatur /komunitas</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" id="nama" name="nama" required>
                                                                <option value="" selected disabled>Pilih...</option>
                                                                <?php foreach ($komunitas as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_komunitas ?>" <?php if ($data->id_komunitas == $row->id_komunitas) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                                        <?php echo $row->nama_komunitas ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Jumlah Penerima Manfaat</p>
                                                            <div class="input-group">
                                                                <input type="number" id="jumlah_pm" name="jumlah_pm" class="form-control" aria-describedby="basic-addon3" value="<?php echo number_format($data->jumlah_pm) ?>">
                                                                <div class="input-group-append">
                                                                    <span class="input-group-text" id="basic-addon3">Orang</span>
                                                                </div>
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Rekomender</p>
                                                            <select type="text" class="form-control selectpicker" style="width: 100%" name="info_bantuan">
                                                                <option value="" selected disabled>Pilih nama rekomender...</option>
                                                                <?php foreach ($rekomender as $row) { ?>
                                                                    <option class="text-capitalize" value="<?php echo $row->id_rekomender ?>" <?php if ($data->info_bantuan == $row->id_rekomender) {
                                                                                                                                                    echo "selected";
                                                                                                                                                } ?>>
                                                                        <?php echo $row->jenis_rekomender . ' - ' . $row->nama_rekomender ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group" style="margin-top: -15.8px;">
                                                            <p>Asnaf</p>
                                                            <select class="form-control selectpicker" name="asnaf" required>
                                                                <option value="" selected disabled>Pilih asnaf...</option>
                                                                <option value="Mualaf" <?php if ($data->asnaf == 'Mualaf') {
                                                                                            echo "selected";
                                                                                        } ?>>Mualaf
                                                                </option>
                                                                <option value="Ghorimin" <?php if ($data->asnaf == 'Ghorimin') {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                                    Ghorimin</option>
                                                                <option value="Fisabilillah" <?php if ($data->asnaf == 'Fisabilillah') {
                                                                                                    echo "selected";
                                                                                                } ?>>Fisabilillah</option>
                                                                <option value="Ibnu Sabil" <?php if ($data->asnaf == 'Ibnu Sabil') {
                                                                                                echo "selected";
                                                                                            } ?>>
                                                                    Ibnu Sabil</option>
                                                                <option value="Fakir Miskin" <?php if ($data->asnaf == 'Fakir Miskin') {
                                                                                                    echo "selected";
                                                                                                } ?>>Fakir Miskin</option>
                                                            </select>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nominal Bantuan</p>
                                                            <div class="input-group">
                                                                <div class="input-group-prepend">
                                                                    <span id="basic-addon1" class="input-group-text">Rp</span>
                                                                </div>
                                                                <input type="text" id="jumlah_permohonan" name="jumlah_bantuan" value="<?php echo $data->jumlah_bantuan ?>" aria-describedby="basic-addon1" class="form-control">
                                                            </div>
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group" hidden>
                                                            <p>Nama Program</p>
                                                            <input type="hidden" id="uid" name="uid" value="<?php echo $data->id_program ?>">
                                                            <input type="hidden" class="form-control text-capitalize" id="id_program" name="id_program" value="<?php echo $data->id_program ?>">
                                                        </fieldset>

                                                        <fieldset class="form-group">
                                                            <p>Sub Program</p>
                                                            <select class="form-control selectpicker" name="id_subprogram">
                                                                <option selected disabled>Pilih sub program...</option>
                                                                <?php foreach ($subprogram as $row) { ?>
                                                                    <option value="<?php echo $row->id_subprogram ?>" <?php if ($data->id_subprogram == $data->id_subprogram) {
                                                                                                                            echo "selected";
                                                                                                                        } ?>>
                                                                        <?php echo $row->nama_subprogram ?>
                                                                    </option>
                                                                <?php } ?>
                                                            </select>
                                                        </fieldset>
                                                    </div>

                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group">
                                                                    <p>Periode Menerima Manfaat</p>
                                                                    <input type="date" class="form-control text-capitalize" id="periode_bantuan" name="periode_bantuan" value="<?php echo $data->periode_bantuan ?>">
                                                                </fieldset>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <fieldset class="form-group ditolak">
                                                                    <p>Total Periode</p>
                                                                    <input type="text" class="form-control text-capitalize mekanisme_bantuan" name="total_periode" id="total_periode" value="<?php echo $data->total_periode ?>" readonly>
                                                                </fieldset>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Jenis Bantuan</p>
                                                            <input type="text" class="form-control text-capitalize" id="jenis_bantuan" name="jenis_bantuan" value="<?php echo $data->jenis_bantuan ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Nama PIC</p>
                                                            <input type="text" class="form-control text-capitalize" id="nama_pic" name="nama_pic" value="<?php echo $data->nama_pic ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Sumber Dana</p>
                                                            <input type="text" class="form-control text-capitalize" id="sumber_dana" name="sumber_dana" value="<?php echo $data->sumber_dana ?>">
                                                        </fieldset>
                                                    </div>
                                                    <div class="col-xl-6 col-lg-6 col-md-12">
                                                        <fieldset class="form-group">
                                                            <p>Lokasi Program</p>
                                                            <input type="text" class="form-control text-capitalize" id="lokasi_program" name="lokasi_program" value="<?php echo $data->lokasi_program ?>">
                                                        </fieldset>
                                                    </div>

                                                </div>
                                                <?php echo $btn_submit ?> <?php echo $btn_back ?>
                                            </div>
                                            <?php echo form_close() ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>
</div>
<?php $this->load->view('back/template/footer'); ?>