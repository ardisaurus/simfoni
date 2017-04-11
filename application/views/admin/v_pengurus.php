  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-star"></i> Pengurus
        <button class="btn btn-success pull-right" data-toggle="modal" data-target="#tambah">
            <i class="glyphicon glyphicon-plus"></i> Tambah
        </button> 
      </h1>
      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="labeltambah" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labeltambah">Tambah Pengurus</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengurus/tambah');?>" method="post">
                                        <div class="form-group">
                                              <label for="username" class="col-sm-3 control-label">Username</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="username" class="form-control" id="username" placeholder="Masukan Username" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="nama" class="col-sm-3 control-label">Nama</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="password" class="col-sm-3 control-label">Password</label>
                                            <div class="col-sm-8">
                                              <input type="password" name="password" class="form-control" id="password" placeholder="Masukan Password" required>
                                              <small class="text-muted"><i class="glyphicon glyphicon-info-sign"></i> Masukan kombinasi antara 6-12 karakter.</small>                            
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="password2" class="col-sm-3 control-label"></label>
                                            <div class="col-sm-8">
                                              <input type="password" name="password2" class="form-control" id="password2" placeholder="Masukan Kembali Password" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="no_hp" class="col-sm-3 control-label">No. HP</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="no_hp" class="form-control" id="no_hp" placeholder="Masukan Nomor Handphone" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="email" class="col-sm-3 control-label">Email</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="email" class="form-control" id="email" required placeholder="Masukan Email">
                                            </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Tambah</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
    </section>

    <!-- Main content -->
    <section class="content">
    <?php if ($this->session->flashdata('msg_success')) { ?>
            <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <i class="glyphicon glyphicon-info-sign"></i> <?php echo $this->session->flashdata('msg_success');?>                  
            </div>
        <?php } ?>
        <?php if (validation_errors()) {?>
                    <div class="alert alert-danger">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <?php echo validation_errors();?>
                  </div>
        <?php } ?>
      <!-- Default box -->
      <div class="box box-warning">
          <?php if ($datapengurus) { ?> 
            <div class="box-body no-padding">
              <table class="table table-hover table-hover table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">No</th>
                        <th class="text-center">Username</th>
                        <th class="text-center">Nama</th>
                        <th class="text-center">No. HP</th>
                        <th class="text-center">Email</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach ($datapengurus as $pengurus) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $pengurus->username; ?></td>
                            <td><?php echo $pengurus->nama; ?></td>                       
                            <td><?php echo $pengurus->no_hp; ?></td>
                            <td><?php echo $pengurus->email; ?></td>
                        <?php } ?>
                        <?php }else{ ?>
                        <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-remove-sign"></i> Data tidak tersedia.
                        </div>
                        <?php } ?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <?php if ($datapengurus) { ?>
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
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->