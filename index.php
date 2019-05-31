<?php
	session_start();
	error_reporting(E_ALL);
	include_once('config/config.inc.php');
	include_once('classes/Request.php');
	include_once('classes/user.php');
	include_once('classes/session.php');
	$request = new Request($_POST, Request::POST);
	$get = new Request($_GET, Request::GET);
	$user = new User();
	$session = new Session();
?>
<!doctype html>
<html lang="pl">
	<head>
		<meta charset="utf-8">
		<title>EKO</title>
		<meta name="description" content="HTML5">
		<meta name="author" content="Autor">
		<!--<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<link rel="stylesheet" type="text/css" href="css/main.css">
	</head>

	<body>
		<div class="container"><?php 
		$password = $request->get('password');
		$username = $request->get('username');
		if (!$get->has('view') && $request->get('submit', false) == 'Zaloguj się') {
			if ($username == false) { ?>
				<div class="alert alert-danger" role="alert">
					<span class="font-weight-bold">Błąd!</span>  Nie podano loginu!
				</div><?php
			} elseif ($password == false) { ?>
				<div class="alert alert-danger" role="alert">
					<span class="font-weight-bold">Błąd!</span>  Nie podano hasła!
				</div><?php
			} elseif($password && $username) {
				if ($user->checklogin($username, $password)) {
					$session->setGlobal("loggedin", true);
					$session->setGlobal("profileName", $user->getName($username));
				} else { ?>
					<div class="alert alert-danger" role="alert">
						<span class="font-weight-bold">Błąd!</span>  Podano błędne hasło lub login!
					</div>
				<?php }
			}
		} ?>
		</div><?php
		if ($get->get('view') == 'logout') {
			$session->setGlobal('loggedin', false); 
			header('Location: index.php');
		}
		if ($session->has('loggedin') && $session->get('loggedin') == true){
			include_once('views/menu.php');
			echo '</br>';
			if (!$get->has('view') && !$get->get('view')) {
				include_once('views/body.php'); 
			} elseif ($get->has('view') && $get->get('view') == 'dispose') {
				include_once('views/dispose.php');
			} elseif ($get->has('view') && $get->get('view') == 'history') {
				include_once('views/history.php');
			} elseif ($get->has('view') && $get->get('view') == 'about') {
				include_once('views/about.php');
			} elseif ($get->has('view') && $get->get('view') == 'myProfile') {
				include_once('views/myProfile.php');
			} 
			include_once('views/footer.php');
		} else {
			if ($get->has('view') && $get->get('view') == 'registration') {
				if ($request->has('register') && $request->get('register') == 'true' ) {
					if (!$request->has('username') || !$request->has('password') || !$request->has('password_check') || 
					!$request->has('email') || !$request->has('state') || !$request->has('county')) { ?>
						<div class="alert alert-danger" role="alert">
							<span class="font-weight-bold">Błąd!</span>  Nie podano wszystkich danych!
						</div><?php
						exit;
					}
					$username = $request->get('username');
					$firstname = $request->get('firstname');
					$lastname = $request->get('lastname');
					$password = $request->get('password');
					$passwordCheck = $request->get('password_check');
					$state = $request->get('state');
					$county = $request->get('county');
					$city = $request->get('city');
					$postalCode = $request->get('postal_code');
					$street = $request->get('street');
					$email = filter_var($request->get('email'), FILTER_VALIDATE_EMAIL);

					if ($email == false) { ?>
						<div class="alert alert-danger" role="alert">
							<span class="font-weight-bold">Błąd!</span>  Adres email jest niepoprawny!
						</div><?php
						exit;
					}
					if ($password != $passwordCheck) { ?>
						<div class="alert alert-danger" role="alert">
							<span class="font-weight-bold">Błąd!</span>  Hasła nie są takie same!
						</div><?php
						exit;
					}
					$user = new User($username, $firstname, $lastname, $password, $email, $state, $county, $city, $postalCode, $street);
					if($user->checkIfUserExists()){ ?>
						<div class="alert alert-danger" role="alert">
							<span class="font-weight-bold">Błąd!</span> Użytkownik lub Email już istnieje.
						</div><?php
						exit;
					}
						
					if (!$user->save()) { ?>
						<div class="alert alert-danger" role="alert">
							<span class="font-weight-bold">Błąd!</span> Nie udało się zarejestrować użytkownika!
						</div><?php
						exit;
					} ?>
					<div class="alert alert-success" role="alert">
						<span class="font-weight-bold">Sukces!</span> Zarejestrowano użytkownika.
					</div><?php
				} else {
					include_once('views/registration.php');
				}
			} else {
				include_once('views/login.php');
			}
		} ?>
	<!--<script src="https://code.jquery.com/jquery-3.4.0.min.js"
		integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
		crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>-->
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	</body>
</html>