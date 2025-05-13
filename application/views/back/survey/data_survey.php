<?php $this->load->view('back/template/meta'); ?>
<?php $this->load->view('back/template/header'); ?>
<?php $this->load->view('back/template/sidebar'); ?>

<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/datetime/1.1.2/css/dataTables.dateTime.min.css">



<!-- Font Awesome
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"/-->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/plugins/fontawesome-free-5.15.4-web/css/all.min.css">
<!-- Animation CSS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
<!-- iCheck for checkboxes and radio inputs -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/icheck-bootstrap/3.0.1/icheck-bootstrap.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/Ionicons/css/ionicons.min.css">
<!-- Theme style -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/dist/css/AdminLTE.min.css"> -->
<!-- AdminLTE Skins -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/dist/css/skins/_all-skins.min.css">
<!-- DataTable -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
<!-- Footer Sidebar -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/dist/css/custom/style.css"> -->
<!-- Select2 -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/select2/dist/css/select2.min.css"> -->
<!-- Date Picker -->
<!-- <script src="<?php echo base_url('assets/esurvey') ?>/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script> -->
<!-- bootstrap datepicker -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<!-- Daterange picker -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/bootstrap-daterangepicker/daterangepicker.css">
<!-- bootstrap wysihtml5 - text editor -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

<link rel='stylesheet' href='//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'>

<!-- Google Font -->
<!-- <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic"> -->
<!-- Disable Back Browser -->
<!--script type="text/javascript">
    history.pushState(null, null, location.href);
    window.onpopstate = function () {
        history.go(1);
    };
  </script-->

<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/sweet_modal/dist/min/jquery.sweet-modal.min.css" />
<link href="https://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/plugins/calendar/aicon/style.css"> -->
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/plugins/calendar/css/jquery-pseudo-ripple.css">
<link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/plugins/calendar/css/jquery-nao-calendar.css">
<!-- <style>
    .calendar {
        margin: 150px auto;
        max-width: 480px;
    }

    .myCalendar.nao-month td {
        padding: 15px;
    }

    .myCalendar .month-head>div,
    .myCalendar .month-head>button {
        padding: 15px;
    }

    .bg-form {
        background-color: #ECF7FA;
    }

    @media only screen and (min-width: 992px) {
        .desktop {
            visibility: hidden;
        }
    }

    .border-botom {
        border-bottom: 1px dotted;
    }

    .required.control-label:after {
        content: " *";
        color: red;
    }

    @font-face {
        font-family: barcode;
        src: url(<?php echo base_url('assets') ?>/font/barcode.ttf);
    }

    .form {
        padding: 2px;
        text-transform: capitalize;
    }

    .scroll {
        max-height: 36em;
        overflow-y: transparent;
        overflow-x: hidden;
    }

    .line {
        height: 1px;
        width: 105%;
        margin-top: 3px;
        margin-bottom: 3px;
        background-color: grey;
    }

    .hover {
        color: #fff;
        background-color: #222d32;
    }

    .hover:hover {
        color: #fff;
        background-color: #425567;
    }
</style>

<style type="text/css">
    .container {
        padding: 50px 10%;
    }

    .box {
        position: relative;
        background: #ffffff;
        width: 100%;
    }

    .box-header {
        color: #444;
        display: block;
        padding: 10px;
        position: relative;
        border-bottom: 1px solid #f4f4f4;
        margin-bottom: 10px;
    }

    .box-tools {
        position: absolute;
        right: 10px;
        top: 5px;
    }

    .dropzone-wrapper {
        border: 2px dashed #91b0b3;
        color: #92b0b3;
        position: relative;
        height: 80px;
    }

    .dropzone-desc {
        position: absolute;
        margin: 0 auto;
        left: 0;
        right: 0;
        text-align: center;
        width: 50%;
        top: 15px;
        font-size: 16px;
    }

    .dropzone,
    .dropzone:focus {
        position: absolute;
        outline: none !important;
        width: 100%;
        height: 80px;
        cursor: pointer;
        opacity: 0;
    }

    .dropzone-wrapper:hover,
    .dropzone-wrapper.dragover {
        background: #ecf0f5;
    }

    .preview-zone {
        text-align: center;
    }

    .preview-zone .box {
        box-shadow: none;
        border-radius: 0;
        margin-bottom: 0;
    }

    /* fixed select2 */
    .select2-container {
        width: 100% !important;
    }

    .select2-search--dropdown .select2-search__field {
        width: 98%;
    }
