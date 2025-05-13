  <!-- jQuery 3 -->
  <script src="../assets/esurvey/bower_components/jquery/dist/jquery.min.js"></script>
  <!--script src="https://code.jquery.com/jquery-3.4.1.min.js"></script-->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <!-- Bootstrap 3.3.7 -->
  <script src="../assets/esurvey/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/esurvey/dist/js/adminlte.min.js"></script>
  <!-- font Awesome-->
  <link rel="stylesheet" href="../assets/esurvey/plugins/fontawesome-free-5.15.4-web/js/all.min.js">
  <!-- AdminLTE for demo purposes -->
  <script src="../assets/esurvey/dist/js/demo1.js"></script>
  <!-- daterangepicker -->
  <script src="../assets/esurvey/bower_components/moment/min/moment.min.js"></script>
  <script type="text/javascript" src="../assets/esurvey/bower_components/jquery-ui/jquery-ui.js"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
  <script src="../assets/esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.js"></script>
  <script src="../assets/esurvey/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <!-- Bootstrap WYSIHTML5 -->
  <script src="../assets/esurvey/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- DataTables -->
  <script type="text/javascript" src="../assets/esurvey/dist/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="../assets/esurvey/dist/js/dataTables.bootstrap.min.js"></script>
  <script src="../assets/esurvey/dist/js/bootstrap-select.min.js"></script>
  <!-- Select2 -->
  <script src="../assets/esurvey/bower_components/select2/dist/js/select2.full.min.js"></script>
  <script>
      $(function() {
          $('.select2').select2()
      });
  </script>

  <!-- popover -->
  <script>
      $(document).ready(function() {
          $('[data-toggle="popover"]').popover();
      });
  </script>

  <script type="text/javascript">
      //popup window
      function PopupCenter(pageURL, title, w, h) {
          var left = (screen.width / 2) - (w / 2);
          var top = (screen.height / 2) - (h / 2);
          var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=0, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
      }
  </script>

  <!-- Auto complate off --->
  <script type="text/javascript">
      $('input').on('focus', function() {
          $(this).attr('autocomplete', 'off')
      });
  </script>

  <!--script src="../assets/esurvey/dist/js/jquery.idle.js" type="text/javascript"></script>
  <script>
      $(document).idle({
          onIdle: function(){
              window.location="../../pages/login/logout.php";
          },
          idle: 50000
      });
  </script-->

  <script>
      //image preview before uploaded
      var viewImageEdit = function(event) {
          var preview = document.getElementById('preview-edit');
          preview.src = URL.createObjectURL(event.target.files[0]);
      };
      var viewImageTambah = function(event) {
          var preview = document.getElementById('preview-tambah');
          preview.src = URL.createObjectURL(event.target.files[0]);
      };
  </script>