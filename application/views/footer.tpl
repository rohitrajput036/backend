    
    </div><!-- ./wrapper -->
    
    <div id="animatedLoader" style="position: fixed; background-color: white; top:0; bottom:0;right: 0; left: 0; width:100%; height: 100%; z-index:1050; text-align: center; font-size: 20px;">
        {image('loader.gif',['style'=>'width:50%'])}
        <p>Please Wait...</p>
        <p></p>
    </div>
    <!-- jQuery 2.1.3 -->
    
    {js('plugins/jQuery/jQuery-2.1.3.min.js')}
    
    <!-- jQuery UI 1.11.2 -->
    {js('jquery.magnify.js')}
    {js('plugins/jQueryUI/1.11.2/jquery-ui.min.js')}
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.2 JS -->
    {js('bootstrap/bootstrap.min.js')}
    
    {js('plugins/slimScroll/jquery.slimscroll.min.js')} 
    <!-- DATA TABES SCRIPT -->
    {js('plugins/datatables-1.10.19/jquery.dataTables.js')} 
    {js('plugins/datatables-1.10.19/dataTables.bootstrap.js')}
    
    <!-- daterangepicker -->
    {js('plugins/daterangepicker/daterangepicker.js')}
    <!-- datepicker -->
    {js('plugins/datetimepicker/moment-with-locales.js')}
    {js('plugins/datepicker/bootstrap-datepicker.js')}
    {js('plugins/datetimepicker/bootstrap-datetimepicker.js')}
    
    
   
    <!-- iCheck -->
    {js('plugins/iCheck/icheck.min.js')}
    <!-- AdminLTE App -->
    {js('dist/app.min.js')}
    {js('select2.js')}
    
    <script>
        $(document).ready(function(){
            $("#animatedLoader").hide();
        });
    </script>
    
  </body>
</html>