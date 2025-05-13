// -------------- add record dan validasi --------------
//------------------------------- step 1 ----------------------------------
$(".next-1").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 1);
});
//------------------------------- step 2 ----------------------------------
$(".next-2").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 2);
});
//------------------------------- step 3 ----------------------------------
$(".next-3").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 3);
});
//------------------------------- step 4 ----------------------------------
$(".next-4").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 4);
});
//------------------------------- step 5 ----------------------------------
$(".next-5").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 5);
});
//------------------------------- step 6 ----------------------------------
$(".next-6").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 6);
});
//------------------------------- step 7 ----------------------------------
$(".next-7").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 7);
});
//------------------------------- step 8 ----------------------------------
$(".next-8").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 8);
});
//------------------------------- step 9 ----------------------------------
$(".next-9").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 9);
});
//------------------------------- step 10 ----------------------------------
$(".next-10").click(function () {
  var $active = $(".wizard .nav-tabs li.active");
  $active.next().removeClass("disabled");
  nextTab($active, 10);
});

$(".next-11").click(function () {
  var data = new FormData();

  // I. DATA MASUK LPM
  var maps = $(".maps").val();
  var tanggal_masuk = $(".tanggal_masuk").val();
  var petugas_konseling = $(".petugas_konseling").val();
  var petugas_survey = $(".petugas_survey").val();
  // II. PELAKSANAAN SURVEY
  var pekan = $(".pekan:checked").val();
  // III. IDENTITAS MUSTAHIK
  var nama_mustahik = $(".nama_mustahik").val();
  var jenis_kelamin = $(".jenis_kelamin:checked").val();
  var usia = $(".usia").val();
  var nama_kepala_keluarga = $(".nama_kepala_keluarga").val();
  var pekerjaan = $(".pekerjaan").val();
  var penghasilan = $(".penghasilan").val();
  var jumlah_tanggungan = $(".jumlah_tanggungan").val();
  var alamat = $(".alamat").val();
  var provinsi = $(".provinsi").val();
  var kelurahan = $(".kelurahan").val();
  var kecamatan = $(".kecamatan").val();
  var kabupaten = $(".kabupaten").val();
  const foto = $(".foto").prop("files")[0];
  var no_telp = $(".no_telp").val();
  // IV. IDENTITAS MUSTAHIK : 6-30
  var no_1 = $(".no_1:checked").val();
  var no_2 = $(".no_2:checked").val();
  var no_3 = $(".no_3:checked").val();
  var no_4 = $(".no_4:checked").val();
  var no_5 = $(".no_5:checked").val();
  var no_6 = $(".no_6:checked").val();
  // V. PENGELUARAN RUTIN BULANAN : 4-20
  var no_7 = $(".no_7:checked").val();
  var no_8 = $(".no_8:checked").val();
  var no_9 = $(".no_9:checked").val();
  var no_10 = $(".no_10:checked").val();
  var no_11 = $(".no_11").val();
  // VI. POLA HIDUP : 5-15
  var no_12 = $(".no_12:checked").val();
  var no_13 = $(".no_13:checked").val();
  var no_14 = $(".no_14:checked").val();
  // VII. INDEX RUMAH: 12-60
  var no_15 = $(".no_15:checked").val();
  var no_16 = $(".no_16:checked").val();
  var no_17 = $(".no_17:checked").val();
  var no_18 = $(".no_18:checked").val();
  var no_19 = $(".no_19:checked").val();
  var no_20 = $(".no_20:checked").val();
  var no_21 = $(".no_21:checked").val();
  var no_22 = $(".no_22:checked").val();
  var no_23 = $(".no_23:checked").val();
  var no_24 = $(".no_24:checked").val();
  var no_25 = $(".no_25:checked").val();
  var no_26 = $(".no_26:checked").val();
  // VIII. KEPEMILIKAN BARANG : 3-15
  var no_27 = $(".no_27:checked").val();
  var no_28 = $(".no_28:checked").val();
  var no_29 = $(".no_29:checked").val();
  // IX. DATA KELUARGA : 5-25
  var no_30 = $(".no_30:checked").val();
  var no_31 = $(".no_31:checked").val();
  var no_32 = $(".no_32:checked").val();
  var no_33 = $(".no_33:checked").val();
  var no_34 = $(".no_34:checked").val();
  // X. INDIKATOR PERILAKU
  var no_35 = $(".no_35:checked").val();
  var no_36 = $(".no_36:checked").val();
  var no_37 = $(".no_37:checked").val();
  var no_38 = $(".no_38:checked").val();
  var no_39 = $(".no_39:checked").val();
  var no_40 = $(".no_40:checked").val();
  var no_41 = $(".no_41:checked").val();

  var hasil_scoring = $(".hasil_scoring").val();
  var rekomendasi_skoring = $(".rekomendasi_skoring").val();
  var jenis_permohonan = $(".jenis_permohonan").val();
  var asnaf = $(".asnaf:checked").val();
  var kelayakan = $(".kelayakan").val();
  var alasan = $(".alasan").val();
  var catatan = $(".catatan").val();
  var rekomendasi_lpm = $(".rekomendasi_lpm").val();
  var bentuk_bantuan = $(".bentuk_bantuan:checked").val();
  var sifat_bantuan = $(".sifat_bantuan:checked").val();
  var tindak_lanjut = $(".tindak_lanjut:checked").val();
  var tanggal_rekomendasi = $(".tanggal_rekomendasi").val();
  const tanda_tangan_surveyor = $(".tanda_tangan_surveyor").prop("files")[0];
  var id = $(".id").val();

  // I. DATA MASUK LPM
  data.append("maps", maps);
  data.append("tanggal_masuk", tanggal_masuk);
  data.append("petugas_konseling", petugas_konseling);
  data.append("petugas_survey", petugas_survey);
  // II. PELAKSANAAN SURVEY
  data.append("pekan", pekan);
  // III. IDENTITAS MUSTAHIK
  data.append("nama_mustahik", nama_mustahik);
  data.append("jenis_kelamin", jenis_kelamin);
  data.append("usia", usia);
  data.append("nama_kepala_keluarga", nama_kepala_keluarga);
  data.append("pekerjaan", pekerjaan);
  data.append("penghasilan", penghasilan);
  data.append("jumlah_tanggungan", jumlah_tanggungan);
  data.append("alamat", alamat);
  data.append("provinsi", provinsi);
  data.append("kabupaten", kabupaten);
  data.append("kecamatan", kecamatan);
  data.append("kelurahan", kelurahan);
  data.append("foto", foto);
  data.append("no_telp", no_telp);
  // IV. IDENTITAS MUSTAHIK : 6-30
  data.append("no_1", no_1);
  data.append("no_2", no_2);
  data.append("no_3", no_3);
  data.append("no_4", no_4);
  data.append("no_5", no_5);
  data.append("no_6", no_6);
  // V. PENGELUARAN RUTIN BULANAN : 4-20
  data.append("no_7", no_7);
  data.append("no_8", no_8);
  data.append("no_9", no_9);
  data.append("no_10", no_10);
  data.append("no_11", no_11);
  // VI. POLA HIDUP : 5-15
  data.append("no_12", no_12);
  data.append("no_13", no_13);
  data.append("no_14", no_14);
  // VII. INDEX RUMAH: 12-60
  data.append("no_15", no_15);
  data.append("no_16", no_16);
  data.append("no_17", no_17);
  data.append("no_18", no_18);
  data.append("no_19", no_19);
  data.append("no_20", no_20);
  data.append("no_21", no_21);
  data.append("no_22", no_22);
  data.append("no_23", no_23);
  data.append("no_24", no_24);
  data.append("no_25", no_25);
  data.append("no_26", no_26);
  // VIII. KEPEMILIKAN BARANG : 3-15
  data.append("no_27", no_27);
  data.append("no_28", no_28);
  data.append("no_29", no_29);
  // IX. DATA KELUARGA : 5-25
  data.append("no_30", no_30);
  data.append("no_31", no_31);
  data.append("no_32", no_32);
  data.append("no_33", no_33);
  data.append("no_34", no_34);
  // X. INDIKATOR PERILAKU
  data.append("no_35", no_35);
  data.append("no_36", no_36);
  data.append("no_37", no_37);
  data.append("no_38", no_38);
  data.append("no_39", no_39);
  data.append("no_40", no_40);
  data.append("no_41", no_41);

  data.append("hasil_scoring", hasil_scoring);
  data.append("rekomendasi_skoring", rekomendasi_skoring);
  data.append("jenis_permohonan", jenis_permohonan);
  data.append("asnaf", asnaf);
  data.append("kelayakan", kelayakan);
  data.append("alasan", alasan);
  data.append("catatan", catatan);
  data.append("rekomendasi_lpm", rekomendasi_lpm);
  data.append("bentuk_bantuan", bentuk_bantuan);
  data.append("sifat_bantuan", sifat_bantuan);
  data.append("tindak_lanjut", tindak_lanjut);
  data.append("tanggal_rekomendasi", tanggal_rekomendasi);
  data.append("tanda_tangan_surveyor", tanda_tangan_surveyor);
  data.append("id", id);
  console.log({ datadikirim: data });
  var parent = $(this).parent().parent();
  $.ajax({
    type: "POST",
    url: "update",
    data: data,
    cache: false,
    contentType: false,
    processData: false,
    beforeSend: function () {
      swal({
        title: "Berhasil!",
        html: "Data kamu telah disimpan.",
        type: "success",
      });
    },

    success: function (data) {
      console.log(data);
      setTimeout(function () {
        $(".next-11").html("Submit");
        setTimeout(function () {
          window.location.reload();
        }, 1500);
      }, 1500);
    },

    error: function (data) {
      swal("Gagal!", "Data gagal disimpan.", "error");
    },
  });
});

