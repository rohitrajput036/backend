<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>BSA Group | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    {css('bootstrap/bootstrap.min.css')}

    <!-- Font Awesome Icons -->
    {css('font-awesome/4.3.0/font-awesome.min.css')}
    <!-- Theme style -->
    {css('dist/AdminLTE.min.css')}

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
          <b>School </b>Backend
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Sign in to start your tasks</p>
        <form action="{site_url('login')}" method="post">
          <div class="form-group has-feedback" id="username_box">
              <input type="text" class="form-control" name="username" id="username" placeholder="Email" />
              <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
              <label class="control-label" for="username" id="username_error_msg"></label>
          </div>
          <div class="form-group has-feedback" id="password_box">
              <input type="password" class="form-control" name="password" id="password" placeholder="Password" />
              <span class="glyphicon glyphicon-lock form-control-feedback"></span>
              <label class="control-label" for="password" id="password_error_msg"></label>
          </div>
          <div class="row">
            <div class="col-xs-8">
            </div><!-- /.col -->
            <div class="col-xs-4">
              <div id="submit_btn">
                <input type="button" value="Sign In" name="submit" id="login" class="btn btn-primary btn-block" />
              </div>
              <div id="loader" style="display: none;">
                <i class="fa fa-spinner fa-pulse fa-3x fa-fw" aria-hidden="true"></i>
              </div>
            </div><!-- /.col -->
          </div>
        </form>

        <div class="row">
          <div class="col-md-12">
            <div class="form-group has-error">
              <label class="control-label" id="api_error"></label>
            </div>
          </div>
        </div>
        <!-- <a href="#">I forgot my password</a><br> -->
      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->
    <!-- jQuery 2.1.3 -->
    {js('plugins/jQuery/jQuery-2.1.3.min.js')}
    <!-- Bootstrap 3.3.2 JS -->
    {js('bootstrap/bootstrap.min.js')}
    <script>
      $(function() {
        $("#password").keypress(function(e) {
            if (e.keyCode === 13) {
                e.preventDefault();
                $("#login").click();
            }
        });
        $('#login').click(function() {
          var username = $("#username").val().trim();
          var password = $("#password").val().trim();
          $('#api_error').text('');
          $("#username_error_msg").text('');
          $("#username_box").removeClass('has-error');
          $("#password_error_msg").text('');
          $("#password_box").removeClass('has-error');
          if (username == '') {
              $('#username_error_msg').text('Please enter Username');
              $("#username_error_msg").css('display', 'block');
              $("#username_box").addClass('has-error');
              $("#username").focus();
          } else if (password == '') {
              $('#password_error_msg').text('Please enter Password');
              $("#password_error_msg").css('display', 'block');
              $("#password_box").addClass('has-error');
              $("#password").focus();
          } else {
            $('#submit_btn').hide();
            $("#loader").show();
            var Request={
                'UserName':username,
                'Password':password
            };
            Request=JSON.stringify(Request);
            console.log(Request);
            $.ajax({
              method: "POST",
              url: "{base_url('/api/login/validate')}",
              async: false,
              crossDomain: true,
              processData: false,
              datatype: "JSON",
              data: Request,
            }).done(function(Response) {
                
              if (Response.Control.Status == 1) {
                window.location.href = "{base_url()}";
              } else {
                $('#api_error').text(Response.Control.Message);
              }
            }).fail(function(Response) {
              if (Response.responseJSON.status == 0) {
                $('#api_error').text(Response.responseJSON.Control.Message);
              }
            }).always(function() {
              $('#submit_btn').show();
              $("#loader").hide();
            });
          }
        });
      });
    </script>
  </body>
</html>