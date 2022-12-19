<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Aplikasi Data Mining K Means dan Apriori</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" href="asset/bootstrap/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="asset/plugins/font-awesome-4.6.3/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="asset/plugins/ionicons/css/ionicons.min.css"/>
	<link rel="stylesheet" href="asset/plugins/iCheck/all.css"/>
	<link rel="stylesheet" href="asset/core/css/AdminLTE.min.css"/>
	<link rel="stylesheet" href="asset/core/css/skins/_all-skins.min.css"/>
	<link rel="shortcut icon" href="asset/favicon.png" />
  </head>
  <body class="hold-transition login-page">
    <div class="login-box">
	  <div class="login-box-body">
	  <div class="login-logo">
		Login Admin
      </div>
		<div style="margin-left:20%;margin-right:20%;margin-bottom:20px;">
			<img src="asset/core/img/logo.png" class="img-responsive">
		</div>
		<form method="post" name="login" action="auth.php">	
          <div class="form-group has-feedback">
            <input type="text" id="username" name="username" class="form-control" placeholder="Username" required />
            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
          </div>
          <div class="form-group has-feedback">
            <input type="password" id="password" name="password" class="form-control" placeholder="Password" required />
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">
              <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div>
            </div>
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
            </div>
          </div>
        </form>
      </div>
    </div>
	<script src="asset/plugins/jQuery/jQuery-2.1.3.min.js"></script>
	<script src="asset/bootstrap/js/bootstrap.min.js"></script>
	<script src="asset/plugins/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="asset/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%'
        });
      });
    </script>
  </body>
</html>