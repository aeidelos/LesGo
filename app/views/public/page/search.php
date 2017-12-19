<!-- Site wrapper -->
<div class="wrapper">
      <?php         $page_navbar;
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
        Hasil Pencarian <?php echo $search; ?>
        <small></small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Informasi Kursus</h3>
        </div>
        <div class="box-body">  
           <table id="example2" class="table table-bordered table-hover">
                                   <?php if($courses!=null){ ?>
                                   <thead>
                                   <tr> 
                                        <th>Gambar</th>
                                        <th>Nama Kursus</th>
                                        <th>Detail</th>
                                    </tr>
                                </thead>
                                <?php }?>
                                <tbody>
                                <?php if($courses!=null){foreach ($courses as $course){ ?>
                                    <tr class="">
                                        <td class="center"><img height="100" width="175" src="<?php echo $course->image; ?>" alt="" class=""></td>
                                        <td class="center"><?php echo $course->course_name; ?></td>
                                        <td><a href="/base/course/<?php echo $course->id;?>"><button type="button" class="btn btn-default">Details</button></a></td>
                                       
                                    </tr>
                                <?php }}else{
                                    echo "Pencarian tidak ditemukan";
                                } ?>
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
