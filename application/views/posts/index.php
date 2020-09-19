<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex mt-4">
      <a href="<?php echo base_url() ?>blog-post-add" class="btn btn-success"><i class="fa fa-plus"></i> New Post</a>
    </div>
  </div>

  <section class="content-header">
    <div class="row">
      <div class="col-lg-12 msg-alert"></div>
    </div>
  </section>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="table-data-post" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <th>Content</th>
              <th>Created At</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="show-data-post">

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript">
  var save_method; //for save method string
  var table;

  $(document).ready(function() {
    table = $('#table-data-post').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url(); ?>blog-post-data",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 2, 5],
        "orderable": false,
        "searchable": false
      }],
      'order': []
    });

    $(document).on('click', '.send-post', function() {
      var post_id = $(this).attr('id');

      Swal.fire({
        icon: 'question',
        title: 'Are you sure you want to post this article?',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Send'
      }).then((result) => {
        if (result.value) {
          $.ajax({
            url: '<?php echo base_url() ?>blog-post-send',
            type: 'POST',
            data: {
              post_id: post_id
            },
            dataType: 'JSON',
            success: function(data) {
              if (data.status == true) {
                Swal.fire({
                  icon: "success",
                  title: "Successfully send your post!",
                  showConfirmButton: false,
                  timer: 2000,
                });
              } else {
                Swal.fire({
                  icon: "error",
                  title: "Failed send your post, please try again!",
                  showConfirmButton: false,
                  timer: 2000,
                });
              }

              table.ajax.reload(null, false);
              effect_msg();
            }
          });
        }
      });
    });
  });

  function effect_msg() {
    // $('.msg-alert').hide();
    $('.msg-alert').show(1000);
    setTimeout(function() {
      $('.msg-alert').fadeOut(1000);
    }, 3000);
  }

  function deletePost(id) {
    Swal.fire({
      icon: 'warning',
      title: 'Are you sure?',
      text: "You won't be able to revert this!",
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Delete'
    }).then((result) => {
      if (result.value) {
        $.ajax({
          url: '<?php echo base_url() ?>blog-post-delete/' + id,
          type: 'POST',
          dataType: 'JSON',
          success: function(data) {
            if (data.status == true) {
              Swal.fire({
                icon: "success",
                title: "Successfully deleted your post!",
                showConfirmButton: false,
                timer: 2000,
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Failed deleted your post, please try again!",
                showConfirmButton: false,
                timer: 2000,
              });
            }

            table.ajax.reload(null, false);
            effect_msg();
          }
        });
      }
    });
  }
</script>