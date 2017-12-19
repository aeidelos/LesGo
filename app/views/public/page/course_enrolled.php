<!-- Site wrapper -->
<div class="wrapper">
      <?php $page_navbar = '/public/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>
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
                    <p>
                    <center><img src="<?php echo $course->image; ?>" alt="" width=175 height=150> <br></center>
                    </p>
                    <p>  
                      <center>Progress Kursus <strong>= <?php echo $progress; ?> % </strong> Terselesaikan</center>
                    </p>
                    <p>
                    <center><a href="">
                    <button type="button" class="btn btn-success btn-flat">Minta Kursus Privat</button>
                    </a></center>
                    </p>
                </div>
                <div class="col-xs-8">
                    <?php if($subcourse!=null){ ?>
                    <legend>Materi Anda Saat ini : <?php echo $subcourse->subcourse_name; ?></legend>
                    <p>
                     <center><video width="480" height="320" controls>
                      <source src="<?php echo $subcourse->content;?>" type="video/mp4">
                    </video></center>
                    </p>
                    <p>
                    <span>Reference :</span><br>
                    <span><?php echo $subcourse->reference;?></span>
                    </p>
                    <p style="text-align:center;"><a href="/base/course/<?php echo $course->id;?>/next">
                    <button type="button" class="btn btn-primary">Lanjut ke Materi Berikutnya</button>
                    </a></p>
                    <?php }else{ ?>
                    <legend>Anda sudah menyelesaikan kursus ini.</legend>
                    <?php } ?>
                    
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