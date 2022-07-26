<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION (V{$smarty.const.WEB_VERSION})</li>
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
            <li {if uriseg(1)=='enquiry'} class="treeview active" {else} class="treeview" {/if}>
                <a href="#">
                    <i class="fa fa-tty"></i> <span>Enquiry</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {if uriseg(2)=='add'}class="active"{/if}>
                        <a href="{site_url('enquiry/add')}"><i class="fa fa-circle-o"></i> Add Enquiry</a>
                    </li>
                    <li {if uriseg(2)=='list'}class="active"{/if}>
                        <a href="{site_url('enquiry/list')}"><i class="fa fa-circle-o"></i> All Enquiry</a>
                    </li>
                    <li {if uriseg(2)=='call_back'}class="active"{/if}>
                        <a href="{site_url('enquiry/call_back')}"><i class="fa fa-circle-o"></i> Call Back</a>
                    </li>
                    <li {if uriseg(2)=='call_back_hot'}class="active"{/if}>
                        <a href="{site_url('enquiry/call_back_hot')}"><i class="fa fa-circle-o"></i> Call Back Hot</a>
                    </li>
                </ul>
            </li>
            <li {if uriseg(1)=='registration'} class="active"{/if}>
                <a href="{site_url('registration')}">
                    <i class="fa fa-dot-circle-o"></i> Registration
                </a>
            </li>
            <li {if uriseg(1)=='admission'} class="treeview active" {else} class="treeview" {/if}>
                <a href="#">
                    <i class="fa fa-th"></i> <span>Admission</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {if uriseg(1)=='admission' && uriseg(2) == ''}class="active"{/if}>
                        <a href="{site_url('admission')}"><i class="fa fa fa-users"></i> List</a>
                    </li>
                </ul>
            </li>
            <li {if uriseg(1)=='teacher' || uriseg(1)=='teacher_enquiry' } class="treeview active"{else}class="treeview"{/if}>
                <a href="#">
                    <i class="fa  fa-graduation-cap"></i> <span>Teacher</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li {if uriseg(1)=='teacher'}class="active"{/if}>
                        <a href="{site_url('teacher')}"><i class="fa fa-user-plus"></i>ADD Teacher</a>
                    </li>
                    <li {if uriseg(1)=='teacher_enquiry'}class="active"{/if}>
                        <a href="{site_url('teacher_enquiry')}"><i class="fa fa-user-plus"></i>Teacher Info</a>
                    </li>
                </ul>
            </li>
            <li {if uriseg(1)=='role' || uriseg(1)=='department' || uriseg(1)=='fee_structure' || uriseg(1)=='cast_category' || uriseg(1)=='relation' || uriseg(1)=='school' || uriseg(1)=='manage_class' || uriseg(1)=='subject' || uriseg(1)=='chapter' || uriseg(1)=='routes' ||  uriseg(1)=='country' || uriseg(1)=='state' || uriseg(1)=='city' || uriseg(1)=='area' || uriseg(1)=='religion' || uriseg(1)=='media_type'} class="treeview active"{else}class="treeview"{/if}>
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
                    <li {if uriseg(1)=='cast_category'}class="active"{/if}>
                        <a href= "{site_url('cast_category')}"><i class="fa fa-circle-o"></i>Cast category</a>
                    </li>
                    <li {if uriseg(1)=='relation'}class="active"{/if}>
                        <a href= "{site_url('relation')}"><i class="fa fa-circle-o"></i>Relation</a>
                    </li>
                    <li {if uriseg(1)=='school'}class="active"{/if}>
                        <a href= "{site_url('school')}"><i class="fa fa-circle-o"></i>Manage School</a>
                    </li>
                    <li {if uriseg(1)=='manage_class'}class="active"{/if}>
                        <a href= "{site_url('manage_class')}"><i class="fa fa-circle-o"></i>Manage Class</a>
                    </li>
                    <li {if uriseg(1)=='subject'}class="active"{/if}>
                        <a href= "{site_url('subject')}"><i class="fa fa-book"></i>Manage Subject</a>
                    </li>
                    <li {if uriseg(1)=='chapter'}class="active"{/if}>
                        <a href= "{site_url('chapter')}"><i class="fa fa-book"></i>Manage Chapter</a>
                    </li>
                    <li {if uriseg(1)=='routes'}class="active"{/if}>
                        <a href= "{site_url('routes')}"><i class="fa fa-arrows-alt"></i>Manage Routes</a>
                    </li>
                    <li {if uriseg(1)=='country'}class="active"{/if}>
                        <a href= "{site_url('country')}"><i class="fa fa-circle-o"></i> Country</a>
                    </li>
                    <li {if uriseg(1)=='state'}class="active"{/if}>
                        <a href= "{site_url('state')}"><i class="fa fa-circle-o"></i> State</a>
                    </li>
                    <li {if uriseg(1)=='city'}class="active"{/if}>
                        <a href= "{site_url('city')}"><i class="fa fa-circle-o"></i> City</a>
                    </li>
                    <li {if uriseg(1)=='area'}class="active"{/if}>
                        <a href= "{site_url('area')}"><i class="fa fa-circle-o"></i> Area</a>
                    </li>
                    {* <li {if uriseg(1)=='religion'}class="active"{/if}>
                        <a href= "{site_url('religion')}"><i class="fa fa-circle-o"></i>Religion</a>
                    </li>
                    <li {if uriseg(1)=='media_type'}class="active"{/if}>
                        <a href= "{site_url('media_type')}"><i class="fa fa-circle-o"></i> Media</a>
                    </li> *}

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