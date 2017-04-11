  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Tambah Pekerjaan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
          <!-- Horizontal Form -->
          <?php if (validation_errors()) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors();?>
                  </div>
          <?php } ?>
          <!-- form start -->
            <?php echo form_open_multipart('member/pekerjaan/tambah', 'class="form-horizontal" role="form"'); ?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Riwayat Pekerjaan</h3>
            </div>
            <!-- /.box-header --> 
              <?php echo form_hidden('nim', $this->session->userdata('username')); ?>           
              <div class="box-body">
                <div class="form-group">
                  <label for="nama_kantor" class="col-sm-2 control-label">Nama Kantor</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama_kantor" class="form-control" id="nama_kantor" value="<?php echo set_value('nama_kantor');?>" placeholder="Masukan Nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tgl_mulai" class="col-sm-2 control-label">Tanggal Mulai</label>
                  <div class="col-sm-4">
                      <div class="input-group date" id='lahir' data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control disabled" type="text" name="tgl_mulai" value="<?php echo set_value('tgl_mulai'); ?>" readonly="" placeholder="Masukan Tgl Mulai Kerja" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                   </div>
                </div>
                <div class="form-group">
                  <label for="tgl_akhir" class="col-sm-2 control-label">Tanggal Akhir</label>                          
                    <div class="col-sm-4">
                      <div class="input-group date" id='lapor' data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control disabled" type="text" name="tgl_akhir" value="<?php echo set_value('tgl_akhir'); ?>" readonly=""placeholder="Masukan Tgl Akhir Kerja">
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                   </div>
                </div>
                <div class="form-group">
                  <label for="jenis_pekerjaan" class="col-sm-2 control-label">Jenis Pekerjaan</label>                          
                    <div class="col-sm-9">
                      <select name="jenis_pekerjaan" class="form-control">
                        <option value="PNS" <?php echo  set_select('jenis_pekerjaan', 'PNS', TRUE); ?> >PNS</option>
                        <option value="Swasta" <?php echo  set_select('jenis_pekerjaan', 'Swasta'); ?> >Swasta</option>
                        <option value="Rumah Sakit" <?php echo  set_select('jenis_pekerjaan', 'Rumah Sakit'); ?> >Rumah Sakit</option>
                        <option value="BPS Mandiri" <?php echo  set_select('jenis_pekerjaan', 'BPS Mandiri'); ?> >BPS Mandiri</option>
                        <option value="Melanjutkan Kuliah" <?php echo  set_select('jenis_pekerjaan', 'Melanjutkan Kuliah'); ?> >Melanjutkan Kuliah</option>
                    </select>
                   </div>
                </div>
                <div class="form-group">
                  <label for="bidang_pekerjaan" class="col-sm-2 control-label">Bidang Pekerjaan</label>                          
                    <div class="col-sm-9">
                      <select name="bidang_pekerjaan" id="bidang_pekerjaan" class="form-control">
                        <option value="Kesehatan" <?php echo  set_select('bidang_pekerjaan', 'Kesehatan', TRUE); ?> >Kesehatan</option>
                        <option value="Pendidikan" <?php echo  set_select('bidang_pekerjaan', 'Pendidikan'); ?> >Pendidikan</option>
                        <option value="Industri" <?php echo  set_select('bidang_pekerjaan', 'Industri'); ?> >Industri</option>
                        <option value="Lain-lain" <?php echo  set_select('bidang_pekerjaan', 'Lain-lain'); ?> >Lain-lain</option>
                      </select>                      
                   </div>
                </div>
                <div class="form-group">
                  <label for="jabatan" class="col-sm-2 control-label"></label>                          
                    <div class="col-sm-9">
                      <input type="text" name="bidang2" class="form-control" id="bidang2" value="<?php echo set_value('bidang2');?>" placeholder="Masukan Bidang Pekerjaan">
                   </div>
                </div>
                <div class="form-group">
                  <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>                          
                    <div class="col-sm-9">
                      <input type="text" name="jabatan" class="form-control" id="jabatan" value="<?php echo set_value('jabatan');?>" placeholder="Masukan Jabatan" required>
                   </div>
                </div>
                <div class="form-group">
                  <label for="pendapatan" class="col-sm-2 control-label">Pendapatan/Bulan</label>                          
                    <div class="col-sm-9">
                      <select name="pendapatan" id="pendapatan" class="form-control">
                        <option value="Kurang dari Rp. 1.500.000" <?php echo  set_select('pendapatan', 'Kurang dari 1.500.000', TRUE); ?> >Kurang dari 1.500.000</option>
                        <option value="Rp. 1.500.000 - Rp. 2.999.000" <?php echo  set_select('pendapatan', 'Rp. 1.500.000 - Rp. 2.999.000'); ?> >Rp. 1.500.000 - Rp. 2.999.000</option>
                        <option value="Rp. 3.000.000 - Rp. 5.000.000" <?php echo  set_select('pendapatan', 'Rp. 3.000.000 - Rp. 5.000.000'); ?> >Rp. 3.000.000 - Rp. 5.000.000</option>
                        <option value="Lebih dari Rp. 5.000.000" <?php echo  set_select('pendapatan', 'Lebih dari Rp. 5.000.000'); ?> >Lebih dari Rp. 5.000.000</option>
                      </select> 
                   </div>
                </div>
              <div class="form-group">
                  <label for="sumber_info" class="col-sm-2 control-label">Sumber Info</label>                          
                    <div class="col-sm-9">
                      <select name="sumber_info" id="sumber_info" class="form-control">
                        <option value="Pihak Kampus" <?php echo  set_select('sumber_info', 'Pihak Kampus', TRUE); ?> >Pihak Kampus</option>
                        <option value="Teman/Kerabat" <?php echo  set_select('sumber_info', 'Teman/Kerabat'); ?> >Teman/Kerabat</option>
                        <option value="Media Cetak" <?php echo  set_select('sumber_info', 'Media Cetak'); ?> >Media Cetak</option>
                        <option value="Media Elektronik" <?php echo  set_select('sumber_info', 'Media Elektronik'); ?> >Media Elektronik</option>
                        <option value="Media Online" <?php echo  set_select('sumber_info', 'Media Online'); ?> >Media Online</option>
                      </select>
                      <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Sumber informasi lowongan kerja.</small> 
                   </div>
                </div>
              </div>
          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kontak & Alamat</h3>
            </div>
            <!-- /.box-header -->            
              <div class="box-body">    
                <div class="form-group">
                  <label for="no_telepon" class="col-sm-2 control-label">No. Telepon</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_telepon" class="form-control" id="no_telepon" value="<?php echo set_value('no_telepon');?>" placeholder="Masukan No. Telepon" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_fax" class="col-sm-2 control-label">No. Fax</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_fax" class="form-control" id="no_fax" value="<?php echo set_value('no_fax');?>" placeholder="Masukan No. Fax">
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email');?>" placeholder="Masukan Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="website" class="col-sm-2 control-label">Website</label>
                  <div class="col-sm-9">
                    <input type="text" name="website" class="form-control" id="website" value="<?php echo set_value('website');?>" placeholder="Masukan Website Kantor">
                  </div>
                </div>
                <div class="form-group">
                  <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" name="alamat" id="alamat" rows="4" placeholder="Masukan Alamat" required><?php echo set_value('alamat');?></textarea>
                  </div>
                </div>
                <div class="form-group">
                  <label for="provinsi" class="col-sm-2 control-label">Propinsi</label>
                  <div class="col-sm-9">
                    <select name="propinsi" class="form-control" id="provinsi">
                      <option>- Select Provinsi -</option>
                      <?php foreach($provinsi as $prov){
                        echo '<option value="'.$prov->id.'">'.$prov->nama.'</option>';
                      } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kota" class="col-sm-2 control-label">Kabupaten/Kota</label>
                  <div class="col-sm-9">
                    <select name="kota" class="form-control" id="kabupaten">
                      <option value=''>Select Kabupaten</option>
                    </select>
                  </div>
                </div>
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <a href="<?php echo site_url('member/pekerjaan'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i> Batal</a>
                <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
