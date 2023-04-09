<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data Kapal</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data Kapal</div>
            </div>
        </div>

        <div class="section-body">
            <h2 class="section-title">List Data Kapal</h2>
            <p class="section-lead"> Berikut adalah List Data Kapal di PPS Kendari</p>
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
                                    <th>Nama Kapal</th>
                                    <th>Pemilik</th>
                                    <th>No Izin</th>
                                    <th>GT</th>
                                    <th>Tipe Kapal</th>
                                    <th>Panjang</th>
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
                                        <td><?php echo $row['pemilik']; ?></td>
                                        <td><?php echo $row['no_izin']; ?></td>
                                        <td><?php echo $row['gt']; ?> </td>
                                        <td><?php echo $row['tipe_kapal']; ?></td>
                                        <td><?php echo $row['panjang']; ?></td>
                                        <td>
                                            <div class='btn-group mb-2'>
                                                <button class='btn btn-light btn-sm dropdown-toggle' type='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
                                                    <i class='dripicons-gear'></i> <i class='mdi mdi-chevron-down'></i>
                                                </button>
                                                <div class='dropdown-menu'>
                                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#edit-data<?php echo $row['id']; ?>"> Ubah Data</a>

                                                    <div class='dropdown-divider'></div>
                                                    <a class='dropdown-item' href='<?= base_url('kapal/hapus/'); ?><?= $row['id']; ?>' class="badge badge-danger pl-2 pr-2" onclick="return confirm('Apakah kamu ingin menghapus data ini?');">Hapus Data</a>
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
    <!-- ============ MODAL EDIT KAPAL =============== -->
    <?php
    foreach ($record as $row) :
        $id = $row['id'];
        $nama_kapal = $row['nama_kapal'];
        $pemilik = $row['pemilik'];
        $gt = $row['gt'];
        $panjang = $row['panjang'];
        $no_izin = $row['no_izin'];
        $alat_tangkap = $row['alat_tangkap'];
        $no_siup = $row['no_siup'];
        $tanda_selar = $row['tanda_selar'];
        $tipe_kapal = $row['tipe_kapal'];
    ?>
        <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="edit-data<?php echo $row['id']; ?>" class="modal fade edit-data">
            <div class='modal-dialog modal-lg'>
                <div class='modal-content'>
                    <div class="modal-header">
                        <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Ubah Data Kapal</h6>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form action="<?php echo base_url('kapal/ubah') ?>" method="post" enctype="multipart/form-data" role="form">
                        <div class='modal-body'>
                            <div class='form-row'>
                                <div class='form-group col-md-6'>
                                    <label for='inputEmail4' class='col-form-label'>Nama Kapal</label>
                                    <input type="hidden" id="id" name="id" value="<?php echo $id; ?>">
                                    <input type='text' class='form-control' id='nama_kapal' name="nama_kapal" value="<?php echo $nama_kapal; ?>" placeholder='Nama Kapal'>
                                </div>
                                <div class='form-group col-md-6'>
                                    <label for='inputPassword4' class='col-form-label'>Pemilik</label>
                                    <input type='text' class='form-control' id='pemilik' name="pemilik" value="<?php echo $pemilik; ?>" placeholder='Pemilik'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-2'>
                                    <label for='inputEmail4' class='col-form-label'>GT</label>
                                    <input type='number' class='form-control' id='gt' name="gt" value="<?php echo $gt; ?>" placeholder='GT'>
                                </div>
                                <div class='form-group col-md-2'>
                                    <label for='inputPassword4' class='col-form-label'>Panjang</label>
                                    <input type='text' class='form-control' id='panjang' name="panjang" value="<?php echo $panjang; ?>" placeholder='Panjang'>
                                </div>
                                <div class='form-group col-md-8'>
                                    <label for='inputPassword4' class='col-form-label'>No Izin</label>
                                    <input type='text' class='form-control' id='no_izin' name="no_izin" value="<?php echo $no_izin; ?>" placeholder='No Izin'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-6'>
                                    <label for='inputEmail4' class='col-form-label'>Alat Tangkap</label>
                                    <input type='text' class='form-control' id='alat_tangkap' name="alat_tangkap" value="<?php echo $alat_tangkap; ?>" placeholder='Alat Tangkap'>
                                </div>
                                <div class='form-group col-md-6'>
                                    <label for='inputPassword4' class='col-form-label'>Nomor SIUP</label>
                                    <input type='text' class='form-control' id='no_siup' name="no_siup" value="<?php echo $no_siup; ?>" placeholder='Nomor SIUP'>
                                </div>
                            </div>
                            <div class='form-row'>
                                <div class='form-group col-md-6'>
                                    <label for='inputEmail4' class='col-form-label'>Tanda Selar</label>
                                    <input type='text' class='form-control' id='tanda_selar' name="tanda_selar" value="<?php echo $tanda_selar; ?>" placeholder='Tanda Selar'>
                                </div>
                                <div class='form-group col-md-6'>
                                    <label for='tipe_kapal' class='col-form-label'>Tipe Kapal</label>
                                    <select id="tipe_kapal" class="form-control" name="tipe_kapal">
                                        <option value="">Pilih Tipe Kapal</option>
                                        <?php if ($tipe_kapal == 'Penangkap') : ?>
                                            <option value="Penangkap" selected>Penangkap</option>
                                            <option value="Pengangkut/Pengumpul">Pengangkut/Pengumpul</option>
                                            <option value="Kapal Lampu">Kapal Lampu</option>
                                            <option value="Non Perikanan">Non Perikanan</option>
                                        <?php elseif ($tipe_kapal == 'Pengangkut/Pengumpul') : ?>
                                            <option value="Penangkap">Penangkap</option>
                                            <option value="Pengangkut/Pengumpul" selected>Pengangkut/Pengumpul</option>
                                            <option value="Kapal Lampu">Kapal Lampu</option>
                                            <option value="Non Perikanan">Non Perikanan</option>
                                        <?php elseif ($tipe_kapal == 'Kapal Lampu') : ?>
                                            <option value="Penangkap">Penangkap</option>
                                            <option value="Pengangkut/Pengumpul">Pengangkut/Pengumpul</option>
                                            <option value="Kapal Lampu" selected>Kapal Lampu</option>
                                            <option value="Non Perikanan">Non Perikanan</option>
                                        <?php elseif ($tipe_kapal == 'Non Perikanan') : ?>
                                            <option value="Penangkap">Penangkap</option>
                                            <option value="Pengangkut/Pengumpul">Pengangkut/Pengumpul</option>
                                            <option value="Kapal Lampu">Kapal Lampu</option>
                                            <option value="Non Perikanan" selected>Non Perikanan</option>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            <div class='modal-footer bg-whitesmoke br' >
                                <button type='submit' class='btn btn-primary waves-effect'>Ubah Data</button>
                                <button type='button' class='btn btn-warning waves-effect' data-dismiss='modal'>Tutup</button>
                            </div>
                        </div>
                    </form>
                </div><!-- /.modal-content -->
            </div><!-- /.modal-dialog -->
        </div><!-- /.modal -->
    <?php endforeach; ?>

    <div class='modal fade' id='tambah-data' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true' style='display: none;'>
        <div class='modal-dialog modal-lg'>
            <div class='modal-content'>
                <div class="modal-header">
                    <h6 class="tx-14 mg-b-0 tx-uppercase tx-inverse tx-bold">Tambah Data Kapal</h6>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?php echo base_url('kapal/tambah') ?>" method="post" enctype="multipart/form-data" role="form">
                    <div class='modal-body'>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='inputEmail4' class='col-form-label'>Nama Kapal</label>
                                <input type='text' class='form-control' id='nama_kapal' name="nama_kapal" placeholder='Nama Kapal' required>
                            </div>
                            <div class='form-group col-md-6'>
                                <label for='inputPassword4' class='col-form-label'>Pemilik</label>
                                <input type='text' class='form-control' id='pemilik' name="pemilik" placeholder='Pemilik' required>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-2'>
                                <label for='inputEmail4' class='col-form-label'>GT</label>
                                <input type='number' class='form-control' id='gt' name="gt" placeholder='GT' required>
                            </div>
                            <div class='form-group col-md-2'>
                                <label for='inputPassword4' class='col-form-label'>Panjang</label>
                                <input type='text' class='form-control' id='panjang' name="panjang" placeholder='Panjang' required>
                            </div>
                            <div class='form-group col-md-8'>
                                <label for='inputPassword4' class='col-form-label'>No Izin</label>
                                <input type='text' class='form-control' id='no_izin' name="no_izin" placeholder='No Izin'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='inputEmail4' class='col-form-label'>Alat Tangkap</label>
                                <input type='text' class='form-control' id='alat_tangkap' name="alat_tangkap" placeholder='Alat Tangkap'>
                            </div>
                            <div class='form-group col-md-6'>
                                <label for='inputPassword4' class='col-form-label'>Nomor SIUP</label>
                                <input type='text' class='form-control' id='no_siup' name="no_siup" placeholder='Nomor SIUP'>
                            </div>
                        </div>
                        <div class='form-row'>
                            <div class='form-group col-md-6'>
                                <label for='inputEmail4' class='col-form-label'>Tanda Selar</label>
                                <input type='text' class='form-control' id='tanda_selar' name="tanda_selar" placeholder='Tanda Selar'>
                            </div>
                            <div class='form-group col-md-6'>
                                <label for='inputPassword4' class='col-form-label'>Tipe Kapal</label>
                                <select id="tipe_kapal" name="tipe_kapal" class="form-control" required>
                                    <option value="">Pilih Tipe Kapal</option>
                                    <option value="Penangkap">Penangkap</option>
                                    <option value="Pengangkut/Pengumpul">Pengangkut/Pengumpul</option>
                                    <option value="Kapal Lampu">Kapal Lampu</option>
                                    <option value="Non Perikanan">Non Perikanan</option>
                                </select>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='submit' class='btn btn-primary waves-effect'>Simpan Data</button>
                            <button type='button' class='btn btn-warning waves-effect' data-dismiss='modal'>Tutup</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

</div>