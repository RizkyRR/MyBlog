  <!-- Bootstrap core JavaScript-->
  <script src="<?php echo base_url(); ?>back-assets/vendor/jquery/jquery.min.js"></script>
  <script src="<?php echo base_url(); ?>back-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- CLOSE ALERT AUTOMATICALLY -->
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(1000, 500).slideUp(500, function() {
        $(this).remove();
      });
    })
  </script>

  <!-- Core plugin JavaScript-->
  <script src="<?php echo base_url(); ?>back-assets/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?php echo base_url(); ?>back-assets/js/sb-admin-2.min.js"></script>

  </body>

  </html>