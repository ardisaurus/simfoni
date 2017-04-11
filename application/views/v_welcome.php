<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
    
    <title>Simfoni | Selamat Datang</title>

    <!-- Font Awesome -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">
	<!-- Ionicons -->
	<link rel="stylesheet" href="<?php echo base_url('assets/css/ionicons/css/ionicons.min.css'); ?>">
	<!-- Theme style -->  
	<link rel="stylesheet" href="<?php echo base_url('assets/css/AdminLTE.min.css'); ?>">
    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/costum.css'); ?>">
	<!-- AdminLTE Skins. Choose a skin from the css/skins
	    folder instead of downloading all of them to reduce the load. -->  
	<link rel="stylesheet" href="<?php echo base_url('assets/css/skins/_all-skins.min.css'); ?>">
    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/carousel.css'); ?>">
  </head>
<!-- NAVBAR
================================================== -->
  <body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo base_url(); ?>"><i class="fa fa-graduation-cap"></i> Simfoni</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                    <a href="<?php echo site_url('login');?>">
                        <i class="glyphicon glyphicon-log-in"></i> <span>Log in</span>
                    </a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>


    <!-- Page Content -->
    <div class="container">

        <!-- Marketing Icons Section -->
        <div class="row">
            <div class="col-lg-12 page-header">
                <h1 align="center">
                    Selamat datang
                </h1>
            </div>
        </div>
        <!-- /.row -->
    </div>


    <!-- Bootstrap core JavaScript
    ================================================== -->    

    <!-- jQuery Version 1.11.0 -->
    <script src="<?php echo base_url('assets/js/jquery.min.js'); ?>"></script>
    <script>window.jQuery || document.write('<script src="<?php echo base_url('assets/js/vendor/jquery.min.js'); ?>"><\/script>')</script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
  </body>
</html>
