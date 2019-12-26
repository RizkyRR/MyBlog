<?php foreach ($message_sent as $val) : ?>
  <div class="modal fade bd-example-modal-lg" id="detail-modal<?= $val['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title">Detail Message</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group">
            <label for="">Email</label>
            <input type="text" class="form-control" readonly value="<?= $val['email']; ?>">
          </div>

          <hr>

          <div class="form-group">
            <label for="message_reply">Message</label>
            <textarea class="form-control" id="message_reply" name="message_reply" rows="10" placeholder="Content.." readonly><?php echo $val['message_reply']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="">Reply At</label>
            <input type="text" class="form-control" readonly value="<?= date('d M Y H:i:s', strtotime($val['reply_at'])); ?>">
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>

      </div>
    </div>
  </div>
<?php endforeach; ?>