<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
      <?php $page_navbar = '/restricted/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
      <?php $page_navbar = '/restricted/component/homepage_sidebar';
        $this->load->view($page_navbar);
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna Les:GO
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-4">
                <div class="box">
                    <div class="box-header">
                        <center><h2 class="box-title"><strong><?php echo $details->name;?></strong></h2></center>
                    </div>
                    <div class="box-body">
                        <center><img src="/assets/img/user/user_default.png" alt="" height=200 width=200></center>
                    </div>
                </div>
            </div>
        <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <center><h2 class="box-title"><strong>Detail Profil</strong></h2></center>
                    </div>
                    <div class="box-body">
                        <table class="table table-hover">
                            <tr><td>ID Pengguna</td><td><?php echo $user->id; ?></td></tr>
                            <tr><td>Nama Lengkap</td><td><?php echo $details->name; ?></td></tr>
                            <tr><td>Email</td><td><?php echo $user->email; ?></td></tr>
                            <tr><td>Pendidikan</td><td><?php echo $details->grade." / "; if($details->grade<7) echo "Sekolah Dasar";
                                 else if($details->grade<10) echo "Sekolah Menengah Pertama"; else if($details->grade<13) echo "Sekolah Menengah Atas"; ?></td></tr>
                            <tr><td>Alamat</td><td><?php echo $address->street." - "; if($address->city==1) echo "Malang"; else if($address->city==2) echo "Surabaya";?></td></tr>
                            <tr><td>Nomor Telepon</td><td><?php echo $details->phone; ?></td></tr>
                        </table>
                        
                    </div>
                </div>
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>