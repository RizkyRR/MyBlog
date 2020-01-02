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

  <!-- Heading -->
  <?php
  $menus = sidebarMenu();
  if (is_array($menus) || is_object($menus)) :
    foreach ($menus as $menu) :
  ?>
      <div class="sidebar-heading">
        <?php echo $menu['menu'] ?>
      </div>

      <?php
      $menu_id = $menu['id'];
      $submenus = sidebarSubMenu($menu_id);
      if (is_array($submenus) || is_object($submenus)) :
        foreach ($submenus as $submenu) :
      ?>

          <?php if ($title == $submenu['title']) : ?>
            <li class="nav-item active">
            <?php else : ?>
            <li class="nav-item">
            <?php endif; ?>

            <a class="nav-link" href="<?php echo base_url($submenu['url']); ?>">
              <i class="<?php echo $submenu['icon']; ?>"></i>
              <span><?php echo $submenu['title']; ?></span>
            </a>
            </li>

          <?php endforeach; ?>
        <?php endif; ?>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

      <?php endforeach; ?>
    <?php endif; ?>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
      <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->