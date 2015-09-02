<?php 
$redirect_login = false;
require_once 'common/init.php';

$user = new user();

if (isset($_GET['logout']) && $_GET['logout'] == 'true') {
	$results = $user->session_destroy();
}

if (isset($_POST['login'])) {
	
	$results = $user->do_login($_POST);
	
	if ($results) {
		$url = (isset($results->url))? $results->url : 'dashboard.php';
		header('Location:'.$url);
	}else{
		echo '<div class="col-md-10 col-md-offset-1 paddingTop marginTop"><div class="alert alert-danger" role="alert"> Invalid Username / Password </div></div>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
	<link href="assets/css/reset.css" rel="stylesheet">
	<link href="assets/css/general.css" rel="stylesheet">
	<link href="assets/css/bootstrap.css" rel="stylesheet">
	<link href="assets/css/bootstrap-theme.css" rel="stylesheet">
	<link href="assets/css/bootstrap-datetimepicker.css" rel="stylesheet">
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="container paddingTop marginTop">
		<div class="col-md-4"></div>
	  	<div class="col-md-4 paddingTop marginTop">
		  <form class="form-signin" action="" method="post">
		    <h2 class="form-signin-heading">Please sign in</h2>
		    <label for="username" class="sr-only">Email address</label>
		    <input type="text" name="username" id="username" class="form-control" placeholder="Username" required="" autofocus="" style="width:94%;">
		    <label for="password" class="sr-only">Password</label>
		    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required=""  style="width:94%;">
		    <button class="btn btn-lg btn-primary btn-block" type="submit"  name="login" value="Login">Sign in</button>
		  </form>
		</div>
		<div class="col-md-4"></div>
	</div>
</body>
</html>