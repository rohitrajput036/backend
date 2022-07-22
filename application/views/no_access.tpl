
{include file='header_fixed.tpl'}
{include file='top_header.tpl'}

<!-- Right side column. Contains the navbar and content of the page -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            NO PERMISSION
        </h1>
        <ol class="breadcrumb">
            <li><a href="{base_url('dashboard')}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">NO PERMISSION</li>
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
                        <div class="row" style="padding:5px 30px;">
                            <div class="col-xs-12 col-md-10">
                                <p>You does not have the permission to view this section.</p>
                            </div>
                            <div class="col-xs-12 col-md-2">
                                <a href="{base_url('dashboard')}"><button class="btn btn-block btn-success">Click here Go to Dashbaord</button></a>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->
{include file='footer.tpl'}