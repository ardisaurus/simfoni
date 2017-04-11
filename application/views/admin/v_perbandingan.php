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
          <?php if ($datakes) { ?>
          <?php 
          foreach ($datatahun as $tahun) {
            $x[$tahun->tahun_mulai]=0;
            foreach ($datakes as $kesehatan) {
                if ($tahun->tahun_mulai==$kesehatan->tahun_mulai) {
                    $x[$tahun->tahun_mulai]++;
                }
            }
          }
           ?> 
            <div class="box-body no-padding">
              <table class="table table-hover table-hover table-bordered table-striped table-condensed">
                <thead>
                    <tr>
                        <th class="text-center" style="width: 50px">No</th>
                        <th class="text-center">Tahun</th>
                        <th class="text-center">Jumlah</th>          
                    </tr>
                </thead>
                    <tbody>
                        <?php 
                            $no=1;
                            foreach ($datatahun as $tahun) {
                        ?>
                        <tr class="text-center">
                            <td align="center"><?php echo $no++; ?></td>
                            <td><?php echo $tahun->tahun_mulai; ?></td>
                            <td><?php echo $x[$tahun->tahun_mulai]; ?></td>
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
                    jumlah: <?php echo $x[$datatahun[2]->tahun_mulai]; ?>,
                }, {
                    tahun: <?php echo "'".$datatahun[1]->tahun_mulai."'"; ?>,
                    jumlah: <?php echo $x[$datatahun[1]->tahun_mulai]; ?>,
                }, {
                    tahun: <?php echo "'".$datatahun[0]->tahun_mulai."'"; ?>,
                    jumlah: <?php echo $x[$datatahun[0]->tahun_mulai]; ?>,
                },
                ],
                xkey: 'tahun',
                ykeys: ['jumlah'],
                labels: ['Jumlah'],
                barColors: ['#F39C12'],
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