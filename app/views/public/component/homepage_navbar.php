  <header class="main-header">
    <nav class="navbar navbar-static-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/" class="navbar-brand"><b>Les:GO</b> Group</a>
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
            <i class="fa fa-bars"></i>
          </button>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
          <form class="navbar-form navbar-left" id="navBarSearchForm" role="search" action="/base/search" method="get">
            <div class="form-group">
              <input name="search" type="text" class="form-control" id="navbar-search-input" placeholder="Cari Kursus">
            </div>
          </form>
        </div>
        <!-- /.navbar-collapse -->
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if($this->session->userdata('user')==null){ ?>
            <?php }else{ ?>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success">4</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 4 messages</li>
                <li>
                  <!-- inner menu: contains the messages -->
                  <ul class="menu">
                    <li><!-- start message -->
                      <a href="#">
                        <div class="pull-left">
                          <!-- User Image -->
                          <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                        </div>
                        <!-- Message title and timestamp -->
                        <h4>
                          Support Team
                          <small><i class="fa fa-clock-o"></i> 5 mins</small>
                        </h4>
                        <!-- The message -->
                        <p>Why not buy a new awesome theme?</p>
                      </a>
                    </li>
                    <!-- end message -->
                  </ul>
                  <!-- /.menu -->
                </li>
                <li class="footer"><a href="#">See All Messages</a></li>
              </ul>
            </li>
            <!-- /.messages-menu -->

            <!-- Notifications Menu -->
            <li class="dropdown notifications-menu">
              <!-- Menu toggle button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell-o"></i>
                <span class="label label-warning">10</span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have 10 notifications</li>
                <li>
                  <!-- Inner Menu: contains the notifications -->
                  <ul class="menu">
                    <li><!-- start notification -->
                      <a href="#">
                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                      </a>
                    </li>
                    <!-- end notification -->
                  </ul>
                </li>
                <li class="footer"><a href="#">View all</a></li>
              </ul>
            </li>
            <!-- Tasks Menu -->

            <?php } ?>
            <!-- User Account Menu -->
            <li class="dropdown user user-menu">
              <!-- Menu Toggle Button -->
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <?php if($this->session->userdata('user')==null){ ?>
                    <span>Masuk/Daftar</span>
                <?php }else{ ?>
                <?php if($user->image==NULL){ ?>
                        <center><img class="user-image" src="/assets/img/user/user_default.png" alt="" height=200 width=200></center>
                        <?php }else{ ?>
                        <center><img class="user-image" src="<?php echo $user->image; ?>" alt="" height=200 width=200></center>
                        <?php } ?>
                <?php }?>
              </a>
              <ul class="dropdown-menu">
                <?php if($this->session->userdata('user')==null){ ?>
                <form action="/base/login" method="post" role="form" id="login">
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                <input type="text" class="form-control" placeholder="Username" name="username">
              </div>
              <br>
              <div class="input-group">
                <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                <input type="password" class="form-control" placeholder="Password" name="password">
              </div>
              <br>
                <button type="submit" class="btn btn-primary">Login</button>
                <span> atau daftar <a href="/base/register">disini</a></span>
                <?php }else{ ?>
                <!-- The user image in the menu -->
                <li class="user-header">
                        <?php if($user->image==NULL){ ?>
                        <center><img class="img-circle" src="/assets/img/user/user_default.png" alt="" width="100" height="100" ></center>
                        <?php }else{ ?>
                        <center><img class="img-circle" src="<?php echo $user->image; ?>" alt="" width="100" height="100"></center>
                        <?php } ?>
                  <p>
                    <?php echo $details->name; ?>
                    <small><?php echo $user->email; ?></small>
                  </p>
                </li>
                <!-- Menu Body -->
                <li class="user-body">
                  <div class="row">
                    <div class="col-xs-6 text-center">
                      <a href="/base/course/null/mine">Kursusku</a>
                    </div>
                    <div class="col-xs-6 text-center">
                      <a href="#">Janjian</a>
                    </div>
                  </div>
                  <!-- /.row -->
                </li>
                <!-- Menu Footer-->
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="/base/user" class="btn btn-default btn-flat">Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="/base/logout" class="btn btn-default btn-flat">Sign out</a>
                  </div>
                </li>
                <?php }?>
              </ul>
            </li>
          </ul>
        </div>
        <!-- /.navbar-custom-menu -->
      </div>
      <!-- /.container-fluid -->
    </nav>
  </header>