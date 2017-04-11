<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Selamat Datang | Sistem Informasi Alumni IKASTIKMA</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8" />
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="<?php echo base_url('assets/img/favicon.ico'); ?>">
<!-- Font Awesome -->
<link rel="stylesheet" href="<?php echo base_url('assets/css/font-awesome/css/font-awesome.min.css'); ?>">
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
      <li><a class="active" href="<?php echo site_url('/data');?>">Data Alumni</a></li>
      <li><a href="<?php echo site_url('/Pengumuman');?>">Pengumuman</a></li>
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
      <h1>Data Alumni</h1>
      <div style="text-align:right;">
        <a href="<?php echo site_url('data/form_cari');?>" style="text-decoration:none; color:#FF6600;"><i class="fa fa-search"></i> Cari Alumni</a>
      </div>
      <div class="box">
          <?php if($datanya){ foreach($datanya as $row){?>
          <table border="0" width="650px">
            <tr>
              <td rowspan="5" width="70px"><?php $loc = base_url('uploads/alumni/'.$row->foto); echo"<img align='center' height=100px src=$loc style='margin-right:20px;' />";?></td>
              <td>NIM<td> : <td><?php echo $row->nim ?></td>
            </tr>
            <tr>
              <td>Nama<td> : <td><?php echo $row->nama ?></td>
            </tr>
            <tr>
              <td>Prodi<td> : <td><?php echo $row->prodi ?></td>
            </tr>
            <tr>
              <td>Angkatan<td> : <td><?php $x=$row->tahun_masuk+1; echo $row->tahun_masuk."/".$x; ?></td>
            </tr>
            <tr>
              <td>Tgl Lulus<td> : <td><?php echo $row->tanggal_lulus ?></td> 
              <td><a href="<?php echo site_url('data/lihat/'.$row->nim); ?>">Selengkapnya &raquo;</a></td>
            </tr>
          </table>

          <hr></hr>        
        <?php  }}else{ echo "Data Tidak Tersedia"; } ?>
      </div>
      <?php if ($datanya) { ?>
        <div class="clearfix text-center">
            <ul class="pagination pagination-md no-margin">
                <?php
                    echo $this->pagination->create_links();
                ?>
            </ul>
        </div>
        <?php 
            }
         ?>      
    </div>
    <div id="sidebar">
      <h2>Pengumuman</h2>
      <ul id="news">
        <?php foreach ($datapengumuman_side as $pengumuman) { ?>
          <li>
          <h3><?php echo $pengumuman->judul_pengumuman; ?></h3>
          <br />
          <?php echo substr($pengumuman->isi_pengumuman, 0, 150)." ..."; ?>
          <br />
            <a href="<?php echo site_url('pengumuman/lihat/'.$pengumuman->id_pengumuman); ?>">Selengkapnya &raquo;</a>
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
