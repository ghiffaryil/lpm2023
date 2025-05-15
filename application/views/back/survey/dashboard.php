<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">

<div class="main-panel">
    <div class="main-content">
        <div class="content-wrapper">
            <section class="content">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="content-header"><?php echo $page_title ?></div>
                    </div>
                </div>
                <?php if ($this->session->flashdata('message')) {
                    echo $this->session->flashdata('message');
                } ?>
            </section>

            <section class="basic-elements">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">

                                <div class="row">


                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <p>Nama Mustahik</p>
                                                    <select id="nama_mustahik" name="nama_mustahik" class="form-control" style="cursor: pointer;">
                                                        <option value"" selected>Pilih nama mustahik...</option>
                                                        <?php foreach ($data_mustahik as $data) { ?>
                                                            <option value="<?php echo $data->nama_kepala_keluarga ?>"><?php echo $data->nama_kepala_keluarga ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-3">
                                                <fieldset class="form-group">
                                                    <p>Petugas Survey</p>
                                                    <select id="petugas_survey" name="petugas_survey" class="form-control" style="cursor: pointer;">
                                                        <option value"" selected>Pilih petugas survey...</option>
                                                        <?php foreach ($data_petugas as $data) { ?>
                                                            <option value="<?php echo $data->petugas_survey ?>"><?php echo $data->petugas_survey ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <p>Tanggal Awal</p>
                                                    <input type="text" class="form-control" id="min">
                                                </fieldset>
                                            </div>
                                            <div class="col-lg-2">
                                                <fieldset class="form-group">
                                                    <p>Tanggal Akhir</p>
                                                    <input type="text" class="form-control" id="max">
                                                </fieldset>
                                            </div>
                                        </div>
                                        <div class="tab-content mt-4">
                                            <div role="tabpanel" class="tab-pane active" id="tab1" aria-expanded="true" aria-labelledby="base-tab1">
                                                <div class="row">
                                                    <table id="tabel-survey" class="table table-striped nowrap" width="100%">
                                                        <thead>
                                                            <tr>
                                                                <th width="5px">#</th> <!-- 0 -->
                                                                <th>Tanggal</th> <!-- 1 -->
                                                                <th>Nama Mustahik</th> <!-- 1 -->
                                                                <th>Jenis Kelamin </th> <!-- 7 -->
                                                                <th>Petugas Survey</th> <!-- 7 -->

                                                                <th>Hasil Scoring</th> <!-- 1 -->
                                                                <th>Rekomendasi</th> <!-- 1 -->
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php $no = 1;
                                                            foreach ($data_survey as $data) { ?>
                                                                <tr>
                                                                    <td><?php echo $no ?></td>
                                                                    <td><?php echo $data->tanggal_masuk ?></td>
                                                                    <td><?php echo $data->nama_mustahik ?></td>
                                                                    <td><?php echo $data->jenis_kelamin ?></td>
                                                                    <td><?php echo $data->petugas_survey ?></td>
                                                                    <td><?php echo $data->hasil_scoring ?></td>
                                                                    <td><?php echo $data->rekomendasi_skoring ?></td>
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

<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript">
    var minDate, maxDate;

    $.fn.dataTable.ext.search.push(
        function(settings, data, dataIndex) {
            var min = minDate.val();
            var max = maxDate.val();
            var date = new Date(data[1]);

            if (
                (min === null && max === null) ||
                (min === null && date <= max) ||
                (min <= date && max === null) ||
                (min <= date && date <= max) ||
                (min == date && date == max) ||
                (min == date && date === null) ||
                (min === null && date == max)
            ) {
                return true;
            }
            return false;
        }
    );

    $(document).ready(function() {
        minDate = new DateTime($('#min'), {
            format: 'YYYY-MM-DD'
        });
        maxDate = new DateTime($('#max'), {
            format: 'YYYY-MM-DD'
        });

        var table = $('#tabel-survey').DataTable({
            "scrollX": true,
            "searchPanes": {
                cascadePanes: true
            },
            "searchPanes": true,
            "columnDefs": [{
                searchPanes: {
                    show: true,
                },
                targets: [1, 5],
            }],
            "pageLength": 10,
            "dom": '<"top"<"row"<"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            // "dom"    	: '<"top"<"row"<"col-lg-12"P><"col-lg-6"B><"col-lg-6 text-right"f>>>rt<"bottom"<"row mt-1"<"col-lg-6"i><"col-lg-6"p>>>',
            "language": {
                "lengthMenu": "_MENU_",
                "info": "Page _PAGE_ of _PAGES_",
                "infoFiltered": "(filtered from _MAX_ total records)"
            }

        });

        $('#min, #max').on('change', function() {
            table.draw();
        });

        // Filter Nama Mustahik
        $('#nama_mustahik').change(function() {
            var value = $(this).val();
            table.column(2).search(value).draw(); // Kolom ke-2 adalah 'Nama Mustahik'
        });

        // Filter Petugas Survey
        $('#petugas_survey').change(function() {
            var value = $(this).val();
            table.column(4).search(value).draw(); // Kolom ke-4 adalah 'Petugas Survey'
        });

        // Load Nama Mustahik
        $.ajax({
            type: "GET",
            url: "getMustahik", // Endpoint untuk mendapatkan data nama mustahik
            dataType: "json",
            success: function(response) {
                console.log(response);

                let options = '<option value="">Pilih Nama Mustahik</option>';
                response.forEach(function(row) {
                    options += `<option value="${row.nama_kepala_keluarga}">${row.nama_kepala_keluarga}</option>`;
                });
                $('#nama_mustahik').html(options);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching nama_mustahik:", error);
            }
        });

        // Load Petugas Survey
        $.ajax({
            type: "GET",
            url: "getPetugasSurvey", // Endpoint untuk mendapatkan data petugas survey
            dataType: "json",
            success: function(response) {
                let options = '<option value="">Pilih Petugas Survey</option>';
                response.forEach(function(row) {
                    options += `<option value="${row.petugas_survey}">${row.petugas_survey}</option>`;
                });
                $('#petugas_survey').html(options);
            },
            error: function(xhr, status, error) {
                console.error("Error fetching petugas_survey:", error);
            }
        });

        $('#nama_mustahik').select2();
        $('#petugas_survey').select2();

    })







    // $.ajax({
    //     type: "GET", // Method pengiriman data bisa dengan GET atau POST
    //     url: `<?= site_url() ?>Survey/getMustahik`, // Isi dengan url/path file php yang dituju
    //     success: function(response) {
    //         response = JSON.parse(response)
    //         console.log(response)
    //         let option = '<option value="">Pilih Mustahik</option>'
    //         for (const row of response) {
    //             option += `<option value="${row.nama_mustahik}">${row.nama_mustahik}</option>`
    //         }
    //         $('#nama_mustahik').html(option);
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
    //         alert(thrownError); // Munculkan alert error
    //     }
    // });

    // $('#nama_mustahik').select2();

    // $.ajax({
    //     type: "GET", // Method pengiriman data bisa dengan GET atau POST
    //     url: `<?= site_url() ?>Survey/getPetugasSurvey`, // Isi dengan url/path file php yang dituju
    //     success: function(response) {
    //         response = JSON.parse(response)
    //         console.log(response)
    //         let option = '<option value="">Pilih Petugas Survey</option>'
    //         for (const row of response) {
    //             option += `<option value="${row.petugas_survey}">${row.petugas_survey}</option>`
    //         }
    //         $('#petugas_survey').html(option);
    //     },
    //     error: function(xhr, ajaxOptions, thrownError) { // Ketika ada error
    //         alert(thrownError); // Munculkan alert error
    //     }
    // });

    // $('#petugas_survey').select2();
</script>