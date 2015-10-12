<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>LAVAL - Projet UHA 4.0</title>

	<!-- Bootstrap -->

	<link href="http://localhost/LAVAL/public/css/bootstrap.min.css"
	rel="stylesheet">
	<link
	href="http://localhost/LAVAL/public/css/material-fullpalette.min.css"
	rel="stylesheet">
	<link href="http://localhost/LAVAL/public/css/ripples.min.css"
	rel="stylesheet">
	<link rel="stylesheet"
	href="http://localhost/LAVAL/public/css/dev.css">
	<link href='https://fonts.googleapis.com/css?family=Maven+Pro:400,900'
	rel='stylesheet' type='text/css'>
	<link
	href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,900'
	rel='stylesheet' type='text/css'>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<div id="header" class="navbar navbar-default">
		<div id="deco_blanc"></div>
		<div id="deco_blanc2"></div>
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed"
					data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span> <span
						class="icon-bar"></span><span class="icon-bar"></span> <span
						class="icon-bar"></span>
				</button>
				<div id="f_logo" class="navbar-brand">
					<div id="logo">
						<a href="#"></a>
					</div>
				</div>

			</div>
			<nav id="menu">
				<ul class="nav navbar-nav navbar-right">
					<li><a href="#">Accueil</a></li>
					<li><a href="#">Support</a></li>
					<li><a href="#">Séquence</a></li>
					<li><a href="#">Connexion</a></li>
					<li><a href="#">Admin</a></li>
				</ul>
			</nav>
		</div>
	</div>

	<div class="container contcolor continscription">
		<div id="deco_blanc3"></div>
		<div class="col-sm-12 cadre">
			<div class="entete"></div>
			<div class="panel">
				<div class="panel-heading enteteFlou">
					<h1>CONNEXION</h1>
					<div class="cercle">
						<img
							src="http://localhost/LAVAL/public/img/connexion.png"
							alt="logo" height="63px" width="71px"
							style="top: 18px; position: relative; left: 12px" />
					</div>
				</div>
				<div class="panel-body panelCategorie">
					<h1>Se connecter</h1>
					<form class="form-horizontal formConnexion" data-toggle="validator" role="form">
						<fieldset>
							<div class="form-group">
								<input type="email" class="form-control" id="inputEmail"
									placeholder="Email" name="user[mail]" pattern="^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,4})$" required maxlength="40">
							</div>
							<div class="form-group">
								<input type="password" class="form-control" id="inputPassword"
									placeholder="Password" name="user[password]" required maxlength="30"> <a href="#"><span
									class="help-block text-right"><small>Mot de passe oublié.</small></span></a>
							</div>
							<div class="form-group">
								<div class="col-lg-6 creaCompteDiv">
									<button class="btn btn-raised btn-default btn-sm">
										<a class="creaCompte" href="#">Créer un compte</a>
									</button>
								</div>
								<div class="col-lg-6 text-right creaCompteDiv">
									<button type="submit" class="btn btn-sm btn-material-teal-200">Valider</button>
								</div>
							</div>
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="http://localhost/LAVAL/public/js/validator.js"></script>
	<script src="http://localhost/LAVAL/public/js/bootstrap.min.js"></script>
	<script src="http://localhost/LAVAL/public/js/material.min.js"></script>

		<script type="text/javascript">
			$(document).ready(function() {
				$.material.init();
			});
		</script>

</body>
</html>