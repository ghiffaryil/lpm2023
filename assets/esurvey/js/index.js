$(document).ready(function () {
  $("#data thead").hide();
  var data = $("#data").DataTable({
    ajax: "getScoring",
    bInfo: true,
    pageLength: 9,
    lengthChange: false,
    deferRender: true,
    processing: true,
    language: {
      sInfo: "Showing _START_ to _END_ of _TOTAL_ entries",
      paginate: {
        previous: "<i class='fa fa-angle-left'></i>",
        next: "<i class='fa fa-angle-right'></i>",
      },
    },
    columns: [
      {
        render: function (data, type, row, meta) {
          if (row.approve != "0") {
            var approve = '<i class="fa fa-check-circle"></i>';
            var approve_class = "hidden";
            var unapproved_class = "";
          } else {
            var approve = '<i class="fa fa-times-circle"></i>';
            var unapproved_class = "hidden";
            var approve_class = "";
          }
          var name = [];
          name[1] = "Januari";
          name[2] = "Februari";
          name[3] = "Maret";
          name[4] = "April";
          name[5] = "Mei";
          name[6] = "Juni";
          name[7] = "Juli";
          name[8] = "Agustus";
          name[9] = "September";
          name[10] = "Oktober";
          name[11] = "November";
          name[12] = "Desember";
          var date_format = new Date(row.created_at);
          var tanggal = date_format.getDate();
          var bulan = date_format.getMonth() + 1;
          var tahun = date_format.getFullYear();
          var html =
            '<div class="panel panel-default p-1"  >' +
            '  <div class="panel-body" >' +
            '    <a href="#" class="dropdown-toggle menu pull-right" data-toggle="dropdown">' +
            '    <div class="row pt-3" style="background-color:#378ED3; border-radius: 20px; width:300px; height:200px" width="100px" >' +
            '      <div class="col-lg-3 col-xs-3 col-sm-3 col-md-3">' +
            '         <img class="img-responsive" style="padding:1px; padding-top:7px" src="../assets/esurvey/foto/' +
            row.foto +
            '" width="70px" >' +
            '         <div class="card-text text-center">score</div>' +
            '         <div class="card-text text-center"><span class="badge badge-primary"><strong>' +
            row.hasil_scoring +
            "</span></strong></div>" +
            "      </div>" +
            '      <div class="col-lg-7 col-xs-7 text-capitalize">' +
            '         <div class="card-text" style="font-size:12px"><strong>' +
            row.nama_mustahik +
            " " +
            approve +
            "</strong></div>" +
            '         <div class="card-text" style="font-size:12px"><i class="fa fa-female"></i><i class="fa fa-male"></i><small> ' +
            row.jenis_kelamin +
            "</small></div>" +
            '         <div class="card-text" style="font-size:12px"><i class="fa fa-map-marker-alt"></i> <small>  &nbsp;' +
            row.alamat +
            " </small></div>" +
            '         <div class="card-text" style="font-size:12px"><i class="fa fa-calendar-alt"></i><small> ' +
            tanggal +
            " " +
            name[bulan] +
            " " +
            tahun +
            "</small></div>" +
            "      </div>" +
            "    </div>" +
            "    </a>" +
            '         <ul class="dropdown-menu dropdown-menu-right" style="box-shadow:0 0 1px black; margin-right: 60px; margin-top:-142px; background-color:#FFFFFF">' +
            '           <li><a href="javascript:void(0);" id="' +
            row.id +
            '" class="detail">' +
            '               <i class="fa fa-eye"></i> Detail</a></li>' +
            '           <li class="' +
            approve_class +
            '"><a href="javascript:void(0);" id="' +
            row.id +
            '" class="approve">' +
            '               <i class="fa fa-check"></i> &nbsp;Setuju</a></li>' +
            '           <li class="' +
            unapproved_class +
            '"><a href="javascript:void(0);" id="' +
            row.id +
            '" class="unapproved">' +
            '               <i class="fa fa-times-circle"></i> &nbsp;Tidak Setuju</a></li>' +
            '           <li><a href="javascript:void(0);" id="' +
            row.id +
            '" class="edit">' +
            '               <i class="fa fa-pencil-alt"></i> &nbsp;Edit</a></li>' +
            '           <li class="visible-lg"><a href="javascript:void(0);" id="' +
            row.id +
            '" class="cetak">' +
            '               <i class="fa fw fa-print"></i> &nbsp;Cetak</a></li>' +
            '           <li><a href="javascript:void(0);" id="' +
            row.id +
            '" class="delete">' +
            '               <i class="fa fa-trash-alt"></i> &nbsp;&nbsp;Hapus</a></form></li>' +
            "         </ul>" +
            "  </div>" +
            "</div>";
          return html;
        },
      },
      {
        data: "nama_mustahik",
        visible: false,
      },
    ],
  });

  data.on("draw", function (data) {
    $("#data tbody").addClass("row");
    $("#data tbody tr").addClass("col-lg-4 col-md-4 col-xs-12");
  });
});

