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
            <label for="email">To: Email</label>
            <input type="hidden" class="form-control" name="id" id="id" value="<?php echo $data['id']; ?>">
            <input type="text" class="form-control" id="email" name="email" value="<?php echo $data['email']; ?>" readonly>
          </div>

          <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" id="message" name="message" rows="10" readonly><?php echo $data['message_content']; ?></textarea>
          </div>

          <br>
          <hr>

          <div class="form-group">
            <label for="message_reply">Reply</label>
            <textarea class="form-control" id="textckeditor" name="message_reply" rows="3" placeholder="Message reply.."><?php echo set_value('message_reply'); ?></textarea>
            <small class="form-text text-danger"><?= form_error('message_reply'); ?></small>
          </div>

          <div class="modal-footer">
            <a href="<?php echo base_url(); ?>message" class="btn btn-secondary">Back</a>
            <button type="submit" value="save" name="save" class="btn btn-success pull-right"><i class="fas fa-paper-plane"></i> Send</button>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
<!-- /.container-fluid -->