<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Data Kapal</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Data Tambat Labuh</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Data Tambat Labuh</h2>
      <p class="section-lead"> List Data Tambat Labuh GT <= 30</p>
          <div class="card">
            <div class="card-header">
              <a class='pull-right btn btn-primary btn-sm' href='#' data-toggle="modal" data-target="#tambah-data">Tambahkan Data</a>
            </div>
            <div class="card-body">
              <?= $this->session->flashdata('notif') ?>
              <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Nota</th>
                      <th>Nama Kapal</th>
                      <th>GT</th>
                      <th>Panjang</th>
                      <th>Kedatangan</th>
                      <th>Keberangkatan</th>
                      <th>Etmal</th>
                      <th>Tagihan</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $no = 1;
                    foreach ($record as $row) : ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?php echo $row['kd_tambat']; ?></td>
                        <td><?php echo $row['nama_kapal']; ?></td>
                        <td><?php echo $row['gt']; ?></td>
                        <td><?php echo $row['panjang']; ?></td>
                        <td><?php echo date('d-M-Y', strtotime($row['tanggal_kedatangan'])); ?></td>
                        <td><?php echo date('d-M-Y', strtotime($row['tanggal_keberangkatan'])); ?></td>
                        <td><?php echo $row['etmal']; ?> Etmal</td>
                        <td><?php echo number_format($row['total_tagihan']); ?></td>
                        <td>
                          <?php 
                          if ($row['status']=='Void')
                            {
                            }
                          elseif ($row['status']=='Aktif') { ?>
                          <a class="btn btn-warning btn-sm" href="<?= base_url('tambatlabuh/cetak_gtkurang/'); ?><?php echo $row['id_tambat']; ?>" target="_blank"> <span class='fa fa-print fa-xs'></span></a>
                          <?php }; ?>
                          <div class='btn-group mb-2'>
                            <button class='btn btn-light btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                              <i class='dripicons-gear'></i> <i class='mdi mdi-chevron-down'></i>
                            </button>
                            <div class='dropdown-menu'>
                              <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-data<?php echo $row['id_tambat']; ?>"> Void Data</a>

                              <div class='dropdown-divider'></div>
                              <a class='dropdown-item' href='<?= base_url('tambatlabuh/hapus_gtkurang/'); ?><?php echo $row['id_tambat']; ?>' class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus Data</a>
                            </div>
                          </div>

                        </td>
                      </tr>
                    <?php endforeach; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
    </div> <!-- end row -->
  </section>

  <div class='modal fade' id='tambah-data' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class="modal-header">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Tambat Labuh</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form1" action="<?php echo base_url('tambatlabuh/tambahgtkurang') ?>" method="post">
          <div class='modal-body'>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="namakapal" class="col-form-label">Nama Kapal</label>
                <input type="hidden" name="kd_tambat" value="<?php echo $kode_tambat; ?>">
                <select class="form-control changeData" name="namakapal" id="changeData">
                  <option value="">Pilih Kapal</option>
                  <?php
                  if (!empty($kapal)) {
                    foreach ($kapal as $rl) {
                  ?>
                      <option value="<?php echo $rl->id ?>" data-gt="<?php echo $rl->gt ?>" data-panjang="<?php echo $rl->panjang ?>"> <?php echo $rl->nama_kapal ?></option>
                  <?php
                    }
                  }
                  ?>
                </select>
              </div>
              <div class="form-group col-md-3">
                <label for="gt" class="col-form-label">GT</label>
                <input type="text" class="form-control" id="gtkapal" name="gtkapal" readonly>
              </div>

              <div class="form-group col-md-3">
                <label for="panjang" class="col-form-label">Panjang Kapal</label>
                <input type="text" class="form-control" id="panjangkapal" name="panjangkapal" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tanggal Kedatangan</label>
                <input type="text" class="form-control datepicker" name="awal" id="awal" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tanggal Keberangkatan</label>
                <input type="text" class="form-control datepicker" name="akhir" id="akhir" required>
              </div>
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tagihan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="total" id="total" readonly>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Etmal</label>
                <input type="text" class="form-control" id="etmal" name="etmal">
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
                <div id="penjumlahan"></div>
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

  <!-- Edit GT Kurang -->
  <?php
  foreach ($record as $row) :
    $id = $row['id_tambat'];
    $id_kapal = $row['id_kapal'];
    $nama_kapal = $row['nama_kapal'];
    $panjang = $row['panjang'];
    $gt = $row['gt'];
    $tanggal_kedatangan = $row['tanggal_kedatangan'];
    $tanggal_keberangkatan = $row['tanggal_keberangkatan'];
    $etmal = $row['etmal'];
    $tagihan = $row['tagihan'];
    $total_tagihan = $row['total_tagihan'];
  ?>
    <div class='modal fade' id='edit-data<?php echo $row['id_tambat']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
      <div class='modal-dialog modal-lg'>
        <div class='modal-content'>
          <div class="modal-header">
            <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Void Tambat Labuh</h6>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form id="form1" action="<?php echo base_url('tambatlabuh/ubahgtkurang') ?>" method="post">
            <div class='modal-body'>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="namakapal" class="col-form-label">Nama Kapal</label>
                  <input type="hidden" class="form-control" name="id" value="<?php echo $id; ?>">
                  <input type="hidden" class="form-control" name="status" value="Void">
                  <select class="form-control EditData" name="idkapal" id="EditData">
                    <option value="">Pilih Kapal</option>
                    <?php foreach ($kapal as $rl){ ?>
                        <?php if ( $rl->id === $id_kapal ) : ?>
                        <option value="<?php echo $rl->id ?>" selected><?php echo $rl->nama_kapal ?></option>
                        <?php else : ?>
                        <option value="<?php echo $rl->id ?>" data-gt="<?php echo $rl->gt ?>" data-panjang="<?php echo $rl->panjang ?>"><?php echo $rl->nama_kapal ?></option>
                        <?php endif; ?>
							      <?php } ?>

                  </select>
                </div>
                <div class="form-group col-md-3">
                  <label for="gt" class="col-form-label">GT</label>
                  <input type="text" class="form-control" id="gtkapaledit" name="gtkapal" value="<?php echo $gt; ?>" readonly>
                </div>

                <div class="form-group col-md-3">
                  <label for="panjang" class="col-form-label">Panjang Kapal</label>
                  <input type="text" class="form-control" id="panjangkapaledit" name="panjangkapal" value="<?php echo $panjang; ?>" readonly>
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-3">
                  <label for="inputEmail4" class="col-form-label">Tanggal Kedatangan</label>
                  <input type="text" class="form-control datepicker" name="awal" id="awaledit" value="<?php echo $tanggal_kedatangan; ?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4" class="col-form-label">Tanggal Keberangkatan</label>
                  <input type="text" class="form-control datepicker" name="akhir" id="akhiredit" value="<?php echo $tanggal_keberangkatan; ?>" required>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputEmail4" class="col-form-label">Tagihan</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="total" id="totale" value="<?php echo $tagihan; ?>" readonly>
                  </div>
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4" class="col-form-label">Etmal</label>
                  <input type="text" class="form-control" id="etmaledit" name="etmal" value="<?php echo $etmal; ?>">
                </div>
                <div class="form-group col-md-3">
                  <label for="inputPassword4" class="col-form-label">Jumlah Tagihan</label>
                  <div class="input-group">
                    <div class="input-group-prepend">
                      <div class="input-group-text">
                        Rp
                      </div>
                    </div>
                    <input type="text" class="form-control currency" name="tagihan" id="tagihane" value="<?php echo $total_tagihan; ?>">
                  </div>
                </div>
              </div>
            </div>
            <div class='modal-footer'>
              <button type='submit' class='btn btn-danger waves-effect'><span class='fa fa-recycle'></span> Void Data</button>
              <button type='button' class='btn btn-warning waves-effect' data-dismiss='modal'><span class='fa fa-power-off'></span> Tutup</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endforeach; ?>
</div>


<script type="text/javascript">
  window.onload = function() {
    $('#akhir,#awal,#etmal,#total').on('change', function() {
      $(function() {

        var start = new Date($('#awal').val());
        var end = new Date($('#akhir').val());
        var x = (Math.abs(start - end) / 86400000);
        if (x == 0) {
          document.getElementById("etmal").value = "1";
        } else {
          $('#etmal').val(x);
        }
        var t = $('#total').val();
        var kali = Number(x) * Number(t);
        if (x != "" && t != "") {
          $('#tagihan').val(kali);
        }
      });

    });

    $('#akhiredit,#awaledit,#etmaledit,#totale').on('change', function() {
      $(function() {

        var start = new Date($('#awaledit').val());
        var end = new Date($('#akhiredit').val());
        var x = (Math.abs(start - end) / 86400000);
        if (x == 0) {
          document.getElementById("etmaledit").value = "1";
        } else {
          $('#etmaledit').val(x);
        }
        var t = $('#totale').val();
        var kali = Number(x) * Number(t);
        if (x != "" && t != "") {
          $('#tagihane').val(kali);
        }
      });

    });
  }

  $('#tambah-data').on('hidden.bs.modal', function() {
    $(this).find('#form1')[0].reset();
  })
</script>