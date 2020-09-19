<!-- Modal -->
<div class="modal fade" id="modal-category">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body form-category">
        <form method="POST" enctype="multipart/form-data" action="" id="form-category">
          <div class="form-group">
            <label for="category-name" class="col-form-label">Category name:</label>
            <input type="hidden" class="form-control" name="category_id" id="category_id" readonly>
            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter category name" required>
            <small class="text-danger"></small>
          </div>

          <div class="form-group">
            <div class="form-check">
              <label for="category-visible" class="form-check-label">
                <input type="checkbox" class="form-check-input" id="category-visible" name="category_visible">Check this for visible
              </label>
            </div>
          </div>
        </form>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-primary" id="btnSave" onclick="save()">Save</button>
      </div>
    </div>
  </div>
</div>