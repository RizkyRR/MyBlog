      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; <?php echo date('Y') ?> <a href="https://goo.gl/otqUXt" target="_blank">Rizky Rahmadianto</a>.</span> All rights reserved.
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

      </div>
      <!-- End of Content Wrapper -->
      </div>
      <!-- End of Page Wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="<?php echo base_url() ?>auth/logout">Logout</a>
            </div>
          </div>
        </div>
      </div>
      </body>

      <script>
        window.setTimeout(function() {
          $(".alert").fadeTo(5000, 500).slideUp(500, function() {
            $(this).remove();
          });
        })
      </script>

      <script>
        // Add the following code if you want the name of the file appear on select
        $(".custom-file-input").on("change", function() {
          var fileName = $(this).val().split("\\").pop();
          $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
        });
      </script>

      <script>
        $('.button-delete').on('click', function(e) {

          e.preventDefault();
          const href = $(this).attr('href');

          Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete'
          }).then((result) => {
            if (result.value) {
              document.location.href = href;
            }
          });
        });
      </script>

      <!-- <script>
        $(document).ready(function() {
          $('.sidebar-menu').tree()
        })
      </script> -->


      <!-- <script>
        function readURL(input) {
          if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
              $('#prev_foto').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
          }
        }
      </script> -->

      <script>
        $(document).ready(function() {
          $(".datepicker").datepicker({
            todayBtn: "linked",
            format: "yyyy-mm-dd",
            autoclose: true
          });
        });
      </script>

      <!-- Js for message alert -->
      <script>
        $(document).ready(function() {
          setInterval(function() {
            messageAjaxFn();
          }, 1500); //request every x seconds
        });
        var baseurl = "<?php echo base_url(); ?>";

        // to show all message comming
        function messageAjaxFn() {
          $.ajax({
            url: baseurl + "message/message_notif_data",
            type: "ajax",
            cache: false,
            dataType: "JSON",
            success: function(data) {
              var html = "";
              var i;
              for (i = 0; i < data.length; i++) {
                html +=
                  '<a class="dropdown-item d-flex align-items-center" href="' + baseurl + 'message">' +
                  "<div>" +
                  '<div class="text-truncate">' +
                  data[i].message_content +
                  "</div>" +
                  '<div class="small text-gray-500">' +
                  data[i].name +
                  "</div>" +
                  "</div>" +
                  "</a>";
              }
              $("#show_all_message").html(html);
            }
          });

          // to get count message comming or not yet ready
          $.ajax({
            url: baseurl + "message/message_count_data",
            type: "ajax",
            cache: false,
            dataType: "JSON",
            success: function(data) {
              $(".badge-counter-message").html(data);
            }
          });
        }
      </script>

      <!-- Js for comment alert -->
      <script>
        $(document).ready(function() {
          setInterval(function() {
            commentAjaxFn();
          }, 1500); //request every x seconds
        });
        var baseurl = "<?php echo base_url(); ?>";

        function commentAjaxFn() {
          // to show all comment comming
          $.ajax({
            url: baseurl + "comment/comment_notif_data",
            type: "ajax",
            cache: true,
            dataType: "JSON",
            success: function(data) {
              var html = "";
              var i;
              for (i = 0; i < data.length; i++) {
                html +=
                  '<a class="dropdown-item d-flex align-items-center" href="' + baseurl + 'comment">' +
                  "<div>" +
                  '<div class="text-truncate">' +
                  data[i].content +
                  "</div>" +
                  '<div class="small text-gray-500">' +
                  data[i].username +
                  "</div>" +
                  "</div>" +
                  "</a>";
              }
              $("#show_all_comment").html(html);
            }
          });

          // to get count comment comming or not yet ready
          $.ajax({
            url: baseurl + "comment/comment_count_data",
            type: "ajax",
            cache: true,
            dataType: "JSON",
            success: function(data) {
              $(".badge-counter-comment").html(data);
            }
          });
        }
      </script>

      </html>