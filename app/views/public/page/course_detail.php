<!-- Site wrapper -->
<div class="wrapper">
      <?php 
        $page_navbar;
        if($navbar=='default'){
            $page_navbar = '/public/component/homepage_navbar';
        }else{

        }
        $this->load->view($page_navbar);
      ?>
  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Detail Kursus
        <small></small>
        <div class="pull-right">
        
        </div>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
     <div class="row">
         <div class ="col-xs-3">
              <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Profil Pengajar</h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <p>
            <?php if($teacher->image=="NULL"){ ?>
            <center><img src="/assets/img/user/user_default.png" alt="" width=200 height=200></center>
            <?php } else { ?>
            <center><img src="<?php echo $teacher->image; ?>" alt="" width=200 height=200></center>
            <?php } ?>
            </p>
            <p><center><a href="/base/user/view/<?php echo $teacher->id; ?>"><?php echo $teacher_details->name;?></a></center></p>
            <p><center>Pendidikan : <?php echo $teacher_details->school;?></center></p>
         </div>
        <!-- /.box-body -->
        <div class="box-footer">
        <p><center>
        <?php if($user!=null){ ?>
        <a href="/base/course/<?php echo $course->id;?>/enroll">
        <button type="button" class="btn btn-success">Ikuti Kursus</button>
        </a>
        <?php }else{ ?>
            <p><span><strong>Silahkan login untuk mengikuti kursus.</strong></span></p>
        <?php } ?>
        </center></p>
        </div>
        <!-- /.box-footer-->
             </div>
         </div>
         <div class="col-xs-9">
              <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $course->course_name; ?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <div class="col-xs-12">
                <div class="col-xs-3">
                    <center><img src="<?php echo $course->image; ?>" alt="" width=175 height=150> <br></center>
                </div>
                <div class="col-xs-8">
                    <p>
                        <h3>Detail</h3>
                        <span><?php echo $course->details; ?></span>
                    </p>
                    <p>
                        <h3>Tujuan</h3>
                        <span><?php echo $course->vision;?></span>
                    </p>
                    <p>
                        <h3>Persyaratan Umum</h3>
                        <span><?php echo $course->requirement;?></span>
                    </p>
                </div>
            </div>
         </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
         </div>
     </div>

      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
