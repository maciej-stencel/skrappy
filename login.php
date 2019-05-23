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
	<!-- Page Content -->
	<div class="page-wrap d-flex flex-row align-items-center">
		<div class="container">
			<div class="row justify-content-center">
				<div class="col-sm-12 col-md-12 col-lg-6">
					<form action="index.php" method="post" class="justify-content-center">
						<div class="form-group">
							<label for="username" class="font-weight-bold">Login:</label>
							<input type="text" class="form-control" id="username" name="username" />
						</div>
						<div class="form-group">
							<label for="password" class="font-weight-bold">Hasło:</label>
							<input type="password" class="form-control" id="password" name="password" />
						</div>
                        <div class="row">
                            <div class="col-sm-12 col-md-4 offset-md-8">
                                <button type="submit" class="btn btn-primary btn-block" name="submit" value="Zaloguj się">
                                    zaloguj się
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12 text-right">
                                <a href="#">Nie masz konta? Zarejestruj się.</a>
                            </div>
                        </div>
					</form>
				</div>
			</div>
		</div>
	</div>
	<!-- /.container -->

<!--<script src="https://code.jquery.com/jquery-3.4.0.min.js"
	integrity="sha256-BJeo0qm959uMBGb65z40ejJYGSgR7REI4+CW1fNKwOg="
	crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js" integrity="sha384-xrRywqdh3PHs8keKZN+8zzc5TX0GRTLCcmivcbNJWm2rs5C8PRhcEn3czEjhAO9o" crossorigin="anonymous"></script>-->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>