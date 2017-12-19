<!-- Site wrapper -->
<div class="wrapper">
      <?php $page_navbar = '/restricted/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
      <?php $page_navbar = '/restricted/component/homepage_sidebar';
        $this->load->view($page_navbar);
      ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Ubah Profil
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Data Diri</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
       
            <div class="col-xs-12">
                <div class="col-xs-4">
                     <form action="/admin/user/admin/<?php echo $admin->id;?>/profile" method="post" role="form" enctype="multipart/form-data">          
                    <table class="table table-hover">
                    <tr><div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input name="name" type="text" class="form-control" id="" placeholder="" value="<?php echo $details->name;?>">
                    </div></tr>
                    <tr><div class="form-group" >
                        <label for="">Gambar Profile</label>
                        <input type="file" name="profile_image" value="" class="btn btn-default btn-flat">
                        <p>Ukuran gambar berkisar antara 300x180</p>
                    </div></tr>
                    <input type="submit" name="submit" value="Update" class="btn btn-primary btn-flat">
                    </form>
                    </table>
                </div>
                <div class="col-xs-8">
                    <table class="table table-bordered">
                    <legend>Change Password</legend>
                      <form class="form-control" method="post" action="/admin/user/admin/<?php echo $admin->id;?>/password">
                        <div class="form-group">
                          <label for="">New Password</label>
                          <input type="password" name="newpassword" value="" class="form-control">
                        </div>
                        <div class="form-group">
                          <label for="">Confirm New Password</label>
                          <input type="password" class="form-control" name="confirmpassword" value="">
                        </div>
                        <div class="form-group">
                          <label for="">Enter Current Password</label>
                          <input class="form-control" type="password" name="currentpassword" value="">
                        </div>
                        <div>
                          <input type="submit" name="submit" value="Save" class="btn btn-primary btn-flat">
                        </div>
                      </form>
                    </table>
                </div>
            </div>
           
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
