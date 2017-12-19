  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($admin->image=="NULL"){ ?>
          <img src="/assets/img/user/user_default.png" class="img-circle" alt="User Image">
          <?php }else{ ?>
          <img src="<?php echo $admin->image;?>" class="img-circle" alt="User Image">
          <?php }?>
        </div>
        <div class="pull-left info">
          <p><?php echo $admin->username;?></p>
          <a href="/admin/user/admin/<?php echo $admin->id; ?>">My Profile</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i><span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-user"></i>
            <span>User Management</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/teacher"><i class="fa fa-circle-o"></i>Pengajar</a></li>
            <li><a href="/admin/user/student"><i class="fa fa-circle-o"></i>Pelajar</a></li>
            <li><a href="/admin/user/admin"><i class="fa fa-circle-o"></i>Admin</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Course Management</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/course/"><i class="fa fa-circle-o"></i>List Kursus</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Perpesanan</span>
            <span class="pull-right-container">
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Laporan Statistik</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/course/"><i class="fa fa-circle-o"></i>Statistik Kursus</a></li>
          </ul>
          <ul class="treeview-menu">
            <li><a href="/admin/course/"><i class="fa fa-circle-o"></i>Statistik Transaksi</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>