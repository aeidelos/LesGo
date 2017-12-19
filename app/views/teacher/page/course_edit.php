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
        Ubah Data Kursus
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
        <form action="/teacher/course/save/<?php echo $course->id;?>" method="post" role="form" enctype="multipart/form-data">          
            <div class="col-xs-12">
                <div class="col-xs-4">
                    <table class="table table-hover">
                    <tr><div class="form-group">
                        <label for="">Nama Kursus</label>
                        <input name="course_name" type="text" class="form-control" id="" placeholder="Nama Kursus" value="<?php echo $course->course_name;?>">
                    </div></tr>
                    <tr><div class="form-group">
                        <label for="">Kelas Minimal</label>
                        <select name="grade" id="input1/(\w+)/\u\1/g" class="form-control" value="<?php echo $course->grade;?>">
                            <option value="">IV - Sekolah Dasar</option>
                            <option value="">V - Sekolah Dasar</option>
                            <option value="">VI - Sekolah Dasar</option>
                            <option value="">VII - Sekolah Menengah Pertama</option>
                            <option value="">VIII - Sekolah Menengah Pertama</option>
                            <option value="">IX - Sekolah Menengah Pertama</option>
                            <option value="">X - Sekolah Menengah Atas</option>
                            <option value="">XI - Sekolah Menengah Atas</option>
                            <option value="">XII - Sekolah Menengah Atas</option>
                            <option value="">Umum</option>
                        </select>                        
                    </div></tr>
                    <tr><div class="form-group" >
                        <label for="">Gambar Sampul Kursus</label>
                        <input type="file" name="course_image" value="" class="btn btn-default btn-flat">
                        <p>Ukuran gambar berkisar antara 300x180</p>
                        
                    </div></tr>
                    </table>
                </div>
                <div class="col-xs-8">
                    <table class="table table-bordered">
                    <tr>
                    <div class="form-group">
                        <label>Deskripsi</label>
                        <textarea name="details" id="input1/(\w+)/\u\1/g" class="form-control" rows="3"><?php echo $course->details;?></textarea>
                    </div>
                    </tr>
                    <tr>
                    <div class="form-group">
                        <label>Target Pencapaian</label>
                        <textarea name="vision" id="input1/(\w+)/\u\1/g" class="form-control" rows="3"><?php echo $course->vision; ?></textarea>
                    </div>
                    </tr>
                    <tr>
                    <div class="form-group">
                        <label>Persyaratan Materi</label>
                        <textarea name="requirement" id="input1/(\w+)/\u\1/g" class="form-control" rows="3"><?php echo $course->requirement;?></textarea>
                    </div>
                    </tr>
                    <tr><div class="form-group">
                    <input type="submit" name="submit" value="Simpan">
                    </div></tr>                   
                    </table>
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
