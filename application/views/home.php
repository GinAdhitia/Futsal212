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
$lapang = array(
  1 => "Lapang 1",
  2 => "Lapang 2",
  3 => "Lapang 3",
  4 => "Lapang 4");

$jam = array(
  "8" => "08:00",
  "9" => "09:00",
  "10" => "10:00",
  "11" => "11:00",
  "12" => "12:00",
  "13" => "13:00",
  "14" => "14:00",
  "15" => "15:00",
  "16" => "16:00",
  "17" => "17:00",
  "18" => "18:00",
  "19" => "19:00",
  "20" => "20:00",
  "21" => "21:00",
  "22" => "22:00",
  "23" => "23:00");

function infoBox($no, $warna) { ?>
  <div class="col-md-3 col-sm-6 col-xs-12">
    <div class="info-box">
      <span class="info-box-icon bg-<?php echo $warna; ?>"><i class="fa fa-futbol-o"></i></span>
      <div class="info-box-content">
        <span class="info-box-number">Lap <?php echo $no; ?></span>
        <span class="info-box-text">
          Status Main<br />
          Nama Penyewa / Jam
        </span>
      </div>
    </div>
  </div>
<?php } ?>

<section class="content">
  <div class="row">
    <?php
      infoBox("1", "red");
      infoBox("2", "aqua");
      infoBox("3", "yellow");
      infoBox("4", "green");
    ?>
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
          <table class="table table-bordered table-hovered">
            <thead>
              <tr>
                <th width="100px"></th>
                <?php
                foreach ($lapang as $key => $value) {
                  echo "<th class='text-center'>$value</th>";
                }
                ?>
              </tr>
            </thead>
            <tbody>
              <?php
              $jamsekarang = date('H');
              foreach ($jam as $key => $value) {
                if ($jamsekarang == $key) {
                  echo "<tr><th class='success text-center'>".$value."</th>";
                } else {
                  echo "<tr><th class='text-center'>".$value."</th>";
                }
                foreach ($lapang as $k => $v) {
                  echo "<td class='jadwal' data-lapang='$k' data-jam='$key' data-booking=''></td>";
                }
                echo "</tr>";
              }
              ?>
            </tbody>
          </table>
        </div>

        <div class="box-footer clearfix">
          <table class="table table-bordered" style="width: 480px; float: right;">
            <tr>
              <td class='success' style="width: 120px">Jam Sekarang</td>
              <td class='danger' style="width: 120px">Booking</td>
              <td class='warning' style="width: 120px">DP</td>
              <td class='info' style="width: 120px">Lunas</td>
              <td style="width: 120px"><i class="fa fa-star"></i> Member</td>
            </tr>
          </table>
        </div>
      </div>
    </section>
  </div>
</section>

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title">Booking</h4>
      </div>
      <div class="modal-body">
        <div class="box-body">
          <div class="form-group">
            <label for="nama" class="col-sm-2 control-label">Nama</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama">
            </div>
          </div>
          <div class="form-group">
            <label for="status" class="col-sm-2 control-label">Status</label>
            <div class="col-sm-10">                         
              <select name="status" class="form-control" id="status">
                <option value="1">Lunas</option>
                <option value="2">DP</option>
              </select>
            </div>
          </div>
        </div>
        <input type="hidden" name="jam" id="jam" />
        <input type="hidden" name="lapang" id="lapang" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary saveBook">Save changes</button>
      </div>
    </div>
  </div>
</div>

<?php
  $this->load->view('foot');
  $this->load->view('script');
?>
<script>
  // $('#modal-default').modal('show');

  $(document).ready(function () {
    $('.sidebar-menu').tree()
  });

  getJadwal();

  function getJadwal() {
    $('.jadwal').each(function() {
      var key = $(this);
      var lapang = key.attr('data-lapang');
      var jam = key.attr('data-jam');

      $.ajax({
        type: 'POST',
        url: "data.php",
        data: { lapang : lapang, jam : jam},
        dataType : 'JSON',
        beforeSend: function() {},
        success: function(data) {
          status = data.status;
          if (status == 'OK') {
            key.addClass("text-center");
            key.text(data.content.nama);
            key.attr('data-booking','1');
            if(data.content.status == 1){	            			
              key.addClass("bg-success");
            }
            else{        			
              key.addClass("bg-danger");
            }
          }
          else{
            key.attr('data-booking','0');
            key.addClass('setForm');
          }
        },
        error: function(xhr) {},
        complete: function(data) {}
      });
    });

    // setFormClicked();
	setTimeout(getJadwal, 5000);
  }

  $("td").click(function(){
    key  = $(this);
    booking = key.attr('data-booking');
    lapang = key.attr('data-lapang');
    jam = key.attr('data-jam');

    if (booking == 0) {
      $('#modal-default').modal('show');
      $('#jam').val(jam);
      $('#lapang').val(lapang);
    }
  });

  $(".saveBook").click(function () {
    var lapang = $('#lapang').val();
    var jam = $('#jam').val();
    var nama = $('#nama').val();
    var status = $('#status').val();

    $.ajax({
      type: 'POST',
      url: "save.php",
      data: { lapang : lapang, jam : jam , nama : nama , status : status },
      dataType : 'JSON',
      beforeSend: function() {},
      success: function(data) {
        status = data.status;
        if (status == 'OK') {
          $('#modal-default').modal('hide');
          $('#nama').val("");
          $('#status').val("1").change();
        }
        else{
          console.log(data.message);
        }
      },
      error: function(xhr) {alert('transport error !');},
      complete: function(data) {}
    });
  });
</script>

</body>
</html>