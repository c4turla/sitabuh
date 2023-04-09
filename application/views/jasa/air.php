<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Jasa Pelayanan Air</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Jasa Pelayanan Air</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Jasa Pelayanan Air</h2>
      <p class="section-lead"> Berikut adalah List Data Pelayanan Air di PPS Kendari</p>
      <div class="card">
        <div class="card-header">
          <a class='pull-right btn btn-primary btn-sm' href='#' data-toggle="modal" data-target="#tambah-data">Tambahkan Data</a>
        </div>
        <div class="card-body">
          <?= $this->session->flashdata('notif') ?>
          <div class="table-responsive">
          <table id="table-1" class="table table-striped">
            <thead>
              <tr>
                <th>#</th>
                <th>Nama Kapal</th>
                <th>Awal</th>
                <th>Akhir</th>
                <th>Tanggal Isi</th>
                <th>Volume</th>
                <th>Tarif</th>
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
                      <td><?php echo $row['nama_kapal']; ?></td>
                      <td><?php echo $row['awal']; ?></td>
                      <td><?php echo $row['akhir']; ?></td>
                      <td><?php echo date('d-M-Y', strtotime($row['tgl_isi'])); ?> </td>       
                      <td><?php echo $row['volume']; ?> M<sup>3</sup></td>
                      <td><?php echo number_format($row['tarif']); ?></td>
                      <td style="text-align: right;">Rp <?php echo number_format($row['total_tagihan']); ?></td>
                      <td>
                      <a class="btn btn-warning btn-sm" href="<?= base_url('tambatlabuh/cetak_air/'); ?><?php echo $row['id_air']; ?>" target="_blank"> <span class='fa fa-print fa-xs'></span></a>
                        <div class='btn-group mb-2'>
                          <button class='btn btn-light btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                            <i class='dripicons-gear'></i> <i class='mdi mdi-chevron-down'></i>
                          </button>
                          <div class='dropdown-menu'>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-data<?php echo $row['id_air']; ?>">Void Data</a>

                            <div class='dropdown-divider'></div>
                            <a class='dropdown-item' href='<?= base_url('tambatlabuh/hapus_air/'); ?><?php echo $row['id_air']; ?>' class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus Data</a>
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
    </div>

  </section>
  <div class='modal fade' id='tambah-data' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class="modal-header">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Data Jasa Pelayanan Air</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form1" action="<?php echo base_url('tambatlabuh/tambahair')?>" method="post">
          <div class='modal-body'>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="namakapal" class="col-form-label">Nama Kapal</label>
                <input type="hidden" name="kode_air" value="<?php echo $kode_air; ?>">
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
                <label for="inputEmail4" class="col-form-label">Tanggal Isi</label>
                <input type="text" class="form-control datepicker" id="tgl_isi" name="tgl_isi" required>
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Nomor Meteran Awal</label>
                <input type="text" class="form-control" id="awal" name="awal">
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Nomor Meteran Akhir</label>
                <input type="text" class="form-control" id="akhir" name="akhir">
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tarif</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="tarif" id="tarif" value="15.500" readonly>
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Volume Air</label>
                <input type="number" class="form-control" id="volume" name="volume" placeholder="Volume Air">
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

  <!-- Void Air -->
  <?php
  foreach ($record as $row) :
    $id_air = $row['id_air'];
    $id_kapal = $row['id'];
    $nama_kapal = $row['nama_kapal'];
    $panjang = $row['panjang'];
    $gt = $row['gt'];
    $awal = $row['awal'];
    $akhir = $row['akhir'];
    $volume = $row['volume'];
    $tgl_isi = $row['tgl_isi'];
    $total_tagihan = $row['total_tagihan'];
  ?>
  <div class='modal fade' id='edit-data<?php echo $row['id_air']; ?>' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
    <div class='modal-dialog modal-lg'>
      <div class='modal-content'>
        <div class="modal-header">
          <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Void Data Jasa Pelayanan Air</h6>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form id="form1" action="<?php echo base_url('tambatlabuh/voidair')?>" method="post">
          <div class='modal-body'>
            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="namakapal" class="col-form-label">Nama Kapal</label>
                <input type="hidden" class="form-control" name="id" value="<?php echo $id_air; ?>">
                <select class="form-control changeData" name="namakapal" id="changeData" disabled>
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
                <input type="text" class="form-control" id="gtkapal" name="gtkapal" value="<?php echo $gt; ?>" readonly>
              </div>

              <div class="form-group col-md-3">
                <label for="panjang" class="col-form-label">Panjang Kapal</label>
                <input type="text" class="form-control" id="panjangkapal" name="panjangkapal" value="<?php echo $panjang; ?>" readonly>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tanggal Isi</label>
                <input type="text" class="form-control datepicker" id="tgl_isi" name="tgl_isi" value="<?php echo $tgl_isi; ?>" readonly>
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Nomor Meteran Awal</label>
                <input type="text" class="form-control" id="awal" name="awal" value="<?php echo $awal; ?>" readonly>
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Nomor Meteran Akhir</label>
                <input type="text" class="form-control" id="akhir" name="akhir" value="<?php echo $akhir; ?>" readonly>
              </div>

              <div class="form-group col-md-3">
                <label for="inputEmail4" class="col-form-label">Tarif</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="tarif" id="tarif" value="15.500" readonly>
                </div>
              </div>

              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Volume Air M<sup>3</sup></label>
                <input type="number" class="form-control" id="volume" name="volume" value="<?php echo $volume; ?>" readonly>
              </div>
              <div class="form-group col-md-3">
                <label for="inputPassword4" class="col-form-label">Jumlah Tagihan</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text">
                      Rp
                    </div>
                  </div>
                  <input type="text" class="form-control currency" name="tagihan" id="tagihan" value="<?php echo $total_tagihan; ?>" readonly>
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
    $('#akhir, #volume').on('change', function() {
      $(function() {

       var awal = $('#awal').val();
       var akhir = $('#akhir').val();

       var jumlah = $('#volume').val(Math.ceil(akhir - awal));
     //  var total = 2 * (jumlah);

       var total = $('#tagihan').val(Math.ceil((akhir - awal) * 15500));

      });
    });
  }
</script>