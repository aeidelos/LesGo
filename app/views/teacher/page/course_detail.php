<!-- Site wrapper -->
<div class="wrapper">
      <?php $page_navbar = '/teacher/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
      <?php $page_navbar = '/teacher/component/homepage_sidebar';
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
          <a href="/teacher/subcourse/null/<?php echo $course->id;?>"><button type="button" class="btn btn-primary btn-flat">Tambah Materi Baru</button></a>
        </div>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
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
                    <p><a href="/teacher/course/edit/<?php echo $course->id; ?>"><button type="button" class="btn btn-info btn-flat">Edit</button></a></p>
                </div>
            </div>
         </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>

      <legend><h2>Materi</h2></legend>
      <?php foreach ($subcourses as $subcourse){ ?>
              <div class="box collapsed-box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $subcourse->subcourse_name;?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
            <p>
              <center><video width="480" height="320" controls>
                <source src="<?php echo $subcourse->content;?>" type="video/mp4">
              </video></center>
            </p>
            <p>
        <span>Reference :</span><br>
        <span><?php echo $subcourse->reference;?></span>
            </p>
            <p class="pull-right"><a href="/teacher/subcourse/delete-confirm/<?php echo $course->id."/".$subcourse->id;?>">
            <button type="button" class="btn btn-danger">Hapus Materi</button>
            </a></p>
         </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
      </div>
      <?php } ?>
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
