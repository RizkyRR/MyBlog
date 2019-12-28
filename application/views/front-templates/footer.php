<hr>

<!-- Footer -->
<footer>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <ul class="list-inline text-center">

          <?php
          if ($link_profile) :
            foreach ($link_profile as $val) :
          ?>
              <li class="list-inline-item">
                <a href="<?php echo $val['url'] ?>">
                  <span class="fa-stack fa-lg">
                    <i class="fas fa-circle fa-stack-2x"></i>
                    <i class="<?php echo $val['icon'] ?> fa-stack-1x fa-inverse"></i>
                  </span>
                </a>
              </li>
            <?php endforeach; ?>
          <?php endif; ?>

        </ul>
        <p class="copyright text-muted">Copyright &copy; <a href="https://goo.gl/otqUXt" target="_blank" style="text-decoration: none;">Rizky Rahmadianto</a> <?php echo date('Y') ?> </p>
      </div>
    </div>
  </div>
</footer>

<!-- Bootstrap core JavaScript -->
<script src="<?php echo base_url(); ?>front-assets/vendor/jquery/jquery.min.js"></script>
<script src="<?php echo base_url(); ?>front-assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Custom scripts for this template -->
<script src="<?php echo base_url(); ?>front-assets/js/clean-blog.min.js"></script>
<script src="<?php echo base_url(); ?>back-assets/sweet_alert/dist/sweetalert2.all.min.js"></script>
<script src="<?php echo base_url(); ?>front-assets/js/contact_me.js"></script>
<script src="<?php echo base_url(); ?>front-assets/js/jqBootstrapValidation.js"></script>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>

<!-- Sweet Alert if Contact Success -->
<!-- <script>
  $(document).ready(function() {
    $("#contactForm").submit(function(e) {
      var form = $(this);
      var name = $('#name').val();
      var phone = $('#phone').val();
      var email = $('#email').val();
      var message = $('#message').val();

      e.preventDefault(); // <--- prevent form from submitting

      if (!form.valid()) return false;

      swal.fire({
        title: "Are you sure?",
        text: "If the message has been sent but the email address and telephone number are incorrect, then it will not be replied!",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: '#1FAB45',
        confirmButtonText: 'Yes, I am sure!',
        cancelButtonText: "No, cancel it!",
      }).then(function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            type: "POST",
            url: "<?= base_url(); ?>contact/sendMessage",
            data: {
              'name': name,
              'email': email,
              'phone': phone,
              'message': message
            },
            cache: false,
            success: function(response) {
              swal.fire({
                title: 'Success!',
                text: 'The message has been sent, please patiently wait for a reply. Thank you!',
                type: 'success'
              })
              /* .then(function() {
                form.submit(); // <--- submit form programmatically and if not using ajax
              }); */
              /* $('#name').val('');
              $('#phone').val('');
              $('#email').val('');
              $('#message').val(''); */
              setTimeout(function() { // wait for 5 secs(2)
                document.location.reload(); // then reload the page.(3)
              }, 2000);
            },
            failure: function(response) {
              swal.fire(
                "Internal Error",
                "Oops, your note was not saved.", // had a missing comma
                "error"
              )
            }
          });
          return false;
        } else {
          swal.fire("Cancelled", "It's ok we will talk later :)", "error");
        }
      })
    });
  });
</script> -->

</body>

</html>