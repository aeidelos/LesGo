<div class="wrapper">
    <?php 
        $page_navbar;
        if($navbar=='default'){
            $page_navbar = '/public/component/homepage_navbar';
        }else{

        }
        $this->load->view($page_navbar);
   ?>
  <!-- Full Width Column -->
  <div class="content-wrapper">
    <div class="container">
    

    
      <!-- Content Header (Page header) -->
      <section class="content-header"> 
      <?php if($info!=null){ ?>
          <div class="alert alert-<?php echo $info['type'];?>">
           <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <strong><?php echo $info['title'];?></strong> <?php echo $info['content'];?>
          </div>
      <?php } ?>
      
        <h1>
          Kursus Terbaru
          <small style="display:none;">Example 2.0</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
        <?php foreach ($new_courses as $new_course){
         ?>
         <a href="/base/course/<?php echo $new_course->id;?>">
                   <div class="col-md-3">
            <div class="box box-default">
            <div class="box-header with-border">
             <center><img height="150" width="225" src="<?php echo $new_course->image; ?>" alt="" class=""></center>
            </div>
          <div class="box-body">
            <strong><?php echo $new_course->course_name; ?></strong>
            <br>
            <p><?php echo $new_course->teacher_name; ?></p>
          </div>
          <div class="box-footer">
            <span class="label label-info">Online</span>
            <span class="label label-info">Offline</span>
            <span class="label label-info">Sertifikat</span>
            <span class="label label-info">Video</span>
          </div>
          <!-- /.box-body -->
          </div>
          </div>
         </a>
         <?php } ?>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
</div>