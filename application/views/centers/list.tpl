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
        <h1>
            Branch
            <small>All Branch</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Branch</a></li>
            <li class="active">All Branch</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
           <table class="table table-bordered" id="DataTable">
           <tr>
                <th>S NO</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Test 1</td>
                <td><button class="">Enter</button></td>
            </tr>    
           </table>
        </div>
    </section><!-- /.content -->
</div><!-- /.content-wrapper -->

</div><!-- ./wrapper -->
{include file='footer.tpl'}
{js('common.js')}
