  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Detail Pekerjaan        
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
              <h3 class="box-title">Pekerjaan</h3>
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
                      <td>: <?php echo $datapekerjaan[0]->jenis_pekerjaan." / ".$datapekerjaan[0]->bidang_pekerjaan; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Jabatan</strong> </td>
                      <td>: <?php echo $datapekerjaan[0]->jabatan; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Pendapatan/Bulan</strong> </td>
                      <td>: Rp. <?php echo $datapekerjaan[0]->pendapatan; ?></td>
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
              <h3 class="box-title">Kontak & Alamat</h3>
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
                      <td>: <?php echo $datapekerjaan[0]->alamat.". ".$datapekerjaan[0]->kota; ?></td>
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
