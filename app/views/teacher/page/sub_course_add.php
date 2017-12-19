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
        Tambah Materi
        <small>Baru</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title"><?php echo $course->course_name;?></h3>
          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fa fa-minus"></i></button>
          </div>
        </div>
        <div class="box-body">
        <form action="/teacher/subcourse/save/<?php echo $course->id; ?>" method="post" role="form" enctype="multipart/form-data">          
            <div class="col-xs-12">
                <div class="col-xs-8 col-xs-offset-2">
                    <div class="form-group">
                        <label for="">Judul Materi</label>
                        <input type="text" name="subcourse_name" id="" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Video Materi</label>
                        <input type="file" name="course_video" value="" class="btn btn-default btn-flat">
                        <p>Video Harus dalam Format MP4</p>
                    </div>
                    <div class="form-group">
                        <label>Referensi Tambahan <small>berupa link atau penjelasan singkat</small></label>
                        <textarea name="reference" id="input1/(\w+)/\u\1/g" class="form-control" rows="3" ></textarea>
                    </div>
                    <input type="submit" name="submit" value="Simpan" class="btn btn-info btn-flat">
                </div>
            </div>
           </form>
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
