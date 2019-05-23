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
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <form action="index.php" method="post">
                    <div class="form-group">
                        <label for="login" class="font-weight-bold">Login<span class="mandatory">*</span>:</label>
                        <input type="text" class="form-control" id="login" name="login" required />
                    </div>
                    <div class="form-group">
                        <label for="user_password" class="font-weight-bold">Hasło<span class="mandatory">*</span>:</label>
                        <input type="password" class="form-control" id="user_password" name="user_password" required />
                    </div>
                    <div class="form-group">
                        <label for="user_password_check" class="font-weight-bold">Powtórz hasło<span class="mandatory">*</span>:</label>
                        <input type="password" class="form-control" id="user_password_check" name="user_password_check" required />
                    </div>
                    <div class="form-group">
                        <label for="firstname" class="font-weight-bold">Imię:</label>
                        <input type="text" class="form-control" id="firstname" name="firstname" />
                    </div>
                    <div class="form-group">
                        <label for="lastname" class="font-weight-bold">Nazwisko:</label>
                        <input type="text" class="form-control" id="lastname" name="lastname" />
                    </div>
                    <div class="form-group">
                        <label for="email" class="font-weight-bold">Email<span class="mandatory">*</span>:</label>
                        <input type="email" class="form-control" id="email" name="email" required />
                    </div>
                    <div class="form-group">
                        <label for="state" class="font-weight-bold">Województwo<span class="mandatory">*</span>:</label>
                        <select class="form-control" id="state" required>
                            <option value="">-- Wybierz --</option>
                            <option value="1">dolnośląskie</option>
                            <option value="2">kujawsko-pomorskie</option>
                            <option value="3">lubelskie</option>
                            <option value="4">lubuskie</option>
                            <option value="5">łódzkie</option>
                            <option value="6">małopolskie</option>
                            <option value="7">mazowieckie</option>
                            <option value="8">opolskie</option>
                            <option value="9">podkarpackie</option>
                            <option value="10">podlaskie</option>
                            <option value="11">pomorskie</option>
                            <option value="12">śląskie</option>
                            <option value="13">świętokrzyskie</option>
                            <option value="14">warmińsko-mazurskie</option>
                            <option value="15">wielkopolskie</option>
                            <option value="16">zachodniopomorskie</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="county" class="font-weight-bold">Powiat<span class="mandatory">*</span>:</label>
                        <input type="text" class="form-control" id="county" name="county" required />
                    </div>
                    <div class="form-group">
                        <label for="city" class="font-weight-bold">Miejscowość:</label>
                        <input type="text" class="form-control" id="city" name="city" />
                    </div>
                    <div class="form-group">
                        <label for="postal_code" class="font-weight-bold">Kod pocztowy:</label>
                        <input type="text" class="form-control" id="postal_code" name="postal_code" />
                    </div>
                    <div class="form-group">
                        <label for="street" class="font-weight-bold">Ulica:</label>
                        <input type="text" class="form-control" id="street" name="street" />
                    </div>
                    <button type="submit" class="btn btn-primary float-right" name="submit" value="Zarejestruj się">
                        zarejestruj się
                    </button>
                </form>
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