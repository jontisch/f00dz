<?php
header('Content-Type: text/html; charset=utf-8');
setlocale(LC_TIME, "sv_SE");
include "classes.php";
include "conn.php";
?>
<html>
<head>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="js/jquery.cookie.js"></script>
	<script src="js/custom.js"></script>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" href="css/tux.ico">
	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
	<link href="css/starter-template.css" rel="stylesheet">

	<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
	<script src="js/jquery.ui.touch-punch.min.js"></script>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	
<title>
F00dzor
</title>
</head>
<body>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				<a class="navbar-brand" href="./">Mat</a>
			</div>
			<div id="navbar" class="collapse navbar-collapse">
				<ul class="nav navbar-nav">
					<li <?php setActiveNav("list")?>><a href="?p=list">Recept</a></li>
					<?php 
						session_start(); 

						$loggedin = isset($_SESSION['login_user']);

						if(!$loggedin){ 
							echo'<li'; 
							setActiveNav("login");
							echo '><a href="?p=login">Logga in</a></li>
							<li';
							setActiveNav("signup");
							echo '><a href="?p=signup">Registrera</a></li>'; 
						} else {
							echo '<li';
							setActiveNav("recipeform");
							echo '><a href="?p=recipeform">Nytt Recept</a></li>
							<li';
							setActiveNav("ingredients");
							echo '><a href="?p=ingredients">Ingredienser</a></li>
							<li'; 	
							setActiveNav("menus");
							echo '><a href="?p=menus">Matlistor</a></li>
							<li';
							setActiveNav("newmenu");
							echo '><a href="?p=newmenu">Ny matlista</a></li>
							<li><a href="logout.php">Logga ut</a></li>
							'; 
						}
					?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<div class="container">
		<div class="jumbotron">
<?php

if(!isset($_GET['p'])){
	include "list.php";
} else {
	$inc = $_GET['p'] . ".php";
	if(!include $inc) include "404.php";
}

function setActiveNav($request)
{
    $currentPage = (isset($_GET['p'])? $_GET['p'] : "");

    if ($currentPage == $request){
        echo ' class="active"';
    }elseif(!isset($_GET['p']) && $request == "list"){
    	echo ' class="active"';
    }
}

?>
		</div>		
	</div>
	<script>

	</script>
</body>
</html>
