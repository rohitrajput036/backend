{include file='header.tpl'}
{include file='top_header.tpl'}
{include file='left_menu.tpl'}
<style>
    #sidebar_toggle {
        display: none;
    }
</style>
<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>{userdata('HeaderHeading')}</h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <div class="box box-solid bg-blue">
                    <div class="box-header">
                        <h3 class="box-title">{getGreetings()}</h3>
                    </div>
                    <div class="box-body">
                        <h3>session values</h3>
                        <ol>
                            {foreach $smarty.const.US_DATA as $sess}
                                <li><b>{$sess} : </b>{(is_array(userdata($sess))) ? print_r(userdata($sess)) : userdata($sess)}</li>
                            {/foreach}
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <!-- Small boxes (Stat box) -->
        <div class="row">
        </div><!-- /.row -->
        <!-- Main row -->
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
