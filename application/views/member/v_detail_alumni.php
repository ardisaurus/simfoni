  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-graduation-cap"></i> Pratinjau        
     </h1>
    </section>
    <!-- Main content -->
    <section class="content">    
          <?php if ($this->session->flashdata('msg_error')) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('msg_error');?>
                  </div>
          <?php } ?>
          <?php if ($this->session->flashdata('msg_success')) { ?>
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="glyphicon glyphicon-info-sign"></i> <?php echo $this->session->flashdata('msg_success');?>                  
            </div>
          <?php } ?>
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Mahasiswa</h3>
            </div> 
            <div class="box-body">
                <table>
                    <tr>
                        <td class="col-md-3">
                            <?php 
                                $loc = base_url('uploads/alumni/'.$dataalumni[0]->foto);
                                echo"<img align='center' height=100px src=$loc />";
                            ?>
                        </td>
                        <td>
                            <table>
                                <tr>
                                  <td width="120px">NIM</td><td>:</td>
                                  <td><?php echo $dataalumni[0]->nim; ?></td>
                                </tr>
                                <tr>
                                  <td>Nama</td><td>:</td>
                                  <td><?php echo $dataalumni[0]->nama; ?></td>
                                </tr>
                                <tr>
                                  <td>Agama</td><td>:</td>
                                  <td><?php echo $dataalumni[0]->agama; ?></td>
                                </tr>
                                <tr>
                                  <td>Jenis Kelamin</td><td>:</td>
                                  <td><?php echo $dataalumni[0]->jenis_kelamin; ?></td>
                                </tr>
                                <tr>
                                  <td>TTL</td>
                                  <td>:</td>
                                  <td><?php echo $dataalumni[0]->tempat_lahir; ?> 
                                    / <?php echo $dataalumni[0]->tanggal_lahir; ?></td>
                                </tr>
                            </table>                            
                        </td>
                    </tr>
                </table>
                               
            </div>
           <!-- /.box-body -->
        </div>
          <!-- /.box -->
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Lain-lain</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table style="border:0px" width="100%">
                  <tbody>
                    <tr>
                      <td width="120px">No Hp</td>
                      <td>:</td>
                      <td><?php echo $dataalumni[0]->no_hp; ?></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?php echo $dataalumni[0]->email; ?></td>
                    </tr>
                    <tr>
                      <td style="vertical-align:top">Alamat Rumah</td>
                      <td style="vertical-align:top">:</td>
                      <td style="vertical-align:top"><?php echo $dataalumni[0]->alamat; ?> RT <?php echo $dataalumni[0]->RT; ?> / RW <?php echo $dataalumni[0]->RT; ?> Kel. <?php echo $dataalumni[0]->kelurahan; ?> Kec. <?php echo $dataalumni[0]->kecamatan; ?> - <?php echo $dataalumni[0]->kota; ?></td>
                      <td>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
      </div>
      <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Akademik</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
                <table style="border:0px" width="100%">
                  <tbody>
                    <tr>
                      <td>Prodi</td>
                      <td width="15px">:</td>
                      <td><?php echo $dataalumni[0]->prodi; ?></td>
                    </tr>
                    <tr>
                      <td>Tahun Masuk</td>
                      <td>:</td>
                      <td><?php echo $dataalumni[0]->tahun_masuk; ?> 
                        / Tanggal Lulus: 
                        <?php echo $dataalumni[0]->tanggal_lulus; ?></td>
                    </tr>
                    <tr>
                    <td>IPK</td>
                      <td>:</td>
                      <td>
                        <label><?php echo $dataalumni[0]->IPK; ?></label></td>
                    </tr>
                    <tr>
                    <td>No Transkrip</td>
                      <td>:</td>
                      <td>
                        <label><?php echo $dataalumni[0]->no_transkrip; ?></label></td>
                    </tr>
                    <tr>
                      <td>No Ijazah</td>
                      <td>:</td>
                      <td>
                        <label><?php echo $dataalumni[0]->no_ijazah; ?></label></td>
                    </tr>
                    <tr>
                      <td style="vertical-align:top">Judul TA</td>
                      <td style="vertical-align:top">:</td>
                      <td>
                        <label><?php echo $dataalumni[0]->judul_ta; ?></label></td>
                    </tr>
                    <tr>
                  </tbody>
                </table>
              </div>
      </div>
    <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Pekerjaan</h3>
            </div>
            <!-- /.box-header -->
              <div class="box-body">
              <?php if ($datapekerjaan[0]) { ?>
                <table style="border:0px" width="100%">
                  <tbody>
                    <tr>
                      <td width="120px">Jenis Pekerjaan</td>
                      <td width="15px">:</td>
                      <td><?php echo $datapekerjaan[0]->jenis_pekerjaan; ?></td>
                    </tr>
                    <tr>
                      <td>Nama Kantor</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->nama_kantor; ?></td>
                    </tr>
                    <tr>
                      <td>Alamat</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->alamat; ?> - <?php echo $datapekerjaan[0]->kota; ?></td>
                    </tr>
                    <tr>
                      <td>Telp</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->no_telepon; ?></td>
                    </tr>
                    <tr>
                      <td>Website</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->website; ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->email; ?></td>
                    </tr>
                    <tr>
                      <td>Tgl Mulai Kerja </td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->tgl_mulai; ?></td>
                    </tr>
                    <tr>
                      <td>Jabatan</td>
                      <td>:</td>
                      <td><?php echo $datapekerjaan[0]->jabatan; ?></td>
                    </tr>
                    <tr>
                      <td>Pendapatan/Bln</td>
                      <td>:</td>
                      <td>Rp. <?php echo $datapekerjaan[0]->pendapatan; ?></td>
                    </tr>
                  </tbody>
                </table>
            <?php }else{ ?>
            <div class="text-center">Belum Bekerja</div>              
            <?php } ?>
              </div>
      </div>    
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->