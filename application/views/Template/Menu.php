
  <header class="main-header">
    <!-- Logo -->
    <a href="index2.html" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>S</b>C</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>SKIN</b>CARE</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?= base_url();?>assets/img/userr.png" class="user-image" alt="User Image">
              <span class="hidden-xs"><?= $this->session->userdata('nama_pegawai');?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="<?= base_url();?>assets/img/userr.png" class="img-circle" alt="User Image">

                <p>
                  <?= $this->session->userdata('nama_pegawai');?>
                  <small> Date : <?= date('d-m-Y');?></small>
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="#" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="<?= base_url();?>Auth/logout" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?= base_url();?>assets/img/userr.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?= $this->session->userdata('nama_pegawai');?></p>
          <span><i class="fa fa-circle text-success"></i> Online</span>
        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <?php foreach (json_decode($menu) as $key => $m): ?>
          <li class="<?= count($m->sub_menu) > 0 ? 'treeview' : ' ';?>">
            <a href="<?=  base_url().$m->link;?>">
              <i class="<?= $m->icon;?> text-aqua"></i> <span><?= $m->nama;?></span>
              <?php if (count($m->sub_menu) > 0): ?>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              <?php endif ?>
            </a>
            <?php if (count($m->sub_menu) > 0): ?>
              <ul class="treeview-menu">
                <?php foreach ($m->sub_menu as $key => $sm): ?>
                    <li><a href="<?= base_url().$sm->link;?>"><i class="<?= $sm->icon;?> text-aqua"></i> <?= $sm->nama;?></a></li>
                <?php endforeach ?>
              </ul>
            <?php endif ?>
          </li>
        <?php endforeach ?>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>
