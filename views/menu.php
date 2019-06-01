	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top">
		<div class="container">
			<a class="navbar-brand" href="#">
				<img src="http://placehold.it/150x50?text=Logo" alt="">
			</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav ml-auto">
					<li class="nav-item active">
						<a class="nav-link" href="index.php">Home
							<span class="sr-only">(current)</span>
						</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?view=about">O nas</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?view=dispose">Dispose</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="?view=history">Historia</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
							<?php echo $user->getName(); ?>
						</a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="?view=myProfile">Moje ustawienia</a>
							<a class="dropdown-item" href="?view=logout">Wyloguj się</a>
						</div>
					</li>
				</ul>
			</div>
		</div>
	</nav> 
