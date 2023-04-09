<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Jasa Penggunaan Listrik</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Jasa Penggunaan Listrik</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Jasa Penggunaan Listrik</h2>
      <p class="section-lead"> Berikut adalah List Jasa Penggunaan Listrik di PPS Kendari</p>
      <div class="card">
        <div class="card-header">
          <a class='pull-right btn btn-primary btn-sm' href='#' data-toggle="modal" data-target="#tambah-data">Tambahkan Data</a>
        </div>
        <div class="card-body">
          <?= $this->session->flashdata('notif') ?>

          <table id="datatable" class="table table-striped   ">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Orang/Perusahaan</th>
                <th>Kwh Awal</th>
                <th>Kwh Akhir</th>
                <th>Jumlah Kwh</th>
                <th>Tgl/Jam</th>
                <th>Tagihan</th>
                <th>Aksi</th>
              </tr>
            </thead>
            <tbody>

            </tbody>
          </table>
        </div>
      </div>
    </div>

  </section>
  <div class='modal fade' id='tambah-data' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class="modal-header">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Data Jasa Penggunaan Listrik</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form1" action="<?php echo base_url('tambatlabuh/tambahlistrik') ?>" method="post">
          <div class='modal-body'>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="namakapal" class="col-form-label">Nama Orang/Perusahaan</label>
                <input type="text" class="form-control" id="nama_perusahaan" name="nama_perusahaan">

              </div>
              <div class="form-group col-md-3">
                <label for="gt" class="col-form-label">Kwh Awal</label>
                <input type="number" class="form-control" id="kwh_awal" name="kwh_awal">
              </div>

              <div class="form-group col-md-3">
                <label for="panjang" class="col-form-label">Kwh Akhir</label>
                <input type="number" class="form-control" id="kwh_akhir" name="kwh_akhir">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="gt" class="col-form-label">Jumlah Kwh</label>
                <input type="text" class="form-control" id="jumlah_kwh" name="jumlah_kwh">
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Bulan</label>
                <select name="bulan" class="form-control">
                  <?php
                  $bulan = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                  for ($a = 1; $a <= 12; $a++) {
                    if ($a == date("m")) {
                      $pilih = "selected";
                    } else {
                      $pilih = "";
                    }
                    echo ("<option value=\"$a\" $pilih>$bulan[$a]</option>" . "\n");
                  }
                  ?>
                </select>
              </div>

              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Jumlah Tagihan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="tagihan" id="tagihan">
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">PPn 10%</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="ppn" id="ppn">
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Sub Total</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="total" id="total">
                </div>
              </div>
            </div>
          </div>
          <div class='modal-footer'>
            <button type='submit' class='btn btn-primary waves-effect'><span class='fa fa-save'></span> Simpan Data</button>
            <button type='button' class='btn btn-warning waves-effect' data-dismiss='modal'><span class='fa fa-power-off'></span> Tutup</button>
          </div>
        </form>
      </div>

    </div>

  </div>
</div>
<script type="text/javascript">
  window.onload = function() {
    $('#kwh_akhir, #jumlah_kwh').on('change', function() {
      $(function() {

        var awal = $('#kwh_awal').val();
        var akhir = $('#kwh_akhir').val();

        var x = Math.ceil(akhir - awal);
        if (x < 80 ) {
          document.getElementById("jumlah_kwh").value = "80";
        } else {
          $('#jumlah_kwh').val(x);
        }
        //  var total = 2 * (jumlah);
        var kali = $('#tagihan').val(Number(x) * (1467.28));
       
        var ppn = $('#ppn').val(Number((0.1) * kali));
        var sub = $('#total').val(kali + ppn);

      });
    });
  }
</script>