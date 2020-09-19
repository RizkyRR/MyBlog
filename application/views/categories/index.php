<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex mt-4">
      <button onclick="addCategory()" id="btnAddCategory" class="btn btn-primary"><i class="fa fa-plus"></i> Category</button>
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
        <table class="table table-bordered" id="table-data-category" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th>Slug</th>
              <th>Visible</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="show-data-category">

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
    table = $('#table-data-category').DataTable({
      "processing": true,
      "serverSide": true,
      "ajax": {
        "url": "<?= base_url(); ?>category-data",
        "type": "POST"
      },
      "columnDefs": [{
        "targets": [0, 4],
        "orderable": false,
        "searchable": false
      }],
      'order': []
    });

    //set input/textarea/select event when change value, remove class error and remove text help block 
    $("input").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });
    $("textarea").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });
    $("select").change(function() {
      $(this).parent().parent().removeClass('has-error');
      $(this).next().empty();
    });

    $('#category-visible').val('visible').attr('checked', true);

    $('#category-visible').change(function() {
      if ($('#category-visible').val() == "visible") {
        $('#category-visible').val('invisible').attr('checked', false);
      } else {
        $('#category-visible').val('visible').attr('checked', true);
      }
    });

    $.validator.setDefaults({
      highlight: function(element) {
        $(element).closest(".form-group").addClass("has-error");
      },
      unhighlight: function(element) {
        $(element).closest(".form-group").removeClass("has-error");
      },
      errorElement: "small",
      errorClass: "error-message",
      errorPlacement: function(error, element) {
        if (element.parent(".input-group").length) {
          error.insertAfter(element.parent());
        } else {
          error.insertAfter(element);
        }
      },
    });

    var $validator = $("#form-category").validate({
      focusInvalid: false,
      rules: {
        category_name: {
          required: true,
          minlength: 3
        },
      },
      messages: {
        category_name: {
          required: "Category name is required!",
          minlength: "Minimum of 3 characters"
        },
      },
    });
  });

  function effect_msg() {
    // $('.msg-alert').hide();
    $('.msg-alert').show(1000);
    setTimeout(function() {
      $('.msg-alert').fadeOut(1000);
    }, 3000);
  }

  function addCategory() {
    save_method = 'add';
    $('#form-category')[0].reset(); // reset form on modals

    $('.form-group').removeClass('has-error'); // clear error class
    $('.text-danger').empty(); // clear error string

    $('#modal-category').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add Category'); // Set Title to Bootstrap modal title
  }

  function editCategory(id) {
    save_method = 'update';
    $('#form-category')[0].reset(); // reset form on modals

    $('.form-group').removeClass('has-error'); // clear error class
    $('.text-danger').empty(); // clear error string

    //Ajax Load data from ajax
    $.ajax({
      url: "<?php echo base_url() ?>category-edit/" + id,
      type: "GET",
      dataType: "JSON",
      success: function(data) {

        /* $('[name="id"]').val(data.id);
        $('[name="name"]').val(data.category_name); */
        $('#category_id').val(data.category_id);
        $('#category_name').val(data.name);

        if (data.visible == "visible") {
          $('#category-visible').prop('checked', true);
        } else {
          $('#category-visible').prop('checked', false);
        }

        $('#modal-category').modal('show'); // show bootstrap modal when complete loaded
        $('.modal-title').text('Edit Data Category'); // Set title to Bootstrap modal title

      },
      error: function(jqXHR, textStatus, errorThrown) {
        Swal.fire({
          icon: "error",
          title: 'Error get data from ajax, please refresh page!',
          showConfirmButton: false,
          timer: 2000,
        });
      }
    });
  }

  function save() {
    $('#btnSave').text('Saving...'); //change button text
    $('#btnSave').attr('disabled', true); //set button disable 
    var url;

    if (save_method == 'add') {
      url = "<?php echo base_url() ?>category-add";
    } else {
      url = "<?php echo base_url() ?>category-update";
    }

    var $valid = $("#form-category").valid();
    if (!$valid) {
      // $validator.focusInvalid();
      $("#btnSave").text("Save"); //change button text
      $("#btnSave").attr("disabled", false); //set button enable
      return false;
    } else {
      // ajax adding data to database
      $.ajax({
        url: url,
        type: "POST",
        data: $('#form-category').serialize(),
        dataType: "JSON",
        success: function(data) {
          if (data.status == 'true') //if success close modal and reload ajax table
          {
            $('#modal-category').modal('hide');

            table.ajax.reload(null, false);

            Swal.fire({
              icon: 'success',
              title: data.message,
              showConfirmButton: false,
              timer: 2000,
            });
          } else {
            Swal.fire({
              icon: "error",
              title: data.message,
              showConfirmButton: false,
              timer: 2000,
            });
          }

          $('#btnSave').text('Save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable 

        },
        error: function(jqXHR, textStatus, errorThrown) {
          Swal.fire({
            icon: "error",
            title: textStatus,
            showConfirmButton: false,
            timer: 2000,
          });

          $('#btnSave').text('Save'); //change button text
          $('#btnSave').attr('disabled', false); //set button enable 
        }
      });
    }
  }

  function deleteCategory(id) {
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
          url: '<?php echo base_url() ?>category-delete/' + id,
          type: 'POST',
          dataType: 'JSON',
          success: function(data) {
            if (data.status == true) {
              Swal.fire({
                icon: "success",
                title: "Successfully deleted your category!",
                showConfirmButton: false,
                timer: 2000,
              });
            } else {
              Swal.fire({
                icon: "error",
                title: "Failed deleted your category, please try again!",
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