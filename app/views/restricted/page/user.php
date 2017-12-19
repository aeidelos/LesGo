<body class="hold-transition skin-blue fixed sidebar-mini">  
<!-- Content Wrapper. Contains page content -->
<div class="wrapper">
      <?php $page_navbar = '/restricted/component/homepage_navbar';
        $this->load->view($page_navbar);
      ?>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
      <?php $page_navbar = '/restricted/component/homepage_sidebar';
        $this->load->view($page_navbar);
      ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Pengguna Les:GO
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title"><?php echo $type;?></h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example2" class="table table-bordered table-hover">
                                   <thead>
                                   <tr>
                                        <th>ID</th>
                                        <th>Foto</th>
                                        <th>Username</th>
                                        <th>Email</th>
                                        <th>Type</th>
                                        <th>Details</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php if($users!=null)foreach ($users as $user){ ?>
                                    <tr class="">
                                        <td class="center"><?php echo $user->id; ?></td>
                                        <?php if($user->image==NULL){ ?>
                                        <td class="center"><img height="42" width="42" src="/assets/img/user/user_default.png" alt="" class="img-circle"></td>
                                        <?php }else{?>
                                        <td class="center"><img height="42" width="42" src="<?php echo $user->image; ?>" alt="" class="img-circle"></td>
                                        <?php } ?>
                                        <td class="center"><?php echo $user->username; ?></td>
                                        <td class="center"><?php echo $user->email; ?></td>
                                        <td class="center"><?php $roles = $role->find(array('id'=>$user->role),'single'); echo $roles->role; ?></td>
                                        <td><a href="/admin/user/<?php echo $url."/".$user->id;?>"><button type="button" class="btn btn-default">Details</button></a></td>
                                       
                                    </tr>
                                <?php } ?>
                                </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>