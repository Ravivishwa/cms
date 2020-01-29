<?php
require_once ('config.php');
session_start();
if(isset($_POST['post'])){
	$url = "https://www.google.com/recaptcha/api/siteverify";
	$data = [
		"secret" => "6LdXs9IUAAAAAK469mX1R54lUprc5JrMTtSPYYu8",
		"response" => $_POST['token'],
		"remoteip" => $_SERVER['REMOTE_ADDR']
	];

	$options = [
		'http' => [
			'header' => "Content-type: application/x-www-form-urlencoded\r\n",
			'method' => "POST",
			'content' => http_build_query($data) 
		]
	];

	$context = stream_context_create($options);
	$response = file_get_contents($url,false,$context);
	
	echo "<pre>";
	$res = json_decode($response,true);
	if($res['success'] == true){
		
	}
}
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
		$password = md5($password);
		$where = new WhereClause('and'); // create a WHERE statement of pieces joined by ANDs
		$where->add('username=%s', $username);
		$where->add('password=%s', $password);
		$result = DB::query("SELECT * FROM users WHERE %l", $where);

		if (DB::count() == 1) { // user found
			// check if user is admin or user
			$logged_in_user = $result[0];
			if ($logged_in_user['role'] == 'admin') {
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/index.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login V11</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">

	<script defer src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">

	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-l-50 p-r-50 p-t-60 p-b-30">
				<form class="login100-form validate-form" action="login.php" method="POST">
					<span class="login100-form-title p-b-29">
						<img class="imglogo" src="assets/images/logo1.png">
					</span>

<!-- 					<div class="wrap-input100 validate-input m-b-18" data-validate = "Valid email is required: ex@abc.xyz">
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div> -->

					<div class="wrap-input100 validate-input m-b-18">
						<input class="input100" type="text" name="username" placeholder="username" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-envelope"></span>
						</span>
					</div>					

					<div class="wrap-input100 validate-input m-b-18" data-validate = "Password is required">
						<input class="input100" type="password" name="password" placeholder="password" required>
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<span class="lnr lnr-lock"></span>
						</span>
					</div>

					<div class="contact100-form-checkbox m-l-4">
						<input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
						<label class="label-checkbox100" for="ckb1">
							Remember me
						</label>
					<div class="g-recaptcha" data-sitekey="6LdketIUAAAAADySiRrG3e7yyX3Hhf1opjRLWns4"></div>
					</div>
					
					<div class="container-login100-form-btn p-t-15">
						<input class="login100-form-btn" name="post" value="Login" type="submit">


					<div class="contact100-form m-l-4 p-t-5">
						<a href="register.php" title=" 'Please contact HR Unit to register your account as verified' ">
							<label class="label-login-content" >
									Register
							</label>							
						</a>
					</div>	

					<div class="contact100-form m-l-4 p-t-5">
						<label class="label-login-content" >
								Forgot password?
							</label>
					</div>	<br>

					<div class="contact100-form m-l-4 p-t-5">
						<a href="index.php">
							<label class="label-login-content" >
							  <i class="fas fa-long-arrow-alt-left"></i>  Back
							</label>
						</a>	
					</div>
					<input type="hidden" id="token" name="token">
				</form>
			</div>
		</div>
	</div>
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="vendor/select2/select2.min.js"></script>
	<script src="js/main.js"></script>
	<script src="https://www.google.com/recaptcha/api.js?render=6LdXs9IUAAAAAM9cFzz9GvJYBIO0ICnD2qfl-hRu"></script>
</body>
	<script>
	grecaptcha.ready(function() {
	    grecaptcha.execute('6LdXs9IUAAAAAM9cFzz9GvJYBIO0ICnD2qfl-hRu', {action: 'homepage'}).then(function(token) {
	    	$('#token').val(token);
	    });
	});
	</script>
</html>