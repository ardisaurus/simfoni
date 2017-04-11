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
          <td>Username/NIM : <?php foreach ($userdetail as $detail) {echo $detail->username;} ?></td>
          <td>
            <div align="right"> 
                <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#password">
                  <i class="glyphicon glyphicon-lock"></i> Ubah Password
                </button>             
            </div>
                <!-- Modal Ganti Password -->
                <div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="labelpassword" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                <h4 class="modal-title" id="labelpassword">Ubah Password</h4>
                            </div>
                            <div class="modal-body">
                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/pengaturan/ubahpassword');?>" method="post">
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
        </table>        
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->