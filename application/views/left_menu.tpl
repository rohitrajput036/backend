<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <!-- <div class="user-panel">
            <div class="pull-left image">
                {image('dist/user2-160x160.jpg',['class'=>'img-circle', 'alt'=>'user image'])}
            </div>
            <div class="pull-left info">
                <p>Dinesh Solanki</p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div> -->
        <!-- search form -->
        <!-- <form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
                    <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                </span>
            </div>
        </form>  -->
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
            <li {if uriseg(1)=='welcome'}class="active"{/if}>
                <a href="{site_url('welcome')}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li {if uriseg(1)=='branch'}class="treeview active"{else}class="treeview"{/if}>
                <a href="#">
                    <i class="fa fa-edit"></i> <span>Branch</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {if uriseg(2)=='add_branch'}class="active"{/if}>
                        <a href="{site_url('branch/add_branch')}">
                            <i class="fa fa-circle-o"></i>Add Branch</a>
                    </li>
                    <li {if uriseg(2)=='all_branch'}class="active"{/if}>
                        <a href="{site_url('branch/all_branch')}">
                            <i class="fa fa-circle-o"></i>All Branch</a>
                    </li>
                </ul>
            </li>
            
            <li>
                <a href="{site_url('logout')}">
                    <i class="fa fa-sign-out"></i> <span>Logout</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>