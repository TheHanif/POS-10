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
		echo 'Invalid Login';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Login</title>
</head>
<body>



<form action="" method="post">
	
	<label for="username">Username <input type="text" name="username" id="username" required></label> <br>
	<label for="password">Password <input type="password" name="password" id="password" required></label> <br>
	<input type="submit" name="login" value="Login">


</form>
	
</body>
</html>