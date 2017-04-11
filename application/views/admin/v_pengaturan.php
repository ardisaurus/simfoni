  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-cog"></i> Pengaturan
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->flashdata('message')) { ?>
                  <div class="alert alert-warning">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <i class="glyphicon glyphicon-exclamation-sign"></i> <?php echo $this->session->flashdata('message');?>                  
                  </div>
                <?php } ?> 
      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-body">
          <h4 class="text-yellow"><i class="glyphicon glyphicon-check"></i> Akun</h4>
        <table class="table table-condensed">
          <tr>
          <td>Username : <?php foreach ($userdetail as $detail) {echo $detail->username;} ?></td>
          <td>
            <div align="right"> 
              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#username">
                  <i class="glyphicon glyphicon-envelope"></i> Ubah Username
                </button>
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#password">
                  <i class="glyphicon glyphicon-lock"></i> Ubah Password
                </button>             
            </div>
                <!-- Modal Ganti Email -->
                <div class="modal fade" id="username" tabindex="-1" role="dialog" aria-labelledby="labelusername" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelusername">Ubah Username</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengaturan/ubahusername');?>" method="post">
                        <div class="form-group">
                              <label for="emailbaru" class="col-sm-3 control-label">Username Baru</label>
                            <div class="col-sm-8">
                              <input type="username" name="usernamebaru" class="form-control" id="usernamebaru" placeholder="Masukan Username Baru" required>
                            </div>
                          </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name='simpan' value='simpan'>Ubah Username</button>
                       </form>
                         </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Modal Ganti Password -->
                <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="labelpassword" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelpassword">Ubah Password</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengaturan/ubahpassword');?>" method="post">
                        <div class="form-group">
                          <label for="passwordlama" class="col-sm-3 control-label">Password Lama</label>
                            <div class="col-sm-8">
                              <input type="password" name="passwordlama" class="form-control" id="passwordlama" placeholder="Masukan Password Lama" required>
                            </div>                        
                          </div>
                       <div class="form-group">
                          <label for="passwordbaru" class="col-sm-3 control-label">Password Baru</label>
                            <div class="col-sm-8">
                              <input type="password" name="passwordbaru" class="form-control" id="passwordbaru" placeholder="Masukan Password Baru" required>
                                <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Masukan kombinasi antara 6-12 karakter.</small>
                            </div>                        
                          </div>
                       <div class="form-group">
                          <label for="passwordbaru2" class="col-sm-3 control-label"></label>
                            <div class="col-sm-8">
                              <input type="password" name="passwordbaru2" class="form-control" id="passwordbaru2" placeholder="Masukan Kembali Password baru" required>
                            </div>                        
                          </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name='simpan' value='simpan'>Ubah Password</button>
                       </form>
                         </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->                
          </td>
          </tr>          
          <?php if(count($admin_num)>1){ ?>
          <tr>
          <td></td>
          <td align="right">
            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus">
              <i class="glyphicon glyphicon-remove"></i> Hapus Akun
            </button>            
          </td>
          <!-- Modal suspend -->
                                <div class="modal modal-danger fade" id="hapus" tabindex="-1" role="dialog" aria-labelledby="labelhapus" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelhapus">Hapus</h4>
                                            </div>
                                            <div class="modal-body" align="center">
                                                <?php echo form_open('admin/pengaturan/hapus_akun/');  
                                                echo form_hidden('username', $detail->username);
                                                ?>                                                
                                                Anda ingin menghapus akun anda?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline" name='simpan' value='simpan'>Hapus</button>
                                                <?php echo form_close() ?>
                                            </div>
                                         </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
        </tr>
        <?php } ?>
        </table>
        
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <!-- Default box -->
      <div class="box box-warning">
        <div class="box-body">
          <h4 class="text-yellow"><i class="glyphicon glyphicon-edit"></i> Data Pengguna</h4>
        <table class="table table-condensed">
          <tr>
          <td>Nama : <?php foreach ($userdetail as $detail) {echo $detail->nama;} ?></td>
          <td>
            <div align="right"> 
              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#nama">
                  <i class="glyphicon glyphicon-pencil"></i> Ubah Nama
                </button>
            </div>
                <!-- Modal ganti Nama -->
                <div class="modal fade" id="nama" tabindex="-1" role="dialog" aria-labelledby="labelnama" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelnama">Ubah Nama</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengaturan/ubahnama');?>" method="post">
                        <div class="form-group">
                          <label for="nama" class="col-sm-3 control-label">Nama Baru</label>
                            <div class="col-sm-8">
                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama Baru" required>
                            </div>
                          </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name='simpan' value='simpan'>Ubah Nama</button>
                       </form>
                         </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
          </td>
        </tr>
        <tr>
          <td>Email : <?php foreach ($userdetail as $detail) {echo $detail->email;} ?></td>
          <td>
            <div align="right"> 
              <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#email">
                  <i class="glyphicon glyphicon-pencil"></i> Ubah Email
                </button>
            </div>
                <!-- Modal ganti Nama -->
                <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-labelledby="labelemail" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelemail">Ubah Email</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengaturan/ubahemail');?>" method="post">
                        <div class="form-group">
                          <label for="nama" class="col-sm-3 control-label">Email Baru</label>
                            <div class="col-sm-8">
                              <input type="text" name="email" class="form-control" id="email" placeholder="Masukan Email Baru" required>
                            </div>
                          </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name='simpan' value='simpan'>Ubah Email</button>
                       </form>
                         </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
          </td>
        </tr>
        <tr>
          <td>Nomor HP : <?php foreach ($userdetail as $detail) { echo $detail->no_hp;} ?></td>
          <td>
            <div align="right"> 
              <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#no_hp">
                  <i class="glyphicon glyphicon-phone"></i> Ubah Nomor HP</button>
            </div>
                <!-- Modal ganti Nama -->
                <div class="modal fade" id="no_hp" tabindex="-1" role="dialog" aria-labelledby="labelno_hp" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelno_hp">Ubah Nomor HP</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengaturan/ubahno_hp');?>" method="post">
                        <div class="form-group">
                            <label for="no_hp" class="col-sm-3 control-label">Nomor HP</label>                          
                            <div class="col-sm-8">
                              <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Nomor HP Anda" required maxlength="12" value="<?php echo set_value('no_hp'); ?>" required>
                            </div>
                          </div>
                        </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                                <button type="submit" class="btn btn-primary" name='simpan' value='simpan'>Ubah Nomor HP</button>
                       </form>
                         </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
          </td>
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