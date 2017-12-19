  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <?php if($teacher->image=="NULL"){ ?>
          <img src="/assets/img/user/user_default.png" class="img-circle" alt="User Image">
          <?php }else{ ?>
          <img src="<?php echo $teacher->image;?>" class="img-circle" alt="User Image">
          <?php }?>
        </div>
        <div class="pull-left info">
          <p><?php echo $teacher->username;?></p>
          <a href="/teacher/user">My Profile</a>
        </div>
      </div>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header"></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-book"></i>
            <span>Manajemen Kursus</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/teacher/course/"><i class="fa fa-circle-o"></i>List Kursus Anda</a></li>
            <li><a href="/teacher/course/add"><i class="fa fa-circle-o"></i>Tambah Baru</a></li>
          </ul>
        </li>

        <li class="treeview">
          <a href="#">
            <i class="fa fa-lock"></i>
            <span>Kursus Privat</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/teacher"><i class="fa fa-circle-o"></i>Permintaan</a></li>
            <li><a href="/admin/user/student"><i class="fa fa-circle-o"></i>Jadwal Kursus Anda</a></li>
          </ul>
        </li>        

       <li class="treeview">
          <a href="#">
            <i class="fa fa-envelope"></i>
            <span>Perpesanan</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/teacher"><i class="fa fa-circle-o"></i>Kotak Masuk</a></li>
            <li><a href="/admin/user/student"><i class="fa fa-circle-o"></i>Item Terkirim</a></li>
          </ul>
        </li> 
      
        <li class="treeview">
          <a href="#">
            <i class="fa fa-list"></i>
            <span>Laporan</span>
            <span class="pull-right-container">
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/teacher"><i class="fa fa-circle-o"></i>Statistik Kursus Online</a></li>
            <li><a href="/admin/user/student"><i class="fa fa-circle-o"></i>Statistik Kursus Privat</a></li>
          </ul>
        </li> 
      
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>