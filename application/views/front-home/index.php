<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>front-assets/img/home-bg.jpg')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="site-heading">
          <h1><?php echo $profile['name'] ?></h1>
          <span class="subheading"><?php echo $subheading; ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Main Content -->
<div class="container">
  <div class="row">
    <div class="col-lg-8 col-md-10 mx-auto">

      <?php
      if ($post) :
        foreach ($post as $val) :
      ?>
          <div class="post-preview">
            <a href="<?php echo base_url() ?>home/read/<?php echo $val['c_slug'] ?>/<?php echo $val['b_slug'] ?>">
              <h2 class="post-title">
                <?= $val['title'] ?>
              </h2>
              <h3 class="post-subtitle">
                <?= $val['short_content'] ?>
              </h3>
            </a>
            <p class="post-meta">Posted by
              <a href="#"><?= $val['user_id'] ?></a>
              on <?= date('d M Y', strtotime($val['created_at'])); ?></p>
          </div>
          <hr>
        <?php endforeach; ?>
      <?php else : ?>
        <div class="post-preview">
          <a href="#">
            <h2 class="post-title">
              Sorry, No Post Yet !
            </h2>
          </a>
        </div>
        <hr>
      <?php endif; ?>

      <!-- Pager -->
      <div class="clearfix">
        <?php echo $pagination; ?>
      </div>
    </div>
  </div>
</div>