$(document).delegate(".approve", "click", function () {
  if (confirm("Apa kamu yakin? Data akan di setujui !")) {
    var data = new FormData();
    var id = $(this).attr("id");
    data.append("id", id);
    var parent = $(this).parent().parent();
    $.ajax({
      type: "POST",
      url: `approved`,
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function () {
        parent.fadeOut("slow", function () {
          $(this).remove();
        });
        $("#data").DataTable().ajax.reload(null, false);
        swal("Berhasil!", "berhasil diubah menjadi setuju.", "success");
      },
      error: function () {
        alert("Gagal!", "Tidak berhasil.", "error");
      },
    });
  }
});

$(document).delegate(".unapproved", "click", function () {
  if (confirm("Apa kamu yakin? Data akan di setujui !")) {
    var data = new FormData();
    var id = $(this).attr("id");
    data.append("id", id);
    var parent = $(this).parent().parent();
    $.ajax({
      type: "POST",
      url: "unapproved",
      data: data,
      cache: false,
      contentType: false,
      processData: false,
      success: function () {
        parent.fadeOut("slow", function () {
          $(this).remove();
        });
        $("#data").DataTable().ajax.reload(null, false);
        swal("Berhasil!", "berhasil diubah menjadi tidak setuju.", "success");
      },
      error: function () {
        alert("Gagal!", "Tidak berhasil.", "error");
      },
    });
  }
});

// --------------------- Delete -------------------------

$(document).delegate(".delete", "click", function () {
  if (confirm("Apa kamu yakin? Data akan dihapus secara permanen !")) {
    var id = $(this).attr("id");
    var parent = $(this).parent().parent();
    $.ajax({
      type: "DELETE",
      url: "hapus?id=" + id,
      cache: false,
      success: function () {
        parent.fadeOut("slow", function () {
          $(this).remove();
        });
        $("#data").DataTable().ajax.reload(null, false);
        swal("Berhasil!", "Data kamu telah dihapus.", "success");
      },
      error: function () {
        alert("Gagal!", "Data kamu gagal dihapus.", "error");
      },
    });
  }
});

// ------------------------- Print -------------------------

$(document).delegate(".cetak", "click", function () {
  var id = $(this).attr("id");
  PopupCenter("print?id=" + id, "cetak", 800, 800);
});

// ------------------------- Detail -------------------------

$(document).delegate(".detail", "click", function () {
  var id = $(this).attr("id");
  window.location.href = "detail?id=" + id;
});

// ------------------------- Detail -------------------------

$(document).delegate(".edit", "click", function () {
  var id = $(this).attr("id");
  window.location.href = "edit?id=" + id;
});

//popup window
function PopupCenter(pageURL, title, w, h) {
  var left = screen.width / 2 - w / 2;
  var top = screen.height / 2 - h / 2;
  var targetWin = window.open(
    pageURL,
    title,
    "toolbar=no, location=no, directories=no, status=no, menubar=0, scrollbars=no, resizable=no, copyhistory=no, width=" +
      w +
      ", height=" +
      h +
      ", top=" +
      top +
      ", left=" +
      left
  );
}
