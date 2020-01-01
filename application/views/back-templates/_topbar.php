<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

  <!-- Main Content -->
  <div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

      <!-- Sidebar Toggle (Topbar) -->
      <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
      </button>

      <!-- Topbar Navbar -->
      <ul class="navbar-nav ml-auto">

        <!-- Nav Item - Alerts -->
        <li class="nav-item">
          <p class="nav-link">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small font-weight-bold" id='datetime-part'></span>
          </p>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-comment"></i>
            <!-- Counter - Alerts -->
            <?php
            $data = newCommentCount();
            if ($data) :
            ?>
              <span class="badge badge-danger badge-counter"><?php echo $data; ?></span>
            <?php endif; ?>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="commentDropdown">
            <?php
            $data = newCommentInfo();
            if (is_array($data) || is_object($data)) :
              echo '<h6 class="dropdown-header">
                  Comment Center
                </h6>';
              foreach ($data as $val) :
            ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url() ?>comment">
                  <div>
                    <div class="text-truncate"><?php echo $val['content']; ?></div>
                    <div class="small text-gray-500"><?php echo $val['username']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </li>

        <li class="nav-item dropdown no-arrow mx-1">
          <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-envelope"></i>
            <!-- Counter - Alerts -->
            <?php
            $data = newMessageCount();
            if ($data) :
            ?>
              <span class="badge badge-danger badge-counter"><?php echo $data; ?></span>
            <?php endif; ?>
          </a>
          <!-- Dropdown - Alerts -->
          <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="messageDropdown">
            <?php
            $data = newMessageInfo();
            if (is_array($data) || is_object($data)) :
              echo '<h6 class="dropdown-header">
                  Message Center
                </h6>';
              foreach ($data as $val) :
            ?>
                <a class="dropdown-item d-flex align-items-center" href="<?php echo base_url() ?>message">
                  <div>
                    <div class="text-truncate"><?php echo $val['message_content']; ?></div>
                    <div class="small text-gray-500"><?php echo $val['name']; ?></div>
                  </div>
                </a>
              <?php endforeach; ?>
            <?php endif; ?>
          </div>
        </li>

        <div class="topbar-divider d-none d-sm-block"></div>

        <!-- Nav Item - User Information -->
        <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $user['name']; ?></span>
            <img src="<?php echo base_url(); ?>back-assets/img/profile/<?php echo $user['image']; ?>" class="img-profile rounded-circle" alt="User Image">
          </a>
          <!-- Dropdown - User Information -->
          <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
            <a href="<?php echo base_url(); ?>user" class="dropdown-item">
              <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
              Profile
            </a>
            <a class="dropdown-item" href="<?php echo base_url() ?>user/edit/<?php echo $user['id']; ?>">
              <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
              Settings
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item" data-toggle="modal" data-target="#logoutModal">
              <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
              Logout
            </a>
          </div>
        </li>

      </ul>

    </nav>
    <!-- End of Topbar -->