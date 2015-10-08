<!DOCTYPE html>
<html lang="fr">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<title>LAVAL - Projet UHA 4.0</title>

	<!-- Bootstrap -->
	<link href="<?php echo URL ?>public/bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="<?php echo URL ?>public/bootstrap/css/perso.css">

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
	<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>
<body>
<?php 	if(isset($this->msg)){?>
			<div class="alert alert-info"><?php echo $this->msg;?></div>
<?php
		}
?>

	<div class="modal fade" id="login-modal" tabindex="-1" role="dialog"
		aria-labelledby="myModalLabel" aria-hidden="true"
		style="display: none;">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal"
						aria-hidden="true">×</button>
					<h4 class="modal-title text-center">Connexion</h4>
				</div>
				<div class="modal-body">
					<form class="form-horizontal" data-toggle="validator">
						<fieldset>
							<div class="form-group">
								<div class="col-lg-12">
									<input type="text" class="form-control" id="inputLogin"
										placeholder="Login" data-minlength="2"
										aria-describedby="inputLoginStatus" required>
								</div>
							</div>
							<div class="form-group">
								<div class="col-lg-12">
									<input type="password" class="form-control" id="inputPassword"
										placeholder="Mot de passe" data-minlength="6" required> <a
										href="#"><span id="helpBlock" class="help-block">Mot de passe
											oublié.</span></a>
								</div>
							</div>
							<div class="form-group text-center">
								<div class="col-lg-12">
									<button type="reset" class="btn btn-default">Annuler</button>
									<button type="submit" class="btn btn-primary">Valider</button>
								</div>
							</div>
						</fieldset>

					</form>
				</div>
			</div>
		</div>
	</div>