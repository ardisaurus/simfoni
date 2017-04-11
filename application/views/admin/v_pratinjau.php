  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <i class="glyphicon glyphicon-stats"></i> Pratinjau
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="info-box bg-yellow">
            <span class="info-box-icon"><i class="fa fa-graduation-cap"></i></span>
            <div class="info-box-content">
              <span class="info-box-text">Jumlah Alumni</span>
              <span class="info-box-number"><?php echo $total_alumni; ?> Alumni</span>
              <div class="progress">
                <div class="progress-bar" style="width: 100%"></div>
              </div>
                  <span class="progress-description">
                    <?php echo $total_prodi; ?> Program studi
                  </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
    <div class="row">
      <div class="col-md-6">
        <div class="panel panel-default">
          <div class="panel-heading">
              Status Pekerjaan
          </div>
          <div class="panel-body">
                  <div id="morris-donut-chart" style="height:300px;"></div>         
          </div>
          <div class="panel-footer clearfix">
             <a href="<?php echo site_url('admin/pratinjau/perbandingan_status'); ?>" class="btn btn-default pull-right">Perbandingan</a>        
          </div>
        </div>
      </div>
      <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-primary">
          <div class="inner">
            <h3><?php echo $total_kesehatan; ?> <sup style="font-size: 20px">Alumni</sup></h3>
              <p>Bekerja di Bidang Kesehatan</p>
          </div>
          <div class="icon">
            <i class="fa fa-heartbeat"></i>
          </div>
          <a href="<?php echo site_url('admin/pratinjau/perbandingan_kesehatan'); ?>" class="small-box-footer">Perbandingan >></a>
        </div>
        <!-- small box -->
        <div class="small-box bg-teal">
          <div class="inner">
            <h3><?php echo $total_industri; ?> <sup style="font-size: 20px">Alumni</sup></h3>
              <p>Bekerja di Bidang Industri</p>
          </div>
          <div class="icon">
            <i class="fa fa-industry"></i>
          </div>
          <a href="<?php echo site_url('admin/pratinjau/perbandingan_industri'); ?>" class="small-box-footer">Perbandingan >></a>
        </div>
        <!-- small box -->
        <div class="small-box bg-blue">
          <div class="inner">
            <h3><?php echo $total_pendidikan; ?> <sup style="font-size: 20px">Alumni</sup></h3>
              <p>Bekerja di Bidang Pendidikan</p>
          </div>
          <div class="icon">
            <i class="fa fa-book"></i>
          </div>
          <a href="<?php echo site_url('admin/pratinjau/perbandingan_pendidikan'); ?>" class="small-box-footer">Perbandingan >></a>
        </div>           
    </div>
    </div>

    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
          <div class="panel-heading">
              Jenis Pekerjaan
          </div>
          <div class="panel-body">
            <div id="morris-bar" style="height:300px;"></div>        
          </div>
          <div class="panel-footer clearfix">
             <a href="<?php echo site_url('admin/pratinjau/perbandingan_jenis'); ?>" class="btn btn-default pull-right">Perbandingan</a>        
          </div>
        </div>
      </div>
    </div>
    <?php
    $ideal=0;
    $nonideal=0; 
    foreach ($masa as $lama) {
      if ($lama->masa_tunggu<=300) {
        $ideal++;
      }else{
        $nonideal++;
      }
    }
     ?>
    <div class="row">
      <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-green">
          <div class="inner">
            <h3><?php echo $ideal; ?> <sup style="font-size: 20px">Alumni</sup></h3>
              <p>Bekerja sesuai masa tunggu ideal.</p>
          </div>
          <div class="icon">
            <i class="fa fa-hourglass-end"></i>
          </div>
          <a href="<?php echo site_url('admin/pratinjau/perbandingan_masa_ideal'); ?>" class="small-box-footer">Perbandingan >></a>
        </div>         
      </div>
      <div class="col-md-6">
        <!-- small box -->
        <div class="small-box bg-red">
          <div class="inner">
            <h3><?php echo $nonideal; ?> <sup style="font-size: 20px">Alumni</sup></h3>
              <p>Bekerja melewati masa tunggu ideal.</p>
          </div>
          <div class="icon">
            <i class="fa fa-hourglass"></i>
          </div>
          <a href="<?php echo site_url('admin/pratinjau/perbandingan_masa_nonideal'); ?>" class="small-box-footer">Perbandingan >></a>
        </div>          
    </div>
    </div>
          
      <script type="text/javascript">
        $(function() {
            new  Morris.Donut({
              element: 'morris-donut-chart',
              data: [{
                  label: "Sudah bekerja",
                  value: <?php echo $total_bekerja; ?>
              }, {
                  label: "Belum bekerja",
                  value: <?php echo $belum_bekerja; ?>
              }],
              colors: ["#F7BF65", "#FF851B"],
              resize: true
              });

            new Morris.Bar({
              element: 'morris-bar',
              data: [{
                  y: 'PNS',
                  a: <?php echo $total_pns; ?>
              }, {
                  y: 'Swasta',
                  a: <?php echo $total_swasta; ?>
              }, {
                  y: 'Rumah sakit',
                  a: <?php echo $total_rs; ?>
              }, {
                  y: 'BPS Mandiri',
                  a: <?php echo $total_bps; ?>
              }, {
                  y: 'Melanjutkan Kuliah',
                  a: <?php echo $total_kuliah; ?>
              }],
              xkey: 'y',
              ykeys: ['a'],
              barColors: ['#F39C12'],
              labels: ['Jumlah'],
              hideHover: 'auto',
              resize: true
            });
          });
    </script>
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->