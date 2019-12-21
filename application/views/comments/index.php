<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex mt-4">
      <!-- search form -->
      <form action="" method="post">
        <div class="input-group">
          <input type="text" name="search" id="search" class="form-control" placeholder="Search..." autocomplete="off" autofocus>
          <div class="input-group-append">
            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i></button>
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
        <table class="table table-bordered" id="table" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Blog Title</th>
              <th>User ID</th>
              <th>Comment At</th>
              <th>Content</th>
              <th>Is Hide</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
            <?php
            if ($comment) :
              foreach ($comment as $val) : ?>
                <tr>
                  <td><?php echo ++$start; ?></td>
                  <td><?php echo $val['title']; ?></td>
                  <td><?php echo $val['username']; ?></td>
                  <td><?php echo date('d M Y H:i:s', strtotime($val['datetime'])); ?></td>
                  <td><?php echo substr($val['c_content'], 0, 100); ?></td>
                  <td>
                    <?php
                    if ($val['is_hide'] == 1) {
                      echo "<p class='badge badge-warning'>Hide</p>";
                    } else {
                      echo "<p class='badge badge-success'>Expose</p>";
                    }
                    ?>
                  </td>
                  <!-- <td>
                    <div class="form-check">
                      <input type="checkbox" name="check_hide" id="check_hide" class="form-check-input" data-comment_id="<?php echo $val['comment_id'] ?>" value="<?php echo $val['is_hide'] ?>" onchange="changeHide()">
                      <input type="checkbox" name="check_hide" id="check_hide" class="form-check-input check-hide" value="<?php echo $val['comment_id'] ?>">
                    </div>
                  </td> -->
                  <td>
                    <a href="<?php echo base_url() ?>comment/deletecomment/<?php echo $val['comment_id'] ?>" class="btn btn-sm btn-danger button-delete btn-circle" title="Delete Comment"><i class="fas fa-trash"></i></a>
                    <a href="<?php echo base_url() ?>comment/editcomment/<?php echo $val['comment_id'] ?>" class="btn btn-sm btn-warning btn-circle" title="Edit Comment"><i class="fas fa-pencil-alt"></i></a>
                    <!-- <a href="#" data-toggle="modal" data-target="#detail-modal<?php echo $val['comment_id'] ?>" class="btn btn-sm btn-info btn-circle" data-popup="tooltip" data-placement="top" title="Detail Comment"><i class="fas fa-info"></i></a> -->
                  </td>
                </tr>
              <?php endforeach; ?>
            <?php else : ?>
              <tr>
                <td colspan="7" style="text-align: center">Data not found !</td>
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
  /* $(document).ready(function() {
    $(document).on('click', '.check-hide', function() {
      var id = this.value;

      $.ajax({
        type: "POST",
        data: {
          id: id
        },
        url: "<?php echo base_url() ?>comment/commentUpdate",
        success: function(data) {
          document.location.href = "<?php echo base_url(); ?>comment";
        }
      })
    });
  }); */

  /* function changeHide() {
    var checkbox = $(this);
    var id = checkbox.data('comment_id');
    var checked = checkbox.prop('checked');
    $.ajax({
      url: "<?php echo base_url() ?>comment/commentUpdate",
      type: "POST",
      data: {
        id: id
      },
      success: function(data) {
        document.location.href = "<?php echo base_url(); ?>comment";
      },
      error: function(data) {
        checkbox.attr('checked', !checked);
      }
    })
  } */

  /* $(document).on("change", "input[name='check_hide']", function() {
    var checkbox = $(this);
    var id = checkbox.data('comment_id');
    var checked = checkbox.prop('checked');
    $.ajax({
      url: "<?php echo base_url() ?>comment/commentUpdate",
      type: 'POST',
      data: {
        action: 'checkbox-select',
        id: id,
        checked: checked
      },
      success: function(data) {
        document.location.href = "<?php echo base_url('comment'); ?>";
      },
      error: function(data) {
        checkbox.attr('checked', !checked);
      }
    })
  }); */
</script>