// -------------- sum score --------------

$(document).ready(function () {
  $(".score").on("change", function () {
    var total = 0;
    $(".score:checked").each(function () {
      total += Number(this.value);
    });

    $(".total").text(total);

    if (total >= "131") {
      $(".keterangan").html(
        '<span class="text-warning">Perlu mendapat perhatian khusus</span>'
      );
      $(".rekomendasi").html(
        '<span class="text-success" style="background:#ffffff">Ya</span>'
      );
      $(".keterangan_value").text("Perlu perhatian khusus");
      $(".rekomendasi_value").text("Ya");
    } else if (total >= "71" && total <= "130") {
      $(".keterangan").html(
        '<span class="text-success" style="background:#ffffff">Layak dibantu</span>'
      );
      $(".rekomendasi").html(
        '<span class="text-success" style="background:#ffffff">Ya</span>'
      );
      $(".keterangan_value").text("Layak dibantu");
      $(".rekomendasi_value").text("Ya");
    } else if (total <= "37" && total <= "70") {
      $(".keterangan").html(
        '<span class="text-danger">Tidak layak dibantu</span>'
      );
      $(".rekomendasi").html('<span class="text-danger">Tidak</span>');
      $(".keterangan_value").text("Tidak layak dibantu");
      $(".rekomendasi_value").text("Tidak");
    }
  });
});

