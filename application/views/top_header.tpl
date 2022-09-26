<header class="main-header">
        <!-- Logo -->
        <a class="logo"><b>{$smarty.const.PROJECT_NAME}</b> Backend</a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" id="sidebar_toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Notifications: style can be found in dropdown.less -->
              <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <i class="fa fa-bell-o"></i>
                  <span class="label label-warning">0</span>
                </a>
                <ul class="dropdown-menu">
                  <li class="header">You have 0 notifications</li>
                  <li>
                    <!-- inner menu: contains the actual data -->
                    <ul class="menu">
                        <li>
                            <a>
                                <i class="fa fa-user text-aqua"></i> Notifi.
                            </a>
                        </li>
                    </ul>
                  </li>
                  <li class="footer"><a href="{base_url()}">View all</a></li>
                </ul>
              </li>
              <!-- User Account: style can be found in dropdown.less -->
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <!-- {image('dist/user2-160x160.jpg',['class'=>'user-image', 'alt'=>'user image'])} -->
                  <span>
                  Rohit Rajput
                  {* {userdata('UserName')} *}
                  </span>
                </a>
                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                      {image('dist/avatar.png',['class'=>'img-circle', 'alt'=>'user image'])}
                    <p>
                    Rohit Rajput
                      {* {userdata('UserName')} *}
                      <small>
                      rohit.rajput@bsa.co.in
                      {* {userdata('Email')} *}
                      </small>
                    </p>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="{base_url()}" class="btn btn-primary btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                      <a href="{base_url('logout')}" class="btn btn-danger btn-flat">Sign out</a>
                    </div>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </nav>
      </header>