<footer class="main-footer">
        <div class="footer-left">
        Copyright 2020 &copy; E-Tambat Labuh. All Right Reserved. 
        </div>
        <div class="footer-right">
         Dibuat Oleh : <a href="http://kendariweb.com" target="_blank">Kendariweb</a> <div class="bullet"></div> Versi 1.0.0
        </div>
      </footer>
    </div>
  </div>

  <!-- General JS Scripts -->
  <!-- General JS Scripts -->
  <script src="<?php echo base_url(); ?>assets/tambat/modules/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/tooltip.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/nicescroll/jquery.nicescroll.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/js/stisla.js"></script>


  <script src="<?php echo base_url(); ?>assets/tambat/modules/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/select2/dist/js/select2.full.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/jquery-selectric/jquery.selectric.min.js"></script>

  <!-- JS Libraies -->

  <script src="<?php echo base_url(); ?>assets/tambat/modules/datatables/datatables.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/datatables/Select-1.2.4/js/dataTables.select.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/modules/jquery-ui/jquery-ui.min.js"></script>
 
  <!-- Template JS File -->

  <script src="<?php echo base_url(); ?>assets/tambat/js/scripts.js"></script>
  <script src="<?php echo base_url(); ?>assets/tambat/js/custom.js"></script>
  <script>
      $(function(){
        'use strict';

        $("#table-1").dataTable({
          "columnDefs": [
            { "sortable": false, "targets": [2,3] }
          ]
        });

      });



      // Data Selection
      $(document).ready(function () {     
      $('#changeData').change(function(){
        var gt = $(this).find(':selected').data('gt');
        var panjang = $(this).find(':selected').data('panjang');
          $('#gtkapal').val(gt);
          $('#panjangkapal').val(panjang);
          if (gt<6) {
            document.getElementById("total").value="0";
          } else if (gt<=10) {
            document.getElementById("total").value = "2000";
          } else if (gt<=15) {
            document.getElementById("total").value = "2500";
          } else if (gt<=20) {
            document.getElementById("total").value = "3000";
          } else if (gt<=25) {
            document.getElementById("total").value = "3500";
          } else {
            document.getElementById("total").value = "4000";
          }
          })
      });    

       // Edit Selection
       $(document).ready(function () {     
      $('#EditData').change(function(){
        var gt = $(this).find(':selected').data('gt');
        var panjang = $(this).find(':selected').data('panjang');
          $('#gtkapaledit').val(gt);
          $('#panjangkapaledit').val(panjang);
          if (gt<6) {
            document.getElementById("totale").value="0";
          } else if (gt<=10) {
            document.getElementById("totale").value = "2000";
          } else if (gt<=15) {
            document.getElementById("totale").value = "2500";
          } else if (gt<=20) {
            document.getElementById("totale").value = "3000";
          } else if (gt<=25) {
            document.getElementById("totale").value = "3500";
          } else {
            document.getElementById("totale").value = "4000";
          }
          })
      });   
</script>
</body>
</html>



   