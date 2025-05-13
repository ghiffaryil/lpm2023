<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<div class="main-panel">
	<div class="main-content">
		<div class="content-wrapper">
			<section class="content">
				<div class="row">
					<div class="col-sm-12">
						<div class="content-header"><?php echo $page_title ?></div>
					</div>
				</div>
				<?php if($this->session->flashdata('message')){echo $this->session->flashdata('message');} ?>
				<div class="row match-height mt-2">
					<div class="col-md-12">
						<ul class="list-group list-group-unbordered mb-3 table-hover">
							<li class="list-group-item bg-name">
								<h4>Data Komunitas</h4> 
							</li>
							<li class="list-group-item">
								<b>Nama Komunitas</b> <span class="float-right"><?php echo $komunitas[0]->nama_komunitas ?></span>
							</li>
							<li class="list-group-item">
								<b>Profil Komunitas</b> <span class="float-right"><?php echo $komunitas[0]->profil_komunitas ?></span>
							</li>
							<li class="list-group-item">
								<b>No Telpon</b> <span class="float-right"><?php echo $komunitas[0]->no_telpon ?></span>
							</li>
							<li class="list-group-item">
								<b>Alamat</b> <span class="float-right"><?php echo $komunitas[0]->alamat ?></span>
							</li>
							<li class="list-group-item">
								<b>Kelurahan</b>
								<span class="float-right">
									<?php foreach($get_all_kelurahan as $row){
										if($komunitas[0]->id_desa_kelurahan_komunitas == $row->id_desa_kelurahan){
											echo $row->desa_kelurahan;
										}
									} ?>
								</span>
							</li>
							<li class="list-group-item">
								<b>Kecamatan</b>
								<span class="float-right">
									<?php foreach($get_all_kecamatan as $row){
										if($komunitas[0]->id_kecamatan_komunitas == $row->id_kecamatan){
											echo $row->kecamatan_name;
										}
									} ?>
								</span>
							</li>
							<li class="list-group-item">
								<b>Kab/Kota</b>
								<span class="float-right">
									<?php foreach($get_all_kabupaten as $row){
										if($komunitas[0]->id_kota_kab_komunitas == $row->id_kota_kab){
											echo $row->kota_kab;
										}
									} ?>
								</span>
							</li>
							<li class="list-group-item">
								<b>Provinsi</b>
								<span class="float-right">
									<?php foreach($get_all_provinsi as $row){
										if($komunitas[0]->id_provinsi_komunitas == $row->id_provinsi){
											echo $row->provinsi;
										}
									} ?>
								</span>
							</li>
							<li class="list-group-item">
								<b>Negara</b>
								<span class="float-right">
									<?php echo $komunitas[0]->negara_komunitas; ?>
								</span>
							</li>
							<li class="list-group-item">
								<b>Kode Pos</b>
								<span class="float-right">
									<?php echo $komunitas[0]->kodepos_komunitas; ?>
								</span>
							</li>
						</ul>
					</div>
					<div class="col-md-12">
						<button class="btn btn-success btn-md" onclick="history.back()">Kembali</button>
					</div>

				</div>
			</section>

			<br><br><br><br>
		</div>
	</div> 
</div>

<?php $this->load->view('back/template/footer'); ?>
