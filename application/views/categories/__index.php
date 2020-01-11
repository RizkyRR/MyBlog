<!-- Begin Page Content -->
<div class="container-fluid">

  <!-- Page Heading -->
  <h1 class="h3 mb-2 text-gray-800"><?php echo $title; ?></h1>


  <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <div class="d-sm-flex mt-4">
      <button class="btn btn-success" id="btnAddNew"><i class="fa fa-plus"></i> Category</button>
    </div>
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
        <table class="table table-bordered" id="dataCategory" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>Name</th>
              <th>Slug</th>
              <th>Visible</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody id="show_category">

          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->

<!-- Modal Add -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="myForm" action="" method="post" enctype="multipart/form-data">
          <div class="form-group">
            <label for="">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Category's Name.." required>
          </div>
          <div class="form-group form-check">
            <label>
              <input type="checkbox" class="form-check-input" name="visible" id="visible" value="1" checked>
              Visible ?
            </label>
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="btnSave" class="btn btn-primary">Save</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {

    //Add New
    $('#btnAddNew').click(function() {
      $('#myModal').modal('show');
      $('#myModal').find('.modal-title').text('Add New Category');
      $('#myForm')[0].reset();
      $('#myForm').attr('action', '<?php echo base_url() ?>category/addNew');
    });

    show_data();

    // function to show all Category
    function show_data() {
      $.ajax({
        type: 'AJAX',
        url: '<?php echo base_url() ?>category/category_data',
        async: true,
        dataType: 'JSON',
        success: function(data) {
          var html = '';
          var i;

          for (i = 0; i < data.length; i++) {
            html +=
              '<tr>' +
              '<td>' + data[i].name + '</td>' +
              '<td>' + data[i].slug + '</td>' +
              '<td>' + data[i].visible + '</td>' +
              '<td>' +
              '<a href="javascript:void(0);" class="btn btn-sm btn-warning btn-circle item-edit" data="' + data[i].category_id + '" title="Edit Category"><i class="fas fa-pencil-alt"></i></a>' +
              '</td>' +
              '</tr>';
          }
          $('#show_category').html(html);
        },
        error: function() {
          // alert('Could not get Data from Database');
          var html = '';
          html += '<tr>' + '<td colspan="5" style="text-align: center">Data not found !</td>' + '</tr>';
        }
      })
    }

    // function to edit data 
    //submit add form
    $('#addForm').submit(function(e) {
      e.preventDefault();
      var user = $('#addForm').serialize();
      $.ajax({
        type: 'POST',
        url: url + 'user/insert',
        data: user,
        success: function() {
          $('#addnew').modal('hide');
          showTable();
        }
      });
    });
  })
</script>