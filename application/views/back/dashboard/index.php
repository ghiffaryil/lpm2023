<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<style type="text/css">
	.select2-dropdown--below {
	  top: -35px;
	} 
</style>
 
<div class="main-panel">
<!-- BEGIN : Main Content-->
    <div class="main-content">
        <div class="content-wrapper">
          <!--Statistics cards Starts-->
          <div class="row">
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left" >
                        <h3 class="font-large-1 mb-0">LAMUSTA</h3>
                        <span>Layanan Mustahik</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class="">
                        <img src="<?php echo base_url('app-assets/img/icons/lamusta_new.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">PKM</h3>
                        <span>Pemberdayaan Keluarga Mandiri</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/pkm_new.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">DARLING</h3>
                        <span>Dapur Keliling</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/darling.png') ?>"  width="50px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">Shelter</h3>
                        <span>Sehati</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/shelter.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">PDM</h3>
                        <span>Pendamping Disabilitas Mental</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/pdm.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">BRP</h3>
                        <span>Bimbingan Rohani Pasien</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/brp.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">YTB</h3>
                        <span>Yatim Tangguh Berdaya</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/ytb.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">BSL</h3>
                        <span>Bina Santri Lapas</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/bsl.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 col-12">
              <div class="card gradient-green-tea">
                <div class="card-content">
                  <div class="card-body pt-2 pb-0">
                    <div class="media">
                      <div class="media-body white text-left">
                        <h3 class="font-large-1 mb-0">BARZAH</h3>
                        <span>Bagian Pemulasaraan Jenazah</span>
                        <br><br>
                      </div>
                      <div class="media-right white text-right">
                        <i class=""><img src="<?php echo base_url('app-assets/img/icons/barzah.png') ?>"  width="40px"></i>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            
          </div>
          <!--Statistics cards Ends-->

