  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-briefcase"></i> Riwayat Pekerjaan
        <a href="<?php echo site_url('member/pekerjaan/form_tambah'); ?>" class="btn btn-success pull-right"><i class="glyphicon glyphicon-plus"></i> Tambah</a> 
        </h1>
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
        <?php if ($datapekerjaan) { 
            foreach ($datapekerjaan as $pekerjaan) {?>
        <!-- Default box -->
        <div class="box box-warning"> 
            <div class="box-body">
                <div class="box-tools pull-right">
                   <a href="<?php echo site_url('member/pekerjaan/detail/'.$pekerjaan->id_pekerjaan); ?>"><i class="glyphicon glyphicon-check text-orange"></i></a>
                </div>
                  <table>
                    <tr>
                      <td style="color:#F39C12"><strong>Tempat Bekerja</strong> </td>
                      <td>: <?php echo $pekerjaan->nama_kantor; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Jabatan</strong> </td>
                      <td>: <?php echo $pekerjaan->jabatan; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Alamat</strong> </td>
                      <td>: <?php echo $pekerjaan->alamat. ", ".$pekerjaan->kota ; ?></td>
                    </tr>
                    <tr>
                      <td style="color:#F39C12"><strong>Tanggal mulai </strong> </td>
                      <td>: <?php echo $pekerjaan->tgl_mulai; ?></td>
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
      <?php if ($datapekerjaan) { ?>
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