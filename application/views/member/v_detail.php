  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Detail Pekerjaan        
        <button class="btn btn-danger pull-right" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i> Hapus</button>        
     </h1>
     <!-- Modal suspend -->
                                <div class="modal modal-danger fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="labelhapus" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelhapus">Hapus</h4>
                                            </div>
                                            <div class="modal-body" align="center">
                                                <?php echo form_open('member/pekerjaan/hapus/');  
                                                echo form_hidden('id_pekerjaan', $datapekerjaan[0]->id_pekerjaan);
                                                ?>                                                
                                                Anda ingin menghapus riwayat pekerjaan?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline" name='simpan' value='simpan'>Hapus</button>
                                                <?php echo form_close() ?>
                                            </div>
                                         </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
    </section>

    <!-- Main content -->
    <section class="content">
          <!-- Horizontal Form -->
          <?php if ($this->session->flashdata('msg_error')) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo $this->session->flashdata('msg_error');?>
                  </div>
          <?php } ?>
          <?php if (validation_errors()) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors();?>
                  </div>
          <?php } ?>
          <!-- form start -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Pekerjaan</h3><a href="#" data-toggle="modal" data-target="#biodata" class="pull-right text-orange"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
              <!-- Modal Ganti Email -->
                                <div class="modal fade" id="biodata" tabindex="-1" role="dialog" aria-labelledby="labelbiodata" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelbiodata">Ubah Biodata</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pekerjaan/edit');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?php echo $datapekerjaan[0]->id_pekerjaan;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama_kantor" class="col-sm-3 control-label">Nama Kantor</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama_kantor" class="form-control" id="nama_kantor" value="<?php echo $datapekerjaan[0]->nama_kantor;?>" placeholder="Masukan Nama" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_mulai" class="col-sm-3 control-label">Tanggal Mulai</label>
                                          <div class="col-sm-8">
                                              <div class="input-group date" id='lahir' data-date="" data-date-format="yyyy-mm-dd">
                                                <input class="form-control disabled" type="text" name="tgl_mulai" value="<?php echo $datapekerjaan[0]->tgl_mulai;?>" readonly="" placeholder="Masukan Tgl Mulai Kerja" required>
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="tgl_akhir" class="col-sm-3 control-label">Tanggal Akhir</label>                          
                                            <div class="col-sm-8">
                                              <div class="input-group date" id='lapor' data-date="" data-date-format="yyyy-mm-dd">
                                                <input class="form-control disabled" type="text" name="tgl_akhir" value="<?php echo $datapekerjaan[0]->tgl_akhir;?>" readonly=""placeholder="Masukan Tgl Akhir Kerja">
                                              <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                                            </div>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jenis_pekerjaan" class="col-sm-3 control-label">Jenis</label>                          
                                            <div class="col-sm-8">
                                            <?php 
                                                $options = array(
                                                        'PNS'         => 'PNS',
                                                        'Swasta'       => 'Swasta',
                                                        'Rumah Sakit'       => 'Rumah Sakit',
                                                        'BPS Mandiri'       => 'BPS Mandiri',
                                                        'Melanjutkan Kuliah'       => 'Melanjutkan Kuliah'
                                                );
                                                echo form_dropdown('jenis_pekerjaan', $options, $datapekerjaan[0]->jenis_pekerjaan,'class="form-control"');
                                            ?>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="bidang_pekerjaan" class="col-sm-3 control-label">Bidang</label>                          
                                            <div class="col-sm-8">
                                              <?php 
                                                $options = array(
                                                        'Kesehatan'        => 'Kesehatan',
                                                        'Pendidikan'       => 'Pendidikan',
                                                        'Industri'         => 'Industri',
                                                        'Lain-lain'        => 'Lain-lain'
                                                );
                                                echo form_dropdown('bidang_pekerjaan', $options, $datapekerjaan[0]->bidang_pekerjaan,'class="form-control" id="bidang_pekerjaan"');
                                            ?>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jabatan" class="col-sm-3 control-label"></label>                          
                                            <div class="col-sm-8">
                                              <input type="text" name="bidang2" class="form-control" id="bidang2" value="<?php if (isset($datapekerjaan[0]->bidang2)){ echo $datapekerjaan[0]->bidang2; }?>" placeholder="Masukan Bidang Pekerjaan">
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="jabatan" class="col-sm-3 control-label">Jabatan</label>                          
                                            <div class="col-sm-8">
                                              <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo $datapekerjaan[0]->jabatan;?>" placeholder="Masukan Jabatan" required>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="pendapatan" class="col-sm-3 control-label">Pendapatan/Bulan</label>                          
                                            <div class="col-sm-8">
                                              <?php 
                                                $options = array(
                                                        'Kurang dari 1.500.000'               => 'Kurang dari 1.500.000',
                                                        'Rp. 1.500.000 - Rp. 2.999.000'       => 'Rp. 1.500.000 - Rp. 2.999.000',
                                                        'Rp. 3.000.000 - Rp. 5.000.000'       => 'Rp. 3.000.000 - Rp. 5.000.000',
                                                        'Lebih dari Rp. 5.000.000'            => 'Lebih dari Rp. 5.000.000'
                                                );
                                                echo form_dropdown('pendapatan', $options, $datapekerjaan[0]->pendapatan,'class="form-control" id="pendapatan"');
                                            ?>
                                           </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="sumber_info" class="col-sm-3 control-label">Sumber Info</label>                          
                                            <div class="col-sm-8">
                                              <?php 
                                                $options = array(
                                                        'Pihak Kampus'      => 'Pihak Kampus',
                                                        'Teman/Kerabat'     => 'Teman/Kerabat',
                                                        'Media Cetak'       => 'Media Cetak',
                                                        'Media Elektronik'  => 'Media Elektronik',
                                                        'Media Online'      => 'Media Online'
                                                );
                                                echo form_dropdown('sumber_info', $options, $datapekerjaan[0]->sumber_info,'class="form-control" id="sumber_info"');
                                            ?>
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
            </div>
            <!-- /.box-header -->            
              <div class="box-body">
                <table>
                    <tr>
                      <td style="color:#F39C12"><strong>Tempat Bekerja</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->nama_kantor; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Jenis / Bidang </strong> </td>
                      <?php if (isset($datapekerjaan[0]->bidang2)){ ?>
                        <td>: <?php echo $datapekerjaan[0]->jenis_pekerjaan." / ".$datapekerjaan[0]->bidang_pekerjaan." ( ".$datapekerjaan[0]->bidang2." )"; ?></td>
                      <?php }else{ ?>
                        <td>: <?php echo $datapekerjaan[0]->jenis_pekerjaan." / ".$datapekerjaan[0]->bidang_pekerjaan; ?></td>
                      <?php } ?>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Jabatan</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->jabatan; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Pendapatan/Bulan</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->pendapatan; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Sumber Info</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->sumber_info; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Tanggal mulai </strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->tgl_mulai; ?></td>
                    </tr>
                    <?php if ($datapekerjaan[0]->tgl_akhir) { ?>
                    <tr>
                      <td style="color:#F39C12"><strong>Tanggal Akhir </strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->tgl_akhir; ?></td>
                    </tr>
                    <?php } ?>
                    
                  </table> 
              </div>
          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kontak & Alamat</h3><a href="#" data-toggle="modal" data-target="#kontak" class="pull-right text-orange"><i class="glyphicon glyphicon-edit"></i> Ubah</a>
            </div>
            <!-- /.box-header -->            
              <div class="box-body">    
                <table>
                    <tr>
                      <td style="color:#F39C12"><strong>No. Telepon</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->no_telepon; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>No Fax</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->no_fax; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Email</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->email; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Website</strong> </td>
                      <td>: <?php if ($datapekerjaan[0]->website){ echo $datapekerjaan[0]->website; }else{ echo "-"; }  ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Alamat </strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->alamat.". ".$datapekerjaan[0]->kota; ?>                      
                      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="kontak" tabindex="-1" role="dialog" aria-labelledby="labelkontak" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelkontak">Ubah Kontak & Alamat</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pekerjaan/editkon');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?php echo $datapekerjaan[0]->id_pekerjaan;?>" required>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_telepon" class="col-sm-3 control-label">No. Telepon</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?php echo $datapekerjaan[0]->no_telepon; ?>" placeholder="Masukan No. telepon" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="no_fax" class="col-sm-3 control-label">No. Fax</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="no_fax" class="form-control" id="no_fax" value="<?php echo $datapekerjaan[0]->no_fax; ?>" placeholder="Masukan No. Fax" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="email" class="col-sm-3 control-label">Email</label>
                                          <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control" id="email" value="<?php echo $datapekerjaan[0]->email; ?>" placeholder="Masukan Email" required>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="website" class="col-sm-3 control-label">Website</label>
                                          <div class="col-sm-8">
                                            <input type="website" name="website" class="form-control" id="website" value="<?php echo $datapekerjaan[0]->website; ?>" placeholder="Masukan Website">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="Alamat" class="col-sm-3 control-label">Alamat</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo $datapekerjaan[0]->alamat; ?>" placeholder="Masukan Alamat" required>
                                            <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Isikan nama jalan/dusun saja.</small>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="provinsi" class="col-sm-3 control-label">Propinsi</label>
                                          <div class="col-sm-8">
                                            <div class="input-group">                                              
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $datapekerjaan[0]->propinsi; ?>">
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
                                              <input class="form-control" type="text" disabled="TRUE" value="<?php echo $datapekerjaan[0]->kota; ?>">
                                              <div class="input-group-btn">
                                                <button type="button" class="btn btn-primary" data-dismiss="modal" data-toggle="modal" data-target="#kota">Ubah</button>
                                              </div>
                                            </div>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>

                                                <button class="btn btn-danger pull-left" data-dismiss="modal" data-toggle="modal" data-target="#hapus"><i class="glyphicon glyphicon-remove"></i> Hapus
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
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pekerjaan/editkota');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pekerjaan" id="id_pekerjaan" value="<?php echo $datapekerjaan[0]->id_pekerjaan;?>" required>
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
                                </div><!-- /.modal --></td>
                    </tr>                    
                  </table> 
              </div>
              <!-- /.box-body -->
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
