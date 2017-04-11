  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-graduation-cap"></i> Alumni
        <a href="#" data-toggle="modal" data-target="#biodata" class="btn btn-warning btn-sm"><i class="glyphicon glyphicon-search"></i> Cari</a>
      </h1>
      <!-- Modal Ganti Email -->
                                <div class="modal fade" id="biodata" tabindex="-1" role="dialog" aria-labelledby="labelbiodata" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                                <h4 class="modal-title" id="labelbiodata">Cari</h4>
                                            </div>
                                            <div class="modal-body">
                                        <form class="form-horizontal" role="form"  action="<?php echo site_url('member/alumni/cari/');?>" method="post">
                                        <div class="form-group">
                                          <label for="nim" class="col-sm-3 control-label">NIM</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nim" class="form-control" id="nim" placeholder="Masukan NIM">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="nama" class="col-sm-3 control-label">Nama</label>
                                          <div class="col-sm-8">
                                            <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukan Nama">
                                          </div>
                                        </div>                                        
                                        <div class="form-group">
                                          <label for="email" class="col-sm-3 control-label">Email</label>
                                          <div class="col-sm-8">
                                            <input type="email" name="email" class="form-control" id="email" placeholder="Masukan Email">
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="prodi" class="col-sm-3 control-label">Prodi</label>
                                          <div class="col-sm-8">
                                            <select name="prodi" class="form-control">
                                            <option selected="TRUE">- Pilih Prodi -</option>
                                              <?php 
                                              if ($dataprodi) { 
                                                foreach ($dataprodi as $prodi) { ?>
                                              <option value="<?php echo "(".$prodi->kode.") ".$prodi->nama_prodi; ?>" ><?php echo "(".$prodi->kode.") ".$prodi->nama_prodi; ?></option>
                                              <?php 
                                                }
                                              }
                                               ?>
                                            </select>
                                          </div>
                                        </div>
                                        <div class="form-group">                                          
                                          <label for="tahun_lulus" class="col-sm-3 control-label">Thn. Lulus</label>
                                          <div class="col-sm-8">
                                            <select name="tahun_lulus" class="form-control">
                                            <option selected="TRUE">- Pilih Tahun Lulus -</option>
                                            <?php
                                            $x=1990; 
                                            for ($i=0; $i < 41; $i++) { ?>
                                              <option value="<?php echo $x; ?>" ><?php echo $x; ?></option>
                                            <?php
                                            $x++;
                                            }
                                             ?>                                              
                                            </select>
                                          </div>
                                        </div>
                                        </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-warning" name='submit' value='submit'><i class="glyphicon glyphicon-search"></i> Cari</button>
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
        <?php if ($dataalumni) { 
            foreach ($dataalumni as $alumni) {?>
        <!-- Default box -->
        <div class="box box-warning"> 
            <div class="box-body">
                <div class="box-tools pull-right">
                   <a href="<?php echo site_url('member/alumni/detail/'.$alumni->nim); ?>"><i class="glyphicon glyphicon-check text-orange"></i></a>
                </div>
                <table>
                    <tr>
                        <td>
                            <?php 
                                $loc = base_url('uploads/alumni/'.$alumni->foto);
                                echo"<img align='center' height=100px src=$loc />";
                            ?>
                        </td>
                        <td class="col-md-5">
                            <table>
                                <tr>
                                    <td style="color:#F39C12"><strong>NIM</strong> </td>
                                    <td>: <?php echo $alumni->nim; ?> (Angk. <?php echo $alumni->tahun_masuk; ?>)</td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>Nama</strong> </td>
                                    <td>: <?php echo $alumni->nama; ?></td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>TTL</strong> </td>
                                    <td>: <?php echo $alumni->tempat_lahir." / ".$alumni->tanggal_lahir; ?></td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>Prodi</strong> </td>
                                    <td>: <?php echo $alumni->prodi; ?></td>
                                </tr>
                            </table>                            
                        </td>
                        <td class="col-md-5">
                            <table>
                                <tr>
                                    <td style="color:#F39C12"><strong>IPK</strong> </td>
                                    <td>: <?php echo $alumni->IPK; ?></td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>No. Ijazah</strong> </td>
                                    <td>: <?php echo $alumni->no_ijazah; ?></td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>No. Traskrip</strong> </td>
                                    <td>: <?php echo $alumni->no_transkrip; ?></td>
                                </tr>
                                <tr>
                                    <td style="color:#F39C12"><strong>Tgl. Lulus</strong> </td>
                                    <td>: <?php echo $alumni->tanggal_lulus; ?></td>
                                </tr>
                            </table>                            
                        </td>
                    </tr>
                </table>
                               
            </div>
           <!-- /.box-body -->
        </div>
          <!-- /.box -->
        <?php 
            }
        }else{ ?>
            <div class="alert alert-warning">
               <i class="glyphicon glyphicon-remove"></i> Data tidak tersedia.                 
            </div>
        <?php } ?>
      <?php if ($dataalumni) { ?>
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