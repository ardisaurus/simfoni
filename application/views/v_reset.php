<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
    <title>Simfoni | <?php echo $title; ?></title>
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">   
    <link rel="stylesheet" href="<?php echo base_url('assets/css/sticky-footer.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/costum.css'); ?>">    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/bootstrap-datetimepicker.min.css" media="screen">
    <style type="text/css">
    body {
      padding-top: 70px;
      background: url("<?php echo base_url('assets/img/bglogin.jpg'); ?>") no-repeat center center fixed;
      background-size:100% auto;
    }

    </style>       
</head>
<body>
<div class="login-box">
  <!-- /.login-logo -->
  <div class="login-box-body">
    <h3 class="login-box-msg"><i class="fa fa-graduation-cap"></i> Simfoni IKASTIKMA</h3>
    <?php if ($this->session->flashdata('message')) { ?>
      <div class="alert alert-danger"><i class="glyphicon glyphicon-exclamation-sign"></i>
        <?php echo $this->session->flashdata('message');?>                  
      </div>
    <?php }?>
    <p class="login-box-msg">Silahkan masukan username anda, password baru akan dikirimkan ke email anda.</p>
    <form action="<?php echo site_url('login/reset_proses');?>" method="post">
      <div class="form-group has-feedback">
        <input type="username" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username'); ?>" required autofocus>
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback text-center">
        <?php echo $captcha_img;?>
      </div>
      <div class="form-group has-feedback text-center">
        <input name="captcha" style="width:160px;"></br>
        <small>*Masukan kata yang tertera pada gambar!</small>
      </div>
      <div class="form-group has-feedback">          
          <button type="submit" class="btn btn-primary btn-block btn-flat">Kirim</button>
          <a href="<?php echo site_url('login'); ?>" class="btn btn-default btn-block btn-flat"> Batal</a>
      </div>
    </form>
  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

    <footer class="footer">
        <div class="container">
            <p class="text-muted">NAS &copy; 2016
            </p>            
        </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url('assets/js/jquery.js'); ?>"></script>    
    <script src="<?php echo base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url('assets/js/collapse.js'); ?>"></script>
    <script src="<?php echo base_url('assets/js/transition.js'); ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/bootstrap-datetimepicker.js" charset="UTF-8"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/js/locales/bootstrap-datetimepicker.id.js"charset="UTF-8"></script>

    <!-- Fungsi datepickier yang digunakan -->
    <script type="text/javascript">
      $('.input-group.date').datetimepicker({
              language:  'id',
              weekStart: 1,
              autoclose: 1,
              todayHighlight: 1,
              startView: 4,
              minView: 2,
              forceParse: 0
      });
    </script>

</body>
</html>