<body class="hold-transition skin-blue layout-top-nav">
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
        <h1>
          <legend>Bergabung dan belajar bersama Les:GO</legend>
          <small style="display:none;">Example 2.0</small>
        </h1>
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
            <div class="col-md-6">
              <div class="box box-default">
                <div class="box-header with-border">
                  <h3 class="box-title">Data diri anda</h3>
                </div>
                <div class="box-body">
                 <div style="padding:10px 70px;">
                   <form action="/base/register" method="post" role="form">
                        <div class="form-group">
                            <label for="">Email</label>
                            <input type="text" class="form-control" id="" placeholder="" name="email">
                        </div>
                        <div class="form-group">
                            <label for="">Username</label>
                            <input type="text" class="form-control" id="" placeholder="" name="username">
                        </div>                       
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="text" class="form-control" id="" placeholder="" name="password">
                        </div>           
                        <div class="form-group">
                            <label for="">Nama Lengkap</label>
                            <input type="text" class="form-control" id="" placeholder="" name="name">
                        </div>     
                        <div class="form-group">
                            <label for="">Alamat Lengkap</label>
                            <input type="text" class="form-control" id="" placeholder="" name="street">
                        </div>
                        <div class="form-group">
                            <label for="">Kota</label>
                            <select name="city" id="input1/(\w+)/\u\1/g" class="form-control">
                                <option value="1">Malang</option>
                                <option value="2">Surabaya</option>
                                <option value="0">Lainnya</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Nomor Telepon</label>
                            <input type="text" class="form-control" id="" placeholder="" name="phone">
                        </div>
                        <div class="form-group">
                            <label for="">Sekolah saat ini</label>
                            <select name="grade" id="input1/(\w+)/\u\1/g" class="form-control">
                                <option value="4">SD Kelas IV</option>
                                <option value="5">SD Kelas V</option>
                                <option value="6">SD Kelas VI</option>
                                <option value="7">SMP Kelas VII</option>
                                <option value="8">SMP Kelas VIII</option>
                                <option value="9">SMP Kelas IX</option>
                                <option value="10">SMA/SMK Kelas X</option>
                                <option value="11">SMA/SMK Kelas XI</option>
                                <option value="12">SMA/SMK Kelas XII</option>
                            </select>
                        </div>        
                     <input type="submit" name="submit" value="Daftar" class="btn btn-success">
                   </form>
                 </div>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="box box-default">
                <div class="box-header with-border">
                <h3 class="box-title">Mengapa harus Les:GO?</h3>
              </div>
          <div class="box-body">
            
          </div>
          <!-- /.box-body -->
        </div>
            </div>
        </div>
        <!-- /.box -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.container -->
  </div>
  <!-- /.content-wrapper -->
</div>