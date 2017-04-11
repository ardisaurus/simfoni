  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="fa fa-bar-chart"></i> <?php echo $title; ?>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Default box -->
      <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
              Perbandingan 3 Tahunan
          </div>
          <div class="panel-body">
            <?php if (count($datatahun)>=3){ ?>
            <div id="morris-line" style="height:300px;"></div>
            <?php }else{ ?>
                Jumlah data tahunan kurang dari 3.
            <?php } ?>        
          </div>
        </div>
      </div>
    </div>
      <div class="box box-warning">
          <?php if ($datakerja) { ?>
          <?php 
          foreach ($datatahun as $tahun) {
            $a[$tahun->tahun_mulai]=0;
            $b[$tahun->tahun_mulai]=0;
            $c[$tahun->tahun_mulai]=0;
            $d[$tahun->tahun_mulai]=0;
            $e[$tahun->tahun_mulai]=0;
            foreach ($datakerja as $kerja) {
                if ($tahun->tahun_mulai==$kerja->tahun_mulai) {
                    if ($kerja->jenis_pekerjaan=="PNS") {
                       $a[$tahun->tahun_mulai]++;
                    }
                    if ($kerja->jenis_pekerjaan=="Swasta") {
                      $b[$tahun->tahun_mulai]++;
                    }
                    if ($kerja->jenis_pekerjaan=="Rumah Sakit") {
                      $c[$tahun->tahun_mulai]++;
                    }
                    if ($kerja->jenis_pekerjaan=="BPS Mandiri") {
                      $d[$tahun->tahun_mulai]++;
                    }
                    if ($kerja->jenis_pekerjaan=="Melanjutkan Kuliah") {
                      $e[$tahun->tahun_mulai]++;
                    }
                }
            }
          }
           ?> 
            <div class="box-body no-padding">
              <table class="table table-hover table-hover table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="text-center bg-gray disabled" style="width: 50px">No</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center bg-gray disabled">PNS</th>
                        <th class="text-center">Swasta</th>
                        <th class="text-center bg-gray disabled">Rumah sakit</th>
                        <th class="text-center">BPS mandiri</th>
                        <th class="text-center bg-gray disabled">Lanjut studi</th>          
                    </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach ($datatahun as $tahun) {
                        ?>
                        <tr>
                            <td align="center" class="bg-gray disabled"><?php echo $no++; ?></td>
                            <td><?php echo $tahun->tahun_mulai; ?></td>
                            <td align="center" class="bg-gray disabled"><?php echo $a[$tahun->tahun_mulai]; ?></td>
                            <td align="center"><?php echo $b[$tahun->tahun_mulai]; ?></td>
                            <td align="center" class="bg-gray disabled"><?php echo $c[$tahun->tahun_mulai]; ?></td>
                            <td align="center"><?php echo $d[$tahun->tahun_mulai]; ?></td>
                            <td align="center" class="bg-gray disabled"><?php echo $e[$tahun->tahun_mulai]; ?></td>
                        <?php } ?>
                        <?php }else{ ?>
                        <div class="alert alert-danger">
                        <i class="glyphicon glyphicon-remove-sign"></i> Data tidak tersedia.
                        </div>
                        <?php }?>
                </tbody>
            </table>
        </div>
        <!-- /.box-body -->
      </div>
      <!-- /.box -->
      <?php if (count($datatahun)>=3){ ?>
      <script type="text/javascript">
        $(function() {
            new Morris.Bar({
              element: 'morris-line',
              data: [
                {
                    tahun: <?php echo "'".$datatahun[2]->tahun_mulai."'"; ?>,
                    jumlah: <?php echo $a[$datatahun[2]->tahun_mulai]; ?>,
                    jumlah2: <?php echo $b[$datatahun[2]->tahun_mulai]; ?>,
                    jumlah3: <?php echo $c[$datatahun[2]->tahun_mulai]; ?>,
                    jumlah4: <?php echo $d[$datatahun[2]->tahun_mulai]; ?>
                }, {
                    tahun: <?php echo "'".$datatahun[1]->tahun_mulai."'"; ?>,
                    jumlah: <?php echo $a[$datatahun[1]->tahun_mulai]; ?>,
                    jumlah2: <?php echo $b[$datatahun[1]->tahun_mulai]; ?>,
                    jumlah3: <?php echo $c[$datatahun[1]->tahun_mulai]; ?>,
                    jumlah4: <?php echo $d[$datatahun[1]->tahun_mulai]; ?>
                }, {
                    tahun: <?php echo "'".$datatahun[0]->tahun_mulai."'"; ?>,
                    jumlah: <?php echo $a[$datatahun[0]->tahun_mulai]; ?>,
                    jumlah2: <?php echo $b[$datatahun[0]->tahun_mulai]; ?>,
                    jumlah3: <?php echo $c[$datatahun[0]->tahun_mulai]; ?>,
                    jumlah4: <?php echo $d[$datatahun[0]->tahun_mulai]; ?>
                },
                ],
                xkey: 'tahun',
                ykeys: ['jumlah', 'jumlah2', 'jumlah3', 'jumlah4'],
                labels: ['PNS', 'Swasta', 'RS', 'BPS'],
                barColors: ['#3c8dbc', '#f56954', '#00a65a', '#F39C12'],
                pointSize: 2,
                hideHover: 'auto',
                resize: true
            });
          });
    </script>
    <?php } ?>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->