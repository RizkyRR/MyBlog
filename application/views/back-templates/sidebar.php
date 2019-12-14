<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">

  <!-- Sidebar - Brand -->
  <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?php echo base_url() ?>user">
    <div class="sidebar-brand-icon rotate-n-15">
      <i class="<?php echo $profile['icon'] ?>"></i>
    </div>
    <div class="sidebar-brand-text mx-3"><?php echo $profile['name'] ?></div>
  </a>

  <!-- Divider -->
  <hr class="sidebar-divider">

  <!-- QUERY MENU -->
  <?php
  $role_id = $this->session->userdata('role_id');
  $sqlMenu = "
      SELECT `menu`.`id`, `menu`
      FROM `menu`
      ORDER BY `id` ASC
    ";
  $menu   = $this->db->query($sqlMenu)->result_array();
  ?>

  <!-- LOOPING MENU -->
  <!-- HEADING -->
  <?php foreach ($menu as $m) : ?>
    <div class="sidebar-heading">
      <?php echo $m['menu']; ?>
    </div>
    <!-- LOOPING SUB MENU -->
    <?php
      $menu_id    = $m['id'];
      $sqlSubMenu = "
        SELECT *
        FROM `sub_menu`
        WHERE `menu_id` = $menu_id
        AND `is_active` = 1
      ";
      $submenu = $this->db->query($sqlSubMenu)->result_array();
      ?>

    <?php foreach ($submenu as $sm) : ?>

      <?php if ($title == $sm['title']) : ?>
        <li class="nav-item active">
        <?php else : ?>
        <li class="nav-item">
        <?php endif; ?>

        <a class="nav-link" href="<?php echo base_url($sm['url']); ?>">
          <i class="<?php echo $sm['icon']; ?>"></i>
          <span><?php echo $sm['title']; ?></span>
        </a>
        </li>

      <?php endforeach; ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

    <?php endforeach; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->