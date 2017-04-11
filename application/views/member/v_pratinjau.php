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
                      <td><a href="#" data-toggle="modal" data-target="#kontak" class="pull-right text-orange"><i class="glyphicon glyphicon-edit"></i> Ubah Kontak</a>
                      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="labelkontak" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelkontak">Ubah Kontak</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pratinjau/editkon');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="nim" id="nim" value="<?php echo $dataalumni[0]->nim;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_hp" class="col-sm-2 control-label">No. Hp</label>
                                          <div class="col-sm-10">
                                            <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo $dataalumni[0]->no_hp; ?>" placeholder="Masukan No. HP" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="col-sm-2 control-label">Email</label>
                                          <div class="col-sm-10">
                                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $dataalumni[0]->email; ?>" placeholder="Masukan Email" required>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal --></td>
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
                      <td><a href="#" data-toggle="modal" data-target="#alamat" class="pull-right text-orange"><i class="glyphicon glyphicon-edit"></i> Ubah Alamat</a>
                      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="alamat" tabindex="-1" role="dialog" aria-labelledby="labelalamat" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelalamat">Ubah Alamat</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pratinjau/editalamat');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="nim" id="nim" value="<?php echo $dataalumni[0]->nim;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $dataalumni[0]->alamat; ?>" placeholder="Masukan Alamat" required>
                                            <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Isikan nama jalan/dusun saja.</small>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="rt" class="col-sm-3 control-label">RT</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="rt" class="form-control" id="rt" value="<?php echo $dataalumni[0]->RT; ?>" placeholder="Masukan No. RT" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="rw" class="col-sm-3 control-label">RW</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="rw" class="form-control" id="rw" value="<?php echo $dataalumni[0]->RW; ?>" placeholder="Masukan No. RW" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kelurahan" class="col-sm-3 control-label">Kelurahan/Desa</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?php echo $dataalumni[0]->kelurahan; ?>" placeholder="Masukan Kelurahan/Desa" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kecamatan" class="col-sm-3 control-label">Kecamatan</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?php echo $dataalumni[0]->kecamatan; ?>" placeholder="Masukan Kecamatan" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="provinsi" class="col-sm-3 control-label">Propinsi</label>
                                          <div class="col-sm-8">
                                            <div class="input-group">                                              
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $dataalumni[0]->propinsi; ?>">
                                              <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#kota">Ubah</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kota" class="col-sm-3 control-label">Kabupaten/Kota</label>
                                          <div class="col-sm-8">
                                            <div class="input-group">                                              
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $dataalumni[0]->kota; ?>">
                                              <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#kota">Ubah</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>

                                                <button class="btn btn-danger pull-left " data-dismiss="modal" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i> Hapus
                                                </button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                <!-- Modal Ganti Email -->
                                <div class="modal fade" id="kota" tabindex="-1" role="dialog" aria-labelledby="labelkota" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelkota">Ubah Provinsi & Kota/Kabupaten</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pratinjau/editkota');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="nim" id="nim" value="<?php echo $dataalumni[0]->nim;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="provinsi" class="col-sm-3 control-label">Propinsi</label>
                                          <div class="col-sm-8">
                                            <select name="propinsi" class="form-control" id="provinsi">
                                              <option>- Select Provinsi -</option>
                                              <?php foreach($provinsi as $prov){
                                                echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                                              } ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="kota" class="col-sm-3 control-label">Kabupaten/Kota</label>
                                          <div class="col-sm-8">
                                            <select name="kota" class="form-control" id="kabupaten">
                                              <option value=''>Select Kabupaten</option>
                                            </select>
                                          </div>
                                        </div>
                                        </div>
                                        <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
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
                      <td><?php echo $datapekerjaan[0]->pendapatan; ?></td>
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