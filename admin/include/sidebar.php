<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo $dir; ?>/dist/img/user2-160x160.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['name']; ?></p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li>
          <a href="<?php echo $dir; ?>/dashboard.php">
            <i class="fa fa-th"></i> <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/user/">
            <i class="fa fa-user"></i> <span>Admin Users</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/blog_categories/">
            <i class="fa fa-list-alt "></i> <span>Blog Categories</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/blog_tags/">
            <i class="fa fa-solid fa-tag"></i> <span>Blog Tags</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/blogs/">
            <i class="fa fa-file-text"></i> <span>Blogs</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/banners/">
            <i class="fa fa-picture-o"></i> <span>Banners</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/trusted_partner/">
            <i class="fa fa-handshake-o"></i> <span>Trusted Partner</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/success_stories/">
            <i class="fa fa-history"></i> <span>Success Stories</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/solutions/">
            <i class="fa fa-tasks"></i> <span>Solutions</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/events/">
            <i class="fa fa-calendar"></i> <span>Events</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/contact_us/">
            <i class="fa fa-address-book"></i> <span>Contact Us</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/gallery/">
            <i class="fa fa-image"></i> <span>Gallery</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/career_post/">
            <i class="fa fa-graduation-cap"></i> <span>Career Post</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/career_application/">
            <i class="fa fa-clone"></i> <span>Career Application</span>
          </a>
        </li>
        <li>
          <a href="<?php echo $dir; ?>/change_password.php/">
            <i class="fa fa-gears"></i> <span>Change Password</span>
          </a>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>