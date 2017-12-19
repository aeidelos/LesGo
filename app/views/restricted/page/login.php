<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a><b>Les:</b>GO</a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <?php if($login==null){ ?>
    <p class="login-box-msg">Sign in to start your session</p>
    <?php }else{ ?>
    <p class="login-box-msg" style="font-color:red;">Username/Password Salah</p>
    <?php } ?>    
    <form action="/admin/login" method="post">
      <div class="form-group has-feedback">
        <input type="text" class="form-control" placeholder="Username" name="username">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">
        <div class="col-xs-8">
        </div>
        <!-- /.col -->
        <div class="col-xs-4">
          <button type="submit" class="btn btn-primary btn-block btn-flat" name="submit" value="submit">Sign In</button>
        </div>
        <!-- /.col -->
      </div>
    </form>
    <a href="#">I forgot my password</a><br>

  </div>
  <!-- /.login-box-body -->
</div>