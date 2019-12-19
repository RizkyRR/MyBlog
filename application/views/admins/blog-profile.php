<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <div class="mb-4 mx-auto">
    <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>
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
  <div class="card shadow mb-4 mx-auto">
    <div class="card-body">
      <form action="" method="post" enctype="multipart/form-data">
        <div class="form-group">
          <label for="">Blog Name</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Enter Blog's Name.." value="<?php echo $profile['name']; ?>">
          <small class="form-text text-danger"><?= form_error('name'); ?></small>
        </div>

        <div class="form-group">
          <label for="">Email</label>
          <input type="text" class="form-control" id="email" name="email" placeholder="Email.." value="<?php echo $profile['email']; ?>">
          <small class="form-text text-danger"><?= form_error('email'); ?></small>
        </div>

        <div class="form-group">
          <label for="">Phone</label>
          <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number.." value="<?php echo $profile['phone']; ?>">
          <small class="form-text text-danger"><?= form_error('phone'); ?></small>
        </div>

        <div class="form-group">
          <label for="">About</label>
          <textarea class="form-control" id="textckeditor" name="about" rows="3" placeholder="About.."><?php echo $profile['about']; ?></textarea>
          <small class="form-text text-danger"><?= form_error('about'); ?></small>
        </div>

        <div class="form-group">
          <label for="">Icon (You can get the icon in <a href="https://fontawesome.com/" target="_blank">here</a>)</label>
          <input type="text" class="form-control" id="icon" name="icon" placeholder="<i class='fas fa-icon'></i>" value="<?php echo $profile['icon']; ?>">
          <small class="form-text text-danger"><?= form_error('icon'); ?></small>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered" id="link_info_table" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>Social Link</th>
                <th>Url</th>
                <th>
                  <button type="button" id="add_row" name="add_row" class="btn btn-primary btn-sm add_row"> <i class="fas fa-plus"></i></i> </button>
                </th>
              </tr>
            </thead>
            <tbody>
              <?php if (isset($data_detail)) : ?>
                <?php $i = 1; ?>
                <?php foreach ($data_detail as $val) : ?>
                  <tr id="row_<?php echo $i; ?>">
                    <td>
                      <select name="link[]" id="link_<?php echo $i; ?>" class="form-control select_group link" data-row-id="row_<?php echo $i; ?>" style="width: 100%;">
                        <option value=""></option>

                        <?php foreach ($link as $key) : ?>
                          <?php if ($val['link_blog_profile_id'] == $key['id']) : ?>
                            <option value="<?php echo $key['id'] ?>" selected><?php echo $key['name'] ?></option>
                          <?php else : ?>
                            <option value="<?php echo $key['id'] ?>"><?php echo $key['name'] ?></option>
                          <?php endif; ?>
                        <?php endforeach; ?>

                      </select>
                    </td>
                    <td>
                      <input type="text" name="url[]" id="url_<?php echo $i; ?>" class="form-control" required value="<?php echo $val['url']; ?>">
                    </td>
                    <td>
                      <button type="button" class="btn btn-danger btn-sm" onclick="removeRow('<?php echo $i; ?>')"><i class="fas fa-times"></i></button>
                    </td>
                  </tr>

                  <?php $i++; ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

        <button type="submit" class="btn btn-success pull-right">Save</button>
      </form>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<script type="text/javascript">
  var base_url = "<?php echo base_url(); ?>";

  $(document).ready(function(e) {
    $("#select_group").select2({
      theme: "bootstrap"
    });

    $("#mainOrdersNav").addClass('active');
    $("#addOrderNav").addClass('active');
    // Add Row
    $("#add_row").click(function(e) {
      var table = $("#link_info_table");
      var count_table_tbody_tr = $("#link_info_table tbody tr").length;
      var row_id = count_table_tbody_tr + 1;
      var html = '';

      $.ajax({
        url: base_url + 'Blog_Profile/getTableLinkRow/',
        type: 'POST',
        dataType: 'JSON',
        success: function(response) {
          html = '<tr id="row_' + row_id + '">' +
            '<td>' +
            '<select class="form-control select_group link" data-row-id="' + row_id + '" id="link_' + row_id + '" name="link[]" style="width:100%;">' +
            '<option value=""></option>';
          $.each(response, function(index, value) {
            html += '<option value="' + value.id + '">' + value.name + '</option>';
          });
          html += '</select></td>';
          html += '<td><input type="text" name="url[]" id="url_' + row_id + '" class="form-control url" required></td>';
          html += '<td><button type="button" name="remove" id="remove" class="btn btn-danger btn-sm"  onclick="removeRow(\'' + row_id + '\')"><i class="fas fa-times"></i></button></td>';
          html += '</tr>';

          if (count_table_tbody_tr >= 1) {
            $("#link_info_table tbody tr:last").after(html);
          } else {
            $("#link_info_table tbody").html(html);
          }

          $("#select_group").select2({
            theme: "bootstrap"
          });
        }
      });
      return false;
    });
  }); // /document

  function removeRow(tr_id) {
    $("#link_info_table tbody tr#row_" + tr_id).remove();
  }
</script>