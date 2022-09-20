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
                        <a href="{site_url('branch/all_branch')}"><i class="fa fa-circle-o"></i>All Branch</a>
                    </li>
                </ul>
            </li>
            <li {if uriseg(1)=='user'}class="treeview active"{else}class="treeview"{/if}>
                <a href="#">
                    <i class="fa fa-user"></i> <span>User Management</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                <li {if uriseg(1)=='user' && uriseg(2)=='add'}class="active"{/if}>
                    <a href="{site_url('user/add')}"><i class="fa fa-circle-o"></i> Add</a>
                </li>        
                <li {if uriseg(1)=='user' && uriseg(2)==''}class="active"{/if}>
                        <a href="{site_url('user/')}"><i class="fa fa-circle-o"></i> List</a>
                    </li>
                </ul>
            </li>
            <li {if uriseg(1)=='role' || uriseg(1)=='department' || uriseg(1)=='fee_structure'} class="treeview active"{else}class="treeview"{/if}>
                <a href="#">
                    <i class="fa fa-cogs"></i> <span>Setting</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {if uriseg(1)=='role'}class="active"{/if}>
                        <a href="{site_url('role')}"><i class="fa fa-circle-o"></i> Role</a>
                    </li>
                    <li {if uriseg(1)=='department'}class="active"{/if}>
                        <a href="{site_url('department')}"><i class="fa fa-circle-o"></i> Department</a>
                    </li>
                    <li {if uriseg(1)=='fee_structure'}class="active"{/if}>
                        <a href= "{site_url('fee_structure')}"><i class="fa fa-circle-o"></i>Fee Structure</a>
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