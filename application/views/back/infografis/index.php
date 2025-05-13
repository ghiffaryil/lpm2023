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


            <div class="row">
                <div class="col-xl-12 col-lg-12 col-12">

                    <div class="card">



                        <div class="col-md-12">
                            <div class="card">

                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6 text-capitalize">


                                            <div class="col-8">
                                                <label style="color: black;">Pilih Wilayah</label>
                                                <select id="wilayah" name="wilayah" class="form-control" style="cursor: pointer;">
                                                    <option value"" selected>Pilih Wilayah...</option>
                                                    <option value="allWilayah">Semua Wilayah</option>
                                                    <?php foreach ($wilayah_provinsi as $p) : ?>
                                                        <option value="<?= $p->id_provinsi ?>"><?= $p->provinsi ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <br>
                                                <br>
                                                <label style="color: black;">Pilih Program</label>
                                                <select id="program" name="program" class="form-control" style="cursor: pointer;">
                                                    <option value"" selected>Pilih Wilayah Terlebih dahulu...</option>

                                                </select>
                                                <br>
                                                <label style="color: black;">Jenis Laporan</label>
                                                <select id="jenis_laporan" name="jenis_laporan" class="form-control" style="cursor: pointer;">
                                                </select>
                                                <br>
                                                <label style="color: black;">Periode Bantuan</label>
                                                <input type="text" class="form-control" name="periode_bantuan" id="periode_bantuan" placeholder="Kosongkan jika semua tahun" />
                                                <br>
                                                <button id="filter" name="filter" class="btn" style="background-color: #009DA0; color:white">Filter</button>
                                            </div>


                                        </div>
                                        <div id="perProgram" class="col-md-6 text-capitalize mt-3" style="display:none">
                                            <p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Jumlah Penerima Manfaat : </a> <label id="valPenerimaManfaat"></label> </p>
                                            <p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Jumlah Provinsi : </a> <label id="valJmlProvinsi"></label> </p>
                                            <p class="text-bold-500 primary"><a><i class="fa fa-location-arrow"></i> Jumlah Kab/Kota : </a> <label id="valJmlKabKota"></label></p>
                                        </div>
                                        <div id="allProgram" class="col-md-6 text-capitalize mt-3" style="display:none">
                                            <p class="text-bold-500 primary"><a><i class="ft ft-user"></i> Jumlah Penerima Manfaat Individu: </a> <label id="valPmIndividuAll"></label> </p>
                                            <p class="text-bold-500 primary"><a><i class="ft ft-users"></i> Jumlah Penerima Manfaat Komunitas: </a> <label id="valPmKomunitasAll"></label> </p>
                                            <p class="text-bold-500 primary"><a><i class="ft ft-map-pin"></i> Jumlah Provinsi : </a> <label id="valJmlProvinsiAll"></label> </p>
                                            <p class="text-bold-500 primary"><a><i class="fa fa-location-arrow"></i> Jumlah Kab/Kota : </a> <label id="valJmlKabKotaAll"></label></p>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>


                        <!-- HTML -->
                        <div id="chartdiv"></div>

                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Styles -->
    <style>
        #chartdiv {
            width: 100%;
            height: 600px
        }
    </style>

    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script>

    <!-- <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/data/countries2.js"></script> -->


    <?php $this->load->view('back/template/footer'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/css/datepicker.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.2.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $('#wilayah').select2();
    </script>

    <script>
        // let data = [];
        // infografis(data);
        am5.ready(function() {
            am5.array.each(am5.registry.rootElements, function(root) {
                if (root) {
                    if (root.dom.id == root.dom.id) {
                        root.dispose();
                    }
                }
            });
            var data = [];
            var root = am5.Root.new("chartdiv");
            root.setThemes([am5themes_Animated.new(root)]);
            var chart = root.container.children.push(am5map.MapChart.new(root, {}));

            am5.net.load("indonesia.json", chart).then(function(result) {
                var geo = am5.JSONParser.parse(result.response);
                loadGeodata(geo.country_code);
            });

            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                calculateAggregates: true,
                valueField: "value"
            }));
            polygonSeries.mapPolygons.template.setAll({
                tooltipText: "{name}",
                interactive: true
            });

            polygonSeries.mapPolygons.template.states.create("hover", {
                fill: am5.color(0x677935)
            });

            polygonSeries.set("heatRules", [{
                target: polygonSeries.mapPolygons.template,
                dataField: "value",
                min: am5.color(0x8AFFB7),
                max: am5.color(0x0CC27E),
                key: "fill"
            }]);

            // polygonSeries.mapPolygons.template.events.on("pointerover", function(ev) {
            //     heatLegend.showValue(ev.target.dataItem.get("value"));
            // })

            function loadGeodata(country) {

                // Default map
                var defaultMap = "usaLow";

                if (country == "US") {
                    chart.set("projection", am5map.geoAlbersUsa());
                } else {
                    chart.set("projection", am5map.geoMercator());
                }

                // calculate which map to be used
                var currentMap = defaultMap;

                var title = "";
                if (am5geodata_data_countries2[country] !== undefined) {
                    currentMap = am5geodata_data_countries2[country]["maps"][0];

                    // add country title
                    if (am5geodata_data_countries2[country]["country"]) {
                        title = am5geodata_data_countries2[country]["country"];
                    }
                }

                am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/" + currentMap + ".json", chart).then(function(result) {
                    var geodata = am5.JSONParser.parse(result.response);

                    var data = [];
                    for (var i = 0; i < geodata.features.length; i++) {
                        data.push({
                            id: geodata.features[i].id,
                            value: Math.round(Math.random() * 10000)
                        });
                    }

                    polygonSeries.set("geoJSON", geodata);
                    polygonSeries.data.setAll(data)
                });

                chart.seriesContainer.children.push(am5.Label.new(root, {
                    x: 5,
                    y: 5,
                    text: title,
                    background: am5.RoundedRectangle.new(root, {
                        fill: am5.color(0xffffff),
                        fillOpacity: 0.2
                    })
                }))

            }

            var bubbleSeries = chart.series.push(
                am5map.MapPointSeries.new(root, {
                    valueField: "value",
                    calculateAggregates: true,
                    polygonIdField: "id"
                })
            );

            var circleTemplate = am5.Template.new({});

            bubbleSeries.bullets.push(function(root, series, dataItem) {
                var container = am5.Container.new(root, {});

                var circle = container.children.push(
                    am5.Circle.new(root, {
                        radius: 20,
                        fillOpacity: 0.7,
                        fill: am5.color(0xff0000),
                        cursorOverStyle: "pointer",
                        tooltipText: `{name}: [bold]{value}[/]`
                    }, circleTemplate)
                );

                var countryLabel = container.children.push(
                    am5.Label.new(root, {
                        text: "{name}",
                        paddingLeft: 5,
                        populateText: true,
                        fontWeight: "bold",
                        fontSize: 13,
                        centerY: am5.p50
                    })
                );

                circle.on("radius", function(radius) {
                    countryLabel.set("x", radius);
                })

                return am5.Bullet.new(root, {
                    sprite: container,
                    dynamic: true
                });
            });

            bubbleSeries.bullets.push(function(root, series, dataItem) {
                return am5.Bullet.new(root, {
                    sprite: am5.Label.new(root, {
                        text: "{value.formatNumber('#.')}",
                        fill: am5.color(0xffffff),
                        populateText: true,
                        centerX: am5.p50,
                        centerY: am5.p50,
                        textAlign: "center"
                    }),
                    dynamic: true
                });
            });



            // minValue and maxValue must be set for the animations to work
            bubbleSeries.set("heatRules", [{
                target: circleTemplate,
                dataField: "value",
                min: 10,
                max: 50,
                minValue: 0,
                maxValue: 100,
                key: "radius"
            }]);

            bubbleSeries.data.setAll(data);

            updateData();
            setInterval(function() {
                updateData();
            }, 2000)

            function updateData() {
                for (var i = 0; i < bubbleSeries.dataItems.length; i++) {
                    bubbleSeries.data.setIndex(i, {
                        value: data[i].value,
                        id: data[i].id,
                        name: data[i].name
                    })
                }
            }


        });

        $('#wilayah').on('change', function() {
            let idWilayah = $("#wilayah").val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('infografis/getJenisProgramByWilayah') ?>",
                dataType: "JSON",
                data: {
                    idWilayah
                },
                cache: false,
                success: function(data) {
                    let option = "";
                    if (data.length == 0) {
                        alert("Belum ada Program pada wilayah ini");
                    } else {
                        option = '<option value="">Pilih Jenis Program..</option>'
                        option += '<option value="allProgram">Semua Program</option>'
                    }
                    for (const row of data) {
                        option += `<option value="${row.id_program}">${row.nama_program}</option>`
                    }
                    $('#program').html(option);
                }
            });
        });

        $('#program').on('change', function() {
            let idProgram = $("#program").val();
            $.ajax({
                type: "GET",
                url: "<?= base_url('infografis/getJenisTransaksiByProgram') ?>",
                dataType: "JSON",
                data: {
                    idProgram
                },
                cache: false,
                success: function(data) {
                    if (data == "allProgram") {
                        let option = `<option value="Individu dan Komunitas">Individu dan Komunitas</option>`;
                        $('#jenis_laporan').html(option);
                        $('#jenis_laporan').attr('disabled', true)
                    } else {
                        $('#jenis_laporan').attr('disabled', false)
                        let option = '<option value="">Pilih Jenis Laporan..</option>'
                        for (const row of data) {
                            option += `<option value="${row.id_nama_transaksi}">${row.nama_transaksi}</option>`
                        }
                        $('#jenis_laporan').html(option);
                    }

                }
            });
        });

        $("#periode_bantuan").datepicker({
            format: "yyyy",
            viewMode: "years",
            minViewMode: "years",
            autoclose: true
        });

        $('#filter').on('click', function() {
            let idProgram = $("#program").val();
            let idJenisLaporan = $("#jenis_laporan").val();
            let periodeBantuan = $("#periode_bantuan").val();
            let idProvinsi = $("#wilayah").val();
            if (idProgram == "Pilih Wilayah..." || idProvinsi == "Pilih Wilayah Terlebih dahulu..." || idProgram == "" || idProvinsi == "" || idJenisLaporan == "" || idJenisLaporan == null) {
                alert('Wilayah, Program atau Jenis laporan harus dipilih');
            } else {
                $.ajax({
                    type: "GET",
                    url: "<?= base_url('infografis/getDataTransaksi') ?>",
                    async: true,
                    dataType: "JSON",
                    data: {
                        idProgram,
                        idJenisLaporan,
                        periodeBantuan,
                        idProvinsi
                    },
                    cache: true,
                    success: function(data) {
                        let dataProvinsiUniqe = [...new Set(data.dataProvinsi)];
                        let dataKabKotaUniqe = [...new Set(data.dataKabKota)];

                        const groupById = data.dataInfografis.reduce(function(acc, obj) {
                            var key = obj['id'];
                            if (!acc[key]) {
                                acc[key] = [];
                            }
                            acc[key].push(obj);
                            return acc;
                        }, {});

                        const newData = Object.entries(groupById).map((item) => {
                            return {
                                id: item[0],
                                name: item[1][0].nama,
                                value: item[1].length
                            }
                        });

                        if (idProgram == "allProgram") {
                            $("#allProgram").show();
                            $("#perProgram").hide();
                            $('#valPmIndividuAll').html(`<strong> ${data.dataPerOrangIndividu.length} orang</strong>`);
                            $('#valPmKomunitasAll').html(`<strong> ${data.dataPerOrangKomunitas.length} orang</strong>`);
                            $('#valJmlProvinsiAll').html(`<strong> ${dataProvinsiUniqe.length} Provinsi</strong>`);
                            $('#valJmlKabKotaAll').html(`<strong> ${dataKabKotaUniqe.length} Kab/Kota</strong>`);
                        } else {
                            $("#allProgram").hide();
                            $("#perProgram").show();
                            $('#valPenerimaManfaat').html(`<strong> ${data.dataPerOrang.length} orang</strong>`);
                            $('#valJmlProvinsi').html(`<strong> ${dataProvinsiUniqe.length} Provinsi</strong>`);
                            $('#valJmlKabKota').html(`<strong> ${dataKabKotaUniqe.length} Kab/Kota</strong>`);
                        }


                        am5.ready(function() {
                            am5.array.each(am5.registry.rootElements, function(root) {
                                if (root) {
                                    if (root.dom.id == root.dom.id) {
                                        root.dispose();
                                    }
                                }
                            });
                            var data = newData;
                            var root = am5.Root.new("chartdiv");
                            root.setThemes([am5themes_Animated.new(root)]);
                            var chart = root.container.children.push(am5map.MapChart.new(root, {}));

                            // var polygonSeries = chart.series.push(
                            //     am5map.MapPolygonSeries.new(root, {
                            //         geoJSON: am5geodata_data_countries2[country]["maps"][0],
                            //         // geoJSON: am5geodata_indonesiaLow,
                            //         exclude: ["AQ"]
                            //     })
                            // );

                            am5.net.load("indonesia.json", chart).then(function(result) {
                                var geo = am5.JSONParser.parse(result.response);
                                loadGeodata(geo.country_code);
                            });

                            var polygonSeries = chart.series.push(am5map.MapPolygonSeries.new(root, {
                                calculateAggregates: true,
                                valueField: "value"
                            }));
                            polygonSeries.mapPolygons.template.setAll({
                                tooltipText: "{name}",
                                interactive: true
                            });

                            polygonSeries.mapPolygons.template.states.create("hover", {
                                fill: am5.color(0x677935)
                            });

                            polygonSeries.set("heatRules", [{
                                target: polygonSeries.mapPolygons.template,
                                dataField: "value",
                                min: am5.color(0x8AFFB7),
                                max: am5.color(0x0CC27E),
                                key: "fill"
                            }]);

                            // polygonSeries.mapPolygons.template.events.on("pointerover", function(ev) {
                            //     heatLegend.showValue(ev.target.dataItem.get("value"));
                            // })

                            function loadGeodata(country) {

                                // Default map
                                var defaultMap = "usaLow";

                                if (country == "US") {
                                    chart.set("projection", am5map.geoAlbersUsa());
                                } else {
                                    chart.set("projection", am5map.geoMercator());
                                }

                                // calculate which map to be used
                                var currentMap = defaultMap;

                                var title = "";
                                if (am5geodata_data_countries2[country] !== undefined) {
                                    currentMap = am5geodata_data_countries2[country]["maps"][0];

                                    // add country title
                                    if (am5geodata_data_countries2[country]["country"]) {
                                        title = am5geodata_data_countries2[country]["country"];
                                    }
                                }

                                am5.net.load("https://cdn.amcharts.com/lib/5/geodata/json/" + currentMap + ".json", chart).then(function(result) {
                                    var geodata = am5.JSONParser.parse(result.response);

                                    var data = [];
                                    for (var i = 0; i < geodata.features.length; i++) {
                                        data.push({
                                            id: geodata.features[i].id,
                                            value: Math.round(Math.random() * 10000)
                                        });
                                    }

                                    polygonSeries.set("geoJSON", geodata);
                                    polygonSeries.data.setAll(data)
                                });

                                chart.seriesContainer.children.push(am5.Label.new(root, {
                                    x: 5,
                                    y: 5,
                                    text: title,
                                    background: am5.RoundedRectangle.new(root, {
                                        fill: am5.color(0xffffff),
                                        fillOpacity: 0.2
                                    })
                                }))

                            }

                            var bubbleSeries = chart.series.push(
                                am5map.MapPointSeries.new(root, {
                                    valueField: "value",
                                    calculateAggregates: true,
                                    polygonIdField: "id"
                                })
                            );

                            var circleTemplate = am5.Template.new({});

                            bubbleSeries.bullets.push(function(root, series, dataItem) {
                                var container = am5.Container.new(root, {});

                                var circle = container.children.push(
                                    am5.Circle.new(root, {
                                        radius: 20,
                                        fillOpacity: 0.7,
                                        fill: am5.color(0xff0000),
                                        cursorOverStyle: "pointer",
                                        tooltipText: `{name}: [bold]{value}[/]`
                                    }, circleTemplate)
                                );

                                var countryLabel = container.children.push(
                                    am5.Label.new(root, {
                                        text: "{name}",
                                        paddingLeft: 5,
                                        populateText: true,
                                        fontWeight: "bold",
                                        fontSize: 13,
                                        centerY: am5.p50
                                    })
                                );

                                circle.on("radius", function(radius) {
                                    countryLabel.set("x", radius);
                                })

                                return am5.Bullet.new(root, {
                                    sprite: container,
                                    dynamic: true
                                });
                            });

                            bubbleSeries.bullets.push(function(root, series, dataItem) {
                                return am5.Bullet.new(root, {
                                    sprite: am5.Label.new(root, {
                                        text: "{value.formatNumber('#.')}",
                                        fill: am5.color(0xffffff),
                                        populateText: true,
                                        centerX: am5.p50,
                                        centerY: am5.p50,
                                        textAlign: "center"
                                    }),
                                    dynamic: true
                                });
                            });



                            // minValue and maxValue must be set for the animations to work
                            bubbleSeries.set("heatRules", [{
                                target: circleTemplate,
                                dataField: "value",
                                min: 10,
                                max: 50,
                                minValue: 0,
                                maxValue: 100,
                                key: "radius"
                            }]);

                            bubbleSeries.data.setAll(data);

                            updateData();
                            setInterval(function() {
                                updateData();
                            }, 2000)

                            function updateData() {
                                for (var i = 0; i < bubbleSeries.dataItems.length; i++) {
                                    bubbleSeries.data.setIndex(i, {
                                        value: data[i].value,
                                        id: data[i].id,
                                        name: data[i].name
                                    })
                                }
                            }


                        }); // end am5.ready()
                    }
                });
            }

            // return false;
        });

        // function infografis(data) {

        // }
    </script>




    <script type="text/javascript" src="https://cdn.datatables.net/fixedcolumns/4.2.1/js/dataTables.fixedColumns.min.js"></script>