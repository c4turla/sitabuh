<?php
$userId = $userInfo->userId;
$name = $userInfo->name;
$email = $userInfo->email;
$mobile = $userInfo->mobile;
$roleId = $userInfo->roleId;
$role = $userInfo->role;
?>

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data User</div>
            </div>
        </div>

        <div class="row">
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Profile User</h4>
                  </div>
                  <div class="collapse show" id="mycard-collapse">
                    <div class="card-body">
                    <p class="text-center"><img class="rounded-circle author-box-picture" src="<?php echo base_url(); ?>assets/dist/img/avatar.png" alt="User profile picture"></p>
                        <h3 class="profile-username text-center"><?= $name ?></h3>

                        <p class="text-muted text-center"><?= $role ?></p>

                        <ul class="list-group list-group-unbordered">
                            <li class="list-group-item">
                                <b class="pull-left">Email</b> <a class="pull-right"><?= $email ?></a>
                            </li>
                            <li class="list-group-item">
                                <b class="pull-left">Mobile</b> <a class="pull-right"><?= $mobile ?></a>
                            </li>
                        </ul>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-lg-6">
                <div class="card" id="mycard-dimiss">
                  <div class="card-header">
                    <h4>Detail User</h4>
                  </div>
                  <div class="card-body">
                  <?php
                    $this->load->helper('form');
                    $error = $this->session->flashdata('error');
                    if($error)
                    {
                ?>
                <div class="alert alert-danger alert-dismissable">
                    <button class="close" data-dismiss="alert" aria-hidden="true"><span>×</span></button>
                    <?php echo $this->session->flashdata('error'); ?>                    
                </div>
                <?php } ?>
                <?php  
                    $success = $this->session->flashdata('success');
                    if($success)
                    {
                ?>
                <div class="alert alert-success alert-dismissable">
                    <button class="close" data-dismiss="alert" aria-hidden="true"><span>×</span></button>
                    <?php echo $this->session->flashdata('success'); ?>
                </div>
                <?php } ?>

                <?php  
                    $noMatch = $this->session->flashdata('nomatch');
                    if($noMatch)
                    {
                ?>
                <div class="alert alert-warning alert-dismissable">
                    <button class="close" data-dismiss="alert" aria-hidden="true"><span>×</span></button>
                    <?php echo $this->session->flashdata('nomatch'); ?>
                </div>
                <?php } ?>
                
                <div class="row">
                    <div class="col-md-12">
                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable">', ' <button class="close" data-dismiss="alert"><span>×</span></button></div>'); ?>
                    </div>
                </div>
                  <div class="nav-tabs-custom">

<ul class="nav nav-tabs">
        <li class="nav-item"><a href="#details" data-toggle="tab" aria-expanded="true" class="nav-link active">Detail</a></li>
        <li class="nav-item"><a href="#changepass" data-toggle="tab" aria-expanded="false" class="nav-link <?= ($active == "changepass")? "active" : "" ?>">Ganti Password</a></li>                        
    </ul>
    <div class="tab-content">
        <div class="tab-pane show <?= ($active == "details")? "active" : "" ?>" id="details">
            <form action="<?php echo base_url() ?>profileUpdate" method="post" id="editProfile" role="form">
                <?php $this->load->helper('form'); ?>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">                                
                            <div class="form-group">
                                <label for="fname">Nama Lengkap</label>
                                <input type="text" class="form-control" id="fname" name="fname" placeholder="<?php echo $name; ?>" value="<?php echo set_value('fname', $name); ?>" maxlength="128" />
                                <input type="hidden" value="<?php echo $userId; ?>" name="userId" id="userId" />    
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="mobile">No Handphone</label>
                                <input type="text" class="form-control" id="mobile" name="mobile" placeholder="<?php echo $mobile; ?>" value="<?php echo set_value('mobile', $mobile); ?>" maxlength="12">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" id="email" name="email" placeholder="<?php echo $email; ?>" value="<?php echo set_value('email', $email); ?>">
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->
                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </form>
        </div>
        <div class="<?= ($active == "changepass")? "active" : "" ?> tab-pane" id="changepass">
            <form role="form" action="<?php echo base_url() ?>changePassword" method="post">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputPassword1">Password Lama</label>
                                <input type="password" class="form-control" id="inputOldPassword" placeholder="Old password" name="oldPassword" maxlength="20" required>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputPassword1">Password Baru</label>
                                <input type="password" class="form-control" id="inputPassword1" placeholder="New password" name="newPassword" maxlength="20" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="inputPassword2">Konfirmasi Password Baru</label>
                                <input type="password" class="form-control" id="inputPassword2" placeholder="Confirm new password" name="cNewPassword" maxlength="20" required>
                            </div>
                        </div>
                    </div>
                </div><!-- /.box-body -->

                <div class="card-footer">
                    <input type="submit" class="btn btn-primary" value="Submit" />
                    <input type="reset" class="btn btn-default" value="Reset" />
                </div>
            </form>
        </div>                        
    </div>
    </div>
    </div>

            </div> 

</div>
</div>

<script src="<?php echo base_url(); ?>assets/js/editUser.js" type="text/javascript"></script>
 <!-- Sweet Alerts js -->
 <script src="<?php echo base_url(); ?>assets/kendariweb/libs/sweetalert2/sweetalert2.min.js"></script>

<!-- Sweet alert init js-->
<script src="<?php echo base_url(); ?>assets/kendariweb/js/pages/sweet-alerts.init.js"></script>