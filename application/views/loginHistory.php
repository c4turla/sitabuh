<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Data User</h1>
            <div class="section-header-breadcrumb">
                <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                <div class="breadcrumb-item">Data User</div>
            </div>
        </div>

    <div class="section-body">
      <h2 class="section-title">Riwayat Login</h2>
      <p class="section-lead"> Berikut adalah Riwayat Login User di Aplikasi SITABUH PPS Kendari</p>
      <div class="card">
        <div class="card-body">

    <!-- Content Header (Page header) -->

                <div class="box-header">
                    <h5 class="box-title"><?= !empty($userInfo) ? "Nama : ". $userInfo->name." : ".$userInfo->email : "All users" ?></h5>
                    <div class="box-tools">
                    </div>
                </div><!-- /.box-header -->
                <hr>
                <div class="table-responsive">
                <table id="table-1" class="table table-striped">
                    <thead>
                      <th>Session Data</th>
                      <th>IP Address</th>
                      <th>User Agent</th>
                      <th>Agent Full String</th>
                      <th>Platform</th>
                      <th>Date-Time</th>
                    </thead>
                    <?php
                    if(!empty($userRecords))
                    {
                        foreach($userRecords as $record)
                        {
                    ?>
                    <tr>
                      <td><?php echo $record->sessionData ?></td>
                      <td><?php echo $record->machineIp ?></td>
                      <td><?php echo $record->userAgent ?></td>
                      <td><?php echo $record->agentString ?></td>
                      <td><?php echo $record->platform ?></td>
                      <td><?php echo $record->createdDtm ?></td>
                    </tr>
                    <?php
                        }
                    }
                    ?>
                  </table>
                  
                </div><!-- /.box-body -->
              </div><!-- /.box -->
  
      </div></div></section></div>
<script src="<?php echo base_url(); ?>assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function(){
        jQuery('ul.pagination li a').click(function (e) {
            e.preventDefault();            
            var link = jQuery(this).get(0).href;
            jQuery("#searchList").attr("action", link);
            jQuery("#searchList").submit();
        });

        jQuery('.datepicker').datepicker({
          autoclose: true,
          format : "dd-mm-yyyy"
        });
        jQuery('.resetFilters').click(function(){
          $(this).closest('form').find("input[type=text]").val("");
        })
    });
</script>
