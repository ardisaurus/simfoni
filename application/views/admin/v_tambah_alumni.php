  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-graduation-cap"></i> Tambah Alumni
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
            <?php echo form_open_multipart('admin/alumni/tambah', 'class="form-horizontal" role="form"'); ?>
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata & Akun Mahasiswa</h3>
            </div>
            <!-- /.box-header -->            
              <div class="box-body">
                <div class="form-group">
                  <label for="nim" class="col-sm-2 control-label">NIM</label>
                  <div class="col-sm-9">
                    <input type="text" name="nim" class="form-control" id="nim" value="<?php echo set_value('nim');?>" placeholder="Masukan NIM" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="nama" class="col-sm-2 control-label">Nama</label>
                  <div class="col-sm-9">
                    <input type="text" name="nama" class="form-control" id="nama" value="<?php echo set_value('nama');?>" placeholder="Masukan Nama" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="password" class="col-sm-2 control-label">Password</label>
                  <div class="col-sm-5">
                    <input type="password" name="password" class="form-control" id="password" value="<?php echo set_value('password');?>" placeholder="Masukan Password" required>
                    <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Masukan kombinasi antara 6-12 karakter.</small>
                  </div>
                  <div class="col-sm-5">
                    <input type="password" name="password2" class="form-control" id="password2" value="<?php echo set_value('password2');?>" placeholder="Konfirmasi Password" required>
                  </div>
                </div>
                  <div class="form-group">
                  <label for="jenis_kelamin" class="col-sm-2 control-label">Jenis Kelamin</label>
                  <div class="col-sm-4">
                    <select name="jenis_kelamin" class="form-control">
                      <option value="Pria" <?php echo  set_select('jenis_kelamin', 'Pria', TRUE); ?> >Pria</option>
                      <option value="Wanita" <?php echo  set_select('jenis_kelamin', 'Wanita'); ?> >Wanita</option>
                    </select>
                  </div>
                  <label for="agama" class="col-sm-2 control-label">Agama</label>
                  <div class="col-sm-4">
                    <select name="agama" class="form-control">
                      <option value="Islam" <?php echo  set_select('agama', 'Islam', TRUE); ?> >Islam</option>
                      <option value="Kristen" <?php echo  set_select('agama', 'Kristen'); ?> >Kristen</option>
                      <option value="Katolik" <?php echo  set_select('agama', 'Katolik'); ?> >Katolik</option>
                      <option value="Hindu" <?php echo  set_select('agama', 'Hindu'); ?> >Hindu</option>
                      <option value="Budha" <?php echo  set_select('agama', 'Budha'); ?> >Budha</option>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                  <div class="col-sm-4">
                      <div class="input-group date" id='lahir' data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control disabled" type="text" name="tanggal_lahir" value="<?php echo set_value('tanggal_lahir'); ?>" readonly="" placeholder="Masukan Tgl Lahir" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                   </div>
                  <label for="tempat_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
                  <div class="col-sm-4">
                    <input type="text" name="tempat_lahir" class="form-control" id="tempat_lahir" value="<?php echo set_value('tempat_lahir');?>" placeholder="Masukan Tempat Lahir"  required>
                  </div>
                </div>
                </div>
                
          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Biodata Akademik</h3>
            </div>
            <!-- /.box-header -->            
              <div class="box-body">
                <div class="form-group">
                  <label for="prodi" class="col-sm-2 control-label">Prodi</label>
                  <div class="col-sm-9">
                    <select name="prodi" class="form-control">
                      <?php 
                      if ($dataprodi) { 
                        foreach ($dataprodi as $prodi) {
                          echo "<option value='(".$prodi->kode.") ".$prodi->nama_prodi."' >(".$prodi->kode.") ".$prodi->nama_prodi."</option>";
                        }
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <label for="tanggal_lulus" class="col-sm-2 control-label">Tanggal Lulus</label>                          
                    <div class="col-sm-4">
                      <div class="input-group date" id='lapor' data-date="" data-date-format="yyyy-mm-dd">
                        <input class="form-control disabled" type="text" name="tanggal_lulus" value="<?php echo set_value('tanggal_lulus'); ?>" readonly=""placeholder="Masukan Tgl Lulus" required>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
                    </div>
                   </div>
                </div>
                <div class="form-group">
                  <label for="ipk" class="col-sm-2 control-label">IPK</label>
                  <div class="col-sm-4">
                    <input type="text" name="ipk" class="form-control" maxlength="5" id="ipk" value="<?php echo set_value('ipk');?>" placeholder="Masukan IPK" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="no_ijazah" class="col-sm-2 control-label">No. Ijazah</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_ijazah" class="form-control" id="no_ijazah" value="<?php echo set_value('no_ijazah');?>" placeholder="Masukan no.Ijazah" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="no_transkrip" class="col-sm-2 control-label">No. Transkrip</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_transkrip" class="form-control" id="no_transkrip" value="<?php echo set_value('no_transkrip');?>" placeholder="Masukan no. Transkrip" required>
                  </div>
                </div>                
                <div class="form-group">
                  <label for="judul_ta" class="col-sm-2 control-label">Judul TA/Skripsi</label>
                  <div class="col-sm-9">
                    <input type="text" name="judul_ta" class="form-control" id="judul_ta" value="<?php echo set_value('judul_ta');?>" placeholder="Masukan Judul TA" required>
                  </div>
                </div>
              </div>
          </div>
          <!-- /.box -->
          <div class="box box-warning">
            <div class="box-header with-border">
              <h3 class="box-title">Kontak</h3>
            </div>
            <!-- /.box-header -->            
              <div class="box-body">
                <div class="form-group">
                  <label for="no_hp" class="col-sm-2 control-label">No. Hp</label>
                  <div class="col-sm-9">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" value="<?php echo set_value('no_hp');?>" placeholder="Masukan No. HP" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="email" class="col-sm-2 control-label">Email</label>
                  <div class="col-sm-9">
                    <input type="email" name="email" class="form-control" id="email" value="<?php echo set_value('email');?>" placeholder="Masukan Email" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="Alamat" class="col-sm-2 control-label">Alamat</label>
                  <div class="col-sm-9">
                    <input type="text" name="alamat" class="form-control" id="alamat" value="<?php echo set_value('alamat');?>" placeholder="Masukan Alamat" required>
                    <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Isikan nama jalan/dusun saja. RT, RW, KEL, KEC dan KOTA silahkan isikan pada inputan yang disediakan</small>
                  </div>
                </div>
                <div class="form-group">
                  <label for="rt" class="col-sm-2 control-label">RT</label>
                  <div class="col-sm-4">
                    <input type="text" name="rt" class="form-control" id="rt" value="<?php echo set_value('rt');?>" placeholder="Masukan No. RT" required>
                  </div>
                  <label for="rw" class="col-sm-2 control-label">RW</label>
                  <div class="col-sm-4">
                    <input type="text" name="rw" class="form-control" id="rw" value="<?php echo set_value('rw');?>" placeholder="Masukan No. RW" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="kelurahan" class="col-sm-2 control-label">Kelurahan/Desa</label>
                  <div class="col-sm-4">
                    <input type="text" name="kelurahan" class="form-control" id="kelurahan" value="<?php echo set_value('kelurahan');?>" placeholder="Masukan Kelurahan/Desa" required>
                  </div>
                  <label for="kecamatan" class="col-sm-2 control-label">Kecamatan</label>
                  <div class="col-sm-4">
                    <input type="text" name="kecamatan" class="form-control" id="kecamatan" value="<?php echo set_value('kecamatan');?>" placeholder="Masukan Kecamatan" required>
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
                <a href="<?php echo site_url('admin/alumni'); ?>" class="btn btn-default"><i class="glyphicon glyphicon-share-alt"></i> Batal</a>
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