</style> -->

<!-- <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" /> -->

<!-- <style type="text/css">
    .float {
        position: fixed;
        right: 32px;
        text-align: center;
    }
</style>

<style type="text/css">
    #data.dataTable.no-footer {
        border-bottom: unset;
    }

    #data tbody td {
        display: block;
        border: unset;
    }

    #data>tbody>tr>td {
        border-top: unset;
    }
</style>

<style type="text/css">
    /* width */
    ::-webkit-scrollbar {
        width: 10px;
    }

    /* Track */
    ::-webkit-scrollbar-track {
        background: #f1f1f1;
    }

    /* Handle */
    ::-webkit-scrollbar-thumb {
        background: #888;
    }

    /* Handle on hover */
    ::-webkit-scrollbar-thumb:hover {
        background: #555;
    }
</style>

<style type="text/css">
    .toolbar {
        float: left;
    }
</style> -->
<!-- <link rel="stylesheet" href="<?php echo base_url('assets/esurvey') ?>/bower_components/bootstrap/dist/css/bootstrap.min.css"> -->


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

                <style type="text/css">
                    .hidden {
                        display: none !important;
                    }

                    .open>.dropdown-toggle.btn-default {
                        color: #333;
                        background-color: #e6e6e6;
                        background-image: none;
                        border-color: #adadad;
                    }

                    .btn-default.active.focus,
                    .btn-default.active:focus,
                    .btn-default.active:hover,
                    .btn-default:active.focus,
                    .btn-default:active:focus,
                    .btn-default:active:hover,
                    .open>.dropdown-toggle.btn-default.focus,
                    .open>.dropdown-toggle.btn-default:focus,
                    .open>.dropdown-toggle.btn-default:hover {
                        color: #333;
                        background-color: #d4d4d4;
                        border-color: #8c8c8c;
                    }

                    article,
                    aside,
                    details,
                    figcaption,
                    figure,
                    footer,
                    header,
                    hgroup,
                    main,
                    menu,
                    nav,
                    section,
                    summary {
                        display: block;
                    }

                    a {
                        color: #fff;
                    }

                    a:hover {
                        color: #fff;
                    }

                    .panel {
                        margin-bottom: 20px;
                        background-color: #fff;
                        border: 0px solid transparent;
                        border-radius: 4px;
                        -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
                    }

                    .panel-body {
                        padding: 15px;
                    }

                    .panel-heading {
                        padding: 10px 15px;
                        border-bottom: 1px solid transparent;
                        border-top-left-radius: 3px;
                        border-top-right-radius: 3px;
                    }

                    .panel-heading>.dropdown .dropdown-toggle {
                        color: inherit;
                    }

                    .panel-title {
                        margin-top: 0;
                        margin-bottom: 0;
                        font-size: 16px;
                        color: inherit;
                    }

                    .panel-title>.small,
                    .panel-title>.small>a,
                    .panel-title>a,
                    .panel-title>small,
                    .panel-title>small>a {
                        color: inherit;
                    }

                    .panel-footer {
                        padding: 10px 15px;
                        background-color: #f5f5f5;
                        border-top: 1px solid #ddd;
                        border-bottom-right-radius: 3px;
                        border-bottom-left-radius: 3px;
                    }

                    .panel>.list-group,
                    .panel>.panel-collapse>.list-group {
                        margin-bottom: 0;
                    }

                    .panel>.list-group .list-group-item,
                    .panel>.panel-collapse>.list-group .list-group-item {
                        border-width: 1px 0;
                        border-radius: 0;
                    }

                    .panel>.list-group:first-child .list-group-item:first-child,
                    .panel>.panel-collapse>.list-group:first-child .list-group-item:first-child {
                        border-top: 0;
                        border-top-left-radius: 3px;
                        border-top-right-radius: 3px;
                    }

                    .panel>.list-group:last-child .list-group-item:last-child,
                    .panel>.panel-collapse>.list-group:last-child .list-group-item:last-child {
                        border-bottom: 0;
                        border-bottom-right-radius: 3px;
                        border-bottom-left-radius: 3px;
                    }

                    .panel>.panel-heading+.panel-collapse>.list-group .list-group-item:first-child {
                        border-top-left-radius: 0;
                        border-top-right-radius: 0;
                    }

                    .panel-heading+.list-group .list-group-item:first-child {
                        border-top-width: 0;
                    }

                    .list-group+.panel-footer {
                        border-top-width: 0;
                    }

                    .panel>.panel-collapse>.table,
                    .panel>.table,
                    .panel>.table-responsive>.table {
                        margin-bottom: 0;
                    }

                    .panel>.panel-collapse>.table caption,
                    .panel>.table caption,
                    .panel>.table-responsive>.table caption {
                        padding-right: 15px;
                        padding-left: 15px;
                    }

                    .panel>.table-responsive:first-child>.table:first-child,
                    .panel>.table:first-child {
                        border-top-left-radius: 3px;
                        border-top-right-radius: 3px;
                    }

                    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child,
                    .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child,
                    .panel>.table:first-child>tbody:first-child>tr:first-child,
                    .panel>.table:first-child>thead:first-child>tr:first-child {
                        border-top-left-radius: 3px;
                        border-top-right-radius: 3px;
                    }

                    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:first-child,
                    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:first-child,
                    .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:first-child,
                    .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:first-child,
                    .panel>.table:first-child>tbody:first-child>tr:first-child td:first-child,
                    .panel>.table:first-child>tbody:first-child>tr:first-child th:first-child,
                    .panel>.table:first-child>thead:first-child>tr:first-child td:first-child,
                    .panel>.table:first-child>thead:first-child>tr:first-child th:first-child {
                        border-top-left-radius: 3px;
                    }

                    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child td:last-child,
                    .panel>.table-responsive:first-child>.table:first-child>tbody:first-child>tr:first-child th:last-child,
                    .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child td:last-child,
                    .panel>.table-responsive:first-child>.table:first-child>thead:first-child>tr:first-child th:last-child,
                    .panel>.table:first-child>tbody:first-child>tr:first-child td:last-child,
                    .panel>.table:first-child>tbody:first-child>tr:first-child th:last-child,
                    .panel>.table:first-child>thead:first-child>tr:first-child td:last-child,
                    .panel>.table:first-child>thead:first-child>tr:first-child th:last-child {
                        border-top-right-radius: 3px;
                    }

                    .panel>.table-responsive:last-child>.table:last-child,
                    .panel>.table:last-child {
                        border-bottom-right-radius: 3px;
                        border-bottom-left-radius: 3px;
                    }

                    .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child,
                    .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child,
                    .panel>.table:last-child>tbody:last-child>tr:last-child,
                    .panel>.table:last-child>tfoot:last-child>tr:last-child {
                        border-bottom-right-radius: 3px;
                        border-bottom-left-radius: 3px;
                    }

                    .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:first-child,
                    .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:first-child,
                    .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
                    .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:first-child,
                    .panel>.table:last-child>tbody:last-child>tr:last-child td:first-child,
                    .panel>.table:last-child>tbody:last-child>tr:last-child th:first-child,
                    .panel>.table:last-child>tfoot:last-child>tr:last-child td:first-child,
                    .panel>.table:last-child>tfoot:last-child>tr:last-child th:first-child {
                        border-bottom-left-radius: 3px;
                    }

                    .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child td:last-child,
                    .panel>.table-responsive:last-child>.table:last-child>tbody:last-child>tr:last-child th:last-child,
                    .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
                    .panel>.table-responsive:last-child>.table:last-child>tfoot:last-child>tr:last-child th:last-child,
                    .panel>.table:last-child>tbody:last-child>tr:last-child td:last-child,
                    .panel>.table:last-child>tbody:last-child>tr:last-child th:last-child,
                    .panel>.table:last-child>tfoot:last-child>tr:last-child td:last-child,
                    .panel>.table:last-child>tfoot:last-child>tr:last-child th:last-child {
                        border-bottom-right-radius: 3px;
                    }

                    .panel>.panel-body+.table,
                    .panel>.panel-body+.table-responsive,
                    .panel>.table+.panel-body,
                    .panel>.table-responsive+.panel-body {
                        border-top: 1px solid #ddd;
                    }

                    .panel>.table>tbody:first-child>tr:first-child td,
                    .panel>.table>tbody:first-child>tr:first-child th {
                        border-top: 0;
                    }

                    .panel>.table-bordered,
                    .panel>.table-responsive>.table-bordered {
                        border: 0;
                    }

                    .panel>.table-bordered>tbody>tr>td:first-child,
                    .panel>.table-bordered>tbody>tr>th:first-child,
                    .panel>.table-bordered>tfoot>tr>td:first-child,
                    .panel>.table-bordered>tfoot>tr>th:first-child,
                    .panel>.table-bordered>thead>tr>td:first-child,
                    .panel>.table-bordered>thead>tr>th:first-child,
                    .panel>.table-responsive>.table-bordered>tbody>tr>td:first-child,
                    .panel>.table-responsive>.table-bordered>tbody>tr>th:first-child,
                    .panel>.table-responsive>.table-bordered>tfoot>tr>td:first-child,
                    .panel>.table-responsive>.table-bordered>tfoot>tr>th:first-child,
                    .panel>.table-responsive>.table-bordered>thead>tr>td:first-child,
                    .panel>.table-responsive>.table-bordered>thead>tr>th:first-child {
                        border-left: 0;
                    }

                    .panel>.table-bordered>tbody>tr>td:last-child,
                    .panel>.table-bordered>tbody>tr>th:last-child,
                    .panel>.table-bordered>tfoot>tr>td:last-child,
                    .panel>.table-bordered>tfoot>tr>th:last-child,
                    .panel>.table-bordered>thead>tr>td:last-child,
                    .panel>.table-bordered>thead>tr>th:last-child,
                    .panel>.table-responsive>.table-bordered>tbody>tr>td:last-child,
                    .panel>.table-responsive>.table-bordered>tbody>tr>th:last-child,
                    .panel>.table-responsive>.table-bordered>tfoot>tr>td:last-child,
                    .panel>.table-responsive>.table-bordered>tfoot>tr>th:last-child,
                    .panel>.table-responsive>.table-bordered>thead>tr>td:last-child,
                    .panel>.table-responsive>.table-bordered>thead>tr>th:last-child {
                        border-right: 0;
                    }

                    .panel>.table-bordered>tbody>tr:first-child>td,
                    .panel>.table-bordered>tbody>tr:first-child>th,
                    .panel>.table-bordered>thead>tr:first-child>td,
                    .panel>.table-bordered>thead>tr:first-child>th,
                    .panel>.table-responsive>.table-bordered>tbody>tr:first-child>td,
                    .panel>.table-responsive>.table-bordered>tbody>tr:first-child>th,
                    .panel>.table-responsive>.table-bordered>thead>tr:first-child>td,
                    .panel>.table-responsive>.table-bordered>thead>tr:first-child>th {
                        border-bottom: 0;
                    }

                    .panel>.table-bordered>tbody>tr:last-child>td,
                    .panel>.table-bordered>tbody>tr:last-child>th,
                    .panel>.table-bordered>tfoot>tr:last-child>td,
                    .panel>.table-bordered>tfoot>tr:last-child>th,
                    .panel>.table-responsive>.table-bordered>tbody>tr:last-child>td,
                    .panel>.table-responsive>.table-bordered>tbody>tr:last-child>th,
                    .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>td,
                    .panel>.table-responsive>.table-bordered>tfoot>tr:last-child>th {
                        border-bottom: 0;
                    }

                    .panel>.table-responsive {
                        margin-bottom: 0;
                        border: 0;
                    }

                    .panel-group {
                        margin-bottom: 20px;
                    }

                    .panel-group .panel {
                        margin-bottom: 0;
                        border-radius: 4px;
                    }

                    .panel-group .panel+.panel {
                        margin-top: 5px;
                    }

                    .panel-group .panel-heading {
                        border-bottom: 0;
                    }

                    .panel-group .panel-heading+.panel-collapse>.list-group,
                    .panel-group .panel-heading+.panel-collapse>.panel-body {
                        border-top: 1px solid #ddd;
                    }

                    .panel-group .panel-footer {
                        border-top: 0;
                    }

                    .panel-group .panel-footer+.panel-collapse .panel-body {
                        border-bottom: 1px solid #ddd;
                    }

                    .panel-default {
                        border-color: #ddd;
                    }

                    .panel-default>.panel-heading {
                        color: #333;
                        background-color: #f5f5f5;
                        border-color: #ddd;
                    }

                    .panel-default>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #ddd;
                    }

                    .panel-default>.panel-heading .badge {
                        color: #f5f5f5;
                        background-color: #333;
                    }

                    .panel-default>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #ddd;
                    }

                    .panel-primary {
                        border-color: #337ab7;
                    }

                    .panel-primary>.panel-heading {
                        color: #fff;
                        background-color: #337ab7;
                        border-color: #337ab7;
                    }

                    .panel-primary>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #337ab7;
                    }

                    .panel-primary>.panel-heading .badge {
                        color: #337ab7;
                        background-color: #fff;
                    }

                    .panel-primary>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #337ab7;
                    }

                    .panel-success {
                        border-color: #d6e9c6;
                    }

                    .panel-success>.panel-heading {
                        color: #3c763d;
                        background-color: #dff0d8;
                        border-color: #d6e9c6;
                    }

                    .panel-success>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #d6e9c6;
                    }

                    .panel-success>.panel-heading .badge {
                        color: #dff0d8;
                        background-color: #3c763d;
                    }

                    .panel-success>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #d6e9c6;
                    }

                    .panel-info {
                        border-color: #bce8f1;
                    }

                    .panel-info>.panel-heading {
                        color: #31708f;
                        background-color: #d9edf7;
                        border-color: #bce8f1;
                    }

                    .panel-info>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #bce8f1;
                    }

                    .panel-info>.panel-heading .badge {
                        color: #d9edf7;
                        background-color: #31708f;
                    }

                    .panel-info>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #bce8f1;
                    }

                    .panel-warning {
                        border-color: #faebcc;
                    }

                    .panel-warning>.panel-heading {
                        color: #8a6d3b;
                        background-color: #fcf8e3;
                        border-color: #faebcc;
                    }

                    .panel-warning>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #faebcc;
                    }

                    .panel-warning>.panel-heading .badge {
                        color: #fcf8e3;
                        background-color: #8a6d3b;
                    }

                    .panel-warning>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #faebcc;
                    }

                    .panel-danger {
                        border-color: #ebccd1;
                    }

                    .panel-danger>.panel-heading {
                        color: #a94442;
                        background-color: #f2dede;
                        border-color: #ebccd1;
                    }

                    .panel-danger>.panel-heading+.panel-collapse>.panel-body {
                        border-top-color: #ebccd1;
                    }

                    .panel-danger>.panel-heading .badge {
                        color: #f2dede;
                        background-color: #a94442;
                    }

                    .panel-danger>.panel-footer+.panel-collapse>.panel-body {
                        border-bottom-color: #ebccd1;
                    }

                    .open>.dropdown-toggle.btn-default {
                        color: #333;
                        background-color: #e6e6e6;
                        background-image: none;
                        border-color: #adadad;
                    }

                    .btn-default.active.focus,
                    .btn-default.active:focus,
                    .btn-default.active:hover,
                    .btn-default:active.focus,
                    .btn-default:active:focus,
                    .btn-default:active:hover,
                    .open>.dropdown-toggle.btn-default.focus,
                    .open>.dropdown-toggle.btn-default:focus,
                    .open>.dropdown-toggle.btn-default:hover {
                        color: #333;
                        background-color: #d4d4d4;
                        border-color: #8c8c8c;
                    }

                    .dropdown-menu.pull-right {
                        right: 0;
                        left: auto;
                    }

                    .dropdown-menu .divider {
                        height: 1px;
                        margin: 9px 0;
                        overflow: hidden;
                        background-color: #e5e5e5;
                    }

                    .dropdown-menu>li>a {
                        display: block;
                        padding: 3px 20px;
                        clear: both;
                        font-weight: 400;
                        line-height: 1.42857143;
                        color: #333;
                        white-space: nowrap;
                    }

                    .dropdown-menu>li>a:focus,
                    .dropdown-menu>li>a:hover {
                        color: #262626;
                        text-decoration: none;
                        background-color: #f5f5f5;
                    }

                    .dropdown-menu>.active>a,
                    .dropdown-menu>.active>a:focus,
                    .dropdown-menu>.active>a:hover {
                        color: #fff;
                        text-decoration: none;
                        background-color: #337ab7;
                        outline: 0;
                    }

                    .dropdown-menu>.disabled>a,
                    .dropdown-menu>.disabled>a:focus,
                    .dropdown-menu>.disabled>a:hover {
                        color: #777;
                    }

                    .dropdown-menu>.disabled>a:focus,
                    .dropdown-menu>.disabled>a:hover {
                        text-decoration: none;
                        cursor: not-allowed;
                        background-color: transparent;
                        background-image: none;
                        filter: progid:DXImageTransform.Microsoft.gradient(enabled=false);
                    }

                    .open>.dropdown-menu {
                        display: block;
                    }

                    .open>a {
                        outline: 0;
                    }

                    .dropdown-menu-right {
                        right: 0;
                        left: auto;
                    }

                    .dropdown-menu-left {
                        right: auto;
                        left: 0;
                    }

                    .dropdown-header {
                        display: block;
                        padding: 3px 20px;
                        font-size: 12px;
                        line-height: 1.42857143;
                        color: #777;
                        white-space: nowrap;
                    }

                    .dropdown-backdrop {
                        position: fixed;
                        top: 0;
                        right: 0;
                        bottom: 0;
                        left: 0;
                        z-index: 990;
                    }

                    .pull-right>.dropdown-menu {
                        right: 0;
                        left: auto;
                    }

                    .dropup .caret,
                    .navbar-fixed-bottom .dropdown .caret {
                        content: "";
                        border-top: 0;
                        border-bottom: 4px dashed;
                        border-bottom: 4px solid\9;
                    }

                    .dropup .dropdown-menu,
                    .navbar-fixed-bottom .dropdown .dropdown-menu {
                        top: auto;
                        bottom: 100%;
                        margin-bottom: 2px;
                    }
                </style>

                <!-- Content Wrapper. Contains page content -->
                <div class="content-wrapper">
                    <section class="content">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="panel panel-default">
                                    <div class="panel-body">
                                        <table id="data" class="table" width="100%">
                                            <thead></thead>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

            </section>

            <section class="basic-elements">

            </section>
            <br><br><br><br>
        </div>
    </div>
</div>



<?php $this->load->view('back/template/footer'); ?>

<script type="text/javascript" src="<?= base_url() ?>app-assets/vendors/js/datatable/FixedColumns/dataTables.fixedColumns.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/datetime/1.1.2/js/dataTables.dateTime.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/esurvey/js/') ?>index.js"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>
<!-- <script src="../../assets/esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.js"></script> -->
<script src="../../../../assets//esurvey/sweet_modal/dist/min/jquery.sweet-modal.min.js"></script>