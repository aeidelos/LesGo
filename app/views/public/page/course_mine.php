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
     <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Kursus yang Diikuti</h3>
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
                                        <th>Masuk</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($courses!=null)foreach ($courses as $course){ ?>
                                    <tr class="">
                                        <td class="center"><img height="100" width="175" src="<?php echo $course->image; ?>" alt="" class=""></td>
                                        <td class="center"><?php echo $course->course_name; ?></td>
                                        <td><a href="/base/course/<?php echo $course->id;?>"><button type="button" class="btn btn-default">Masuk Kursus</button></a></td>
                                       
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
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>