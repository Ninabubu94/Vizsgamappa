<?php

class Page
{
	public static function Begin() 
	{
		echo '<!DOCTYPE html>
            <html lang="hu">
            <head>
             <meta charset="UTF-8">
             <meta name="viewport" content="width=device-width, initial-scale=1.0">
             <title>Állatmania</title>
					<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
					<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
					<script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
				</head>
				<body class="bg-warning">

					<header class="container-fluid bg-success text-white pt-2 pb-2">
						<div class="row">
							<div class="col-sm-4 h5 pt-3">Admin felület</div>
							<nav class="navbar bgg-success navbar-dark navbar-expand-sm col-sm-8 justify-content-end">
								'. self::Navigation().'
							</nav>
						</div>
					</header>

					<main class="container pt-4 pb-5">';
	}
	public static function End()
	{
		echo '</main></body></html>';
	}
        private static function Navigation()
        {
            if(Account_manager::Has_session())
            {
             return'<ul class="navbar-nav">
		<li class="nav-item">
			<a href="?func=categories" class="nav-link">
			<i class="fa-solid fa-layer-group"></i> Kategóriák
			</a>
		</li>
		    <li class="nav-item">
		<a href="?func=alcategories" class="nav-link">
            <i class="fa-solid fa-layer-group"></i> Alkategóriák
		</a>
            </li>
		<li class="nav-item">
		<a href="?func=termekek" class="nav-link">
            <i class="fa-solid fa-newspaper"></i> Termékek
		</a>
        </li></li>
		<li class="nav-item">
		<a href="?func=kerdesek" class="nav-link">
            <i class="fa-solid fa-question"></i> Kérdesek
		</a>
        </li>
		<li class="nav-item">
		<a href="?func=velemeny" class="nav-link">
            <i class="fa-solid fa-star"></i> Vélemények
		</a>
        </li>
	<li class="nav-item">
	<a href="?func=logout" class="nav-link">
	<i class="fa-solid fa-door-open"></i> Kilépés
	</a>
	</li>
	</ul>';
        }
        return '';
        }
}