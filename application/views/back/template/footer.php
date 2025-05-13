</div>
        </div>
        <!-- END : End Main Content-->

        <!-- BEGIN : Footer-->
        <!--footer class="footer footer-static footer-light">
          <p class="clearfix text-muted text-sm-center px-2"><span>Copyright  &copy; 2022 <a href="https://sejaman.com" id="pixinventLink" class="text-bold-800 primary darken-2">Sejaman.com </a>, All rights reserved. </span></p>
        </footer-->
        <!-- End : Footer-->

      </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->

    <!-- BEGIN VENDOR JS-->

    <script src="<?php echo base_url('app-assets/') ?>vendors/js/core/jquery-3.2.1.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/core/popper.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/core/bootstrap.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/perfect-scrollbar.jquery.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/prism.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/jquery.matchHeight-min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/screenfull.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>vendors/js/pace/pace.min.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>js/app-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>js/notification-sidebar.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>js/customizer.js" type="text/javascript"></script>
    <script src="<?php echo base_url('app-assets/') ?>/js/tooltip.js" type="text/javascript"></script>
    
    <!-- Datatables -->

    <script src="<?php echo base_url('assets/template/backend/') ?>js/plugin/datatables/datatables.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#datatable').DataTable({
              "scrollX" : true,
              "scrollY" : false,
            });
            $('.datatable').DataTable({
              "scrollX" : true,
              "scrollY" : false,
            });

            $('a[data-toggle="tab"]').on('shown.bs.tab', function(e){
               $($.fn.dataTable.tables(true)).DataTable()
                  .columns.adjust();
            });
        } );
    </script>
    
    <!-- Select2 -->
    <script src="<?php echo base_url('assets/plugins/select2/dist/js/select2.full.min.js')?>"></script>
    <script type="text/javascript">
        $('.selectpicker').select2();
    </script>
    <!-- bootstrap datepicker -->
    <script src="<?php echo base_url('assets/plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')?>"></script>
    <script type="text/javascript">
    //curency start
    $("input[data-type='currency']").on({
        keyup: function() {
          formatCurrency($(this));
        },
        blur: function() { 
          formatCurrency($(this), "blur");
        }
    });

    function formatNumber(n) {
      return n.replace(/\D/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    }

    function formatCurrency(input, blur) {
      var input_val = input.val();
      if (input_val === "") { return; }
      var original_len = input_val.length;
      var caret_pos = input.prop("selectionStart");
      if (input_val.indexOf(".") >= 0) {
        var decimal_pos = input_val.indexOf(".");
        var left_side = input_val.substring(0, decimal_pos);
        var right_side = input_val.substring(decimal_pos);
        left_side = formatNumber(left_side);
        right_side = formatNumber(right_side);
        if (blur === "blur") {
          right_side += "00";
        }
        right_side = right_side.substring(0, 2);
        input_val = left_side + "." + right_side;

      } else {
        input_val = formatNumber(input_val);
        input_val = input_val;
        if (blur === "blur") {
          input_val += "";
        }
      }
      input.val(input_val);
      var updated_len = input_val.length;
      caret_pos = updated_len - original_len + caret_pos;
      input[0].setSelectionRange(caret_pos, caret_pos);
    }

    function formatValue(id) {
        var x = document.getElementById(id).value;
        if (/^[0-9.,]+$/.test(x)) {
            document.getElementById(id).value = parseFloat(
                x.replace(/,/g, "")
            ).toLocaleString("en");
        } else {
            document.getElementById(id).value = x.substring(0, x.length - 1);
        }
    }

  </script>

</body>
</html>