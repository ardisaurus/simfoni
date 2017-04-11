  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bullhorn"></i> Pengumuman
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
                                                <h4 class="modal-title" id="labeltambah">Tambah Pengumuman</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengumuman/tambah');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pengumuman" id="id_pengumuman" required>
                                        </div>
                                        <div class="form-group">
                                              <label for="judul" class="col-sm-3 control-label">Judul</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="judul" class="form-control" placeholder="Masukan Judul" id="judul" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="isi" class="col-sm-3 control-label">Isi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="isi" name="isi" rows="4" required></textarea>
                                            </div>
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
          <?php if ($datapengumuman) { ?> 
            <div class="box-body no-padding">
              <table class="table table-hover table-hover table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">No</th>
                        <th class="text-center">Judul</th>          
                        <th class="text-center" style="width: 240px"></th>
                    </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach ($datapengumuman as $pengumuman) {
                        ?>
                        <tr>
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $pengumuman->judul_pengumuman; ?>
                                <a href="#" class="pull-right" data-toggle="modal" data-target="#detail<?php echo $no; ?>"> 
                                <i class="glyphicon glyphicon-info-sign"></i> Detail
                                </a>
                                <!-- Modal promote -->
                                <div class="modal fade" id="detail<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="labeldetail<?php echo $no; ?>" aria-hidden="true">
                                    <div class="modal-dialog" align="center">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labeldetail<?php echo $no; ?>">Detail</h4>
                                            </div>
                                            <div class="modal-body" align="center">
                                                <h4><?php echo $pengumuman->judul_pengumuman; ?></h4>
                                                <table class="table table-condensed">
                                                    <tr>
                                                        <td>Tanggal</td><td> : </td><td><?php echo $pengumuman->tgl_pengumuman; ?></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Isi</td><td> : </td><td><?php echo $pengumuman->isi_pengumuman; ?></td>
                                                    </tr>                                      
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i> Tutup</button>
                                            </div>
                                         </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                            </td>                       
                            <td align="center">                    
                                <button class="btn btn-info btn-sm" data-toggle="modal" data-target="#edit<?php echo $no; ?>">
                                <i class="glyphicon glyphicon-pencil"></i> Ubah
                                </button>                                
                                <!-- Modal Ganti Email -->
                                <div class="modal fade" id="edit<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="labeledit<?php echo $no; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labeledit<?php echo $no; ?>">Ubah</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('admin/pengumuman/edit');?>" method="post">
                                        <div class="form-group">
                                            <input type="hidden" name="id_pengumuman" id="id_pengumuman" value="<?php echo $pengumuman->id_pengumuman; ?>" required>
                                            <input type="hidden" name="tgl" id="tgl" value="<?php echo $tanggal; ?>" required>
                                        </div>
                                        <div class="form-group">
                                              <label for="judul" class="col-sm-3 control-label">Judul</label>
                                            <div class="col-sm-8">
                                              <input type="text" name="judul" class="form-control" id="judul" value="<?php echo $pengumuman->judul_pengumuman; ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                              <label for="isi" class="col-sm-3 control-label">Isi</label>
                                            <div class="col-sm-8">
                                                <textarea class="form-control" id="isi" name="isi" rows="4" required><?php echo $pengumuman->isi_pengumuman; ?></textarea>
                                            </div>
                                          </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button class="btn btn-danger pull-left " data-dismiss="modal" data-toggle="modal" data-target="#hapus<?php echo $no; ?>"><i class="glyphicon glyphicon-remove"></i> Hapus
                                                </button>
                                                <button type="submit" class="btn btn-info" name='simpan' value='simpan'><i class="glyphicon glyphicon-pencil"></i> Ubah</button>
                                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="glyphicon glyphicon-share-alt"></i> Batal</button>
                                       </form>
                                         </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                
                                <!-- Modal suspend -->
                                <div class="modal modal-danger fade" id="hapus<?php echo $no; ?>" tabindex="-1" role="dialog" aria-labelledby="labelhapus<?php echo $no; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelhapus<?php echo $no; ?>">Hapus</h4>
                                            </div>
                                            <div class="modal-body">
                                                <?php echo form_open('admin/pengumuman/hapus/');  
                                                echo form_hidden('id_pengumuman', $pengumuman->id_pengumuman);
                                                ?>                                                
                                                Anda ingin menghapus <strong><?php echo $pengumuman->judul_pengumuman; ?></strong>?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-outline" name='simpan' value='simpan'>Hapus</button>
                                                <?php echo form_close() ?>
                                            </div>
                                         </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
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
      <?php if ($datapengumuman) { ?>
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