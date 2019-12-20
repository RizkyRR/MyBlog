<?php foreach ($post as $val) : ?>
  <div class="modal fade bd-example-modal-lg" id="detail-modal<?= $val['blog_id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Detail Post</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="">Title</label>
            <input type="text" class="form-control" readonly value="<?= $val['title']; ?>">
          </div>

          <div class="form-group">
            <label for="">Slug</label>
            <input type="text" class="form-control" readonly value="<?= $val['b_slug']; ?>">
          </div>

          <div class="form-group">
            <label for="">User ID</label>
            <input type="text" class="form-control" readonly value="<?= $val['user_id']; ?>">
          </div>

          <div class="form-group">
            <label for="">Category</label>
            <input type="text" class="form-control" readonly value="<?= $val['name']; ?>">
          </div>

          <hr>

          <div class="form-group">
            <img src="<?= base_url(); ?>back-assets/img/post_picture/<?= $val['picture'] ?>" class="img-fluid img-thumbnail" alt="<?= $val['picture'] ?>">
          </div>

          <div class="form-group">
            <label for="">Image</label>
            <input type="text" class="form-control" readonly value="<?= $val['picture']; ?>">
          </div>

          <hr>

          <div class="form-group">
            <label for="content">Content</label>
            <textarea class="form-control" id="textckeditor" name="content" rows="3" placeholder="Content.." readonly><?php echo $val['content']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="">Created At</label>
            <input type="text" class="form-control" readonly value="<?= date('d M Y', strtotime($val['created_at'])); ?>">
          </div>

          <div class="form-group">
            <label for="">Updated At</label>
            <input type="text" class="form-control" readonly value="<?= date('d M Y', strtotime($val['updated_at'])); ?>">
          </div>

          <div class="form-group">
            <label for="">Pending</label>
            <input type="text" class="form-control" readonly value="<?= ($val['pending'] == 1) ? "Pending" : "Available"; ?>">
          </div>

          <div class="form-group">
            <label for="">Public</label>
            <input type="text" class="form-control" readonly value="<?= ($val['public'] == 1) ? "Public" : "Private"; ?>">
          </div>

          <div class="form-group">
            <label for="">Active</label>
            <input type="text" class="form-control" readonly value="<?= $val['active']; ?>">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>