<div class="row">
  <div class="col-xl-12 col-lg-12 col-12">
    <div class="card">
      <div class="card-header">
        <h4 class="card-title mb-0">Cari Data</h4>
      </div>
      <div class="card-content">      	
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <fieldset class="form-group">
                <form action="<?php echo base_url('dashboard'); ?>" method="get">
                  <div class="form-group">
                    <label for="nik">Filter By Penerima Manfaat</label>
                    <select class="selectpicker form-control" id="nik" name="nik" onchange="this.form.submit()" required>
                      <option value="0" selected>Pilih Penerima Manfaat</option>
                      <?php foreach($penduduk as $row){ ?>
                        <option class="text-capitalize" value="<?php echo $row->nik ?>" <?php if ($pencarian == $row->nik) echo 'selected' ?>>
                          <?php echo $row->nik.' - '.$row->nama; ?>
                        </option>
                      <?php } ?>
                    </select>
                  </div>
                </form>
              </fieldset>
            </div>
            <?php if ($pencarian == 0) { ?>
              <div class="col-lg-12">              
                <div class="alert alert-danger">Penerima manfaat belum di pilih! Silahkan pilih terlebih dahulu.</div>
              </div>
            <?php } else { ?>
              <div class="col-lg-12">              
                <h4 class="card-title mb-2 text-primary">Informasi</h4>
              </div>
              <div class="col-lg-4">
                <?php if (!empty($user->photo)) { ?>
                  <img src="<?php echo base_url('assets/photo/'.$user->photo)?>" class="img-thumbnail" alt="photo" style="width: 100%; height: 18.5em;">
                <?php } else { ?>
                  <img src="<?php echo base_url('app-assets/img/no-image.png')?>" class="img-thumbnail" alt="photo" width="100%">
                <?php } ?>
              </div>
              <div class="col-lg-8 align-self-left">
                  <table class="table nowrap" width="100%">
                      <tr>
                          <th>No KTP</th>
                          <td align="right"><?php echo $user->nik ?></td>
                      </tr>
                      <tr>
                          <th>Nama</th>
                          <td align="right"><?php echo $user->nama ?></td>
                      </tr>
                      <tr>
                          <th>Jenis Kelamin</th>
                          <td align="right">
                            <?php if ($user->jk == 'L') {
                              echo 'Laki-laki';
                            }else{
                              echo 'Perempuan';
                            } ?>
                          </td>
                      </tr>
                      <tr>
                          <th>Alamat</th>
                          <td align="right"><?php echo $user->desa_kelurahan ?></td>
                      </tr>
                      <tr>
                          <th>Jumlah Bantuan</th>
                          <td align="right">
                            <?php echo "Rp. ".number_format($total_individu[0]->bantuan_individu+$total_komunitas[0]->bantuan_komunitas)?>
                          </td>
                      </tr>
                      <tr>
                          <th>Jumlah Pengajuan</th>
                          <td align="right">
                            <?php echo $total_individu[0]->pengajuan_individu+$total_komunitas[0]->pengajuan_komunitas ?> Kali
                          </td>
                      </tr>
                      <tr>
                          <th></th>
                          <td></td>
                      </tr>
                  </table>
              </div>
            <?php } ?>
          </div>

          <?php if ($pencarian != 0) { ?>
          <div class="row mt-3">
              <div class="col-md-12">
                <h4 class="card-title mb-0 text-primary">Rincian Pengajuan</h4>
                <br>
                <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" id="base-tab1" data-toggle="tab" aria-controls="tab1" href="#tab1" aria-expanded="true">
                                      Data Individu 
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="base-tab2" data-toggle="tab" aria-controls="tab2" href="#tab2" aria-expanded="false">
                                      Data Komunitas
                                    </a>
                                </li>
                            </ul>
                              <div class="tab-content mt-4">
                                <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                  <div class="row">
                              <table class="table table-striped nowrap text-capitalize individu" width="100%">
                          <thead>
                                    <tr>
                                      <th width="5px" style="background-color: #fff;">No</th>
                                      <th>Tanggal</th>
                                      <th>Jenis Bantuan</th>
                                      <th>Program</th>
                                      <th>Sub Program</th>
                                      <th>Asnaf</th>                          
                                      <th>Permohonan</th>
                                      <th>Rekomendasi</th>
                                      <th>Jumlah Bantuan</th>
                                      <th>Rencana</th>
                                      <th>Mekanisme</th>
                                      <th>Penyalur</th>
                                      <th style="background-color: #fff;">Status</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <?php $no = 1; foreach($individu as $data){ ?>

                                  <tr>
                                      <td style="background-color: #fff;"><?php echo $no ?></td>
                                      <td><?php echo date('d-m-Y', strtotime($data->tanggal_transaksi)) ?></td>
                                      <td><?php echo $data->jenis_bantuan ?></td>
                                      <td><?php echo strtolower($data->nama_program) ?></td>
                                      <td><?php echo $data->nama_subprogram ?></td>
                                      <td><?php echo $data->asnaf ?></td>
                                      <td><span class="float-left">Rp.</span> <span class="float-right"><?php echo number_format($data->jumlah_permohonan) ?></span></td>
                                      <td>
                                      	<?php if ($data->id_program == 1) {
                                      		echo $data->rekomendasi_bantuan;
                                      	}else{
                                      		echo "-";
                                      	}  ?>
                                      </td>
                                      <td><span class="float-left">Rp.</span> <span class="float-right"><?php echo number_format($data->jumlah_bantuan) ?></span></td>
                                      <td>
                                        <?php if ($data->rencana_bantuan == '0000-00-00') {
                                          echo "-";
                                        }else{
                                          echo date("d-m-Y", strtotime($data->rencana_bantuan ));
                                        } ?>
                                      </td>
                                      <td>
                                        <?php if ($data->rekomendasi_bantuan == 'Ditolak') {
                                          echo "-";
                                        }else{
                                          echo $data->mekanisme_bantuan;
                                        } ?>
                                    </td>
                                    <td>
                                      <?php if (empty($data->penyalur)) {
                                          echo "-";
                                        }else{
                                          echo ucwords($data->penyalur);
                                        } ?>
                                    </td>
                                    <td style="background-color: #fff;">
                                    <?php if ($data->id_program == 1) { ?>
                              	
                                    <?php if ($data->status == '0' && $data->rekomendasi_bantuan == 'Dibantu' || $data->status == '0' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '1' && $data->rekomendasi_bantuan == 'Disurvey'|| $data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey') { ?>
                                      <span class="badge badge-info">Proses</span>
                                    <?php }elseif ($data->status == '0' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '0' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                      <span class="badge badge-warning">Dipending</span>
                                    <?php }elseif ($data->status == '1' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '1' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                      <span class="badge badge-warning">Pending</span>
                                    <?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                      <span class="badge badge-warning">Pending</span>
                                    <?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                      <span class="badge badge-warning">Pending</span>
                                    <?php }elseif($data->status == '0' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '1' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '2' && $data->rekomendasi_bantuan == 'Ditolak'  || $data->status == '4'){ ?>
                                      <span class="badge badge-danger">Ditolak</span>
                                    <?php }elseif($data->status == '1' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                      <span class="badge badge-success">Diajukan</span>
                                    <?php }elseif($data->status == '2' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                      <span class="badge badge-primary">Disetujui</span>
                                    <?php }elseif($data->status == '3' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                      <span class="badge badge-primary">Dibayar</span>
                                    <?php } ?>

                                	<?php }else{ echo "-"; }  ?>
                                  </td>
                                  </tr>
                            <?php 
                              $no += 1;
                            } ?>
                                    </tbody>
                        </table>
                    </div>
                                </div>

                                <div class="tab-pane" id="tab2" aria-labelledby="base-tab2">
                                  <div class="row">
                                    <table class="table table-striped nowrap komunitas" width="100%">
                        <thead>
                          <tr>
                                    <th width="5px">No</th>
                                    <th>Tanggal</th>
                                    <th>Komunitas</th>
                            <th>Program</th>
                                    <th>Sub Program</th>  
                                    <th>Asnaf</th>                        
                                    <th>Permohonan</th>
                                    <th>Rekomendasi</th>
                                    <th>Jumlah Bantuan</th>
                                    <th>Rencana</th>
                                    <th>Mekanisme</th>
                                    <th>Penyalur</th>
                                    <th style="background-color: #fff;">Status</th>
                                </tr>
                                  </thead>
                                  <tbody>
                          <?php $no = 1; foreach($komunitas as $data){ ?>
                                <tr>
                                    <td><?php echo $no ?></td>
                                    <td><?php echo date("d-m-Y", strtotime($data->created_at)) ?></td>
                                    <td><?php echo strtolower($data->nama_komunitas) ?></td>
                                    <td><?php echo strtolower($data->nama_program) ?></td>
                                    <td><?php echo $data->nama_subprogram ?></td>
                                    <td><?php echo $data->asnaf ?></td>
                                    <td>Rp. <?php echo number_format($data->jumlah_permohonan) ?></td>
                                    <td><?php echo $data->rekomendasi_bantuan ?></td>
                                    <td>Rp. <?php echo number_format($data->jumlah_bantuan) ?></td>
                                    <td>
                                      <?php if ($data->rencana_bantuan == '0000-00-00') {
                                                echo "-";
                                            }else{
                                                echo date("d-m-Y", strtotime($data->rencana_bantuan ));
                                            } ?>
                                    </td>
                                    <td>
                                          <?php if ($data->rekomendasi_bantuan == 'Ditolak') {
                                            echo "-";
                                        }else{
                                            echo $data->mekanisme_bantuan;
                                        } ?>
                                    </td>
                                    <td>
                                      <?php if (empty($data->penyalur)) {
                                          echo "-";
                                        }else{
                                          echo ucwords($data->penyalur);
                                        } ?>
                                    </td>
                                    <td style="background-color: #fff;">
                                      <?php if ($data->status == '0' && $data->rekomendasi_bantuan == 'Dibantu' || $data->status == '0' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '1' && $data->rekomendasi_bantuan == 'Disurvey'|| $data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey') { ?>
                                          <span class="badge badge-info">Proses</span>
                                        <?php }elseif ($data->status == '0' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '0' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                          <span class="badge badge-warning">Dipending</span>
                                        <?php }elseif ($data->status == '1' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '1' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                          <span class="badge badge-warning">Pending</span>
                                        <?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                          <span class="badge badge-warning">Pending</span>
                                        <?php }elseif ($data->status == '2' && $data->rekomendasi_bantuan == 'Disurvey' || $data->status == '2' && $data->rekomendasi_bantuan == 'Lengkapi Berkas' || $data->status == '2' && $data->rekomendasi_bantuan == 'Datang Kembali') { ?>
                                          <span class="badge badge-warning">Pending</span>
                                        <?php }elseif($data->status == '0' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '1' && $data->rekomendasi_bantuan == 'Ditolak' || $data->status == '2' && $data->rekomendasi_bantuan == 'Ditolak'  || $data->status == '4'){ ?>
                                          <span class="badge badge-danger">Ditolak</span>
                                        <?php }elseif($data->status == '1' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                          <span class="badge badge-success">Diajukan</span>
                                        <?php }elseif($data->status == '2' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                          <span class="badge badge-primary">Disetujui</span>
                                        <?php }elseif($data->status == '3' && $data->rekomendasi_bantuan == 'Dibantu'){ ?>
                                          <span class="badge badge-primary">Dibayar</span>
                                        <?php } ?>
                                    </td>
                                </tr>
                          <?php 
                            $no += 1;
                          } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

</div>
</div>

<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('.individu').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
          left:'',
          right: 1
        }
    } );
  });
</script>
<script type="text/javascript">
  $(document).ready(function() {
    var table = $('.komunitas').DataTable({
        scrollY:        "300px",
        scrollX:        true,
        scrollCollapse: true,
        paging:         false,
        fixedColumns:   {
          left:'',
          right: 1
        }
    } );
  });
</script>
