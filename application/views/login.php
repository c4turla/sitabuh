<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>SI-TABUH - Sistem Informasi Tambat Labuh PPS Kendari</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
        <meta content="Coderthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App favicon -->
        <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/kendariweb/images/favicon.ico">

        <!-- App css -->
        <link href="<?php echo base_url(); ?>assets/kendariweb/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/kendariweb/css/icons.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/kendariweb/css/app.min.css" rel="stylesheet" type="text/css" />

    </head>

    <body class="authentication-bg authentication-bg-pattern d-flex align-items-center">

        <div class="home-btn d-none d-sm-block">
            <a href="<?php echo base_url(); ?>"><i class="fas fa-home h2 text-white"></i></a>
        </div>
        
        <div class="account-pages w-100 mt-5 mb-5">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8 col-lg-6 col-xl-5">
                        <div class="card">

                            <div class="card-body p-4">
                                
                                <div class="text-center mb-0">
                                    <a href="index.html">
                                        <span><img src="<?php echo base_url(); ?>assets/kendariweb/images/logonew.png" alt="" height="188"></span>
                                    </a>
                                </div>
                                <center><strong> SITABUH - Sistem Informasi Tambat Labuh</strong></center>

                                <?php $this->load->helper('form'); ?>
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php echo validation_errors('<div class="alert alert-danger alert-dismissable fade show" role="alert">', ' <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button></div>'); ?>
                                    </div>
                                </div>
                                <?php
                                $this->load->helper('form');
                                $error = $this->session->flashdata('error');
                                if($error)
                                {
                                    ?>
                                    <div class="alert alert-danger alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $error; ?>                    
                                    </div>
                                <?php }
                                $success = $this->session->flashdata('success');
                                if($success)
                                {
                                    ?>
                                    <div class="alert alert-success alert-dismissable">
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                        <?php echo $success; ?>                    
                                    </div>
                                <?php } ?>

                                <form action="<?php echo base_url(); ?>loginMe" method="post" class="pt-2">

                                    <div class="form-group mb-3">
                                        <label for="emailaddress">Email address</label>
                                        <input class="form-control" type="email" name="email" required="" placeholder="Enter your email">
                                    </div>

                                    <div class="form-group mb-3">
                                        <a href="<?php echo base_url() ?>forgotPassword" class="text-muted float-right"><small>Forgot your password?</small></a>
                                        <label for="password">Password</label>
                                        <input class="form-control" type="password" required="" name="password" placeholder="Enter your password">
                                    </div>

                                    <div class="custom-control custom-checkbox mb-3">
                                        <input type="checkbox" class="custom-control-input" id="checkbox-signin" checked>
                                        <label class="custom-control-label" for="checkbox-signin">Remember me</label>
                                    </div>

                                    <div class="form-group mb-0 text-center">
                                        <button class="btn btn-success btn-block" type="submit"> Log In </button>
                                    </div>

                                </form>

                                <div class="row mt-3">
                                    <div class="col-12 text-center">
                                        <p class="text-muted mb-0">Don't have an account? <a href="#" class="text-dark ml-1" data-toggle="modal" data-target=".daftar"><b>Sign Up</b></a></p>
                                    </div> <!-- end col -->
                                </div>
                                <!-- end row -->

                            </div> <!-- end card-body -->
                        </div>
                        <!-- end card -->

                    </div> <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- end container -->
        </div>
        <!-- end page -->

        <div class="modal fade daftar" tabindex="-1" role="dialog" aria-labelledby="daftar" aria-hidden="true" style="display: none;">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="daftar">Info Aplikasi</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                        </div>
                                        <div class="modal-body">
                                        <h2>Perhatian </h2>    
                                        <p>Silahkan Hubungi Administrator Untuk Bisa Akses Aplikasi ini !!</p>
                                        </div>
                                        <div class="modal-footer justify-content-center">
                                        <button type="button" class="btn btn-secondary tx-11 tx-uppercase pd-y-12 pd-x-25 tx-mont tx-medium" data-dismiss="modal">Tutup</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
        

        <!-- Vendor js -->
        <script src="<?php echo base_url(); ?>assets/kendariweb/js/vendor.min.js"></script>

        <!-- App js -->
        <script src="<?php echo base_url(); ?>assets/kendariweb/js/app.min.js"></script>
        
    </body>
</html>