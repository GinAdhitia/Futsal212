<script type="text/javascript">        
  function tampilkanwaktu(){
    var waktu = new Date();
    var sh = waktu.getHours() + "";
    var sm = waktu.getMinutes() + "";  
    var ss = waktu.getSeconds() + "";
    document.getElementById("clock").innerHTML = (sh.length==1?"0"+sh:sh) + ":" + (sm.length==1?"0"+sm:sm) + ":" + (ss.length==1?"0"+ss:ss);
  }
</script>

<?php
  function cekJadwal($play) { ?>
    <td>
      <div class="btn-group">
        <a class="dropdown-toggle" data-toggle="dropdown">
        <?php echo $play ?></a>
        <ul class="dropdown-menu pull-right" role="menu">
          <li><a href="#">Booking / Lihat Detail</a></li>
          <li><a href="#">Pindah Jadwal</a></li>
          <li class="divider"></li>
          <li><a href="#">Batal</a></li>
        </ul>
      </div>
    </td>
  <?php }
//  foreach($q_jadwal as $jadwal) {
//    echo "
//    <td>".$jadwal->fs_id." <a href='".base_url()."keranjang/detailpemesanan/".$jadwal->fs_id."'>Edit</a></td>";
//  }
?>

<section class="content">
  <div class="row">

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-red"><i class="fa fa-futbol-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-number">Lap 1</span>
          <span class="info-box-text">
            Play<br />
            Jam
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-aqua"><i class="fa fa-futbol-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-number">Lap 2</span>
          <span class="info-box-text">
            Play<br />
            Jam            
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-yellow"><i class="fa fa-futbol-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-number">Lap 3</span>
          <span class="info-box-text">
            Play<br />
            Jam            
          </span>
        </div>
      </div>
    </div>

    <div class="col-md-3 col-sm-6 col-xs-12">
      <div class="info-box">
        <span class="info-box-icon bg-green"><i class="fa fa-futbol-o"></i></span>
        <div class="info-box-content">
          <span class="info-box-number">Lap 4</span>
          <span class="info-box-text">
            Play<br />
            Jam            
          </span>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <section class="col-lg-12">
      <div class="box box-danger">
        <div class="box-header">
          <i class="fa fa-calendar-check-o"></i>
          <h3 class="box-title">Jadwal Hari Ini</h3>
          <div class="box-tools">
            <body onload="tampilkanwaktu();setInterval('tampilkanwaktu()', 1000);">        
              <span id="clock"></span> 
            </body>
          </div>
        </div>
        <div class="box-body">
          <table class="table table-bordered">
            <tr>
              <th style="width: 70px"></th>
              <?php
                date_default_timezone_set('Asia/Jakarta');
                $jam = date('H');
                for ($x=8;$x<24;$x++){
                  if ($jam == $x) {
                    echo "<th class='success'>$x:00</th>";
                  } else {
                    echo "<th>$x:00</th>";
                  }
                }
              ?>
            </tr>
            <tr>
              <th>Lap 1</th>
              <?php
                for ($x=8;$x<24;$x++){ cekJadwal("$x"); }
              ?>
            </tr>
            <tr>
              <th>Lap 2</th>
              <?php
                for ($x=8;$x<24;$x++){ cekJadwal("$x"); }
              ?>
            </tr>
            <tr>
              <th>Lap 3</th>
              <?php
                for ($x=8;$x<24;$x++){ cekJadwal("$x"); }
              ?>
            </tr>
            <tr>
              <th>Lap 4</th>
              <?php
                for ($x=8;$x<24;$x++){ cekJadwal("$x"); }
              ?>
            </tr>
          </table>
        </div>

        <div class="box-footer clearfix">
          <table class="table table-bordered" style="width: 480px; float: right;">
            <tr>
              <td class='success' style="width: 120px">Jam Sekarang</td>
              <td class='danger' style="width: 120px">Booking</td>
              <td class='warning' style="width: 120px">Booking + DP</td>
              <td class='info' style="width: 120px">Lunas</td>
            </tr>
          </table>
        </div>
      </div>
    </section>
  </div>
</section>