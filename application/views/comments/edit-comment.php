<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>

  <section class="content-header">
    <div class="row">
      <div class="col-lg-6">
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
      <form action="" method="post" enctype="multipart/form-data">

        <div class="form-group">
          <label for="">Blog Title</label>
          <input type="hidden" class="form-control" readonly value="<?= $data['comment_id'] ?>" name="id">
          <input type="text" class="form-control" id="title" name="title" value="<?= $data['title']; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="">Username</label>
          <input type="text" class="form-control" id="username" name="username" value="<?= $data['username']; ?>" disabled>
        </div>

        <div class="form-group">
          <label for="">Datetime</label>
          <input type="text" class="form-control" id="datetime" name="datetime" value="<?= date('d M Y H:i:s', strtotime($data['datetime'])); ?>" disabled>
        </div>

        <div class="form-group">
          <label for="">Content</label>
          <textarea class="form-control" id="textckeditor" name="content" rows="3" disabled><?php echo $data['c_content']; ?></textarea>
        </div>

        <div class="form-group form-check">
          <label>
            <?php if ($data['is_hide'] == 1) : ?>
              <input type="checkbox" class="form-check-input" name="is_hide" id="is_hide" value="<?php echo $data['is_hide'] ?>" checked>
              Hide ?
            <?php else : ?>
              <input type="checkbox" class="form-check-input" name="is_hide" id="is_hide" value="<?php echo $data['is_hide'] ?>">
              Hide ?
            <?php endif; ?>
          </label>
        </div>

        <a href="<?php echo base_url(); ?>comment" class="btn btn-secondary">Back</a>
        <button type="submit" class="btn btn-success pull-right">Update</button>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->