<!-- Page Header -->
<header class="masthead" style="background-image: url('<?php echo base_url(); ?>back-assets/img/post_picture/<?= $read['picture'] ?>')">
  <div class="overlay"></div>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <div class="post-heading">
          <h1><?= $read['title']; ?></h1>
          <span class="meta">Posted by
            <a href="#"><?= $read['user_id']; ?></a>
            on <?= date('d M Y', strtotime($read['created_at'])); ?></span>
        </div>
      </div>
    </div>
  </div>
</header>

<!-- Post Content -->
<article>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <?= $read['content']; ?>
      </div>
    </div>
  </div>
</article>