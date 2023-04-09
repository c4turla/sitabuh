<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Setting Data User</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item">Setting Data User</div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">Setting Data User</h2>
      <p class="section-lead"> Berikut adalah List Data User di Aplikasi SITABUH PPS Kendari</p>
      <div class="card">
        <div class="card-header">
          <a class='pull-right btn btn-primary btn-sm' href='<?php echo base_url(); ?>addNew' >Tambahkan Data</a>
        </div>
        <div class="card-body">

                    <hr>
                    <div class="table-responsive">
                    <table id="table-1" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Mobile</th>
                                <th>Role</th>
                                <th>Created On</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!empty($userRecords)) {
                                foreach ($userRecords as $record) {
                            ?>
                                    <tr>
                                        <td><?php echo $record->name ?></td>
                                        <td><?php echo $record->email ?></td>
                                        <td><?php echo $record->mobile ?></td>
                                        <td><?php echo $record->role ?></td>
                                        <td><?php echo date("d-m-Y", strtotime($record->createdDtm)) ?></td>
                                        <td class="text-center">
                                            <a class="btn btn-sm btn-primary" href="<?= base_url() . 'login-history/' . $record->userId; ?>" title="Login history"><i class="fa fa-history"></i></a> |
                                            <a class="btn btn-sm btn-info" href="<?php echo base_url() . 'editOld/' . $record->userId; ?>" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a class="btn btn-sm btn-danger deleteUser" href="#" data-userid="<?php echo $record->userId; ?>" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>
                            </body>
                    </table>
                    </div>
                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div> <!-- end row -->
  </section>
</div>