// -------------- step wizard --------------

$(document).ready(function () {
  $(".nav-tabs > li a[title]").tooltip();
  //Wizard
  $('a[data-toggle="tab"]').on("show.bs.tab", function (e) {
    var $target = $(e.target);
    if ($target.parent().hasClass("disabled")) {
      return false;
    }
  });
  $(".next-step").click(function (e) {
    var $active = $(".wizard .nav-tabs li.active");
    $active.next().removeClass("disabled");
    nextTab($active);
  });
  $(".prev-step").click(function (e) {
    var $active = $(".wizard .nav-tabs li.active");
    prevTab($active);
  });
});

function nextTab(elem, step) {
  if (step == 1) {
    $("#step1").removeClass("active");
    $("#step2").addClass("active");
  } else if (step == 2) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").addClass("active");
  } else if (step == 3) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").addClass("active");
  } else if (step == 4) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").addClass("active");
  } else if (step == 5) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").addClass("active");
  } else if (step == 6) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").removeClass("active");
    $("#step7").addClass("active");
  } else if (step == 7) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").removeClass("active");
    $("#step7").removeClass("active");
    $("#step8").addClass("active");
  } else if (step == 8) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").removeClass("active");
    $("#step7").removeClass("active");
    $("#step8").removeClass("active");
    $("#step9").addClass("active");
  } else if (step == 9) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").removeClass("active");
    $("#step7").removeClass("active");
    $("#step8").removeClass("active");
    $("#step9").removeClass("active");
    $("#step10").addClass("active");
  } else if (step == 10) {
    $("#step1").removeClass("active");
    $("#step2").removeClass("active");
    $("#step3").removeClass("active");
    $("#step4").removeClass("active");
    $("#step5").removeClass("active");
    $("#step6").removeClass("active");
    $("#step7").removeClass("active");
    $("#step8").removeClass("active");
    $("#step9").removeClass("active");
    $("#step10").removeClass("active");
    $("#step11").addClass("active");
  }
  $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
  $(elem).prev().find('a[data-toggle="tab"]').click();
}

