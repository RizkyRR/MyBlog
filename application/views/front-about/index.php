<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>front-assets/img/about-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="page-heading">
          <h1><?php echo $title; ?></h1>
          <span class="subheading"><?php echo $subheading; ?>.</span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">
      <?php echo $profile['about']; ?>
    </div>
  </div>
</div>