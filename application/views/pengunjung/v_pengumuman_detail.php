<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat Datang | Sistem Informasi Alumni IKASTIKMA</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="<?php echo base_url('assets/js/mootools-release-1.11.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/dropDownMenu.js'); ?>" type="text/javascript"></script>
<!--[if IE 7]><style>#dropdownMenu li ul ul {margin-left: 100px;}</style><![endif]-->
</head>
<body>
<div id="container">
  <div id="wrapper">
    <div id="top">
      <div class="logo"><a href="#"><span>IKA</span>STIKMA</a></div>
      <ul class="login">
        <li class="left">&nbsp;</li>
        <li>Hello Guest!</li>
        <li>|</li>
        <li><a href="<?php echo site_url('/login');?>">Login</a>
           
        </li>
      </ul>
    </div>
    <ul id="nav">
      <li class="left">&nbsp;</li>
      <li><a href="<?php echo site_url('/welcome');?>">Beranda</a></li>
      <li><a href="<?php echo site_url('/data');?>">Data Alumni</a></li>
      <li><a class="active" href="<?php echo site_url('/Pengumuman');?>">Pengumuman</a></li>
      <li><a href="<?php echo site_url('kontak');?>">Kontak Kami</a></li>
      <li class="sep">&nbsp;</li>
      <li class="right">&nbsp;</li>
    </ul>
    <div id="header">
      <div class="intro">
           <img src="<?php echo base_url('assets/img/logo.png') ;?>">
      </div>
    </div>
    <div id="content">
      <h1><?php echo $datapengumuman_lihat[0]->judul_pengumuman; ?></h1>
      <small>Dipublikasikan pada <?php echo $datapengumuman_lihat[0]->tgl_pengumuman; ?></small>
      <div class="box" style="margin-top:10px;">
        <?php echo $datapengumuman_lihat[0]->isi_pengumuman; ?>
      </div>      
    </div>
    <div id="sidebar">
      <h2>Pengumuman</h2>
      <ul id="news">
        <?php foreach ($datapengumuman as $pengumuman) { ?>
          <li>
          <h3><?php echo $pengumuman->judul_pengumuman; ?></h3>
          <br />
          <?php echo substr($pengumuman->isi_pengumuman, 0, 150)." ..."; ?>
          <br />
            <a href="#">More &raquo;</a>
        </li>
      <?php  } ?>
      </ul>
      </div>
    <div id="footer">
      <div class="foot_l"><a href="#">&nbsp;</a></div>
      <div class="foot_content">
        <p>All contents copyright &copy; Kelompok SIMFONI TI3B. All rights reserved.</p>
      </div>
      <div class="foot_r">&nbsp;</div>
      <div class="backToTop"> <a class="backToTop" href="#">&nbsp;</a> </div>
      <div class="foot_info">        
      </div>
    </div>
  </div>
</div>
</body>
</html>
