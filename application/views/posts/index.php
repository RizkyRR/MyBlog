<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex mt-4">
      <!-- Button Add New -->
      <a href="<?php echo base_url() ?>post/addpost" class="btn btn-success"><i class="fa fa-plus"></i> New Post</a>
      <!-- Button Add New -->
    </div>

    <div class="d-sm-flex mt-4">
      <!-- search form -->
      <form action="" method="post">
        <div class="input-group">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search..." autocomplete="off" autofocus>
          <div class="input-group-append">
            <button type="submit" name="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
            <!-- <input type="submit" name="submit" class="btn btn-primary"> -->
          </div>
        </div>
      </form>
      <!-- /.search form -->
    </div>
  </div>

  <section class="content-header">
    <div class="row">
      <div class="col-lg-12">
        <?php if ($this->session->flashdata('success')) { ?>
          <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-check"></i> Alert!</h4>
            <?php echo $this->session->flashdata('success'); ?>
          </div>
        <?php } else if ($this->session->flashdata('error')) { ?>
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h4><i class="icon fa fa-ban"></i> Alert!</h4>
            <?php echo $this->session->flashdata('error'); ?>
          </div>
        <?php } ?>
      </div>
    </div>
  </section>

  <!-- DataTales Example -->
  <div class="card shadow mb-4">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Title</th>
              <!-- <th>Slug</th> -->
              <th>Content</th>
              <th>Created At</th>
              <th>Active</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($post) :
              foreach ($post as $val) :
            ?>
                <tr>
                  <td><?php echo ++$start; ?></td>
                  <td><?php echo $val['title']; ?></td>
                  <!-- <td><?php echo $val['b_slug']; ?></td> -->
                  <td><?php echo $val['short_content']; ?></td>
                  <td><?php echo date('d M Y H:i:s', strtotime($val['created_at'])); ?></td>
                  <td>
                    <?php
                    if ($val['active'] == "Active") {
                      echo "<p class='badge badge-success'>Active</p>";
                    } else {
                      echo "<p class='badge badge-danger'>Inactive</p>";
                    }
                    ?>
                  </td>
                  <td>
                    <a href="<?php echo base_url() ?>post/deletepost/<?php echo $val['blog_id'] ?>" class="btn btn-sm btn-danger button-delete btn-circle" title="Delete Post"><i class="fas fa-trash"></i></a>
                    <a href="<?php echo base_url() ?>post/editpost/<?php echo $val['blog_id'] ?>" class="btn btn-sm btn-warning btn-circle" title="Edit Post"><i class="fas fa-pencil-alt"></i></a>
                    <a href="#" data-toggle="modal" data-target="#detail-modal<?php echo $val['blog_id'] ?>" class="btn btn-sm btn-info btn-circle" data-popup="tooltip" data-placement="top" title="Detail Post"><i class="fas fa-info"></i></a>
                    <?php if ($val['pending'] == 1) : ?>
                      <button type="button" name="send" id="<?php echo $val['blog_id'] ?>" class="btn btn-sm btn-success send-post btn-circle" title="Send Post"><i class="fas fa-paper-plane"></i></button>
                    <?php endif; ?>
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="8" style="text-align: center">Data not found !</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
      <div class="row">
        <div class="col-md-12">
          <?php echo $pagination; ?>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script>
  $(document).ready(function() {
    $(document).on('click', '.send-post', function() {
      var post_id = $(this).attr('id');
      if (confirm("Are you sure you want to post this article?")) {
        $.ajax({
          url: "<?= base_url(); ?>post/sendpost",
          method: 'POST',
          data: {
            post_id: post_id
          },
          success: function(data) {
            window.location.reload();
          }
        })
      } else {
        return false;
      }
    });
  });
</script>