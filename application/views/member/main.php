<section class="content">
  <div class="row">
    <section class="col-xs-12">
      <div class="box box-danger">
        <div class="box-header">
          <i class="fa fa-calendar-check-o"></i>
          <h3 class="box-title">Member</h3>
          <div class="box-tools">
            <button type="button" class="btn btn-primary pull-right" data-toggle="modal" data-target="#modal-addmember">
              <i class="fa fa-plus"></i> Add Member
            </button>
          </div>
        </div>

        <div class="modal fade" id="modal-addmember">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Default Modal</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

        <div class="box-body">
          <table id="datatable" class="table table-bordered table-hover">
            <thead>
              <tr>
                <th class="text-center">ID Kartu</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Jenis</th>
                <th class="text-center">Kadaluarsa</th>
                <th class="text-center">Telepon</th>
                <th class="text-center">Status</th>
                <th class="text-center">Log</th>
              </tr>
            </thead>
            <tbody>
            <?php
              foreach($q_member as $data) {
                echo "<tr>
                  <td class='text-center'><a href='#' data-toggle='modal' data-target='#modal-detail'>".$data->fm_kode."</td>
                  <td class='text-center'>".$data->fm_nama."</td>
                  <td>";
                    if ($data->fm_jenis == 0) { echo "Umum"; }
                    else { echo "Pelajar"; }
                  echo "</td>
                  <td>".$data->fm_kadaluarsa.
                    "<span class='pull-right-container'>
                    <a href='".base_url()."member/perpanjang/".$data->fm_id."' onclick='return confim('Benar?')'>
                    <small class='label pull-right bg-blue'>Perpanjang</small></a></span></td>
                  <td class='text-center'>".$data->fm_telepon."</td>
                  <td class='text-center'>";
                    if ($data->fm_status == 0) { echo "Kadaluarsa"; }
                    else if ($data->fm_status == 1) { echo "Blacklist"; }
                    else { echo "Aktif"; }
                  echo "</td>
                  <td class='text-center'>
                    <a href='".base_url()."member/aktifitas/".$data->fm_id."'>Log Aktifitas</a> ||
                    <a href='".base_url()."member/transaksi/".$data->fm_id."'>Log Transaksi</a>
                  </td>
                </tr>";
              } ?>
            </tfoot>
          </table>
        </div>

        <div class="modal fade" id="modal-detail">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Detail Member</h4>
              </div>
              <div class="modal-body">
                <p>One fine body&hellip;</p>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section>
  </div>
</section>

<?php
  $this->load->view('foot');
  $this->load->view('script');
?>
<script>
  $(function () {
    $('#datatable').DataTable()
  })
</script>
</body>
</html>