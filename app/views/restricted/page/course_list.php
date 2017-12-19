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
        List Kursus
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
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
                                        <th>Pengajar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($courses!=null)foreach ($courses as $course){ ?>
                                    <tr class="">
                                        <td class="center"><img height="100" width="175" src="<?php echo $course->image; ?>" alt="" class=""></td>
                                        <td class="center"><?php echo $course->course_name; ?></td>
                                        <td><a href="/admin/course/<?php echo $course->id;?>/view"><button type="button" class="btn btn-default">Details</button></a></td>
                                        <td><a href="/admin/user/teacher/<?php echo $course->teacher_id?>"><?php echo $course->teacher_name; ?></a></td>
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
      <!-- /.box -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
</div>
