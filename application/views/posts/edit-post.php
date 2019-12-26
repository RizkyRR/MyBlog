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
      <div class="table-responsive">
        <form action="" method="post" enctype="multipart/form-data">

          <div class="form-group">
            <label for="title">Title</label>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['blog_id']; ?>">
            <input type="text" class="form-control" id="title" name="title" placeholder="Enter new title.." value="<?php echo $data['title']; ?>">
            <small class="form-text text-danger"><?= form_error('title'); ?></small>
          </div>

          <div class="form-group">
            <label for="category_opt">Category</label>
            <select class="form-control col-md-3" name="category_opt" id="category_opt">
              <option value="">Choose Category</option>

              <?php foreach ($category as $val) : ?>
                <?php if ($val['category_id'] == $data['category_id']) : ?>
                  <option value="<?php echo $val['category_id'] ?>" selected><?php echo $val['name'] ?></option>
                <?php else : ?>
                  <option value="<?php echo $val['category_id'] ?>"><?php echo $val['name'] ?></option>
                <?php endif; ?>
              <?php endforeach; ?>

            </select>
            <small class="form-text text-danger"><?= form_error('category_opt'); ?></small>
          </div>

          <div class="form-group">
            <div class="col-sm-2 row">Picture</div>
            <div class="col-sm-10 row">
              <div class="row">
                <div class="col-sm-3">
                  <img src="<?php echo base_url() ?>back-assets/img/post_picture/<?= $data['picture']; ?>" class="img-fluid img-thumbnail">
                </div>
                <div class="col-sm-6">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image" id="image">
                    <label class="custom-file-label" for="image">Choose File</label>
                    <small class="form-text text-danger"><?= form_error('image'); ?></small>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="textckeditor" name="content" rows="3" placeholder="Content.."><?php echo $data['content']; ?></textarea>
            <small class="form-text text-danger"><?= form_error('content'); ?></small>
          </div>

          <!-- <div class="form-group">
            <label for="publish_opt">Publish</label>
            <select class="form-control" name="publish_opt" id="publish_opt">
              <option value=""></option>
              <option value="Pending">Pending</option>
              <option value="Publish">Publish</option>
            </select>
            <small class="form-text text-danger"><?= form_error('publish_opt'); ?></small>
          </div>

          <div class="form-group">
            <label for="public_opt">Public</label>
            <select class="form-control" name="public_opt" id="public_opt">
              <option value=""></option>
              <option value="Private">Private</option>
              <option value="Public">Public</option>
            </select>
            <small class="form-text text-danger"><?= form_error('public_opt'); ?></small>
          </div> -->

          <div class="form-group">
            <label for="active_opt">Active</label>
            <select class="form-control col-md-3" name="active_opt" id="active_opt">
              <option value=""></option>

              <?php if ($data['active'] == "Active") : ?>
                <option value="<?php echo $data['active'] ?>" selected><?php echo $data['active'] ?></option>
                <option value="Inactive">Inactive</option>
              <?php else : ?>
                <option value="Active">Active</option>
                <option value="<?php echo $data['active'] ?>" selected><?php echo $data['active'] ?></option>
              <?php endif; ?>
            </select>
            <small class="form-text text-danger"><?= form_error('active_opt'); ?></small>
          </div>

          <div class="modal-footer">
            <a href="<?php echo base_url(); ?>post" class="btn btn-secondary">Back</a>
            <button type="submit" value="save" name="save" class="btn btn-success pull-right">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->