// --------------- geolocation ---------------
/*
window.onload=function() {
if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(showPosition);
} else {
  $(".maps").html("Geolocation is not supported by this browser.");
};
};
function showPosition(position) {
$(".maps").html("https://www.google.com/maps/place/" + position.coords.latitude + "+" + position.coords.longitude + "/@" + position.coords.latitude + "+" + position.coords.longitude + ",17z");
}; */

// ----------- Drag and drop file ----------

function readFile(input) {
  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      var htmlPreview =
        '<img width="200" class="img-thumbnail" src="' +
        e.target.result +
        '" />' +
        "<br><center>Foto Baru</center>";
      var wrapperZone = $(input).parent();
      var previewZone = $(input).parent().parent().find(".preview-zone");
      var boxZone = $(input)
        .parent()
        .parent()
        .find(".preview-zone")
        .find(".box")
        .find(".gambar");

      wrapperZone.removeClass("dragover");
      previewZone.removeClass("hidden");
      boxZone.empty();
      boxZone.append(htmlPreview);
    };

    reader.readAsDataURL(input.files[0]);
  }
}

function reset(e) {
  e.wrap("<form>").closest("form").get(0).reset();
  e.unwrap();
}

$(".dropzone").change(function () {
  readFile(this);
});

$(".dropzone-wrapper").on("dragover", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).addClass("dragover");
});

$(".dropzone-wrapper").on("dragleave", function (e) {
  e.preventDefault();
  e.stopPropagation();
  $(this).removeClass("dragover");
});

$(".remove-preview").on("click", function () {
  var boxZone = $(this).parents(".preview-zone").find(".gambar");
  var previewZone = $(this).parents(".preview-zone");
  var dropzone = $(this).parents(".form-group").find(".dropzone");
  boxZone.empty();
  previewZone.addClass("hidden");
  reset(dropzone);
});
$(".prev-2").click(function () {
  $("#step1").addClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-3").click(function () {
  $("#step1").removeClass("active");
  $("#step2").addClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-4").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").addClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-5").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").addClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-6").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").addClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-7").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").addClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-8").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").addClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-9").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").addClass("active");
  $("#step9").removeClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-10").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").addClass("active");
  $("#step10").removeClass("active");
  $("#step11").removeClass("active");
});
$(".prev-11").click(function () {
  $("#step1").removeClass("active");
  $("#step2").removeClass("active");
  $("#step3").removeClass("active");
  $("#step4").removeClass("active");
  $("#step5").removeClass("active");
  $("#step6").removeClass("active");
  $("#step7").removeClass("active");
  $("#step8").removeClass("active");
  $("#step9").removeClass("active");
  $("#step10").addClass("active");
  $("#step11").removeClass("active");
});
