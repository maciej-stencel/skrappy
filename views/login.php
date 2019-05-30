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
							<a href="index.php?view=registration">Nie masz konta? Zarejestruj się.</a>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>