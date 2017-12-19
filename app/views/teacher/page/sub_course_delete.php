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
        Hapus Materi
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
            <p><span>Apakah anda yakin ingin meng<strong>hapus</strong> materi <strong>
            <?php echo $subcourse->subcourse_name; ?>
            </strong></span></p>
            <p><a href="/teacher/course/null/<?php echo $course->id; ?>">
            <button type="button" class="btn btn-default btn-flat">Tidak, Kembali ke Menu Kursus</button>
            </a>
            <a href="/teacher/subcourse/delete/<?php echo $course->id.'/'.$subcourse->id; ?>">
            <button type="button" class="btn btn-danger btn-flat">Ya, Hapus</button>
            </a>
            </p>
            <p><small>Seluruh data yang telah dihapus <strong>tidak bisa</strong> dikembalikan.</small></p>
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
