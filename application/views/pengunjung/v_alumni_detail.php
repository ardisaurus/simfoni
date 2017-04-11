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
      <li><a class="active" href="<?php echo site_url('/welcome');?>">Beranda</a></li>
      <li><a href="<?php echo site_url('/data');?>">Data Alumni</a></li>
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
      <h1>Alumni</h1>
      <div class="box">
        <table border="0" width="650px">
            <tr>
              <td rowspan="5" width="70px"><?php $loc = base_url('uploads/alumni/'.$dataalumni[0]->foto); echo"<img align='center' height=100px src=$loc style='margin-right:20px;' />";?></td>
              <td>NIM<td> : <td><?php echo $dataalumni[0]->nim ?></td>
            </tr>
            <tr>
              <td>Nama<td> : <td><?php echo $dataalumni[0]->nama ?></td>
            </tr>
            <tr>
              <td>Agama<td> : <td><?php echo $dataalumni[0]->agama ?> / Jenis Kelamin: <?php echo $dataalumni[0]->jenis_kelamin; ?></td>
            </tr>
            <tr>
              <td>Tempat Lahir<td> : <td><?php echo $dataalumni[0]->tempat_lahir ?></td> 
            </tr>
            <tr>
              <td>Tgl Lahir<td> : <td><?php echo $dataalumni[0]->tanggal_lahir ?></td>
            </tr>
          </table>
          <strong style="color:#FF6600;">Kontak</strong>
          <table>
            <tr>
              <td>No HP<td> : <td><?php echo $dataalumni[0]->no_hp ?></td>
            </tr>
            <tr>
              <td>Email<td> : <td><?php echo $dataalumni[0]->email ?></td>
            </tr>
            <tr>
              <td>Alamat<td> : <td><?php echo $dataalumni[0]->alamat; ?> RT <?php echo $dataalumni[0]->RT; ?> / RW <?php echo $dataalumni[0]->RT; ?> Kel. <?php echo $dataalumni[0]->kelurahan; ?> Kec. <?php echo $dataalumni[0]->kecamatan; ?> - <?php echo $dataalumni[0]->kota; ?></td>
            </tr>
          </table>
          <strong style="color:#FF6600;">Akademik</strong>
          <table>
            <tr>
              <td>Prodi<td> : <td><?php echo $dataalumni[0]->prodi ?></td>
            </tr>
            <tr>
              <td>Angkatan<td> : <td><?php echo $dataalumni[0]->tahun_masuk ?></td>
            </tr>
            <tr>
              <td>IPK<td> : <td><?php echo $dataalumni[0]->IPK ?></td>
            </tr>
            <tr>
              <td>No. Transkrip<td> : <td><?php echo $dataalumni[0]->no_transkrip ?></td>
            </tr>
            <tr>
              <td>No. Ijazah<td> : <td><?php echo $dataalumni[0]->no_ijazah ?></td>
            </tr>
            <tr>
              <td>Judul Skripsi/TA<td> : <td><?php echo $dataalumni[0]->judul_ta ?></td>
            </tr>
          </table>
          <?php if ($datapekerjaan): ?>
            <strong style="color:#FF6600;">Pekerjaan</strong>
            <table>
              <tr>
                <td>Profesi<td> : <td><?php echo $datapekerjaan[0]->jabatan ?></td>
              </tr>
              <tr>
                <td>Tempat Kerja<td> : <td><?php echo $datapekerjaan[0]->nama_kantor ?></td>
              </tr>
              <tr>
                <td>Alamat<td> : <td><?php echo $datapekerjaan[0]->alamat; ?> - <?php echo $datapekerjaan[0]->kota; ?></td>
              </tr>
            </table>
          <?php endif ?>
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
