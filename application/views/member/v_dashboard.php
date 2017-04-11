<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Simfoni | <?php echo $title; ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/table-fixed-header.css'); ?>">      
  <link rel="stylesheet" href="<?php echo base_url('assets/css/morris.css'); ?>"> 
  <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" media="screen">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons/css/ionicons.min.css'); ?>">
  <!-- Theme style -->  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
  <link rel="stylesheet" href="<?php echo base_url('assets/css/costum.css'); ?>">
  <!-- memberLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->  
  <link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
      <!-- JavaScript Includes -->
  <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/morris.min.js'); ?>"></script>

  <script src="<?php echo base_url('assets/js/raphael.min.js'); ?>"></script>

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<!-- ADD THE CLASS sidedar-collapse TO HIDE THE SIDEBAR PRIOR TO LOADING THE SITE -->
<body class="hold-transition skin-yellow">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="#" class="logo">
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><i class="fa fa-graduation-cap"></i> Simfoni</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
    </nav>
  </header>
  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"><?php echo $this->session->userdata('username'); ?></li>
        <li>
          <a href="<?php echo site_url('member/pratinjau');?>">
            <i class="glyphicon glyphicon-stats"></i> <span>Pratinjau</span>
          </a>
        </li>
        <li>
          <a href="<?php echo site_url('member/alumni');?>">
            <i class="fa fa-graduation-cap"></i> Alumni</a>
        </li>
        <li>
          <a href="<?php echo site_url('member/pekerjaan');?>">
            <i class="fa fa-briefcase"></i> Riwayat Pekerjaan</a>
        </li>
        <li>
          <a href="<?php echo site_url('member/pengaturan');?>">
            <i class="glyphicon glyphicon-cog text-aqua"></i> Pengaturan</a>
        </li>
        <li>
          <a href="<?php echo site_url('member/pengaturan/logout');?>">
            <i class="glyphicon glyphicon-remove text-red"></i> Keluar</a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <?php $this->load->view($page) ?>

  <!-- =============================================== -->

  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 1.0 BETA
    </div>
    <strong>Copyright &copy; 2016 Kelompok <b class="text-yellow">SIMFONI TI3B</b></strong> All rights
    reserved.
  </footer>
</div>
<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script> 
  <script src="<?php echo $path; ?>/jquery.min.js"></script>   
  <script>
        $(document).ready(function(){
            $("#provinsi").change(function (){
                var url = "<?php echo site_url('member/pratinjau/add_ajax_kab');?>/"+$(this).val();
                $('#kabupaten').load(url);
                return false;
            })
        });
    </script>
<script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url('assets/js/transition.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dropdown.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/collapse.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/modal.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/alert.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/table-fixed-header.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-hover-dropdown.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>
    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
        $(function () {
            var date = new Date();
            date.setDate(date.getDate());

            $('#lahir').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
            });

            $('#lapor').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
            });
        });
    </script>
    <script language='javascript' type='text/javascript'>
      $(document).ready(function(){
      $('.table-fixed-header').fixedHeader();
      });
    </script>
    <script type="text/javascript">
      $(document).ready(function() {
        // Kondisi saat Form di-load
        if ($("#bidang_pekerjaan").val() == "Lain-lain") {
            $('#bidang2').show();
        } else {
            $('#bidang2').hide();
        }
        // Kondisi saat ComboBox (Select Option) dipilih nilainya
        $("#bidang_pekerjaan").change(function() {
            if ($(this).val() == "Lain-lain") {
                $('#bidang2').show();
                $('#bidang_pekerjaan').focus();
            } else {
                $('#bidang2').hide();
            }
        });
    });
    </script>
<!-- SlimScroll -->
<script src="<?php echo base_url('assets/js/slimScroll/jquery.slimscroll.min.js'); ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/js/app.min.js'); ?>"></script>
</body>
</html>
