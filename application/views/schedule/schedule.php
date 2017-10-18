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
  <?php } ?>

<section class="content">
  <div class="box box-solid bg-green-gradient">
    <div class="box-header">
      <i class="fa fa-calendar"></i>
      <h3 class="box-title">Jadwal</h3>
    </div>

    <div class="box-footer text-black">
      <div class="row">
        <section class="col-lg-12">
          <div class="input-group">
            <div class="input-group date">
              <div class="input-group-addon">
                <i class="fa fa-calendar"></i>
              </div>
              <input type="date" class="form-control" />
              <span class="input-group-btn">
                <button type="button" class="btn btn-info btn-flat">Cari</button>
              </span>
            </div>
          </div>
          <br />

          <table class="table table-bordered">
            <tr>
              <th style="width: 70px"></th>
              <?php
                for ($x=8;$x<24;$x++){
                  echo "<th>$x:00</th>";
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
          <table class="table table-bordered" style="width: 360px; float: right;">
            <tr>
              <td class='danger' style="width: 120px">Booking</td>
              <td class='warning' style="width: 120px">Booking + DP</td>
              <td class='info' style="width: 120px">Lunas</td>
            </tr>
          </table>



        </section>
      </div>
    </div>
  </div>
</section>