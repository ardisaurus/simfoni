  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
          </section>
    <!-- Main content -->
          <!-- Horizontal Form -->
          <div class="login-box">          
            <div class="login-logo">
              <i class="fa fa-graduation-cap"></i> <b>SIMFO</b>NI
            </div>
            <?php if (isset($msg_success)) { ?>
              <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="glyphicon glyphicon-info-sign"></i> <?php echo $msg_success;?>                  
              </div>
            <?php } ?>
            <?php if (isset($error)) {?>
                      <div class="alert alert-danger">
                      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                      <?php echo $error;?>
                    </div>
            <?php } ?>
            <div class="box box-success">
              <div class="box-header with-border">
                <h3 class="box-title">Unggah Foto</h3>
              </div>
              <!-- /.box-header -->
              <!-- form start -->
              <?php echo form_open_multipart('admin/alumni/upload', 'class="form-horizontal" role="form"'); ?>
                <div class="box-body">
                  <div class="form-group">                
                    <label for="foto" class="col-sm-2 control-label">Foto</label>
                      <div class="col-sm-10">
                          <input type="hidden" name="nim" id="nim" value="<?php echo $nim; ?>">
                          <input type="file" name="foto" id="foto" required>   
                       </div>                    
                  </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                  <button type="submit" class="btn btn-success pull-right"><i class="glyphicon glyphicon-upload"></i> Upload</button>
                </div>
                <!-- /.box-footer -->
              </form>
            </div>
            <!-- /.box --> 
          </div>   
  </div>
  <!-- /.content-wrapper -->
