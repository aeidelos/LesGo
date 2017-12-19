<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
      <?php $page_navbar = '/public/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>
  <!-- =============================================== -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Profil Saya
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
                        <?php if($user->image==NULL){ ?>
                        <center><img src="/assets/img/user/user_default.png" alt="" height=200 width=200></center>
                        <?php }else{ ?>
                        <center><img src="<?php echo $user->image; ?>" alt="" height=200 width=200></center>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <div class="col-xs-8">
                <div class="box">
                    <div class="box-header">
                        <center><h2 class="box-title"><strong>Detail Profil</strong></h2></center>
                        <div class="pull-right">
                         <?php if($user->id==$owner){ ?>
                        <a href="/base/user/edit"><button type="button" class="btn btn-primary">Sunting Profil</button></a>
                        <?php }?>
                        </div>
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
      <div class="row">
          <?php if($user->role==3){ ?>
                <div class="col-xs-12">
     <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Kursus</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">  
           <table id="example2" class="table table-bordered table-hover">
                                   <thead>
                                   <tr> 
                                        <th>Gambar</th>
                                        <th>Nama Kursus</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($courses!=null)foreach ($courses as $course){ ?>
                                    <tr class="">
                                        <td class="center"><img height="100" width="175" src="<?php echo $course->image; ?>" alt="" class=""></td>
                                        <td class="center"><?php echo $course->course_name; ?></td>
                                        <td><a href="/base/course/<?php echo $course->id;?>"><button type="button" class="btn btn-default">Details</button></a></td>
                                       
                                    </tr>
                                <?php } ?>
                                </tbody>
              </table>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
                </div>
          <?php } ?>
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>